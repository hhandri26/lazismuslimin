@extends('layouts.home')

@section('content')
<div class="container" id="Checkout">
<main>
        <section class="section-details-donation" >
                <div class="container">
                    <div class="row">
                        <div class="col p-0 pl-0 pl-lg-0">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item" aria-current="page">
                                    Donasi
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                    Details
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 pl-lg-0 mb-2"  >
                            <div class="card card-details mb-3" style="padding:30px">
                                <img v-bind:src="data.img" alt="" class="img-fluid">
                                <div class="mt-4">
                                    <h2>@{{data.title}}</h2>
                                </div>
                               
                                <div class="progress mt-1 mb-4">
                                    <div class="progress-bar w-75" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col text-left">
                                        <p class="text-muted">Terkumpul</p>
                                        <h3 class="mt-n3">Rp. @{{data.total_sumbangan}}</h3>                                        </p>
                                    </div>
                                    <div class="col text-right">
                                        <p class="text-muted">Donatur</p>
                                        <h3 class="mt-n3">@{{data.donatur}}</h3> 
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col">
                                        <p class="text-muted">Bagikan :</p> 
                                    </div>
                                    <div class="col text-right">
                                        <a href="https://web.facebook.com/LazisMusliminParmusi"><i class="fab fa-facebook fa-2x mr-2"></i></a>
                                        <a href="https://twitter.com/lazismuslimin"><i class="fab fa-twitter-square fa-2x mr-2"></i></a>
                                        <a href="https://www.instagram.com/lazismuslimin"><i class="fab fa-instagram fa-2x"></i></a>
                                    </div>
                                </div>
                                <hr>
                                <div class="mt-3 mb-2">
                                    @{{data.desc}}
                                </div>
                                <div class="mt-3 mb-2" v-for="row in detail">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img :src="row.location" alt="" style="width:100%">
                                        </div>
                                        <div class="col-md-12">
                                            @{{row.title}}
                                        </div>
                                    </div>
                                </div>
                                <a href="#" v-on:click="link_checkout()" type="submit" class="btn btn-block btn-lg btn-donation mt-2 py-3">Donasi Sekarang</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
        </section>
    </main>
   
</div>



@endsection
@section('more_js')
<script src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-2s6CyUU4NEEwsRgl"></script>
<script src="{{asset('public/front/')}}/vendor/sweetalert/sweetalert.min.js"></script>
<script>
var Checkout = new Vue({
    el: '#Checkout',
    data: {
        detail:[],
       
        pay:{
            _token: $('meta[name="csrf-token"]').attr('content'),
            donation:'',
            name:'',
            no_hp:'',
            email:'',
            message:'',
            img:'',
            title:'',
            desc:'',
            id:'',
            id_donasi:'',
            title:'',

        },

        data:{
            img:'',
            title:'',
            desc:'',
            id:'',
            total_sumbangan:'',
            donatur:''

        }
       

    },
    computed: {
      
    },
    methods: {
        link_checkout:function(){
            window.location.href="{{url('checkout')}}?id="+this.data.id;
        },
        
        payment:function(){
            if(Checkout.pay.donation!==0 ){
            this.pay.id_donasi = this.data.id;
            this.pay.title = this.data.title;
         
           
            axios.post("{{ route('create_transaction_front')}}", this.pay).then(function (response) {                      
                if(response.status==200){
                    setTimeout(function(){
                        snap.pay(response.data.snap_token, {
                            // Optional
                            onSuccess: function (result) {
                                
                                //localStorage.removeItem("cart");
                                Swal.fire(
                                    'Success',
                                    'Item add to cart',
                                    'success'
                                ).then((value) => {
                                    window.location.href = "{{route('success')}}"
                                });
                                location.reload();
                            },
                            // Optional
                            onPending: function (result) {
                                //localStorage.removeItem("cart");
                                Swal.fire(
                                    'Success',
                                    'Item add to cart',
                                    'success'
                                ).then((value) => {
                                    window.location.href = "{{route('success')}}"
                                });
                                location.reload();
                            },
                            // Optional
                            onError: function (result) {
                                location.reload();
                            }
                        });
                    }, 150);  

                }
            }).catch(function (error) {
                console.log(error);    
            });
        }else{
            Swal.fire(
                'Error',
                'Alamat Anda Kurang Lengkap ',
                'error'
            )
        }

        }
       
      
    },
    created: function () {
      
       

    },
    mounted: function () {  

        var curId = getParameterByName('id');

        if (curId == null) {
            curId = 1;
        }

        axios.get("{{route('detail_models_front')}}?id=" + curId)
        .then(function(data) {
            Checkout.data = data.data.data;
            Checkout.detail = data.data.gallery;

            var no = 0;
            $.each(data.data.detail, function(key, value) {
                no++;
                Checkout.detail.push(value);
            })
            if (no > 0) {
                Checkout.ada = true;
            }
        });
       
  
     
        
    },
    updated: function () {
    },
    watch: {

    }
});





</script>
@endsection
	


