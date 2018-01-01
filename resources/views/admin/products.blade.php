@extends('admin.index')
@section('title',$title)
@section('content')
<div class="main-admin">
	<!--harus diganti-->
	<div class="content">
			<div class="frame-order">
				<div class="ctn head">
					<div class="ctn-1">
						ID Product
					</div>
					<div class="ctn-2">
						Title
					</div>
					<div class="ctn-3">
						Description
					</div>
					<div class="ctn-4">
						Price
					</div>
					<div class="ctn-5">
						Photo
					</div>
					<div class="ctn-6">
						Actions
					</div>
				</div>
				@foreach ($prd as $product)
				<div class="ctn value">
					<div class="ctn-1">
						<a href="{{ url('/product/'.$product->id) }}">
							{{ $product->id }}
						</a>
					</div>
					<div class="ctn-2">
						<span>{{ $product->name }}</span>
					</div>
					<div class="ctn-3">
						{{ substr($product->description, 0, 130) }}
					</div>
					<div class="ctn-4">
						<span>{{ 'IDR '.$product->price }}</span>
					</div>
					<div class="ctn-5">
						<div class="image" style="background-image: url('{{ url('/').'/'.$product->image }}');"></div>
					</div>
					<div class="ctn-6">
						<a href="{{ url('/product/'.$product->id) }}">
							<input type="button" name="detail" class="btn btn-main-color-2" value="Detail">
						</a>
					</div>
				</div>
				@endforeach

			</div>
		</div>
</div>
@endsection