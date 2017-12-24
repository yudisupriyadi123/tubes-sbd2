@extends('layout.index')
@section('title',$title)
@section('content')
<script type="text/javascript">
	$(document).ready(function() {
		var dtAddress = '<div class="block"><div class="ttl">Address</div><textarea class="txt txt-main-color textarea"></textarea></div>';
		$('#new-address').on('click', function(event) {
			event.preventDefault();
			/* Act on the event */
			$('#address').append(dtAddress);
		});

		var form;
		var address = $( ".dialog-form #address" );
		var kecamatan = $( ".dialog-form #kecamatan" );
		var kotamadya = $( ".dialog-form #kotamadya" );
		var provinsi = $( ".dialog-form #provinsi" );
		var postal_code = $( ".dialog-form #postal_code" );
		var receiver_name = $( ".dialog-form #receiver_name" );
		var receiver_phone_number = $( ".dialog-form #receiver_phone_number" );
		var allFields = $( [] )
								.add( kecamatan )
								.add( kotamadya )
								.add( provinsi )
								.add( postal_code )
								.add( receiver_name )
								.add( receiver_phone_number );
		var tips = $( ".validateTips" );

		// Costumer shipping address
		function addCSA() {
			$.ajax({
				headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                },
		        method: 'POST',
		        url: 'http://localhost/tubes-sbd/public/index.php/ajax/add-csa',
		        data: {
		        	address: address.val(),
					kecamatan: kecamatan.val(),
					kotamadya: kotamadya.val(),
					provinsi: provinsi.val(),
					postal_code: postal_code.val(),
					receiver_name: receiver_name.val(),
					receiver_phone_number: receiver_phone_number.val(),
		        },
		        dataType: 'json',
		    }).done(function(res){
		        $("#shipping-address").html(res.html);
		        return true;
		    }).fail(function(err){
                console.log(err);
                return false;
            });
		}

	    var dialog = $( "#dialog-form" ).dialog({
			autoOpen: false,
			height: 400,
			width: 350,
			modal: true,
			buttons: {
				"Create Address": function(){
					addCSA();
					$( this ).dialog( "close" );
				},
				Cancel: function() {
					  dialog.dialog( "close" );
				}
			},
			close: function() {
				form[ 0 ].reset();
				allFields.removeClass( "ui-state-error" );
			}
		});

		$("#new-address").click(function(){
			dialog.dialog( "open" );
		});

		form = dialog.find( "form" ).on( "submit", function( event ) {
			event.preventDefault();
			addCSA();
		});

		// ================================

		function selectCSA() {
			var elm = $(".shipping-address.clicked");

			var shipping_address = elm.html();
			$("#shipping-address").html(shipping_address);

			var csa_id = elm.data('csa-id');
			$("form#primary").find("input[name=csa_id]").val(csa_id);
		}

		$("#dialog-form2").on("click", ".shipping-address", function(){
			$(".shipping-address").removeClass('clicked');
			$(this).addClass('clicked')
		});

		var dialog2 = $( "#dialog-form2" ).dialog({
			autoOpen: false,
			height: 400,
			width: 500,
			modal: true,
			buttons: {
				Select: function() {
					selectCSA();
					$( this ).dialog( "close" );
				},
				Cancel: function() {
					  dialog.dialog( "close" );
				}
			},
			close: function() {
				console.log('test');
				form[ 0 ].reset();
				allFields.removeClass( "ui-state-error" );
			},
			open: function() {
				$.ajax({
					headers: {
	                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
	                },
			        method: 'POST',
			        url: 'http://localhost/tubes-sbd/public/index.php/ajax/get-all-csa',
			        data: {
			        	'costumer_email': 'fake_costumer@gmail.com'
			        },
			        dataType: 'json',
			    }).done(function(res){
			        $("#dialog-form2 .content").html(res.html);
			        return true;
			    }).fail(function(err){
	                console.log(err);
	                return false;
	            });
			}
		});

		$("#change-address").click(function(){
			dialog2.dialog( "open" );
		});
	});
</script>

<form id="primary" method="post" action="">
	<input type="hidden" name="csa_id" value="-1">

	<div class="main-width">
		<div class="purchase">
			<div class="main">
				<div class="mn">
					<div class="place-mn top">
						<h3>Detail Customer</h3>
					</div>
					<div id="shipping-address" class="place-mn mid">
						No selected address
					</div>
					<div class="place-mn bot">
						<input type="button" name="new-address" class="btn btn-main-color-2" id="new-address" value="Add new Address">
						<input type="button" name="change-address" class="btn btn-main-color-2" id="change-address" value="Change Address">
					</div>
				</div>
				<div class="mn">
					<div class="place-mn top">
						<h3>Detail Products</h3>
					</div>
					<div class="mid">
						@foreach ($cart_items as $key => $cart_item)
						<input type="hidden" name="cart_ids[]" value="{{ $cart_item->cart_id }}">
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
										{{ $cart_item->product_name }}
									</div>
									<div class="place-stock">
										<button class="op btn-qty" id="qty-min">
											<label class="fa fa-lg fa-minus"></label>
										</button>
										<input type="text" name="qty" class="op txt" placeholder="qty" value="{{ $cart_item->cart_quantity }}" id="qty" readonly>
										<button class="op btn-qty" id="qty-plus">
											<label class="fa fa-lg fa-plus"></label>
										</button>
									</div>
								</div>
								<div class="mid-3">
									<span>IDR {{ $cart_item->product_price_discount * $cart_item->cart_quantity }}</span>
								</div>
							</div>
						</div>
						@endforeach
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
						<p>When you submit your order. It will otomatic create an Account. </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<!-- create new shipping address -->
<div id="dialog-form" class="dialog-form" title="Create new shipping address">
  <p class="validateTips">All form fields are required.</p>

  <form>
    <fieldset>
		<label for="address">Address</label>
		<input type="text" name="address" id="address" class="text ui-widget-content ui-corner-all">

		<label for="kecamatan">Kecamatan</label>
		<input type="text" name="kecamatan" id="kecamatan" class="text ui-widget-content ui-corner-all">

		<label for="kotamadya">Kotamadya</label>
		<input type="text" name="kotamadya" id="kotamadya" class="text ui-widget-content ui-corner-all">

		<label for="provinsi">Provinsi</label>
		<input type="text" name="provinsi" id="provinsi" class="text ui-widget-content ui-corner-all">

		<label for="postal_code">Postal code</label>
		<input type="text" name="postal_code" id="postal_code" class="text ui-widget-content ui-corner-all">

		<label for="receiver_name">Receiver Name</label>
		<input type="text" name="receiver_name" id="receiver_name" class="text ui-widget-content ui-corner-all">

		<label for="receiver_phone_number">Receiver Phone Number</label>
		<input type="text" name="receiver_phone_number" id="receiver_phone_number" class="text ui-widget-content ui-corner-all">

		<!-- Allow form submission with keyboard without duplicating the dialog button -->
		<input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>

<!-- will contain list of shipping address of a costumer -->
<div id="dialog-form2" class="dialog-form" title="Choose shipping address">
  <div class="content">
  </div>
</div>

@endsection