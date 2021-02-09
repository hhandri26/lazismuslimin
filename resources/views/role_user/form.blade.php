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
                                <label for="name" class="col-sm-3 control-label1">Role Name</label>
                                <div class="col-sm-9">
                                    <input  type="text" id="name_role" name="name_role" class="form-control" value="@if($id>0){{ $get['name_role']}} @endif"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label1">Description</label>
                                <div class="col-sm-9">
                                    <input  type="text" id="desc" name="desc" class="form-control" value="@if($id>0){{ $get['desc']}} @endif"/>
                                </div>
                            </div>
                            <div class="form-group">
                               
                                <div class="col-sm-12">
                                @foreach(App\Models\MenuOnlyModels::select('*')->orderby('sort','ASC')->get() as $row)
                                @if($id>0)
                                <?php 
                                    $ada_menu 	=   DB::table('t_privileges')
                                                    ->where('role_id',$get['id'])
                                                    ->where('menu_id',$row->id)
                                                    ->pluck('menu_id')
                                                    ->first();?>
                                    	
                                @endif
                                    <table class="table-borderless table">
                                        <tbody>
                                            <tr>
                                                <td colspan="4"> 
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="menu_id[]" value="{{$row->id}}" class="rcheck" @if($id>0 && $row->id==$ada_menu) {{ "checked" }} @endif><span>{{$row->menu_name}}</span>
                                                    </label>
                                                </td>
                                            </tr>
                                            <!-- loop sub menu -->
                                            @foreach(App\Models\SubMenuModels::select('a.*')->where('a.id_menu',$row->id)->get() as $row2)
                                            @if($id>0)
                                                <?php 
                                                    $ada_sub_menu 	= DB::table('t_privileges_sub')
                                                                    ->select('*')
                                                                    ->where('role_id',$get['id'])                                                                    
                                                                    ->get();
                                                    if($ada_sub_menu!==''){
                                                        foreach($ada_sub_menu as $dd){
                                                            $dat['sub_menu_id'] = $dd->sub_menu_id;
                                                            $dat['add']         = $dd->add;
                                                            $dat['edit']        = $dd->edit;
                                                            $dat['deleted']     = $dd->deleted;
                                                           
                                                        }
                                                        $kl =  $dat;

                                                    }
                                                   
                                                ?>
                                                    
                                            @endif
                                            
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <input type="hidden" name="menu_id_2[]" value="{{$row->id}}">
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="id_sub_menu[]" value="{{$row2->id}}" class="rcheck"  @if($id >0 && $row2->id == $dat['sub_menu_id']) {{ "checked" }} @endif > <span>{{$row2->sub_menu_name}}</span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div v-if="rowaccess.label!=='empty'">
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="add[]" value="1"  class="rcheck" @if($id>0 && $row2->id==$dat['sub_menu_id'] && $dat['add'] == 1 ) {{ "checked" }} @endif><span> Add</span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div v-if="rowaccess.label!=='empty'">
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="edit[]" value="1" class="rcheck" @if($id>0 && $row2->id==$dat['sub_menu_id'] && $dat['edit'] == 1 ) {{ "checked" }} @endif><span> Edit</span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div v-if="rowaccess.label!=='empty'">
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="deleted[]" value="1" 
                                                            class="rcheck" @if($id>0 && $row2->id==$dat['sub_menu_id'] && $dat['deleted'] == 1 ) {{ "checked" }} @endif><span> Delete</span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endforeach
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
    var url_save    = "{{route('role_add')}}?id=";
    var data        = $('#formData').serialize();
    var url         = url_save+id;
    if(AlertRequire("name_role","Role Name") ){
        AlertCheckAxios('Apakah anda Yakin Menyimpan Data Ini?',url,data);
    }
    
}
function back()
{
    var url_back= "{{route('role_table')}}";
    location.href=url_back;
}
</script>

@endsection