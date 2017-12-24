@extends('layout.index')
@section('title',$title)
@section('content')
<div class="frame-sign">
    <div class="main-sign">
        <div class="top">
            <div class="border-bottom"></div>
            <h2>Order Status</h2>
            <div class="border-bottom"></div>
        </div>
        <div class="mid" style="text-align: center">
                @if ($status == 'waiting_approval')
                Waiting response to accepted/rejected.
                @endif
                @if ($status == 'rejected')
                Sorry :( we rejected your transaction for one or some reason.
                @endif
                @if ($status == 'approved')
                Your transaction accepted.<br>
                Upload your payment proof at {{ url('order/proof') }}
                @endif
                @if ($status == 'waiting_payment')
                Waiting payment proof to arrive.
                @endif
                @if ($status == 'product_has_sent')
                Your product is on the way. Check at courier website to track.
                @endif
                @if ($status == 'done')
                Thank you, the transaction is already done.
                @endif
        </div>
        <div class="bot"></div>
    </div>
</div>
@endsection