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
			<form>
				<div class="block">
					<div class="icn">Order ID</div>
					<input type="text" name="text" class="txt" placeholder="123456..." required="true">
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