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
<div class="row">
  
    <div class="col-md-12" >
        <div class="box box-info"  style="margin-top:0px !important" >
            
            <div class="box-body">
                <form class="form-horizontal" id="formData">
                {{csrf_field()}}
                    <div class="box-body1">
                        <div class="panel panel-info">
                            <div class="panel-heading1"></div>     
                                <div class="panel-body">
                                  

                                    <div class="form-group">
                                        <label for="name" class="col-sm-6 control-label1">Status</label>
                                        <div class="col-sm-6">
                                            <select name="status" id="status" class="form-control">
                                                <option value="{{ $get['status']}}">{{ $get['status']}}</option>
                                                <option value="success">success</option>
                                            </select>
                                            <input  type="hidden" id="id" name="id" class="form-control" value="@if($id>0){{ $get['id']}} @endif"/>
                                           
                                        </div>
                                    </div>
                                
                                
                                    
                                    
                                
                                    
                                </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection
@section('more_js')
<script>
function SaveWarning(){
    var id          = "{{$id}}"
    var url_save    = "{{route('update_nomor_resi')}}?id=";
    var data        = $('#formData').serialize();
    var url         = url_save+id;
   
        AlertCheckAxios('Apakah anda Yakin Menyimpan Data Ini?',url,data);
    
    
}
function back()
{
    var url_back= "{{route('new_order')}}";
    location.href=url_back;
}
</script>

@endsection