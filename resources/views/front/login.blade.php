@extends('layouts.home')

@section('content')
<script src="https://apis.google.com/js/platform.js" async defer></script>
	<div id="Login">
	
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
							Login
						<hr class="onepixel">	
						</h4>
							<form action="signup.php" style="font-family: gotham-book; font-size:13px;">
							  Email Address Or Whatsapp Number :<br>
							  <input type="text" name="email" v-model="email" class="form-control" style="width: 100%; border: 1px solid rgba(0,0,0,.15) !important;">
							  <br>
							  Password:<br>
							  <input type="password" name="password" v-model="password" class="form-control" style="width: 100%; border: 1px solid rgba(0,0,0,.15) !important;">

                              <div class="row">
                                <div class="col-md-12">
                                    <button type="button" @click="login()"> Masuk </button> 
                                </div>
                                <div class="col-md-12">
                                    
                                    <hr>Masuk Dengan google
                                </div>
                                <div class="col-md-12">
                                    <div class="g-signin2" data-width="370" data-onsuccess="onSignIn"></div>
                                </div>
                              </div>
							  <br><br>
							  
                              
							</form>
							<br>
							<p>Don't Have an accouny? <a href="{{route('register_member')}}"><span style="color:#d2a2a2">Click here to sign up</span></a></p>
							<!-- <p style="padding-bottom: 30px;">Forgot Your Password? <span style="color:#d2a2a2">Request a new one.</span></p>  -->
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
var Login = new Vue({
    el: '#Login',
    data: {
        email:'',
        password:''

    },
    methods: {
        login:function(){
            if(Login.email!=='' && Login.password!==''){
                axios.post("{{route('login_vue_front')}}", {
					_token: $('meta[name="csrf-token"]').attr('content'),
                    username: Login.email,
                    password: Login.password
                  }).then(function (response) {      
                      if(response.status == 200){
                        localStorage.setItem("member_id",response.data.data.id);
                        localStorage.setItem("member_name",response.data.data.first_name);
                        localStorage.setItem("member_email",response.data.data.email);
                        localStorage.setItem("member_phone",response.data.data.phone_number);
                        Swal.fire(
                            'Success',
                            'Login Success',
                            'success'
                        ).then((value) => {
                            window.location.href = "{{route('shop')}}"
                        });
                       

                      }else{
                        Swal.fire(
                            'error',
                            'Login Field',
                            'error'
                        ).then((value) => {
                           
                           
                        });

                      }                
                  
                       
                    
                }).catch(function (error) {
					console.log(error); 
					Swal.fire(
                            'error',
                            'Login Field',
                            'error'
                        ).then((value) => {
                           
                           
                        });   
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
    },
    mounted: function () {  
        var member_email = localStorage.getItem("member_email");
        if(member_email==null){
            
        }else{
            window.location.href = "{{route('shop')}}"

        }
    },
    updated: function () {
    },
    watch: {

    }
})

function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);


        localStorage.setItem("member_id" ,profile.getId());
        localStorage.setItem("member_token",googleUser.getAuthResponse().id_token);
        localStorage.setItem("member_name",profile.getName());
        localStorage.setItem("member_email",profile.getEmail());
        localStorage.setItem("member_foto_profile",profile.getImageUrl());
        window.location.href = "{{route('shop')}}"
        
      }
</script>
@endsection

