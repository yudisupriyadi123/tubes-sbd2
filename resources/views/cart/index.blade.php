@extends('layout.index')
@section('title',$title)
@section('content')
<script type="text/javascript">
	$(document).ready(function() {
		$(document).scroll(function(event) {
			var top = $(this).scrollTop();
			if (top > 50) {
				$('#all-shipping').addClass('cart-fixed');
			}
			else {
				$('#all-shipping').removeClass('cart-fixed');
			}
		});
	});
</script>
<div class="main-width">
	<h1>Shopping Cart</h1>
	<div class="main-cart">
		<div class="main">
			<div class="mn top">
				<span class="cek left">
					<input type="checkbox" name="sellect_all" class="ck ckbox" value="false">
					<span>Sellect All Transactions</span>
				</span>
				<span class="right">
					<input type="button" name="delete_all" class="btn btn-white-color-red" value="Dellete All">
				</span>
			</div>
			@for ($i=1; $i < 4; $i++)
			<div class="mn mid">
				<div class="frame-cart">
					<div class="top">
						<span class="cek left">
							<input type="checkbox" name="sellect_all" class="ck ckbox" value="false">
							<span>Sellect This Product</span>
						</span>
						<span class="right">
							<button class="btn btn-white-color">
								<div class="fa fa-lg fa-close"></div>
							</button>
						</span>
					</div>
					<div class="mid-cart">
						<div class="mid-1">
							<div class="image-cart" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
						</div>
						<div class="mid-2">
							<div class="ttl">
								The title product will be in here.
							</div>
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
						<div class="mid-3">
							<span>IDR 350,000,00</span>
						</div>
					</div>
					<div class="bot-cart">
						<div class="sub">
							<div>Subtotal: <b>IDR 350,000,00</b></div>
							<div class="sh">Shipping not included</div>
						</div>
						<div class="pur">
							<a href="{{ url('/purchase/'.$i) }}">
								<input type="button" name="purchase" class="btn btn-main-color" value="Purchase Now">
							</a>
						</div>
					</div>
				</div>
			</div>
			@endfor
		</div>
		<div class="side">
			<div class="mn total-shipping" id="all-shipping">
				<div class="top">
					<b>Purchase All Transactions</b>
				</div>
				<div class="mid">
					<div class="sub">
						<label class="ttl">Total Shopping</label>
						<label class="sh"><b>IDR 350,000,00</b></label>
					</div>
					<div class="pur">
						<a href="{{ url('/purchase/all') }}">
							<input type="button" name="Purchase" class="btn btn-main-color" value="Purchase All">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
@endsection
