@extends('layouts.admin_tmp')

@section('content')
<div class="row">
    <div class="pull-right">
        
      
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>
                </thead>
                <tbody>
                    
                    <?php $no=1;?>
                    @foreach ($table as $row)
                   <tr>
                       <td>{{$no}}</td>
                       <td>{{$row->first_name}}</td>  
                       <td>{{$row->last_name}}</td>  
                       <td>{{$row->email}}</td>  
                       <td>{{$row->phone_number}}</td>              
                     
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