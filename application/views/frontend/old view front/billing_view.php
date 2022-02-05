<?php
if($this->session->front_user_logged_in){
	$userLoIDArr =  $this->session->front_user_logged_in;
	
	}	
if(isset($this->session->userdata['prod_arr'])) {
		$prod_arr = $this->session->userdata['prod_arr'];
		$grand_total = $prod_arr['price'];
}else{
	$cart = $this->cart->contents();
	$grand_total = 0;	
	$sub_total = 0;	
	foreach($cart as $item){
		$sub_total = ($item['price']*$item['qty']);
		$grand_total = $grand_total + $sub_total;
	}
}
// Merchant key here as provided by Payu
	//$MERCHANT_KEY = "P4rShA1k";
	$MERCHANT_KEY = "gtKFFx";
	// Merchant product info.
	// Populate name, merchantId, description, value, commission parameters as per your code logic; in case of multiple splits pass multiple json objects in paymentParts
	$firstSplitArr = array("name"=>"splitID1","value"=>"6","merchantId"=>"396446","description"=>"test description","commission"=>"2");
	$paymentPartsArr = array($firstSplitArr);	
	$finalInputArr = array("paymentParts" => $paymentPartsArr);
	$Prod_info = json_encode($finalInputArr);
	//var_dump($Prod_info);
	// Merchant Salt as provided by Payu
	//$SALT = "RjWAdXh0";
	$receiver_name = '';
	$receiver_mobile = '';
	$receiver_email = '';
	$receiver_address1 = '';
	$receiver_address2 = '';
	$receiver_pincode = '';
	$card_message = '';
	if(isset($prod_info1) && !empty($prod_info1)){
		$receiver_name = $prod_info1['receiver_name'];
		$receiver_mobile = $prod_info1['receiver_mobile'];
		$receiver_email = $prod_info1['receiver_email'];
		$receiver_address1 = $prod_info1['receiver_address1'];
		$receiver_address2 = $prod_info1['receiver_address2'];
		$receiver_pincode = $prod_info1['receiver_pincode'];
		$card_message = $prod_info1['card_message'];
	}
	$SALT = "eCwWELxi";
	//$SALT = "idW2Bj6VBl";
	// End point - change to https://secure.payu.in for LIVE mode
	$PAYU_BASE_URL = "https://test.payu.in";
	//$PAYU_BASE_URL = "https://secure.payu.in";

	

	$posted = array();
	if(!empty($_POST)) {
	  foreach($_POST as $key => $value) {    
		$posted[$key] = $value;
		} 
	  }
	$formError = 0;
	if(empty($posted['txnid'])) {
	  // Generate random transaction id
	  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	} else {
	  $txnid = $posted['txnid'];  
	}
?>
<script>
	var hash = '<?php echo $hash ?>';
	function submitPayuForm() {
	  if(hash == '') {
		return;
	  }
	  var payuForm = document.forms.payuForm;
	  payuForm.submit();

	}
