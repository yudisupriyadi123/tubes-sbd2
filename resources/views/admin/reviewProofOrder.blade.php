@extends('admin.index')
@section('title',$title)
@section('content')

<div class="main-admin">
    <div class="block">
        <div class="content">
            <div class="compose">
                <div id="proof-photo-wrapper">
                    <img id="proof-photo" src="{{ asset($trans->proof_photo) }}" />
                </div>

                <div class="text-center">
                    <a href="{{ url('admin/order/proof/'.$trans->id.'/verified') }}" class="btn btn-main-color">Payment is correct</a>
                    <a href="{{ url('admin/order/proof/'.$trans->id.'/rejected') }}" class="btn btn-main-color">Rejected</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
