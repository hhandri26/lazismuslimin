var review_detail_transaction = new Vue({
    el: '#review_detail_transaction',
    data: {
        selected :{},
        details:[]
    },
    methods: {
        
        openModal: function (id) {

            axios.get(BASE_URL+'/review_detail_transaction?id='+id)
            .then(function(resp){
                if(resp.status==200){
                    console.log(resp.data);
                    review_detail_transaction.details = resp.data;
                    $(review_detail_transaction.$el).modal('toggle');
                }
            })
            
        }
    },
    template: `
    <div class="modal-lg  modal fade" role="dialog">
        <div class="modal-dialog" style="width:800px">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Detail Transaction</h4>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Sub Total</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="data in details">
                                    <td>{{data.product_name}}</td>
                                    
                                    <td>{{data.qty}}</td>
                                    <td tyle="text-align:right">{{data.harga}}</td>
                                    <td tyle="text-align:right">{{data.sub_total}}</td>
                                   
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    
        </div>
    </div>
    `
});
