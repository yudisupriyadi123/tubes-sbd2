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
			@for ($i=1; $i < 10; $i++)
			<div class="frame-cart-popup">
				<div class="main-crt">
					<div class="image-cart" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
				</div>
				<div class="side-crt">
					<div class="ttl">
						This is place title
					</div>
					<div class="count">
						<span>1 Products</span>
						<span>.</span>
						<span>IDR 150,000,00</span>
					</div>
				</div>
			</div>
			@endfor
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