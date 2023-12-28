@extends('user.layouts.app')

@section('title', 'こだわり酒場のレモンサワー3兄弟の店の味！飲み比べキャンペーン | サントリー')

@section('content')
<div class="contents_wrapper my_page">
    <div id="fixed_area" class="fixed_area">
        @if($countCreateStampNumber >= 1)
            <div class="camera_btn"><img src="{{ asset('user/img') }}/mypage/camera_fix_no_stamp.png"></div>
            </p>
        @else
            @if($stampCount === 3 && $latestCardStatus === 1)
                <button class="disabled_error" onclick="dataLayer.push({event:'gaEvent',params:['mypage_camera_top_button', 'click', 'mypage_error_popup']});"><img src="{{ asset('user/img') }}/mypage/camera_fix.png"></button>
                <p class="attention">
                    ※カメラ起動時に「キャンセル」をされた方は<br>ページを更新してから改めてカメラを起動してください<br>
                    <a href="{{ route('qa') }}#q3-6" target="_blank" rel="opener">カメラが起動しない場合はこちら</a>
                </p>
            @else
                <a class="js-modal-open" href="" onclick="dataLayer.push({event:'gaEvent',params:['mypage_camera_top_button', 'click', 'mypage_camera']});"><button class="camera_btn"><img src="{{ asset('user/img') }}/mypage/camera_fix.png"></button></a>
                <p class="attention">
                    ※タップでカメラが起動します<br>
                    ※カメラ起動時に「キャンセル」をされた方は<br>ページを更新してから改めてカメラを起動してください<br>
                    <a href="{{ route('qa') }}#q3-6" target="_blank" rel="opener">カメラが起動しない場合はこちら</a>
                </p>
            @endif
        @endif
    </div>
    <div class="modal js-modal">
        <div class="modal__bg"></div>
        <div class="modal__content">
            <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
    <h1 class="kv"><img src="{{ asset('user/img') }}/mypage/kv.jpg" alt="こだわり酒場のレモンサワー3兄弟の店の味！飲み比べキャンペーン"></h1>
    <div class="qa">
        <a class="qa_btn box_link" id="qa" onclick="dataLayer.push({event:'gaEvent',params:['mypage_qa_button', 'click', 'qa']});"><img src="{{ asset('user/img') }}/mypage/qa_btn.png" alt="キャンペーンQ&A"></a>
    </div>
    <div class="status_area">
        <div class="stamp_area_wrapper">
            <span id="stamp_card"></span>
            <div class="stamp_area swiper-container">
                <div class="swiper-wrapper">
                    @if(!App\Models\Stamp::where('user_id', Auth::id())->exists())
                        <div class="swiper-slide">
                            <div class="card">
                            </div>
                            <div class="stamp_btn"><img src="{{ asset('user/img') }}/mypage/stamp_btn01.png"></div>
                        </div>
                    @else
                        @foreach ( $stampAll as $stampMid)
                            <div class="swiper-slide">
                                <div class="card">
                                    @foreach ( $stampMid as $stamp)
                                        @if ($count == $stampCountAll)
                                            @if ($stamp['stamp_type'] <= 3)
                                                <img class="anime" src="{{ asset('user/img') }}/mypage/stamp1.png">
                                            @elseif ($stamp['stamp_type'] >= 4 && $stamp['stamp_type'] <= 7)
                                                <img class="anime" src="{{ asset('user/img') }}/mypage/stamp2.png">
                                            @elseif ($stamp['stamp_type'] >= 8 && $stamp['stamp_type'] <= 11)
                                                <img class="anime" src="{{ asset('user/img') }}/mypage/stamp3.png">
                                            @elseif ($stamp['stamp_type'] >= 12)
                                                <img class="anime" src="{{ asset('user/img') }}/mypage/stamp4.png">
                                            @endif
                                        @else
                                            @if ($stamp['stamp_type'] <= 3)
                                                <img src="{{ asset('user/img') }}/mypage/stamp1.png">
                                            @elseif ($stamp['stamp_type'] >= 4 && $stamp['stamp_type'] <= 7)
                                                <img src="{{ asset('user/img') }}/mypage/stamp2.png">
                                            @elseif ($stamp['stamp_type'] >= 8 && $stamp['stamp_type'] <= 11)
                                                <img src="{{ asset('user/img') }}/mypage/stamp3.png">
                                            @elseif ($stamp['stamp_type'] >= 12)
                                                <img src="{{ asset('user/img') }}/mypage/stamp4.png">
                                            @endif
                                            <?php $count++ ?>
                                        @endif
                                    @endforeach
                                </div>
                                @if ($winCheck)
                                    <p class="attention red">発送先登録期限：2021年8月31日(火) 23：59</p>
                                @endif
                                @if (count($stampMid) != 3 && App\Models\Card::where('id', $stamp['card_id'])->first()->lottery_status == 1)
                                    <img class="stamp_btn" src="{{ asset('user/img') }}/mypage/stamp_btn01.png">
                                @elseif (count($stampMid) == 3 && App\Models\Card::where('id', $stamp['card_id'])->first()->lottery_status == 1)
                                    <form action={{ route('lottery')}} method='POST'>
                                        @csrf
                                        <input class= "stamp_btn" type=image src="{{ asset('user/img') }}/mypage/stamp_btn02.png">
                                    </form>
                                @elseif (count($stampMid) == 3 && App\Models\Card::where('id', $stamp['card_id'])->first()->lottery_status == 2)
                                    <img class="stamp_btn" src="{{ asset('user/img') }}/mypage/stamp_btn04.png">
                                @elseif (count($stampMid) == 3 && App\Models\Card::where('id', $stamp['card_id'])->first()->lottery_status == 3)
                                    <form action={{ route('btcForm')}} method='POST'>
                                        @csrf
                                        <input class= "stamp_btn" type=image src="{{ asset('user/img') }}/mypage/stamp_btn03.png">
                                    </form>
                                @elseif (count($stampMid) == 3 && App\Models\Card::where('id', $stamp['card_id'])->first()->lottery_status == 4)
                                    <form action={{ route('btcForm')}} method='POST'>
                                        @csrf
                                        <input class= "stamp_btn" type=image src="{{ asset('user/img') }}/mypage/stamp_btn03.png">
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <p class="attention">※抽選後に新たにバーコードを読み込むと<br>新しいスタンプカードが発行されます。</p>
                <div class="nav">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
        <div class="percentage_area">
            <div class="inner">
                <p class="title">
                    現在の当選確率:<span class="num">{{ $user->winning_rate}}</span>倍
                </p>
                <ul class="img_list">
                    <li @if(!empty($user->teiban_flag)) class="sumi" @endif><img src="{{ asset('user/img') }}/mypage/percentage_kan01.png"></li>
                    <li @if(!empty($user->otokomae_flag)) class="sumi" @endif><img src="{{ asset('user/img') }}/mypage/percentage_kan02.png"></li>
                    <li @if(!empty($user->oitashi_flag)) class="sumi" @endif><img src="{{ asset('user/img') }}/mypage/percentage_kan03.png"></li>
                    <li @if(!empty($user->shio_flag)) class="sumi" @endif><img src="{{ asset('user/img') }}/mypage/percentage_kan04.png"></li>
                </ul>
                @switch($flagSum)
                    @case(0)
                        <p class="text">
                            2種飲んで登録すると<br>
                            当選確率が<span class="num">2</span>倍に！
                        </p>
                        @break
                    @case(1)
                        <p class="text">
                            もう1種飲んで2種登録すると<br>
                            当選確率が<span class="num">2</span>倍に！
                        </p>
                        @break
                    @case(2)
                        <p class="text">
                            さらにもう1種飲んで3種登録すると<br>
                            当選確率が<span class="num">3</span>倍に！
                        </p>
                        @break
                    @case(3)
                        <p class="text">
                            飲み比べ3種達成<br>
                            あなたは当選確率<span class="num">3</span>倍です！
                        </p>
                        @break
                    @case(4)
                        <p class="text">
                            飲み比べコンプリート<br>
                            あなたは当選確率<span class="num">3</span>倍です！
                        </p>
                        @break
                @endswitch
            </div>
        </div>
    </div>
    <div>
        <div id="scan_area" class="scan_area"></div>
    </div>
    <div id="camera_area" class="camera_area">
        <a id="guide" onclick="dataLayer.push({event:'gaEvent',params:['mypage_guide_button', 'click', 'guide']});"><img src="{{ asset('user/img') }}/top/entry_btn.png" alt="応募要項を確認する"></a>
        @if($countCreateStampNumber >= 1)
            <div class="camera_btn"><img src="{{ asset('user/img') }}/mypage/camera_fix_no_stamp.png"></div>
        @else
            @if($stampCount === 3 && $latestCardStatus === 1)
                <button class="disabled_error" onclick="dataLayer.push({event:'gaEvent',params:['mypage_camera_bottom_button', 'click', 'mypage_error_popup']});"><img src="{{ asset('user/img') }}/mypage/camera_btn.png"></button>
            @else
                <a class="js-modal-open" href="" onclick="dataLayer.push({event:'gaEvent',params:['mypage_camera_bottom_button', 'click', 'mypage_camera']});"><button class="camera_btn"><img src="{{ asset('user/img') }}/mypage/camera_btn.png"></button></a>
            @endif
        @endif
        <p class="attention">
            @if(!$countCreateStampNumber >= 1)
                @if(!($stampCount === 3 && $latestCardStatus === 1))
                    ※タップでカメラが起動します。<br>
                    <a href="{{ route('barcodeForm') }}">カメラ読み込みができない方はこちらへ</a>
                @endif
            @endif
        </p>
        <p class="id">
            マイページID:<span id="barcode_result">{{ $user->mypage_id }}</span>
        </p>
        <div class=form_data>
            <form action="{{ route('getStamp') }}" method="post">
                @csrf
                <input id="target" name="barcode">
                <input type="submit" id="submitbtn">
            </form>
        </div>
    </div>
    <div class="menu">
        <div class="cp_linetab">
            <input id="tab-1" name="tabs" type="checkbox" onclick="dataLayer.push({event:'gaEvent',params:['mypage_tab-flow', 'click', 'mypage_flow']});"/>
                <label for="tab-1">
                        <img src="{{ asset('user/img') }}/mypage/tab_menu-1.png">
                </label>
            <div class="cp_linetab-content">
                <img src="{{ asset('user/img') }}/mypage/tab-1.png">
            </div>
        </div>
        <div class="cp_linetab">
            <input id="tab-2" name="tabs" type="checkbox" onclick="dataLayer.push({event:'gaEvent',params:['mypage_tab-introduction', 'click', 'mypag_introduction']});"/>
                <label for="tab-2">
                    <img src="{{ asset('user/img') }}/mypage/tab_menu-2.png">
                </label>
            <div class="cp_linetab-content">
                <img src="{{ asset('user/img') }}/mypage/tab-2.png">
            </div>
        </div>
        <div class="cp_linetab">
            <input id="tab-3" name="tabs" type="checkbox" onclick="dataLayer.push({event:'gaEvent',params:['mypage_tab-product', 'click', 'product']});"/>
                <label for="tab-3">
                        <img src="{{ asset('user/img') }}/mypage/tab_menu-3.png">
                </label>
            <div class="cp_linetab-content">
                <img src="{{ asset('user/img') }}/mypage/tab-3.png">
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{ asset('user/js') }}/iscroll.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script type="text/javascript" src="{{ asset('js/quagga.js') }}"></script>
<script>
    $(function(){
        $(window).scroll(function (){
            $("#camera_area").each(function(){
                var imgPos = $(this).offset().top;
                var scroll = $(window).scrollTop();
                var windowHeight = $(window).height();
                if (scroll > imgPos - windowHeight + windowHeight/5){
                    $("#fixed_area").addClass("fade_off");
                } else {
                    $("#fixed_area").removeClass("fade_off");
                }
            });
        });

        document.getElementById('qa').onclick = function() {
            win = window.open("{{ route('qa') }}");
        }

        document.getElementById('guide').onclick = function() {
            win = window.open("{{ route('guide') }}");
        }
    });
