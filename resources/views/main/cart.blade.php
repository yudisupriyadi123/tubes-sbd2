<div id="cart">
	<div class="main-popup cart">
		<div class="top">
			<span class="left">
				<b>Total <span>n</span> Produts</b>
			</span>
			<!--
			<span class="right">
				<b>IDR 0,000,00</b>
			</span>
		-->
		</div>
		<div class="mid">
		@if (!Auth::check())
		You must login
		@else
<?php $cart_items = \App\Customer::find(Auth::user()['email'])->cart()->get() ?>
			@if ($cart_items->count() == 0)
			Empty
			@else
				@foreach ($cart_items as $key => $cart_item)
				<div class="frame-cart-popup">
					<div class="main-crt">
						<div class="image-cart" style="background-image: url('{{ asset($cart_item->product->thumbnail->image) }}');"></div>
					</div>
					<div class="side-crt">
						<div class="ttl">
							{{ $cart_item->product->name }}
						</div>
						<div class="count">
							<span>{{ $cart_item->quantity }} Products</span>
							<span>.</span>
							<span>IDR {{ $cart_item->getTotalPrice() }}</span>
						</div>
					</div>
				</div>
				@endforeach
			@endif
		@endif
		</div>
		<div class="bot">
			<a href="{{ url('/purchase/all') }}">
				<input type="button" name="to_purchase" class="btn btn-main-color" value="Next to Purchase">
			</a>
			<a href="{{ url('/cart') }}">
				<input type="button" name="to_purchase" class="btn btn-white-color-red" value="View All Carts">
			</a>
		</div>
	</div>
</div>