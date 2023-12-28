<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CheckBarcodeRequest;
use App\Enums\StampTypeEnum;
use App\Models\User;
use App\Models\Card;
use App\Models\Stamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class StampController extends Controller
{
    /**
     * get method mypage trasition
     *
     */
    public function index()
    {
        return redirect()->route('mypage');
    }

    /**
    * Show the barcode form.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function create()
    {
        $user = Auth::user();
        $today = Carbon::now();

        $countCreateStampNumber = Stamp::where('user_id', $user->id)->whereDate('created_at', $today)->get()->count();

        //スタンプ無限発行フラグ
        if(config('app.allow_stampcreate_anytime')) {
            $countCreateStampNumber = 0;
        }

        if ($countCreateStampNumber >= 1) {
            return redirect()->route('mypage');
        }

        $latestCard = Card::where('user_id', $user->id)->orderby('id',  'desc')->first();
        $cardId = isset($latestCard) ? $latestCard->id : 0;

        $latestCardInfo = Card::where('id', $cardId)->with('stamps')->first();

        if (empty($latestCardInfo)) {
            return view('user.barcodeForm');
        }
        $infoStampCount = isset($latestCardInfo) ? $latestCardInfo->stamps->count() : 0;
        $infoLotteryStatus= isset($latestCardInfo) ? $latestCardInfo->lottery_status : 0;
        if ($infoStampCount === 3 && $infoLotteryStatus == 1) {
            return redirect()->route('mypage');
        }
        return view('user.barcodeForm');
    }

    /**
     * Create stamp.
     *
     * @param int $request
     * @return void
     */
    public function store(CheckBarcodeRequest $request)
    {
        $user = Auth::user();

        if (empty($request->barcode)) {
            return redirect()->route('mypage');
        }

        $latestCardInfo = Card::where('user_id', $user->id)->orderby('id',  'desc')->first();
        $cardId = isset($latestCardInfo) ? $latestCardInfo->id : 0;
        $latestCardStatus = isset($latestCardInfo) ? $latestCardInfo->lottery_status : 0;

        $latestCardStampInfo = Stamp::where('card_id', $cardId)->get();
        $latestCardStampCount = isset($latestCardStampInfo) ? $latestCardStampInfo->count() : 0;

        if ($latestCardStampCount >= 3 && $latestCardStatus <= 1){
            return redirect()->route('mypage');
        }

        if (!$latestCardInfo) {
            $cardNumber = 1;
        } else {
            $cardNumber = $latestCardInfo->card_number + 1;
        }

        $barcode = $_POST['barcode'];
        $teibanCode = [
            '4901777332508',
            '4901777332522',
            '4901777337015',
            '4901777345430',
        ];

        $otokomaeCode = [
            '4901777340510',
            '4901777340534',
            '4901777349988',
            '4901777363526',
        ];

        $oitashiCode = [
            '4901777361607',
            '4901777361621',
            '4901777361645',
            '4901777364479',
        ];

        $shioCode = [
            '4901777365544',
            '4901777365568',
        ];
        if (in_array($barcode, $teibanCode)) {
            $user->teiban_flag = 1;
        } elseif(in_array($barcode, $otokomaeCode)) {
            $user->otokomae_flag = 1;
        } elseif(in_array($barcode, $oitashiCode)) {
            $user->oitashi_flag = 1;
        } elseif(in_array($barcode, $shioCode)) {
            $user->shio_flag = 1;
        } else {
            return redirect()->route('mypage');
        }
        $user->save();

        $stampType = StampTypeEnum::getBarcodeValue($request->barcode);

        if (empty($cardId) || $latestCardStampCount == 3) {
            DB::transaction(function () use($cardNumber, $stampType) {
                $newCard = Card::create([
                    'user_id' => Auth::id(),
                    'card_number' => $cardNumber,
                    ]);

                $newCardId = $newCard->id;

                Stamp::create([
                    'user_id' => Auth::id(),
                    'card_id' => $newCardId,
                    'stamp_type' => $stampType,
                ]);
            });
        } else {
            Stamp::create([
                'user_id' => Auth::id(),
                'card_id' => $cardId,
                'stamp_type' => $stampType,
            ]);
        }

        $stampCount = Stamp::where('user_id', Auth::id())->get()->count();
        Session::put('stampCount', $stampCount);
        return view('user.getStamp')->with(compact('stampType'));
    }
}
