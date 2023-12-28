<?php

namespace App\Console\Commands;

use App\Models\BtcSerial;
use Illuminate\Console\Command;

class GenerateBtcSerial extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:btc-serial {--type=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'BTCフォームシリアルを生成する。';

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
        $type = $this->option('type');

        if (is_null($type)) {
            $this->warn('無効なタイプです。');
            return 0;
        }

        if (config('app.env') == 'production') {
            if (!('prod-term1' == $type || 'production' == $type)) {
                $this->warn('本番とタイプが一致しません。');
                return 0;
            }
        }

        if (BtcSerial::count() > 0) {
            $this->warn('BTCシリアルは既に存在します。');
            return 0;
        }

        if ($this->confirm('実行しますか？')) {
            $btcSerials = collect(config('btc-serial.'.$type));

            $btcSerials->each(function ($btcSerial) {
                BtcSerial::create([
                    'btc_serial' => $btcSerial,
                ]);
            });

            $this->info("BTCシリアルが{$btcSerials->count()}個発行されました。");
        }

        return 0;
    }
}
