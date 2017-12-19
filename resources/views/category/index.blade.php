@extends('layout.index')
@section('title',$title)
@section('content')
<div class="main-width">
	<div class="main-home">
		<div class="main-home-left">
			<div class="main mn mn-white">
				@include('main.category')
			</div>
			<div class="main mn mn-white">
				@include('main.tags')
			</div>
		</div>
		<div class="main-home-right">
			<h1 class="title-header">
				<label class="fa fa-lg fa-shopping-bag"></label>
				@yield('title')
			</h1>
			<div class="home-content">
				<div class="home-products grid-4">
					<?php for ($i = 0; $i < 20; $i++) { ?>
					@include('main.product')
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
