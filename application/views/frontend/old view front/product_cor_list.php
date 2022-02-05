
<!-- Middle Section Start -->
<section class="middleSection productListingPage corporateProdListPage">
	<div class="productListingBanner" style="background:url(<?php echo base_url()?>assets/frontend/img/banner1.jpg);">
		<div class="container">
			<div class="col-md-6 col-md-offset-6">
				<div class="plbTitle">Best Corporate Product</div>
				<div class="plbDesc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
				standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
				It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was 
				popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing 
				software like Aldus PageMaker including versions of Lorem Ipsum.</div>
			</div>
		</div>
	</div>
	<div class="productListingOtr">
		<div class="productListing corpProdListing">
			<div class="container">
				<h2 class="heading clearfix">
					<span>Best Seller Corporate Gifts</span>
				</h2>
				<div class="row">
					<?php foreach($product_dataBSCG as $Products){ 
							$product_images = $this->product_model->get_product_images($Products['product_pk_id']);
							if(!empty($product_images)){
								$prod_img = base_url().'assets/images/product_image/thumb/'.$product_images[0]['file_name'];
							}else{
								$prod_img =base_url().'assets/frontend/img/product1.jpg';
							}
					?>
					<!--<div class="col-md-3">
						<div class="item">
							<a href="<?php echo base_url(); ?>Products/details/<?=$Products['product_name']?>/<?=$Products['product_pk_id']?>" class="productImg">
								<img src="<?php echo $prod_img; ?>">
							</a>
							<div class="productInfo clearfix">
								<div class="piLeft">
									<div class="prductName"><?=$Products['product_name']?></div>
									<div class="prductPrice">Rs. <?=$Products['price'];?></div>
								</div>
								<div class="piRight"><a href="#" class="piAddCart" data-toggle="tooltip" title="Add to cart"><img src="<?php echo base_url(); ?>assets/frontend/img/cart-icon.png"></a></div>
							</div>
						</div>
					</div>-->
					<div class="col-md-3">
						<div class="item">
							<a href="<?php echo base_url(); ?>Products/corporate_details/<?=$Products['product_name']?>/<?=$Products['product_pk_id']?>" class="productImg">
								<img src="<?php echo $prod_img; ?>">
							</a>
							<div class="productInfo">
								<div class="prductName"><?=$Products['product_name']?></div>
								<a href="<?php echo base_url(); ?>Products/corporate_details/<?=$Products['product_name']?>/<?=$Products['product_pk_id']?>" class="btn grayBtn"><i class="fa fa-eye"></i> View more</a>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="fullWidthBanner banner1"><!-- Banner1 Start -->
			<div class="container text-center">
				<div class="fwbHeading">Exclusive Collection of Imported Flowers</div>
				<a href="#" class="btn fwbBtn">Shop Now</a>
			</div>
		</div><!-- Banner1 End -->
		
		<div class="productListing corpProdListing">
			<div class="container">
				<h2 class="heading clearfix">
					<span>Corporate Gifting Ideas</span>
				</h2>
				<div class="row">
										<?php foreach($product_dataBGI as $Products){ 
							$product_images = $this->product_model->get_product_images($Products['product_pk_id']);
							if(!empty($product_images)){
								$prod_img = base_url().'assets/images/product_image/thumb/'.$product_images[0]['file_name'];
							}else{
								$prod_img =base_url().'assets/frontend/img/product1.jpg';
							}
					?>
					<div class="col-md-3">
						<div class="item">
							<a href="<?php echo base_url(); ?>Products/details/<?=$Products['product_name']?>/<?=$Products['product_pk_id']?>" class="productImg">
								<img src="<?php echo $prod_img; ?>">
							</a>
							<div class="productInfo clearfix">
								<div class="piLeft">
									<div class="prductName"><?=$Products['product_name']?></div>
									<div class="prductPrice">Rs. <?=$Products['price'];?></div>
								</div>
								<div class="piRight"><a href="#" class="piAddCart" data-toggle="tooltip" title="Add to cart"><img src="<?php echo base_url(); ?>assets/frontend/img/cart-icon.png"></a></div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>	
</section>
<!-- Middle Section End -->
</html>