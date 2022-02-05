function validateform(e,sessId) {
    return false;
	var flag = 0;
alert(flag);
	if(sessId==0) {
		var chkot = $("input[name=checkout]:checked").length;
		if(chkot == 0) {
			$('#err_chkout').html('<p style="color:red"> please select any one option</>');
			flag = 1;
		} else {
			$('#err_chkout').hide();
		}

		if($('#email').val() == "") {
			$('#email').css("border", "1px solid red");
			flag = 1;
		} else {
			$('#email').css("border", "1px solid green");
		}

		// Check email exists or not
		var dataString 	= 'chkUserEmail?login=popup&emailId='+$('#email').val();
		$.post( url +dataString, {
		}, function(response) {
			if(response == 1) {
				$("#email").focus();
				$('#email').css("border", "1px solid red");
				$('#invalidEmailalert').html('<p style="color:red">Email already exists!</p>');
				flag = 1;
				return false;
			} else {			
				$('#invalidEmailalert').html('');
			}
		});
	}
	
	//alert($('#invalidEmailalert').text());
	if($('#BillingFirstName').val() == "") {
		$('#BillingFirstName').css("border", "1px solid red"); 
		flag = 1;
	} else {
		$('#BillingFirstName').css("border", "1px solid green");
	}
	if($('#BillingLastName').val() == "") {
		$('#BillingLastName').css("border", "1px solid red");
		flag = 1;
	} else {
		$('#BillingLastName').css("border", "1px solid green");
	}
	if($('#BillingAddress1').val() == "") {
		$('#BillingAddress1').css("border", "1px solid red");
		flag = 1;
	} else {
		$('#BillingAddress1').css("border", "1px solid green");
	}

	if($('#BillingCity').val() == "") {
		$('#BillingCity').css("border", "1px solid red");
		flag = 1;
	} else {
		$('#BillingCity').css("border", "1px solid green");
	}

	if($('#BillingState').val() == "") {
		$('#BillingState').css("border", "1px solid red"); 
		flag = 1;
	} else {
		$('#BillingState').css("border", "1px solid green");
	}

	if($('#BillingZipCode').val() == "") {
		$('#BillingZipCode').css("border", "1px solid red");
		flag = 1;
	} else {
		$('#BillingZipCode').css("border", "1px solid green");	
	}

	if($('#BillingPhoneNumber').val() == "") {
		$('#BillingPhoneNumber').css("border", "1px solid red");
		flag = 1;
	} else {
		$('#BillingPhoneNumber').css("border", "1px solid green");	
	}

	/* Shipping details */
	var isCheckShip = $("#check_ship").is(':checked');

	if(isCheckShip == false) {
	
		if($('#ShippingFirstName').val() == "") {
			$('#ShippingFirstName').css("border", "1px solid red");
			flag = 1;
		} else {
			$('#ShippingFirstName').css("border", "1px solid green");
		}

		if($('#ShippingLastName').val() == "") {
			$('#ShippingLastName').css("border", "1px solid red");
			flag = 1;
		} else {
			$('#ShippingLastName').css("border", "1px solid green");
		}

		if($('#ShippingAddress1').val() == "") {
			$('#ShippingAddress1').css("border", "1px solid red");
			flag = 1;
		} else {
			$('#ShippingAddress1').css("border", "1px solid green");
		}

		if($('#ShippingCity').val() == "") {
			$('#ShippingCity').css("border", "1px solid red");
			flag = 1;
		} else {
			$('#ShippingCity').css("border", "1px solid green");
		}

		if($('#ShippingState').val() == "") {
			$('#ShippingState').css("border", "1px solid red");
			flag = 1;
		} else {
			$('#ShippingState').css("border", "1px solid green");
		}

		if($('#ShippingZipCode').val() == "") {
			$('#ShippingZipCode').css("border", "1px solid red");
			flag = 1;
		} else {
			$('#ShippingZipCode').css("border", "1px solid green");	
		}

		if($('#ShippingPhoneNumber').val() == "") {
			$('#ShippingPhoneNumber').css("border", "1px solid red");
			flag = 1;
		} else {
			$('#ShippingPhoneNumber').css("border", "1px solid green");
		}
	} else {

		//flag = 0;
		//$('#ship_address').slideUp().hide('slow');
	}
	
	
	//alert(flag); alert(e);
	if(flag == 0 && e == "calc_shipping" ) {

		$('#btn_method_choice').hide();
		$('#ship_method_choice').show();
	} else {

		//window.scrollTo(300);
		//$('html, body').animate({scrollTop:0}, 'slow');
	}

	
	var chkot = $("input[name=payOpt]:checked").val();
	if(chkot == 1) {
		if($('#NameOnCard').val() == "") {
			//$('#NameOnCard').css("border", "1px solid red");
			flag = 1;
		} else {
			//$('#NameOnCard').css("border", "1px solid green");
		}

		if($('#CardNumber').val() == "") {
			//$('#CardNumber').css("border", "1px solid red");
			flag = 1;
		} else {
			//$('#CardNumber').css("border", "1px solid green");
		}

		if($('#cardVarify').val() == "") {
			//$('#cardVarify').css("border", "1px solid red");
			flag = 1;
		} else if($('#cardVarify').val()!="" && $('#cardVarify').val().length <= 2) {
			//$('#cardVarify').css("border", "1px solid red");
			//$('#ccnAlert').html('<p style=color:red>CVN length should be greater than 2</p>');
			flag = 1;
		} else {
			$('#ccnAlert').html('');
			//$('#cardVarify').css("border", "1px solid green");
		}
	}

	
	if(flag == 0 && e == "btnSubmit" ) {
		//document.getElementById("one_page_form").submit();
		$('#one_page_form').submit();
	} else {

		//window.scrollTo(300);
		//$('html, body').animate({scrollTop:0}, 'slow');
		return false;
	}
}
