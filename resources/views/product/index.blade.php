@extends('layout.index')
@section('title',$title)
@section('content')
<script type="text/javascript">
	$(document).ready(function() {
		$('#panel-post .ntf').click(function(event) {
			$('#panel-post .ntf').each(function(index, el) {
				$(this).removeClass('notif-selected');
			});
			$(this).addClass('notif-selected');
			var cl = $(this).attr('id');
			if (cl === 'deskripsi') {
				$('#ctn-deskripsi').show();
				$('#ctn-review').hide();
			}
			else {
				$('#ctn-deskripsi').hide();
				$('#ctn-review').show();
			}
			return false;
		});

		$('#desc-panel ul li').on('click', function(event) {
			event.preventDefault();
			$('#desc-panel ul li').each(function(index, el) {
				$(this).removeClass('desc-panel-select');
			});
			$(this).addClass('desc-panel-select');
			var target = $(this).attr('key');

			$('.description-post .main .content').each(function(index, el) {
				$(this).removeClass('content-show');
			});
			$('#'+target).addClass('content-show');
		});

		var qty_cost_min = 1;
		var qty_cost_max = 9;
		$('#qty-min').on('click', function(event) {
			var new_qty = (parseInt($('#qty').val()) - 1);
			if (new_qty <= 1) {
				$('#qty').val(qty_cost_min);
			} else {
				$('#qty').val(new_qty);
			}
		});
		$('#qty-plus').on('click', function(event) {
			var new_qty = (parseInt($('#qty').val()) + 1);
			if (new_qty >= qty_cost_max) {
				$('#qty').val(qty_cost_max);	
			} else {
				$('#qty').val(new_qty);
			}
			
		});
	});
</script>
<div class="product-panel">
	<div class="main">
		<div class="post-idr idr">
			<div class="ttl">IDR: 587,000</div>
			<div class="ttl2">IDR: 687,000</div>
		</div>
		<div class="post-btn">
			<button class="btn btn-main-color">
				<label class="fa fa-lg fa-shopping-cart"></label>
				<label>Add to Cart</label>
			</button>
			<button class="btn btn-sekunder-color">
				<label class="fa fa-lg fa-money"></label>
				<label>Order Now</label>
			</button>
		</div>
	</div>
