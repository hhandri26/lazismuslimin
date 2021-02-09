@extends('layouts.admin_tmp')

@section('content')
<div class="row">

   <div class="container white-container">

    <!-- Head title -->
    <div class="row">
        <div class="col-md-6">
            <h3 class="head-title"><span class="glyphicon glyphicon-play"></span> Tambah Users</h3>
        </div>

        <div class="col-md-6">
            <a href="{{url('level_users')}}" class="pull-right"><i class="glyphicon glyphicon-arrow-left"></i> Kembali </a>
        </div>
    </div>

    <hr class="hr-head-title">    
    <form action="{{ route('level_users.store') }}" method="post" class="form-horizontal">
        {{ csrf_field() }}

    <div class="form-group {{ $errors->has('level') ? ' has-error' : '' }}">
        <label for="nama" class="col-md-4 control-label required">Level</label>
        <div class="col-md-4">
            <input type="number" name="level" value="{{ old('level') }}" class="form-control" id="level" autofocus="autofocus"/>
            @if ($errors->has('level'))
                <span class="help-block">
                    <strong>{{ $errors->first('level') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
        <label for="description" class="col-md-4 control-label required">description</label>
        <div class="col-md-4">
            <input type="text" name="description" value="{{ old('description') }}" class="form-control" id="description" autofocus="autofocus"/>
            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>

   

  

  

    
    <!-- Submit button -->
    <div class="row">
        <div class="col-md-12">
            <div class="save-cancel well text-right">
                <input type="submit" value="Submit" class="btn btn-success submit-btn btn-md"/>
                &nbsp;
                <a href="{{url('level_users')}}" class="btn">Batal</a>
            </div>              
        </div>
    </div>

    </form>

</div>
</div>

@endsection