@extends('layouts.admin_tmp')
@section('content')

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
                    <label for="nama" class="col-md-6 control-label left-text">Nama Project</label>
                    <div class="col-md-6">
                        <input type="text" v-model="project_name" class="form-control">
                    </div>
                   
                </div>
                <div class="form-group">
                    <label for="nama" class="col-md-6 control-label left-text">Initial</label>
                    <div class="col-md-6">
                        <input type="text" v-model="initial" class="form-control">
                    </div>
                   
                </div>
                <div class="form-group">
                    <label for="nama" class="col-md-6 control-label left-text">Dari Tanggal</label>
                    <div class="col-md-6">
                        <vuejs-datepicker v-model="start_date" format="dd-MM-yyyy" class="form-control" ></vuejs-datepicker>
                    </div>
                   
                </div>
                <div class="form-group">
                    <label for="nama" class="col-md-6 control-label left-text">Sampai Tanggal</label>
                    <div class="col-md-6">
                    <vuejs-datepicker v-model="end_date" format="dd-MM-yyyy" class="form-control" ></vuejs-datepicker>
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
                <a href="{{ route('add_project')}}" class="btn btn-sm btn-success">
                    <span class="fa fa-plus"></span> Add
                </a>
            </div>
           
            <div class="x_title">
                <h2>Table<small></small></h2>
                <div class="clearfix"></div>
                
            </div>                      
            
            <table id="piso-data-table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
        
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Nama Project</th>
                        <th>Nama Brand</th>
                        <th>Tanggal Order</th>
                        <th>Sample</th>
                        <th>Model</th>
                        <th>Qty</th>
                        <th>Status</th>
                        <th style="width: 50px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(row, index) in data">
                        <td>@{{index+1}}</td>
                        <td>@{{row.project_name}}</td>
                        <td>@{{row.brand_name}}</td>
                        <td>@{{row.date_order}}</td>
                        <td>@{{row.sample}}</td>
                        <td>@{{row.model}}</td>
                        <td>@{{row.qty}}</td>
                        <td></td>
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
        project_name:'',
        initial:'',
        start_date:'',
        end_date :''  
        
    },

    computed:{
      

    },
    
    methods:{
        search:function(){
            
            this.data = [];
        
            axios.get('{{route("get_data_project_filter")}}?project_name='+this.project_name+'&initial='+this.initial+'&start_date='+this.start_date+'&end_date='+ this.end_date ).then(function(resp){
                formData.data= resp.data;
                setTimeout(() => $('#piso-data-table').DataTable(), 1000);
            })
            .catch(function(err){
                console.log(err);
            });

           

        },
        clear:function(){
            this.data = [];
            axios.get('{{route("get_data_project")}}').then(function(resp){
                    formData.data= resp.data;
                    setTimeout(() => $('#piso-data-table').DataTable(), 1000);
                    this.project_name   ='';
                    this.initial        ='';
                    this.start_date     =''; 
                    this.end_date       ='';
                    window.location.href="";
                })
                .catch(function(err){
                    console.log(err);
                });

        },
        edit:function(id){
            var url= "{{route('get_data_project')}}?id=";
            location.href=url+id;
        },
        Deleted:function(id){
            var url   = '{{route("delete")}}?table=t_project&id='+id;
           
             AlertCheck('Apakah anda Yakin Menghapus Data Ini?',url);
             

        }
       
       

    },

    created:function(){        
       
         axios.get('{{route("get_data_project")}}?p='+this.p+'&l='+this.l+'&t='+this.t).then(function(resp){
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