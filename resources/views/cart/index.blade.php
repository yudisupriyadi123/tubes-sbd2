@extends('layout.index')
@section('title',$title)
@section('content')
<div class="main-width">

	<div class="main-cart">
		<div class="cart-items">
			<!-- item #1 -->
			<div class="cart-item">
				<div class="header">
					<div class="checkbox"><input type="checkbox"></div>
					<div class="brand-logo"><i class="fa fa-cube"></i></div>
					<div class="brand">Monster</div>
				</div>
				<div class="item">
					<div class="thumbnail"><img src="https://s2.bukalapak.com/img/729118547/small/Earplug_Penutup_Telinga_mirip_ultrafit_with_casing.jpg"></div>
					<div class="layout">
						<span class="product-name">Earplug Penutup Telinga mirip ultrafit with casing</span>
						<div class="quantity-editor"><input type="number"></div>
					</div>
					<div class="delete-btn">
						<i class="fa fa-trash-o"></i>
					</div>
				</div>
			</div>


			<!-- item #2 -->
			<div class="cart-item">
				<div class="header">
					<div class="checkbox"><input type="checkbox"></div>
					<div class="brand-logo"><i class="fa fa-cube"></i></div>
					<div class="brand">Monster</div>
				</div>
				<div class="item">
					<div class="thumbnail"><img src="https://s2.bukalapak.com/img/729118547/small/Earplug_Penutup_Telinga_mirip_ultrafit_with_casing.jpg"></div>
					<div class="layout">
						<span class="product-name">Earplug Penutup Telinga mirip ultrafit with casing</span>
						<div class="quantity-editor"><input type="number"></div>
					</div>
					<div class="delete-btn">
						<i class="fa fa-trash-o"></i>
					</div>
				</div>
			</div>

			<!-- item #3 -->
			<div class="cart-item">
				<div class="header">
					<div class="checkbox"><input type="checkbox"></div>
					<div class="brand-logo"><i class="fa fa-cube"></i></div>
					<div class="brand">Monster</div>
				</div>
				<div class="item">
					<div class="thumbnail"><img src="https://s2.bukalapak.com/img/729118547/small/Earplug_Penutup_Telinga_mirip_ultrafit_with_casing.jpg"></div>
					<div class="layout">
						<span class="product-name">Earplug Penutup Telinga mirip ultrafit with casing</span>
						<div class="quantity-editor"><input type="number"></div>
					</div>
					<div class="delete-btn">
						<i class="fa fa-trash-o"></i>
					</div>
				</div>
			</div>
		</div>

		<div class="pay-at-once">
			<div class="header">
				<div class="title">Bayar Sekaligus</div>
			</div>
			<div class="content">
				<span class="status">Silahkan pilih transaksi yang ingin dibayar</span>
				<hr />
				<div class="price">
					<span class="label">Total bayar</span>
					<span class="price-total">Rp.100.000</span>
				</div>
				<button>Bayar Sekaligus</button>
			</div>
		</div>
	</div>

</div>
@endsection
