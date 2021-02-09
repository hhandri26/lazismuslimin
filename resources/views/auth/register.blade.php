 @extends('login/v_login')
 @section('content')

 <form class="form-horizontal" action="{{ route('register') }}" method="post">
    {{ csrf_field() }}

    <div class="form-group m-b-20 {{ $errors->has('name') ? ' has-error' : '' }}">
        <div class="col-xs-12">
            <label for="name">Name</label>
            <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="john">
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
           
        </div>
    </div>

    <div class="form-group m-b-20 {{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="col-xs-12">
            <label for="emailaddress">email</label>
            <input class="form-control" type="text" id="email" name="email" value="{{ old('email') }}" placeholder="john@deo.com">
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

   
    <input type="hidden" name="level" value="2">

     <div class="form-group m-b-20">
        <div class="col-xs-12">
            <label for="emailaddress">Confirm Password</label>
            <input class="form-control" type="password" id="password" name="password_confirmation">           
        </div>
    </div>


    <div class="form-group account-btn text-center m-t-10">
        <div class="col-xs-12">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        </div>
    </div>


</form>

<div class="clearfix"></div>
 @endsection