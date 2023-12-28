<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Card;
use App\Models\Stamp;
use App\Models\DailyData;
use Illuminate\Support\Facades\Log;

class RecordDailyData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'record:daily-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '毎日スタンプデータ、抽選数、当選数などを集計する';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $yesterday = Carbon::yesterday();
        $dbDate = DailyData::orderBy('id', 'desc')->first();

        if (isset($dbDate)) {
            $calculationDate = $dbDate->date;
            $diffDay = $calculationDate->diffIndays($yesterday);
        } else {
            $calculationDate = $yesterday->subDay();
            $diffDay = 1;
        }

        while($diffDay >= 1) {
            $targetDate = $calculationDate->addDay();
            $newRegisterCount = User::whereDate('created_at', $targetDate)->count();
            $firstLotteryCount = Card::whereDate('lottery_date', $targetDate)->where('card_number', 1)->count();
            $afterFirstLotteryCount = Card::whereDate('lottery_date', $targetDate)->get()->count();

            $stampTypes = [];
            for ($j = 0; $j < 14; $j++) {
                $stampTypes = array_merge($stampTypes, ['jan_code_' . $j => Stamp::whereDate('created_at', $targetDate)->where('stamp_type', $j)->count()]);
            }
            $winCount = Card::whereDate('lottery_date', $targetDate)->where('lottery_status', 3)->count();

            $dailyData = array_merge(
                [
                    'date' => $targetDate,
                    'new_register_count' => $newRegisterCount,
                    'first_lottery_count' => $firstLotteryCount,
                    'all_lottery_count' => $afterFirstLotteryCount,
                    'win_count' => $winCount,
                ],
                $stampTypes,
            );
            if (DailyData::create($dailyData)) {
                Log::info('集計バッチ完了');
            } else {
                Log::info('集計エラー');
            }

            $diffDay--;
        }
    }
}
