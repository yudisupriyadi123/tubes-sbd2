@extends('layout.index')
@section('title',$title)
@section('content')
<div class="frame-home">

	@include('home.banner')

	@include('home.categories')

	@include('home.newest-product', ['newest_products' => $newest_products])

	@include('home.biggest-discounted-product',
    ['biggest_discount_products' => $biggest_discount_products])

	@include('home.all-product')

</div>
@endsection
