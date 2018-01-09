@extends('layout.index')
@section('title',$title)
@section('content')
<div class="frame-sign">
    <div class="main-sign">
        <div class="top">
            <div class="panel-logo">
                <a href="{{ url('/') }}">
                    <img src="{{ url('/') }}/icons/ao2.png" alt="logo">
                </a>
            </div>
            <h2>Create Account Here</h2>
        </div>
        <div class="mid">
            <div class="border-bottom"></div>
            <form class="form-horizontal" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}

                <div class="block">
                    <div class="icn">Full Name</div>
                    <input type="text" name="name" class="txt" placeholder="" required="true">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="block">
                    <div class="icn">Your Email</div>
                    <input type="email" name="email" class="txt" placeholder="" required="true">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="block">
                    <div class="icn">Your Home Address</div>
                    <input type="text" name="address" class="txt" placeholder="" required="true">
                    @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="block">
                    <div class="icn">Create Password</div>
                    <input type="password" name="password" class="txt" placeholder="" required="true">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="block">
                    <div class="icn">Password Confirmation</div>
                    <input type="password" name="password_confirmation" class="txt" placeholder="" required="true">
                </div>
                <div class="block">
                    <div class="icn">Address</div>
                    <textarea class="txt textarea" id="address-user"></textarea>
                </div>
                <div class="block">
                    <input type="submit" name="login" value="Signup" class="btn btn-active-2 btn-main-color" id="btn-signup-user">
                </div>
            </form>
            <div class="border-bottom">
                <label class="fa fa-lg fa-circle"></label>
                <label class="fa fa-lg fa-circle"></label>
                <label class="fa fa-lg fa-circle"></label>
            </div>
            <div class="block">
                <a href="{{ url('signin') }}">
                    <input type="button" name="signup" value="Login" class="btn btn-active-2 btn-main-color-2">
                </a>
            </div>
        </div>
        <div class="bot"></div>
    </div>
</div>
@endsection
