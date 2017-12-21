@extends('layout.index')
@section('title',$title)
@section('content')
<div class="main-width">
	
	<div class="main-cart">
	
		<div class="place-cart">
			<div class="crt cart-1"></div>
			<div class="crt cart-2"><b>Product</b></div>
			<div class="crt cart-3"><b>Price</b></div>
			<div class="crt cart-4"><b>Quantity</b></div>
			<div class="crt cart-5"><b>Total</b></div>
			<div class="crt cart-6"></div>
			@for ($i=1; $i <= 10; $i++)
			<div class="crt cart-1">
				<div class="image-crt" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
			</div>
			<div class="crt cart-2">
				This is just for a test.
			</div>
			<div class="crt cart-3">
				Rp. 16.000.000
			</div>
			<div class="crt cart-4">
				<!--
				<div class="stock need-p">
					<div class="place-stock">
						<button class="op btn-qty" id="qty-min">
							<label class="fa fa-lg fa-minus"></label>
						</button>
						<input type="text" name="qty" class="op txt" placeholder="qty" value="1" id="qty" disabled="true">
						<button class="op btn-qty" id="qty-plus">
							<label class="fa fa-lg fa-plus"></label>
						</button>
					</div>
				</div>
				-->
				2
			</div>
			<div class="crt cart-5">
				Rp. 24.000.000
			</div>
			<div class="crt cart-6"></div>
			@endfor
		</div>
	
	</div>
	
</div>
@endsection