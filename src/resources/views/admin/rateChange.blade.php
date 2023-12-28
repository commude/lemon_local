@extends('admin.layouts.admin', ['page' => 'percentage'])

@section('title', '当選確率変更')

@push('styles')
<link href="{{ asset('admin') }}/css/lemonsour_admin_percentage.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<x-admin.search>
    <x-slot name="title">当選確率変更</x-slot>
</x-admin.search>

<main>
    <form  action="{{ route('admin.rateChange.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="box_status_percentage_main">
            <div class="box_main_input err">
                    @foreach ($errors->get('lottery_rate') as $error)
                        <p>{{ $error }}</p>
                @endforeach
            </div>
            @if (session('flash_message'))
                <div class="box_main_input">{{ session('flash_message') }}</div>
            @endif
            <div class="box_main_input">
                <div>現在の当選率<span class="text_input">{{ $lotteryRate }}</span>%</div>
                <div class="box_main_table">
                    <table width="200" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <th scope="col">2倍</th>
                                <th scope="col">3倍</th>
                            </tr>
                            <tr>
                                <td>{{ $lotteryRate * 2 > 100 ? 100 : $lotteryRate * 2 }}%</td>
                                <td>{{ $lotteryRate * 3 > 100 ? 100 : $lotteryRate * 3 }}%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box_main_input"><img src="{{ asset('admin') }}/images/percentage_icon_arroow_down.png" class="input_image" alt="↓"></div>
            <div class="box_main_input">変更後の当選確率<lable class="lable_input">
                <input type="text" name="lottery_rate" class="input_after">%</lable>
            </div>
            <div class="box_main_btn">
                <input type="image" src="{{ asset('admin') }}/images/percentage_btn_change.jpg" alt="当選確率変更">
            </div>
        </div>
    </form>
</main>
@endsection
