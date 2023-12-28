<?php

namespace App\Http\Controllers\Admin;

use App\Enums\LotteryEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CardFilterRequest;
use App\Models\Card;
use App\Services\CsvHelperService;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class DataController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            $except = array_keys($validator->getMessageBag()->getMessages());

            return redirect()->route('admin.index', $request->except($except))
                ->withErrors($validator);
        }

        $cards = $this->getCardsData($request)->paginate($request->query('per_page', 10));
        $recodeCount = $cards->total();

        $tableColumns = $this->getTableColumns();

        return view('admin.index', compact('cards', 'tableColumns', 'recodeCount'));
    }

    /**
     * Download the search filter screen.
     */
    public function csvExport(Request $request, CsvHelperService $service) {
        $filename = 'user_csv_download_'.Carbon::now()->format('Y_m_d').'.csv';

        $header = [
            'マイページID',
            'TONARIWAID',
            '登録日',
            'カードNo.',
            'スタンプ数',
            '抽選日',
            '抽選ステータス',
            '当選確率',
            'BTCシリアル',
        ];

        $cards = $this->getCardsData($request)->get();

        $data = collect($cards)->map(function ($card) {
            $user = $card->user;

            return [
                'mypage_id' => $user->mypage_id,
                'tonariwa_id' => $user->tonariwa_id,
                'user_created_at' => isset($user) && isset($user->created_at) ? $user->created_at->format('Y/m/d H:i:s') : '',
                'card_number' => $card->card_number,
                'stamps' => $card->stamps()->count(),
                'lottery_date' => isset($card->lottery_date) ? $card->lottery_date->format('Y/m/d H:i:s') : '',
                'lottery_status' => LotteryEnum::getDisplayJPValue($card->lottery_status),
                'winning_rate' => $card->user->winning_rate,
                'btc_serial' => isset($card->user->btcSerial) ? $card->user->btcSerial->btc_serial : '',
            ];
        });

        return response()->stream(
            function () use ($data, $header, $service) {
                $fp = fopen('php://output', 'w');
                // stream_filter_prepend($fp, 'convert.iconv.utf-8/cp932', STREAM_FILTER_WRITE);
                fputcsv($fp, $header);

                fwrite($fp, $service->arr2csv($data));
                fclose($fp);
            },
            Response::HTTP_OK,
            [
                'Content-Encoding' => 'utf-8',
                'Content-type' => 'text/csv; charset=utf-8',
                'Content-Disposition' => 'attachment; filename='.$filename,
                'Pragma' => 'no-cache',
                'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
                'Expires' => '0',
                'Access-Control-Expose-Headers' => 'Content-Disposition',
            ]
        );
    }

    /**
     * Return the table name from specified column
     *
     * @param string $column
     * @return boolean
     */
    protected function isCorrectOrderColumn($column)
    {
        $allowedColumns = collect([
            'mypage_id', 'tonariwa_id', 'users.created_at', 'card_number',
            'stamps_count', 'lottery_date',  'lottery_status', 'winning_rate', 'btc_serial',
        ]);

        return $allowedColumns->contains($column);
    }

    /**
     * Generate the table column headers with attributes
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getTableColumns()
    {
        return collect([
            ['column' => 'mypage_id', 'html' => 'マイページ<br>ID'],
            ['column' => 'tonariwa_id', 'html' => 'TONARIWA<br>ID'],
            ['column' => 'users.created_at', 'html' => '登録日'],
            ['column' => 'card_number', 'html' => 'カード<br>No.'],
            ['column' => 'stamps_count', 'html' => 'スタンプ数'],
            ['column' => 'lottery_date', 'html' => '抽選日'],
            ['column' => 'lottery_status', 'html' => '抽選<br>ステータス'],
            ['column' => 'winning_rate', 'html' => '当選確率'],
            ['column' => 'btc_serial', 'html' => 'BTC<br>シリアル'],
        ]);
    }

    /**
     * Reuseable function for index and csv download
     */
    protected function getCardsData($request)
    {
        $cards = Card::select($this->getSelectStatements())
            ->with('user')
            ->with('user.btcSerial')
            ->searchFor('lottery_status', $request->status)
            ->whereHasSearchFor('user', 'mypage_id', $request->query('mypage_id'))
            ->whereHasSearchFor('user', 'tonariwa_id', $request->query('tonariwa_id'))
            ->whereHasSearchFor('user.btcSerial', 'btc_serial', $request->query('btc_serial'))
            ->whereHasSearchFor('user', 'winning_rate', $request->query('winning_rate'))
            ->join('users', 'cards.user_id', 'users.id')
            ->leftJoin('btc_serials', 'cards.user_id', 'btc_serials.user_id')
            ->withCount('stamps');


        if ($request->filled('created_start_at')) {
            $userStartAt = Carbon::parse($request->created_start_at)->format('Y/m/d');
            $cards->whereDate('users.created_at', '>=', $userStartAt);
        }

        if ($request->filled('created_end_at')) {
            $userEndAt = Carbon::parse($request->created_end_at)->format('Y/m/d');
            $cards->whereDate('users.created_at', '<=', $userEndAt);
        }

        if ($request->filled('lottery_start_at') || $request->filled('lottery_end_at')) {
            $cards->whereNotNull('lottery_date');

            if ($request->filled('lottery_start_at')) {
                $lotteryStartAt = Carbon::parse($request->lottery_start_at)->format('Y/m/d');
                $cards->whereDate('lottery_date', '>=', $lotteryStartAt);
            }

            if ($request->filled('lottery_end_at')) {
                $lotteryEndAt = Carbon::parse($request->lottery_end_at)->format('Y/m/d');
                $cards->whereDate('lottery_date', '<=', $lotteryEndAt);
            }
        }

        if ($this->isCorrectOrderColumn($request->query('col'))) {
            $cards->orderBy($request->query('col'), $request->query('order', 'asc'));
        }

        if ($request->filled('stamp')) {
            $cards = $cards->having('stamps_count', $request->query('stamp'));
        }

        return $cards;
    }

    /**
     * Get the select columns for index page
     *
     * @return array
     */
    protected function getSelectStatements()
    {
        return [
            'cards.id',
            'cards.card_number',
            'cards.lottery_date',
            'cards.lottery_status',
            'users.id AS user_id',
            'users.mypage_id',
            'users.tonariwa_id',
            'users.created_at AS users_created_at',
            'users.winning_rate',
            'btc_serials.user_id AS btc_user_id',
            'btc_serials.btc_serial',
        ];
    }

    /**
     * Return the validation rules
     */
    protected function rules()
    {
        return [
            'mypage_id' => ['sometimes', 'nullable'],
            'tonariwa_id' => ['sometimes', 'nullable'],
            'btc_serial' => ['sometimes', 'nullable'],
            'status' => ['sometimes', 'nullable', 'in:'.implode(',', LotteryEnum::getValues())],
            'created_start_at' => [
                'sometimes', 'nullable',
                'date_format:Y/m/d',
                'after_or_equal:'.config('app.campaign_period.start_at'),
                'before_or_equal:'.config('app.campaign_period.end_at'),
            ],
            'created_end_at' => [
                'sometimes', 'nullable',
                'date_format:Y/m/d',
                'after_or_equal:'.config('app.campaign_period.start_at'),
                'before_or_equal:'.config('app.campaign_period.end_at'),
            ],
            'lottery_start_at' => [
                'sometimes', 'nullable',
                'date_format:Y/m/d',
                'after_or_equal:'.config('app.campaign_period.start_at'),
                'before_or_equal:'.config('app.campaign_period.end_at'),
            ],
            'lottery_end_at' => [
                'sometimes', 'nullable',
                'date_format:Y/m/d',
                'after_or_equal:'.config('app.campaign_period.start_at'),
                'before_or_equal:'.config('app.campaign_period.end_at'),
            ],
            'winning_rate' => ['sometimes', 'nullable', 'in:'.implode(',', range(1,3))],
        ];
    }
}
