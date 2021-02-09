@extends('layouts.home')

@section('content')
<style>
    

</style>
<div id="ProductDetail">


    <section class="section-padding jarak" >
    </section>
    
    <section class="section-intro">
        <div class="container">
            <div class="col-md-12">
                <div class="text-center mb-50">
                    <h2 style="color: #B5A99F;">ORDER</h2>
                    <hr>
                </div>
                <form id="regForm" action="#" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5">
                                    
                                    <div v-if="ada == true">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#carouselExampleIndicators" v-for="(row, index) in detail" :data-slide-to="row.id" v-bind:class="index==0 ? 'active' : '' "></li>
                                                
                                            </ol>
                                            <div  class="carousel-inner">
                                                    
                                                <div v-for="(row,index) in detail" v-bind:class="index==0 ? 'carousel-item active' : 'carousel-item' " >
                                                    <img class="d-block full_img"  v-bind:src="row.img" alt="First slide" style="width: 400px;">
                                                </div>			  
                                            </div>
                                            
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>

                                    </div>
                                    
                                    <div v-else>
                                        <div v-if="localStorage.lang == 'Eng'">
                                        <img class="d-block full_img"  v-bind:src="header.img_eng" alt="First slide" style="width: 400px;">
                                        </div>
                                        <div v-else>
                                        <img class="d-block full_img"  v-bind:src="header.img" alt="First slide" style="width: 400px;">
                                        </div>
                                       

                                    </div>
                            
                                </div>
                                <div class="col-md-7">
                                    

                                    <b class="d-block">Description:</b>
    
                                    <div class="box-type">
                                        <span>@{{header.title}}</span>
                                        <span v-if="localStorage.lang == 'Eng'" v-html="header.desc_eng">
                                           
                                        </span>
                                        <span v-else  v-html="header.desc">
                                           
                                            
                                        </span>
                                    </div>
                                    <br>
                                
                                    <div class="row">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Note</td>
                                                    <td>
                                                    <span v-if="localStorage.lang == 'Eng'">
                                                   

                                                       We take large amount order per kg <br>
                                                       Email : sales@velocestore.com
                                                    </span>
                                                    <span v-else>
                                                    Terima Pesanan Partai Besar / kg, Hubungi <br>
                                                       Email : sales@velocestore.com
                                                        
                                                    </span>
                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Harga</td>
                                                    <td>
                                                        <div style="text-align: right;">
                                                          <vue-numeric readonly="" v-model="data.harga"  class="select_style text-right" currency="Rp" separator="," ></vue-numeric>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah</td>
                                                    <td>
                                                        
                                                        <div class="num-block skin-2">
                                                            <div class="num-in">
                                                                <a v-on:click="min_qty()" ><span class="minus dis"></span></a>
                                                                <input type="text"  v-model="data.qty" class="in-num" value="1" readonly="">
                                                                <a v-on:click="add_qty()" ><span class="plus"></span></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td>
                                                        <div style="text-align: right;">
                                                          <vue-numeric readonly="" v-model="data.sub_total"  class="select_style text-right" currency="Rp" separator="," ></vue-numeric>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                      
                                    </div>
                                  
                                    
    
                                   
                                    

                                    
    
                                    
                                    <div class="form-metro">
                                        <a v-on:click="addToCart()" class="btn" style="background-color: #fff; border-color: #8c0000;"><i class="fa fa-cart-plus"></i> Tambahkan Ke keranjang</a>
                                        <a href="{{route('shop')}}" class="btn" style="background-color: #fff; border-color: #8c0000;"><i class="fa fa-arrow-right"></i> Kembali</a>
                                    </div>
                                </div>

                            </div>
                            
                            
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="section-padding" style="padding: 60px 0;">
    </section>

</div>
@endsection
@section('more_js')
<script src="{{asset('public/front/')}}/vendor/sweetalert/sweetalert.min.js"></script>
<script>
var ProductDetail = new Vue({
    el: '#ProductDetail',
    data: {
        header:{},
        detail:[],
        ada:false,
        
        data:{
            qty:0,
            harga:'',
            berat:0,
            sub_total:0,
            product_id:''
        },
        items:[],
       

    },
    computed: {
    },
    methods: {
        add_qty:function(){
            ProductDetail.data.qty += 1;
            ProductDetail.data.sub_total = ProductDetail.data.harga * ProductDetail.data.qty;
            

        },
        min_qty:function(){
            if(ProductDetail.data.qty <= 1 || ProductDetail.data.qty == 0 ){
                ProductDetail.data.qty = 1;
            ProductDetail.data.sub_total = ProductDetail.data.harga * ProductDetail.data.qty;   

            }else{
                ProductDetail.data.qty -= 1;
            ProductDetail.data.sub_total = ProductDetail.data.harga * ProductDetail.data.qty;   

            }
                  
        },
        addToCart:function(){
            if(ProductDetail.data.sub_total!==''){
               
                var existing = JSON.parse(localStorage.getItem("cart"));
                if(existing!== null){
                    var b=[{}];
                    b =JSON.parse(localStorage.getItem("cart")) || [];
                    b.push(ProductDetail.data);
                    localStorage.setItem("cart",JSON.stringify(b));

                }else{
                    localStorage.setItem("cart",JSON.stringify([ProductDetail.data]));

                }
                
                
                Swal.fire(
                    'Success',
                    'Item add to cart',
                    'success'
                ).then((value) => {
                    ProductDetail.data.qty='';
                    ProductDetail.data.harga='';
                    ProductDetail.data.berat='';
                    ProductDetail.data.sub_total='';
                
                    ProductDetail.data.product_id='';
                    window.location.href = "{{route('checkout')}}"
                });


            }
            

        },
       
       
    },
    created: function () {
    },
    mounted: function () {
      
        var curId = getParameterByName('id');
        this.data.product_id = curId;
        
        axios.get("{{route('detail_product_front')}}?id="+curId)
        .then(function (data) {
            ProductDetail.header = data.data.header;
            ProductDetail.data.harga = data.data.header.harga;
            ProductDetail.data.berat = data.data.header.berat;
            if(ProductDetail.data.harga < 100000){
                ProductDetail.data.qty = 1;
                ProductDetail.data.sub_total = ProductDetail.data.harga * ProductDetail.data.qty;

            }else{
                ProductDetail.data.qty = 1;
                ProductDetail.data.sub_total = ProductDetail.data.harga * ProductDetail.data.qty;

            }

            var no = 0;
            $.each(data.data.detail, function (key, value) {
                no++;
                ProductDetail.detail.push(value);
            })
            if(no>0){
                ProductDetail.ada = true;
            }
        });
    },
    updated: function () {
    },
    watch: {

    }
})


</script>
@endsection

	

