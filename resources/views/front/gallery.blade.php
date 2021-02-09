@extends('layouts.home')

@section('content')
<div id="Gallery">
	

	<section class="section-intro" style="padding-top: 90px">
		<div class="content-intro bg-white p-t-77 p-b-133">
			<div class="container">
				<div class="header-intro">
					
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-3 p-t-30" v-for="row in gallery">
						<!-- Block1 -->
						<div class="blo1">
							<div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
								<a href="#"><img v-bind:src="row.img"></a>
							</div>

							<div class="wrap-text-blo1 p-t-35">
								<a href="#"><h4 class="txt5 color0-hov trans-0-4 m-b-13">
									@{{row.title}}
								</h4></a>
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
var Gallery = new Vue({
    el: '#Gallery',
    data: {
        gallery:[]

    },
    methods: {
    },
    created: function () {
        axios.get("{{route('gallery_front')}}")
        .then(function (data) {
            Gallery.gallery = data.data.data;
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


