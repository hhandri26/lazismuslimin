@extends('layouts.home')

@section('content')

<section class="section-intro" style="padding-top: 90px">
    <div class="content-intro bg-white p-t-77 p-b-133">
        <div class="container">
            <div class="header-intro">
                
            </div>
        </div>
        <div class="container">
            <div class="row">
                

                <div class="col-sm-12 col-md-12 p-t-50">
                    <div class="col-md-12">
                        <div class="card shadow mb-4" style="height:1500px">
                        
                            <div class="card-body" >
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Nomor Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Kurir</th>
                                            <th>Ongkos Kirim</th>
                                            <th>Harga</th>
                                            <th>Status Pengiriman</th>
                                            <th>Pembayaran</th>
                                            <th>Detail</th>
                                        </tr>
                                        </thead>
                                      
                                        <tbody>
                                            @foreach ($table as $row)
                                                <tr>
                                                    <td>{{$row['nomor_transaksi']}}</td>
                                                    <td>{{$row['date']}}</td>
                                                    <td>{{$row['time']}}</td>
                                                    <td>{{$row['courier']}}</td>
                                                    <td>{{ "Rp " . number_format($row['amount_shipping'],2,',','.') }}</td>
                                                    <td>{{ "Rp " . number_format($row['amount'],2,',','.') }}</td>
                                                    <td> <a onclick="check_pengiriman.openModal({{$row['no_resi_pengiriman'] , $row['courier']}})" class="btn btn-warning">{{$row['status_order']}}</a> </td>
                                    
                                                  
                                                    <td><button class="btn btn-danger">{{$row['status_payment']}}</button></td>
                                                    <td>
                                                        <a onclick="review_detail_transaction.openModal({{$row['id']}})" class="btn btn-success">Detail</a>
                                                    </td>
                                                </tr>
                                                
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('more_js')
<script src="{{asset('public/js/page/transaction/review_detail_transaction.js')}}"></script>
<script src="{{asset('public/js/page/transaction/check_pengiriman.js')}}"></script>
<script>
$(document).ready( function () {
    $('#dataTable').DataTable();
} );
</script>
@endsection