</script>
<script>
    const swiper = new Swiper('.swiper-container', {
        // Optional parameters
        initialSlide: -1,
        loop: true,
        spaceBetween: 30,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            renderBullet: function (index, className) {
                return '<span class="' + className + '">' + (index + 1) + "</span>";
            },
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>

<script>
    function barcodeRead() {
        //select device
        const cameraDeviceIds = [];
        navigator.mediaDevices.enumerateDevices().then(function(mediaDevices) {
            for (let len = mediaDevices.length, i = 0; i < len; i++) {
                const item = mediaDevices[i];
                if (item.kind === "videoinput") {
                    const deviceId = item.deviceId;
                    const label = item.label;
                    cameraDeviceIds.push({ deviceId, label });
                }
            }
            deviceCount = cameraDeviceIds.length;
            if (deviceCount <= 1) {
                var deviceId = '';
            } else {
                var deviceId = cameraDeviceIds[deviceCount - 1]['deviceId'];
            }

            Quagga.init({
                inputStream: {
                    numOfWorkers: 0,
                    frequency: 1,
                    name: 'Live',
                    type: 'LiveStream',
                    target: document.querySelector('.modal__bg'),
                    constraints: {
                        decodeBarCodeRate: 3,
                        successTimeout: 500,
                        codeRepetition: false,
                        tryVertical: true,
                        frameRate: 15,
                        width: 640,
                        height: 480,
                        facingMode: 'environment',
                        deviceId: deviceId,
                    },
                },
                decoder: {
                    readers: [{
                        format: 'ean_reader',
                        config: {}
                    }]
                }
            }, (err) => {
                if (err) {
                    return;
                }
                Quagga.start();
                _scannerIsRunning = true;
            });
            Quagga.onDetected(_onDetected);
        });
    };

    $(function(){
        $('.disabled_error').on('click', function(){
            alert('スタンプカードの抽選をおこなわないとスタンプ発行ができません。');
            window.location.href = "{{ route('mypage') }}#stamp_card";
        });

        var dayStamp = <?php echo json_encode($countCreateStampNumber); ?>;
        if (dayStamp <= 0) {
            $('.camera_btn').on('click',function(){
                $('.js-modal').fadeIn(function() {

                    barcodeRead();
                    $('.fixed_area').css('display', 'none');
                    errorTimer();
                });
                return false;
            });
        }

        $('.js-modal-close').on('click',function(){
            $('.js-modal').fadeOut();
            Quagga.stop();
            Quagga.offDetected(_onDetected);
            $('.fixed_area').css('display', 'block');
            clearTimeout(id);
            return false;
        });

       function errorTimer() {
            id = setTimeout(function() {
                Quagga.stop();
                Quagga.offDetected(_onDetected);
                $('.fixed_area').css('display', 'block');
                $('.js-modal').fadeOut();
                alert("バーコードリーダータイムエラー\nバーコードがうまく読み込まれませんでした。\nもう一度行うか、「カメラ読み込みができない方はこちらへ」からバーコード入力をお試し下さい。");
            }, 60 * 1000);
       }
    });

    var count = 0;
    var missCount = 0;
    var errorCodes = [];

    function _onDetected(result) {
        count = ++count;
        var truthCode = [
            '4901777332508',
            '4901777332522',
            '4901777337015',
            '4901777345430',
            '4901777340510',
            '4901777340534',
            '4901777349988',
            '4901777363526',
            '4901777361607',
            '4901777361621',
            '4901777361645',
            '4901777364479',
            '4901777365544',
            '4901777365568',
        ];
        if(truthCode.includes(result.codeResult.code)) {
            Quagga.stop();
            Quagga.offDetected(_onDetected);
            clearTimeout(id);
            $('.js-modal').fadeOut(function() {
                $('.fixed_area').css('display', 'block');
            });
            document.getElementById( "target" ).value = result.codeResult.code ;
            document.getElementById("submitbtn").click();
            return;
        }
        missCount = ++missCount;
        errorCodes.push(result.codeResult.code);
        if (missCount > 10) {
            Quagga.stop();
            Quagga.offDetected(_onDetected);
            errorCodes.length = 0;
            missCount = 0;
            $('.js-modal').fadeOut(function() {
                $('.fixed_area').css('display', 'block');
            });
            clearTimeout(id);
            alert('バーコード入力エラー\n入力されたバーコードは今回のキャンペーン対象商品と一致しません。');
        }
        return;
    }

</script>
@endpush
