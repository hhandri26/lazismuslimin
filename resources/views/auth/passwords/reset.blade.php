@extends('login/v_login')

@section('content')


<form class="form-horizontal" action="{{ route('password.request') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group m-b-20 {{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="col-xs-12">
            <label for="emailaddress">E-Mail Address</label>
            <input class="form-control" type="email" id="email" name="email" value="{{ $email or old('email') }}" placeholder="john@deo.com">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
           
        </div>
    </div>

    <div class="form-group m-b-20 {{ $errors->has('password') ? ' has-error' : '' }}">
        <div class="col-xs-12">
            <label for="emailaddress">password</label>
            <input class="form-control" type="password" id="password" name="password" value="{{ old('password') }}">
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
           
        </div>
    </div>

     <div class="form-group m-b-20 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <div class="col-xs-12">
            <label for="emailaddress">password</label>
            <input class="form-control" type="password" id="password-confirm" name="password_confirmation">
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
           
        </div>
    </div>


   

    <div class="form-group account-btn text-center m-t-10">
        <div class="col-xs-12">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
        </div>
    </div>

</form>

<div class="clearfix"></div>
@endsection
