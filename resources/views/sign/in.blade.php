@extends('layout.index')
@section('title',$title)
@section('content')
<script type="text/javascript">
	var server = '{{ url("/") }}';

	$(document).ready(function() {
		$('#login-user').submit(function(event) {
			/* Act on the event */
			var email = $('#login-user #email-user').val();
			var paswd = $('#login-user #paswd-user').val();
			
			$.ajax({
				url: '{{ url("/user/login") }}',
				type: 'post',
				data: {'email':email, 'password':paswd},
				beforeSend: function() {
					$('#btn-login-user').val('Please Wait...');
					$('.btn').attr('disabled','disabled');
				}
			})
			.done(function(data) {
				if (data === 'failed') {
					opFailed('open', 'Email or Password is wrong.');
					$('#btn-login-user').val('Try again');
					$('.btn').removeAttr('disabled');
				} else {
					window.location = server;
					$('#btn-login-user').val('Success');
				}
			})
			.fail(function() {
				opFailed('open', 'Please try again, and check your internet connections.');
				$('#btn-login-user').val('Try again');
				$('.btn').removeAttr('disabled');
			})
			.always(function() {
				$('#btn-login-user').val('Login');
				$('.btn').removeAttr('disabled');
			});
			
		});
	});
</script>
<div class="frame-sign">
	<div class="main-sign">
		<div class="top">
			<div class="panel-logo">
				<a href="{{ url('/') }}">
					<img src="{{ url('/') }}/icons/ao2.png" alt="logo">
				</a>
			</div>
			<h2>Customer Login</h2>
		</div>
		<div class="mid">
			<div class="border-bottom"></div>
			<form id="login-user" action="javascript:void(0)">
				<div class="block">
					<div class="icn">Email</div>
					<input type="email" name="email" class="txt" placeholder="" required="true" id="email-user">
				</div>
				<div class="block">
					<div class="icn">Password</div>
					<input type="password" name="password" class="txt" placeholder="" required="true" id="paswd-user">
				</div>
				<div class="block">
					<input type="submit" name="login" value="Login" id="btn-login-user" class="btn btn-active-2 btn-main-color">
				</div>
			</form>
			<div class="border-bottom">
				<label class="fa fa-lg fa-circle"></label>
				<label class="fa fa-lg fa-circle"></label>
				<label class="fa fa-lg fa-circle"></label>
			</div>
			<div class="block">
				<a href="{{ url('signup') }}">
					<input type="button" name="signup" value="Signup" class="btn btn-active-2 btn-main-color-2">
				</a>
			</div>
		</div>
		<div class="bot"></div>
	</div>
</div>
@endsection