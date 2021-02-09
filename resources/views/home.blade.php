@extends('layouts.admin_tmp')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Dashboard</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="card-box widget-inline">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget-inline-box text-center">
                                <h3 class="m-t-10"><i class="fa fa-picture-o"></i><b> </b></h3>
                                <p class="text-muted">Total Request</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="widget-inline-box text-center">
                                <h3 class="m-t-10"><i class="fa fa-users"></i><b></b></h3>
                                <p class="text-muted">Total Member</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="widget-inline-box text-center">
                                <h3 class="m-t-10"><i class="fa fa-shopping-bag"></i><b> </b></h3>
                                <p class="text-muted">Total Transaction</p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>






<!-- script chart -->


@endsection
@section('more_js')
<script src="{{asset('public/plugins/chart-js/Chart.js')}}"></script>
<script>

</script>

@endsection
