@extends('layout.index')
@section('title', 'You cannot access the page this way')
@section('content')

<div id="error-405">
    <i class="fa fa-exclamation-circle"></i>
    You cannot access the page this way.
    <p class="hint">(example: you are accessing POST page directly)</p>
</div>

@endsection
