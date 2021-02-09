<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="custom box indonesia">
    <meta name="keywords" content="custom box indonesia">
    <meta name="author" content="CustomBox" />
   

    <title>Customboxid |</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('public/front/')}}/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/front/')}}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/front/')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/front/')}}/fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/front/')}}/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/front/')}}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/front/')}}/vendor/animsition/css/animsition.min.css">

	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/front/')}}/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/front/')}}/vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/front/')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/front/')}}/css/main.css">
	<link rel="stylesheet" href="{{asset('public/front/')}}/css/mobile.css">
    <link rel="stylesheet" href="{{asset('public/front/')}}/vendor/vue-select/vue-select.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

<!--===============================================================================================-->
</head>

<body class="animsition" style="max-width: 100%; overflow-x: hidden;">
	<div id="Index">
    <nav class="navbar navbar-light">
    <a class="navbar-brand"><img src="{{asset('public/front/')}}/images/icons/logo.png" style="width:200px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('/')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('shop')}}">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('gallery_kusuma')}}">Gallery</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('sample_custombox')}}">Sample</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('contact')}}">Contact us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="set_lang('Eng')">Eng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="set_lang('Idn')">IDN</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('login_member')}}" >Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('register_member')}}" >Register</a>
        </li>
        
      </ul>
    </div>
  </nav>
    <main>
				
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" v-for="(row, index) in slideshow" :data-slide-to="row.id" v-bind:class="index==0 ? 'active' : '' "></li>
					</ol>
					<div class="carousel-inner">
						<div v-for="(row,index) in slideshow" v-bind:class="index==0 ? 'carousel-item active' : 'carousel-item' " >
							<img class="d-block full_img"  v-bind:src="row.img" style="width: 640px">
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

				<div class="mycontainer">
					<!-- Cards -->
					<section class="my-5" style="padding: 30px;">
					  <h2 class="text-center">Product</h2>
					  <div class="row">
						<div class="grid-custom">
						  <div  v-for="row in product" class="mycard my-2">
							<div class="mycard__image">
							  <a v-bind:href="'product-detail.html?id=' + row.id"><img v-bind:src="row.img"></a>
							</div>
							<div class="mycard__detail">
							  <p class="mycard__detail__name mt-2">@{{row.title}}</p>
							  <p class="mycard__detail__price mt-n2"><span v-if="localStorage.lang == 'Eng'">
								@{{row.desc_eng.substring(0,50)+"..."}}
							</span>
							<span v-else>
								@{{row.desc.substring(0,50)+"..."}}
								
							</span></p>
							</div>
							<div class="overlay-card"></div>
						  </div>
						 
						</div>
					  </div>
					</section>
					<!-- Step Section -->
				   
					<!-- our client -->
				</div>
				 <!-- start -->
                 <div class="mycontainer">
						<!-- Cards -->
						<section class="my-5">
							<h2 class="text-center">More Benefit</h2>
							<div class="row">
								<div class="grid-custom">
									<div class="mycard my-2" style="background-color: #efe5dc;" v-for="row in binefit">
										<div class="mycard__image">
										<img v-bind:src="row.img" alt="">
										</div>
										<div class="mycard__detail" style="width: 90%; height : 180px;">
										<p class="mycard__detail__name mt-2" style="color:#8c0000;">@{{row.title}}<br>
										<p class="mycard__detail__price mt-n2">
										<span v-if="localStorage.lang == 'Eng'">
											@{{row.desc_eng.substring(0,50)+"..."}}
										</span>
										<span v-else>
											@{{row.desc.substring(0,50)+"..."}}
											
										</span></p>
										</div>
										<div class="overlay-card"></div>
									</div>
									
								</div>
							</div>
						</section>
						
					</div>
				 <div v-for="row in why_us">
					<section class="client-section my-5">
						<h2>@{{row.title}}</h2>
						<div class="clients mt-3">
								  <h3 class="c1">@{{row.title_number}}</h3>
								  <h5 class="c2" style="padding-left: 45px !important;">@{{row.title_desc}}</h5>
								  <p class="c3">
									<span v-if="localStorage.lang == 'Eng'">
										@{{row.desc_eng.substring(0,200)+"..."}}
									</span>
									<span v-else>
										@{{row.desc.substring(0,200)+"..."}}
										
									</span>
								  </p>
								  <p class="c4">
									  <a href="#" style="color: #d2a2a2 !important;">Learn More...</a>
								</p>
						</div>      
					  </section>
					  <section class="step-section">
						  
						 <div class="row" style="margin-top: -45px">
							<div class="col-md-12 mt-5 step__details">
							  <div class="step__details__image">
								 <img v-bind:src="row.img" style="width:100%">
							  </div>
							 
							</div>
				  
						  </div>
					  </section>

				 </div>
				  <!-- end -->
				  

				

				
			</main>
            <footer class="bg3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 p-t-50">
                        <!-- - -->
                        <h4 class="txt13 m-b-33" style="color:#000;">
                            <u>My Account.</u>
                        </h4>

                        <ul class="m-b-70">
                            <li class="txt14 m-b-14" >
                                <a href="signin.php" style="color: #333;">Sign in</a>
                            </li>

                            <li class="txt14 m-b-14">
                                <a href="signin.php" style="color: #333;">Register</a>
                            </li>

                            <li class="txt14 m-b-14">
                                <a href="#" style="color: #333;">Payment Confirmation</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-6 col-md-3 p-t-50">
                        <!-- - -->
                        <h4 class="txt13 m-b-33" style="color:#000;">
                            <u>About us.</u>
                        </h4>

                        <ul class="m-b-70">
                            <li class="txt14 m-b-14" >
                                <a href="#" style="color: #333;">Our Story</a>
                            </li>

                            <li class="txt14 m-b-14">
                                <a href="#" style="color: #333;">Career</a>
                            </li>

                            <li class="txt14 m-b-14">
                                <a href="#" style="color: #333;">Partnership</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-6 col-md-3 p-t-50">
                        <!-- - -->
                        <h4 class="txt13 m-b-33">
                            <u>Help.</u>
                        </h4>

                        <ul class="m-b-70">
                            <li class="txt14 m-b-14">
                                How to Shop
                            </li>

                            <li class="txt14 m-b-14">
                                FAQ
                            </li>

                            <li class="txt14 m-b-14">
                                Shopping Policy
                            </li>
                        </ul>

                        <!-- - -->
                        

                        
                    </div>

                    <div class="col-sm-6 col-md-3 p-t-50">
                        <!-- - -->
                        <h4 class="txt13 m-b-20">
                            <u>News Letter</u>
                        </h4>

                        <ul class="m-b-20">
                            <li class="txt14 m-b-14">
                                <div class="form-group clearfix">
                                    <label class="sr-only" for="subscribe" >Email address</label>
                                    <input style="margin-left:28px" type="email" class="form-control" id="subscribe" placeholder="Email address">
                                    <input type="submit" value="Sign Up" style="padding: 12px 10px !important">
                                </div>
                            </li>	


                            
                        </ul>

                        <!-- - -->
                        

                        
                    </div>
                </div>
            </div>

            <div class="end-footer bg2">
                <div class="container">
                    <div class="flex-sb-m flex-w p-t-22 p-b-22">
                        <div class="p-t-5 p-b-5">
                            <a href="#" class="fs-15 c-black"><i class="fa fa-facebook m-l-18" aria-hidden="true"></i></a>
                            <a href="#" class="fs-15 c-black"><i class="fa fa-twitter m-l-18" aria-hidden="true"></i></a>
                            <a href="#" class="fs-15 c-black"><i class="fa fa-envelope m-l-18" aria-hidden="true"></i></a>
                        </div>

                        <div class="txt17 p-r-20 p-t-5 p-b-5 c-black">
                            Copyright &copy; 2020 - <b>CustomBox Indonesia</b> - All rights reserved 
                        </div>
                    </div>
                </div>
            </div>
        </footer>


	</div>

	


	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-up" aria-hidden="true"></i>
			
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>

	<!-- Modal Video 01-->
	



