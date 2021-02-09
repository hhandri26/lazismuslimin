var CSRF_TOKEN  = $('meta[name="csrf-token"]').attr('content');
var BASE_URL  = $('meta[name="base-url"]').attr('content');



function readURL(input) { 
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profile-pre').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#profile-id").change(function(){
    readURL(this);
});



function CrudAjax(url){
	
  	var CSRF_TOKEN  = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: url,
            type: 'POST',
            data: {_token: CSRF_TOKEN},
            dataType: 'JSON',
            success: function (R) {
                if (R.msg_type=='success'){
                    Alert(R.msg_type,R.msg);
                    window.location.href = R.refresh;
                }else{
                    Alert(R.msg_type,R.msg);
                }

            }

        });
    	
}

function CrudAjax2(url){
	
    var CSRF_TOKEN  = $('meta[name="csrf-token"]').attr('content');
    var formData    = $('#formData').serialize();
      $.ajax({
          url: url,
          type: 'POST',
          data: {_token: CSRF_TOKEN, data:formData},
          dataType: 'JSON',
          success: function (R) {
              if (R.msg_type=='success'){
                  Alert(R.msg_type,R.msg);
                  window.location.href = R.refresh;
              }else{
                  Alert(R.msg_type,R.msg);
              }

          }

      });
      
}


function CrudUpload1(url, url_upload, obj_id){
    var CSRF_TOKEN  = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: url,
            type: 'POST',
            data: {_token: CSRF_TOKEN},
            dataType: 'JSON',
             success: function (R) {
                if (R.msg_type=='success'){
                    var prefik  =R.sid;
                    upload(obj_id,prefik, url_upload);
                }else{
                    Alert(R.msg_type,R.msg);
                }

            }

        });
}

function upload(obj_id,prefik,url_upload){
        var form_data   = new FormData();
        var url         =url_upload+'&prefik='+prefik;
        var img         =document.getElementById(obj_id);
        var files       =img.files;
        var i           =0;
        var n           =1;
        var CSRF_TOKEN  = $('meta[name="csrf-token"]').attr('content');
        while ( i < files.length) {
            var file = files[i];        
            form_data.append('file[]', files[i]);
            i++;
            n++;
        }
        form_data.append('_token', CSRF_TOKEN);
        if (i>0){
            $.ajax({
                url: url,
                data: form_data,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (R) {
                    Alert(R.msg_type,R.msg);
                    if (R.msg_type!='error'){
                        Alert(R.msg_type,R.msg);
                        window.location.href = R.refresh;
                    }
                   
                 },
                error: function (request, status, error) {Alert(R.msg_type,R.msg);}
            });     
            
        }
        return n   
    }

function CrudAxios(url_save, data){
    axios.post(url_save, data).then(function(resp){
        if(resp.status==200){
            if(resp.data.status==200){
                Alert(resp.data.msg_type,resp.data.msg);
                window.location.href=resp.data.refresh;
            }
        }
    }).catch(function(err){
            console.log(err);
        })
}

Vue.use(VueNumeric.default);
Vue.use(VueClipboard);
if(typeof vuejsDatepicker !== 'undefined'){
	Vue.component('vuejsDatepicker', vuejsDatepicker);
}



