@extends('layouts.admin_tmp')

@section('content')
<div class="row">
    <div class="pull-right">
        <a href="{{ route('gallery_form')}}" class="btn btn-sm btn-success">
            <span class="fa fa-plus"></span> Add
        </a>
        
        <input type="hidden" id="delete" value="{{route('delete') }}?id=">
        <input type="hidden" id="edit" value="{{route('gallery_form')}}?id=">
    </div>
     <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_title">
              <h2>Table<small></small></h2>
            <div class="clearfix"></div>
        </div>                      
        <div class="table-responsive m-b-20">
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
           <!--  <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"> -->
                <thead>
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Image</th>
                    <th>Title</th>
                    
                    <th style="width: 50px;">Option</th>
                </tr>
                </thead>
                <tbody>
                    
                    <?php $no=1;?>
                    @foreach ($table as $row)
                   <tr>
                       <td>{{$no}}</td>
                       <td><img src="{{asset('/public/images/gallery/'.$row->img)}}" class="img-responsive" alt="" style="width: 200px" ></td>
                       <td>{{$row->title}}</td>  
                   
                                    
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


@endsection
@section('more_js')
<script>
function edit(sid){
    var url_edit = $('#edit').val() ;
    location.href=url_edit+sid;
  }
  function deleted(sid){    
    var url_delete =$('#delete').val() ;   
    var url   = url_delete+sid+"&table=t_gallery&refresh=gallery";
    AlertCheck('Apakah anda Yakin Menghapus Data Ini?',url);
}
</script>
@endsection