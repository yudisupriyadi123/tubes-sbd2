@extends('layout.index')
@section('title',$title)
@section('content')
<script type="text/javascript">
	$(document).ready(function() {
		var dtAddress = '<div class="block"><div class="ttl">Address</div><textarea class="txt txt-main-color textarea"></textarea></div>';
		$('#add-address').on('click', function(event) {
			event.preventDefault();
			/* Act on the event */
			$('#address').append(dtAddress);
		});
	});
</script>
	<div class="main-width">
		<div class="purchase">
			<div class="main">
				<div class="mn">
					<div class="place-mn top">
						<h3>Detail Customer</h3>
					</div>
					<div class="place-mn mid">
						<div class="block">
							<div class="ttl">
								Full Name
							</div>
							<input type="text" name="name" class="txt txt-main-color">
						</div>
						<div class="block">
							<div class="ttl">
								Email
							</div>
							<input type="text" name="email" class="txt txt-main-color">
						</div>
						<div class="block">
							<div class="ttl">
								Phone Number
							</div>
							<input type="text" name="phone" class="txt txt-main-color">
						</div>
						<div class="block-address" id="address">
							<!--
							<div class="block">
								<div class="ttl">
									Address 1
								</div>
								<textarea class="txt txt-main-color textarea"></textarea>
							</div>
							-->
						</div>
					</div>
					<div class="place-mn bot">
						<input type="button" name="add-address" class="btn btn-main-color-2" id="add-address" value="Add your Address">
					</div>
				</div>
				<div class="mn">
					<div class="place-mn top">
						<h3>Detail Products</h3>
					</div>
					<div class="mid">
						@for ($i=1; $i <= 2; $i++)
						<div class="frame-cart">
							<div class="top">
								<span class="cek left">
									<button class="btn btn-white-color">
										<div class="fa fa-lg fa-circle"></div>
									</button>
									<span>By Admin</span>
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
						</div>
						@endfor
					</div>
					<div class="bot">
						<div class="block block-address" id="address">
							<div class="block">
								<div class="ttl">
									Notes
								</div>
								<textarea class="txt txt-main-color textarea"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="mn">
					<div class="place-mn top">
						<h3>Put your Cupoun</h3>
					</div>
					<div class="place-mn">
						<div class="block">
							<div class="ttl">
								Code Cupoun
							</div>
							<input type="text" name="name" class="txt txt-main-color">
						</div>
					</div>
				</div>
			</div>
			<div class="side">
				<div class="mn cart-fixed">
					<div class="place-mn top">
						<h3>Detail Shopping</h3>
					</div>
					<div class="mid">
						<div class="mn-detail">
							<div class="mn-detail-left">
								Price Product
							</div>
							<div class="mn-detail-right">
								<b>IDR 350.000,00</b>
							</div>
						</div>
						<div class="mn-detail">
							<div class="mn-detail-left">
								Payment Shipping
							</div>
							<div class="mn-detail-right">
								<b>IDR 10.000,00</b>
							</div>
						</div>
					</div>
					<div class="bot">
						<div class="mn-detail">
							<div class="mn-detail-left">
								Total Payment
							</div>
							<div class="mn-detail-right">
								<b class="ttl">IDR 10.000,00</b>
							</div>
						</div>
						<a href="{{ url('/') }}">
							<input type="button" name="Purchase" class="btn btn-main-color" value="Submit your Order">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection