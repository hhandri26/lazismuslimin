@extends('layouts.home')



@section('content')



    

<div id="slide" class="carousel slide" style="margin-top:100px" data-ride="carousel">

    <ol class="carousel-indicators">

        <li data-target="#slide" data-slide-to="0" class="active"></li>

        <li data-target="#slide" data-slide-to="1"></li>

        <li data-target="#slide" data-slide-to="2"></li>
	<li data-target="#slide" data-slide-to="3"></li>
 <li data-target="#slide" data-slide-to="4"></li>
 <li data-target="#slide" data-slide-to="5"></li>
 <li data-target="#slide" data-slide-to="6"></li>



    </ol>

    <div class="carousel-inner">

        <div class="carousel-item active">

            <img class="d-block w-100" src="{{asset('/public/images/header 1.png')}}" alt="First slide">

            

        </div>

        <div class="carousel-item">

            <img class="d-block w-100" src="{{asset('/public/images/Header 3.png')}}" alt="Second slide">

        </div>

        <div class="carousel-item">

            <img class="d-block w-100" src="{{asset('/public/images/Header 4.png')}}" alt="Third slide">

        </div>

	<div class="carousel-item">

            <img class="d-block w-100" src="{{asset('/public/images/Header 5.png')}}" alt="Third slide">

        </div>

	<div class="carousel-item">

            <img class="d-block w-100" src="{{asset('/public/images/Header 6.png')}}" alt="Third slide">

        </div>

	<div class="carousel-item">

            <img class="d-block w-100" src="{{asset('/public/images/Header 7.png')}}" alt="Third slide">

        </div>

    </div>

    <a class="carousel-control-prev" href="#slide" role="button" data-slide="prev">

        <span class="carousel-control-prev-icon" aria-hidden="true"></span>

        <span class="sr-only">Previous</span>

    </a>

    <a class="carousel-control-next" href="#slide" role="button" data-slide="next">

        <span class="carousel-control-next-icon" aria-hidden="true"></span>

        <span class="sr-only">Next</span>

    </a>

