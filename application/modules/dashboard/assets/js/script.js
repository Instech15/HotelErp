function editinfo(id){
	'use strict';
	   var geturl=$("#url_"+id).val();
	   var myurl =geturl+'/'+id;
	    var dataString = "id="+id;
		 $.ajax({
		 type: "GET",
		 url: myurl,
		 data: dataString,
		 success: function(data) {
			 $('.editinfo').html(data);
			  $('select').selectpicker();
			 $('#edit').modal('show');
		 } 
	});
	}
//banner edit
function editbanner(id){
    'use strict';
    var baseurl = $('#base_url').val();
    var myurl = baseurl+'dashboard/web_setting/updateintfrm/'+id;
     var dataString = "id="+id;
      $.ajax({
      type: "GET",
      url: myurl,
      data: dataString,
      success: function(data) {
          $('.editbanner').html(data);
          $('#edit').modal('show');
      } 
 });
 }
 //coupon edit
 var loadFile2 = function(event) {
	 'use strict';
   var output = document.getElementById('output2');
   output.src = URL.createObjectURL(event.target.files[0]);
 };
 //backup and restore
$(document).ready(function(){
	'use strict';
    var form     = $("#brFrm");  
    var message  = $("#message");

    //upload process
    form.on('submit', function(e) {
        e.preventDefault(); 

        var x = confirm('<?php echo display("are_you_sure") ?>');
        if (!x) return false; 
        $.ajax({
            url     : $(this).attr('action'),
            method  : $(this).attr('method'),
            dataType: 'json', 
            data    : $(this).serialize(), 
            beforeSend:function()
            {
                message.html('<i class="ti-settings fa fa-spin"></i> <?php echo display("please_wait") ?>').removeClass('hide').addClass('alert-info');  
            }, 
            success:function(data) 
            {
                if (data.success) {
                    message.html('<i class="fa fa-check"></i> '+data.success).removeClass('alert-info').removeClass('alert-danger').addClass('alert-success'); 
                } else {
                   message.html('<i class="fa fa-times"></i> '+data.error).removeClass('alert-success').removeClass('alert-info').addClass('alert-danger');  
                } 
                setTimeout(function(){
                    location.reload();
                }, 3000);
            }, 
            error: function()
            {
                message.html('<i class="fa fa-times"></i> <?php echo display("ooops_something_went_wrong") ?>').removeClass('alert-success').removeClass('alert-info').addClass('alert-danger');
                setTimeout(function(){
                    location.reload();
                }, 3000);
            }
        });   
    });
 
});

//sms/form
'use strict';
$("form :input").attr("autocomplete", "off");

//select full module permission
"use strict";
$('.allcheck').click(function(event) {
    var acname = $(this).attr('title');
    var mid = $(this).attr('usemap');
    var myclass = acname + '_' + mid;
    $("." + myclass).prop('checked', $(this).prop("checked"));
});
(function ($) {
    "use strict";
    $(document).ready(function () {

$("body").on('click', '.allchecks', function () {
    var acname = $(this).attr('title');
    var mid = $(this).attr('usemap');
    var myclass = acname + '_' + mid;
    $("." + myclass).prop('checked', $(this).prop("checked")); });

 });
}(jQuery));