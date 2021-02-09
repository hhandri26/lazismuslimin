var Header = new Vue({
    el: '#Header',
    data: {
        lang:null,
        page:'',
        member_id:localStorage.getItem("member_id"),
        member_name:localStorage.getItem("member_name"),
        member_email:localStorage.getItem("member_email"),
        member_foto_profile:localStorage.getItem("member_foto_profile"),

    },
    computed: {
        count_cart:function(){
            var count = 0;
            var cart =JSON.parse(localStorage.getItem("cart"));
            if(cart!==null){
                count = cart.length
            }
            return count;

        }
    },
    methods: {
    
        
    },
    created: function () {
    },
    mounted: function () {  
       
    },
    updated: function () {
    },
    watch: {

    },
  
});

function set_lang(lang){
    localStorage.setItem("lang",lang);
    window.location.href="";
}

function logout(){
    localStorage.clear();
    window.location.href="";
}