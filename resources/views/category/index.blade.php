@extends('layout.index')
@section('title',$title)
@section('content')
	@if (! $ctr)
	<div class="home-content main-width"><h2 style="text-align:center">Category not found</h2></div>
	@else
	<div class="frame-home">
		<h1 class="title-header">
			<label class="fa fa-lg fa-shopping-bag"></label>
			{{ $ctr->name }}
		</h1>
		<div class="home-content main-width">
			<div class="home-products grid-5-2">
				@foreach ($prd as $product)
				@include('main.product')
				@endforeach
			</div>
		</div>
	</div>
	@endif
@endsection