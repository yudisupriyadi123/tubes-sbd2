@extends('layout.index')
@section('title',$title)
@section('content')
<div class="frame-sign">
	<div class="main-sign">
		<div class="top">
			<div class="border-bottom"></div>
			<h2>Check your Order</h2>
			<div class="border-bottom"></div>
		</div>
		<div class="mid">
			<form method="post" action="{{ url('order/check') }}">
				{{ csrf_field() }}
				@if (isset($order_id_not_found))
				<div class="block">
					<span class="alert">Order ID tidak ditemukan</span>
				</div>
				@endif
				<div class="block">
					<div class="icn">Order ID</div>
					<input type="text" name="trans_id" class="txt" required="true">
				</div>
				<div class="block">
					<input type="submit" name="cek" value="Check" class="btn btn-active-2 btn-main-color">
				</div>
			</form>
		</div>
		<div class="bot"></div>
	</div>
</div>
@endsection