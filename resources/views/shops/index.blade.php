@extends('layout.index')
@section('title',$title)
@section('content')
<div class="frame-home">
	<h1 class="title-header">
		@yield('title')
	</h1>
	<div class="home-content main-width">
		<div class="home-products grid-5-2">
			@foreach ($prd as $product)
			@include('main.product')
			@endforeach
		</div>
	</div>
</div>
@endsection