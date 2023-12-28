@extends('user.layouts.app')

@section('title', 'こだわり酒場のレモンサワー3兄弟の店の味！飲み比べキャンペーン | サントリー')

@section('content')

<div class="contents_wrapper animation_page">
    <div class="inner">
        <p class="title">
            バーコードを入力してスタンプを獲得
        </p>
        <div class="content">
            <form action="{{ route('getStamp') }}" method="post" autocomplete="off">
                @csrf
                <input id="barcode" class="code" type="text" name="barcode" maxlength="13"  pattern="\d*">
                <button><img src="{{ asset('user/img') }}/animation/btn.png" alt="スタンプ獲得"/></button>
            </form>
            <p class="attention">※バーコード下の13桁の数字を入力してください。</p>
            @if ($errors->has('barcode'))
                <div>
                    <span class="help-block">
                        <strong>
                            <ul>
                            @foreach ($errors->get('barcode') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </strong>
                    </span>
                </div>
            @endif
            <a href="{{ route('mypage') }}"><button><img src="{{ asset('user/img') }}/other/btn1.png" alt="マイページへ"/></button></a>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    $(function() {
        $('#barcode').on('input', function(){
            check_numtype($(this));
        });
    });
    var checkvalue = "";
    function check_numtype(obj){
        var txt_obj = $(obj).val();
        var text_length = txt_obj.length;
        if(txt_obj.match(/^[0-9]+$/)){
            if(text_length > 13){
                $('#barcode').val(checkvalue);
            }else{
                checkvalue = txt_obj;
            }
        }else{
            if(text_length == 0){
                checkvalue = "";
            }else{
                $('#barcode').val(checkvalue);
            }
        }
    }
</script>
@endpush
