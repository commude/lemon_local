<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReportDownloadRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\DailyData;
use App\Services\CsvHelperService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DailyDataController extends Controller
{
    /**
     * Show the daily data.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return view('admin.download');
    }

    /**
     * Download daily data from date range.
     *
     * @param \App\Http\Requests\Admin\ReportDownloadRequest $request
     * @param \App\Services\CsvHelperService $service
     */
    public function export(ReportDownloadRequest $request, CsvHelperService $service)
    {
        $header = $this->prepareCsvHeaders();

        $dailyReport = DailyData::select($this->prepareSelectStatements())
            ->whereDate('date', '>=', $request->date_start)
            ->whereDate('date', '<=', $request->date_end)
            ->groupBy('date')
            ->oldest('date')
            ->get();

        $data = collect($dailyReport)->map(function ($report) {
            return [
                'date' => $report->date->format('Y/m/d'),
                'new_register_count' => $report->new_register_count,
                'first_lottery_count' => $report->first_lottery_count,
                'all_lottery_count' => $report->all_lottery_count,
                'jan_code_0' => $report->jan_code_0,
                'jan_code_1' => $report->jan_code_1,
                'jan_code_2' => $report->jan_code_2,
                'jan_code_3' => $report->jan_code_3,
                'jan_code_4' => $report->jan_code_4,
                'jan_code_5' => $report->jan_code_5,
                'jan_code_6' => $report->jan_code_6,
                'jan_code_7' => $report->jan_code_7,
                'jan_code_8' => $report->jan_code_8,
                'jan_code_9' => $report->jan_code_9,
                'jan_code_10' => $report->jan_code_10,
                'jan_code_11' => $report->jan_code_11,
                'jan_code_12' => $report->jan_code_12,
                'jan_code_13' => $report->jan_code_13,
                'win_count' => $report->win_count,
            ];
        });

        $filename = 'レポートCSVダウンロード_' . Carbon::now()->format('Y_m_d') . '.csv';

        return response()->stream(
            function () use ($data, $header, $service) {
                $fp = fopen('php://output', 'w');
                // stream_filter_prepend($fp, 'convert.iconv.utf-8/cp932', STREAM_FILTER_WRITE);
                fputcsv($fp, mb_convert_encoding($header, 'SJIS-win', 'UTF-8'));

                fwrite($fp, $service->arr2csv($data));
                fclose($fp);
            },
            Response::HTTP_OK,
            [
                'Content-type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename=' . $filename . '',
                'Pragma' => 'no-cache',
                'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
                'Expires' => '0',
                'Access-Control-Expose-Headers' => 'Content-Disposition',
            ]
        );
    }

    /**
     * Prepare Select Statement's headers.
     *
     * @return array
     */
    protected function prepareSelectStatements()
    {
        return [
            DB::raw('DATE(date) AS date'),
            DB::raw('SUM(new_register_count) AS new_register_count'),
            DB::raw('SUM(first_lottery_count) AS first_lottery_count'),
            DB::raw('SUM(all_lottery_count) AS all_lottery_count'),
            DB::raw('SUM(jan_code_0) AS jan_code_0'),
            DB::raw('SUM(jan_code_1) AS jan_code_1'),
            DB::raw('SUM(jan_code_2) AS jan_code_2'),
            DB::raw('SUM(jan_code_3) AS jan_code_3'),
            DB::raw('SUM(jan_code_4) AS jan_code_4'),
            DB::raw('SUM(jan_code_5) AS jan_code_5'),
            DB::raw('SUM(jan_code_6) AS jan_code_6'),
            DB::raw('SUM(jan_code_7) AS jan_code_7'),
            DB::raw('SUM(jan_code_8) AS jan_code_8'),
            DB::raw('SUM(jan_code_9) AS jan_code_9'),
            DB::raw('SUM(jan_code_10) AS jan_code_10'),
            DB::raw('SUM(jan_code_11) AS jan_code_11'),
            DB::raw('SUM(jan_code_12) AS jan_code_12'),
            DB::raw('SUM(jan_code_13) AS jan_code_13'),
            DB::raw('SUM(win_count) AS win_count'),
        ];
    }

    /**
     * Prepare CSV's headers.
     *
     * @return array
     */
    protected function prepareCsvHeaders()
    {
        return [
            '日付け',
            '登録ユーザー数',
            '新規抽選数',
            '全抽選数',
            'レモンサワー350登録スタンプ数',
            'レモンサワー500登録スタンプ数',
            'レモンサワー350  6缶パック  登録スタンプ数',
            'レモンサワー500  6缶パック  登録スタンプ数',
            'キリッと男前350登録スタンプ数',
            'キリッと男前500登録スタンプ数',
            'キリッと男前350  6缶パック  登録スタンプ数',
            'キリッと男前500  6缶パック  登録スタンプ数',
            '追い足しレモン350登録スタンプ数',
            '追い足しレモン500登録スタンプ数',
            '追い足しレモン350  6缶パック  登録スタンプ数',
            '追い足しレモン500  6缶パック  登録スタンプ数',
            '夏の塩レモン350登録スタンプ数',
            '夏の塩レモン500登録スタンプ数',
            '当選数',
        ];
    }
}
