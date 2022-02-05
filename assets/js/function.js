$(document).ready(function() {
    //alert("IN");


	jQuery("#adminLogin").validationEngine();
	jQuery("#adminRegister").validationEngine();
	jQuery("#adminForgotpass").validationEngine();
	jQuery("#venue_validator").validationEngine();
	jQuery("#changepassvalidator").validationEngine();
	jQuery("#uservalidator").validationEngine();
	jQuery("#productvalidator").validationEngine();
	jQuery("#areavalidator").validationEngine();
	jQuery("#categoryvalidator").validationEngine();
	jQuery("#corporate_form").validationEngine();
	
	/*$('#venue_profile').validationEngine('attach',{
		onValidationComplete: function(form, status){
			if (status == true){
				$('[name="promotional_images[]"]').addClass("validate[optional,custom[validateMIME[image/gif|image/bmp|image/jpg|image/jpeg|image/png]]]");
				$('[name="banner_images[]"]').addClass("validate[optional,custom[validateMIME[image/gif|image/bmp|image/jpg|image/jpeg|image/png]]]");
				$('#venue_profile').validationEngine('validate');

			}
		}
	});*/


});  // end of document ready


function inputCardLimit(field, rules, i, options) {
	if (field.val() == 0) {
		return options.allrules.inputValidLimit.alertText;
	}
}

function inputVILimit(field, rules, i, options) {
	if (field.val() == 0) {
		return options.allrules.inputValidLimit1.alertText;
	}
}


function inputVCLimit(field, rules, i, options) {
	if (field.val() == 0) {
		return options.allrules.inputValidLimit2.alertText;
	}
}
//check file format
/*function checkfileformat(field, rules, i, options){
	alert(field.val());return false;
	if (field.val() == '') {

	}else{
		return options.allrules.inputValidLimit2.alertText;
	}
}*/

function inputFieldLimit(field, rules, i, options) {
	if (field.val() == 0) {
		return options.allrules.inputValidLength.alertText;
	}
}
//check confirm password
function confirmpassword(field, rules, i, options) {
	var fidVal = field.val();
	var pass_val = $("#password").val();
	if(fidVal != pass_val) {
		return options.allrules.passwordwrong.alertText;
	}
}
//check to time if from is filled
function checktimeslot_from(field, rules, i, options){
	var fidVal = field.val();
	var result = (field.attr("id")).split('_');
	var to_val = $('#timeslot_to_'+result[2]).val();
	if(to_val==''){
		return options.allrules.tofield.alertText;
	}
}
function check_url(field, rules, i, options){
	var str = field.val();
	var regex = new RegExp("^(http[s]?:\\/\\/(www\\.)?|ftp:\\/\\/(www\\.)?|www\\.){1}([0-9A-Za-z-\\.@:%_\+~#=]+)+((\\.[a-zA-Z]{2,3})+)(/(.)*)?(\\?(.)*)?"); 
	var without_regex = new RegExp("^([0-9A-Za-z-\\.@:%_\+~#=]+)+((\\.[a-zA-Z]{2,3})+)(/(.)*)?(\\?(.)*)?");
	if(regex.test(str) || without_regex.test(str)){
	}else{
		return options.allrules.check_url.alertText;
	}
}
//check from time if to is filled
function checktimeslot_to(field, rules, i, options){
	var fidVal = field.val();
	var time_to = am_pm_to_hours(fidVal);
	var result = (field.attr("id")).split('_');
	var from_val = $('#timeslot_from_'+result[2]).val();
	var time_from = am_pm_to_hours(from_val);
	if(time_to <= time_from){
		return options.allrules.fromfield.alertText;
	}
}



function check_end_time(field, rules, i, options){
	var fidVal = field.val();
	if(fidVal!=''){
		var time_to = am_pm_to_hours(fidVal);
	}
	var result = (field.attr("id")).split('_');
	var from_val = $('#start_time_'+result[2]).val();
	if(from_val!=''){
		var time_from = am_pm_to_hours(from_val);
	}
	if(time_to <= time_from){
		return options.allrules.fromtime.alertText;
	}
}
function am_pm_to_hours(time) {
	var hours = Number(time.match(/^(\d+)/)[1]);
	var minutes = Number(time.match(/:(\d+)/)[1]);
	var AMPM = (time.match(/\s(.*)$/)[1]).toLowerCase();
	if (AMPM == "pm" && hours < 12) hours = hours + 12;
	if (AMPM == "am" && hours == 12) hours = 12;
	var sHours = hours.toString();
	var sMinutes = minutes.toString();
	if (hours < 10) sHours = "0" + sHours;
	if (minutes < 10) sMinutes = "0" + sMinutes;
	return (sHours +':'+sMinutes);
}

function checkIsNum(field, rules, i, options) {
	var fidVal = field.val();
	var isnum = /^\d+$/.test(fidVal);
	if(isnum == true) {
		return options.allrules.inputValNumber.alertText;
	}
}

function isNumber(evt, element) {
    var charCode = (evt.which) ? evt.which : event.keyCode

    if (
        (charCode != 45 || $(element).val().indexOf('-') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
        (charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
        (charCode < 48 || charCode > 57))
        return false;

    return true;
}

// add-category clr radio
function clrRadio(clas) {
    $("."+clas).prop('checked', false);
}



function avoidString(e) {
  if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
		// Allow: Ctrl+A
		(e.keyCode == 65 && e.ctrlKey === true) ||
		// Allow: home, end, left, right
		(e.keyCode >= 35 && e.keyCode <= 39)) {
		// let it happen, don't do anything
		return;
  }
  // Ensure that it is a number and stop the keypress
  if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
      e.preventDefault();
  }
}


function showLoader(){
	$('#divLoading').show();
}

function hideLoader(){
	setTimeout(function(){
		$('#divLoading').fadeOut();
	}, 3000);
}
