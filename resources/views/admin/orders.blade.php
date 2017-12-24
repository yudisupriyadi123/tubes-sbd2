@extends('admin.index')
@section('title',$title)
@section('content')
<div class="main-admin">
	<div class="block">
		<div class="content">
			<div class="frame-order">
				<div class="ctn head">
					<div class="ctn-1">
						ID Order
					</div>
					<div class="ctn-2">
						Full Name
					</div>
					<div class="ctn-3">
						Ship to
					</div>
					<div class="ctn-4">
						Date
					</div>
					<div class="ctn-5">
						Total
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
						2012/12/12 07:07:07 pm
					</div>
					<div class="ctn-5">
						IDR 350,000,00
					</div>
					<div class="ctn-6">
						<button class="btn-circle btn-main-color-2">
							<div class="fa fa-lg fa-ellipsis-h"></div>
						</button>
						<button class="btn-circle btn-main-color-2">
							<div class="fa fa-lg fa-check"></div>
						</button>
						<button class="btn-circle btn-main-color-2">
							<div class="fa fa-lg fa-eye"></div>
						</button>
					</div>
				</div>
				@endfor
			</div>
		</div>
	</div>
</div>
@endsection