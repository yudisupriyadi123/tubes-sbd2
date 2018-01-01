<div class="frame-products">
	<a href="{{ url('product/'.$product->id) }}">
		<div class="onsale">
			On Sale
		</div>
		<div class="top">
			<div class="images need-zoom" style="background-image: url('{{ asset($product->thumbnail->image) }}');"></div>
		</div>
	</a>
	<div class="cen">
		<div class="mid">
			<div class="desc">
				<div class="des">{{ $product->name }}</div>
				<div class="des-idr">
					<label class="idr">IDR {{ $product->getDiscountedPrice() }}</label>
					<label class="idr2">IDR {{ $product->price }}</label>
				</div>
			</div>
		</div>
		<div class="bot">
			<button class="btn btn-active btn-sekunder-color-2">
				<div class="fa fa-lg fa-shopping-cart"></div>
			</button>
			<!--<ul><li><div class="bot-right bot-right-color fa fa-lg fa-shopping-cart"></div></li></ul>-->
		</div>
	</div>
</div>