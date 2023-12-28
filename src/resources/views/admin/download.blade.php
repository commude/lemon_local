@extends('admin.layouts.admin', ['page' => 'download'])

@section('title', 'レポートCSVダウンロード')

@push('styles')
<link href="{{ asset('admin') }}/css/lemonsour_admin_dl.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<x-admin.search>
    <x-slot name="title">レポートCSVダウンロード</x-slot>
</x-admin.search>

<main>
    <form action="{{ route('admin.download.export') }}" method="POST" autocomplete="off">
        @csrf
        <div class="box_status_dl_main">
            <div class="box_main_input">
                <span class="title_search_01">期間指定</span>
                <lable class="lable_input">
                    <input type="text" id="datepicker1" @error('date_start')class="err"@enderror name="date_start" value="{{ request()->old('date_start') }}">
                    <span class="user_tilde">~</span>
                    <input type="text" id="datepicker2" @error('date_end')class="err"@enderror name="date_end" value="{{ request()->old('date_end') }}">
                </lable>
            </div>
            @if ($errors->has('date_start') || $errors->has('date_end'))
                <p class="title_search_err">※キャンペーン期間内でご入力下さい。</p>
            @endif
            <div class="box_main_btn">
                <input type="image" class="csv_btn" src="{{ asset('admin') }}/images/btn_csv.jpg" width="160" height="30" alt="CSVダウンロード"/>
            </div>
        </div>
    </form>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-14">
                <div class="card">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="daily_table">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script type="text/javascript">
    $(function() {
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
    });
</script>
@endpush
