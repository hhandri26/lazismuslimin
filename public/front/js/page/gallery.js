var Gallery = new Vue({
    el: '#Gallery',
    data: {
        gallery:[]

    },
    methods: {
    },
    created: function () {
        axios.get('gallery', optionAxiosPublic)
        .then(function (data) {
            Gallery.gallery = data.data.data;
        });
    },
    mounted: function () {  
    },
    updated: function () {
    },
    watch: {

    }
})