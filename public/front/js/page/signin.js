var Signin = new Vue({
    el: '#Signin',
    data: {
        data:{
            email:'',
            phone_number:'',
            first_name:'',
            last_name:'',
            password:''

        }
       

    },
    methods: {
        register:function(){
            if(Signin.data.email!=='' && Signin.data.phone_number!=='' && Signin.data.first_name!=='' && Signin.data.last_name!=='' && Signin.data.password!==''){
                axios.post('register', Signin.data, optionAxiosPublic).then(function (response) {                      
                  
                        Swal.fire(
                            'Success',
                            'Registered',
                            'success'
                        )
                    
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
    },
    mounted: function () {  
    },
    updated: function () {
    },
    watch: {

    }
})