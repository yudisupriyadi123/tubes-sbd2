<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset=utf-8>
	<meta name=description content="Desa Otaku">
	<meta name=viewport content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link href="<?php echo url("/"); ?>/icons/ao4.png" rel='SHORTCUT ICON'/>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/css/font-awesome.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/assets.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/sign.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/js/jquery-ui/jquery-ui.min.css') }}">

	<script type="text/javascript" src="{{ asset('/js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/jquery-ui/jquery-ui.min.js') }}"></script>
</head>
<script type="text/javascript">
	var server = '{{ url("/") }}';
	window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
    $.ajaxSetup({
	    headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	$(document).ready(function() {
		$('#login-admin').submit(function(event) {
			/* Act on the event */
			var email = $('#login-admin #email-admin').val();
			var paswd = $('#login-admin #paswd-admin').val();
			
			$.ajax({
				url: '{{ url("admin/login") }}',
				type: 'post',
				data: {'email':email, 'password':paswd},
				beforeSend: function() {
					$('#btn-login-admin').val('Please Wait...');
					$('.btn').attr('disabled','disabled');
				}
			})
			.done(function(data) {
				if (data === 'failed') {
					alert('Email or Password is wrong.');
					$('#btn-login-admin').val('Try again');
					$('.btn').removeAttr('disabled');
				} else {
					window.location = server+'/admin';
					$('#btn-login-admin').val('Success');
				}
			})
			.fail(function() {
				alert('Please try again, and check your internet connections.');
				$('#btn-login-admin').val('Try again');
				$('.btn').removeAttr('disabled');
			})
			.always(function() {
				$('#btn-login-admin').val('Login');
				$('.btn').removeAttr('disabled');
			});
			
		});
	});
</script>
<body>
<div class="main-admin">
	<div class="frame-sign">
		<div class="main-sign">
			<div class="top">
				<div class="panel-logo">
					<a href="{{ url('/') }}">
						<img src="{{ url('/') }}/icons/ao2.png" alt="logo">
					</a>
				</div>
				<h2>Admin Login</h2>
			</div>
			<div class="mid">
				<div class="border-bottom"></div>
				<form id="login-admin" action="javascript:void(0)">
					<div class="block">
						<div class="icn">Email</div>
						<input type="email" name="email" class="txt" placeholder="" required="true" id="email-admin">
					</div>
					<div class="block">
						<div class="icn">Password</div>
						<input type="password" name="password" class="txt" placeholder="" required="true" id="paswd-admin">
					</div>
					<div class="block">
						<input type="submit" name="login" value="Login" id="btn-login-admin" class="btn btn-active-2 btn-main-color">
					</div>
				</form>
			<div class="bot"></div>
		</div>
	</div>
</div>
</body>
</html>