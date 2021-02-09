@extends('layouts.admin_tmp')

@section('content')
<?php $id=request()->id; ?>
 
<form class="form-horizontal" id="formData">
    {{csrf_field()}}
    <div class="form-group">
        <label for="desc" class="col-sm-3 control-label1 ">* Nama Project</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="project_name" v-model="data.project_name">
        </div>
       
    </div>
    <div class="form-group">
        <label for="desc" class="col-sm-3 control-label1 ">Nama Brand</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="brand_name" v-model="data.brand_name">
        </div>
    </div>
    <div class="form-group">
        <label for="desc" class="col-sm-3 control-label1 ">Phone</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="phone" v-model="data.phone_number">
        </div>
    </div>
   
    <div class="form-group">
        <label for="desc" class="col-sm-3 control-label1 ">Tanggal Order</label>
        <div class="col-sm-9">
            <vuejs-datepicker v-model="data.date_order" format="dd-MM-yyyy" class="form-control" ></vuejs-datepicker>
        </div>
    </div>
    <div class="form-group">
        <label for="desc" class="col-sm-3 control-label1 ">Material</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="material" v-model="data.material">
        </div>
    </div>
    <div class="form-group">
        <label for="desc" class="col-sm-3 control-label1 ">Sample</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="sample" v-model="data.sample">
        </div>
    </div>
    <div class="form-group">
        <label for="desc" class="col-sm-3 control-label1 ">Model</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="model" v-model="data.model">
        </div>
    </div>
    <div class="form-group">
        <label for="desc" class="col-sm-3 control-label1 ">Phone</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="phone" v-model="data.phone_number">
        </div>
    </div>
    <div class="form-group">
        <label for="desc" class="col-sm-3 control-label1 ">Dimensi</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="l" v-model="data.l" placeholder="Panjang">
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="w" v-model="data.w" placeholder="Lebar">
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="h" v-model="data.h" placeholder="Tinggi">
        </div>
    </div>
    <div class="form-group">
        <label for="desc" class="col-sm-3 control-label1 ">Qty</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="qty" v-model="data.qty">
        </div>
    </div>
    <div class="form-group">
        <label for="desc" class="col-sm-3 control-label1 ">Outer</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="outer" v-model="data.outer">
        </div>
    </div>
    <div class="form-group">
        <label for="desc" class="col-sm-3 control-label1 ">Inner</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inner" v-model="data.inner">
        </div>
    </div>
    <div class="form-group">
        <label for="desc" class="col-sm-3 control-label1 ">Flute</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="flute" v-model="data.flute">
        </div>
    </div>
    <div class="form-group">
        <label for="desc" class="col-sm-3 control-label1 ">Sheet</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="sheet_l" v-model="data.sheet_l" placeholder="Lebar Sheet">
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="sheet_p" v-model="data.sheet_p"  placeholder="Panjang Sheet">
        </div>
    </div>
    <div class="form-group">
        <label for="desc" class="col-sm-3 control-label1 ">Qty In</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="qtd_in" v-model="data.qtd_in">
        </div>
    </div>
    <div class="form-group">
        <label for="desc" class="col-sm-3 control-label1 ">Qty Use</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="qtd_use" v-model="data.qtd_use">
        </div>
    </div>
  
    <div class="form-group">
        <label for="desc" class="col-sm-3 control-label1 ">Harga per Box</label>
        <div class="col-sm-9">
        <vue-numeric class="form-control text-right"  currency="" separator="," v-model="data.price_box" ></vue-numeric>
        </div>
    </div>
    <div class="form-group">
        <label for="desc" class="col-sm-3 control-label1 ">Total </label>
        <div class="col-sm-9">
        <vue-numeric class="form-control text-right"  currency="" separator="," v-model="data.sale" ></vue-numeric>
        </div>
    </div>
    
    <div class="form-group">
        <label for="desc" class="col-sm-3 control-label1 ">DP</label>
        <div class="col-sm-9">
            <vue-numeric class="form-control text-right"  currency="" separator="," v-model="data.dp" ></vue-numeric>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-12">
            <table id="tbl1" class="table table-hover table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>Initial </th>
                        <th>Pekerjaan</th>
                        <th>Deskripsi</th>
                        <th>Durasi</th>
                        <th>Tanggal Mulai</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- v-for sub -->
                    <tr v-for="(row, index) in details">
                        <td>
                            <select v-model="row.intial"  class="form-control">
                                <option v-for="row in master.intial" :value="row.id"> @{{ row.name }}</option>                                        
                            </select>
                        </td>
                        <td>
                            <select v-model="row.job"  class="form-control">
                                <div v-if="row.initial=='INITIAL">
                                    <option v-for="row in master.job" :value="row.id"> @{{ row.name }}</option>      
                                </div>
                                <div v-if="row.initial=='PON">
                                    <option v-for="row in master.job2" :value="row.id"> @{{ row.name }}</option>      
                                </div>
                                <div v-if="row.initial=='CETAK">
                                    <option v-for="row in master.job2" :value="row.id"> @{{ row.name }}</option>      
                                </div>
                                <div v-if="row.initial=='CETAK">
                                    <option v-for="row in master.job4" :value="row.id"> @{{ row.name }}</option>      
                                </div>
                                <div v-if="row.initial=='CETAK">
                                    <option v-for="row in master.job5" :value="row.id"> @{{ row.name }}</option>      
                                </div>
                                                                
                            </select>
                        </td>
                        <td>
                            <input type="text" v-model="row.dec" class="form-control" class="form-control">
                            
                        </td>
                        <td>
                            <input type="text" v-model="row.duration" class="form-control" class="form-control">
                            
                        </td>
                        <td>
                            <vuejs-datepicker v-model="row.start_date" format="dd-MM-yyyy" class="form-control" ></vuejs-datepicker>
                        </td>
                        
                        <td><a v-on:click="remove_row('details',index)" class="btn btn-danger "><i class="fa fa-remove"></i></a></td>
                    </tr>
                    <!-- end -->
                    <tr>
                        <td style="text-align:right;" colspan="6">
                            <a v-on:click="addRow('details')" class="btn btn-info"><i class="fa fa-plus"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
   
    <div class="form-group">
        <a href="#" class="btn btn-info" v-on:click="doSave()"> Save</a>
    </div>
