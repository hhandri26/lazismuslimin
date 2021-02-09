function SaveWarning(){
    var id          = $('#id').val();
    var a           = {};
    var url_save    = $('#url_save').val();
    a.menu          = $('#menu').val();
    a.icon          = $('#icon').val();
    a.no_urut       = $('#no_urut').val();
    var url         = url_save+id+"&data="+'['+JSON.stringify(a)+']';
    AlertCheck('Apakah anda Yakin Menyimpan Data Ini?',url);
}

function back()
{
    var url_back=  $('#url_back').val();
    location.href=url_back;
}