@extends('layouts.home')

@section('content')
<link rel="stylesheet" href="css/shop.css">
<div id="Shop">

	<section class="section-intro" style="padding-top: 90px">
		<div class="content-intro bg-white p-t-77 p-b-133">
			<div class="container">
				<div class="header-intro">
					
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div v-for="row in gallery" class="col-md-3 p-t-30">
						<!-- Block1 -->
						<div class="blo1">
							<div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom" v-if="localStorage.lang == 'Eng'">
								<a v-bind:href="'{{route('product_detail')}}?id='+ row.id"><img v-bind:src="row.img_eng"></a>
							</div>
							<div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom" v-else>
								<a v-bind:href="'{{route('product_detail')}}?id='+ row.id"><img v-bind:src="row.img"></a>
							</div>

							<div class="wrap-text-blo1 p-t-35">
								<a v-bind:href="'{{route('product_detail')}}?id='+ row.id"><h4 class="txt5 color0-hov trans-0-4 m-b-13">
									@{{row.title}}
								</h4></a>

							
								<center>
								
								<a  v-bind:href="'{{route('product_detail')}}?id='+ row.id" class="btn" style="background-color: #fff; border-color: #8c0000;"><i class="fa fa-cart-plus"></i> Buy</a>
								</center>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			
		</div>
	</section>


</div>
@endsection
@section('more_js')
<script>
var Shop = new Vue({
    el: '#Shop',
    data: {
        gallery:[]

    },
    methods: {
    },
    created: function () {
          axios.get("{{route('product_front')}}")
        .then(function (data) {
            Shop.gallery = data.data.data;
        });
    },
    mounted: function () {  
    },
    updated: function () {
    },
    watch: {

    }
})
</script>
@endsection

	



	