<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('public/front/')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
	
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('public/front/')}}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('public/front/')}}/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="{{asset('public/front/')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('public/front/')}}/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="{{asset('public/front/')}}/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('public/front/')}}/vendor/parallax100/parallax100.js"></script>
	<script type="text/javascript">
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('public/front/')}}/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('public/front/')}}/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('public/front/')}}/js/main.js"></script>

	<script src="{{asset('public/front/')}}/js/core/vue.min.js?ver=01042020"></script>
    <script src="{{asset('public/front/')}}/vendor/vue-select/vue-select.js"></script>

    <script src="{{asset('public/front/')}}/js/core/accounting.umd.js"></script>
    <script src="{{asset('public/front/')}}/js/core/vue-numeric.min.js"></script>
    <script src="{{asset('public/front/')}}/js/core/variable.js?ver=01042020"></script>
    
    <script src="{{asset('public/front/')}}/vendor/lodash/lodash.min.js"></script>
	<script src="{{asset('public/front/')}}/js/core/axios.min.js?ver=01042020"></script>
	<script src="{{asset('public/front/')}}/js/core/header.js?ver=01042020"></script>
	<script src="{{asset('public/front/')}}/js/core/nav.js?ver=01042020"></script>
	<script src="{{asset('public/front/')}}/js/core/footer.js?ver=01042020"></script>
    <script>
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
    @yield('more_js')

</body>
</html>
