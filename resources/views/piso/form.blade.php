@extends('layouts.admin_tmp')
@section('content')
<?php 
$id     =request()->id;
$dat    =[]; 
?>
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
            <div class="col-md-10"><h4 class="box-title">Form Add  @if($id>0) Edit {{$id}} @endif</h4></div>
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
                                <label for="name" class="col-sm-3 control-label1">Name</label>
                                <div class="col-sm-9">
                                    <input  type="text" id="name" name="name" class="form-control" value="@if($id>0){{ $get['name']}} @endif"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label1">Kategori</label>
                                <div class="col-sm-9">
                                    <select name="catagory" id="catagory" class="form-control select2" name="catagory">
                                        @if($id>0)
                                            <option value="{{$get['catagory']}}">{{$get['catagory']}}</option>
                                        @endif
                                        @foreach($kategori as $row)
                                            <option value="{{$row->catagory}}">{{$row->catagory}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-3 control-label1">Panjang</label>
                                <div class="col-md-9">
                                <input  type="number" id="p" name="p" class="form-control" value="@if($id>0){{ $get['p']}} @endif"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-3 control-label1">Lebar</label>
                                <div class="col-md-9">
                                <input  type="number" id="l" name="l" class="form-control" value="@if($id>0){{ $get['l']}} @endif"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-3 control-label1">Tinggi</label>
                                <div class="col-md-9">
                                <input  type="number" id="t" name="t" class="form-control" value="@if($id>0){{ $get['t']}} @endif"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-3 control-label1">Tinggi</label>
                                <div class="col-md-9">
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control">@if($id>0){{ $get['description']}} @endif</textarea>
                                    
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
<script>
function SaveWarning(){
    var id          = "{{$id}}"
    var url_save    = "{{route('piso_add')}}?id=";
    var data        = $('#formData').serialize();
    var url         = url_save+id;
   
        AlertCheckAxios('Apakah anda Yakin Menyimpan Data Ini?',url,data);
    
    
}
function back()
{
    var url_back= "{{route('list_piso')}}";
    location.href=url_back;
}
</script>

@endsection