@extends('admin.index')
@section('title',$title)
@section('content')
<div class="main-admin">
  <div class="block">
    <h3>Add Something</h3>
    <div class="content grid-block-2">
      <ul>
          <a href="{{ url('/admin/post') }}">
            <li>
              <label class="fa fa-lg fa-edit"></label>
            </li>
          </a>
          <a href="{{ url('/admin/categories') }}">
            <li>
              <label class="fa fa-lg fa-th"></label>
            </li>
          </a>
      </ul>
    </div>
  </div>
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
          <div class="ctn value ">
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
          <!--ini error
          <div class="ctn-3">
            $na_order->csa->getInlineFullAddress()
          </div>
          -->
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
            <a href="{{ url('/admin/orders') }}">
              <input type="button" name="view_more" class="btn btn-main-color" value="View All">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="block">
    <h3>Customers</h3>
    <div class="content">
      <div class="frame-order">
        <div class="ctn head customer-specific">
          <div class="ctn-1">
            Email
          </div>
          <div class="ctn-2">
            First Name
          </div>
          <div class="ctn-3">
            Last Name
          </div>
          <div class="ctn-4">
            Address
          </div>
          <div class="ctn-5">
            Photo
          </div>
          <div class="ctn-6">
            Actions
          </div>
        </div>
        @foreach ($customers as $customer)
        <div class="ctn value customer-specific">
          <div class="ctn-1 ellipsis-text-overflow">
              {{ $customer->email }}
          </div>
          <div class="ctn-2 ellipsis-text-overflow">
            <span>{{ $customer->getFirstName() }}</span>
          </div>
          <div class="ctn-3 ellipsis-text-overflow">
            <span>{{ $customer->getLastName() }}</span>
          </div>
          <div class="ctn-4">
            {{ $customer->address }}
          </div>
          <div class="ctn-5">
            <div class="image customer-avatar" style="background-image: url('{{ asset($customer->photo) }}');"></div>
          </div>
          <div class="ctn-6">
            <!-- TODO: atur url customer detail -->
            <a href="{{ url('/') }}">
              <input type="button" name="detail" class="btn btn-main-color-2" value="Detail">
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
            <a href="{{ url('/admin/customers') }}">
              <input type="button" name="view_more" class="btn btn-main-color" value="View All">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="block">
    <h3>List Products</h3>
    <div class="content">
      <div class="frame-order">
        <div class="ctn head">
          <div class="ctn-1">
            ID Product
          </div>
          <div class="ctn-2">
            Photo
          </div>
          <div class="ctn-3">
            Title
          </div>
          <div class="ctn-4">
            Price
          </div>
          <div class="ctn-5">
            Stock
          </div>
          <div class="ctn-6">
            Actions
          </div>
        </div>
        @for ($i=1; $i <= 5; $i++)
        <div class="ctn value">
          <div class="ctn-1">
            <a href="{{ url('/') }}">
              12045
            </a>
          </div>
          <div class="ctn-2">
            <div class="image" style="background-image: url('{{ url('/') }}/img/banner1.jpg');"></div>
          </div>
          <div class="ctn-3">
            The title will be place in here.
          </div>
          <div class="ctn-4">
            IDR 150.000,00
          </div>
          <div class="ctn-5">
            350
          </div>
          <div class="ctn-6">
            <button class="btn-circle btn-main-color-2">
              <div class="fa fa-lg fa-pencil"></div>
            </button>
            <button class="btn-circle btn-main-color-2">
              <div class="fa fa-lg fa-trash"></div>
            </button>
            <button class="btn-circle btn-main-color-2">
              <div class="fa fa-lg fa-eye"></div>
            </button>
          </div>
        </div>
        @endfor
        <div class="ctn value">
          <div class="ctn-1"></div>
          <div class="ctn-2"></div>
          <div class="ctn-3"></div>
          <div class="ctn-4"></div>
          <div class="ctn-5"></div>
          <div class="ctn-6">
            <a href="{{ url('/admin/products') }}">
              <input type="button" name="view_more" class="btn btn-main-color" value="View All">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="block">
    <h3>Others</h3>
    <div class="content grid-block-2">
      <ul>
          <a href="{{ url('/admin/setting') }}">
            <li>
              <label class="fa fa-lg fa-gear"></label>
            </li>
          </a>
          <a href="{{ url('/admin/info') }}">
            <li>
              <label class="fa fa-lg fa-info"></label>
            </li>
          </a>
      </ul>
    </div>
  </div>
</div>
@endsection

