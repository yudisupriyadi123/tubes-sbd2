@extends('layout.index')
@section('title',$title)
@section('content')
<script type="text/javascript">
	$(document).ready(function() {

		// ================================



		// ===========================

		$("form#primary").submit(function(event){


			var csa_id = $("input[name=csa_id]").val();
			// TODO: make it safe from inspect element
			var courier = $("select[name=courier]").val();
			console.log(courier);
			if (csa_id == -1 || courier == "") {
				$("#submit-hint").html('<span class="alert">Courier and shipping address is required</span>');
				event.preventDefault();
			}

			return;
		});
	});
</script>

<form id="primary" method="post" action="{{ url('checkout/step2') }}">
	{{ csrf_field() }}
	<input type="hidden" name="csa_id" value="-1">

	<div class="main-width">
		<div class="purchase">
			<!-- DETAIL COSTUMER -->
			@include('checkout.step-1-part.detail-costumer')

			<!-- DETAIL PRODUCT -->
			@include('checkout.step-1-part.detail-product',
			['cart_items' => $cart_items])

			<!-- DETAIL SHOPPING -->
			@include('checkout.step-1-part.detail-shopping')
		</div>
	</div>
</form>

@endsection