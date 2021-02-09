function SaveWarning(){
    var id          =$('#id').val();
    var a           = {};
    a.id_menu       = $('#id_menu').val();
    a.sub_menu_name = $('#sub_menu_name').val();
    a.url           = $('#url').val();
    var url_save    = $('#url_save').val() ;
    var url         = url_save+id+"&data="+'['+JSON.stringify(a)+']';
    AlertCheck('Apakah anda Yakin Menyimpan Data Ini?',url);
}

function back()
{
    var url_back=$('#url_back').val() ;
    location.href=url_back;
}