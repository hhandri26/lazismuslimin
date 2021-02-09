@extends('layouts.admin_tmp')

@section('content')
<div class="row">
    <div class="pull-right">
        <a href="{{ route('user_form')}}" class="btn btn-sm btn-success">
            <span class="fa fa-plus"></span> Tambah Users
        </a>
    </div>
     <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_title">
              <h2>Table<small>User</small></h2>
            <div class="clearfix"></div>
        </div>     
        <input type="hidden" id="delete" value="{{route('delete') }}?id=">
        <input type="hidden" id="edit" value="{{route('user_edit')}}?id=">
        <input type="hidden" id="get_list" value="{{route('user_list')}}?id=">                  
        <div class="table-responsive m-b-20">
          <table id="user" border="0" class="table table-hover1 display  table-bordered compact1" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th><div style="width: 50px">No</div></th>
                    <th><div style="width: 200px">Nama</div></th>
                    <th><div style="width: 200px">Username</div></th>
                    <th><div style="width: 200px">Email</div></th>
                    <th><div style="width: 200px">Phone</div></th>
                    <th><div style="width: 50px">Active</div></th>
                    <th><div style="width: 200px">Role</div></th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>

        </div>
    </div>
  </div>
</div>
@endsection
@section('more_js')
<script src="{{asset('public/js/page/user/table.js')}}"></script>
@endsection