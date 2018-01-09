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
            <h2>Customer Login</h2>
        </div>
        <div class="mid">
            <div class="border-bottom"></div>

            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="block">
                    <div class="icn">Email</div>
                    <input type="email" name="email" class="txt" placeholder="" required="true">
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="block">
                    <div class="icn">Password</div>
                    <input type="password" name="password" class="txt" placeholder="" required="true">
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="block">
                    <input type="submit" name="login" value="Login" id="btn-login-user" class="btn btn-active-2 btn-main-color">
                </div>
            </form>
            <div class="border-bottom">
                <label class="fa fa-lg fa-circle"></label>
                <label class="fa fa-lg fa-circle"></label>
                <label class="fa fa-lg fa-circle"></label>
            </div>
            <div class="block">
                <a href="{{ url('signup') }}">
                    <input type="button" name="signup" value="Signup" class="btn btn-active-2 btn-main-color-2">
                </a>
            </div>
        </div>
        <div class="bot"></div>
    </div>
</div>
@endsection
