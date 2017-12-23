@extends('admin.index')
@section('title',$title)
@section('content')
<div class="main-admin">
	<!--harus diganti-->
	<div class="home-content">
		<div class="home-products grid-4-2">
			@for ($i = 0; $i < 6; $i++)
				@foreach ($newest_products as $key => $product)
					@include('main.product')
				@endforeach
			@endfor
		</div>
	</div>
</div>
@endsection