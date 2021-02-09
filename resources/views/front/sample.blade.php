@extends('layouts.home')

@section('content')

<div id="sample">
			
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
					<!-- - -->
					<h4 class="txt13 m-b-33" style="color:#d2a2a2;">
						Sample Request Form
					<hr class="onepixel">	
					</h4>
						<form action="/action_page.php" style="font-family: gotham-book; font-size:13px;">
						
						Address:<br>
						<input type="text" v-model="address" style="width: 100%;">
						<br>
						Province:<br>
						<v-select v-model="province_id" @input="get_city()" :options="provinsi" :reduce="x => x.province_id"  label="province"></v-select>   
						<br>
						City:<br>
						<v-select v-model="city_id" :options="city" :reduce="x => x.city_id"  label="city_name"></v-select>   
						<br>
						Model:<br>
						<v-select v-model="product_id" :options="product" @input="get_size()" :reduce="x => x.id"  label="title"></v-select>  
						<br>
						Size:<br>
						<select  v-model="size_id" class="select_style" style="width: 100%;" >
							<option v-for="row in size" :value="row.id" > @{{ row.panjang }} cm X @{{row.lebar}} cm X @{{row.tinggi}} </option>
						</select>
						
						<br>
						Notes:<br>
						<textarea v-model="note" cols="10" rows="10" class="form-control"></textarea>
						<br>
						

						<button type="button" @click="request()" > Submit</button>
						</form>
						
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
var sample = new Vue({
    el: '#sample',
    data: {
        data:{
            email:'',
            phone_number:'',
            first_name:'',
            last_name:'',
            password:''

        },
        provinsi:[],
        city:[],
        province_id:'',
        city_id:'',
        product:[],
        size:[],
        product_id:'',
        size_id:'',
        address:'',
        note:''
       

    },
    methods: {
        get_size:function(){
            var id = sample.product_id;
            axios.get("{{route('get_size_product_front')}}?id="+id, optionAxiosPublic)
            .then(function (data) {
                sample.size = data.data.data;
    
            });

        },
        get_city:function(){
            sample.city=[];
            var id = sample.province_id;
            axios.get("{{route('get_city_front')}}?provinsi_id="+id, optionAxiosPublic)
            .then(function (data) {
                sample.city = data.data;

            
            
            });

        },
        request:function(){
            if(sample.address!=='' && sample.province_id!=='' && sample.city_id!=='' && sample.product_id!=='' && sample.size_id!==''){
                var dat = {
					_token: $('meta[name="csrf-token"]').attr('content'),
                    id_product : sample.province_id,
                    id_size    : sample.size_id,
                    province     :_.filter(sample.provinsi, function (o) {
                        return o.province_id == sample.province_id;
                    })[0].province, 
                    city       :_.filter(sample.city, function (o) {
                        return o.city_id == sample.city_id;
                    })[0].city_name, 
                    id_member : localStorage.getItem("member_id"),
                    address : sample.address,
                    note : sample.note

                };
                axios.post("{{route('request_sample_front')}}", dat).then(function (response) {                      
                  
                       
                        Swal.fire(
                            'Success',
                            'Request Sent',
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
        axios.get("{{route('get_provinsi')}}", optionAxiosPublic)
        .then(function (data) {
            sample.provinsi = data.data;

           
        
        });
        axios.get("{{route('product_front')}}", optionAxiosPublic)
        .then(function (data) {
            sample.product = data.data.data;

           
        
        });
    },
    mounted: function () {  
        var member_id = localStorage.getItem("member_id");
        if(member_id==null){
            Swal.fire(
                'error',
                'Please Login',
                'error'
            ).then((value) => {
                window.location.href = "{{route('login_member')}}"
               
            });

        }else{

        }
    },
    updated: function () {
    },
    watch: {

    }
})
</script>

@endsection
	
