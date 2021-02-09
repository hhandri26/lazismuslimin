$(document).ready(function() {
    var url       =$('#get_list').val();
    var oTable    = $('#user').DataTable( {
       ajax: {
          url: url,
        },              
      scrollX: true,
          "sScrollX"                  :"100%",
          scrollCollapse              : true,
          "bCaseInsensitive"          : true,        
          "bCaseInsensitive"          : true,
          "bJQueryUI"                 : true,
          "sPaginationType"           : "full_numbers", 
          "aLengthMenu"               : [[5,10, 20, 50, 100, -1], [5,10, 20, 50, 100, "All"]], 
          "aaSorting"                 : [[1, "asc"]], 
          "bAutoWidth"                : false, "iDisplayLength": 10, "bCaseInsensitive": true,   
          "fnRowCallback"             : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                $('td:eq(0)', nRow).addClass( "hide" );
                $.contextMenu({
                 selector     : '#user tbody tr',
                 callback     : function (key, options) {
                     var pos  = $(this).parent().index();
                     var m    = "global: " + key;
                 },
                 items: {                 
                     "edit"   : {
                                 name   : "Edit",
                                 icon   : "edit",
                                callback: function (key, options) {
                                var sid = $(this).children(":eq(0)").text();
                                edit(sid); 
                         }
                     },               
                    
                     "delete": {
                                 name   : "Delete",
                                 icon   : "delete",
                                callback: function (key, options) {
                                var sid = $(this).children(":eq(0)").text();
                                var snm = $(this).children(":eq(2)").text();
                                deleted(sid);
                         }
                     },
                     "sep3": "---------",
                     "quit": { name: "Quit", icon: "quit" }
                 }
             });
         }, 
                 
       "columns": [
        { "data": "id"  },
        { "data": "id","width":"10%","render": function(data, type, row,meta) {return meta.row + meta.settings._iDisplayStart + 1 ;}},
        { "data": "name" },
        { "data": "username" },
        { "data": "email" },
        { "data": "phone" },
        { "data": "active" },
        { "data": "name_role" }
        ],
      });
      
  });

  function edit(sid){
    var url_edit = $('#edit').val();
    location.href=url_edit+sid;
  }

  function deleted(sid){
    var url_delete  =  $('#delete').val();      
    var url         = url_delete+sid+"&table=users&refresh=user_table";
    AlertCheck('Apakah anda Yakin Menghapus Data Ini?',url);
}