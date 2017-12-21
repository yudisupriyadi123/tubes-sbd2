@extends('layout.index')
@section('title',$title)
@section('content')
<script type="text/javascript">
	$(document).ready(function() {
		$('#costumer-panel ul li').on('click', function(event) {
			event.preventDefault();
			$('#costumer-panel ul li').each(function(index, el) {
				$(this).removeClass('desc-panel-select');
			});
			$(this).addClass('desc-panel-select');
			var target = $(this).attr('key');

			$('#costumer-content .ctn').each(function(index, el) {
				$(this).attr('class', 'ctn ctn-hide');
			});
			$('#'+target).attr('class', 'ctn ctn-show');
		});
	});
</script>
<div class="main-width">
	<div class="costumer">
		<div class="side">
			<div class="mn profile">
				<div class="top">
					<div class="image" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
				</div>
				<div class="mid">
					<ul>
					    <li>
					    	<span><h2>Ganjar Hadiatna</h2></span>
					    </li>
					    <li>
					    	<span class="icn fa fa-lg fa-envelope"></span>
					    	<span>ganjarhadiatna.gh@gmail.com</span>
					    </li>
					    <li>
					    	<span class="icn fa fa-lg fa-map-marker"></span>
					    	<span>Address</span>
					    </li>
					    <li>
					    	<span class="icn fa fa-lg fa-shopping-bag"></span>
					    	<span>Total Shopping</span>
					    </li>
					</ul>
				</div>
				<div class="mid marg-top">
					<ul>
					    <li>
					    	<span class="icn fa fa-lg fa-gear"></span>
					    	<span>Setting</span>
					    </li>
					    <li>
					    	<span class="icn fa fa-lg fa-power-off"></span>
					    	<span>Logout</span>
					    </li>
					</ul>
				</div>
				<div class="bot">
					<ul>
					    <li>
					    	<span class="icn fa fa-lg fa-chevron-right"></span>
					    	<span>Send a Payment Proof</span>
					    </li>
					    <li>
					    	<span class="icn fa fa-lg fa-chevron-right"></span>
					    	<span>Check my Order</span>
					    </li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main" id="costumer-content">
			<div class="mn place">
				<div class="desc-panel" id="costumer-panel">
					<ul>
						<li class="desc-panel-select" key="all">All Orders</li>
					    <li key="conf">Confirmed</li>
					    <li key="proc">Process</li>
					    <li key="feed-back">Feed Back</li>
					</ul>
				</div>
			</div>
				
			<div class="ctn ctn-show" id="all">
				@for ($i=1; $i < 4; $i++)
				<div class="mn place">
					<div class="frame-cart">
						<div class="mid-cart">
							<div class="mid-1">
								<div class="image-cart" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
							</div>
							<div class="mid-2">
								<div class="ttl">
									The title product will be in here.
								</div>
								<div class="total-order">
									<span>Total Order</span>
									<span>3 Products</span>
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
								<a href="{{ url('/order/'.$i.'/detail') }}">
									<input type="button" name="purchase" class="btn btn-white-color-red" value="Order Status">
								</a>
							</div>
						</div>
					</div>
				</div>
				@endfor
			</div>

			<div class="ctn ctn-hide" id="conf">
				@for ($i=1; $i < 3; $i++)
				<div class="mn place">
					<div class="frame-cart">
						<div class="mid-cart">
							<div class="mid-1">
								<div class="image-cart" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
							</div>
							<div class="mid-2">
								<div class="ttl">
									The title product will be in here.
								</div>
								<div class="total-order">
									<span>Total Order</span>
									<span>3 Products</span>
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
								<a href="{{ url('/order/'.$i.'/detail') }}">
									<input type="button" name="purchase" class="btn btn-white-color-red" value="Confirmed">
								</a>
							</div>
						</div>
					</div>
				</div>
				@endfor
			</div>

			<div class="ctn ctn-hide" id="proc">
				@for ($i=1; $i < 2; $i++)
				<div class="mn place">
					<div class="frame-cart">
						<div class="mid-cart">
							<div class="mid-1">
								<div class="image-cart" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
							</div>
							<div class="mid-2">
								<div class="ttl">
									The title product will be in here.
								</div>
								<div class="total-order">
									<span>Total Order</span>
									<span>3 Products</span>
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
								<a href="{{ url('/order/'.$i.'/detail') }}">
									<input type="button" name="purchase" class="btn btn-white-color-red" value="On Process">
								</a>
							</div>
						</div>
					</div>
				</div>
				@endfor
			</div>

			<div class="ctn ctn-hide" id="feed-back">
				@for ($i=1; $i < 5; $i++)
				<div class="mn place">
					<div class="frame-cart">
						<div class="mid-cart">
							<div class="mid-1">
								<div class="image-cart" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
							</div>
							<div class="mid-2">
								<div class="ttl">
									The title product will be in here.
								</div>
								<div class="total-order">
									<span>Your Feed Back will show in here</span>
								</div>
							</div>
						</div>
						<div class="bot-cart">
							<div class="sub">
								<div>Price: <b>IDR 150,000,00</b></div>
								<div class="sh">On Sale</div>
							</div>
							<div class="pur">
								<span>35 Feeds Back</span>
							</div>
						</div>
					</div>
				</div>
				@endfor
			</div>

		</div>
	</div>
</div>
@endsection