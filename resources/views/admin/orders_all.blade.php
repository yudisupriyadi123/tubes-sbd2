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
                @if ($orders->count() == 0)
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
                @foreach ($orders as $order)
                <div class="ctn value">
                    <div class="ctn-1">
                        <!-- TODO: ubah url -->
                        <a href="{{ url('/') }}" class="ellipsis-text-overflow">
                            {{ md5($order->id) }}
                        </a>
                    </div>
                    <div class="ctn-2">
                        <span>{{ $order->customer->name }}</span>
                    </div>
                    <div class="ctn-3">
                        {{ $order->csa->getInlineFullAddress() }}
                    </div>
                    <div class="ctn-4">
                        {{ $order->created_at }}
                    </div>
                    <div class="ctn-5">
                        {{ $order->getTotalPrice() }}
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