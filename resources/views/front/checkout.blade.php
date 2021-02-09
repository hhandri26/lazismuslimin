@extends('layouts.home')

@section('content')
<style>
/* The container */
.container_cheked {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  width: 150px;
    float: left;
}

/* Hide the browser's default checkbox */
.container_cheked input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container_cheked:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container_cheked input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container_cheked input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container_cheked .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
.custom{
    float: left;
    width: 150px;
    border: 1px solid;
}
</style>
<main>
        <section class="section-details-donation">
                <div class="container" id="Checkout">
                    <div class="row">
                        <div class="col p-0 pl-0 pl-lg-0">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item" aria-current="page">
                                    Donasi
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                    Details
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                    Checkout
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-lg-6">
                            <div class="card card-details card-right">
                                <div>
                                    <small id="emailHelp" class="form-text text-muted mb-2" >Anda akan berdonasi untuk :</small>
                                    <h5>@{{data.title}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                    <div class="col-lg-6" >
                        <div class="card card-details card-right">
                            <h2 class="mb-4">Donasi Sekarang</h2>
                            

                                <div class="form-group">

                                    <label for="exampleInputEmail1">Nominal Donasi</label>

                                    <vue-numeric v-model="pay.donation"  class="form-control" currency="Rp" separator="," ></vue-numeric>

                                </div>
                                <div class="form-group">
                                    <label class="container_cheked" v-for="row in pay.option_value">
                                         @{{row.text}}
                                        <input type="radio" v-model="pay.donation":value="row.value">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                  <!-- <div  v-for="row in pay.option_value" class="custom">
                                  <input 
                                   
                                   type="radio"
                                   id="flat"
                                   name="property_type"
                                   class="switch-input"
                                   v-model="pay.donation"
                                   :value="row.value"
                                   
                                   />
                                   <label for="flat">@{{row.text}}</label>
                                  </div> -->
                                 

                                </div>
                                <div class="input-group mb-4">
                                    <select class="custom-select" id="" v-model="pay.metode_pembayaran">
                                        <option value="Pilih Metode Pembayaran">Pilih Metode Pembayaran</option>
                                        <option value="BNI">BNI Syariah</option>
                                        <option value="BRI">BRI Syariah</option>
                                        <option value="Gopay">Gopay</option>
                                    </select>
                                </div>

                                <div class="form-group">

                                    <label for="exampleInputPassword1">Nama Lengkap</label>

                                    <input type="text" class="form-control" v-model="pay.name" >

                                </div>

                                <div class="form-group form-check">

                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">

                                    <label class="form-check-label" for="exampleCheck1">Sembunyikan Nama "Hamba Allah"</label>

                                </div>



                                <div class="form-group mb-2">

                                    <small id="emailHelp" class="form-text text-muted mb-2" >Jika tidak mengisi No HP dan Email maka tidak akan ada Notifikasi bukti donasi dan kabar perkembangan program.</small>

                                    <label for="exampleInputEmail1">Email Aktif</label>

                                    <input type="email" class="form-control" v-model="pay.email" >

                                </div>

                                <div class="form-group">

                                    <label for="exampleInputEmail1">No. Hanphone</label>

                                    <input type="number" class="form-control" v-model="pay.no_hp">

                                </div>

                                <div class="form-group">

                                    <label for="exampleInputPassword1">Pesan</label>

                                    <textarea type="text" v-model="pay.message" class="form-control" id="" placeholder="Masukkan Pesan"></textarea>



                                </div>

                                <a class="btn btn-block btn-donation mt-3 py-2" @click="payment()">Donasi</a>

                            </form>




                        
                        </div>
                        
                    </div>
                    </div>
                </div>
        </section>
    </main>


@endsection
@section('more_js')
<script src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-2s6CyUU4NEEwsRgl"></script>
<script src="{{asset('public/front/')}}/vendor/sweetalert/sweetalert.min.js"></script>
<script>
var Checkout = new Vue({
    el: '#Checkout',
    data: {
       
        pay:{
            _token: $('meta[name="csrf-token"]').attr('content'),
            donation:10000,
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
            metode_pembayaran:'Pilih Metode Pembayaran',
            option_value:[
                {text:'10.000',value:'10000'},
                {text:'25.000',value:'25000'},
                {text:'50.000',value:'50000'},
                {text:'100.000',value:'100000'},
                {text:'250.000',value:'250000'},
                {text:'500.000',value:'500000'},
                {text:'1.000.000',value:'1000000'},
                {text:'2.500.000',value:'2500000'},
                {text:'5.000.000',value:'5000000'},
                {text:'nominal lainnya',value:'custom'},
            ]

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
        
        payment:function(){
            if(Checkout.pay.donation >= 10000 ){
                if(Checkout.pay.name !==''){
                    this.pay.id_donasi = this.data.id;
                    this.pay.title = this.data.title;
                
                    if(this.pay.metode_pembayaran =='Gopay'){
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

                    }else if(this.pay.metode_pembayaran =='BNI' || this.pay.metode_pembayaran =='BRI'){
                        axios.post("{{ route('create_transaction_custom')}}", this.pay).then(function (response) {                      
                            if(response.status==200){
                                window.location.href = "{{route('invoice')}}?nomor_trasaction="+response.data.no_transaksi+'&amount='+response.data.total+'&amount1='+response.data.amount+'&dg='+response.data.dg+'&metode='+response.data.metode;
                                

                                    // Swal.fire(
                                    //     'Success',
                                    //     'Donasi Berhasil !',
                                    //     'success'
                                    // ).then((value) => {
                                    //     window.location.href = "{{route('invoice')}}?nomor_trasaction="+response.data.no_transaksi+'&amount='+response.data.total;
                                    // });
                                

                            }
                        }).catch(function (error) {
                            console.log(error);    
                        });

                    }else{
                        Swal.fire(
                        'Error',
                        'Silahan pilih metode pembayaran',
                        'error'
                        )
                    }

                }else{
                    Swal.fire(
                        'Error',
                        'Nama Wajib Di Isi',
                        'error'
                        )

                }
               
            
            }else{
                Swal.fire(
                    'Error',
                    'Jumlah Donasi Harus Lebih besar atau sama dengan 10.000',
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
	

