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
						RECENTLY POSTS
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
						POPULAR POSTS
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
						MOST VIEWED
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
						ALL PRODUCTS
					</div>
					<div class="panel-more">
						<a href="{{ url('shops') }}">
							<input type="button" name="more-shopp" class="btn btn-white-color-red" value="View All">
						</a>
					</div>
				</div>
				<div class="home-products grid-4 scroll-left">
					@for ($i = 0; $i < 4; $i++) 
						@include('main.product')
					@endfor
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
