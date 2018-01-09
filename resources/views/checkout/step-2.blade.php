@extends('layout.index')
@section('title', $title)
@section('content')
    <!-- TODO: change id with correct semantic -->
    <div id="error-405">
        <p>Your Order ID:</p>
        {{ md5($trans_id) }}

        <br><br>
        <p class="hint">Don't send money until admin <b>accept</b> your order. You can check on your profile to see status of the order </p>
    </div>
@endsection
