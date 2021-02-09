@extends('layouts.admin_tmp')
@section('content')
<!-- modal -->
<div class="modal fade" id="upload">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="col-6 modal-title text-center">Bulk
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h4>
            </div>
            <div class="modal-body">
                <form action="{{route('import_piso')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" required name="file" class="form-control-file" value="">
                    </div>
                    <button type="submit" class="btn btn-primary">Import</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row" id="formData">
   
    <div class="col-md-4 col-sm-4 col-xs-4">
        <div class="x_panel">
            <div class="x_title">
                <h2>Searching<small></small></h2>
                <div class="clearfix"></div>
               
            </div>
            <form action="#" method="post" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="nama" class="col-md-2 control-label left-text">P</label>
                    <div class="col-md-5">
                        <vue-numeric class="form-control text-right"  currency="" separator="," v-model="p" :precision="2" ></vue-numeric>
                    </div>
                    <div class="col-md-5">
                        <vue-numeric class="form-control text-right"  currency="" separator="," v-model="p2" :precision="2" ></vue-numeric>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama" class="col-md-2 control-label left-text">L</label>
                    <div class="col-md-5">
                        <vue-numeric class="form-control text-right"  currency="" separator="," v-model="l" :precision="2" ></vue-numeric>
                    </div>
                    <div class="col-md-5">
                        <vue-numeric class="form-control text-right"  currency="" separator="," v-model="l2" :precision="2" ></vue-numeric>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama" class="col-md-2 control-label left-text">T</label>
                    <div class="col-md-5">
                        <vue-numeric class="form-control text-right"  currency="" separator="," v-model="t" :precision="2" ></vue-numeric>
                    </div>
                    <div class="col-md-5">
                        <vue-numeric class="form-control text-right"  currency="" separator="," v-model="t2" :precision="2" ></vue-numeric>
                    </div>
                </div>
                <div class="form-group">
                    
                    <div class="col-md-12 ">
                        <div class="pull-right">
                            <a  v-on:click="clear()" class="btn btn-danger">  Clear</a>
                            <a  v-on:click="search()" class="btn btn-info"> <i class="fa fa-search"></i> Search</a>
                        </div>
                       
                       
                    </div>
                </div>
                
            </form>
        </div>

    </div>
     <div class="col-md-8 col-sm-8 col-xs-8">
        <div class="x_panel">
            <div class="pull-right">
                <a href="{{ route('add_piso')}}" class="btn btn-sm btn-success">
                    <span class="fa fa-plus"></span> Add
                </a>
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#upload">
                    <span class="fa fa-plus"></span> Import
                </a>
            </div>
            <div class="x_title">
                <h2>Table<small></small></h2>
                <div class="clearfix"></div>
                <input type="hidden" id="delete" value="{{route('role_deleted') }}?id=">
                <input type="hidden" id="edit" value="{{route('role_edit')}}?id=">
            </div>                      
            
            <table id="piso-data-table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
        
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Name</th>
                        <th>category</th>
                        <th>P</th>
                        <th>L</th>
                        <th>T</th>
                        <th>description</th>
                        <th style="width: 50px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(row, index) in data">
                        <td>@{{index+1}}</td>
                        <td>@{{row.name}}</td>
                        <td>@{{row.catagory}}</td>
                        <td>@{{row.p}}</td>
                        <td>@{{row.l}}</td>
                        <td>@{{row.t}}</td>
                        <td>@{{row.description}}</td>
                        <td style="width:150px">
                            <a v-on:click="edit(row.id)" class="btn btn-info btn-sm" style="float: left;">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a v-on:click="Deleted(row.id)" class="btn btn-info btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>

                        </td>
                    </tr>
                    
                
                
                

                </tbody>
            </table>

    </div>
  </div>
</div>
@endsection
@section('more_js')
<script>

var formData = new Vue({
    el:'#formData',
    data:{
        data     :[],
        p        :0,
        l        :0,
        t        :0,
        p2       :0,
        l2       :0,
        t2       :0,       
        
    },

    computed:{
      

    },
    
    methods:{
        search:function(){
            
            this.data = [];
            if(this.p!==0 && this.l!==0 || this.p!==0 && this.t!==0 || this.l!==0 && this.p!==0 || this.l!==0 && this.t!==0 || this.t!==0 && this.p!==0 || this.t!==0 && this.l!==0){
                axios.get('{{route("get_data_piso_filter")}}?p='+this.p+'&l='+this.l+'&t='+this.t+'&p2='+ this.p2 +'&l2='+this.l2+'&t2='+ this.t2).then(function(resp){
                    formData.data= resp.data;
                    setTimeout(() => $('#piso-data-table').DataTable(), 1000);
                })
                .catch(function(err){
                    console.log(err);
                });

            }else{
                Alert('warning','pilih minimal 2 kriteria')

            }

        },
        clear:function(){
            this.data = [];
            axios.get('{{route("get_data_piso")}}').then(function(resp){
                    formData.data= resp.data;
                    setTimeout(() => $('#piso-data-table').DataTable(), 1000);
                    this.p        =0;
                    this.l        =0;
                    this.t        =0; 
                    this.p2        =0;
                    this.l2        =0;
                    this.t2        =0;    
                    window.location.href="";
                })
                .catch(function(err){
                    console.log(err);
                });

        },
        edit:function(id){
            var url= "{{route('edit_piso_form')}}?id=";
            location.href=url+id;
        },
        Deleted:function(id){
            var url   = '{{route("delete")}}?table=tbl_piso&id='+id;
           
             AlertCheck('Apakah anda Yakin Menghapus Data Ini?',url);
             

        }
       
       

    },

    created:function(){        
       
         axios.get('{{route("get_data_piso")}}?p='+this.p+'&l='+this.l+'&t='+this.t).then(function(resp){
            formData.data= resp.data;
            setTimeout(() => $('#piso-data-table').DataTable(), 1000);
        })
        .catch(function(err){
            console.log(err);
        });
    }

})
</script>
@endsection