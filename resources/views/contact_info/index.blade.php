@extends('layouts.admin_tmp')

@section('content')
<div class="row">
    <div class="pull-right">
        
        <input type="hidden" id="delete" value="{{route('delete') }}?id=">
        <input type="hidden" id="edit" value="{{route('contact_form')}}?id=">
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
                    <th>Title</th>
                    <th>Idn</th>
                    <th>Eng</th>
                    
                    <th style="width: 50px;">Option</th>
                </tr>
                </thead>
                <tbody>
                    
                    <?php $no=1;?>
                    @foreach ($table as $row)
                   <tr>
                       <td>{{$no}}</td>
                       <td>{{$row->title}}</td>  
                       <td>{{str_limit($row->desc,50)}}</td>
                       <td>{{str_limit($row->desc_eng,50)}}</td>
                                    
                       <td style="text-align:right;">
                            <a href="javascript:edit({{$row->id}})" class="btn btn-info btn-sm" style="float: left;">
                                <i class="fa fa-edit"></i>
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
    var url   = url_delete+sid+"&table=t_benefit&refresh=binefit";
    AlertCheck('Apakah anda Yakin Menghapus Data Ini?',url);
}
</script>
@endsection