</div>

        <div class="container">

            <!-- Statistics -->

            

            <!-- Donations -->

            <section class="section-donations" id="donations">

                <div class="row">

                        <div class="col text-center section-donations-heading">

                            <h2>Program Donasi</h2>

                            <p>Pilih dan salurkan donasi untuk program yang berarti<br>

                                bagi Anda dan mereka</p>

                        </div>

                    </div>

                    <div class="row justify-content-center section-all-donations">

						@foreach($product as $row)



							<div class="col-sm-12 com-md-6 col-lg-4">

								<div class="card-donation text-center d-flex flex-column shadow-sm">

									<div class="donation-image">

										<img src="{{asset('/public/images/product/'.$row->img)}}" alt="">

									</div>

									<div>

										<h4>{{$row->title}}</h4>

									</div>

									<div style="margin-top:-10px;text-align:justify !important">

										<p>{{ $row->desc }}</p>
		


									</div>

									<div class="donation-button mt-auto">

										<a href="{{route('donation')}}?id={{$row->id}}" class="btn btn-donation px-4">Donasi</a>

									</div>

								</div>

							</div>

						@endforeach

                       

                    </div>

            </section>

        </div>

            <!-- Acara -->

            <section class="section-acara" id="acara">

                <div class="col text-center section-acara-heading">

                    <h2>Acara Donasi</h2>

                    <p>Pilih dan salurkan donasi untuk program yang berarti<br>

                        bagi Anda dan mereka</p>

                </div>

                <div class="container text-center my-3">

                    <div class="row mx-auto my-auto">

                        <div id="recipeCarousel" class="carousel carousel-2 slide w-100" data-ride="carousel-2">

                            <div class="carousel-inner w-100" role="listbox">

                            @foreach($acara as $row)

                                <div class="carousel-item carousel-item-2 {{$row->active}}">

                                    <div class="col-lg-3 col-md-4 col-sm-12">

                                        <div class="card card-body">

                                            <a href="{{route('donation')}}?id={{$row->id}}"><img src="{{asset('/public/images/product/'.$row->img)}}" alt="" style="width:200px;height:100px"></a> 

                                            <div class="title mt-2" style="height: 50px;font-size: 12px">

                                            {{$row->title}}

                                            </div>

                                            <a href="{{route('donation')}}?id={{$row->id}}" class="btn btn-donation px-4 mt-4">Donasi Sekarang</a>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                              

                            </div>

                            <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">

                                <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>

                                <span class="sr-only">Previous</span>

                            </a>

                            <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">

                                <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>

                                <span class="sr-only">Next</span>

                            </a>

                        </div>

                    </div>

                    <h5 class="mt-2">Advances one slide at a time</h5>

                </div>      

            </section>



            <!-- Tentang -->

            <section class="section-about" id="about">

                <div class="container">

                    <div class="col text-center section-acara-heading">

                    <h2>Tentang Parmusi</h2>

                    <p>Mengenal lebih dekat siapa Parmusi</p>

                </div>

                <div class="row">

                    <div class="col-lg-5 col-md-12 col-sm-12 mb-4 mt-2" style="text-align:center">

                        <img src="{{asset('public/')}}/images/parmusi2.png" alt="" width="50%">

                    </div>

                    <div class="col-lg-7 col-md-12 col-sm-12" style="text-align:justify">

                      <p><b>Persaudaraan Muslimin Indonesia (PARMUSI)</b> merupakan organisasi kemasyarakatan yang di deklarasikan di Yogyakarta pada hari Ahad tanggal 16 Jumadil Akhir 1420 Hijriyah bertepatan dengan tanggal 26 September 1999. Dimana Parmusi sebagai "Connecting Muslim", menjadikan Parmusi sebagai organisasi sosial kemasyarakatan Islam terbuka untuk mempersatukan aktivis pergerakan Islam yang sejalan dengan visi, misi dan cita-cita perjuangan Parmusi dari berbagai latar belakang sosio, kultural, dan politik dengan menjadikan dakwah sebagai sebuah gerakan. Untuk dapat mewujudkan Rencana Strategis tersebut, maka salah satu langkah yang ditempuh Parmusi adalah membuat Program Strategis Parmusi, dengan Tag Line : Menata, Menyapa, dan Membela.</p>
		      <p><b>Menata</b>, dalam arti melakukan konsolidasi organisasi dari tingkat pusat, wilayah, daerah, hingga tingkat cabang atau kecamatan. Dalam hal ini merupakan program konsolidasi organisasi yang akan dijabarkan kemudian sampai terwujudnya 5 kader da'I di setiap kecamatan.  </p>
		      <p><b>Menyapa</b>, dalam arti kepengurusan Parmusi di semua tingkatan harus dapat melaksanakan Program Umum Nasional dengan melibatkan segenap kader dan masyarakat luas di lingkungannya. Program PARMUSI dapat bersinergi dengan masyarakat tanpa harus membuat label PARMUSI dengan program yang bermanfaat langsung bagi masyarakat. Oleh karena itu menyapa dalam hal ini tidak sekedar memberikan salam dan ta'aruf, tapi berkesan kedalam hati umat. Program yang dapat dikembangkan ini antara lain, Lembaga Amil, Zakat, Infaq dan Sedekah (Lazis Muslimin), Lembaga Wakaf Muslimin, Lembaga Dakwah Parmusi (LDP), Lembaga Komunikasi Dan Penyiaran Islam  (LKPI), Parmusi Bisnis Center (PBC), PARMUSI#SaveHelp Center, Thibbun Nabawi Center (TNC), Lembaga Pendidikan Islam (LPI), Rumah Yatim Parmusi (RYP), Lembaga Dhuafa (LDh), dll.</p>
		      <p><b>Membela</b>, dalam arti kepengurusan Parmusi di semua tingkatan harus dapat memberikan perhatian, advokasi, dan perlindungan bagi kader dan warga masyarakat di lingkungannya dalam melaksanakan syariat Islam serta menegakkan kebenaran dan keadilan. Ditetapkannya Program Rumah Perdamaian untuk Keadilan (Rumah PK) Parmusi, dimaksudkan adalah untuk merealisasikan pembelaan terhadap masyarakat dari segala lapisan, agar hak2 masyarakat untuk mendapatkan keadilan bisa terpenuhi.</p>
                    </div>

                </div>

                <div class="row visi-misi justify-content-center">

                    <div class="col-lg-5 col-md-6 col-sm-12 text-center">

                        <h3>Visi</h3>

                        <p>Terwujudnya masyarakat madani yang islami sejahtera lahir dan batin dalam kehidupan berbangsa dan bernegara Indonesia, yaitu masyarakat Indonesia yang berorientasi pada keimanan dan ketaqwaan, keilmuan, keadilan, kemajuan dan kebersamaan.</p>

                    </div>

                    <div class="col-lg-5 col-md-6 col-sm-12 text-center">

                        <h3>Misi</h3>

                        <p>Untuk mewujudkan visi, PARMUSI melaksanakan misi sebagai berikut : 1. Mengembangkan kualitas sumberdaya manusia. 2. Meningkatkan kualitas kepemimpinan sosial-politik dan kemasyarakatan 3. Meningkatkan kualitas iman dan taqwa serta amal saleh keluarga muslimin Indonesia.</p>

                    </div>

                </div>

                </div>

            



@endsection

@section('more_js')

<script >

var Index = new Vue({

    el: '#Index',

    data: {

        slideshow:[],

        product:[],

        why_us:[],

        binefit:[],
        project:[]



    },

    methods: {

    },

    created: function () {

        // get slideshow

        axios.get("{{ route('slideshow_front')}}")

        .then(function (data) {

            Index.slideshow = data.data.data;

        });



        axios.get("{{route('product_front')}}")

        .then(function (data) {

            Index.product = data.data.data;

        });



        axios.get("{{route('why_us_front')}}")

        .then(function (data) {

            Index.why_us = data.data.data;

        });



        axios.get("{{route('binefit_front')}}")

        .then(function (data) {

            Index.binefit = data.data.data;

        });

        axios.get("{{route('project_front')}}")

        .then(function (data) {

            Index.project = data.data.data;

        });

    },

    mounted: function () {  

    },

    updated: function () {

    },

    watch: {



    }

});





</script>

@endsection

