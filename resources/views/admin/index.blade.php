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
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/admin.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/post.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/frame.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/costumer.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/cart.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/js/jquery-ui/jquery-ui.min.css') }}">

	<script type="text/javascript" src="{{ asset('/js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/jquery-ui/jquery-ui.min.js') }}"></script>

	<script type="text/javascript">		
		window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        
        $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
	</script>
</head>
<body>
<div id="main-place">
	<div id="side">
		<div class="place">
			<ul>
			    <a href="{{ url('/') }}">
			    	<li>
			    		<label class="icn fa fa-lg fa-home"></label>
			    		<label class="ttl">Home Feeds</label>
			    	</li>
			    </a>
			    <a href="{{ url('/admin/dashboard') }}">
			    	<li>
			    		<label class="icn fa fa-lg fa-dashboard"></label>
			    		<label class="ttl">Dashboard</label>
			    	</li>
			    </a>
			    <a href="{{ url('/admin/post') }}">
			    	<li>
			    		<label class="icn fa fa-lg fa-edit"></label>
			    		<label class="ttl">Add Product</label>
			    	</li>
			    </a>
			    <a href="{{ url('/admin/categories') }}">
			    	<li>
			    		<label class="icn fa fa-lg fa-th"></label>
			    		<label class="ttl">Categories</label>
			    	</li>
			    </a>
			    <a href="{{ url('/admin/orders') }}">
			    	<li>
			    		<label class="icn fa fa-lg fa-shopping-cart"></label>
			    		<label class="ttl">Orders</label>
			    	</li>
			    </a>
			    <a href="{{ url('/admin/costumers') }}">
			    	<li>
			    		<label class="icn fa fa-lg fa-users"></label>
			    		<label class="ttl">Costumers</label>
			    	</li>
			    </a>
			    <a href="{{ url('/admin/products') }}">
			    	<li>
			    		<label class="icn fa fa-lg fa-shopping-bag"></label>
			    		<label class="ttl">List Products</label>
			    	</li>
			    </a>
			    <a href="{{ url('/admin/profile') }}">
			    	<li>
			    		<label class="icn fa fa-lg fa-user"></label>
			    		<label class="ttl">Admin Profile</label>
			    	</li>
			    </a>
			    <a href="{{ url('/admin/setting') }}">
			    	<li>
			    		<label class="icn fa fa-lg fa-gear"></label>
			    		<label class="ttl">Setting</label>
			    	</li>
			    </a>
			    <a href="{{ url('/admin/info') }}">
			    	<li>
			    		<label class="icn fa fa-lg fa-info"></label>
			    		<label class="ttl">Info</label>
			    	</li>
			    </a>
			    <a href="{{ url('/admin/logout') }}">
			    	<li>
			    		<label class="icn fa fa-lg fa-power-off"></label>
			    		<label class="ttl">Logout</label>
			    	</li>
			    </a>
			</ul>
		</div>
	</div>
	<div id="main">
		<div id="header">
			<div class="place">
				<div class="main">
					<h1>{{ $title }}</h1>
					<ul>
						<a href="{{ url('/admin/logout') }}">
							<li>
						    	<div class="fa fa-lg fa-power-off"></div>
						    </li>
						</script>
					    <a href="{{ url('/admin/setting') }}">
						    <li>
						    	<div class="fa fa-lg fa-gear"></div>
						    </li>
						</script>
					    <a href="{{ url('/admin/profile') }}">
						    <li>
						    	<div class="fa fa-lg fa-user"></div>
						    </li>
						</a>
					</ul>
				</div>
			</div>
		</div>
		<div id="body">
			<div class="ctn">
				@include("main.loading")
				@yield("content")
			</div>
		</div>
	</div>
</div>
</body>
</html>
