@extends('layouts.admin_tmp')

@section('content')
<div class="row">
    <div class="pull-right">
        <a href="{{ route('menu_form')}}" class="btn btn-sm btn-success">
            <span class="fa fa-plus"></span> Tambah Group Menu
        </a>
    </div>
     <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_title">
              <h2>Table<small>Group Menu</small></h2>
              <input type="hidden" id="delete" value="{{route('delete') }}?id=">
              <input type="hidden" id="edit" value="{{route('menu_edit')}}?id=">
            <div class="clearfix"></div>
        </div>                    
        <div class="table-responsive m-b-20">
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
           
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Icon</th>
                    <th style="width: 50px;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    
                    <?php $no=1;?>
                    @foreach ($groupmenu as $row)
                   <tr>
                       <td>{{$no}}</td>
                       <td>{{$row->menu_name}}</td>
                       <td><i class="{{$row->icon}}"></i></td>                       
                       <td style="text-align:right;">
                            <a href="javascript:edit({{$row->id}})" class="btn btn-info btn-sm" style="float: left;">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="javascript:deleted({{$row->id}})" class="btn btn-info btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                   </tr>
                   <?php $no++;?>

                   @endforeach

                </tbody>
            </table>

        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function edit(sid){
    location.href="{{route('menu_edit')}}?id="+sid;
  }
</script>
<script type="text/javascript">
    function deleted(sid){       
      var url   = "{{route('delete') }}?id="+sid+"&table=t_menu&refresh=menu_table";
      AlertCheck('Apakah anda Yakin Menghapus Data Ini?',url);
  }
</script>



@endsection

@section('more_js')
<script src="{{asset('public/js/page/group_menu/table.js')}}"></script>
@endsection