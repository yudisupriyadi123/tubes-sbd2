@extends('layout.index')
@section('title',$title)
@section('content')
<script type="text/javascript">
var server = '{{ url("/") }}';

$(document).ready(function() {
    $('#signup-user').submit(function(event) {
        /* Act on the event */
        var name = $('#signup-user #name-user').val();
        var email = $('#signup-user #email-user').val();
        var password = $('#signup-user #password-user').val();
        var address = $('#signup-user #address-user').val();
        $.ajax({
        url: '{{ url("/user/signup") }}',
            type: 'post',
            data: {
            'name' : name,
                'email' : email,
                'password' : password,
                'address' : address,
                },
                beforeSend: function() {
                    $('#btn-signup-user').val('Please Wait...');
                    $('.btn').attr('disabled','disabled');
                }
            })
            .done(function(data) {
                if (data === 'failed') {
                    opFailed('open', 'Email or Password is wrong.');
                    $('#btn-signup-user').val('Try again');
                    $('.btn').removeAttr('disabled');
                } else {
                    window.location = server;
                    $('#btn-signup-user').val('Success');
                }
            })
            .fail(function() {
                opFailed('open', 'Please try again, and check your internet connections.');
                $('#btn-signup-user').val('Try again');
                $('.btn').removeAttr('disabled');
            })
            .always(function() {
                $('#btn-signup-user').val('Login');
                $('.btn').removeAttr('disabled');
            });
        });
    });
</script>
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
