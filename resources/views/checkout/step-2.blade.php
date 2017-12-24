@extends('layout.index')
@section('title', $title)
@section('content')
    <div id="error-405">
        <p>Your Order ID:</p>
        {{ md5($trans_id) }}
    </div>
@endsection