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
            <div class="col-md-10"><h4 class="box-title">Add @if($id>0) Edit @endif</h4></div>
            <input type="hidden" id="url_back" value="{{ route('binefit') }}">
            <input type="hidden" id="id" value="{{ $id }}">
            <input type="hidden" id="url_upload" value="{{route('upload_file') }}?folder=">
            <input type="hidden" id="url_save" value="{{route('binefit_add') }}?id=">
        </div>
    </div>
    <div class="box-body">
        <form id="form1" method="post" action="#" enctype="multipart/form-data" class="form-horizontal">
            <div class="panel panel-info">
               <div class="form-group" >
                   <label for="img" class="col-sm-3 control-label1">Image</label>
                        <div class="col-sm-9">
                           <img class="img-thumbnail upload_file" width="200" height="200" id="profile-pre" name="upload_file" src="@if($id>0){{asset('public/images/binefit/'.$get['img'])}}@else{{asset('public/img/df.jpg')}}@endif" alt="your image" />
                           <input type="file" name="upload_file" id="profile-id" >
                    </div>                        
                </div>
            </div>
        </form>
        <form class="form-horizontal" id="formData">
            <div class="box-body1">
                <div class="panel panel-info">
                    <div class="panel-heading1"></div>     
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="desc" class="col-sm-6 control-label1">Title</label>
                                <div class="col-sm-6">
                                    <input type="text" id="title" class="form-control" name="title" value="@if($id>0){{ $get['title'] }} @endif">
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label for="desc" class="col-sm-6 control-label1">IDN</label>
                                <div class="col-sm-6">
                                <textarea name="desc" id="desc" class="form-control" cols="30" rows="10">@if($id>0){{ $get['desc'] }} @endif</textarea>
                               </div>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="col-sm-6 control-label1">Eng</label>
                                <div class="col-sm-6">
                                    <textarea name="desc_eng" class="form-control" id="desc_eng" cols="30" rows="10">@if($id>0){{ $get['desc_eng'] }} @endif</textarea>
                                   
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
    var id          =$('#id').val();
    var a           = {};
    a.title         = $('#title').val();
 
    a.desc         = $('#desc').val();
    a.desc_eng         = $('#desc_eng').val();
   

    var url_save    = $('#url_save').val();
    var url_upd     = $('#url_upload').val();
      // config Uoload
    var folder      = 'binefit';//folder untuk input gambar
    var table       = 't_benefit';//table database
    var field_name  = 'img';//nama field database yang akan di input
    var obj_id      = 'profile-id';//nama id file input gambar/file
    var refresh     = 'binefit';// url untuk reload page setelah input data
    var url_upload  = url_upd+folder+'&table='+table+'&field_name='+field_name+'&refresh='+refresh;//url upload file
    var url         = url_save+id+"&data="+'['+JSON.stringify(a)+']';
    if(AlertRequire("title",'Title') )
    {
        AlertUpload('Apakah anda Yakin Menyimpan Data Ini?',url,url_upload,obj_id);
    }
   
}

function back()
{
    var url_back = $('#url_back').val();
    location.href=url_back;
}
</script>
@endsection