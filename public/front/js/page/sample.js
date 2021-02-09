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
            axios.get('get_size_product?id='+id, optionAxiosPublic)
            .then(function (data) {
                sample.size = data.data.data;
    
            });

        },
        get_city:function(){
            sample.city=[];
            var id = sample.province_id;
            axios.get('get_city?provinsi_id='+id, optionAxiosPublic)
            .then(function (data) {
                sample.city = data.data;

            
            
            });

        },
        request:function(){
            if(sample.address!=='' && sample.province_id!=='' && sample.city_id!=='' && sample.product_id!=='' && sample.size_id!==''){
                var dat = {
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
                axios.post('request_sample', dat, optionAxiosPublic).then(function (response) {                      
                  
                       
                        Swal.fire(
                            'Success',
                            'Request Sent',
                            'success'
                        ).then((value) => {
                            window.location.href = "shop.html"
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
        axios.get('get_provinsi', optionAxiosPublic)
        .then(function (data) {
            sample.provinsi = data.data;

           
        
        });
        axios.get('product', optionAxiosPublic)
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
                window.location.href = "login.html"
               
            });

        }else{

        }
    },
    updated: function () {
    },
    watch: {

    }
})