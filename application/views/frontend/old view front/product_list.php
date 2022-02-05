<?php //print_r($product_data); die;?>
<!-- Middle Section Start -->
<section class="middleSection productListingPage">
	<div class="productListingBanner" style="background:url(<?php echo base_url(); ?>assets/frontend/img/banner1.jpg);">
		<div class="container">
			<div class="col-md-6 col-md-offset-6">
				<div class="plbTitle">Buy Best Flowers Online</div>
				<div class="plbDesc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
				standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
				It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was 
				popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing 
				software like Aldus PageMaker including versions of Lorem Ipsum.</div>
			</div>
		</div>
	</div>
	<div class="productListingOtr">
		<div class="container">
			<div class="plFilter clearfix">
				<ol class="clean breadcrumb pull-left">
				   <li><a href="#">Home</a></li>
				   <li class="active">Flowers</li>
				</ol>
				<div class="sortby pull-right">
					<select class="form-control" id="sort_by"  onchange="sort_products()">
						<option>Sort by</option>
						<option value="new" <?php echo (isset($sort_val) && $sort_val=='new')?'selected':'';?>>New</option>
						<option value="low_to_high" <?php echo(isset($sort_val) && $sort_val=='low_to_high')?'selected':'';?>>Price: Low to High</option>
						<option value="high_to_low" <?php echo (isset($sort_val) && $sort_val=='high_to_low')?'selected':'';?>>Price: High to Low</option>
					</select>
				</div>
			</div>
			<div class="filterNav clearfix">
				<ul class="clean nav filterNavMenu pull-left">
					<li class="dropdown mega-dropdown">
						<a href="#" class="dropdown-toggle">Gift Type <span class="caret"></span></a>				
						<ul class="dropdown-menu mega-dropdown-menu">
							<li class="col-sm-3 col-xs-3">
								<ul>
									<li class="dropdown-header">Main Category</li>
									<li><a href="#">Subcategory 1</a></li>
									<li><a href="#">Subcategory 2</a></li>
									<li><a href="#">Subcategory 3</a></li>
									<li><a href="#">Subcategory 4</a></li>
									<li><a href="#">Subcategory 5</a></li>
								</ul>
							</li>
							<li class="col-sm-3 col-xs-3">
								<ul>
									<li class="dropdown-header">Main Category</li>
									<li><a href="#">Subcategory 1</a></li>
									<li><a href="#">Subcategory 2</a></li>
									<li><a href="#">Subcategory 3</a></li>
									<li><a href="#">Subcategory 4</a></li>
									<li><a href="#">Subcategory 5</a></li>
								</ul>
							</li>
							<li class="col-sm-3 col-xs-3">
								<ul>
									<li class="dropdown-header">Main Category</li>
									<li><a href="#">Subcategory 1</a></li>
									<li><a href="#">Subcategory 2</a></li>
									<li><a href="#">Subcategory 3</a></li>
									<li><a href="#">Subcategory 4</a></li>
									<li><a href="#">Subcategory 5</a></li>
								</ul>
							</li>
							<li class="col-sm-3 col-xs-3">
								<ul>
									<li class="dropdown-header">Main Category</li>
									<li><a href="#">Subcategory 1</a></li>
									<li><a href="#">Subcategory 2</a></li>
									<li><a href="#">Subcategory 3</a></li>
									<li><a href="#">Subcategory 4</a></li>
									<li><a href="#">Subcategory 5</a></li>
								</ul>
							</li>
						</ul>				
					</li>
					<!--<li class="dropdown mega-dropdown">
						<a href="#" class="dropdown-toggle">Occasion <span class="caret"></span></a>				
						<ul class="dropdown-menu mega-dropdown-menu">
							<li class="col-sm-6 col-xs-6">
								<ul>
									<li class="dropdown-header">Main Category</li>
									<li><a href="#">Subcategory 1</a></li>
									<li><a href="#">Subcategory 2</a></li>
									<li><a href="#">Subcategory 3</a></li>
									<li><a href="#">Subcategory 4</a></li>
									<li><a href="#">Subcategory 5</a></li>
								</ul>
							</li>
							<li class="col-sm-6 col-xs-6">
								<ul>
									<li class="dropdown-header">Main Category</li>
									<li><a href="#">Subcategory 1</a></li>
									<li><a href="#">Subcategory 2</a></li>
									<li><a href="#">Subcategory 3</a></li>
									<li><a href="#">Subcategory 4</a></li>
									<li><a href="#">Subcategory 5</a></li>
								</ul>
							</li>
						</ul>				
					</li>-->
				</ul>
				<ul class="clean nav filterNavMenu pull-right">
					<li class="dropdown mega-dropdown">
						<a href="#" class="dropdown-toggle">Price <span class="caret"></span></a>				
						<ul class="dropdown-menu mega-dropdown-menu">
							<li class="col-md-12">
								<ul>
									<li class="dropdown-header">Main Category</li>
									<li><a href="#">Subcategory 1</a></li>
									<li><a href="#">Subcategory 2</a></li>
									<li><a href="#">Subcategory 3</a></li>
									<li><a href="#">Subcategory 4</a></li>
									<li><a href="#">Subcategory 5</a></li>
								</ul>
							</li>
						</ul>				
					</li>
					<li class="dropdown mega-dropdown">
						<a href="#" class="dropdown-toggle">Delivery Date <span class="caret"></span></a>				
						<ul class="dropdown-menu mega-dropdown-menu">
							
						</ul>				
					</li>
				</ul>
			</div>
		</div>
		<div class="productListing">
			<div class="container">
				<div class="row">
					<?php foreach($product_data as $Products){ 
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
								<div class="piRight">
									<form action="<?php echo base_url(); ?>shopping/add" id="add_to_cart_form" method='POST'>
										<div class="productDetailOption clean pull-left" >
											<input type="hidden" name="id" id="product_id" value="<?php echo $Products['product_pk_id']?>">
											<input type="hidden" name="name" value="<?php echo $Products['product_name']?>">
											<input type="hidden" name="price" value="<?php echo $Products['price']?>">
											<input type="hidden" name="cat_name" id="cat_name" value="<?php echo $cat_name;?>">
											<input type="hidden" name="cat_id" id="cat_id" value="<?php echo $cat_id;?>">
											<button type="submit" class="piAddCart" data-toggle="tooltip" title="Add to cart" value="Add to Cart" name="action"><img src="<?php echo base_url(); ?>assets/frontend/img/cart-icon.png"></button>
										</div>
								   </form>
								</div>
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