</form>
@endsection
@section('more_js')

<script>
var formData = new Vue({
    el:'#formData',
    data:{
        details:[],
        data:{
            project_name:'',
            brand_name:'',
            phone_number:'',
            date_order:'',
            material:'',
            sample:'',
            model:'',
            phone_number:'',
            l:'',
            w:'',
            h:'',
            qty:'',
            outer:'',
            inner:'',
            flute:'',
            sheet_l:'',
            sheet_p:'',
            qtd_in:'',
            qtd_use:'',
            price_box:'',
            sale:'',
            dp:'',
            _token              :'{{csrf_field()}}',
        },
        master  :{
                intial  :[
                    {id:'INITIAL',name:'INITIAL'},
                    {id:'PON',name:'PON'},
                    {id:'CETAK',name:'CETAK'},
                    {id:'FINISHING',name:'FINISHING'},
                    {id:'DELIVERY',name:'DELIVERY'},

                ],
                job    :[
                    {id:'Pesan Piso',name:'Pesan Piso'},
                    {id:'Confirm Piso',name:'Confirm Piso'},
                   
                ],
                job2:[
                    {id:'PON',name:'PON'},
                    {id:'KOBET',name:'KOBET'},
                ],
                job3:[
                    {id:'SABLON',name:'SABLON'}
                ],
                job4:[
                    {id:'Lem Mika',name:'Lem Mika'},
                    {id:'Lem Kuping',name:'Lem Kuping'},
                    {id:'Wraping Bungkus/strap/karung',name:'Wraping Bungkus/strap/karung'}
                ],
                job5:[
                    {id:'Pengiriman',name:'Pengiriman'},
                   
                ],

        },
    },

    computed:{
    },
    methods:{
      
        addRow: function(target){
            this[target].push({})            
        },
        remove_row: function (target, index) {
            this[target].splice(index, 1);
        },
        doSave:function(){
            // var id              ="{{$id}}"; 
            // var url_save        ="";
            // var dat ={
            //     header          :formData.data,
            //     term_of_payment :formData.term_of_payment,
            //     cost_structure  :formData.cost_structure,
            //     sub_mandays     :formData.sub_mandays,
            // }
            // if(AlertRequire("client_id","Client")){
            //     AlertCheckAxios('Apakah anda Yakin Menyimpan Data Ini?',url_save,dat);
            // }
        }

    },
    created:function(){
        @if($id)
        var id                  ="{{$id}}"; 
       
        @endif

       

    },
})

</script>
@endsection