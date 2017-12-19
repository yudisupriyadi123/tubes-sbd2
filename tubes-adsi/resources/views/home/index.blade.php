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
				RECENTLY POSTS
			</div>
			<div class="panel-more">
				<a href="{{ url('shops') }}">
					<input type="button" name="more-shopp" class="btn btn-sekunder-color" value="View All">
				</a>
			</div>
		</div>
		<div class="home-products grid-5 scroll-left">
			<?php for ($i = 0; $i < 5; $i++) { ?>
			@include('main.product')
			<?php } ?>
		</div>
	</div>
	<div class="home-content main-width">
		<div class="home-panel">
			<div class="panel-title">
				POPULAR
			</div>
			<div class="panel-more">
				<a href="{{ url('popular') }}">
					<input type="button" name="more-shopp" class="btn btn-sekunder-color" value="View All">
				</a>
			</div>
		</div>
		<div class="home-products grid-5 scroll-left">
			<?php for ($i = 0; $i < 5; $i++) { ?>
			@include('main.product')
			<?php } ?>
		</div>
	</div>
	<div class="home-content main-width">
		<div class="home-panel">
			<div class="panel-title">
				TOP RATED
			</div>
			<div class="panel-more">
				<a href="{{ url('top') }}">
					<input type="button" name="more-shopp" class="btn btn-sekunder-color" value="View All">
				</a>
			</div>
		</div>
		<div class="home-products grid-5 scroll-left">
			<?php for ($i = 0; $i < 5; $i++) { ?>
			@include('main.product')
			<?php } ?>
		</div>
	</div>

</div>
@endsection
