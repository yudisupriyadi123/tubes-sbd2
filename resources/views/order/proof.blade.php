@extends('layout.index')
@section('title',$title)
@section('content')
<div class="frame-sign">
    <div class="main-sign">
        <div class="top">
            <div class="border-bottom"></div>
            <h2>Payment Proof</h2>
            <div class="border-bottom"></div>
        </div>
        <div class="mid">
            @if (session('status'))
                @if (session('status') == 'OK')
                <div class="alert alert-success with-margin-bottom">
                    {{ session('message') }}
                </div>
                @endif
                @if (session('status') == 'BAD')
                <div class="alert alert-danger with-margin-bottom">
                    {{ session('message') }}
                </div>
                @endif
            @endif

            <form action="{{ url('order/upload-proof') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="block">
                    <div class="icn">Order ID</div>
                    <input type="text" name="order_id" class="txt" placeholder="" required="true">
                </div>
                <div class="block">
                    <div class="icn">Transfer Proof</div>
                    <input type="file" name="file" required="true">
                </div>
                <div class="block">
                    <input type="submit" name="submit" value="Confirm" class="btn btn-active-2 btn-main-color">
                </div>
            </form>
        </div>
        <div class="bot"></div>
    </div>
</div>
@endsection
