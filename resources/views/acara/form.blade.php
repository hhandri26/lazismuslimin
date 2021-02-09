@extends('layouts.admin_tmp')
@section('content')
<?php $id=request()->id; ?>

<div class="box box-info" >
    <div class="box-header with-border">
        <div class="row">
            <div class="col-md-10"><h4 class="box-title">Add @if($id>0) Edit @endif Product</h4></div>
            <input type="hidden" id="url_back" value="{{route('product')}}">
            <input type="hidden" id="id" value="{{ $id }}">
        </div>
    </div>
    <div class="box-body" id="form">
        <form class="form-horizontal" >
        <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;"  >
            <a href="#" v-on:click="doSave()"  class="btn-floating btn-large" style="background-color: #4CAF50;color: #fff">
                <i style="font-size: 1.6em" class="fa fa-save fa-lg"></i>
            </a>
            <a href="#" v-on:click="back()" class="btn-floating btn-large" style="background-color: #FB0C03 ;color: #fff">
                <i style="font-size: 1.6em" class="fa  fa-arrow-circle-o-left "></i>
            </a>
        </div>
        {{csrf_field()}}
            <div class="box-body1">
                <div class="panel panel-info">
                    <div class="panel-heading1"></div>     
                        <div class="panel-body">
                        
                            <div class="form-group" >
                                <label for="img" class="col-sm-3 control-label1">Gambar</label>
                                    <div class="col-sm-9">
                                    <img class="img-thumbnail" width="200" height="200" v-bind:src="data.location"  name="file"  alt="your image" />
                                    <input type="file" name="file" id="file" ref="file" v-on:change="upload_image()">
                                </div>                        
                            </div>

                           
                            
                            <div class="form-group">
                                <label for="desc" class="col-sm-3 control-label1 require">* Judul</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title" v-model="data.title">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="desc" class="col-sm-3 control-label1 "> Deskripsi</label>
                                <div class="col-sm-9">
                                    <textarea  v-model="data.desc" id="idn" class="form-control"></textarea>
                                </div>
                               
                            </div>
                            <div class="form-group">
                                <label for="desc" class="col-sm-3 control-label1 "> Gallery </label>                               
                            </div>
                            <div class="form-group">
                                <table id="tbl1" class="table table-hover table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Img</th>
                                            <th>Deskripsi</th>
                                            <th></th>
                                           
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- v-for sub -->
                                        <tr v-for="(elm, index) in data3">
                                            <td>
                                                <img class="img-thumbnail" width="200" height="200" v-bind:src="elm.location" name="file"  alt="your image" />
                                                <input type="file"  :id="index"  v-on:change="upload_image_gallery(elm,index)">
                                            </td>
                                            <td>
                                            <textarea class="form-control" v-model="elm.title"></textarea>
                                            </td>
                                          
                                            <td>
                                                <a v-if="elm.id" v-on:click="do_delete_sub('t_product_gallery',elm.id)" class="btn btn-danger "><i class="fa fa-remove">Deleted</i></a>
                                                <a v-else v-on:click="doRemoveSub('data3',index)" class="btn btn-danger "><i class="fa fa-remove"></i></a>
                                            </td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td style="text-align:right;" colspan="6">
                                                <a v-on:click="addRowSub('data3')" class="btn btn-info"><i class="fa fa-plus"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                          
                            
                           
                            
                        </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('more_js')
<script>

var form = new Vue({
    el:'#form',
    data:{
        data:{
            img :"",
            title:'',
            desc  :'',
            location:"{{asset('public/img/df.jpg')}}",  
            type:'ACARA'
        },
        file:'',
        file2:'',
        data3:[]
        

        
    },

    computed:{

    },

    methods:{
        do_delete_sub:function(target,id){
            var url_delete =$('#delete').val() ;   
            var url   = "{{route('delete') }}?id="+id+"&table="+target+"&refresh=''";
            AlertCheck('Apakah anda Yakin Menghapus Data Ini?',url);

        },
        upload_image_gallery:function(elm,index){
            var img = document.getElementById(index)
            var file = img.files[0];
            var formData = new FormData();
            formData.append('file',file);
            formData.append('_token', CSRF_TOKEN);
            formData.append('folder','gallery_product');
            var headers= {
                    'Content-Type': 'multipart/form-data'
                }
            axios.post( "{{route('upload_file_vue')}}",formData,headers).then(function(res){
                
                elm.img = res.data.file_name;
                elm.location = res.data.file_path;
                console.log(elm.location)
            })
           


        },
        upload_image:function(){
            this.file = this.$refs.file.files[0];
            var formData = new FormData();
          
            formData.append('file', this.file);
            formData.append('_token', CSRF_TOKEN);
            formData.append('folder','product');
           
            
            var headers= {
                    'Content-Type': 'multipart/form-data'
                }
            axios.post( "{{route('upload_file_vue')}}",formData,headers).then(function(res){
                
                form.data.img = res.data.file_name;
                form.data.location = res.data.file_path;
            })
            

        },
        upload_image_eng:function(){
            this.file2 = this.$refs.file2.files[0];
            var formData = new FormData();
          
            formData.append('file', this.file2);
            formData.append('_token', CSRF_TOKEN);
            formData.append('folder','product_eng');
           
            
            var headers= {
                    'Content-Type': 'multipart/form-data'
                }
            axios.post( "{{route('upload_file_vue')}}",formData,headers).then(function(res){
                
                form.data.img_eng = res.data.file_name;
                form.data.location_eng = res.data.file_path;
            })
            

        },
        doRemoveSub:function(target,index){
            this[target].splice(index, 1);
        },
        addRowSub:function(target){
            this[target].push({})           
        },
        doSave:function(){
            var url_save = "{{route('acara_add')}}";
            var id       = $('#id').val();
            var data    = {
                            id    :id, 
                            data1 :form.data,
                            data3 :form.data3,
                             _token : CSRF_TOKEN
                        }
            if(AlertRequire("idn"," IDN")  && AlertRequire("title",'Judul')){
                AlertCheckAxios('Apakah anda Yakin Menyimpan Data Ini?',url_save,data);
            }
        },
        back:function(){
            var url_back    =$('#url_back').val();
            location.href   =url_back;
        }

    },
    mounted:function() {
        var id                  = $('#id').val();   
        if(id>0){
            axios.get('{{route("product_edit")}}?id='+id).then(function(resp){
            form.data = resp.data.data1;
            form.data2= resp.data.data2;
            form.data3= resp.data.data3;
        })
        .catch(function(err){
            console.log(err);
        });

        } 
       
        
        
    },

    created:function(){        
        
       
    }

})
</script>
@endsection
