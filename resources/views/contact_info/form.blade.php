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
            <div class="col-md-10"><h4 class="box-title">Form Tambah @if($id>0) Edit @endif</h4></div>
            <input type="hidden" id="url_back" value="{{route('contact_info')}}">
            <input type="hidden" id="id" value="{{ $id }}">
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
                                <label for="desc" class="col-sm-3 control-label1 require">* Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  id="title" name="title" value="@if($id>0){{ $get['title'] }} @endif">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="col-sm-3 control-label1 require">* Title Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  id="title_desc" name="title_desc" value="@if($id>0){{ $get['title_desc'] }} @endif">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="col-sm-3 control-label1 require">* Description </label>
                                <div class="col-sm-9">
                                    <textarea name="desc" id="desc" cols="30" rows="10" class="form-control">@if($id>0){{ $get['desc'] }} @endif</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="col-sm-3 control-label1 require">* Title Desc Eng</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  id="title_desc_eng" name="title_desc_eng" value="@if($id>0){{ $get['title_desc_eng'] }} @endif">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="col-sm-3 control-label1 require">* Description Eng</label>
                               
                                <div class="col-sm-9">
                                    <textarea name="desc_eng" id="desc_eng" cols="30" rows="10" class="form-control">@if($id>0){{ $get['desc_eng'] }} @endif</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="col-sm-3 control-label1 require">* link</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  id="link" name="link" value="@if($id>0){{ $get['link'] }} @endif">
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
    var id          = $('#id').val();
    var url_save    = "{{route('contact_add')}}?id=";
    var data        = $('#formData').serialize();
    var url         = url_save+id;
    if(AlertRequire("title","Title") && AlertRequire("title_desc"," Title Description")  && AlertRequire("desc",'Description') && AlertRequire("title_desc_eng","Title Desc Eng") && AlertRequire("desc_eng"," Description Eng")  && AlertRequire("link",'link')){
        AlertCheckAxios('Apakah anda Yakin Menyimpan Data Ini?',url,data);
    }
    
}
function back()
{
    var url_back=  $('#url_back').val();
    location.href=url_back;
}
</script>

@endsection
