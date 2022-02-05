
<!-- Banner Slider Start -->
<div id="carousel-example-generic" class="carousel slide homeBanner" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		<li data-target="#carousel-example-generic" data-slide-to="2"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img src="<?php echo base_url(); ?>assets/frontend/img/banner1.jpg">
			<div class="carousel-caption"></div>
		</div>
		<div class="item">
			<img src="<?php echo base_url(); ?>assets/frontend/img/banner2.jpg">
			<div class="carousel-caption"></div>
		</div>
		<div class="item">
			<img src="<?php echo base_url(); ?>assets/frontend/img/banner3.jpg">
			<div class="carousel-caption"></div>
		</div>
	</div>

	<!-- Controls -->
	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<!-- Banner Slider End -->


<!-- Middle Section Start -->
<section class="middleSection">
	<div class="productSliderDiv"><!-- Product Slider Div Start -->
		<div class="container">
			<div class="productSlider">
				<div class="sliderFilterOptions clearfix">
					<ol class="breadcrumb pull-left">
					   <li><a href="#">Home</a></li>
					   <li class="active">Best Sellers</li>
					</ol>
				</div>
				<div class="owl-carousel owl-theme" id="bestSellerSlider">
					<?php 
						$sql ="select * from category where category_type_fk_id=1";
						$query = $this->db->query($sql);
						foreach($query->result() as $CA) {
							$CA->category_pk_id;		
							$sql ="select product.*,status.*,category.category_name FROM product Join status on status.status_pk_id = product.product_status join category on category.category_pk_id = product.category_fk_id where product.category_fk_id=".$CA->category_pk_id;
							$query1 = $this->db->query($sql);

							foreach($query1->result() as $pr) {
								$sql1 = "select * from product_images where product_fk_id=".$pr->product_pk_id;
								$query22 = $this->db->query($sql1);
								if ($query22->num_rows() > 0){
									$abc = $query22->row();
									$img = 'images/product_image/thumb/'.$abc->file_name;}else{ $img = 'frontend/img/product1.jpg';
								
								} 
					?>
					
					<div class="item">
						<a href="<?php echo base_url(); ?>Products/details/<?=$pr->product_name;?>/<?=$pr->product_pk_id;?>" class="productImg"><img src="<?php echo base_url(); ?>assets/<?=$img;?>"></a>
						<div class="productInfo clearfix">
							<div class="piLeft">
								<div class="prductName"><?=$pr->product_name;?></div>
								<div class="prductPrice">&#8377; <?=$pr->price?></div>
							</div>
							<div class="piRight">
							<form action="<?php echo base_url(); ?>shopping/add" id="add_to_cart_form" method='POST'>
								<div class="productDetailOption clean pull-left" >
									<input type="hidden" name="id" id="product_id" value="<?php echo $pr->product_pk_id?>">
									<input type="hidden" name="name" value="<?php echo $pr->product_name?>">
									<input type="hidden" name="price" value="<?php echo $pr->price?>">
									<button type="submit" class="piAddCart" data-toggle="tooltip" title="Add to cart" value="Add to Cart" name="action"><img src="<?php echo base_url(); ?>assets/frontend/img/cart-icon.png"></button>
								</div>
						   </form>
						   </div>
							
						</div>
					</div>
					<?php 	}
						}  ?>
					
				</div>
			</div>
		</div>
	</div><!-- Product Slider Div End -->
	
	<div class="fullWidthBanner banner1"><!-- Banner1 Start -->
		<div class="container text-center">
			<div class="fwbHeading">Exclusive Collection of Imported Flowers</div>
			<!--<a href="#" class="btn fwbBtn">Shop Now</a>-->
		</div>
	</div><!-- Banner1 End -->
	
	<div class="productSliderDiv"><!-- Product Slider Div Start -->
		<div class="container">
			<div class="productSlider">
				<div class="sliderFilterOptions clearfix">
					<ol class="breadcrumb pull-left">
					   <li><a href="#">Home</a></li>
					   <li class="active">Birthday</li>
					</ol>
				</div>
				<div class="owl-carousel owl-theme" id="birthdaySlider">
					<?php 
						$sql ="select * from category where category_type_fk_id=2";
						$query = $this->db->query($sql);
						foreach($query->result() as $CA) {
							$CA->category_pk_id;		
							$sql ="select product.*,status.*,category.category_name FROM product Join status on status.status_pk_id = product.product_status join category on category.category_pk_id = product.category_fk_id where product.category_fk_id=".$CA->category_pk_id;
							$query1 = $this->db->query($sql);

							foreach($query1->result() as $pr) {
								$sql1 = "select * from product_images where product_fk_id=".$pr->product_pk_id;
								$query22 = $this->db->query($sql1);
								if ($query22->num_rows() > 0){
									$abc = $query22->row();
									$img = 'images/product_image/thumb/'.$abc->file_name;}else{ $img = 'frontend/img/product1.jpg';
								
								} 
					?>
					
					<div class="item">
						<a href="<?php echo base_url(); ?>Products/details/<?=$pr->product_name;?>/<?=$pr->product_pk_id;?>" class="productImg"><img src="<?php echo base_url(); ?>assets/<?=$img;?>"></a>
						<div class="productInfo clearfix">
							<div class="piLeft">
								<div class="prductName"><?=$pr->product_name;?></div>
								<div class="prductPrice">&#8377; <?=$pr->price?></div>
							</div>
							<div class="piRight"><a href="#" class="piAddCart" data-toggle="tooltip" title="Add to cart"><img src="<?php echo base_url(); ?>assets/frontend/img/cart-icon.png"></a></div>
						</div>
					</div>
					<?php 	}
						}  ?>
				</div>
			</div>
		</div>
	</div><!-- Product Slider Div End -->
	
	<div class="fullWidthBanner banner2"><!-- Banner2 Start -->
		<div class="container text-center">
			<div class="fwbHeading">Gift your Special a fresh breeze of love</div>
			<!--<a href="#" class="btn fwbBtn">Order Now</a>-->
		</div>
	</div><!-- Banner2 End -->
	
	<div class="productSliderDiv"><!-- Product Slider Div Start -->
		<div class="container">
			<div class="productSlider">
				<div class="sliderFilterOptions clearfix">
					<ol class="breadcrumb pull-left">
					   <li><a href="#">Home</a></li>
					   <li class="active">Anniversary</li>
					</ol>
				</div>
				<div class="owl-carousel owl-theme" id="anniversarySlider">
					<?php 
						$sql ="select * from category where category_type_fk_id=3";
						$query = $this->db->query($sql);
						foreach($query->result() as $CA) {
							$CA->category_pk_id;		
							$sql ="select product.*,status.*,category.category_name FROM product Join status on status.status_pk_id = product.product_status join category on category.category_pk_id = product.category_fk_id where product.category_fk_id=".$CA->category_pk_id;
							$query1 = $this->db->query($sql);

							foreach($query1->result() as $pr) {
								$sql1 = "select * from product_images where product_fk_id=".$pr->product_pk_id;
								$query22 = $this->db->query($sql1);
								if ($query22->num_rows() > 0){
									$abc = $query22->row();
									$img = 'images/product_image/thumb/'.$abc->file_name;}else{ $img = 'frontend/img/product1.jpg';
								
								} 
					?>
					
					<div class="item">
						<a href="<?php echo base_url(); ?>Products/details/<?=$pr->product_name;?>/<?=$pr->product_pk_id;?>" class="productImg"><img src="<?php echo base_url(); ?>assets/<?=$img;?>"></a>
						<div class="productInfo clearfix">
							<div class="piLeft">
								<div class="prductName"><?=$pr->product_name;?></div>
								<div class="prductPrice">&#8377; <?=$pr->price?></div>
							</div>
							<div class="piRight"><a href="#" class="piAddCart" data-toggle="tooltip" title="Add to cart"><img src="<?php echo base_url(); ?>assets/frontend/img/cart-icon.png"></a></div>
						</div>
					</div>
					<?php 	}
						}  ?>
				</div>
			</div>
		</div>
	</div><!-- Product Slider Div End -->
	
	<div class="fullWidthBanner banner3"><!-- Banner3 Start -->
		<div class="container text-center">
			<div class="fwbHeading">Choose from a wide variety of Personalised Gift options</div>
			<!---<a href="#" class="btn fwbBtn">Buy Now</a>-->
		</div>
	</div><!-- Banner3 End -->
	
	<div class="productSliderDiv"><!-- Product Slider Div Start -->
		<div class="container">
			<div class="productSlider">
				<div class="sliderFilterOptions clearfix">
					<ol class="breadcrumb pull-left">
					   <li><a href="#">Home</a></li>
					   <li class="active"> Valentine's</li>
					</ol>
				</div>
				<div class="owl-carousel owl-theme" id="giftSlider">
					<?php 
						$sql ="select * from category where category_type_fk_id=4";
						$query = $this->db->query($sql);
						foreach($query->result() as $CA) {
							$CA->category_pk_id;		
							$sql ="select product.*,status.*,category.category_name FROM product Join status on status.status_pk_id = product.product_status join category on category.category_pk_id = product.category_fk_id where product.category_fk_id=".$CA->category_pk_id;
							$query1 = $this->db->query($sql);

							foreach($query1->result() as $pr) {
								$sql1 = "select * from product_images where product_fk_id=".$pr->product_pk_id;
								$query22 = $this->db->query($sql1);
								if ($query22->num_rows() > 0){
									$abc = $query22->row();
									$img = 'images/product_image/thumb/'.$abc->file_name;}else{ $img = 'frontend/img/product1.jpg';
								
								} 
					?>
					
					<div class="item">
						<a href="<?php echo base_url(); ?>Products/details/<?=$pr->product_name;?>/<?=$pr->product_pk_id;?>" class="productImg"><img src="<?php echo base_url(); ?>assets/<?=$img;?>"></a>
						<div class="productInfo clearfix">
							<div class="piLeft">
								<div class="prductName"><?=$pr->product_name;?></div>
								<div class="prductPrice">&#8377; <?=$pr->price?></div>
							</div>
							<div class="piRight"><a href="#" class="piAddCart" data-toggle="tooltip" title="Add to cart"><img src="<?php echo base_url(); ?>assets/frontend/img/cart-icon.png"></a></div>
						</div>
					</div>
					<?php 	}
						}  ?>
				</div>
			</div>
		</div>
	</div><!-- Product Slider Div End -->
	
	<div class="fullWidthBanner banner4"><!-- Banner4 Start -->
		<div class="container text-center">
			<div class="fwbHeading">Get Special discounts on Bundled Orders</div>
			<!--<a href="#" class="btn fwbBtn">Book Now</a>-->	
		</div>
	</div><!-- Banner4 End -->
	
	<div class="productSliderDiv"><!-- Product Slider Div Start -->
		<div class="container">
			<div class="productSlider">
				<div class="sliderFilterOptions clearfix">
					<ol class="breadcrumb pull-left">
					   <li><a href="#">Home</a></li>
					   <li class="active">Gift</li>
					</ol>
				</div>
				<div class="owl-carousel owl-theme" id="eventSlider">
					<?php 
						$sql ="select * from category where category_type_fk_id=5";
						$query = $this->db->query($sql);
						foreach($query->result() as $CA) {
							$CA->category_pk_id;		
							$sql ="select product.*,status.*,category.category_name FROM product Join status on status.status_pk_id = product.product_status join category on category.category_pk_id = product.category_fk_id where product.category_fk_id=".$CA->category_pk_id;
							$query1 = $this->db->query($sql);

							foreach($query1->result() as $pr) {
								$sql1 = "select * from product_images where product_fk_id=".$pr->product_pk_id;
								$query22 = $this->db->query($sql1);
								if ($query22->num_rows() > 0){
									$abc = $query22->row();
									$img = 'images/product_image/thumb/'.$abc->file_name;}else{ $img = 'frontend/img/product1.jpg';
								
								} 
					?>
					
					<div class="item">
						<a href="<?php echo base_url(); ?>Products/details/<?=$pr->product_name;?>/<?=$pr->product_pk_id;?>" class="productImg"><img src="<?php echo base_url(); ?>assets/<?=$img;?>"></a>
						<div class="productInfo clearfix">
							<div class="piLeft">
								<div class="prductName"><?=$pr->product_name;?></div>
								<div class="prductPrice">&#8377; <?=$pr->price?></div>
							</div>
							<div class="piRight"><a href="#" class="piAddCart" data-toggle="tooltip" title="Add to cart"><img src="<?php echo base_url(); ?>assets/frontend/img/cart-icon.png"></a></div>
						</div>
					</div>
					<?php 	}
						}  ?>
				</div>
			</div>
		</div>
	</div><!-- Product Slider Div End -->
</section>
<!-- Middle Section End -->
