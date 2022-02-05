<?php // Merchant key here as provided by Payu
	/*$MERCHANT_KEY = "gtKFFx";
	// Merchant product info.
	// Populate name, merchantId, description, value, commission parameters as per your code logic; in case of multiple splits pass multiple json objects in paymentParts
	$firstSplitArr = array("name"=>"splitID1","value"=>"6","merchantId"=>"396446","description"=>"test description","commission"=>"2");
	$paymentPartsArr = array($firstSplitArr);	
	$finalInputArr = array("paymentParts" => $paymentPartsArr);
	$Prod_info = json_encode($finalInputArr);
	//var_dump($Prod_info);
	// Merchant Salt as provided by Payu
	//$SALT = "RjWAdXh0";
	$SALT = "eCwWELxi";
	// End point - change to https://secure.payu.in for LIVE mode
	$PAYU_BASE_URL = "https://test.payu.in";

	

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
	}*/
?>
<script>
	/*var hash = '<?php echo $hash ?>';
	function submitPayuForm() {
	  if(hash == '') {
		return;
	  }
	  var payuForm = document.forms.payuForm;
	  payuForm.submit();

	}*/
</script>	
<!--<body onload="submitPayuForm()">-->
<section class="middleSection productDetailsPage">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-5">
				<div id="productDetailImage">
					<?php 
						if(!empty($product_images)){
							$prod_img = base_url().'assets/images/product_image/'.$product_images[0]['file_name'];
						}else{
							$prod_img =base_url().'assets/frontend/img/product1.jpg';
						}
					?>
					<img src="<?php echo $prod_img; ?>" id="productZoom" data-zoom-image="<?php echo $prod_img; ?>">
				</div>
				<div class="productThumbImg clearfix">
					<div class="smallHeading">Pick an upgrade</div>
					<ul class="list-unstyled">
						<?php 
						if(isset($product_images) && !empty($product_images)){ 
							for($i=1;$i<count($product_images);$i++){ ?> 
								<li>
									<a href="#">
										<div class="ptImg"><img src="<?php echo base_url(); ?>assets/images/product_image/thumb/<?php echo $product_images[$i]['file_name'];?>"></div>
										<!--<div class="ptSize">1 kg</div>
										<div class="ptAmount">&#8377; 1,234</div>-->
									</a>
								</li>
							<?php }
						}	?>
						
					</ul>
				</div>
			</div> 
			
			<div class="col-md-7 col-sm-7">
				
					<div class="productDetailInfo"><!-- Product Detail Info Start -->
							<div class="prodName"><?=$product_data[0]['product_name'];?>
							<span class="productCode" id="productCode" rel="<?=$product_data[0]['product_pk_id'];?>">#<?=$product_data[0]['product_pk_id'];?></span></div>
							<hr>
							<div class="prodAmt">&#8377; <?=$product_data[0]['price'];?></div>
							<hr>
							<form action="<?php echo base_url(); ?>shopping/add" id="add_to_cart_form" method='POST'>
							<div class="checkAvailability clearfix">
								<strong>Check Availability</strong>
								<div class="input-group">
								  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
								  <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter pincode" aria-describedby="basic-addon1">
								 
								  <p class="product_id" ></p>
								</div>
								 <span class="dstatus"></span>
							</div>
							<hr>
							<div class="deliveryOption">
								<label>Delivery Option</label>
								<div class="row">
									<div class="col-md-5">
										<input type="text" name="delivery_date" id="delivery_date" class="form-control datepicker" placeholder="Select Delivery Date">
										<p class="ddate"></p>
									</div>
									<div class="col-md-5">
										<select class="form-control clockpicker" name="delivery_time">
											<option value=""><b>Select Delivery Type</b></option>
											<option disabled="disabled"><b>Standard Delivery</b></option>
											<option value="SD 06:00 - 21:00 Hrs">06:00 - 21:00 Hrs</option>
											<option value="SD 08:00 - 12:00 Hrs">08:00 - 12:00 Hrs</option>
											<option value="SD  08:00 - 14:00 Hrs">08:00 - 14:00 Hrs</option>
											<option value="SD 12:00 - 15:00 Hrs">12:00 - 15:00 Hrs</option>
											<option disabled="disabled"><b style="color: #000">Express Delivery</b></option>
											<option value="EXD Two hours">Two hours before the delivery</option>
											<option disabled="disabled"><b style="color: #000">Fixed Time Delivery</b></option>
											<option value="FTD 10:00 - 11:00 Hrs">10:00 - 11:00 Hrs</option>
											<option value="FTD 11:00 - 12:00 Hrs">11:00 - 12:00 Hrs</option>
											<option value="FTD 12:00 - 13:00 Hrs">12:00 - 13:00 Hrs</option>
											<option value="FTD 13:00 - 14:00 Hrs">13:00 - 14:00 Hrs</option>
											<option disabled="disabled"><b style="color: #000">Midnight Delivery</b></option>
											<option value="MD 23:00 - 23:59 Hrs">23:00 - 23:59 Hrs</option>
											
										</select>
										<p class="dtime"></p>
									</div>
								</div>
							</div>
							<hr>
							
								<div class="productDetailOption clean pull-left" style="width: 150px">
									<input type="hidden" name="id" id="product_id" value="<?php echo $product_data[0]['product_pk_id']?>">
									<input type="hidden" name="name" value="<?php echo $product_data[0]['product_name']?>">
									<input type="hidden" name="price" value="<?php echo $product_data[0]['price']?>">
									<button type="submit" class="btn purpleBtn" value="Add to Cart" name="action"><i class="fa fa-shopping-cart" ></i> Add to cart</button>
								</div>
						   </form>		
						   <?php $action = base_url()."shopping/billing_view"?>
						<form action="<?php echo $action; ?>" id="buy_now_form" method="post" name="payuForm" >
							<input type="hidden" name="direct" value="yesDirect" />
							<input type="hidden" name="id" id="product_id" value="<?php echo $product_data[0]['product_pk_id']?>">
							<input type="hidden" name="prod_name" value="<?php echo $product_data[0]['product_name']?>">
						    <input type="hidden" name="price" value="<?php echo $product_data[0]['price']?>">
							  <!--<input type="hidden" name="product_Name" value="<?=$product_data[0]['product_name']?>" />
							  <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
							  <input type="hidden" name="productinfo" value="<?php echo htmlspecialchars($Prod_info); ?>" />
							  <input type="hidden" name="hash" value="<?php echo $hash;?>"/>
							  <input type="hidden" name="txnid" value="<?php echo $txnid;?>" />	  
							  <input type="hidden" name="amount" value="<?php echo $product_data[0]['price'];?>" />
							  <input type="hidden" name="firstname" value="rohit" />
							  <input type="hidden" name="phone" value="1111111111" />	
							  <input type="hidden" name="email" value="rohit@gmail.com" />
							  <input type="hidden" name="surl" value="<?php echo base_url();?>products/payment_success" />
							  <input type="hidden" name="furl" value="<?php echo base_url();?>products/payment_failure" />
							  <input type="hidden" name="service_provider" value="mss" />
							  <input type="hidden" name="lastname" value="" />
							  <input type="hidden" name="udf1" value="" />				  	
							  <input type="hidden" name="udf2" value="" />				  	
							  <input type="hidden" name="udf3" value="" />				  	
							  <input type="hidden" name="udf4" value="" />				  	
							  <input type="hidden" name="udf5" value="1001" />				  	
							  <input type="hidden" name="address1" value="" />
							  <input type="hidden" name="address2" value="" />
							  <input type="hidden" name="city" value="" />
							  <input type="hidden" name="state" value="" />
							  <input type="hidden" name="country" value="" />	
							  <input type="hidden" name="zipcode" value="" />-->
							  <button type="submit" class="btn purpleBtn" value="PayNow"><i class="fa fa-play"></i> Buy now</button>
						</form>
						</div>
						<hr>
						<div class="prodTabSection"><!-- Product Tab Section Start -->
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#Description" aria-controls="Description" role="tab" data-toggle="tab">Description</a></li>
								<li role="presentation"><a href="#DeliveryInformation" aria-controls="DeliveryInformation" role="tab" data-toggle="tab">Delivery Information</a></li>
								<li role="presentation"><a href="#CareInstructions" aria-controls="CareInstructions" role="tab" data-toggle="tab">Care Instructions</a></li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="Description">
									<div class="prodDesc">
										<?=$product_data[0]['product_desc'];?>
									</div>
								</div>
								
								<div role="tabpanel" class="tab-pane" id="DeliveryInformation">
									<?php echo $product_data[0]['delInfo'];?>
								</div>
								
								<div role="tabpanel" class="tab-pane" id="CareInstructions">
									<?php echo $product_data[0]['care'];?>
								</div>
							</div>
						</div><!-- Product Tab Section End -->
					</div><!-- Product Detail Info End -->
			</div>
		</div>
	</div>

	<div class="productSliderDiv"><!-- Product Slider Div Start -->
		<div class="container">
			<div class="productSlider">
				<div class="sliderFilterOptions clearfix">
					<ol class="breadcrumb pull-left">
					   <li><a href="#">Home</a></li>
					   <li class="active">Best Sellers</li>
					</ol>
				</div>
				<div class="owl-carousel owl-theme" id="similarProductSlider">
					<div class="item">
						<a href="product-details.html" class="productImg"><img src="<?php echo base_url(); ?>assets/frontend/img/product1.jpg"></a>
						<div class="productInfo clearfix">
							<div class="piLeft">
								<div class="prductName">Product Name</div>
								<div class="prductPrice">&#8377; 123</div>
							</div>
							<div class="piRight"><a href="#" class="piAddCart" data-toggle="tooltip" title="Add to cart"><img src="<?php echo base_url(); ?>assets/frontend/img/cart-icon.png"></a></div>
						</div>
					</div>
					<div class="item">
						<a href="product-details.html" class="productImg"><img src="<?php echo base_url(); ?>assets/frontend/img/product2.jpg"></a>
						<div class="productInfo clearfix">
							<div class="piLeft">
								<div class="prductName">Product Name</div>
								<div class="prductPrice">&#8377; 123</div>
							</div>
							<div class="piRight"><a href="#" class="piAddCart" data-toggle="tooltip" title="Add to cart"><img src="<?php echo base_url(); ?>assets/frontend/img/cart-icon.png"></a></div>
						</div>
					</div>
					<div class="item">
						<a href="product-details.html" class="productImg"><img src="<?php echo base_url(); ?>assets/frontend/img/product3.jpg"></a>
						<div class="productInfo clearfix">
							<div class="piLeft">
								<div class="prductName">Product Name</div>
								<div class="prductPrice">&#8377; 123</div>
							</div>
							<div class="piRight"><a href="#" class="piAddCart" data-toggle="tooltip" title="Add to cart"><img src="<?php echo base_url(); ?>assets/frontend/img/cart-icon.png"></a></div>
						</div>
					</div>
					<div class="item">
						<a href="product-details.html" class="productImg"><img src="<?php echo base_url(); ?>assets/frontend/img/product4.jpg"></a>
						<div class="productInfo clearfix">
							<div class="piLeft">
								<div class="prductName">Product Name</div>
								<div class="prductPrice">&#8377; 123</div>
							</div>
							<div class="piRight"><a href="#" class="piAddCart" data-toggle="tooltip" title="Add to cart"><img src="<?php echo base_url(); ?>assets/frontend/img/cart-icon.png"></a></div>
						</div>
					</div>
					<div class="item">
						<a href="product-details.html" class="productImg"><img src="<?php echo base_url(); ?>assets/frontend/img/product5.jpg"></a>
						<div class="productInfo clearfix">
							<div class="piLeft">
								<div class="prductName">Product Name</div>
								<div class="prductPrice">&#8377; 123</div>
							</div>
							<div class="piRight"><a href="#" class="piAddCart" data-toggle="tooltip" title="Add to cart"><img src="<?php echo base_url(); ?>assets/frontend/img/cart-icon.png"></a></div>
						</div>
					</div>
					<div class="item">
						<a href="product-details.html" class="productImg"><img src="<?php echo base_url(); ?>assets/frontend/img/product1.jpg"></a>
						<div class="productInfo clearfix">
							<div class="piLeft">
								<div class="prductName">Product Name</div>
								<div class="prductPrice">&#8377; 123</div>
							</div>
							<div class="piRight"><a href="#" class="piAddCart" data-toggle="tooltip" title="Add to cart"><img src="<?php echo base_url(); ?>assets/frontend/img/cart-icon.png"></a></div>
						</div>
					</div>
					<div class="item">
						<a href="product-details.html" class="productImg"><img src="<?php echo base_url(); ?>assets/frontend/img/product2.jpg"></a>
						<div class="productInfo clearfix">
							<div class="piLeft">
								<div class="prductName">Product Name</div>
								<div class="prductPrice">&#8377; 123</div>
							</div>
							<div class="piRight"><a href="#" class="piAddCart" data-toggle="tooltip" title="Add to cart"><img src="<?php echo base_url(); ?>assets/frontend/img/cart-icon.png"></a></div>
						</div>
					</div>
					<div class="item">
						<a href="product-details.html" class="productImg"><img src="<?php echo base_url(); ?>assets/frontend/img/product3.jpg"></a>
						<div class="productInfo clearfix">
							<div class="piLeft">
								<div class="prductName">Product Name</div>
								<div class="prductPrice">&#8377; 123</div>
							</div>
							<div class="piRight"><a href="#" class="piAddCart" data-toggle="tooltip" title="Add to cart"><img src="<?php echo base_url(); ?>assets/frontend/img/cart-icon.png"></a></div>
						</div>
					</div>
					<div class="item">
						<a href="product-details.html" class="productImg"><img src="<?php echo base_url(); ?>assets/frontend/img/product4.jpg"></a>
						<div class="productInfo clearfix">
							<div class="piLeft">
								<div class="prductName">Product Name</div>
								<div class="prductPrice">&#8377; 123</div>
							</div>
							<div class="piRight"><a href="#" class="piAddCart" data-toggle="tooltip" title="Add to cart"><img src="<?php echo base_url(); ?>assets/frontend/img/cart-icon.png"></a></div>
						</div>
					</div>
					<div class="item">
						<a href="product-details.html" class="productImg"><img src="<?php echo base_url(); ?>assets/frontend/img/product5.jpg"></a>
						<div class="productInfo clearfix">
							<div class="piLeft">
								<div class="prductName">Product Name</div>
								<div class="prductPrice">&#8377; 123</div>
							</div>
							<div class="piRight"><a href="#" class="piAddCart" data-toggle="tooltip" title="Add to cart"><img src="<?php echo base_url(); ?>assets/frontend/img/cart-icon.png"></a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- Product Slider Div End -->
</section>
<!-- Middle Section End -->
<script>

</script>