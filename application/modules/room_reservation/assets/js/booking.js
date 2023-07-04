"use strict";
var saveall = 0;
var saveone = 1;
var num = 0;
let formatter = new Intl.NumberFormat('en-NG', {
  style: 'currency',
  currency: 'NGN',
  currencyDisplay: 'symbol'
});
$(document).ready(function() {
    "use strict";
    $('#booking_type').on('change', function() {
        var bookingtype = $('#booking_type').find(":selected").val();
        if (bookingtype) {
            $('#booking_source').attr("disabled", false);
            $('.selectpicker').selectpicker('refresh');
        } else {
            $('#booking_source').attr("disabled", true);
            $('#booking_source :nth-child(1)').prop('selected', true);
            $("#commissionrate").val('');
            $('#booking_source').trigger('change');
            $('#commissionrate').trigger('change');
        }
    });
    $('.datefilter').on('change', function() {
        $('#room_type :nth-child(1)').prop('selected', true);
        $('#room_type').trigger('change');
    });
    $('#room_type').on('change', function() {
        var roomtype = $('#room_type').find(":selected").val();
        if(roomtype){
            $('#roomno').attr("disabled", false);
            $('.selectpicker').selectpicker('refresh');
            $('#adults').attr("disabled", false);
            $('#adults').val("");
            $('#children').attr("disabled", false);
            $('#from_date1').attr("disabled", false);
            $('#to_date1').attr("disabled", false);
            $('#rent').attr("disabled", false);
            $('#complementary').attr("disabled", false);
            $("#compamount").attr("hidden",true);
            $('#complementary :nth-child(1)').prop('selected', true);
            $('#addrow').attr("disabled", false);
            $('#discountreason').val('');
            $('#discountreason').trigger('change');
            $('#offer_price').text('');
        }else{
            $('#roomno').attr("disabled", true);
            $('.selectpicker').selectpicker('refresh');
            $('#roomno :nth-child(1)').prop('selected', true);
            $('#adults').attr("disabled", true);
            $('#adults').val(0);
            $('#children').attr("disabled", true);
            $('#children').val(0);
            $('#from_date1').attr("disabled", true);
            $('#to_date1').attr("disabled", true);
            $('#rent').attr("disabled", true);
            $('#complementary').attr("disabled", true);
            $("#compamount").attr("hidden",true);
            $('#complementary :nth-child(1)').prop('selected', true);
            $('#addrow').attr("disabled", true);
            $('#roomno').trigger('change');
            $('#offer_price').text('');
        }
    });

    $('#roomno').on('change', function() {
        var roomno = $('#roomno').find(':selected').val();
        if(roomno){
            $('.selectpicker').selectpicker('refresh');
            $('#from_date2').attr("disabled", false);
            $('#to_date2').attr("disabled", false);
            $('#bed').attr("disabled", false);
            $('#person').attr("disabled", false);
            $('#child1').attr("disabled", false);
            $('#discountreason').val('');
            saveone=1;
            var radioValue = $("input[name='customRadio']:checked").val();
            if(radioValue){
                var len = $("table.room-list > tbody").length;
                if(len==1){
                    $('#newroom').attr("disabled", false);
                    $("#bookingsave").attr("disabled", false);
                }else{
                    if(len>1 && saveall==1){
                        $('#newroom').attr("disabled", false);
                        $("#bookingsave").attr("disabled", false);
                    }else{
                        saveone=1;
                        $('#newroom').attr("disabled", true);
                        $("#bookingsave").attr("disabled", true);
                    }
                }
                $('#newroom').attr("disabled", false);
                $("#bookingsave").attr("disabled", false);
            }else{
                $("#bookingsave").attr("disabled", true);
                $('#newroom').attr("disabled", true);
            }
        }else{
            $('.selectpicker').selectpicker('refresh');
            $('#from_date2').attr("disabled", true);
            $('#to_date2').attr("disabled", true);
            $('#bed').attr("disabled", true);
            $('#bed').val(0);
            $('#adults').val(0);
            $('#rent').val(0);
            $('#amount1').attr("disabled", true);
            $('#amount1').val(0);
            $('#person').attr("disabled", true);
            $('#person').val(0);
            $('#amount2').attr("disabled", true);
            $('#amount2').val(0);
            $('#child1').attr("disabled", true);
            $('#child1').val(0);
            $('#amount3').attr("disabled", true);
            $('#amount3').val(0);
            $('#nofroom').attr("disabled", true);
            $('#newroom').attr("disabled", true);
            saveone=0;
            $("#bookingsave").attr("disabled", true);
            $("#rent").trigger('change');
        }
    });
    $("#discountreason").on('change', function(){
        var discountreason = $("#discountreason").val();
        if(discountreason){
        var rent = $("#rent").val();
        if (rent == null) {
            rent = $("#rent-1").val();
        }
        if(rent>0){
        $("#msg1").text('');
        $("#discountrate").attr("disabled", false);
        $("#discountamount").val(0);
        }else{
            $("#msg1").text("Please select room and room no first");
        }
        }else{
            $("#discountrate").val('');
            $("#discountamount").val('');
            $("#discountrate").attr("disabled", true);
            $("#discountamount").attr("disabled", true);
        }
    });
    $("#booking_source").on('change', function(){
        var booking_source = $("#booking_source").find(":selected").val();
        if(booking_source){
        $("#commissionrate").attr("disabled", false);
        var csrf = $('#csrf_token').val();
        var myurl = baseurl + "room_reservation/room_reservation/bsourcerate";
        $.ajax({
            url: myurl,
            type: "POST",
            data: {
                csrf_test_name: csrf,
                booking_source: booking_source
            },
            success: function(data) {
                var obj = JSON.parse(data);
                $("#commissionrate").val(obj.commissionrate);
                $("#commissionrate").trigger('change');
               
            }
        });
        }else{
            $("#commissionrate").attr("disabled", true);
            $("#commissionamount").attr("disabled", true);
            $("#commissionrate").val('');
            $("#commissionrate").trigger('change');
        }
    });
    $("#discountrate").on('change', function(){
        var discountrate = $("#discountrate").val();
        if(discountrate){
        if(discountrate<=100){
        $("#msg2").text('');
        var all = $("table.room-list > tbody").length;
        var rent = parseFloat($("#rent").val());
        if (rent == null) {
            rent = parseFloat($("#rent-1").val());
        }
        for (var s = 0; s < all - 1; s++) {
            rent += parseFloat($("#rent" + s).val());
        }
        var disamount = ((rent*discountrate)/100);
        $("#discountamount").val(disamount.toFixed(2));
        }else{
            $("#msg2").text("Invalid percentage");
        }

        }else{
            $("#discountamount").val('');
            $("#discountamount").attr("disabled", true);
        }
    });
    $("#commissionrate").on('change', function(){
        var commissionrate = $("#commissionrate").val();
        if(commissionrate){
        if(commissionrate<=100){
        $("#msg2").text('');
        var all = $("table.room-list > tbody").length;
        var rent = parseFloat($("#rent").val());
        if (rent == null) {
            rent = parseFloat($("#rent-1").val());
        }
        for (var s = 0; s < all - 1; s++) {
            rent += parseFloat($("#rent" + s).val());
        }
        var commissionamount = (rent*commissionrate)/100;
        $("#commissionamount").val(commissionamount.toFixed(2));
        }else{
            $("#msg2").text("Invalid percentage");
        }
        }else{
            $("#commissionamount").val('');
        }
    });
    $("#rent").on("change", function(){
        var all = $("table.room-list > tbody").length
        var rent = parseFloat($("#rent").val());
        var tax = parseFloat($("#tax_percent").val());
        var scharge = parseFloat($("#service_percent").val());
        if (rent == null) {
            rent = parseFloat($("#rent-1").val());
        }
        for (var s = 0; s < all - 1; s++) {
            rent += parseFloat($("#rent" + s).val());
        }
        if(tax>0){
            tax = (tax*rent)/100;
        }
        if(scharge>0){
            scharge = (scharge*rent)/100;
        }
        var total = rent+tax+scharge;
        var roundedTotal = Math.ceil(total);
        $("#totalamount").val(roundedTotal);
        $("#tax_charge").text(formatter.format(Math.ceil(tax)));
        $("#service_charge").text(formatter.format(Math.ceil(scharge)));
        $("#total_charge").text(formatter.format(Math.ceil(total)));
    });
    $("#paymentmode").on('change', function(){
        var paymentmode = $("#paymentmode").find(":selected").val();
        if(paymentmode=="Bank Payment"){
            $("#cardno").attr("disabled", false);
            $("#bankname").attr("disabled", false);
            $("#carddiv").attr("hidden", false);
            $("#bankdiv").attr("hidden", false);
        }else{
            $("#cardno").attr("disabled", true);
            $("#bankname").attr("disabled", true);
            $("#carddiv").attr("hidden", true);
            $("#bankdiv").attr("hidden", true);
        }
        if(paymentmode){
            $("#advanceamount").attr("disabled", false);
            $("#advanceremarks").attr("disabled", false);
        }else{
            $("#advanceamount").attr("disabled", true);
            $("#advanceremarks").attr("disabled", true);
        }
    });
    $("#firstname").on('change', function(){
        var firstname = $("#firstname").val();
        if(firstname){
            $("#addcustomer").attr("disabled", false);
        }else{
            $("#addcustomer").attr("disabled", true);
        }
    });
    $("#addcustomer,#addoldcustomer").on('click', function(){
        var ch = 0;
        var exmobile = $("#existmobile").val();
            for(var mn=0; mn<num; mn++){
                if($("#usermobile"+mn).text()!=""){
                    ch = 1;
                }
            }
            if(ch==0 && $("#mobileNo").val()=="" && exmobile==""){
                $("#mobileNo").addClass("is-invalid");
                return false;
            }else{
                $("#mobileNo").removeClass("is-invalid");
                $("#exampleModal").modal("hide");
                $("#exampleModal2").modal("hide");
                $("#addcustomer").attr("disabled", true);
                $("#addoldcustomer").attr("disabled", true);
            }
        var negativelength = $("table.customerdetail-1").length;
        if(negativelength){
            if($("table.customerdetail-1 tbody tr").length==0){
                num=0;
          }
        }
        var newRow = $("<tr>");
        var cols = "";
        if(exmobile==""){
            cols += '<th class="border-0 pl-0"><div class="custom-control custom-radio"><input type="radio" onclick="getradio('+num+')" id="pri'+num+'" name="customRadio"'
            +'class="custom-control-input"><label class="custom-control-label" for="pri'+num+'"></label></div></th>';
            cols += '<td class="border-0" id="username'+num+'">'+$("#title").find(":selected").val()+" "+$("#firstname").val()+" "+$("#lastname").val()+'</td>';
            cols += '<td class="border-0" id="usermobile'+num+'">'+$("#code").val()+$("#mobileNo").val()+'</td>';
            cols += '<td class="border-0" id="useremail'+num+'" hidden>'+$("#email").val()+'</td>';
            cols += '<td class="border-0" id="userlastname'+num+'" hidden>'+$("#lastname").val()+'</td>';
            cols += '<td class="border-0" id="usergender'+num+'" hidden>'+($('input[name="customRadioInline"]:checked').val()?$('input[name="customRadioInline"]:checked').val():"")+'</td>';
            cols += '<td class="border-0" id="userfathername'+num+'" hidden>'+$("#fathername").val()+'</td>';
            cols += '<td class="border-0" id="useroccupation'+num+'" hidden>'+$("#occupation").val()+'</td>';
            cols += '<td class="border-0" id="userdob'+num+'" hidden>'+$("#dob").val()+'</td>';
            cols += '<td class="border-0" id="useranniversary'+num+'" hidden>'+$("#anniversary").val()+'</td>';
            cols += '<td class="border-0" id="usernationality'+num+'" hidden>'+$("#nationality").val()+'</td>';
            cols += '<td class="border-0" id="uservip'+num+'" hidden>'+($('input[name="vip"]:checked').val()?$('input[name="vip"]:checked').val():"")+'</td>';
            cols += '<td class="border-0" id="userpitype'+num+'" hidden>'+$("#pitype").val()+'</td>';
            cols += '<td class="border-0" id="userpid'+num+'" hidden>'+$("#pid").val()+'</td>';
            cols += '<td class="border-0" id="userimgfront'+num+'" hidden>'+$("#imgffront").val()+'</td>';
            cols += '<td class="border-0" id="userimgback'+num+'" hidden>'+$("#imgbback").val()+'</td>';
            cols += '<td class="border-0" id="usercomments'+num+'" hidden>'+$("#comments").val()+'</td>';
            cols += '<td class="border-0" id="userimgguest'+num+'" hidden>'+$("#imggguest").val()+'</td>';
            cols += '<td class="border-0" id="usercontacttype'+num+'" hidden>'+$("#contacttype").find(":selected").val()+'</td>';
            cols += '<td class="border-0" id="usercountry'+num+'" hidden>'+$("#country").val()+'</td>';
            cols += '<td class="border-0" id="userstate'+num+'" hidden>'+$("#state").val()+'</td>';
            cols += '<td class="border-0" id="usercity'+num+'" hidden>'+$("#city").val()+'</td>';
            cols += '<td class="border-0" id="userzipcode'+num+'" hidden>'+$("#zipcode").val()+'</td>';
            cols += '<td class="border-0" id="useraddress'+num+'" hidden>'+$("#address").val()+'</td>';
            cols += '<td class="border-0 pr-0 text-right"><button type="button" onclick="custdel('+num+')" id="custdel'+num+'" class="btn btn-danger-soft btn-xs custdelete'+num+'"><i class="far fa-trash-alt"></i></button></td>';
        }else{
            cols += '<th class="border-0 pl-0"><div class="custom-control custom-radio"><input type="radio" onclick="getradio('+num+')" id="pri'+num+'" name="customRadio"'
            +'class="custom-control-input"><label class="custom-control-label" for="pri'+num+'"></label></div></th>';
            cols += '<td class="border-0" id="userid'+num+'" hidden>'+$("#existcustid").val()+'</td>';
            cols += '<td class="border-0" id="username'+num+'">'+$("#existname").val()+'</td>';
            cols += '<td class="border-0" id="usermobile'+num+'">'+$("#existmobile").val()+'</td>';
            cols += '<td class="border-0 pr-0 text-right"><button type="button" onclick="custdel('+num+')" id="custdel'+num+'" class="btn btn-danger-soft btn-xs custdelete'+num+'"><i class="far fa-trash-alt"></i></button></td>';
            $("#existmobile").removeClass("is-valid").removeClass("is-invalid");
            $("#existname").val("");
            $("#existmobile").val("");
            $("#existcustid").val("");
        }

        newRow.append(cols);
        if(negativelength){
            $("table.customerdetail-1").append(newRow);
        }else{
            $("table.customerdetail").append(newRow);
        }
        if(ch==0){
            $("#pri"+num).trigger("click");
        }
        num++;
        $("#firstname").val("");$("#title").val($("#title option:first").val());$("#code").val("");$("#mobileNo").val("");$("#email").val("");$("#imgbbcak").val();
        $("#lastname").val("");$('input[name="customRadioInline"]:checked').prop("checked",false);$("#country").val("");$("#imgffront").val('');$("#imggguest").val('');
        $("#fathername").val("");$("#occupation").val("");$("#dob").val("");$("#anniversary").val("");$('#image-preview').attr('src', 'http://localhost/Hotel//assets/img/proof_icon.png');
        $("#nationality").val("");$('input[name="vip"]:checked').prop("checked",false);$("#pitype").val("");$("#filename").text("Drag and Drop");
        $("#pid").val("");$('#image-preview2').attr('src', 'http://localhost/Hotel//assets/img/proof_icon.png');$("#filename2").text("Drag and Drop");$("#comments").val("");$("#filename3").text("Drag and Drop");
        $('#image-preview3').attr('src', 'http://localhost/Hotel//assets/img/user.png');$("#contacttype").prop("selectedIndex", 0);$("#state").val("");$("#city").val("");$("#zipcode").val("");$("#address").val("");
    });

});
function custdel(r) {
    var tc = $("table.customerdetail tbody tr").length;
        if(tc==null || tc==0){
            tc = $("table.customerdetail-1 tbody tr").length;
        }
    if (1 == tc){
        swal({
            title: "Failed",
            text: "There only one row you can't delete.",
            type: "error",
            confirmButtonColor: "#28a745",
            confirmButtonText: "Ok",
            closeOnConfirm: true
        });
        return false;
    }
    else if(tc==(r+1)){
        $('.custdelete'+r).closest("tr").remove();
        num--;
    }
    else{
        var k=r;
        $('.custdelete'+k).closest("tr").remove(); 
        for(k=r+1; k<tc; k++){
            $("table.customerdetail tbody > tr > th label[for=pri"+k+"]").attr({for:"pri"+r+""});
            $("table.customerdetail tbody > tr > th input[id=pri"+k+"]").attr({onclick:"getradio("+r+")"});
            $("table.customerdetail tbody > tr > th input[id=pri"+k+"]").attr({id:"pri"+r+""});
            $("table.customerdetail tbody > tr > td[id=username"+k+"]").attr("id", "username"+r);
            $("table.customerdetail tbody > tr > td[id=usermobile"+k+"]").attr("id", "usermobile"+r);
            $("table.customerdetail tbody > tr > td[id=useremail"+k+"]").attr("id", "useremail"+r);
            $("table.customerdetail tbody > tr > td[id=usergender"+k+"]").attr("id", "usergender"+r);
            $("table.customerdetail tbody > tr > td[id=userpitype"+k+"]").attr("id", "userpitype"+r);
            $("table.customerdetail tbody > tr > td[id=userpid"+k+"]").attr("id", "userpid"+r);
            $("table.customerdetail tbody > tr > td[id=userimgfront"+k+"]").attr("id", "userimgfront"+r);
            $("table.customerdetail tbody > tr > td[id=userimgback"+k+"]").attr("id", "userimgback"+r);
            $("table.customerdetail tbody > tr > td[id=userimgguest"+k+"]").attr("id", "userimgguest"+r);
            $("table.customerdetail tbody > tr > td button[id=custdel"+k+"]").attr({onclick:"custdel("+r+")",id:"custdel"+r,class:"btn btn-danger-soft btn-xs custdelete"+r});
            $("table.customerdetail tbody > tr > td[id=userid"+k+"]").attr("id", "userid"+r);
            $("table.customerdetail-1 tbody > tr > th label[for=pri"+k+"]").attr({for:"pri"+r+""});
            $("table.customerdetail-1 tbody > tr > th input[id=pri"+k+"]").attr({onclick:"getradio("+r+")"});
            $("table.customerdetail-1 tbody > tr > th input[id=pri"+k+"]").attr({id:"pri"+r+""});
            $("table.customerdetail-1 tbody > tr > td[id=username"+k+"]").attr("id", "username"+r);
            $("table.customerdetail-1 tbody > tr > td[id=usermobile"+k+"]").attr("id", "usermobile"+r);
            $("table.customerdetail-1 tbody > tr > td[id=useremail"+k+"]").attr("id", "useremail"+r);
            $("table.customerdetail-1 tbody > tr > td[id=usergender"+k+"]").attr("id", "usergender"+r);
            $("table.customerdetail-1 tbody > tr > td[id=userpitype"+k+"]").attr("id", "userpitype"+r);
            $("table.customerdetail-1 tbody > tr > td[id=userpid"+k+"]").attr("id", "userpid"+r);
            $("table.customerdetail-1 tbody > tr > td[id=userimgfront"+k+"]").attr("id", "userimgfront"+r);
            $("table.customerdetail-1 tbody > tr > td[id=userimgback"+k+"]").attr("id", "userimgback"+r);
            $("table.customerdetail-1 tbody > tr > td[id=userimgguest"+k+"]").attr("id", "userimgguest"+r);
            $("table.customerdetail-1 tbody > tr > td button[id=custdel"+k+"]").attr({onclick:"custdel("+r+")",id:"custdel"+r,class:"btn btn-danger-soft btn-xs custdelete"+r});
            $("table.customerdetail-1 tbody > tr > td[id=userid"+k+"]").attr("id", "userid"+r);
            r++;
        }
        num--;
    }
    $('#roomno').trigger('change');
    $('#roomno-1').trigger('change');
    $('#roomno').removeClass('is-valid');
    $('#roomno-1').removeClass('is-valid');
    }
