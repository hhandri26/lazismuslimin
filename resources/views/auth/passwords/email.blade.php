 @extends('login/v_login')
 @section('content')
 <form class="form-horizontal" action="{{ route('password.email') }}" method="post">
    {{ csrf_field() }}

    <div class="form-group m-b-20 {{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="col-xs-12">
            <label for="emailaddress">Forgot your password?</label>
            <input class="form-control" type="email" id="identity" name="email" value="{{ old('email') }}" placeholder="john@deo.com">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
           
        </div>
    </div>

   

    <div class="form-group account-btn text-center m-t-10">
        <div class="col-xs-12">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Send Password Reset Link</button>
        </div>
    </div>

</form>

<div class="clearfix"></div>
@endsection