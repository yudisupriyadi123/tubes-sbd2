@extends('layout.index')
@section('title',$title)
@section('content')
<div class="frame-sign">
	<div class="main-sign">
		<div class="top">
			<div class="border-bottom"></div>
			<h2>Payment Proof</h2>
			<div class="border-bottom"></div>
		</div>
		<div class="mid">
			<form>
				<div class="block">
					<div class="icn">Order ID</div>
					<input type="text" name="id" class="txt" placeholder="123456.." required="true">
				</div>
				<div class="block">
					<div class="icn">Full Name</div>
					<input type="text" name="name" class="txt" placeholder="" required="true">
				</div>
				<div class="block">
					<div class="icn">Cost Transfer</div>
					<input type="text" name="name" class="txt" placeholder="Ex: 150000" required="true">
				</div>
				<div class="block">
					<div class="icn">Date Transfer</div>
					<input type="text" name="date" class="txt" placeholder="" required="true">
				</div>
				<div class="block">
					<div class="icn">Name of Bank</div>
					<input type="text" name="bank" class="txt" placeholder="Ex: BNI" required="true">
				</div>
				<div class="block">
					<div class="icn">Name of Bank Account</div>
					<input type="text" name="bank_account" class="txt" placeholder="Ex: Ahmed" required="true">
				</div>
				<div class="block">
					<div class="icn">Transfer Proof</div>
					<input type="file" name="file" required="true">
				</div>
				<div class="block">
					<div class="icn">Transfer to</div>
					<select class="txt" required="true">
						<option value="bni">BNI 123456789</option>
						<option value="bca">BCA 123456789</option>
						<option value="mandiri">MANDIRI 123456789</option>
						<option value="bukopin">BUKOPIN 123456789</option>
					</select>
				</div>
				<div class="block">
					<input type="submit" name="submit" value="Confirm" class="btn btn-active-2 btn-main-color">
				</div>
			</form>
		</div>
		<div class="bot"></div>
	</div>
</div>
@endsection