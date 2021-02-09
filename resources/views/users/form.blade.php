@extends('layouts.admin_tmp')
@section('content')
<?php $id=request()->id; ?>
<div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;"  >
    <a href="#" onclick="SaveWarning()"  class="btn-floating btn-large" style="background-color: #4CAF50;color: #fff">
        <i style="font-size: 1.6em" class="fa fa-save fa-lg"></i>
    </a>
     <a href="#" onclick="back()" class="btn-floating btn-large" style="background-color: #FB0C03 ;color: #fff">
        <i style="font-size: 1.6em" class="fa  fa-arrow-circle-o-left "></i>
    </a>
</div>
<div class="box box-info" >
    <div class="box-header with-border">
        <div class="row">
            <div class="col-md-10"><h4 class="box-title">Form Tambah Users @if($id>0) Edit Users @endif</h4></div>
        </div>
    </div>
    <div class="box-body">
        <form class="form-horizontal" id="formData">
        {{csrf_field()}}
            <div class="box-body1">
                <div class="panel panel-info">
                    <div class="panel-heading1"></div>     
                        <div class="panel-body">

                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label1">Nama User</label>
                                <div class="col-sm-9">
                                    <input  type="text" id="name" name="name" class="form-control" value="@if($id>0){{ $get['name']}} @endif"/>
                                </div>
                            </div>           
                            <input type="hidden" id="id" value="{{$id}}">
                            <input type="hidden" id="select_menu_url" value="{{route('select_menu')}}">
                            <input type="hidden" id="url_save" value="{{route('user_add') }}?id=">
                            <input type="hidden" id="url_back" value="{{ route('user_table') }}">
                            <input type="hidden" id="delete_prv" value="{{route('delete_prv') }}?id=">
                            <input type="hidden" id="url_edit" value="{{route('user_edit')}}?id=}}">              

                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label1">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" onblur="this.value=removeSpaces(this.value);" id="email" name="email" value="@if($id>0){{ $get['email']}} @endif" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label1">Password</label>
                                <div class="col-sm-9">
                                    <input type="text" onblur="this.value=removeSpaces2(this.value);" id="password" name="password" class="form-control" value="@if($id>0){{ $get['real_password']}} @endif"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label1">Role</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" name="role" id="role">
                                        @if($id>0)
                                        <option value="{{$get['role']}}">{{$get['name_role']}}</option>
                                        @endif
                                        @foreach($role as $rs)
                                            <option value="{{$rs->id}}"> {{$rs->name_role}} </option>
                                        @endforeach
                                    </select>
                                   
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="col-sm-3 control-label1">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" id="phone"  name="phone" value="@if($id>0){{ $get['phone']}} @endif" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="active" class="col-sm-3 control-label1">Aktif?</label>                                
                                <div class="col-sm-9">
                                    <input type="radio" class="rcheck"  name="active" id="active" value="1" @if($id>0 && $get['active']=='Active') {{ "checked" }} @endif >Active
                                    <input type="radio" class="rcheck"  name="active" id="active" value="2" @if($id>0 && $get['active']=='Not Active') {{ "checked" }} @endif >Tidak Active
                                </div>                                                               
                            </div>

                           

                          

                         

                         
                            <div class="form-group">
                                <label for="select_menu" class="col-sm-3 control-label1">Gender</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" name="gender" id="gender">
                                        @if($id>0)
                                            <option value="{{$get['gender']}}">{{$get['gender']}}</option>
                                        @endif
                                            <option value="">-Select Gender-</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-3 control-label1">Mobile</label>
                                <div class="col-sm-9">
                                    <input type="text" id="mobile"  name="mobile" value="@if($id>0){{ $get['mobile']}} @endif" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-3 control-label1">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" id="address"  name="address" value="@if($id>0){{ $get['address']}} @endif" class="form-control"/>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label for="phone" class="col-sm-3 control-label1">Home Town</label>
                                <div class="col-sm-9">
                                    <input type="text" id="hometown"  name="hometown" value="@if($id>0){{ $get['hometown']}} @endif" class="form-control"/>
                                </div>
                            </div>
                            
                           
                           

                            
                        </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('more_js')
<script src="{{asset('public/plugins/select2-3.5.4/select2.min.js')}}"></script>
<script src="{{asset('public/plugins/select2-3.5.4/select2_locale_id.js')}}"></script>
<script src="{{asset('public/js/page/user/form.js')}}"></script>
@endsection