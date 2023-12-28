@extends('admin.layouts.admin', ['page' => 'index'])

@section('title', 'ユーザー一覧')

@section('content')
<x-admin.search>
    <x-slot name="title">ユーザー一覧</x-slot>

    <hr class="hr1">
    <div id="box_user_search" class="content_area">
        <form id="card_filter" action="{{ route('admin.index') }}" method="GET" autocomplete="off">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td noWrap><span class="title_search_01">マイページID</span></td>
                        <td><lable class="lable_input"><input type="text" name="mypage_id" value="{{ request()->query('mypage_id') }}"></lable></td>
                        <td noWrap><span class="title_search_01">TONARIWA ID</span></td>
                        <td><lable class="lable_input"><input type="text" name="tonariwa_id" value="{{ request()->query('tonariwa_id') }}"></lable></td>
                        <td noWrap><span class="title_search_01">BTCシリアル</span></td>
                        <td><lable class="lable_input"><input type="text" name="btc_serial" value="{{ request()->query('btc_serial') }}"></lable></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td noWrap>
                            <span class="title_search_01">登録日</span>
                        </td>
                        <td>
                            <lable class="lable_input">
                                <input @error('created_start_at')class="err"@enderror name="created_start_at" type="text" id="datepicker1" value="{{ request()->query('created_start_at') }}">
                                <span class="user_tilde">~</span>
                                <input @error('created_end_at')class="err"@enderror name="created_end_at" type="text" id="datepicker2" value="{{ request()->query('created_end_at') }}">
                            </lable>
                        </td>
                        <td noWrap>
                            <span class="title_search_01">抽選日</span>
                        </td>
                        <td>
                            <lable class="lable_input">
                                <input @error('lottery_start_at')class="err"@enderror name="lottery_start_at" type="text" id="datepicker3" value="{{ request()->query('lottery_start_at') }}">
                                <span class="user_tilde">~</span>
                                <input @error('lottery_end_at')class="err"@enderror name="lottery_end_at" type="text" id="datepicker4" value="{{ request()->query('lottery_end_at') }}">
                            </lable>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="user_search_td_01">
                            @if ($errors->has('created_start_at') || $errors->has('created_end_at'))
                            <span class="title_search_02 err">※キャンペーン期間内でご入力下さい。</span>
                            @else
                            <span class="title_search_02">※キャンペーン期間内でご入力下さい。</span>
                            @endif
                        </td>
                        <td></td>
                        <td class="user_search_td_01">
                            @if ($errors->has('lottery_start_at') || $errors->has('lottery_end_at'))
                            <span class="title_search_02 err">※キャンペーン期間内でご入力下さい。</span>
                            @else
                            <span class="title_search_02">※キャンペーン期間内でご入力下さい。</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr class="hr2">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td noWrap><span class="title_search_01">スタンプ数</span></td>
                        <td>
                            <select class="user_select" name="stamp">
                                <option value="" {{ request()->query('stamp') == '' ? 'selected' : '' }}></option>
                                @for($i = 1; $i <= 3; $i++ )
                                <option value="{{ $i}}" {{ request()->query('stamp') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </td>
                        <td noWrap>
                            <span class="title_search_01">当選確率</span>
                        </td>
                        <td>
                            <select class="user_select" name="winning_rate">
                                <option value="" {{ request()->query('winning_rate') == '' ? 'selected' : '' }}></option>
                                @for($i = 1; $i <= 3; $i++ )
                                <option value="{{ $i }}" {{ request()->query('winning_rate') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </td>
                        <td noWrap>
                            <span class="title_search_01">抽選ステータス</span>
                        </td>
                        <td>
                            <select class="user_select" name="status">
                                <option value="" {{ request()->query('status') == '' ? 'selected' : '' }}></option>
                                @for($i = 1; $i <= 4; $i++)
                                <option value="{{ $i }}" {{ request()->query('status') == $i ? 'selected' : '' }}>{{ App\Enums\LotteryEnum::getDisplayJPValue($i) }}</option>
                                @endfor
                            </select>
                        </td>
                        <td class="user_search_td_02">
                            <input class="btn" type="image" src="{{ asset('admin/images') }}/btn_search.jpg" width="160" height="40" alt="絞り込み検索"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</x-admin.search>

<status>
    <div class="box_status_main">
        <div class="box_status_left">検索条件</div>
        <div class="box_status_right">
            <span class="status_text">
                @if (request()->filled('mypage_id'))
                マイページID: {{ request()->query('mypage_id') }}
                @endif
                @if (request()->filled('tonariwa_id'))
                TONARIWA ID: {{ request()->query('tonariwa_id') }}
                @endif
                @if (request()->filled('btc_serial'))
                BTC シリアル: {{ request()->query('btc_serial') }}
                @endif
                @if (request()->filled('created_start_at') || request()->filled('created_end_at'))
                登録日：{{ request()->query('created_start_at') }}~{{ request()->query('created_end_at') }}
                @endif
                @if (request()->filled('lottery_start_at') || request()->filled('lottery_end_at'))
                抽選日：{{ request()->query('lottery_start_at') }}~{{ request()->query('lottery_end_at') }}
                @endif
                @if (request()->filled('stamp'))
                スタンプ数：{{ request()->query('stamp') }}
                @endif
                @if (request()->filled('winning_rate'))
                当選確率：{{ request()->query('winning_rate') }}
                @endif
                @if (request()->filled('status'))
                抽選ステータス：{{ \App\Enums\LotteryEnum::getDisplayJPValue(request()->query('status')) }}
                @endif
            </span>
        </div>
    </div>
</status>
<list>
    <div id="list_header">
        <div class="list_num">
            <select class="user_select" name="per_page">
                <option value="10" {{ request()->query('per_page') == 10 ? 'selected' : '' }}>　10件　</option>
                <option value="50" {{ request()->query('per_page') == 50 ? 'selected' : '' }}>　50件　</option>
                <option value="100" {{ request()->query('per_page') == 100 ? 'selected' : '' }}>　100件　</option>
            </select>
        </div>
        <form id="csv_export_form" action="{{ route('admin.csvExport') }}" method="POST">
            @csrf
            <div class="list_btn_csv">
                @if ($recodeCount <= 10000)
                    <input class="csv_btn" type="image" src="{{ asset('admin') }}/images/btn_csv.jpg" alt="CSVダウンロード">
                @else
                    <input class="csv_btn gray" type="image" src="{{ asset('admin') }}/images/btn_csv_gray.jpg" disabled="disabled" alt="CSVダウンロード">
                @endif
            </div>
        </form>
    </div>

    <div id="list_result">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    @foreach($tableColumns as $tableColumn)
                    <th scope="col" class="orderable{{ request()->query('col') == $tableColumn['column'] && request()->query('order') == 'asc' ? ' top' : '' }}" data-column="{{ $tableColumn['column'] }}">{!! $tableColumn['html'] !!}</th>
                    @endforeach
                </tr>
                @foreach ($cards as $card)
                <tr>
                    <td>{{ $card->user->mypage_id }}</td>
                    <td>{{ $card->user->tonariwa_id }}</td>
                    <td>{{ isset($card->user->created_at) ? $card->user->created_at->format('Y/m/d H:i:s') : '' }}</td>
                    <td>{{ $card->card_number }}</td>
                    <td>{{ $card->stamps_count }}</td>
                    <td>{{ isset($card->lottery_date) ? $card->lottery_date->format('Y/m/d H:i:s') : '' }}</td>
                    <td>{{ \App\Enums\LotteryEnum::getDisplayJPValue($card->lottery_status) }}</td>
                    <td>{{ $card->user->winning_rate }}</td>
                    <td>{{ isset($card->user->btcSerial) ? $card->user->btcSerial->btc_serial : '' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</list>
<paging>
    {{ $cards->withQueryString()->links('pagination::default') }}
</paging>
@endsection

@push('scripts')
<script src="{{ asset('admin/js') }}/encoding.min.js"></script>
<script type="text/javascript">
    $(function() {
        /**
        * Get the URL parameter value
        *
        * @param  name {string} パラメータのキー文字列
        * @return  url {url} 対象のURL文字列（任意）
        */
        function getParam(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }

        $('select[name="per_page"]').on('change', function (e) {
            $('<input>').attr({
                type: 'hidden',
                name: 'per_page',
                value: $(this).val(),
            }).appendTo('#card_filter');

            var column = getParam('col');
            var order = getParam('order');

            $('<input>', {
                'type': 'hidden',
                'name': 'col',
                'value': column
            }).appendTo('#card_filter');

            $('<input>', {
                'type': 'hidden',
                'name': 'order',
                'value': order
            }).appendTo('#card_filter');

            $('#card_filter').submit();
        });

        $('.orderable').on('click', function (e) {
            var column = $(this).data('column');
            var order = $(this).hasClass('top') ? 'desc' : 'asc';

            $('<input>', {
                'type': 'hidden',
                'name': 'col',
                'value': column
            }).appendTo('#card_filter');

            $('<input>', {
                'type': 'hidden',
                'name': 'order',
                'value': order
            }).appendTo('#card_filter');

            var per_page = getParam('per_page');

            $('<input>').attr({
                type: 'hidden',
                name: 'per_page',
                value: per_page,
            }).appendTo('#card_filter');

            $('#card_filter').submit();
        });

        $( "#datepicker1" ).datepicker({
            dateFormat: 'yy/mm/dd',
            showButtonPanel: true,
            currentText: "今日",
            closeText: "Close"
        });

        $( "#datepicker2" ).datepicker({
            dateFormat: 'yy/mm/dd',
            showButtonPanel: true,
            currentText: "今日",
            closeText: "Close"
        });

        $( "#datepicker3" ).datepicker({
            dateFormat: 'yy/mm/dd',
            showButtonPanel: true,
            currentText: "今日",
            closeText: "Close"
        });

        $( "#datepicker4" ).datepicker({
            dateFormat: 'yy/mm/dd',
            showButtonPanel: true,
            currentText: "今日",
            closeText: "Close"
        });

        $('#csv_export_form').on('submit', function (e) {
            e.preventDefault();
            var filterInputData = $('#card_filter :input').serializeArray();

            $('.csv_btn').attr({
                src: "{{ asset('admin') }}/images/btn_csv_gray.jpg",
                disabled: true,
            });

           $.ajax({
                type: 'POST',
                async: true,
                url: $(this).attr('action') + '?' + $.param(filterInputData),
                headers: {
                    'X-CSRF-TOKEN': $(this).find('input[name="_token"]').val(),
                },
                // data: JSON.stringify(filterInputData),
                success: function (response, status, xhr) {
                    var filename = "download.csv";
                    var disposition = xhr.getResponseHeader('Content-Disposition');
                    if (disposition && disposition.indexOf('attachment') !== -1) {
                        var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                        var matches = filenameRegex.exec(disposition);
                        if (matches != null && matches[1]) {
                            filename = matches[1].replace(/['"]/g, '');
                        }
                    }

                    downloadCsv(response, filename);
                },
                complete: function (jqXHR, textStatus) {
                    $('.csv_btn').attr({
                        src: "{{ asset('admin') }}/images/btn_csv.jpg",
                        disabled: false,
                    });
                },
            });
        });
    });

    function downloadCsv(data, filename) {
        if(data!=""){
            var strRt = Encoding.stringToCode(data);
            var arrRt = Encoding.convert(strRt, "SJIS", "UNICODE");
            var u8a = new Uint8Array(arrRt);
            var downloadData = new Blob([u8a], {type: "text/csv"});
            //ファイルのダウンロードにはブラウザ毎に処理を分けます
            if(window.navigator.msSaveBlob){ // for IE
                window.navigator.msSaveBlob(downloadData, filename);
            } else {
                var downloadUrl  = (window.URL || window.webkitURL).createObjectURL(downloadData);
                var link = document.createElement("a");
                link.href = downloadUrl;
                link.download = filename;
                link.click();
                (window.URL || window.webkitURL).revokeObjectURL(downloadUrl);
            }
        }
    }
</script>
@endpush
