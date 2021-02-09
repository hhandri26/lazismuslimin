<!DOCTYPE html>

<html lang="en">

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Lazis Muslimin Parmusi">

    <meta name="keywords" content="Lazis Muslimin Parmusi">

    <meta name="author" content="Lazis Muslimin Parmusi" />

   



    <title>Lazis Muslimin Parmusi</title>

    <link rel="stylesheet" href="{{asset('public/front2/')}}/libraries/bootstrap/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('public/front2')}}/styles/main.css">

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">  

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="base-url" content="{{ url('/') }}" />

    <link href="{{asset('public/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">





<!--===============================================================================================-->

</head>
<style>
.swal2-styled.swal2-confirm {
    pointer-events: all;
}
</style>



<body>

    <!-- Navbar -->

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-transparant">

        <div class="container container-nav shadow-sm">

            <a class="navbar-brand" href="#">

                <img src="{{asset('public/')}}/images/parmusi.png" style="width:150px !important" alt="logo Parmusi">

            </a>

            <button class="navbar-toggler navbar-toggler-right mr-3" type="button" data-toggle="collapse" data-target="#navb">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navb">

                <ul class="navbar-nav ml-auto mr-3">

                    <li class="nav-item mx-md-2"><a href="{{route('/')}}" class="nav-link active">Beranda</a></li>

                    <li class="nav-item mx-md-2"><a href="#donations" class="nav-link">Donasi</a></li>

                    <li class="nav-item mx-md-2"><a href="#about" class="nav-link">Tentang</a></li>

                    <li class="nav-item mx-md-2"><a href="#acara" class="nav-link">Acara</a></li>

                    <li class="nav-item mx-md-2"><a href="https://muslimobsession.com/" target="_blank" class="nav-link">Berita</a></li>

                    <li class="nav-item mx-md-2"><a href="#contact" class="nav-link">Kontak Kami</a></li>

                </ul>

            </div>

        </div>

    </nav>

	



	

    <main>

        @yield('content')

        <section class="section-contact" id="contact">
            <div class="row">
            <div class="container mt-5" >

<div class="row">

    <div class="col-lg-6 col-md-12 col-sm-12" >



<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2693.0068624167584!2d106.82408521160251!3d-6.318528275331161!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe62f37e066fdf3a3!2sParmusi%20Centre%20Indonesia!5e0!3m2!1sid!2sid!4v1610183155239!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>

    <div class="col-lg-6 col-md-12 col-sm-12">

        <h2>Hubungi Kita</h2>

        <form action="">

            <div class="row">

                <div class="col-lg-6">

                <div class="form-group">

                    <input type="text" class="form-control mt-2" placeholder="Nama" required>

                </div>

                </div>

                <div class="col-lg-6">

                    <div class="form-group">

                        <input type="number" class="form-control mt-2" placeholder="Telepon" required>

                    </div>

                </div>

                <div class="col-12">

                <div class="form-group">

                    <input type="email" class="form-control mt-2" placeholder="Email" required>

                </div>

                </div>

                <div class="col-12">

                <div class="form-group">

                    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Isi Email" rows="3" required></textarea>

                </div>

                </div>

                <div class="col-12">

                <div class="form-group">

                <div class="form-check">

                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>

                    <label class="form-check-label" for="invalidCheck2">

                    Setujui Kondisi

                    </label>

                </div>

                </div>

                </div>

                <div class="col-12">

                <button class="btn btn-email" type="submit">Kirim</button>

                </div>

            </div>

        </form>

    <div>

        <i class="fas fa-phone mt-3"></i> <a href="tel:+">(+39) 123456</a><br>

        <i class="fas fa-phone mt-3"></i> <a href="tel:+">(+39) 123456</a><br>

        <i class="fa fa-envelope mt-3"></i> <a href="">lazismusliminparmusi@gmail.com</a><br>

       

    </div>

</div>



</div>

</div>
            </div>

           <div class="row">
           <div class="container">
    <section style="height:80px;"></section>
	
    <!----------- Footer ------------>
    <footer class="footer-bs">
        <div class="row">
        	<div class="col-md-3 footer-brand animated fadeInLeft" style="text-align:center">
            <img src="{{asset('public/')}}/images/parmusi.png" style="width:150px !important;padding: 10px;" alt="logo Parmusi">
                <p style="text-align:left">
                Jl. Sagu No.6, RT.10/RW.5, Ragunan, Kec. Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12550
                </p>
            </div>
        	<div class="col-md-4 footer-nav animated fadeInUp">
            	
            	<div class="col-md-6">
                    <ul class="list">
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#">Donasi</a></li>
                        <li><a href="#">Tentang</a></li>
                        <li><a href="#">Acara</a></li>
                        <li><a href="#">Berita</a></li>
                        <li><a href="#">Kontak Kami</a></li>
                    </ul>
                </div>
            </div>
        	<div class="col-md-5 footer-social animated fadeInDown">
            	<h4>Follow Us</h4>
            	<ul>
                	<li><a href="https://web.facebook.com/LazisMusliminParmusi">Facebook</a></li>
                	<li><a href="https://twitter.com/lazismuslimin">Twitter</a></li>
                	<li><a href="https://www.instagram.com/lazismuslimin">Instagram</a></li>
                </ul>
            </div>
        	
        </div>
    </footer>
  

</div>
           </div>

        </section>        

    </main>

    <footer class="section-footer mt-5 mb-4 border-top">

            <div class="container-fluid">

                <div class="row border-top justify-content-center align-items-center pt-4">

                    <div class="col-auto text-gray-500 font-weight-light">

                    2020 Copyright Parmusi • All rights reserved • Made in Tangerang

                    </div>

                </div>

            </div>

    </footer>

    

	







<!--===============================================================================================-->

<script type="text/javascript" src="{{asset('public/front2/')}}/libraries/jquery/jquery-3.5.1.min.js"></script>

	<script type="text/javascript" src="{{asset('public/front2/')}}/libraries/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="{{asset('public/front/')}}/vendor/owl-carousel2/owl.carousel.min.js"></script>
    <script src="{{asset('public/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
    
    <script src="{{asset('public/pages/jquery.sweet-alert.init.js')}}"></script>

<!--===============================================================================================-->



<!--===============================================================================================-->



<!--===============================================================================================-->

	<script src="{{asset('public/front2/')}}/scripts/main.js"></script>



	<script src="{{asset('public/front/')}}/js/core/vue.min.js?ver=01042020"></script>

    <script src="{{asset('public/front/')}}/vendor/vue-select/vue-select.js"></script>



    <script src="{{asset('public/front/')}}/js/core/accounting.umd.js"></script>

    <script src="{{asset('public/front/')}}/js/core/vue-numeric.min.js"></script>
    <script src="{{asset('public/front/')}}/js/core/vue-filter.js"></script>
    <script src="{{asset('public/front/')}}/js/core/vue-clipboard.min.js"></script>

    <script src="{{asset('public/front/')}}/js/core/variable.js?ver=01042020"></script>

    

    <script src="{{asset('public/front/')}}/vendor/lodash/lodash.min.js"></script>

	<script src="{{asset('public/front/')}}/js/core/axios.min.js?ver=01042020"></script>

	<script src="{{asset('public/front/')}}/js/core/header.js?ver=01042020"></script>

	<script src="{{asset('public/front/')}}/js/core/nav.js?ver=01042020"></script>

    <script src="{{asset('public/front/')}}/js/core/footer.js?ver=01042020"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

    <script src="{{asset('public/costum/globalscript.js')}}"></script>
    <script src="{{asset('public/costum/alert.js')}}"></script>

    @yield('more_js')



</body>

</html>

