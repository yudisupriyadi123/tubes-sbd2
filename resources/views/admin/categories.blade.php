@extends('admin.index')
@section('title',$title)
@section('content')
<script type="text/javascript">
	function ctr_delete(id) {
		$.ajax({
			url: '{{ url("/admin/category/delete") }}',
			type: 'post',
			data: {'id': id},
			beforeSend: function() {
				$('#btn-ctr-'+id).val('Deletting..');
			}
		})
		.done(function(rest) {
			console.log(rest);
			if (rest == 1) {
				window.location = '{{ url("/admin/categories") }}';
			} else {
				alert('failed deletting category.');
				$('#btn-ctr-'+id).val('Try Again');
			}
		})
		.fail(function() {
			$('#btn-ctr-'+id).val('Failed');
		});
		
	}
	$(document).ready(function() {
		$('#add-subcategory').submit(function(event) {
			var ctr = $('#txt-subcategory').val();
			var prt = $('#parent-category').val();
			if (prt === 0) {
				alert('choose parent category.');
			} else {
				$.ajax({
					url: '{{ url("/admin/category/addChild") }}',
					type: 'post',
					data: {'ctr':ctr, 'prt':prt},
					beforeSend: function() {
						$('#btn-subcategory').val('Updating Category...');
					}
				})
				.done(function(rest) {
					console.log(rest);
					if (rest == 1) {
						$('#txt-subcategory').val('');
						$('#btn-subcategory').val('Add Category');
						window.location = '{{ url("/admin/categories") }}';
					} else {
						$('#btn-subcategory').val('Try Again');
					}
				})
				.fail(function() {
					$('#btn-subcategory').val('Try Again');
				});
			}
		});
	});
</script>
	<div class="main-admin">
		<div class="block">
			<h3>Add Category</h3>
			<div class="content">

				<div class="compose">
					<form method="post" action="javascript:void(0)" id="add-subcategory">
						<div class="content">
							<div class="panel">
								<label class="ttl">Title Category *</label>
							</div>
							<div class="place">
								<input type="text" name="title" class="txt txt-main-color title" placeholder="" required="true" id="txt-subcategory">
							</div>
						</div>
						<div class="content">
							<div class="place">
								<div class="facility">
									<div class="select">
										<select name="place" required="true" id="parent-category">
											<option value="0">Parent category</option>
											@foreach ($category as $ctr)
												<option value="{{ $ctr->id }}">{{ $ctr->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="content border-bottom">
							<div class="place padding-bottom">
								<input type="submit" name="submit" class="btn btn-main-color" value="Add Category" id="btn-subcategory">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="block">
			<h3>List Categories</h3>
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
					@foreach ($category as $ctr)
						<div class="ctn-ctr value">
							<div class="ctn-1">
								<a href="{{ url('/') }}">
									{{ $ctr->id }}
								</a>
							</div>
							<div class="ctn-2">
								@if ($ctr->parent_category == 0)
									<span>Category</span>
								@else
									<span>Subcategory</span>
								@endif
							</div>
							<div class="ctn-3">
								{{ $ctr->name }}
							</div>
							<div class="ctn-4">
								<input type="button" name="detail" class="btn btn-main-color-2" id="btn-ctr-{{ $ctr->id }}" value="Delete" onclick="ctr_delete({{ $ctr->id }})">
							</div>
						</div>
					@endforeach

				</div>
			</div>
		</div>
	</div>
@endsection