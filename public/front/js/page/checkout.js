var Checkout = new Vue({
    el: '#Checkout',
    data: {
        cart:[],
        provinsi:[],
        city:[],
        district:[],
        province_id:'',
        city_id:'',
        sub_total:0,
        address:'',
        price_ongkir:'',
        district_id:'',
        pay:{
            first_name:'',
            last_name:'',
            email:'',
            phone_number:'',
            address:'',

        },
        kurir:[
            {
                id:'jne',
                text:'JNE'
            },
            {
                id:'jnt',
                text:'J&T'
            },
            {
                id:'tiki',
                text:'TIKI'
            },
            
            // {
            //     id:'deliveree',
            //     text:'Deliveree'
            // },
        ],
        kurir_id:'',
        cost:[]

    },
    computed: {
        count_cart:function(){
            var count = 0;
            var cart =JSON.parse(localStorage.getItem("cart"));
            if(cart!==null){
                count = cart.length
            }
            return count;

        },
        count_weight:function(){
            var berat   = (this.cart.reduce((acc, item) => acc + (item.qty * item.berat),0) ) / 10 ;
            return berat;

        },
        count_sub_total:function(){
            var total   = (this.cart.reduce((acc, item) => acc + (item.sub_total * 1),0) ) ;
            this.sub_total = total;
            return total;

        }
    },
    methods: {
        payment:function(){
            if(Checkout.price_ongkir!==0){
            var dat ={
                first_name:Checkout.pay.first_name,
                last_name:Checkout.pay.last_name,
                amount:Checkout.count_sub_total+ Checkout.price_ongkir,
                address:Checkout.pay.address,
                note:Checkout.pay.first_name,
                email:Checkout.pay.email,
                qty:Checkout.cart.reduce((acc, item) => acc + (item.qty * 1),0) ,
                phone:Checkout.pay.phone_number,
                amount_shipping:Checkout.price_ongkir,
                courier:Checkout.kurir_id,
                detail:Checkout.cart
            }
            axios.post('create_transaction', dat, optionAxiosPublic).then(function (response) {                      
                if(response.status==200){
                    snap.pay(response.data.snap_token, {
                        // Optional
                        onSuccess: function (result) {
                            
                            localStorage.removeItem("cart");
                            Swal.fire(
                                'Success',
                                'Item add to cart',
                                'success'
                            ).then((value) => {
                                window.location.href = "shop.html"
                            });
                            location.reload();
                        },
                        // Optional
                        onPending: function (result) {
                            localStorage.removeItem("cart");
                            Swal.fire(
                                'Success',
                                'Item add to cart',
                                'success'
                            ).then((value) => {
                                window.location.href = "shop.html"
                            });
                            location.reload();
                        },
                        // Optional
                        onError: function (result) {
                            location.reload();
                        }
                    });

                }
            }).catch(function (error) {
                console.log(error);    
            });
        }else{
            Swal.fire(
                'Error',
                'Please Choose Delivery ',
                'error'
            )
        }

        },
        get_city:function(){
            Checkout.city=[];
            var id = Checkout.province_id;
            axios.get('get_city?provinsi_id='+id, optionAxiosPublic)
            .then(function (data) {
                Checkout.city = data.data;

            
            
            });

        },
        get_disctict:function(){
            Checkout.city=[];
            var id = Checkout.city_id;
            axios.get('get_disctict?city_id='+id, optionAxiosPublic)
            .then(function (data) {
                Checkout.district = data.data;

            
            
            });

        },
        count_price:function(){
            var id_kurir= Checkout.kurir_id;
            if(id_kurir =='deliveree'){
                $('#exampleModal2').modal('show');
                $('#exampleModal').modal('hide');

            }else{
                var origin  = 151;
                var des     = Checkout.district_id;
                var berat   = this.count_weight * 1000;
                axios.get('get_tarif?id_kurir='+id_kurir+'&origin='+origin+'&des='+des+'&berat='+berat, optionAxiosPublic)
                .then(function (data) {
                    $.each(data.data, function(i,field){
                        Checkout.cost = field.costs;

                    })
                
               

            
            
                });
            

            }   
            

        }
    },
    created: function () {
        axios.get('get_provinsi', optionAxiosPublic)
        .then(function (data) {
            Checkout.provinsi = data.data;

           
        
        });
    },
    mounted: function () {  
        var cart = JSON.parse(localStorage.getItem("cart"));
        
            Object.entries(cart).forEach(([key, val]) => {
                axios.get('detail_product?id='+val.product_id, optionAxiosPublic)
                .then(function (data) {
                    var gambar = data.data.header.img;
                    var title = data.data.header.title;
                    var dat = {
                        img:gambar,
                        title:title,
                        qty:val.qty,
                        p:val.p,
                        l:val.l,
                        t:val.t,
                        berat:val.berat * val.qty,
                        harga:val.harga,
                        sub_total:val.harga * val.qty,
                        product_id:val.product_id
                    }
                    Checkout.cart.push(dat);
                
                });
            
                
            });
        
    },
    updated: function () {
    },
    watch: {

    }
});



//   function initAutocomplete() {
//     var map = new google.maps.Map(document.getElementById('map'), {
//       center: {lat: -6.200000, lng: 106.816666},
//       zoom: 13,
//       mapTypeId: 'roadmap'
//     });

//     // Create the search box and link it to the UI element.
//     var input = document.getElementById('pac-input');
//     var searchBox = new google.maps.places.SearchBox(input);
//     map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

//     // Bias the SearchBox results towards current map's viewport.
//     map.addListener('bounds_changed', function() {
//       searchBox.setBounds(map.getBounds());
//     });

//     var markers = [];
//     // Listen for the event fired when the user selects a prediction and retrieve
//     // more details for that place.
//     searchBox.addListener('places_changed', function() {
//       var places = searchBox.getPlaces();

//       if (places.length == 0) {
//         return;
//       }

//       // Clear out the old markers.
//       markers.forEach(function(marker) {
//         marker.setMap(null);
//       });
//       markers = [];

//       // For each place, get the icon, name and location.
//       var bounds = new google.maps.LatLngBounds();
//       places.forEach(function(place) {
//         if (!place.geometry) {
//           console.log("Returned place contains no geometry");
//           return;
//         }
//         var icon = {
//           url: place.icon,
//           size: new google.maps.Size(71, 71),
//           origin: new google.maps.Point(0, 0),
//           anchor: new google.maps.Point(17, 34),
//           scaledSize: new google.maps.Size(25, 25)
//         };

//         // Create a marker for each place.
//         markers.push(new google.maps.Marker({
//           map: map,
//           icon: icon,
//           title: place.name,
//           position: place.geometry.location
//         }));

//         if (place.geometry.viewport) {
//           // Only geocodes have viewport.
//           bounds.union(place.geometry.viewport);
//         } else {
//           bounds.extend(place.geometry.location);
//         }
//       });
//       map.fitBounds(bounds);
//     });
//   }