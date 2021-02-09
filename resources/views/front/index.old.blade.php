@extends('layouts.home')

@section('content')


	<!-- Slide1 -->

	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" v-for="(row, index) in slideshow" :data-slide-to="row.id" v-bind:class="index==0 ? 'active' : '' "></li>
		</ol>
		<div class="carousel-inner">
			<div v-for="(row,index) in slideshow" v-bind:class="index==0 ? 'carousel-item active' : 'carousel-item' " >
				<img class="img-fluid"  v-bind:src="row.img" alt="First slide">
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
	<section class="section-intro">
		<div class="content-intro bg-white p-t-77 p-b-133">
			<div class="container">
				<div class="header-intro">
					<h3>
						<u>New Product.</u>
					</h3>
				</div>
			</div>
			<div class="container">
				<div class="row">
					
					<div class="owl-carousel owl-theme">
						@foreach($product as $row)
							<div class="item" >
								<!-- Block1 -->
								<div class="blo1">
									<div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom" v-if="localStorage.lang == 'Eng'">
										<a href="{{route('product_detail')}}?id={{$row->id}}"><img src="{{asset('/public/images/product_eng/'.$row->location_eng)}}"></a>
									</div>
									<div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom" v-else>
										<a href="{{route('product_detail')}}?id={{$row->id}}"><img src="{{asset('/public/images/product/'.$row->img)}}"></a>
									</div>

									<div class="wrap-text-blo1 p-t-35">
										<a href="{{route('product_detail')}}?id={{$row->id}}"><h4 class="txt5 color0-hov trans-0-4 m-b-13">
											{{$row->title}}
										</h4></a>

									
										<center>
									
										<a  href="{{route('product_detail')}}?id={{$row->id}}" class="btn" style="background-color: #fff; border-color: #8c0000;"><i class="fa fa-cart-plus"></i> Buy</a>
										</center>
									</div>
								</div>
							</div>
						@endforeach
					
					</div>
					

					

				</div>
			</div>
		</div>
	</section>

	<div v-for="row in why_us" :class="'container-fluid'+ row.bg">
		<div class="container">
				<div class="header-intro">
					<h3>
						<u>Our Journey.</u>
					</h3>
				</div>
			</div>
		<div class="row">
			<div class="col-md-6 ">
				<img src="{{asset('public/img/')}}/produk akar lawang.png" alt=""  class="img-fluid">
			</div>
			<div class="col-md-6" v-if="localStorage.lang == 'Eng'">
				<img src="{{asset('public/img/')}}/benefits of root lawang.png" alt=""  class="img-fluid">					
			</div>
			<div class="col-md-6" v-else>
				<img src="{{asset('public/img/')}}/manfaat akar lawang.png" alt=""  class="img-fluid">
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-6" v-if="localStorage.lang == 'Eng'">
				<img src="{{asset('public/img/')}}/benefits nutmeg.png" alt=""  class="img-fluid">					
			</div>
			<div class="col-md-6" v-else>
				<img src="{{asset('public/img/')}}/manfaat biji pala.png" alt=""  class="img-fluid">					
			</div>
			<div class="col-md-6 ">
				<img src="{{asset('public/img/')}}/produk biji pala.png" alt=""  class="img-fluid">
			</div>
			
			
		</div>
		<div class="row">
			<div class="col-md-6 ">
				<img src="{{asset('public/img/')}}/produk kayuputih.png" alt=""  class="img-fluid">
			</div>
			<div class="col-md-6" v-if="localStorage.lang == 'Eng'">
				
				<img src="{{asset('public/img/')}}/benefits cajeput oil.png" alt=""  class="img-fluid">					
			</div>
			<div class="col-md-6" v-else>
			<img src="{{asset('public/img/')}}/manfaat kayu putih.png" alt=""  class="img-fluid">	
								
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-6" v-if="localStorage.lang == 'Eng'">
				<img src="{{asset('public/img/')}}/benefits patchouli.png" alt=""  class="img-fluid">					
			</div>
			<div class="col-md-6" v-else>
				<img src="{{asset('public/img/')}}/manfaat nilam.png" alt=""  class="img-fluid">					
			</div>
			<div class="col-md-6 ">
				<img src="{{asset('public/img/')}}/produk nilam.png" alt=""  class="img-fluid">
			</div>
			
			
		</div>
		<div class="row">
			<div class="col-md-6 ">
				<img src="{{asset('public/img/')}}/produk sereh.png" alt=""  class="img-fluid">
			</div>
			<div class="col-md-6" v-if="localStorage.lang == 'Eng'">
				<img src="{{asset('public/img/')}}/benefits of citronella.png" alt=""  class="img-fluid">					
			</div>
			<div class="col-md-6" v-else>
				<img src="{{asset('public/img/')}}/manfaat sereh.png" alt=""  class="img-fluid">					
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
