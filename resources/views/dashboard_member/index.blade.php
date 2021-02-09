@extends('layouts.home')

@section('content')
        
<section class="section-intro" style="padding-top: 90px">
    <div class="content-intro bg-white p-t-77 p-b-133">
        <div class="container">
            <div class="header-intro">
                
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4"></div>

                <div class="col-sm-4 col-md-4 p-t-50">
                    <div class="col-md-12">
                        
                        <form class="form-horizontal" id="Profile">
                            {{csrf_field()}}

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">First Name</label>
                                        <input type="text" class="form-control"  style="width: 100%; border: 1px solid rgba(0,0,0,.15) !important;" v-model="dat.first_name">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Last Name</label>
                                        <input type="text" class="form-control"  style="width: 100%; border: 1px solid rgba(0,0,0,.15) !important;" v-model="dat.last_name">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="text" class="form-control" readonly="" style="width: 100%; border: 1px solid rgba(0,0,0,.15) !important;" v-model="dat.email">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone Number</label>
                                        <input type="text" class="form-control"  style="width: 100%; border: 1px solid rgba(0,0,0,.15) !important;" v-model="dat.phone_number">
                                        
                                    </div>
                           
                            
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Provinsi</label>
                                        <v-select v-model="dat.province_id" @input="get_city()" :options="provinsi" :reduce="x => x.province_id"  label="province"></v-select>   
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">City</label>
                                        <v-select v-model="dat.city_id" @input="get_disctict()" :options="city" :reduce="x => x.city_id"  label="city_name"></v-select>   
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="exampleInputEmail1">District</label>
                                        <v-select v-model="district_id" :options="district" :reduce="x => x.id"  label="name"></v-select>   
                                    </div> -->
                                
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Address</label>
                                        <textarea  class="form-control" v-model="dat.address" style="width: 100%;"></textarea>
                                        
                                    </div>
                                    <button type="button" @click="update_profile()" class="btn btn-info" > Update Profile</button>
                              
                            
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    
@endsection
@section('more_js')
<script src="{{asset('public/front/')}}/vendor/sweetalert/sweetalert.min.js"></script>
<script>
var Profile = new Vue({
    el: '#Profile',
    data: {
        cart:[],
        provinsi:[],
        city:[],
        district:[],
        province_id:'',
        city_id:'',
        address:'',
        price_ongkir:'',
        district_id:'',
        dat:{
            first_name:'',
            last_name:'',
            email:'',
            phone_number:'',
            address:'',
            province_id:'',
            city_id:'',
            address:'',
            _token: $('meta[name="csrf-token"]').attr('content'),

        },

    },
    computed: {
       
    },
    methods: {
       
        get_city:function(){
            Profile.city=[];
            var id = Profile.dat.province_id;
            axios.get( "{{ route('get_city_front')}}?provinsi_id="+id)
            .then(function (data) {
                Profile.city = data.data;

               
                

            
            
            });

        },
        get_disctict:function(){
            Profile.city=[];
            var id = Profile.dat.city_id;
            axios.get("{{route('get_disctict_front')}}"+'?city_id='+id)
            .then(function (data) {
                Profile.district = data.data;

            
            
            });

        },
        update_profile:function(){
            if(Profile.dat.email!=='' && Profile.dat.phone_number!=='' && Profile.dat.first_name!=='' && Profile.dat.last_name!=='' && Profile.dat.password!==''){
                axios.post("{{route('update_profile_member')}}", Profile.dat).then(function (response) {                      
                  
                        Swal.fire(
                            'Success',
                            'Save',
                            'success'
                        ).then((value) => {
                            window.location.href = ""
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
        // get provinsi
        axios.get("{{route('get_provinsi')}}")
        .then(function (data) {
            Profile.provinsi = data.data;
        });
       

    },
    mounted: function () {  
        var member_id = localStorage.getItem("member_id");
        if(member_id==null){
            Swal.fire(
                'Harus Login',
                'Silahkan Login / Register Untuk Melanjutkan',
                'error'
            ).then((value) => {
                window.location.href = "{{route('login_member')}}"
               
            });

        }else{
             // get member informasi
            var email = localStorage.getItem("member_email");
            axios.get("{{route('get_member_address')}}?email="+email)
            .then(function (data) {
                Profile.dat.province_id =data.data.data.provinsi_id;
                Profile.dat.city_id =data.data.data.kota_id;
                Profile.dat.address=data.data.data.address;
                Profile.dat.first_name=data.data.data.first_name;
                Profile.dat.last_name=data.data.data.last_name;
                Profile.dat.email=data.data.data.email;
                Profile.dat.phone_number=data.data.data.phone_number;
                Profile.get_city();

            });

        }
 
        
    },
    updated: function () {
    },
    watch: {

    }
});
</script>
@endsection