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
					<div class="image" style="background-image: url('{{ asset($customer->photo) }}');"></div>
				</div>
				<div class="mid">
					<ul>
					    <li>
					    	<span><h2>{{ $customer->name }}</h2></span>
					    </li>
					    <li>
					    	<span class="icn fa fa-lg fa-envelope"></span>
					    	<span>{{ $customer->email }}</span>
					    </li>
					    <li>
					    	<span class="icn fa fa-lg fa-map-marker"></span>
					    	<span>{{ $customer->address }}</span>
					    </li>
					    <li>
					    	<span class="icn fa fa-lg fa-shopping-bag"></span>
					    	<span><b>{{ $success_orders->count() }}</b> successful order</span>
					    </li>
					</ul>
				</div>
				<div class="mid marg-top">
					<ul>
					    <li>
					    	<span class="icn fa fa-lg fa-gear"></span>
					    	<span>Setting</span>
					    </li>
					    <a href="{{ url('/logout') }}">
						    <li>
						    	<span class="icn fa fa-lg fa-power-off"></span>
						    	<span>Logout</span>
						    </li>
						</a>
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
					    	<span><a href='{{ url('/order/check') }}'>Check Order</a></span>
					    </li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main" id="costumer-content">
			<div class="mn place">
				<div class="desc-panel" id="costumer-panel">
					<ul>
						<li class="desc-panel-select" key="on_proc">On Process</li>
					    <li key="succ">Success</li>
					    <li key="canceled">Canceled</li>
					    <li key="rejected">Rejected</li>
					</ul>
				</div>
			</div>

			<div class="ctn ctn-show" id="on_proc">
				@if ($on_process_orders->count() == 0)
				<div class="mn place" style="text-align: center">
					Empty
				</div>
				@endif
				@foreach ($on_process_orders as $key => $order)
				<div class="mn place order-box">
					<div class="frame-cart">
						<div class="mid-cart">
							<div class="mid-1">
								<div class="ttl">
									Order ID: <b class="value">{{ $order->id }}</b>
								</div>
								<div class="ttl">
									<span>Courier:</span>
									<span><b class="value">{{ $order->courier }}</b></span>
								</div>
							</div>
							<div class="mid-2">
								<div class="ttl">
									Status: <b class="value">{{ $order->status }}</b>
								</div>
								<div class="ttl">
									<span>Date: {{ $order->created_at }}</span>
								</div>
							</div>
							<div class="mid-3">
								<div class="ttl">
									Count: <b class="value">{{ $order->transactionDetail->count() }}</b>
								</div>
							</div>
						</div>
					</div>
				</div>
				@foreach ($order->transactionDetail as $key => $item)
				<div class="mn place">
					<div class="frame-cart">
						<div class="mid-cart">
							<div class="mid-1">
								<div class="image-cart" style="background-image: url('{{ asset($item->product->thumbnail->image) }}');"></div>
							</div>
							<div class="mid-2">
								<div class="ttl">
									{{ $item->product->name }}
								</div>
								<div class="total-order">
									<span>Total order</span>
									<span><b>{{ $item->quantity }}</b> products</span>
								</div>
							</div>
							<div class="mid-3">
								<span>IDR {{ $item->product->getDiscountedPrice() }}</span>
							</div>
						</div>
						<div class="bot-cart">
							<div class="sub">
								<div>Subtotal: <b>IDR {{ $item->getTotalPrice() }}</b></div>
								<div class="sh">Shipping not included</div>
							</div>
							<div class="pur">
								<!-- empty -->
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@endforeach
			</div>

			<div class="ctn ctn-hide" id="succ">
				@if ($success_orders->count() == 0)
				<div class="mn place" style="text-align: center">
					Empty
				</div>
				@endif
				@foreach ($success_orders as $key => $order)
				<div class="mn place order-box">
					<div class="frame-cart">
						<div class="mid-cart">
							<div class="mid-1">
								<div class="ttl">
									Order ID: <b class="value">{{ $order->id }}</b>
								</div>
								<div class="ttl">
									<span>Courier:</span>
									<span><b class="value">{{ $order->courier }}</b></span>
								</div>
							</div>
							<div class="mid-2">
								<div class="ttl">
									Status: <b class="value">{{ $order->status }}</b>
								</div>
								<div class="ttl">
									<span>Date: {{ $order->created_at }}</span>
								</div>
							</div>
							<div class="mid-3">
								<div class="ttl">
									Count: <b class="value">{{ $order->transactionDetail->count() }}</b>
								</div>
							</div>
						</div>
					</div>
				</div>
				@foreach ($order->transactionDetail as $key => $item)
				<div class="mn place">
					<div class="frame-cart">
						<div class="mid-cart">
							<div class="mid-1">
								<div class="image-cart" style="background-image: url('{{ asset($item->product->thumbnail->image) }}/img/banner1.jpg');"></div>
							</div>
							<div class="mid-2">
								<div class="ttl">
									{{ $item->product->name }}
								</div>
								<div class="total-order">
									<span>Total order</span>
									<span><b>{{ $item->quantity }}</b> products</span>
								</div>
							</div>
							<div class="mid-3">
								<span>IDR {{ $item->product->getDiscountedPrice() }}</span>
							</div>
						</div>
						<div class="bot-cart">
							<div class="sub">
								<div>Subtotal: <b>IDR {{ $item->getTotalPrice() }}</b></div>
								<div class="sh">Shipping not included</div>
							</div>
							<div class="pur">
								<!-- empty -->
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@endforeach
			</div>

			<div class="ctn ctn-hide" id="canceled">
				@if ($canceled_orders->count() == 0)
				<div class="mn place" style="text-align: center">
					Empty
				</div>
				@endif
				@foreach ($canceled_orders as $key => $order)
				<div class="mn place order-box">
					<div class="frame-cart">
						<div class="mid-cart">
							<div class="mid-1">
								<div class="ttl">
									Order ID: <b class="value">{{ $order->id }}</b>
								</div>
								<div class="ttl">
									<span>Courier:</span>
									<span><b class="value">{{ $order->courier }}</b></span>
								</div>
							</div>
							<div class="mid-2">
								<div class="ttl">
									Status: <b class="value">{{ $order->status }}</b>
								</div>
								<div class="ttl">
									<span>Date: {{ $order->created_at }}</span>
								</div>
							</div>
							<div class="mid-3">
								<div class="ttl">
									Count: <b class="value">{{ $order->transactionDetail->count() }}</b>
								</div>
							</div>
						</div>
					</div>
				</div>
				@foreach ($order->transactionDetail as $key => $item)
				<div class="mn place">
					<div class="frame-cart">
						<div class="mid-cart">
							<div class="mid-1">
								<div class="image-cart" style="background-image: url('{{ asset($item->product->thumbnail->image) }}/img/banner1.jpg');"></div>
							</div>
							<div class="mid-2">
								<div class="ttl">
									{{ $item->product->name }}
								</div>
								<div class="total-order">
									<span>Total order</span>
									<span><b>{{ $item->quantity }}</b> products</span>
								</div>
							</div>
							<div class="mid-3">
								<span>IDR {{ $item->product->getDiscountedPrice() }}</span>
							</div>
						</div>
						<div class="bot-cart">
							<div class="sub">
								<div>Subtotal: <b>IDR {{ $item->getTotalPrice() }}</b></div>
								<div class="sh">Shipping not included</div>
							</div>
							<div class="pur">
								<!-- empty -->
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@endforeach
			</div>

			<div class="ctn ctn-hide" id="rejected">
				@if ($rejected_orders->count() == 0)
				<div class="mn place" style="text-align: center">
					Empty
				</div>
				@endif
				@foreach ($rejected_orders as $key => $order)
				<div class="mn place order-box">
					<div class="frame-cart">
						<div class="mid-cart">
							<div class="mid-1">
								<div class="ttl">
									Order ID: <b class="value">{{ $order->id }}</b>
								</div>
								<div class="ttl">
									<span>Courier:</span>
									<span><b class="value">{{ $order->courier }}</b></span>
								</div>
							</div>
							<div class="mid-2">
								<div class="ttl">
									Status: <b class="value">{{ $order->status }}</b>
								</div>
								<div class="ttl">
									<span>Date: {{ $order->created_at }}</span>
								</div>
							</div>
							<div class="mid-3">
								<div class="ttl">
									Count: <b class="value">{{ $order->transactionDetail->count() }}</b>
								</div>
							</div>
						</div>
					</div>
				</div>
				@foreach ($order->transactionDetail as $key => $item)
				<div class="mn place">
					<div class="frame-cart">
						<div class="mid-cart">
							<div class="mid-1">
								<div class="image-cart" style="background-image: url('{{ asset($item->product->thumbnail->image) }}/img/banner1.jpg');"></div>
							</div>
							<div class="mid-2">
								<div class="ttl">
									{{ $item->product->name }}
								</div>
								<div class="total-order">
									<span>Total order</span>
									<span><b>{{ $item->quantity }}</b> products</span>
								</div>
							</div>
							<div class="mid-3">
								<span>IDR {{ $item->product->getDiscountedPrice() }}</span>
							</div>
						</div>
						<div class="bot-cart">
							<div class="sub">
								<div>Subtotal: <b>IDR {{ $item->getTotalPrice() }}</b></div>
								<div class="sh">Shipping not included</div>
							</div>
							<div class="pur">
								<!-- empty -->
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@endforeach
			</div>

		</div>
	</div>
</div>
@endsection