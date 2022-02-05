<?php 
	if(!empty($product_images)){
		$prod_img = base_url().'assets/images/product_image/'.$product_images[0]['file_name'];
	}else{
		$prod_img =base_url().'assets/frontend/img/product-main-image.jpg';
	}
?>
<section class="middleSection productDetailsPage corporateProdFormPage">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-5">
				<div id="productDetailImage">
					<img src="<?php echo $prod_img; ?>">
				</div>
			</div> 
			
			<div class="col-md-7 col-sm-7">
				<div class="productDetailInfo"><!-- Product Detail Info Start -->
					<div class="prodName"><?=$product_data[0]['product_name'];?></div>
					<hr>
					<div class="corpProdDesc">
						<label>Description:</label>
						<p><?=$product_data[0]['product_desc'];?></p>
					</div>
					<hr>
					<div class="corpProdForm">
						<form action="<?php echo base_url(); ?>products/corporate_details" id="corporate_form" method='POST'>
							<div class="form-group">
								<input type="text" class="form-control" name="name" placeholder="Contact Person" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="contact_no" placeholder="Contact Number" required>
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email" placeholder="Your Email" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="quantity" placeholder="Quantity Min 5" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="company_name" placeholder="Company Name" required>
							</div>
							<input type="hidden" name="id" id="product_id" value="<?php echo $product_data[0]['product_pk_id']?>">
							<input type="submit" class="btn purpleBtn" value="Submit">
						</form>
					</div>
				</div><!-- Product Detail Info End -->
			</div>
		</div>
	</div>
</section>