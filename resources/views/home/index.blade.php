@extends('layout.index')
@section('title',$title)
@section('content')
<div class="frame-home">
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
	<div class="home-content main-width">
		<div class="home-panel">
			<div class="panel-title">
				TRANDINGS NOW
			</div>
		</div>
		<div class="home-tags grid-3 scroll-left">
				<?php for ($i = 0; $i < 9; $i++) { ?>
				<a href="#">
					<div class="frame-tags">
				    	<div class="title">#this is a tags</div>
				    	<div class="count">33333 Posts</div>
				    </div>
				</a>
				<?php } ?>
			</ul>
		</div>
		<div class="home-panel">
			<div class="panel-title">
				CATEGORIES
			</div>
		</div>
		<div class="home-categories grid-7 scroll-left">
			<?php for ($i = 0; $i < 7; $i++) { ?>
			<div class="frame-ctr">
				<div class="icon-ctr fa fa-lg fa-bars"></div>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="home-content main-width">
		<div class="home-panel">
			<div class="panel-title">
				NEWEST PRODUCTS
			</div>
		</div>
		<div class="home-products grid-5 scroll-left">
			@foreach ($newest_products as $key => $product) 
				@include('main.product')
			@endforeach
		</div>
	</div>
	<div class="home-content main-width">
		<div class="home-panel">
			<div class="panel-title">
				BIGGEST DISCOUNT PRODUCTS
			</div>
		</div>
		<div class="home-products grid-5 scroll-left">
			@foreach ($biggest_discount_products as $key => $product) 
				@include('main.product')
			@endforeach
		</div>
	</div>
	<div class="home-content main-width">
		<div class="home-panel">
			<div class="panel-title">
				<!-- TODO: add database query to fetch most saled products -->
				MOST SALED PRODUCTS
			</div>
		</div>
		<div class="home-products grid-5 scroll-left">
			@for ($i = 0; $i < 5; $i++) 
				@include('main.product')
			@endfor
		</div>
	</div>

</div>
@endsection
