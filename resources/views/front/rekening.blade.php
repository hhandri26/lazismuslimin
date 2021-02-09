@extends('layouts.home')

@section('content')
<main id="Checkout">
        <section class="section-details-donation">
                <div class="container">
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
                                    Pembayaran
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card card-details card-right">
                            <div class="text-center">
                                <small class="">Nomor Donasi</small>
                                <h5 class="mt-2 mb-2" style="font-weight: bold;">INV-@{{nomor_trasaction}}</h5>
                                <small class="">Total Pembayaran Donasi</small>
                                <h1 class="mt-2 mb-2 mr-2" style="font-weight: 550;">Rp.@{{amount | thousand}}</h2>
                               
                                <a href="#" v-on:click="copy_text(amount)" >SALIN</a>
                               
                            </div>
                            <div class="caution">
                                <small>PENTING! Mohon transfer tepat sampai 3 angka terakhir agar dapat diproses secara otomatis</small>
                            </div>
                            <table style="width: 100%;" class="mt-4">
                            <tr style="text-align: left;">
                                <td width="50%">Jumlah Donasi</td>
                                <th width="50%" class="text-right">@{{amount1 | thousand}}</th>
                            </tr>
                            <tr style="text-align: left;">
                                <td width="50%">Kode Unik</td>
                                <th width="50%" class="text-right">@{{dg}}</th>
                            </tr>
                            </table>
                            <p class="text-mute" style="text-align:justify">*Kode unik yang menjadi identifikasi donasi, juga akan didonasikan.
Untuk nominal donasi yang tidak sesuai dengan kode unik yang tertera, akan kami catat dalam di kategori akad nikah.</p>
                            <hr>
                            <div class="text-center">
                                <span>
                                    Selesaikan donasi sebelum besok 
                                    <?php 
                                        echo date("d M Y", time() + 86400).' Jam '.date("H:i");
                                    ?>
                                </span>
                            </div>
                            <hr>
                            <div class="text-center">
                                <small class="">Silahkan Transfer Ke</small>
                            </div>
                            <hr>
                            <div class="text-center" v-if="metode == 'BNI'">
                                <img src="{{asset('/public/images/bni-syariah.png')}}" alt="" width="100px;">
                                <h5 class="mt-2 mb-2" style="font-weight: bold;">888078873</h5>
                                <a href="#" v-on:click="copy_text('888078873')" >SALIN</a> <br>
                                <span>a.n: Persaudaraan Muslimin Indonesia</span>
                            </div>
                            <div class="text-center" v-else>
                                <img src="{{asset('/public/images/bri.jpg')}}" alt="" width="100px;">
                                <h5 class="mt-2 mb-2" style="font-weight: bold;">1035751684</h5>
                                <a href="#" v-on:click="copy_text('1035751684')" >SALIN</a> <br>
                                <span>a.n Zis Muslimin</span>
                            </div>
                            
                        </div>
                    </div>
                    </div>
                </div>
        </section>
    </main>
    @endsection
    @section('more_js')

<script>
var Checkout = new Vue({
    el: '#Checkout',
    data: {
       
        nomor_trasaction:'',
        amount:0,
        amount1:0,
        dg:0,
        metode:''       

    },
    computed: {
      
    },
    methods: {
        copy_text:function(amount){
            this.$copyText(amount).then(function (e) {
          alert('Tersalin')
          console.log(e)
        }, function (e) {
          alert('Can not copy')
          console.log(e)
        })
        },
        
       
      
    },
    created: function () {
      
       

    },
    mounted: function () {  

        var nomor_trasaction = getParameterByName('nomor_trasaction');
        var amount = getParameterByName('amount');
        var dg = getParameterByName('dg');
        var amount1 = getParameterByName('amount1');
        var metode = getParameterByName('metode');

        this.nomor_trasaction = nomor_trasaction;
        this.amount = amount;
        this.dg = dg;
        this.amount1 = amount1;
        this.metode = metode;
       
  
     
        
    },
    updated: function () {
    },
    watch: {

    }
});





</script>
@endsection