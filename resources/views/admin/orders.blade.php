@extends('admin.index')
@section('title',$title)
@section('content')

@if (session('status'))
	@if (session('status') == 'OK')
    <div class="alert alert-success with-margin-bottom">
        {{ session('message') }}
    </div>
    @endif
    @if (session('status') == 'BAD')
    <div class="alert alert-danger with-margin-bottom">
        {{ session('message') }}
    </div>
    @endif
@endif

<div class="main-admin">
	<div class="block">
		<h3>New Orders</h3>
		<div class="content">
			<div class="frame-order">
				<div class="ctn head">
					<div class="ctn-1">
						Order ID
					</div>
					<div class="ctn-2">
						Customer
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
				@if ($need_approved_orders->count() == 0)
					<!-- TODO: make html more efficient -->
					<div class="ctn value">
						<div class="ctn-1"></div>
						<div class="ctn-2"></div>
						<div class="ctn-3">No order found</div>
						<div class="ctn-4"></div>
						<div class="ctn-5"></div>
						<div class="ctn-6"></div>
					</div>
				@endif
				@foreach ($need_approved_orders as $na_order)
				<div class="ctn value">
					<div class="ctn-1">
						<!-- TODO: ubah url -->
						<a href="{{ url('/') }}" class="ellipsis-text-overflow">
							{{ md5($na_order->id) }}
						</a>
					</div>
					<div class="ctn-2">
						<span>{{ $na_order->customer->name }}</span>
					</div>
					<div class="ctn-3">
						{{ $na_order->csa->getInlineFullAddress() }}
					</div>
					<div class="ctn-4">
						{{ $na_order->created_at }}
					</div>
					<div class="ctn-5">
						{{ $na_order->getTotalPrice() }}
					</div>
					<div class="ctn-6">
						<a class="btn-circle btn-main-color-2" href="#">
							<i class="fa fa-lg fa-ellipsis-h"></i>
						</a>
						<a class="btn-circle btn-main-color-2" href="{{ url('/admin/orders/change-status/'.$na_order->id.'/to/waiting_payment') }}">
							<i class="fa fa-lg fa-check"></i>
						</a>
						<a class="btn-circle btn-main-color-2" href="#">
							<i class="fa fa-lg fa-eye"></i>
						</a>
					</div>
				</div>
				@endforeach
				<div class="ctn value">
					<div class="ctn-1"></div>
					<div class="ctn-2"></div>
					<div class="ctn-3"></div>
					<div class="ctn-4"></div>
					<div class="ctn-5"></div>
					<div class="ctn-6">
						<a href="{{ url('/admin/orders/status/need-approved') }}">
							<input type="button" name="view_more" class="btn btn-main-color" value="View All">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="block">
		<h3>Waiting Payment Orders</h3>
		<div class="content">
			<div class="frame-order">
				<div class="ctn head">
					<div class="ctn-1">
						Order ID
					</div>
					<div class="ctn-2">
						Customer
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
				@if ($waiting_payment_orders->count() == 0)
					<!-- TODO: make html more efficient -->
					<div class="ctn value">
						<div class="ctn-1"></div>
						<div class="ctn-2"></div>
						<div class="ctn-3">No order found</div>
						<div class="ctn-4"></div>
						<div class="ctn-5"></div>
						<div class="ctn-6"></div>
					</div>
				@endif
				@foreach ($waiting_payment_orders as $na_order)
				<div class="ctn value">
					<div class="ctn-1">
						<!-- TODO: ubah url -->
						<a href="{{ url('/') }}" class="ellipsis-text-overflow">
							{{ md5($na_order->id) }}
						</a>
					</div>
					<div class="ctn-2">
						<span>{{ $na_order->customer->name }}</span>
					</div>
					<div class="ctn-3">
						{{ $na_order->csa->getInlineFullAddress() }}
					</div>
					<div class="ctn-4">
						{{ $na_order->created_at }}
					</div>
					<div class="ctn-5">
						{{ $na_order->getTotalPrice() }}
					</div>
					<div class="ctn-6">
						<a class="btn-circle btn-main-color-2" href="#">
							<i class="fa fa-lg fa-ellipsis-h"></i>
						</a>
						<a class="btn-circle btn-main-color-2" href="{{ url('/admin/orders/change-status/'.$na_order->id.'/to/payment_verified') }}">
							<i class="fa fa-lg fa-check"></i>
						</button>
						<a class="btn-circle btn-main-color-2" href="#">
							<i class="fa fa-lg fa-eye"></i>
						</a>
					</div>
				</div>
				@endforeach
				<div class="ctn value">
					<div class="ctn-1"></div>
					<div class="ctn-2"></div>
					<div class="ctn-3"></div>
					<div class="ctn-4"></div>
					<div class="ctn-5"></div>
					<div class="ctn-6">
						<a href="{{ url('/admin/orders/status/waiting-payment') }}">
							<input type="button" name="view_more" class="btn btn-main-color" value="View All">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="block">
		<h3>Payment Verified Orders</h3>
		<div class="content">
			<div class="frame-order">
				<div class="ctn head">
					<div class="ctn-1">
						Order ID
					</div>
					<div class="ctn-2">
						Customer
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
				@if ($payment_verified_orders->count() == 0)
					<!-- TODO: make html more efficient -->
					<div class="ctn value">
						<div class="ctn-1"></div>
						<div class="ctn-2"></div>
						<div class="ctn-3">No order found</div>
						<div class="ctn-4"></div>
						<div class="ctn-5"></div>
						<div class="ctn-6"></div>
					</div>
				@endif
				@foreach ($payment_verified_orders as $na_order)
				<div class="ctn value">
					<div class="ctn-1">
						<!-- TODO: ubah url -->
						<a href="{{ url('/') }}" class="ellipsis-text-overflow">
							{{ md5($na_order->id) }}
						</a>
					</div>
					<div class="ctn-2">
						<span>{{ $na_order->customer->name }}</span>
					</div>
					<div class="ctn-3">
						{{ $na_order->csa->getInlineFullAddress() }}
					</div>
					<div class="ctn-4">
						{{ $na_order->created_at }}
					</div>
					<div class="ctn-5">
						{{ $na_order->getTotalPrice() }}
					</div>
					<div class="ctn-6">
						<a class="btn-circle btn-main-color-2" href="#">
							<i class="fa fa-lg fa-ellipsis-h"></i>
						</a>
						<a class="btn-circle btn-main-color-2" href="{{ url('/admin/orders/change-status/'.$na_order->id.'/to/product_has_sent') }}">
							<i class="fa fa-lg fa-check"></i>
						</button>
						<a class="btn-circle btn-main-color-2" href="#">
							<i class="fa fa-lg fa-eye"></i>
						</a>
					</div>
				</div>
				@endforeach
				<div class="ctn value">
					<div class="ctn-1"></div>
					<div class="ctn-2"></div>
					<div class="ctn-3"></div>
					<div class="ctn-4"></div>
					<div class="ctn-5"></div>
					<div class="ctn-6">
						<a href="{{ url('/admin/orders/status/payment-verified') }}">
							<input type="button" name="view_more" class="btn btn-main-color" value="View All">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
						</button>
					</div>
				</div>
				@endforeach
				<div class="ctn value">
					<div class="ctn-1"></div>
					<div class="ctn-2"></div>
					<div class="ctn-3"></div>
					<div class="ctn-4"></div>
					<div class="ctn-5"></div>
					<div class="ctn-6">
						<a href="{{ url('/admin/orders/status/payment-verified') }}">
							<input type="button" name="view_more" class="btn btn-main-color" value="View All">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="block">
		<h3>Recent Success Orders</h3>
		<div class="content">
			<div class="frame-order">
				<div class="ctn head">
					<div class="ctn-1">
						Order ID
					</div>
					<div class="ctn-2">
						Customer
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
				@if ($recent_success_orders->count() == 0)
					<!-- TODO: make html more efficient -->
					<div class="ctn value">
						<div class="ctn-1"></div>
						<div class="ctn-2"></div>
						<div class="ctn-3">No order found</div>
						<div class="ctn-4"></div>
						<div class="ctn-5"></div>
						<div class="ctn-6"></div>
					</div>
				@endif
				@foreach ($recent_success_orders as $na_order)
				<div class="ctn value">
					<div class="ctn-1">
						<!-- TODO: ubah url -->
						<a href="{{ url('/') }}" class="ellipsis-text-overflow">
							{{ md5($na_order->id) }}
						</a>
					</div>
					<div class="ctn-2">
						<span>{{ $na_order->customer->name }}</span>
					</div>
					<div class="ctn-3">
						{{ $na_order->csa->getInlineFullAddress() }}
					</div>
					<div class="ctn-4">
						{{ $na_order->created_at }}
					</div>
					<div class="ctn-5">
						{{ $na_order->getTotalPrice() }}
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
				@endforeach
				<div class="ctn value">
					<div class="ctn-1"></div>
					<div class="ctn-2"></div>
					<div class="ctn-3"></div>
					<div class="ctn-4"></div>
					<div class="ctn-5"></div>
					<div class="ctn-6">
						<a href="{{ url('/admin/orders/status/recent-success') }}">
							<input type="button" name="view_more" class="btn btn-main-color" value="View All">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="block">
		<h3>All orders</h3>
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
				@if ($all_orders->count() == 0)
					<!-- TODO: make html more efficient -->
					<div class="ctn value">
						<div class="ctn-1"></div>
						<div class="ctn-2"></div>
						<div class="ctn-3">No order found</div>
						<div class="ctn-4"></div>
						<div class="ctn-5"></div>
						<div class="ctn-6"></div>
					</div>
				@endif
				@foreach ($all_orders as $order)
				<div class="ctn value">
					<div class="ctn-1">
						<!-- TODO: ubah url -->
						<a href="{{ url('/') }}" class="ellipsis-text-overflow">
							{{ md5($na_order->id) }}
						</a>
					</div>
					<div class="ctn-2">
						<span>{{ $na_order->customer->name }}</span>
					</div>
					<div class="ctn-3">
						{{ $na_order->csa->getInlineFullAddress() }}
					</div>
					<div class="ctn-4">
						{{ $na_order->created_at }}
					</div>
					<div class="ctn-5">
						{{ $na_order->getTotalPrice() }}
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
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection