@extends('layouts.home')

@section('content')
<link rel="stylesheet" href="{{asset('public/front/')}}/css/contact.css">
<div id="Contact">
	<section id="resources" style="padding-top: 120px;">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<h2 class="titlena">Contact Us.</h2>
				</div>
			</div>
			<div class="row" style="padding-bottom: 90px;">
				<div class="col-md-4" v-for="row in contact">
					<div class="card title_icon padding_card padding_10" style="border-radius: 10px">
						<div class="featured-item feature-icon icon-circle icon-outline clearfix" style="height: 100%; border: 1px solid #ebded3; border-radius: 10px"> 
							<a :href="row.link" class="wanya" target="_blank">
							<div class="row">
								<div class="col-md-12">
									<div class="text-center padding_10">
										<i class="material-icons fa fa-whatsapp fa-4x"></i>
									</div>
								</div>
								<div class="col-md-12">
									<div class="desc text-center padding_10">
										<h2 class="title_icon">@{{row.title}}</h2>
										<p class="desc_p">
											<span v-if="localStorage.lang == 'Eng'">
												@{{row.title_desc_eng}}
											</span>
											<span v-else>
												@{{row.title_desc}}
												
											</span>
											
										<br>
										<span v-if="localStorage.lang == 'Eng'">
											@{{row.desc_eng}}
										</span>
										<span v-else>
											@{{row.desc}}
											
										</span>
										
										</p>
									</div>
								</div>
							</div>
							</a>
							
						
						</div><!-- /.featured-item -->
					</div>
				
				</div>
				
			</div>
		</div>
	</section>	
</div>
@endsection
@section('more_js')
<script>

var Contact = new Vue({
    el: '#Contact',
    data: {
        contact:[]

    },
    methods: {
    },
    created: function () {
        axios.get("{{route('contact_info_front')}}")
        .then(function (data) {
            Contact.contact = data.data.data;
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
