var ProductDetail = new Vue({
    el: '#ProductDetail',
    data: {
        header:{},
        detail:[],
        ada:false,
        
        data:{
            size:'',
            qty:0,
            harga:'',
            berat:0,
            sub_total:0,
            p:'',
            l:'',
            t:'',
            product_id:''
        },
        items:[],
        master:{
            size:[]
        }

    },
    computed: {
    },
    methods: {
        addToCart:function(){
            if(ProductDetail.data.sub_total!==''){
               
                var existing = JSON.parse(localStorage.getItem("cart"));
                if(existing!== null){
                    var b=[{}];
                    b =JSON.parse(localStorage.getItem("cart")) || [];
                    b.push(ProductDetail.data);
                    localStorage.setItem("cart",JSON.stringify(b));

                }else{
                    localStorage.setItem("cart",JSON.stringify([ProductDetail.data]));

                }
                ProductDetail.data.size='';
                ProductDetail.data.qty='';
                ProductDetail.data.harga='';
                ProductDetail.data.berat='';
                ProductDetail.data.sub_total='';
                ProductDetail.data.p='';
                ProductDetail.data.l='';
                ProductDetail.data.t='';
                ProductDetail.data.product_id='';
                
                Swal.fire(
                    'Success',
                    'Item add to cart',
                    'success'
                ).then((value) => {
                    loading.end();
                    window.location.href = ""
                });


            }
            localStorage.setItem("item_print",JSON.stringify(this.details));

        },
        set_value_size:function(){
            axios.get('get_price_product?id='+ProductDetail.data.size+'&qty='+ProductDetail.data.qty, optionAxiosPublic)
            .then(function (data) {
                ProductDetail.data.p = data.data.data.panjang;
                ProductDetail.data.l = data.data.data.lebar;
                ProductDetail.data.t = data.data.data.tinggi;
                ProductDetail.data.harga = data.data.data.harga;
                ProductDetail.data.berat = data.data.data.berat;
                ProductDetail.data.sub_total = ProductDetail.data.qty * data.data.data.harga;

    
            });

        },
        show_qty:function(){
            var slider = document.getElementById('qty');
            slider.oninput = function() {           
                ProductDetail.data.qty = this.value;
            }

        }
       
    },
    created: function () {
    },
    mounted: function () {
        window.addEventListener('keyup', event => {
            if (event.keyCode === 13) { 
             this.set_value_size();
            }
          });  
        var curId = getParameterByName('id');
        this.data.product_id = curId;
        
        axios.get('detail_product?id='+curId, optionAxiosPublic)
        .then(function (data) {
            ProductDetail.header = data.data.header;
            var no = 0;
            $.each(data.data.detail, function (key, value) {
                no++;
                ProductDetail.detail.push(value);
            })
            if(no>0){
                ProductDetail.ada = true;
            }
        });
        axios.get('get_size_product?id='+curId, optionAxiosPublic)
        .then(function (data) {
            ProductDetail.master.size = data.data.data;

        });
    },
    updated: function () {
    },
    watch: {

    }
})

