var Login = new Vue({
    el: '#Login',
    data: {
        email:'',
        password:''

    },
    methods: {
        login:function(){
            if(Login.email!=='' && Login.password!==''){
                axios.post('login_vue', {
                    username: Login.email,
                    password: Login.password
                  }, optionAxiosPublic).then(function (response) {      
                      if(response.status == 200){
                        localStorage.setItem("member_id",response.data.data.id);
                        localStorage.setItem("member_name",response.data.data.first_name);
                        Swal.fire(
                            'Success',
                            'Login Success',
                            'success'
                        ).then((value) => {
                            window.location.href = "shop.html"
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