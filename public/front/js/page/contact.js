var Contact = new Vue({
    el: '#Contact',
    data: {
        contact:[]

    },
    methods: {
    },
    created: function () {
        axios.get('contact_info', optionAxiosPublic)
        .then(function (data) {
            Contact.contact = data.data.data;
        });
    },
    mounted: function () {  
    },
    updated: function () {
    },
    watch: {

    }
})