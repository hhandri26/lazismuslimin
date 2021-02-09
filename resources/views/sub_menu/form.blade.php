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
            <div class="col-md-10"><h4 class="box-title">Form Tambah Sub Menu @if($id>0) Edit Sub Menu @endif</h4></div>
        </div>
    </div>
    <div class="box-body">
        <form class="form-horizontal">
            <div class="box-body1">
                <div class="panel panel-info">
                    <div class="panel-heading1"></div>     
                        <div class="panel-body">
                        <input type="hidden" id="id" value="{{$id}}">
                        <input type="hidden" id="url_save" value="{{route('sub_menu_add') }}?id=">
                        <input type="hidden" id="url_back" value="{{ route('sub_menu_table') }}">
                            <div class="form-group">
                                <label for="id_menu" class="col-sm-6 control-label1">Group Menu</label>
                                <div class="col-sm-6">
                                    <select id="id_menu" class="form-control select2" style="width: 200px">
                                        @if($id>0)
                                            <option value="{{ $get['id_menu']}}">{{ $get['menu']}}</option>
                                        @endif
                                        <option value="">- Pilih Group Menu -</option>
                                        @foreach($groupmenu as $row)
                                            <option value="{{$row->id}}">{{$row->menu_name}}</option>
                                        @endforeach
                                    </select>                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sub_menu_name" class="col-sm-6 control-label1">Nama Sub Menu</label>
                                <div class="col-sm-6">
                                    <input  type="text" id="sub_menu_name"  class="form-control" value="@if($id>0){{ $get['submenu']}} @endif"/>
                                </div>
                            </div>
                            
                            

                            <div class="form-group">
                                <label for="url" class="col-sm-6 control-label1">Url Routing</label>
                                <div class="col-sm-6">
                                    <input type="text" id="url" value="@if($id>0){{ $get['url']}} @endif" id="no_urut" class="form-control"/>
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
<script src="{{asset('public/js/page/menu/form.js')}}"></script>
@endsection