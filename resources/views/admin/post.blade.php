@extends('admin.index')
@section('title',$title)
@section('content')
<div class="compose">
<form>
	<div class="content border-bottom">
		<div class="panel">
			<label class="ttl">Cover *</label>
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
			<label class="ttl">Galery *</label>
		</div>
		<div class="place">
			<div class="galeri">
				<div class="add fa fa-lg fa-image"></div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="panel">
			<label class="ttl">Title *</label>
		</div>
		<div class="place">
			<input type="text" name="title" class="txt txt-main-color title" placeholder="" required="true">
		</div>
	</div>
	<div class="content">
		<div class="panel">
			<label class="ttl">Price *</label>
		</div>
		<div class="place">
			<input type="text" name="harga-1" class="txt txt-main-color title" placeholder="" required="true">
		</div>
	</div>
	<div class="content">
		<div class="panel">
			<label class="ttl">Second Price or Discount</label>
		</div>
		<div class="place">
			<input type="text" name="harga-2" class="txt txt-main-color title" placeholder="">
		</div>
	</div>
	<div class="content">
		<div class="panel">
			<label class="ttl">Description *</label>
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
			<div contenteditable="true" class="txt txt-main-color deskripsi"></div>
		</div>
	</div>
	<div class="content">
		<div class="panel">
			<label class="ttl">Address *</label>
		</div>
		<div class="place">
			<div contenteditable="true" class="txt txt-main-color deskripsi"></div>
		</div>
	</div>
	<div class="content">
		<div class="panel">
			<label class="ttl">Add Details</label>
		</div>
		<div class="place">
			<div class="facility">
				<input type="text" name="fasilty" class="txt txt-main-color fs" placeholder="">
				<div class="btn btn-main-color">
					<label class="fa fa-lg fa-plus"></label>
				</div>
				<ul id="place-facility"></ul>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="panel">
			<label class="ttl">Category *</label>
		</div>
		<div class="place">
			<div class="facility">
				<div class="select">
					<select name="place" required="true">
						<option value="choose">Choose Category</option>
						@for ($i=1; $i < 25; $i++)
						<option value="Category{{ $i }}">Category {{ $i }}</option>
						@endfor
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="panel">
			<label class="ttl">Sub Category *</label>
		</div>
		<div class="place">
			<div class="facility">
				<div class="select">
					<select name="place" required="true">
						<option value="choose">Choose Sub-category</option>
						@for ($i=1; $i < 25; $i++)
						<option value="Subcategory{{ $i }}">Sub-category {{ $i }}</option>
						@endfor
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="place">
			<input type="submit" name="submit" class="btn btn-main-color" value="Add Product">
		</div>
	</div>
	<div class="content border-bottom">
		<div class="place padding-bottom">
			<input type="submit" name="submit" class="btn btn-main-color-2" value="Save It">
		</div>
	</div>
</form>
</div>
@endsection