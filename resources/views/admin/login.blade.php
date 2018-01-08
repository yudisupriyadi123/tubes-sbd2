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
				<form id="login-admin" method="post" action="{{ url('/admin/login') }}">
					{{ csrf_field() }}

					<div class="block">
						<div class="icn">Email</div>
						<input type="email" name="email" class="txt" placeholder="" required="true" id="email-admin">
						@if ($errors->has('email'))
						<span class="help-block" style="padding-top: 10px; color: #CA4F4F;">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
						@endif
					</div>
					<div class="block">
						<div class="icn">Password</div>
						<input type="password" name="password" class="txt" placeholder="" required="true" id="paswd-admin">
						@if ($errors->has('password'))
						<span class="help-block" style="padding-top: 10px; color: #CA4F4F;">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
						@endif
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