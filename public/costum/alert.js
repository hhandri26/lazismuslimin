function AlertCheck(text,url){
	 swal({
                title: 'Apakah Anda Yakin',
                text: text,
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Save!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                buttonsStyling: false
            }).then(function () {
                CrudAjax(url);
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

function AlertCheckAxios(text,url_save,data){
    swal({
               title: 'Apakah Anda Yakin',
               text: text,
               type: 'warning',
               showCancelButton: true,
               confirmButtonText: 'Ya, Save!',
               cancelButtonText: 'No, cancel!',
               confirmButtonClass: 'btn btn-success',
               cancelButtonClass: 'btn btn-danger m-l-10',
               buttonsStyling: false
           }).then(function () {
               CrudAxios(url_save, data);
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

function AlertCheckAxiosCustom(text,url_save,data){
    swal({
               title: 'Apakah Anda Yakin',
               text: text,
               type: 'warning',
               showCancelButton: true,
               confirmButtonText: 'Ya, Save!',
               cancelButtonText: 'No, cancel!',
               confirmButtonClass: 'btn btn-success',
               cancelButtonClass: 'btn btn-danger m-l-10',
               buttonsStyling: false
           }).then(function () {
               CrudAxiosCustom(url_save, data);
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

function Alert(salert,msg){
	swal(
            {
                title 				:salert,
                text 				:msg,
                type 				:salert,
                confirmButtonColor 	:'#4fa7f3'
            }
        )
}

function AlertRequire(sField,sName){
    var sVal = document.getElementById(sField);
    if(sVal.value==""|| sVal.value=="0"){
        Alert('warning',sName+' belum di isi !');
        return false;
    }else{
        return true;
    }
}

function AlertUpload(text,url,url_upload,obj_id){
     swal({
                title: 'Apakah Anda Yakin',
                text: text,
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Save!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                buttonsStyling: false
            }).then(function () {
                CrudUpload1(url,url_upload,obj_id);
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