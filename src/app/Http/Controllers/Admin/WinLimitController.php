<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LotteryMaxmumNumber;
use App\Http\Requests\CheckCsvUploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SplFileObject;
use Carbon\Carbon;

class WinLimitController extends Controller
{
    /**
     * Show the lotteryMaxmumNumber.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $now = Carbon::now();

        $maxLotteryTries = LotteryMaxmumNumber::orderBy('max_tries_at', 'asc')->get();

        $winLimit = LotteryMaxmumNumber::where('max_tries_at', '>', $now)
            ->groupby('max_tries')
            ->orderby('id', 'asc')
            ->first();
        $winLimitId = $winLimit->id ?? 0;

        return view('admin.lotteryChange')->with(compact('maxLotteryTries', 'winLimitId'));
    }

    /**
     * function csv file import.
     *
     * @return
     */
    public function csvImport(CheckCsvUploadRequest $request)
    {
        $now = Carbon::now()->format('YmdHis');
        $fileName = 'upload'.$now.'.csv';
        $flashMessage = 'アップロードエラー。もう一度やり直してください。';

        if (!LotteryMaxmumNumber::latest()->exists()) {
            $flag = 'first';
        } elseif (LotteryMaxmumNumber::latest()->first()->flag == 'first'){
            $flag = 'second';
        } elseif (LotteryMaxmumNumber::latest()->first()->flag == 'second'){
            $flag = 'first';
        }

        if (Storage::disk('csv_uploads')->putFileAs('/', $request->file('csv_file'), $fileName)) {
            $filePath = Storage::disk('csv_uploads')->path($fileName);

            $splFileObject = new SplFileObject($filePath);
            $splFileObject->setFlags(
                \SplFileObject::READ_CSV |
                \SplFileObject::READ_AHEAD |
                \SplFileObject::SKIP_EMPTY |
                \SplFileObject::DROP_NEW_LINE
            );

            foreach ($splFileObject as $row) {
                $row[0] = preg_replace('/^\xEF\xBB\xBF/', '', $row[0]);
                $pida = mb_convert_encoding($row[0], 'UTF-8', 'SJIS');
                $maxTriesAt = mb_convert_encoding($row[1], 'UTF-8', 'SJIS');
                $maxTries = mb_convert_encoding($row[2], 'UTF-8', 'SJIS');

                $dateArr = str_split($maxTriesAt, 2);
                if (!(mb_strlen($maxTriesAt) === 14 && 0 < $dateArr['2'] && $dateArr['2'] <13 && 0 < $dateArr['3'] && $dateArr['3'] < 32 && 0 <= $dateArr['4'] && $dateArr['4'] < 24 && 0 <= $dateArr['5'] && $dateArr['5'] <60 && 0 <= $dateArr['6'] && $dateArr['6'] < 60)) {
                    Storage::disk('csv_uploads')->delete($fileName);
                    $flashMessage = "アップロードエラー。csvファイルの日付データに不適合なデータが含まれています。";
                    return redirect()->route('admin.lotteryChange.index')->with('flash_message', $flashMessage);
                }
            }

            foreach ($splFileObject as $row) {
                $row[0] = preg_replace('/^\xEF\xBB\xBF/', '', $row[0]);
                $pida = mb_convert_encoding($row[0], 'UTF-8', 'SJIS');
                $maxTriesAt = mb_convert_encoding($row[1], 'UTF-8', 'SJIS');
                $maxTries = mb_convert_encoding($row[2], 'UTF-8', 'SJIS');
                LotteryMaxmumNumber::create([
                    'pida' => $pida,
                    'max_tries_at' => new Carbon($maxTriesAt),
                    'max_tries' => $maxTries,
                    'flag' => $flag,
                ]);
            }
            Storage::disk('csv_uploads')->delete($fileName);
            $flashMessage = 'アップロード完了';
        }
        if (LotteryMaxmumNumber::latest()->first()->flag == 'first'){
            LotteryMaxmumNumber::where('flag', 'second')->delete();
        } elseif (LotteryMaxmumNumber::latest()->first()->flag == 'second'){
            LotteryMaxmumNumber::where('flag', 'first')->delete();
        }

        return redirect()->route('admin.lotteryChange.index')->with('flash_message', $flashMessage);
    }
}
