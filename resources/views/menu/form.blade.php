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
            <div class="col-md-10"><h4 class="box-title">Form Tambah Group Menu @if($id>0) Edit Group Menu @endif</h4></div>
        </div>
    </div>
    <input type="hidden" id="id" value="{{$id}}">
    <input type="hidden" id="url_save" value="{{route('menu_add') }}?id=">
    <input type="hidden" id="url_back" value="{{ route('menu_table') }}">
    <div class="box-body">
        <form class="form-horizontal">
            <div class="box-body1">
                <div class="panel panel-info">
                    <div class="panel-heading1"></div>     
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="menu" class="col-sm-6 control-label1">Nama Menu</label>
                                <div class="col-sm-6">
                                    <input  type="text" id="menu"  class="form-control" value="@if($id>0){{ $menu}} @endif"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="icon" class="col-sm-6 control-label1">Icon</label>
                                <div class="col-sm-6">
                                    <select id="icon" class="form-control select2" style="width: 200px">
                                        @if($id>0)
                                            <option value="{{ $icon_e}}">{{ $icon_e}}</option>
                                        @endif
                                        <option value="">- Pilih Icon -</option>
                                        @foreach($icon as $row)
                                            <option value="{{$row->value}}">{{$row->value}}</option>
                                        @endforeach
                                    </select>                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="area_id" class="col-sm-6 control-label1">Nomor Urut</label>
                                <div class="col-sm-6">
                                    <input  type="text" value="@if($id>0){{ $sort}} @endif" id="no_urut" class="form-control"/>
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
<script src="{{asset('public/js/page/group_menu/form.js')}}"></script>
@endsection