@extends('admin.index')
@section('title',$title)
@section('content')
<script type="text/javascript">
	$(document).ready(function() {
		$('#costumer-panel ul li').on('click', function(event) {
			event.preventDefault();
			$('#costumer-panel ul li').each(function(index, el) {
				$(this).removeClass('desc-panel-select');
			});
			$(this).addClass('desc-panel-select');
			var target = $(this).attr('key');

			$('#costumer-content .ctn').each(function(index, el) {
				$(this).attr('class', 'ctn ctn-hide');
			});
			$('#'+target).attr('class', 'ctn ctn-show');
		});
	});
</script>
<div class="main-admin">
	<div class="content">
			<div class="frame-order">
				<div class="ctn head">
					<div class="ctn-1">
						ID User
					</div>
					<div class="ctn-2">
						Full Name
					</div>
					<div class="ctn-3">
						Address
					</div>
					<div class="ctn-4">
						Email
					</div>
					<div class="ctn-5">
						Photo
					</div>
					<div class="ctn-6">
						Actions
					</div>
				</div>
				@for ($i=1; $i <= 25; $i++)
				<div class="ctn value">
					<div class="ctn-1">
						<a href="{{ url('/admin/costumer/12045') }}">
							12045
						</a>
					</div>
					<div class="ctn-2">
						<span>Ganjar Hadiatna</span>
					</div>
					<div class="ctn-3">
						Bandung, Jawa Barat, Kec. Lembang Kel. Desa Cibodas 07/02 40391
					</div>
					<div class="ctn-4">
						ganjar@gmail.com
					</div>
					<div class="ctn-5">
						<div class="image" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
					</div>
					<div class="ctn-6">
						<a href="{{ url('/admin/costumer/12045') }}">
							<input type="button" name="detail" class="btn btn-main-color-2" value="Detail">
						</a>
					</div>
				</div>
				@endfor

			</div>
		</div>
</div>
@endsection