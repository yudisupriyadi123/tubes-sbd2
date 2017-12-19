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
			<div class="header-post">
				<h1>This is Just for a Test</h1>
				<div class="post-bot">
					<div class="ratting">
						<label class="fa fa-lg fa-star"></label>
						<label class="fa fa-lg fa-star"></label>
						<label class="fa fa-lg fa-star"></label>
						<label class="fa fa-lg fa-star-o"></label>
						<label class="fa fa-lg fa-star-o"></label>
						<label class="review">123 reviews</label>
					</div>
					<div class="locate">
						<label class="fa fa-lg fa-map-marker"></label>
						<label class="val">Jl. Maribaya Kec. Lembang Kab. Bandung Barat 39401</label>
					</div>
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
			</div>
			<div class="content">
				<h2>Descriptions</h2>
				<p>Method Lock()digunakan untuk menandai bahwa semua operasi pada baris setelah kode tersebut adalah bersifat eksklusif. Hanya ada satu buah goroutine yang bisa melakukannya dalam satu waktu. Jika ada banyak goroutine yang eksekusinya bersamaan, harus antri. Pada kode di atas terdapat kode untuk increment nilai meter.val. Maka property tersebut hanya bisa diakses oleh satu goroutine saja. Method Unlock() akan membuka kembali akses operasi ke property/variabel yang di lock. Bisa dibilang, proses mutual exclusion terjadi diantara kedua method tersebut, Unlock() Lock() dan. Tak hanya ketika pengubahan nilai, pada saat pengaksesan juga perlu ditambahkan kedua fungsi ini, agar data yang diambil benar-benar data pada waktu itu.</p>
			</div>
			<div class="content">
				<h2>Others</h2>
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
			<div class="content">
				<h2>Location</h2>
				<div class="location fa fa-lg fa-map-marker"></div>
			</div>
		</div>
		<div class="side">
			<div class="content" id="ctn-review">
				<h2>All Reviews</h2>
				<div class="give-ratting">
					<div class="give-review">
						<label class="title">3.0</label>
						<label class="icn fa fa-lg fa-star"></label>
						<label class="icn fa fa-lg fa-star"></label>
						<label class="icn fa fa-lg fa-star"></label>
						<label class="icn fa fa-lg fa-star-o"></label>
						<label class="icn fa fa-lg fa-star-o"></label>
						<label class="ttl">123 reviews</label>
					</div>
					<ul>
						<li>
							<div class="title">Excellent</div>
							<div class="row-select"><label class="row-length" style="width: 50%;"></label></div>
							<div class="ttl">50%</div>
						</li>
					    <li>
					    	<div class="title">Very Good</div>
					    	<div class="row-select"><label class="row-length" style="width: 30%;"></label></div>
					    	<div class="ttl">30%</div>
					    </li>
					    <li>
					    	<div class="title">Average</div>
					    	<div class="row-select"><label class="row-length" style="width: 10%;"></label></div>
					    	<div class="ttl">10%</div>
					    </li>
					    <li>
					    	<div class="title">Poork</div>
					    	<div class="row-select"><label class="row-length" style="width: 7%;"></label></div>
					    	<div class="ttl">7%</div>
					    </li>
					    <li>
					    	<div class="title">Terrible</div>
					    	<div class="row-select"><label class="row-length" style="width: 3%;"></label></div>
					    	<div class="ttl">3%</div>
					    </li>
					</ul>
				</div>
				<!--
				<div class="tool">
					<ul>
					    <li>
					    	<div class="fa fa-lg fa-heart-o"></div>
					    </li>
					    <li>
					    	<div class="fa fa-lg fa-comment-o"></div>
					    </li>
					    <li>
					    	<div class="fa fa-lg fa-share-alt"></div>
					    </li>
					    <li class="main-tool">
					    	<div class="fa fa-lg fa-shopping-cart"></div>
					    </li>
					</ul>
				</div>
				-->
				<div class="border-bottom"></div>
				<form>
					<!--<textarea name="comment" class="textarea" placeholder="Write Comment ..." required></textarea>-->
					<input type="text" name="comment" class="txt txt-big-padding" placeholder="Write Comment ..." required>
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
