function edit(sid){
    var url_edit = $('#edit').val() ;
    location.href=url_edit+sid;
  }
  function deleted(sid){    
    var url_delete =$('#delete').val() ;   
    var url   = url_delete+sid+"&table=t_menu&refresh=menu_table";
    AlertCheck('Apakah anda Yakin Menghapus Data Ini?',url);
}