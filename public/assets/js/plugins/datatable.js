(function ($) {
	"use strict";

  var init = function(){

    if($.fn.dataTable.isDataTable("#datatable")){        
        $("#datatable").DataTable().destroy();
        $("#datatable").dataTable({
           // ... skipped ...
        });

    }else{
      $('#datatable').dataTable({
      });
    }
    
  }

  // for ajax to init again
  $.fn.dataTable.init = init;

})(jQuery);
