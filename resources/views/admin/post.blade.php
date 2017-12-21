@extends('admin.index')
@section('title',$title)
@section('content')
<div class="compose">
<form>
	<div class="content border-bottom">
		<div class="panel">
			<label class="ttl">Gambar untuk Sampul *</label>
		</div>
		<div class="place padding-bottom">
			<div class="cover">
				<div class="add">
					<label class="fa fa-lg fa-image"></label>
				</div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="panel">
			<label class="ttl">Galeri *</label>
		</div>
		<div class="place">
			<div class="galeri">
				<div class="add fa fa-lg fa-image"></div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="panel">
			<label class="ttl">Judul *</label>
		</div>
		<div class="place">
			<input type="text" name="title" class="txt title" placeholder="" required="true">
		</div>
	</div>
	<div class="content">
		<div class="panel">
			<label class="ttl">Harga *</label>
		</div>
		<div class="place">
			<input type="text" name="harga-1" class="txt title" placeholder="IDR" required="true">
		</div>
	</div>
	<div class="content">
		<div class="panel">
			<label class="ttl">Harga ke 2</label>
		</div>
		<div class="place">
			<input type="text" name="harga-2" class="txt title" placeholder="IDR">
		</div>
	</div>
	<div class="content">
		<div class="panel">
			<label class="ttl">Deskripsi *</label>
			<div class="tool">
				<ul>
				    <li>
				    	<label class="icn fa fa-lg fa-camera"></label>
				    </li>
				    <li>
				    	<label class="icn fa fa-lg fa-quote-left"></label>
				    </li>
				    <li>
				    	<label class="icn fa fa-lg fa-code"></label>
				    </li>
				</ul>
			</div>
		</div>
		<div class="place">
			<div contenteditable="true" class="txt deskripsi"></div>
		</div>
	</div>
	<div class="content">
		<div class="panel">
			<label class="ttl">Alamat *</label>
		</div>
		<div class="place">
			<div contenteditable="true" class="txt deskripsi"></div>
		</div>
	</div>
	<div class="content">
		<div class="panel">
			<label class="ttl">Fasilitas</label>
		</div>
		<div class="place">
			<div class="facility">
				<input type="text" name="fasilty" class="txt fs" placeholder="Tambahkan Fasilitas">
				<div class="btn btn-color-sekunder">
					<label class="fa fa-lg fa-plus"></label>
				</div>
				<ul id="place-facility"></ul>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="panel">
			<label class="ttl">Tags</label>
		</div>
		<div class="place">
			<div class="facility">
				<input type="text" name="fasilty" class="txt fs" placeholder="Tambahkan Tag">
				<div class="btn btn-color-sekunder">
					<label class="fa fa-lg fa-plus"></label>
				</div>
				<ul id="place-tags"></ul>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="panel">
			<label class="ttl">Kategori *</label>
		</div>
		<div class="place">
			<div class="facility">
				<div class="select">
					<select name="place" required="true">
						<option value="pilih">Pilih Kategori</option>
						@for ($i=1; $i < 25; $i++)
						<option value="Kategori{{ $i }}">Kategori {{ $i }}</option>
						@endfor
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="content border-bottom">
		<div class="panel">
			<label class="ttl">Lokasi</label>
		</div>
		<div class="place padding-bottom">
			<div class="galeri">
				<div class="add loc fa fa-lg fa-map-marker"></div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="place">
			<input type="submit" name="submit" class="btn btn-main-color" value="Kirim Sekarang">
		</div>
	</div>
	<div class="content border-bottom">
		<div class="place padding-bottom">
			<input type="submit" name="submit" class="btn btn-main-color-2" value="Simpan Dulu">
		</div>
	</div>
</form>
</div>
@endsection