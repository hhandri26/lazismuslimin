@extends('layouts.home')

@section('content')

	<div id="Signin">
		
		
		<section class="section-intro jarak">
			<div class="content-intro bg-white p-t-77 p-b-133">
				<div class="container">
					<div class="header-intro">
						
					</div>
				</div>
				<div class="container">
				<div class="row">
					<div class="col-sm-4 col-md-4"></div>

					<div class="col-sm-4 col-md-4 p-t-50">
						<!-- - -->
						<h4 class="txt13 m-b-33" style="color:#d2a2a2;">
							Create Your Account
						<hr class="onepixel">	
						</h4>
							<form action="/action_page.php" style="font-family: gotham-book; font-size:13px;">
							Email Address: (Optional)<br>
							<input type="text" v-model="data.email" class="form-control" style="width: 100%; border: 1px solid rgba(0,0,0,.15) !important;">
							<br>
							Phone Number: (Whatsapp Number)<br>
							<input type="text" v-model="data.phone_number" class="form-control" style="width: 100%; border: 1px solid rgba(0,0,0,.15) !important;">
							<br>
							First Name:<br>
							<input type="text" v-model="data.first_name" class="form-control" style="width: 100%; border: 1px solid rgba(0,0,0,.15) !important;">
							<br>
							Last Name:<br>
							<input type="text" v-model="data.last_name" class="form-control" style="width: 100%; border: 1px solid rgba(0,0,0,.15) !important;" >
							<br>
							
							Provinsi:<br>
							<v-select v-model="data.province_id" @input="get_city()" :options="provinsi" :reduce="x => x.province_id"  label="province"></v-select>   
							<br>
							Kota:<br>
							<v-select v-model="data.city_id" :options="city" :reduce="x => x.city_id"  label="city_name"></v-select>   
							<br>
							Alamat:<br>
							<textarea  class="form-control" v-model="data.address" style="width: 100%;"></textarea>
							<br>
							Password:<br>
							<input type="password" v-model="data.password" class="form-control" style="width: 100%; border: 1px solid rgba(0,0,0,.15) !important;">
							<br>
							<span style="font-size:12px;">Your password must be at least 8 characters long.</span><br><br>

							<button type="button" @click="register()" > Register</button>
							</form>
							<br>
							<a href="{{route('login_member')}}"><p>Have an accouny? <span style="color:#d2a2a2">Click here to sign in</span></p></a>
							
					</div>

					<div class="col-sm-4 col-md-4"></div>

					
				</div>
			</div>
			</div>
		</section>
	



	</div>
	@endsection
@section('more_js')
<script src="{{asset('public/front/')}}/vendor/sweetalert/sweetalert.min.js"></script>
<script>
var Signin = new Vue({
    el: '#Signin',
    data: {
        data:{
            email:'',
            phone_number:'',
            first_name:'',
            last_name:'',
			password:'',
			_token: $('meta[name="csrf-token"]').attr('content'),
			province_id:'',
			city_id:'',
			address:''
			

        },
		city:[],
        provinsi:[]

    },
    methods: {
		get_city:function(){
            Signin.city=[];
            var id = Signin.data.province_id;
            axios.get( "{{ route('get_city_front')}}?provinsi_id="+id)
            .then(function (data) {
                Signin.city = data.data;

               
                

            
            
            });

        },
        register:function(){
            if(Signin.data.phone_number!=='' && Signin.data.first_name!=='' && Signin.data.last_name!=='' && Signin.data.password!==''){
                axios.post("{{route('register_front')}}", Signin.data).then(function (response) {                      
                  
                        Swal.fire(
                            'Success',
                            'Registered',
                            'success'
                        ).then((value) => {
                            window.location.href = "{{route('shop')}}"
                        });
                    
                }).catch(function (error) {
                    console.log(error);    
                });
            }else{
                Swal.fire(
                    'Error',
                    'Please Fill The Column ',
                    'error'
                )
            }
         

        }
    },
    created: function () {
		axios.get("{{route('get_provinsi')}}")
        
        .then(function (data) {
            Signin.provinsi = data.data;

           
        
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

	

