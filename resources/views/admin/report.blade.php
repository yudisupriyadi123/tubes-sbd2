@extends('admin.index')
@section('title',$title)
@section('content')

<div class="main-admin">
    <div class="block">
        <h3></h3>
        <div class="content">
            Waiting approval:       {{ $need_approved_count }} order<br>
            Waiting payment proof:  {{ $waiting_payment_count }} order<br>
            Verified payment:       {{ $payment_verified_count }} order<br>
            On the way order:       {{ $has_sent_count }} order<br>
            Success order:          {{ $recent_success_count }} order<br>

            This month profit: Rp. {{ $last_month_profit }}<br>
            This month has sold: {{ $last_month_product_sold }} product<br>
        </div>
    </div>
</div>
