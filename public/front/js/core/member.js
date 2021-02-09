var member = new Vue({
    el: '#member',
    data: {
        lang:null,
        page:'',
        member_id:localStorage.getItem("member_id"),
        member_name:localStorage.getItem("member_name"),
        member_email:localStorage.getItem("member_email"),
        member_foto_profile:localStorage.getItem("member_foto_profile"),

    },
    computed: {
        
    },
    methods: {
    
        
    },
    created: function () {
    },
    mounted: function () {  
        var member_id = localStorage.getItem("member_id");
        var route = $('#member').val();
        if(member_id==null){
            Swal.fire(
                'Harus Login',
                'Silahkan Login / Register Untuk Melanjutkan',
                'error'
            ).then((value) => {
                window.location.href = route
               
            });

        }else{
          

        }
        
      
       
    },
    updated: function () {
    },
    watch: {

    },
  
});

function logout(){
    localStorage.clear();
    window.location.href="";
}