function getradio(nums){
    var trl = $("table.customerdetail tbody tr").length;
    if(trl==null || trl==0){
        var trl = $("table.customerdetail-1 tbody tr").length;
    }
        var userid = $("#userid"+nums).text();var name = $("#username"+nums).text();var mobile = $("#usermobile"+nums).text();var email = $("#useremail"+nums).text();
        var lastname = $("#userlastname"+nums).text();var gender = $("#usergender"+nums).text();var father = $("#userfathername"+nums).text();
        var occupation = $("#useroccupation"+nums).text();var dob = $("#userdob"+nums).text();var anniversary = $("#useranniversary"+nums).text();
        var nationality = $("#usernationality"+nums).text();var vip = $("#uservip"+nums).text();var pitype = $("#userpitype"+nums).text();
        var pid = $("#userpid"+nums).text();var imgfront = $("#userimgfront"+nums).text();var imgback = $("#userimgback"+nums).text();var country = $("#usercountry"+nums).text()
        var comments = $("#usercomments"+nums).text();var imgguest = $("#userimgguest"+nums).text();var contacttype = $("#usercontacttype"+nums).text();
        var state = $("#userstate"+nums).text();var city = $("#usercity"+nums).text();var zipcode = $("#userzipcode"+nums).text();var address = $("#useraddress"+nums).text();
        for(var s=0; s<trl; s++){
            if(s!=nums){
                userid += ",".concat($("#userid"+s).text());
                name += ",".concat($("#username"+s).text());
                lastname += ",".concat($("#userlastname"+s).text());
                mobile += ",".concat($("#usermobile"+s).text());
                email += ",".concat($("#useremail"+s).text());
                gender += ",".concat($("#usergender"+s).text());
                pitype += ",".concat($("#userpitype"+s).text());
                pid += ",".concat($("#userpid"+s).text());
                imgfront += ",".concat($("#userimgfront"+s).text());
                imgback += ",".concat($("#userimgback"+s).text());
                imgguest += ",".concat($("#userimgguest"+s).text());
            }
        }
    $("#alluserid").val(userid);$("#alluser").val(name);$("#allmobile").val(mobile);$("#allemail").val(email);$("#alllastname").val(lastname);$("#allgender").val(gender);$("#allcountry").val(country);
    $("#allfather").val(father);$("#alloccupation").val(occupation);$("#alldob").val(dob);$("#allanniversary").val(anniversary);$("#allnationality").val(nationality);
    $("#allvip").val(vip);$("#allcomments").val(comments);$("#allpitype").val(pitype);$("#allpid").val(pid);$("#allimgfront").val(imgfront);$("#allimgback").val(imgback);
    $("#allimgguest").val(imgguest);$("#allcontacttype").val(contacttype);$("#allstate").val(state);$("#allcity").val(city);$("#allzipcode").val(zipcode);$("#alladdress").val(address);
    var len = $("table.room-list > tbody").length;
    var rtype= $("#room_type").find(":selected").val();
    if(rtype==null){
        var rtype= $("#room_type-1").find(":selected").val();
    }
    var rno = $("#roomno").find(":selected").val();
    if(rno==null){
        var rno = $("#roomno-1").find(":selected").val();
    }
    if(rtype && rno && len==1){
        $('#newroom').attr("disabled", false);
        $('#newroom-1').attr("disabled", false);
        $("#bookingsave").attr("disabled", false);
    }else{
            $('#newroom').attr("disabled", true);
            $('#newroom-1').attr("disabled", true);
            $("#bookingsave").attr("disabled", true);
    }
}

