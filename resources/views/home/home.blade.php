@extends('layout.index')
@section('title',$title)
@section('content')
<div class="main-width">
	<div class="main-home">
		<!-- TODO: remove these if not used surely
		<div class="main-home-left">
			<div class="main mn mn-white">
				@include('main.category')
			</div>
			<div class="main mn mn-white">
				@include('main.tags')
			</div>
		</div>
		-->
		<div class="main-home-right">
			<div class="home-articles">
				<div class="left">
					<a href="{{ url('product/12045') }}">
						<div class="frame-articles need-zoom" style="background-image: url('{{ url('/') }}/img/banner1.jpg');">
						</div>
					</a>
				</div>
				<div class="right">
					<a href="{{ url('product/12045') }}">
						<div class="frame-articles need-zoom" style="background-image: url('{{ url('/') }}/img/banner1.jpg');">
						</div>
					</a>
					<a href="{{ url('product/12045') }}">
						<div class="frame-articles need-zoom" style="background-image: url('{{ url('/') }}/img/banner2.jpg');">
						</div>
					</a>
				</div>
			</div>
			<div class="main mn mn-2">
				<div class="home-panel">
					<div class="panel-title">
						NEWEST PRODUCTS
					</div>
				</div>
				<div class="home-products grid-4 scroll-left">
					@foreach ($newest_products as $key => $product)
						@include('main.product')
					@endforeach
				</div>
			</div>
			<div class="main mn mn-2">
				<div class="home-panel">
					<div class="panel-title">
						BIGGEST DISCOUNT PRODUCTS
					</div>
				</div>
				<div class="home-products grid-4 scroll-left">
					@foreach ($biggest_discount_products as $key => $product)
						@include('main.product')
					@endforeach
				</div>
			</div>
			<div class="main mn mn-2">
				<div class="home-panel">
					<div class="panel-title">
						<!-- TODO: add database query to fetch most saled products -->
						MOST SALED PRODUCTS
					</div>
				</div>
				<div class="home-products grid-4 scroll-left">
					@for ($i = 0; $i < 4; $i++)
						@include('main.product')
					@endfor
				</div>
			</div>
			<div class="main mn mn-2">
				<div class="home-panel">
				<div class="panel-title">
					TOP RATED
				</div>
<<<<<<< HEAD
				<div class="panel-more">
					<a href="{{ url('top') }}">
						<input type="button" name="more-shopp" class="btn btn-sekunder-color" value="View All">
					</a>
=======
				<div class="home-products grid-4 scroll-left">
					@for ($i = 0; $i < 4; $i++)
						@include('main.product')
					@endfor
>>>>>>> 0fbe6212f6c8cdae5e773a3ccb1691ef974ab078
				</div>
			</div>
			<div class="home-products grid-5 scroll-left">
				<?php for ($i = 0; $i < 5; $i++) { ?>
				@include('main.product')
				<?php } ?>
			</div>
			</div>
		</div>
	</div>
</div>
@endsection
