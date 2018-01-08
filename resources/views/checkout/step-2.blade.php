@extends('layout.index')
@section('title', $title)
@section('content')
    <!-- TODO: change id with correct semantic -->
    <div id="error-405">
        <p>Your Order ID:</p>
        {{ md5($trans_id) }}

        Please send your money to <b>BNI (100-1234-888)</b> then upload your proof photo. Admin will review that and then will send your product.
    </div>
@endsection