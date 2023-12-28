
@extends('admin.layouts.admin', ['page' => 'limit'])

@section('title', '当選上限数設定')

@push('styles')
<link href="{{ asset('admin/css') }}/lemonsour_admin_limit.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
<x-admin.search>
    <x-slot name="title">当選上限数設定</x-slot>
</x-admin.search>

<main>
    <form role="form" method="POST" action="{{ route('admin.lotteryChange.csvUpdate') }}" enctype="multipart/form-data">
        @csrf
        <div class="box_status_percentage_main">
            <div class="box_main_input err">
                @foreach ($errors->get('csv_file') as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
            @if (session('flash_message'))
                <div class="box_main_input">{{ session('flash_message') }}</div>
            @endif
            <div class="box_main_input"><span class="text_upload_time">最終アップロード日：{{ isset($maxLotteryTries['0']) ? $maxLotteryTries['0']['created_at'] : '' }}</span></div>
            <div class="box_main_input">
                CSVファイル<input type="file" name="csv_file" class="limit_btn_select" src="{{ asset('admin/images') }}/admin_limit_btn_select.jpg" alt="ファイルを選択">
            </div>
            <div class="box_main_btn">
                <input type="image" src="{{ asset('admin/images') }}/admin_limit_btn_upload.jpg" alt="アップロード">
            </div>
        </div>
        <div class="box_status_percentage_main list_wrapper">
            <table class="pida_list">
                <tr>
                    <th class="fixed">ID</th>
                    <th class="fixed">日付</th>
                    <th class="fixed">当選上限数</th>
                </tr>
                @foreach($maxLotteryTries as $max)
                <tr @if($max->id == $winLimitId) class="highlight" @endif>
                    <td>{{ $max->pida }}</td>
                    <td>{{ $max->max_tries_at }}</td>
                    <td>{{ $max->max_tries }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </form>
</main>
@endsection
