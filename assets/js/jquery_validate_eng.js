(function($){
    $.fn.validationEngineLanguage = function(){
    };
    $.validationEngineLanguage = {
        newLang: function(){
            $.validationEngineLanguage.allRules = {
                "required": { // Add your regex rules here, you can take telephone as an example
                    "regex": "none",
                    "alertText": "* This field is required",
                    "alertTextCheckboxMultiple": "* Please select an option",
                    "alertTextCheckboxe": "* This checkbox is required",
                    "alertTextDateRange": "* Both date range fields are required"
                },
                "requiredInFunction": {
                    "func": function(field, rules, i, options){
                        return (field.val() == "test") ? true : false;
                    },
                    "alertText": "* Field must equal test"
                },
                "dateRange": {
                    "regex": "none",
                    "alertText": "* Invalid ",
                    "alertText2": "Date Range"
                },
                "dateTimeRange": {
                    "regex": "none",
                    "alertText": "* Invalid ",
                    "alertText2": "Date Time Range"
                },
                "minSize": {
                    "regex": "none",
                    "alertText": "* Minimum ",
                    "alertText2": " characters allowed"
                },
                "maxSize": {
                    "regex": "none",
                    "alertText": "* Maximum ",
                    "alertText2": " characters allowed"
                },
		"groupRequired": {
                    "regex": "none",
                    "alertText": "* You must fill one of the following fields"
                },
                "min": {
                    "regex": "none",
                    "alertText": "* Minimum value is "
                },
                "max": {
                    "regex": "none",
                    "alertText": "* Maximum value is "
                },
                "past": {
                    "regex": "none",
                    "alertText": "* Date should be less than " //to Date
                },
                "future": {
                    "regex": "none",
                    "alertText": "* Date past "
                },
                "maxCheckbox": {
                    "regex": "none",
                    "alertText": "* Maximum ",
                    "alertText2": " options allowed"
                },
                "minCheckbox": {
                    "regex": "none",
                    "alertText": "* Please select ",
                    "alertText2": " options"
                },
                "equals": {
                    "regex": "none",
                    "alertText": "* Fields do not match"
                },
                "creditCard": {
                    "regex": "none",
                    "alertText": "* Invalid credit card number"
                },
				"check_url": {
					"alertText": "* Invalid url."
				},
                "phone": {
                    // credit: jquery.h5validate.js / orefalo
                    "regex": /^([\+][0-9]{1,3}[\ \.\-])?([\(]{1}[0-9]{2,6}[\)])?([0-9\ \.\-\/]{3,20})((x|ext|extension)[\ ]?[0-9]{1,4})?$/,
                    "alertText": "* Invalid phone number"
                },
                "email": {
                    // HTML5 compatible email regex ( http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#    e-mail-state-%28type=email%29 )
                    //"regex": /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/,
                    "regex": /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/,
                    "alertText": "* Invalid email address"
                },
                "integer": {
                    "regex": /^[\-\+]?\d+$/,
                    "alertText": "* Not a valid integer"
                },
                "number": {
                    // Number, including positive, negative, and floating decimal. credit: orefalo
                    "regex": /^[\-\+]?((([0-9]{1,3})([,][0-9]{3})*)|([0-9]+))?([\.]([0-9]+))?$/,
                    "alertText": "* Accept only numbers and decimals"
                },
				"nonzeroNumbers": {
							"regex": /^(?=.*?[1-9])[0-9()-]+$/,
							"alertText": "* Accept only non-zero number value"
						},
				"onlyNumbers": {
							"regex": /^(?=.*?[1-9])[0-9()-]+$/,
							"alertText": "* Accept only numbers"
						},

                "date": {
                    //	Check if date is valid by leap year
			    "func": function (field) {
					var pattern = new RegExp(/^(\d{4})[\/\-\.](0?[1-9]|1[012])[\/\-\.](0?[1-9]|[12][0-9]|3[01])$/);
					var match = pattern.exec(field.val());
					if (match == null)
					   return false;

					var year = match[1];
					var month = match[2]*1;
					var day = match[3]*1;
					var date = new Date(year, month - 1, day); // because months starts from 0.

					return (date.getFullYear() == year && date.getMonth() == (month - 1) && date.getDate() == day);
				},
				"alertText": "* Invalid date, must be in YYYY-MM-DD format"
                },
                "ipv4": {
                    "regex": /^((([01]?[0-9]{1,2})|(2[0-4][0-9])|(25[0-5]))[.]){3}(([0-1]?[0-9]{1,2})|(2[0-4][0-9])|(25[0-5]))$/,
                    "alertText": "* Invalid IP address"
                },
                "url": {
                    "regex": /^(http(s)?:\/\/)?(www\.)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/,
                    "alertText": "* Invalid URL"
                },
                "onlyNumberSp": {
                    "regex": /^[0-9]\d*$/,
                    "alertText": "* Accept only positive numbers"
                },
                "onlyLetterSp": {
                    "regex": /^[a-zA-Z\ \']+$/,
                    "alertText": "* Letters only"
                },
                "onlyLetter": {
                    "regex": /^[a-zA-Z\ \']+$/,
                    "alertText": "* Letters only"
                },
                 "onlyRomanLetter": {
                    "regex": /^[IVXLCDM]*$/,
                    "alertText": "* Roman Letters only"
                },
				"onlyLetterNumber": {
					"regex": /^[a-zA-Z0-9_ ]*$/,
					"alertText": "* No special characters allowed"
				},
				"onlyLetterNumberPr": {
					"regex": /^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/,
					"alertText": "* No special characters allowed"
				},
				"inputValNumber": {
					"alertText": "* Only numbers should not be allowed"
				},
				"passwordwrong": {
					"alertText": "* Incorrect Password. Please enter the correct password."
				},
				"tofield": {
					"alertText": "* Timeslot from should be less than timeslot to."
				},
				"fromfield": {
					"alertText": "* Timeslot to should be greater than timeslot from."
				},
				"fromtime": {
					"alertText": "* End time should be greater than start time."
				},
				"compare_out_off_marks": {
					"alertText": "* Marks should be less than total marks"
				},
				"compare_days": {
					"alertText": "* Days should be less than month day."
				},
				"timeslotexist": {
					"alertText": "* This timeslot already exist for this day"
				},
				"enddategreater": {
					"alertText": "* End date should be greater than start date."
				},
				
				"inputValidLength": {
					"alertText": "* should be greater than 0"
				},
                "validate2fields": {
                    "alertText": "* Please input HELLO"
                },
	            //tls warning:homegrown not fielded
                "dateFormat":{
                    "regex": /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$|^(?:(?:(?:0?[13578]|1[02])(\/|-)31)|(?:(?:0?[1,3-9]|1[0-2])(\/|-)(?:29|30)))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^(?:(?:0?[1-9]|1[0-2])(\/|-)(?:0?[1-9]|1\d|2[0-8]))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^(0?2(\/|-)29)(\/|-)(?:(?:0[48]00|[13579][26]00|[2468][048]00)|(?:\d\d)?(?:0[48]|[2468][048]|[13579][26]))$/,
                    "alertText": "* Invalid Date"
                },
				"ajaxlogin": {
                    "url": url+"ajax/check_admin_login",
                    // you may want to pass extra data on the ajax call
					"extraDataDynamic": ['#email,#password'],
                    // if you provide an "alertTextOk", it will show as a green prompt when the field validates
                    "alertText": "* This email id not exist",
                    "alertTextOk": "",
                    "alertTextLoad": "* Validating, please wait"
                },
				"check_emailid_forgot_pass": {
                   "url": url+"ajax/check_emailid_forgot_pass",
                    // you may want to pass extra data on the ajax call
					"extraDataDynamic": ['#domain_val_admin_email,#user_val,#user_id'],
                    // if you provide an "alertTextOk", it will show as a green prompt when the field validates
                    "alertText": "* This email id not exist",
                    "alertTextOk": "",
                    "alertTextLoad": "* Validating, please wait"
                },
				"ajaxcheckemailid": {
                   "url": url+"ajax/check_emailid_exist",
                    // you may want to pass extra data on the ajax call
					"extraDataDynamic": ['#domain_val_admin_email,#user_val,#user_id'],
                    // if you provide an "alertTextOk", it will show as a green prompt when the field validates
                    "alertText": "* This email id not exist",
                    "alertTextOk": "",
                    "alertTextLoad": "* Validating, please wait"
                },
				"ajaxcheckpass": {
                    "url": url+"ajax/check_pass_exist",
                    // you may want to pass extra data on the ajax call
					"extraDataDynamic": ['#action,#id'],
                    // if you provide an "alertTextOk", it will show as a green prompt when the field validates
                    "alertText": "* ",
                    "alertTextOk": "",
                    "alertTextLoad": "* Validating, please wait"
                },
				"ajaxcheckcontactexist": {
                    "url": url+"ajax/check_contactctno_exist",
                    // you may want to pass extra data on the ajax call
					"extraDataDynamic": ['#action,#id'],
                    // if you provide an "alertTextOk", it will show as a green prompt when the field validates
                    "alertText": "* ",
                    "alertTextOk": "",
                    "alertTextLoad": "* Validating, please wait"
                },
				"ajaxcheckemailexist": {
                    "url": url+"ajax/check_email_exist",
                    // you may want to pass extra data on the ajax call
					"extraDataDynamic": ['#action,#id'],
                    // if you provide an "alertTextOk", it will show as a green prompt when the field validates
                    "alertText": "* ",
                    "alertTextOk": "",
                    "alertTextLoad": "* Validating, please wait"
                },
				"ajaxcheckusercontactexist": {
                    "url": url+"ajax/check_user_contact_exist",
                    // you may want to pass extra data on the ajax call
					"extraDataDynamic": ['#action,#id'],
                    // if you provide an "alertTextOk", it will show as a green prompt when the field validates
                    "alertText": "* ",
                    "alertTextOk": "",
                    "alertTextLoad": "* Validating, please wait"
                },
				"check_area_exist": {
                    "url": url+"ajax/check_area_exist",
                    // you may want to pass extra data on the ajax call
					"extraDataDynamic": ['#action,#id'],
                    // if you provide an "alertTextOk", it will show as a green prompt when the field validates
                    "alertText": "* ",
                    "alertTextOk": "",
                    "alertTextLoad": "* Validating, please wait"
                },
				"check_category_exist": {
                    "url": url+"ajax/check_category_exist",
                    // you may want to pass extra data on the ajax call
					"extraDataDynamic": ['#action,#id'],
                    // if you provide an "alertTextOk", it will show as a green prompt when the field validates
                    "alertText": "* ",
                    "alertTextOk": "",
                    "alertTextLoad": "* Validating, please wait"
                },
                //tls warning:homegrown not fielded
				"dateTimeFormat": {
	                "regex": /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])\s+(1[012]|0?[1-9]){1}:(0?[1-5]|[0-6][0-9]){1}:(0?[0-6]|[0-6][0-9]){1}\s+(am|pm|AM|PM){1}$|^(?:(?:(?:0?[13578]|1[02])(\/|-)31)|(?:(?:0?[1,3-9]|1[0-2])(\/|-)(?:29|30)))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^((1[012]|0?[1-9]){1}\/(0?[1-9]|[12][0-9]|3[01]){1}\/\d{2,4}\s+(1[012]|0?[1-9]){1}:(0?[1-5]|[0-6][0-9]){1}:(0?[0-6]|[0-6][0-9]){1}\s+(am|pm|AM|PM){1})$/,
                    "alertText": "* Invalid Date or Date Format",
                    "alertText2": "Expected Format: ",
                    "alertText3": "mm/dd/yyyy hh:mm:ss AM|PM or ",
                    "alertText4": "yyyy-mm-dd hh:mm:ss AM|PM"
	            },
				
				"validateMIME":  {
					"func": function(field, rules, i, options){
				   //add to input tag: data-validation-engine="validate[required, custom[validateMIME[image/jpeg|image/png]]]"

					var fileInput = field[0].files[0];
					var MimeFilter = new RegExp(rules[3],'i');

					if (fileInput) {
						return MimeFilter.test(fileInput.type);
					} else { return true;}
				  },
				"alertText": "* Please select valid image file."

				}
            };

        }
    };

    $.validationEngineLanguage.newLang();

})(jQuery);
