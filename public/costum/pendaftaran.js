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

function back(){
    var url      = $('#back').val();
    location.href=url;
}

var ajaxku      =buatajax();
function ajaxkota(id){
  var url_kota              = $('#getkab').val();
  var url                   = url_kota+id;
  ajaxku.onreadystatechange = stateChanged;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}

function ajaxkec(id){
  var url_kec               = $('#getkec').val();
  var url                   = url_kec+id;
  ajaxku.onreadystatechange = stateChangedKec;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}

function ajaxkel(id){
  var url_kel               = $('#getkel').val();
  var url                   = url_kel+id;
  ajaxku.onreadystatechange = stateChangedKel;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}

function buatajax(){
  if (window.XMLHttpRequest){
    return new XMLHttpRequest();
  }
  if (window.ActiveXObject){
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
  return null;
}
function stateChanged(){
  var data;
  if (ajaxku.readyState==4){
    data    =ajaxku.responseText;
    if(data.length>=0){
      document.getElementById("kota").innerHTML = data
    }else{
      document.getElementById("kota").value = "<option selected>Pilih Kota/Kab</option>";
    }
  }
}

function stateChangedKec(){
  var data;
  if (ajaxku.readyState==4){
    data    =ajaxku.responseText;
    if(data.length>=0){
      document.getElementById("kec").innerHTML = data
    }else{
      document.getElementById("kec").value = "<option selected>Pilih Kecamatan</option>";
    }
  }
}

function stateChangedKel(){
  var data;
  if (ajaxku.readyState==4){
    data    =ajaxku.responseText;
    if(data.length>=0){
      document.getElementById("kel").innerHTML = data
    }else{
      document.getElementById("kel").value = "<option selected>Pilih Kelurahan/Desa</option>";
    }
  }
}

var ajak_jadwal = get_jadwal();

function ajaxkursus(id){
  var url_jadwal            = $('#getjadwal').val();
  var url                   = url_jadwal+id;
  ajak_jadwal.onreadystatechange = stateChangedjadwal;
  ajak_jadwal.open("GET",url,true);
  ajak_jadwal.send(null);
}

function get_jadwal(){
    if (window.XMLHttpRequest){
    return new XMLHttpRequest();
  }
  if (window.ActiveXObject){
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
  return null;
}

function stateChangedjadwal(){
    var data;
    if (ajak_jadwal.readyState==4){
    data    =ajak_jadwal.responseText;
    if(data.length>=0){
      document.getElementById("id_jadwal").innerHTML = data
    }else{
      document.getElementById("id_jadwal").value = "<option selected>Pilih Kota/Kab</option>";
    }
  }
}


function CheckInput(){
    if(AlertRequire("name","nama") && AlertRequire("email","Email") && AlertRequire("no_identitas","Nomor Identitas") && AlertRequire("phone","Nomor Telephone") && AlertRequire("prop","Provinsi") && AlertRequire("kota","Kota") && AlertRequire("kec","Kecamatan") && AlertRequire("kel","Kelurahan") && AlertRequire("alamat","Alamat") && AlertRequire("id_kursus","Jenis Kursus") && AlertRequire("id_jadwal","Jadwal Kursus") && AlertRequire("profile-pre","Upload Foto 3X4")){
        SaveWarning();
    }
}

function SaveWarning(){
    var a           = {};
    a.nama          = $('#name').val();
    a.email         = $('#email').val();
    a.no_identitas  = $('#no_identitas').val();
    a.phone         = $('#phone').val();
    a.prop          = $('#prop').val();
    a.kota          = $('#kota').val();
    a.kec           = $('#kec').val();
    a.kel           = $('#kel').val();
    a.alamat        = $('#alamat').val();
    a.id_kursus     = $('#id_kursus').val();
    a.id_jadwal     = $('#id_jadwal').val();
    // url
    var url_save        = $('#url_save').val();
    var url_upload_user = $('#url_upload').val();

    // config Upload
    var folder      = 'peserta';//folder untuk input gambar
    var table       = 'users';//table database
    var field_name  = 'foto';//nama field database yang akan di input
    var url         =  url_save+'['+JSON.stringify(a)+']';//url input data
    var obj_id      = 'profile-id';//nama id file input gambar/file
    var refresh     = 'daftar';// url untuk reload page setelah input data
    var url_upload  = url_upload_user+folder+'&table='+table+'&field_name='+field_name+'&refresh='+refresh;//url upload file
    AlertUpload('Apakah anda Yakin Menyimpan Data Ini?',url,url_upload,obj_id);
}
