 @extends('login/v_login')
 @section('content')
 <form class="form-horizontal" action="{{ route('login') }}" method="post">
    {{ csrf_field() }}

    <div class="form-group m-b-20 {{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="col-xs-12">
            <label for="emailaddress">E-Mail Address</label>
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
            <a href="{{ url('forgot') }}" class="text-muted pull-right font-14">Forgot your password?</a>
            <label for="password">Password</label>
            <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password">
             @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group m-b-30">
        <div class="col-xs-12">            
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
        </div>
    </div>

    <div class="form-group account-btn text-center m-t-10">
        <div class="col-xs-12">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
        </div>
    </div>

   <!--   <div class="form-group account-btn text-center m-t-10">
        <div class="col-xs-12">
            <a href="{{ route('register') }}" class="btn btn-lg btn-primary btn-block">Register</a>
        </div>
    </div> -->

</form>

<div class="clearfix"></div>
@endsection