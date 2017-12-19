<!DOCTYPE html>
<html>
<head>
	<title>Academy Otaku - @yield("title")</title>
	<meta charset=utf-8>
	<meta name=description content="Desa Otaku">
	<meta name=viewport content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link href="<?php echo url("/"); ?>/icons/ao4.png" rel='SHORTCUT ICON'/>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/css/font-awesome.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/assets.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/header.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/footer.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/cart.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/product.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/sign.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/main-home.css') }}">

	<script type="text/javascript" src="{{ asset('/js/jquery.js') }}"></script>

	<script type="text/javascript">
		window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        function setScroll(ctr) {
        	if (ctr == "hide") {
        		$('html').addClass('no-scroll');
        	}
        	else {
        		$('html').removeClass('no-scroll');
        	}
        }
        function openCtr() {
        	$('#ctr').addClass('show');
        }
        function closeCtr() {
        	$('#ctr').removeClass('class');
        }
        function openCart() {
        	$('#cart').addClass('show');
        }
        function closeCart() {
        	$('#cart').removeClass('class');
        }
        function openMenu() {
        	$('#menu-mobile').animate({'right':'0%'},300);
        }
        function closeMenu() {
        	$('#menu-mobile').animate({'right':'-100%'},300);
        }
		$(document).ready(function() {
			$(document).scroll(function(event) {
				var top = $(this).scrollTop();
				if (top > 50) {
					$('.to-top').fadeIn();
				}
				else {
					$('.to-top').fadeOut();
				}
			});
			$('#ctr').on('click', function(event) {
				var tr = $('.'+event.target.id).attr('class');
        		if (tr === 'main-popup ctr') {
        			$('#ctr').removeClass('show');
        		}
			});
			$('#cart').on('click', function(event) {
				var tr = $('.'+event.target.id).attr('class');
        		if (tr === 'main-popup cart') {
        			$('#cart').removeClass('show');
        		}
			});


			$('.to-top').on('click', function() {
				$("html, body").animate({
					scrollTop: 0
				}, 500);
			});

			/*$('.need-zoom').mouseover(function(event) {
				$(this).animate({
					'background-size':'110%'
				},300);
			}).mouseleave(function(event) {
				$(this).animate({
					'background-size':'100%'
				},300);
			});*/

		});
	</script>
</head>
<body>
<div id="header">
	<div class="frame-panel">
		<div class="main-panel">
			<div class="place-panel main-width">
				<ul>
					<div class="panel-block-logo">
					    <li class="main-menu">
						    <div class="panel-logo">
						    	<a href="{{ url('/') }}">
						    		<img src="{{ url('/') }}/icons/ao2.png" alt="logo">
						    	</a>
						    </div>
					    </li>
					</div>
					<div class="nav-mobile fa fa-lg fa-bars" onclick="openMenu()"></div>
					<div class="menu-mobile" id="menu-mobile">
						<div class="top-menu-mobile">
							<div class="nav-mobile fa fa-lg fa-close" onclick="closeMenu()"></div>
						</div>
						<div class="panel-block-search">
						    <li>
						    	<div class="head-top panel-search">
						    		<form action="{{ url('/search') }}" method="get">
						    			<input type="text" name="q" class="main-text" placeholder="Search" required="true">
							    		<button type="submit" class="btn-search fa fa-lg fa-search"></button>
						    		</form>
						    	</div>
						    </li>
						    <div class="menu-user">

							    <div class="icon-top btn-white-color" onclick="openCart()" id="menu-cart">
							    	<a href="{{ url('/cart') }}">
							    		<div class="icn fa fa-lg fa-shopping-cart"></div>
							    	</a>
							    	@include('main.cart')
							    </div>

							    <a href="{{ url('/signup') }}">
								    <button class="head-top btn-head btn btn-active-3 btn-white-color-red">
								    	<label>Signup</label>
								    </button>
								</a>
							    <a href="{{ url('/signin') }}">
								    <button class="head-top btn-head btn btn-main-color">
								    	<label>Login</label>
								    </button>
								</a>
							</div>
						</div>

					    <div class="panel-block-menu">
						    <li class="main-menu border-top-hidden" id="category">
						    	<div class="text-panel">
						    		CATEGORIES
						    		<label class="fa fa-lg fa-caret-down"></label>
						    	</div>
						    	<div class="menu-category" id="menu-category">
						    		@include('main.category')
						    	</div>
							</li>
						</div>
						
					</div>
				</ul>
			</div>
		</div>
	</div>
</div>
<div id="body">
	@yield("content")
</div>
<div class="fa fa-lg fa-chevron-up to-top"></div>

<div id="footer">
	<div class="frame-footer">
		<div class="pad footer-lef">
			<div class="panel-logo">
				<a href="{{ url('/') }}">
					<img src="{{ url('/') }}/icons/ao2.png" alt="logo">
				</a>
			</div>
			<div class="about">
				ACADEMYOTAKU.COM adalah situs otaku online shop pertama di Indonesia. Mudah dalam pembelian barang dan Agen-agen yang sudah terpercaya. Update barang terbaru setiap hari mudah dan terjangkau.
			</div>
			<div class="ifo">
				<ul>
				    <li>
				    	<label class="fa fa-lg fa-phone"></label>
				    	089693899869
				    </li>
				    <li>
				    	<label class="fa fa-lg fa-phone"></label>
				    	085123456898
				    </li>
				</ul>
			</div>

		</div>
		<div class="pad footer-mid">
			<h3>Socials</h3>
			<div class="footer-social">
				<ul>
				    <li>
				    	<div class="fa fa-lg fa-facebook"></div>
				    </li>
				    <li>
				    	<div class="fa fa-lg fa-instagram"></div>
				    </li>
				    <li>
				    	<div class="fa fa-lg fa-twitter"></div>
				    </li>
				    <li>
				    	<div class="fa fa-lg fa-pinterest"></div>
				    </li>
				    <li>
				    	<div class="fa fa-lg fa-google"></div>
				    </li>
				    <li>
				    	<div class="fa fa-lg fa-link"></div>
				    </li>
				    <li>
				    	<div class="fa fa-lg fa-link"></div>
				    </li>
				    <li>
				    	<div class="fa fa-lg fa-link"></div>
				    </li>
				</ul>
			</div>
		</div>
		<div class="pad footer-rig">
			<h3>Menu</h3>
			<div class="footer-menu">
				<ul>
				    <a href="{{ url('order/proof') }}">
				    	<li>Send a Payment Proof</li>
				    </a>
				    <a href="{{ url('order/cek') }}">
				    	<li>Check your Order</li>
				    </a>
				    <a href="{{ url('signin') }}">
				    	<li>Signin to your Account</li>
				    </a>
				    <a href="{{ url('signup') }}">
				    	<li>Create an Account</li>
				    </a>
				</ul>
			</div>
		</div>
	</div>
</div>
</body>
</html>
