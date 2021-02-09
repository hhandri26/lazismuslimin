var url_select = $('#select_menu_url').val();
$('#select_menu').select2({
    
    multiple                : true,
    allowClear              : true,
    placeholder             : "Ketik Nama Menu",
    ajax                    : {
                                url      : url_select,
                                dataType : 'json',
                                data     : function (term, page) {return { q: term }; },
                                results  : function (data, page) {return { results: data }; }
                            }
});
$('.rcheck').iCheck({
checkboxClass: 'icheckbox_flat-green',
radioClass: 'iradio_square-green',
increaseArea: '20%' // optional
  });
    function SaveWarning(){
        var id              = $('#id').val();
        var a               = {};
        a.name              = $('#name').val();
        a.email             = $('#email').val();
        a.password          = $('#password').val();
        a.phone             = $('#phone').val();
        var r3              = $("input[name='active']:checked").val();
        a.active            = r3;
        a.select_menu       = $('#select_menu').val();
        var url_save        = $('#url_save').val();
        var url             = url_save+id;
       // AlertCheck('Apakah anda Yakin Menyimpan Data Ini?',url);
        var data        = $('#formData').serialize();
        if(AlertRequire("name","Nama ")  && AlertRequire("email",'Email') && AlertRequire("password",'Password') )
        {
            AlertCheckAxios('Apakah anda Yakin Menyimpan Data Ini?',url,data);
        }
    }

    function back()
    {
        var url_back = $('#url_back').val();
        location.href=url_back;
    }

    function removeSpaces(string) {
        return string.split(' ').join('');
       }
       function removeSpaces2(string) {
        return string.split(' ').join('');
       }

   
   


    function deleted(sid){     
    var url_dlt_prv = $('#delete_prv').val();
    var url         = url_dlt_prv+sid;
    swal({
            title: 'Apakah Anda Yakin',
            text: 'Akan Menghapus Data Ini?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Save!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            buttonsStyling: false
        }).then(function () {
            deleted_prv(url);
        },function (dismiss) {
            if (dismiss === 'cancel') {
                swal(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    
  }

  function deleted_prv(url){

    var CSRF_TOKEN  = $('meta[name="csrf-token"]').attr('content');
    var url_edit    = $('#delete_prv').val();
        $.ajax({
            url: url,
            type: 'POST',
            data: {_token: CSRF_TOKEN},
            dataType: 'JSON',
            success: function (R) {
                if (R.msg_type=='success'){
                    Alert(R.msg_type,R.msg);
                    window.location.href ='';
                }else{
                    Alert(R.msg_type,R.msg);
                }

            }

        });
  }