</div>
<div class="view-post main-width">

	<div class="content-post">
		<div class="main-post" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
		<div class="side-post">
			<div class="other-picts">
				<div class="view-picts" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
				<div class="view-picts" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
				<div class="view-picts" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
				<div class="view-picts" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
				<div class="view-picts" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
				<div class="view-picts" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
				<div class="view-picts" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
				<div class="view-picts" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
			</div>
		</div>
	</div>

	<div class="description-post">
		<div class="main">

			<div class="desc-panel" id="desc-panel">
				<ul>
					<li class="desc-panel-select" key="info">Product</li>
				    <li key="desc">Descriptions</li>
				    <li key="other">Detail</li>
				    <li key="feed-back">Feed Back</li>
				</ul>
			</div>

			<div class="content content-show" id="info">
				<div class="header-post">
					<h1>This is Just for a Test</h1>
					<div class="post-bot">
						<div class="locate">
							<label class="fa fa-lg fa-user"></label>
							<label class="val">Wisata Kampung</label>
						</div>
						<div class="locate">
							<label class="fa fa-lg fa-clock-o"></label>
							<label class="val">Published on 01/02/2018 12:00:00 PM</label>
						</div>
					</div>
					<div class="idr">
						<div class="ttl">IDR: 587,000</div>
						<div class="ttl2">IDR: 687,000</div>
					</div>
					<div class="size need-p">
						<p><b>Availble size on</b></p>
						<p>You can specificed it letter</p>
						<button class="btn">S</button>
						<button class="btn">M</button>
						<button class="btn">L</button>
						<button class="btn">XL</button>
						<button class="btn">XXL</button>
					</div>
					<div class="color need-p">
						<p><b>Availble color on</b></p>
						<button class="btn btn-color color-1"></button>
						<button class="btn btn-color color-2"></button>
						<button class="btn btn-color color-3"></button>
						<button class="btn btn-color color-4"></button>
						<button class="btn btn-color color-5"></button>
					</div>
					<div class="stock need-p">
						<p><b>Available <clr> on > 9 Stock </clr> Products</b></p>
						<p>Put count of product that you want</p>
						<div class="place-stock">
							<button class="op btn-qty" id="qty-min">
								<label class="fa fa-lg fa-minus"></label>
							</button>
							<input type="text" name="qty" class="op txt" placeholder="qty" value="1" id="qty" disabled="true">
							<button class="op btn-qty" id="qty-plus">
								<label class="fa fa-lg fa-plus"></label>
							</button>
						</div>
					</div>
					<div class="post-btn">
						<button class="btn btn-main-color">
							<label class="fa fa-lg fa-shopping-cart"></label>
							<label>Add to Cart</label>
						</button>
						<button class="btn btn-sekunder-color">
							<label class="fa fa-lg fa-money"></label>
							<label>Order Now</label>
						</button>
					</div>
				</div>
			</div>

			<div class="content" id="desc">
				<h2>Descriptions</h2>
				<p>Method Lock()digunakan untuk menandai bahwa semua operasi pada baris setelah kode tersebut adalah bersifat eksklusif. Hanya ada satu buah goroutine yang bisa melakukannya dalam satu waktu. Jika ada banyak goroutine yang eksekusinya bersamaan, harus antri. Pada kode di atas terdapat kode untuk increment nilai meter.val. Maka property tersebut hanya bisa diakses oleh satu goroutine saja. Method Unlock() akan membuka kembali akses operasi ke property/variabel yang di lock. Bisa dibilang, proses mutual exclusion terjadi diantara kedua method tersebut, Unlock() Lock() dan. Tak hanya ketika pengubahan nilai, pada saat pengaksesan juga perlu ditambahkan kedua fungsi ini, agar data yang diambil benar-benar data pada waktu itu.</p>
				<h2>Notes</h2>
				<p>Method Lock()digunakan untuk menandai bahwa semua operasi pada baris setelah kode tersebut adalah bersifat eksklusif. Hanya ada satu buah goroutine yang bisa melakukannya dalam satu waktu. Jika ada banyak goroutine yang eksekusinya bersamaan, harus antri. Pada kode di atas terdapat kode untuk increment nilai meter.val. Maka property tersebut hanya bisa diakses oleh satu goroutine saja.</p>
			</div>
			<div class="content" id="other">
				<h2>Details Product</h2>
				<ul>
				    <li>
				    	<label class="fa fa-lg fa-circle"></label>
				    	This is just for a Test.
				    </li>
				    <li>
				    	<label class="fa fa-lg fa-circle"></label>
				    	This is just for a Test.
				    </li>
				    <li>
				    	<label class="fa fa-lg fa-circle"></label>
				    	This is just for a Test.
				    </li>
				    <li>
				    	<label class="fa fa-lg fa-circle"></label>
				    	This is just for a Test.
				    </li>
				</ul>
				<h2>Details Product</h2>
				<ul>
				    <li>
				    	<label class="fa fa-lg fa-circle"></label>
				    	This is just for a Test.
				    </li>
				    <li>
				    	<label class="fa fa-lg fa-circle"></label>
				    	This is just for a Test.
				    </li>
				    <li>
				    	<label class="fa fa-lg fa-circle"></label>
				    	This is just for a Test.
				    </li>
				    <li>
				    	<label class="fa fa-lg fa-circle"></label>
				    	This is just for a Test.
				    </li>
				</ul>
				<h2>Details Product</h2>
				<ul>
				    <li>
				    	<label class="fa fa-lg fa-circle"></label>
				    	This is just for a Test.
				    </li>
				    <li>
				    	<label class="fa fa-lg fa-circle"></label>
				    	This is just for a Test.
				    </li>
				    <li>
				    	<label class="fa fa-lg fa-circle"></label>
				    	This is just for a Test.
				    </li>
				    <li>
				    	<label class="fa fa-lg fa-circle"></label>
				    	This is just for a Test.
				    </li>
				</ul>
			</div>
			<!--
			<div class="content" id="location">
				<h2>Location</h2>
				<div class="location fa fa-lg fa-map-marker"></div>
			</div>
			-->
			<div class="content" id="feed-back">
				<div class="border-bottom"></div>
				<form>
					<!--<textarea name="comment" class="textarea" placeholder="Write Comment ..." required></textarea>-->
					<input type="text" name="comment" class="txt txt-big-padding" placeholder="Write Feed Back ..." required>
				</form>
				<div class="comment-content">
					<div class="frame-comment comment-guess">
						<div class="desk comment-guess-radius">
							<b>Guess</b> This is just for example.
						</div>
						<div class="tgl">
							10/11/2017 10:00 pm
						</div>
					</div>

					<div class="frame-comment comment-owner">
						<div class="desk comment-owner-radius">
							<b>Owner</b> This is just for example. This is just for example.This is just for example.This is just for example.This is just for example.
						</div>
						<div class="tgl">
							10/11/2017 10:00 pm
						</div>
					</div>

					<div class="frame-comment comment-guess">
						<div class="desk comment-guess-radius">
							<b>Guess</b> This is just for example.
						</div>
						<div class="tgl">
							10/11/2017 10:00 pm
						</div>
					</div>
					<div class="frame-comment comment-guess">
						<div class="desk comment-guess-radius">
							<b>Guess</b> This is just for example.
						</div>
						<div class="tgl">
							10/11/2017 10:00 pm
						</div>
					</div>

					<div class="frame-comment comment-owner">
						<div class="desk comment-owner-radius">
							<b>Owner</b> This is just for example. This is just for example.This is just for example.This is just for example.This is just for example.
						</div>
						<div class="tgl">
							10/11/2017 10:00 pm
						</div>
					</div>

					<div class="frame-comment comment-guess">
						<div class="desk comment-guess-radius">
							<b>Guess</b> This is just for example.
						</div>
						<div class="tgl">
							10/11/2017 10:00 pm
						</div>
					</div>
					<div class="frame-comment comment-guess">
						<div class="desk comment-guess-radius">
							<b>Guess</b> This is just for example.
						</div>
						<div class="tgl">
							10/11/2017 10:00 pm
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="side">
			
		</div>
	</div>
</div>
	<div class="home-content main-width">
		<div class="home-panel">
			<div class="panel-title">
				RELATED POSTS
			</div>
		</div>
		<div class="home-products grid-5 scroll-left">
			<?php for ($i = 0; $i < 5; $i++) { ?>
			@include('main.product')
			<?php } ?>
		</div>
	</div>
	
@endsection
