@extends('admin.index')
@section('title',$title)
@section('content')
<div class="main-admin">
		<div class="block">
			<h3>Add Category</h3>
			<div class="content grid-block-2">
				<div class="compose">
					<form>
					<div class="content">
						<div class="panel">
							<label class="ttl">Parent Category *</label>
						</div>
						<div class="place">
							<input type="text" name="title" class="txt txt-main-color title" placeholder="" required="true">
						</div>
					</div>
					<div class="content border-bottom">
						<div class="place padding-bottom">
							<input type="submit" name="submit" class="btn btn-main-color" value="Add Category">
						</div>
					</div>
					</form>
				</div>

				<div class="compose">
					<form>
					<div class="content">
						<div class="panel">
							<label class="ttl">Child Category *</label>
						</div>
						<div class="place">
							<input type="text" name="title" class="txt txt-main-color title" placeholder="" required="true">
						</div>
					</div>
					<div class="content">
						<div class="place">
							<div class="facility">
								<div class="select">
									<select name="place" required="true">
										<option value="choose">Parent category</option>
										@for ($i=1; $i < 25; $i++)
										<option value="Category{{ $i }}">category {{ $i }}</option>
										@endfor
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="content border-bottom">
						<div class="place padding-bottom">
							<input type="submit" name="submit" class="btn btn-main-color" value="Add Category">
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
		<div class="content">
			<div class="frame-order">
				<div class="ctn-ctr head">
					<div class="ctn-1">
						ID Category
					</div>
					<div class="ctn-2">
						Status
					</div>
					<div class="ctn-3">
						Category
					</div>
					<div class="ctn-4">
						Actions
					</div>
				</div>
				@for ($i=1; $i <= 25; $i++)
				<div class="ctn-ctr value">
					<div class="ctn-1">
						<a href="{{ url('/') }}">
							12045
						</a>
					</div>
					<div class="ctn-2">
						<span>parent</span>
					</div>
					<div class="ctn-3">
						Category in HereCategory in Here
					</div>
					<div class="ctn-4">
						<button class="btn-circle btn-main-color-2">
							<div class="fa fa-lg fa-pencil"></div>
						</button>
						<button class="btn-circle btn-main-color-2">
							<div class="fa fa-lg fa-trash"></div>
						</button>
					</div>
				</div>
				@endfor

			</div>
		</div>
</div>
@endsection