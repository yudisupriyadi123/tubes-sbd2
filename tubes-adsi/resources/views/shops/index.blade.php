@extends('layout.index')
@section('title',$title)
@section('content')
<div class="frame-home">
	<h1 class="title-header">@yield('title')</h1>
	<div class="home-content main-width">
		<div class="home-products grid-5-2">
			<?php for ($i = 0; $i < 20; $i++) { ?>
			@include('main.product')
			<?php } ?>
		</div>
	</div>
</div>
@endsection