var rcount =0;
function room(r,s=null) {
$(".newroom"+r).hide();
$("#bookingsave").attr("disabled", true);
$("#custdetailbtn").hide();
if(rcount!=-1){
    $("#custdetailbtn-1").hide();
}
r++;
var i = rcount;
var alltype = $("#roomtlist").html();
var newRoom = $("<tbody>");
var col = '<tr><th colspan="2">Room Info</th><th>Action</th></tr>';
col += '<tr><td colspan="2"><table class="table table-borderless mb-0"><tbody><tr>'
       +'<td class="border-0"><div class="form-group mb-0"><label class="font-weight-600 mb-1">Room Type <span class="text-danger">*</span></label>'
       +'<div class="icon-addon addon-md input-left-icon"><select class="selectpicker form-select"data-live-search="true" data-width="100%" onchange="getroomnos('+i+')" id="room_type'+i+'">'
       +'<option value="" selected>Choose Room Type</option>'+alltype+'</select><label class="fas fa-sort-amount-down"></label></div></div></td>'
       +'<td class="border-0"><div class="form-group mb-0"><label class="font-weight-600 mb-1">Room No <span class="text-danger">*</span></label><div class="icon-addon addon-md input-left-icon">'
       +'<select name=roomno[] class="selectpicker form-select"data-live-search="true" data-width="100%"onchange="getcapcitys('+i+')" disabled id="roomno'+i+'">'
       +'<option value="" selected>Choose Room No.</option></select><label class="fas fa-sort-numeric-down"></label></div></div></td><td class="border-0">'
       +'<div class="form-group mb-0"><label class="font-weight-600 mb-1">#Adults</label><div class="icon-addon addon-md input-left-icon"><input type="number" min="1" disabled class="form-control"'
       +'id="adults'+i+'" placeholder="Adults"><label class="fas fa-restroom"></label></div></div></td><td class="border-0"><div class="form-group mb-0"><label class="font-weight-600 mb-1">#Children</label><div class="icon-addon addon-md input-left-icon">'
       +'<input type="number" disabled min="0" class="form-control"id="children'+i+'" placeholder="Children" value="0"><label class="fas fa-child"></label>'
       +'</div></div></td></tr></tbody></table></td><td rowspan="3" class="text-center"><button type="button" class="btn btn-danger btn-sm rdel'+r+'" onclick="rdel('+r+')"><i class="far fa-trash-alt"></i></button>'
       +'</td></tr>';
col += '<tr><th><div class="d-flex justify-content-between align-items-center"><span>Occupant Info</span><div class="dropdown"><button class="btn btn-sm btn-primary dropdown-toggle no-caret" type="button"'
        +'id="custdetailbtn'+i+'" data-toggle="dropdown" aria-haspopup="true"aria-expanded="false"><i class="fas fa-plus"></i></button><div class="dropdown-menu" aria-labelledby="dropdownMenuButton">'
        +'<a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"data-target="#exampleModal">New Customer</a><a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"data-target="#exampleModal2">Old Customer</a>'
        +'</div></div></div></div></th><th>Rent Info</th></tr>';
col += '<tr><td><table class="table table-borderless customerdetail'+i+'"><thead><tr><th class="pl-0" width="20">Pri?</th><th>Name</th><th>Mobile No.</th>'
       +'<th class="text-right pr-0">Action</th></tr></thead><tbody></tbody></table></td><td><table class="table table-borderless mb-0 order-list'+i+'">'
       +'<tbody><tr><td class="border-0"><div class="form-group mb-0"><label class="font-weight-600 mb-1">Check IN</label><div class="icon-addon addon-md">'
       +'<input type="text" disabled class="form-control form-control  datefilter3"id="from_date1'+i+'" placeholder="mm/dd/yyyy" value=""></div></div></td>'
       +'<td class="border-0"><div class="form-group mb-0"><label class="font-weight-600 mb-1">Check Out</label><div class="icon-addon addon-md">'
       +'<input type="text" disabled class="form-control form-control datefilter4"id="to_date1'+i+'" placeholder="mm/dd/yyyy" value=""></div></div></td>'
       +'<td class="border-0"><div class="form-group mb-0"><label class="font-weight-600 mb-1">Rent</label><div class="icon-addon addon-md"><input type="number" disabled class="form-control form-control" id="rent'+i+'"'
       +'value="0"></div><div><span class="p-2"><del class="text-danger" id="offer_price'+i+'"></del></span></div></div></td></tr></tbody></table></td></tr>';
col += '<tr><td class="p-0"><table class="table table-borderless mb-0 bg-light"><tbody><tr><td class="border-0"><input type="text" disabled class="form-control ex-room datefilter3" id="from_date2'+i+'"placeholder="yyyy/mm/dd" value=""></td><td class="border-0">'
       +'<input type="text" disabled class="form-control ex-room datefilter4" id="to_date2'+i+'"placeholder="yyyy/mm/dd" value=""></td><td class="border-0">'
       +'<input type="number" min="0" onchange="bedprices('+i+')" disabled class="form-control ex-room"id="bed'+i+'" value="" placeholder="Bed"></td><td class="border-0">'
       +'<input type="number" disabled class="form-control ex-room" id="amount1'+i+'" value=""placeholder="Amount"></td><td class="border-0"><input type="number" min="0" onchange="personprices('+i+')" disabled class="form-control ex-room"'
       +'id="person'+i+'" value="" placeholder="Person"></td><td class="border-0"><input type="number" disabled class="form-control ex-room" id="amount2'+i+'" value=""'
       +'placeholder="Amount"></td><td class="border-0"><input type="number" min="0" onchange="childprices('+i+')" disabled class="form-control ex-room"id="child1'+i+'" value="" placeholder="Child">'
       +'</td><td class="border-0"><input type="number" disabled class="form-control ex-room" id="amount3'+i+'" value=""placeholder="Amount"></td></tr></tbody></table></td><td class="p-0">'
       +'<table class="table table-borderless mb-0 bg-light"><tbody><tr><td class="border-0"><select name="complementary" class="selectpicker form-select"'
       +'data-live-search="true" data-width="100%" disabled id="complementary'+i+'"><option value="0" selected>Choose Complementary</option></select>'
       +'<div class="row"><span class="ml-4" id="compamount'+i+'" hidden></span></div></td><td class="border-0"><input type="number" disabled value="1" class="form-control form-control"id="nofroom'+i+'">'
       +'</td></tr></tbody></table></td><td class="text-center res-v-allign"><button type="button" disabled class="btn btn-primary btn-sm newroom'+r+'" onclick="room('+r+')" id="newroom'+i+'">'
       +'<i class="fas fa-plus"></i></button></td></tr>';

$("#nofroom").val((((s!=null)?s:i)+2));
newRoom.append(col);
$("table.room-list").append(newRoom);
if(i>=0){
    $("#nofroom"+i).val('');
}else{
    $("#nofroom"+i).attr("hidden",false);
}
$('.selectpicker').selectpicker('refresh');
$("table.customerdetail tbody").clone().find('input:radio').attr('name', 'customRadio'+i).end().appendTo("table.customerdetail"+i);
$("table.customerdetail-1 tbody").clone().find('input:radio').attr('name', 'customRadio'+i).end().appendTo("table.customerdetail"+i);
$("#nofroom-1").val((((s!=null)?s:i)+2));
if(i==-1){
    $("#nofroomdiv-1").attr("hidden",false);
    $("#custdetailbtn"+i).show();
}else{
    $("#custdetailbtn"+i).hide();
}
$("table.customerdetail"+i+" tbody > tr > th input").attr("name", "customRadio"+i);
var l = $("table.customerdetail"+i+" tbody tr").length;
for(var x=0; x<l; x++){
$("table.customerdetail"+i+" tbody > tr > th label[for=pri"+x+"]").attr({for:"pri"+x+""+i, disabled:"true"});
$("table.customerdetail"+i+" tbody > tr > th input[id=pri"+x+"]").attr({id:"pri"+x+""+i, disabled:"true"});
$("table.customerdetail"+i+" tbody > tr > td button").attr("disabled",true);
$("table.customerdetail tbody > tr > th input[id=pri"+x+"]").attr("disabled",true);
$("table.customerdetail-1 tbody > tr > th input[id=pri"+x+"]").attr("disabled",true);
}
$('.datefilter').on('change', function() {
    $('#room_type'+i+' :nth-child(1)').prop('selected', true);
    $('#room_type'+i+'').trigger('change');
});
$('#room_type'+i).on('change', function() {
    var roomtype = $('#room_type'+i).find(":selected").val();
    if(roomtype){
        $('.selectpicker').selectpicker('refresh');
        $('#roomno'+i).attr("disabled", false);
        $('#adults'+i).val(0);
        $('#adults'+i).attr("disabled", false);
        $('#children'+i).attr("disabled", false);
        $('#from_date1'+i).attr("disabled", false);
        $('#to_date1'+i).attr("disabled", false);
        $('#rent'+i).attr("disabled", false);
        $('#complementary'+i).attr("disabled", false);
        $("#compamount").attr("hidden",true);
        $('#complementary'+i+' :nth-child(1)').prop('selected', true);
        $('#addrow'+i).attr("disabled", false);
        $('#discountreason').val('');
        $('#discountreason'+i).trigger('change');
        $('#offer_price'+i).val('');
    }else{
        $('.selectpicker').selectpicker('refresh');
        $('#roomno'+i).attr("disabled", true);
        $('#roomno'+i+' :nth-child(1)').prop('selected', true);
        $('#adults'+i).attr("disabled", true);
        $('#adults'+i).val(0);
        $('#children'+i).attr("disabled", true);
        $('#children'+i).val(0);
        $('#from_date1'+i).attr("disabled", true);
        $('#to_date1'+i).attr("disabled", true);
        $('#rent'+i).attr("disabled", true);
        $('#complementary'+i).attr("disabled", true);
        $("#compamount").attr("hidden",true);
        $('#complementary'+i+' :nth-child(1)').prop('selected', true);
        $('#addrow'+i).attr("disabled", true);
        $('#roomno'+i).trigger('change');
        $('#offer_price'+i).text('');
    }
});
$('#roomno'+i).on('change', function() {
    var roomno = $('#roomno'+i).find(':selected').val();
    if(roomno){
        $('.selectpicker').selectpicker('refresh');
        $('#from_date2'+i).attr("disabled", false);
        $('#to_date2'+i).attr("disabled", false);
        $('#bed'+i).attr("disabled", false);
        $('#person'+i).attr("disabled", false);
        $('#child1'+i).attr("disabled", false);
        $('#discountreason').val('');
        $('#newroom'+i).attr("disabled", false);
        var radioValue = $("input[name='customRadio']:checked").val();
        if(saveone==1 && i!=-1){
            $("#bookingsave").attr("disabled", false);
        }else if(i==-1){
            if(radioValue){
                $('#newroom'+i).attr("disabled", false);
                $("#bookingsave").attr("disabled", false);
            }else{
                $('#newroom'+i).attr("disabled", true);
                $("#bookingsave").attr("disabled", true);
            }
        }else{
            saveall=1;
            $("#bookingsave").attr("disabled", true);
        }
    }else{
        $('.selectpicker').selectpicker('refresh');
        $('#from_date2'+i).attr("disabled", true);
        $('#to_date2'+i).attr("disabled", true);
        $('#bed'+i).attr("disabled", true);
        $('#bed'+i).val();
        $('#rent'+i).val(0);
        $('#amount1'+i).attr("disabled", true);
        $('#amount1'+i).val(0);
        $('#person'+i).attr("disabled", true);
        $('#person'+i).val();
        $('#amount2'+i).attr("disabled", true);
        $('#amount2'+i).val(0);
        $('#child1'+i).attr("disabled", true);
        $('#child1'+i).val();
        $('#amount3'+i).attr("disabled", true);
        $('#amount3'+i).val(0);
        $('#nofroom'+i).attr("disabled", true);
        $('#newroom'+i).attr("disabled", true);
        saveall=0;
        $("#bookingsave").attr("disabled", true);
        $("#rent").trigger('change');
    }
});
$("#complementary"+i).on("change", function(){
    var cm = $("#complementary"+i).find(":selected").val();
    if(cm>0){
        $("#compamount"+i).attr("hidden",false);
        $("#compamount"+i).text("Amount: "+formatter.format(Math.ceil(cm)));
    }else{
        $("#compamount"+i).attr("hidden",true);
    }
    });

var startnew = $("#datefilter1").val();
var endnew = $("#datefilter2").val();
$(".datefilter3").val(startnew);
$(".datefilter4").val(endnew);
rcount++;

}
function rdel(r) {
var t = $("table.room-list > tbody").length;
if (1 == t){
    swal({
        title: "Failed",
        text: "There only one row you can't delete.",
        type: "error",
        confirmButtonColor: "#28a745",
        confirmButtonText: "Ok",
        closeOnConfirm: true
    });
}
else if(t==(r+1)){
    $('.rdel'+r).closest("tbody").remove();
    r--;
    $(".newroom"+r).show();
    if(t==2){
        $("#custdetailbtn").show();
        $("#custdetailbtn-1").show();
        var l = $("table.customerdetail tbody tr").length;
        if(l==null || l==0){
            var l = $("table.customerdetail-1 tbody tr").length;
        }
        for(var x=0; x<l; x++){
            $("table.customerdetail tbody > tr > th input[id=pri"+x+"]").attr("disabled",false);
            $("table.customerdetail-1 tbody > tr > th input[id=pri"+x+"]").attr("disabled",false);
        }
    }
    $('#room_type'+r).trigger('change');
    var roomno = $('#roomno').find(':selected').val();
    if(roomno == null){
        roomno = $('#roomno-1').find(':selected').val();
    }
    var radioValue = $("input[name='customRadio']:checked").val();
    if(radioValue && roomno){
        $('#newroom').attr("disabled", false);
        $("#bookingsave").attr("disabled", false);
    }else{
        $('#newroom').attr("disabled", true);
        $("#bookingsave").attr("disabled", true);
    }
    $("#nofroom").val(rcount);
    $("#nofroom-1").val(rcount);
    $("#rent").trigger('change');
      rcount--;
}
else{
    var l=0;
    for(var k=r; k<t; k++){
        l++;
        $('.rdel'+k).closest("tbody").remove(); 
    }
    rcount -= l;
    for(var j=r;j<t-1;j++){
        s=j-1;
        room(rcount,s);
    }
    $(".newroom"+j).show();
    $('#room_type'+j).trigger('change');
    $("#rent").trigger('change');
}
}
var count=0;
function addrow(n) {
var newRow = $("<tr>");
var cols = "";

cols += '<td class="border-0 pl-0"><input type="text" class="form-control form-control-xs datefilter3"/></td>';
cols += '<td class="border-0"><input type="text" class="form-control form-control-xs datefilter4"/></td>';
cols += '<td class="border-0"><div class="d-flex"> <input type="number" class="form-control form-control-xs" value="0"><div class="dropdown dropdown-custom ml-1" hidden> <button class="btn btn-inverse-soft btn-xs dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Tariff </button><div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><table class="table table-sm table-borderless mb-0"><tbody><tr><td class="border-0">Base Rent</td><td class="border-0">0</td></tr><tr><td class="border-0">Net Rent</td><td class="border-0">0</td></tr></tbody></table></div></div></div></td>';

cols += '<td class="border-0 pr-0 text-right"><button type="button" onmouseenter="delrow('+n+')" class="ibtnDel'+n+' btn btn-danger-soft btn-xs"><i class="far fa-times-circle"></i></button></td>';
newRow.append(cols);
$("table.order-list"+n).append(newRow);
count++;
}
function delrow(n) {
$("table.order-list"+n).on("click", ".ibtnDel"+n, function (event) {
$(this).closest("tr").remove();
count -= 1;
});
}
function getroomnos(n){
'use strict';
var allroom = $("#roomno").val();
if(allroom==null){
    allroom = $("#roomno-1").val();
}
var all = $("table.room-list > tbody").length;
for(var s=0; s<all-1; s++){
    allroom += ",".concat($("#roomno"+s).val());
}
$("#msg").text("");
$("#msg1").text("");
var datefilter1 = $("#datefilter1").val();
if (datefilter1 == "") {
    $("#datefilter1").addClass("is-invalid");
    return false;
}
var datefilter2 = $("#datefilter2").val();
if (datefilter2 == "") {
    $("#datefilter2").addClass("is-invalid");
    return false;
}
if (datefilter2 <= datefilter1) {
    $("#msg").text("Checkout field can not equal or smaller than Checkin field");
    $("#datefilter1").addClass("is-invalid");
    $("#datefilter2").addClass("is-invalid");
    return false;
}else{
    $("#datefilter1").removeClass("is-invalid");
    $("#datefilter2").removeClass("is-invalid");
    $("#datefilter1").addClass("is-valid");
    $("#datefilter2").addClass("is-valid");
}
var room_type= $("#room_type"+n).find(":selected").val();
if(room_type==""){
    $("#room_type"+n).removeClass("is-valid")
    $("#room_type"+n).closest('div').removeClass("is-valid")
    $("#room_type"+n).addClass("is-invalid")
    $("#roomno"+n).closest('div').removeClass("is-valid");
    $("#roomno"+n).removeClass("is-valid");
    return false;
}else{
    $("#room_type"+n).removeClass("is-invalid");
    $("#room_type"+n).closest('div').removeClass("is-invalid");
    $("#room_type"+n).addClass("is-valid");
    $("#roomno"+n).removeClass("is-valid");
    $("#roomno"+n).closest('div').removeClass("is-valid");
  }
var csrf = $('#csrf_token').val();
var myurl=baseurl+"room_reservation/room_reservation/checknewroom";
  if($('#roomno'+n+'')[0].options.length>1)
  $('#roomno'+n+'').find('option').not(':first').remove();
  if ($('#complementary'+n)[0].options.length > 1)
  $('#complementary'+n).find('option').not(':first').remove();
$.ajax({
      url: myurl,
      type: "POST",
      data: {csrf_test_name: csrf, room_type: room_type,datefilter1: datefilter1,datefilter2: datefilter2},
      success: function(data) {
        var obj = JSON.parse(data);
        var rlen = obj.roomno;
        var clen = obj.complementary;
        for (var i = 0; i < rlen.length; i++) {
            var split_room = allroom.split(",");
            if (split_room.indexOf("" + obj.roomno[i] + "") == -1) {
                $('#roomno'+n).append('<option value="' + obj.roomno[i] + '">' + obj.roomno[i] + '</option>');
            }
        }
        for (var i = 0; i < clen.length; i++) {
            $('#complementary'+n).append('<option value="' + obj.complementary[i].rate + '">' + obj.complementary[i].complementaryname + '</option>');
        }
        $('.selectpicker').selectpicker('refresh');
        $("#bed"+n).prop("disabled",true);
        $("#child1"+n).prop("disabled",true);
        $("#person"+n).prop("disabled",true);
    }
});
}
function getcapcitys(n){
'use strict';
var roomno= $("#roomno"+n).find(":selected").val();
var room_type= $("#room_type"+n).find(":selected").val();
if(roomno==""){
    if(room_type!=""){
    $("#roomno"+n).removeClass("is-valid");
    $("#roomno"+n).closest('div').removeClass("is-valid");
    $("#roomno"+n).addClass("is-invalid");
    return false;
    }
    return false;
}else{
    $("#roomno"+n).removeClass("is-invalid");
    $("#roomno"+n).closest('div').removeClass("is-invalid");
    $("#roomno"+n).addClass("is-valid");
  }
var csrf = $('#csrf_token').val();
var start = $("#datefilter1").val();
var end = $("#datefilter2").val();
var myurl=baseurl+"room_reservation/room_reservation/getcapacity";
$.ajax({
    url: myurl,
    type: "POST",
    data: {csrf_test_name: csrf,start: start,end: end, roomno: roomno},
    success: function(data) {
        var obj =JSON.parse(data);
        if(obj.excapacity==0){
            $("#bed"+n).prop("disabled",true);
            $("#child1"+n).prop("disabled",true);
            $("#person"+n).prop("disabled",true);
        }else{
            $("#bed"+n).prop("disabled",false);
            $("#child1"+n).prop("disabled",false);
            $("#person"+n).prop("disabled",false);
        }
        $("#adults"+n).val(obj.capacity);
        $("#rent"+n).val(obj.price);
        if(obj.offer_amount>0){
            $("#offer_price"+n).text(formatter.format(Math.ceil(obj.offer_amount)));
        }
        $('#commissionrate').trigger('change');
        $("#rent").trigger('change');
}
});
}
function bedprices(n){
'use strict';
var room_type= $("#room_type"+n).find(":selected").val();
if(room_type==""){
  $("#room_type"+n).addClass("is-invalid");
  return false;
  }else{
    $("#room_type"+n).removeClass("is-invalid");
    $("#room_type"+n).addClass("is-valid");
  }
var bed= $("#bed"+n).val();
var csrf = $('#csrf_token').val();
var myurl=baseurl+"room_reservation/room_reservation/bedprice";
$.ajax({
      url: myurl,
      type: "POST",
      data: {csrf_test_name: csrf, room_type: room_type, bed:bed},
      success: function(data) {
          var obj =JSON.parse(data);
          $("#amount1"+n).val(Math.ceil(obj.bedrate));
  }
  });
}
function personprices(n){
'use strict';
var room_type= $("#room_type"+n).find(":selected").val();
if(room_type==""){
  $("#room_type"+n).addClass("is-invalid");
  return false;
  }else{
    $("#room_type"+n).removeClass("is-invalid");
    $("#room_type"+n).addClass("is-valid");
  }
var person= $("#person"+n).val();
var csrf = $('#csrf_token').val();
var myurl=baseurl+"room_reservation/room_reservation/personprice";
$.ajax({
      url: myurl,
      type: "POST",
      data: {csrf_test_name: csrf, room_type: room_type, person:person},
      success: function(data) {
          var obj =JSON.parse(data);
          $("#amount2"+n).val(Math.ceil(obj.personrate));
  }
  });
}
function childprices(n){
'use strict';
var room_type= $("#room_type"+n).find(":selected").val();
if(room_type==""){
  $("#room_type"+n).addClass("is-invalid");
  return false;
  }else{
    $("#room_type"+n).removeClass("is-invalid");
    $("#room_type"+n).addClass("is-valid");
  }
var child= $("#child1"+n).val();
var csrf = $('#csrf_token').val();
var myurl=baseurl+"room_reservation/room_reservation/childprice";
$.ajax({
      url: myurl,
      type: "POST",
      data: {csrf_test_name: csrf, room_type: room_type, child:child},
      success: function(data) {
          var obj =JSON.parse(data);
          $("#amount3"+n).val(Math.ceil(obj.childrate));
  }
  });
}