</script>	
<body onload="submitPayuForm()">
<section class="middleSection cmsSection checkoutPage">
	<div class="container">
		<h2 class="heading clearfix">
			<span>Checkout</span>
		</h2><?php ?>
		<div class="checkoutSection">
			<div class="chkProdInfo clearfix"  id="chkProdInfoID">
				<div id="contPro" style="height: 45px; overflow:hidden"> 
				<?php $i=1;
				if(isset($this->session->userdata['prod_arr'])) {
					$prod_arr = $this->session->userdata['prod_arr'];?>
					<div class="cpiLeft ">
					<div class="chkProductName" id="chkProductName_<?=$i?>"><?php if(trim($prod_arr['prod_name'])!=''){ echo $prod_arr['prod_name'];}else{ print_r($productDAta['productname']);}?></div>
					<? if(isset($item['delivery_time']) && $item['delivery_time']!=''){
							$arry1 = explode(' ',$item['delivery_time']); 
							$delType = array_shift($arry1);
							$timeA = implode(' ',$arry1);
							if($delType=='SD'){ $typeI = 'Standard Delivery'; }
							elseif($delType=='EXD'){$typeI = 'Express Delivery'; }
							elseif($delType=='FTD'){$typeI = 'Fixed Time Delivery'; }
							elseif($delType=='MD'){$typeI = 'Midnight Delivery'; }else{ $typeI='';}
						}else{
							$timeA='';
							$typeI='';
						}?>
					<div class="chkDelDetails"><?php if(isset($item['delivery_date']) && $item['delivery_date']!=''){ ?>To be delivered on <?php echo $item['delivery_date'];?>  between <?=$timeA?>. <?=$typeI?><?php }else{ echo "To be delivered on Standard Delivery Date and Time"; } ?></div>
				</div>
				<?php }else{
					foreach($cart as $item){ ?>
						<div class="cpiLeft ">
							<div class="chkProductName" id="chkProductName_<?=$i?>"><?php if(trim($item['name'])!=''){ echo $item['name'];}else{ print_r($productDAta['productname']);}?></div>
							<? if(isset($item['delivery_time']) && $item['delivery_time']!=''){
										$arry1 = explode(' ',$item['delivery_time']); 
										$delType = array_shift($arry1);
										$timeA = implode(' ',$arry1);
										if($delType=='SD'){ $typeI = 'Standard Delivery'; }
										elseif($delType=='EXD'){$typeI = 'Express Delivery'; }
										elseif($delType=='FTD'){$typeI = 'Fixed Time Delivery'; }
										elseif($delType=='MD'){$typeI = 'Midnight Delivery'; }else{ $typeI='';}
									}else{
										$timeA='';
										$typeI='';
									}?>
							<div class="chkDelDetails"><?php if(isset($item['delivery_date']) && $item['delivery_date']!=''){ ?>To be delivered on <?php echo $item['delivery_date'];?>  between <?=$timeA?>. <?=$typeI?><?php }else{ echo "To be delivered on Standard Delivery Date and Time"; } ?></div>
						</div>
				<?php $i++; }} ?>
				</div>
				<div class="cpiRight pull-right"><a href="#" id="MOreViw" class="btn purpleBtn">View more</a></div>
			</div>
			<form class="deliveryDatailForm" action="<?=$action?>" id="buy_now_form" method="post" name="payuForm" >
				<div class="row">
					<div class="col-md-8">
						<div class="smallHeading">Delivery Details</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">Recipients Name<sup class="mandatory">*</sup></label>
									<input class="form-control" id="" name='udf1' placeholder="Enter name" value="<?php echo $receiver_name;?>" type="text" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">Recipients Mobile Number<sup class="mandatory">*</sup></label>
									<input class="form-control" name='udf2' id="" placeholder="Enter mobile number" value="<?php echo $receiver_mobile;?>" type="Number" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">Recipients Address 1<sup class="mandatory">*</sup></label>
									<input class="form-control" name='address1' id="" placeholder="Line 1" value="<?php echo $receiver_address1;?>" type="text" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">Recipients Address 2</label>
									<input class="form-control" name='address2' id="" placeholder="Line 2" value="<?php echo $receiver_address2;?>" type="text">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">Recipients Email Address<sup class="mandatory">*</sup></label>
									<input class="form-control" id="" name='udf3' placeholder="Enter email address" value="<?php echo $receiver_email;?>" type="email" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<!--<label for="">Select Occasion</label>
									<select class="form-control">
										<option>Select occasion</option>
									</select>-->
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">Select Country<sup class="mandatory">*</sup></label>
									<!--<select name='rcon' class="form-control">
										<option>Select country</option>
										<option value="India">India</option>
									</select>-->
									<input type="text"  class="form-control" name="country" value="India" readonly>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">Select City<sup class="mandatory">*</sup></label>
									<!--<select name='rcity' class="form-control">
										<option>Select city</option>
										<option value="Pune">Pune</option>
									</select>-->
									<input type="text"  class="form-control" name="city" value="Pune" readonly>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">Pincode<sup class="mandatory">*</sup></label>
									<input class="form-control" id="" name="zipcode" placeholder="Enter pincde" value="<?php echo $receiver_pincode;?>" type="Number" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">Message on Card</label>
									<input class="form-control" id="" name='udf4' placeholder="Enter message" value="<?php echo $card_message;?>" type="text">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<?php 
							if(isset($userLoIDArr['USER_SESS_ID']) && $userLoIDArr['USER_SESS_ID']!=''){
								$sql = "SELECT * from users WHERE user_pk_id=".$userLoIDArr['USER_SESS_ID'];
								$query = $this->db->query($sql);
								 
								$ret = $query->row();
								//print_r($ret);
								$userName = $ret->user_first_name;
								$userEmail = $ret->user_email;
								$userCont = $ret->user_contact;

							}else{
								$userName = $name;
								$userEmail = $email;
								$userCont = $phone;
							}
						?>
						<?php if(!isset($userLoIDArr['USER_SESS_ID']) || $userLoIDArr['USER_SESS_ID']==''){?>
						<div class="senderDetails">
							<p>Already Registered User? Click here to login </p>
							<a href="#" data-toggle="modal" class="btn purpleBtn" data-target="#loginModal">Login</a>
						</div>
						<?php } ?>
						<div class="senderDetails">
							<div class="smallHeading">Sender Details</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Your name<sup class="mandatory">*</sup></label>
								<input class="form-control" name="name" value="<?php echo $userName;?>" placeholder="Enter name" type="text" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Mobile Number<sup class="mandatory">*</sup></label>
								<input class="form-control" name="phone" value="<?php echo $userCont;?>" placeholder="Enter number" type="number" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email Address<sup class="mandatory">*</sup></label>
								<input class="form-control" name="email" value="<?php echo $userEmail;?>" placeholder="Enter email" type="email" required>
							</div>
						</div>
					</div>
				</div>
				<div class="formBtnHolder text-center">
					<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
					<input type="hidden" name="productinfo" value="<?php echo htmlspecialchars($Prod_info); ?>" />
					<input type="hidden" name="hash" value="<?php echo $hash;?>"/>
					<input type="hidden" name="txnid" value="<?php echo $txnid;?>" />	  
					<input type="hidden" name="amount" value="<?php echo $grand_total;?>" />
					<input type="hidden" name="surl" value="<?php echo base_url();?>products/payment_success" />
					<input type="hidden" name="furl" value="<?php echo base_url();?>products/payment_failure" />
					<input type="hidden" name="service_provider" value="mss" />
					<!--<input type="hidden" name="service_provider" value="payu_paisa" />--->
					<!--optional Values-->
					<input type="hidden" name="lastname" value="" />
					<!--<input type="hidden" name="udf1" value="" />				  	
					<input type="hidden" name="udf2" value="" />				  	
					<input type="hidden" name="udf3" value="" />			  	
					<input type="hidden" name="udf4" value="" />-->					  	
					<input type="hidden" name="udf5" value="1001" />				  	
					<!--<input type="hidden" name="address1" value="" />
					<input type="hidden" name="address2" value="" />
					<input type="hidden" name="city" value="" />-->
					<!--<input type="hidden" name="state" value="" />
					<input type="hidden" name="country" value="" />	
					<input type="hidden" name="zipcode" value="" />-->
					<button type="submit" class="btn purpleBtn" value="PayNow">Save & Continue</button>
				</div>
			
		</div>
	</div>
</section>