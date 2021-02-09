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
                    <th>Nama Donatur</th>
                    <th>Jenis Donasi</th>
                    <th>Nomor Transaksi</th>
                    
                    <th>Nominal</th>
                    <th>Nomor Telephone</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    
                    <?php $no=1;?>
                    @foreach ($table as $row)
                   <tr>
                       <td>{{$no}}</td>
                       <td>{{$row['first_name']}}</td>  
                       <td>{{$row['donasi']}}</td>  
                       <td>{{$row['nomor_transaksi']}}</td>  
                       <td class="text-right">{{number_format($row['amount'],2,',','.')}}</td>  
                      
                       <td>{{$row['phone']}}</td>  
                       <td>{{$row['email']}}</td>  
                     
                       <td>
                            @if($row['status'] == 'pending')
                            <a href="{{route('order_form')}}?id={{$row['id']}}" class="btn btn-info">Validasi</a>
                            @else
                            <a href="#" class="btn btn-success">Success</a>
                            @endif
                      
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
<script src="{{asset('public/js/page/transaction/review_detail_transaction.js')}}"></script>
@endsection