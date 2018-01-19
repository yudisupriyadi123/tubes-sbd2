@extends('admin.index')
@section('title',$title)
@section('content')

<div class="main-admin">
    <div class="block">
        <div class="content">
            <h3>Orders</h3>
            <div class="content grid-block-4">
                <ol>
                    <li>
                        <label>Waiting approval: {{ $need_approved_count }} orders</label>
                    </li>
                    <li>
                        <label>Waiting payment proof: {{ $waiting_payment_count }} orders</label>
                    </li>
                    <li>
                        <label>Verified payment: {{ $payment_verified_count }} orders</label>
                    </li>
                    <li>
                        <label>On the way order: {{ $has_sent_count }} orders</label>
                    </li>
                    <li>
                        <label>Success order: {{ $recent_success_count }} orders</label>
                    </li>
                </ol>
            </div>
            <br><br>
            <h3>Products</h3>
            <div class="content grid-block-4">
                <ol>
                    <li>
                        <label>This month profit: Rp. {{ $last_month_profit }}</label>
                    </li>
                    <li>
                        <label>This month has sold: {{ $last_month_product_sold }} product</label>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
