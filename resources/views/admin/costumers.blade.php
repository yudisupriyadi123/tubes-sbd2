@extends('admin.index')
@section('title',$title)
@section('content')
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
						<a href="{{ url('/') }}">
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
						<a href="{{ url('/') }}">
							<input type="button" name="detail" class="btn btn-main-color-2" value="Detail">
						</a>
					</div>
				</div>
				@endfor

			</div>
		</div>
</div>
@endsection