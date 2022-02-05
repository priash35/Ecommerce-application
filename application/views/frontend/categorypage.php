<!--Slider start-->
<?PHP 	if(!empty($slider)) { ?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
	
    <ol class="carousel-indicators">
        <?php
		$cnt = 1;
		if(count($slider) > 0) {
		foreach($slider as $result) { ?>
		<li data-target="#carousel-example-generic" data-slide-to="0" class="<?php if($cnt == 1){echo 'active';} ?>"></li>
	   <?php $cnt++; } } else { ?>
		
		<?php } ?> 
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php
		$cnt = 1;
		if(count($slider) > 0) {
		foreach($slider as $result) { ?>
		<div class="item <?php if($cnt == 1){echo 'active';} ?>">
			<img src="<?=base_url()?>assets/images/slider/<?php echo $result['slide']; ?>" alt="" title="" width="100%" style="max-height:300px !important" class="img-responsive"></a>
			<!-- Static Header -->

		</div>
		<?php $cnt++; } } else { ?>
		
		<?php } ?>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="icon-next"></span>
    </a>
</div><!-- /carousel -->
	<?PHP	}?>
<!-- End Slider -->

<div class="marketshop-banner">
<?PHP	if(!empty($secondsection)) { ?>
    <div class="container">
        <div class="row">
		<?php
		$cnt = 1;
		if(count($secondsection) > 0) {
		foreach($secondsection as $result) { ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><a href=""><img src="<?=base_url()?>assets/images/slider/<?php echo $result['slide']; ?>" alt="" title="" width="100%" class="img-responsive"></a></div>
			<?php $cnt++; } } else { ?>
		
		<?php } ?>
        </div>
    </div>
<?PHP } ?>
</div>

<div class="container">
    <div class="row product_slider">
        <div class="col-md-12">
            <div id="demo">
                <div class="container-fluid">
                    <div class="row">
                        <div class="product_slider ">
                            <div class="customNavigation"> 
                                <div class="row">
                                    <div class="col-md-9 text-left">
                                        <h3 style="margin-top: 0">New Arrivals Offer</h3>
                                    </div>
                                    <div class="col-md-3"> 
                                        <a class="btn prev"><i class="fa fa-caret-left"></i></a> 
                                        <a class="btn next"><i class="fa fa-caret-right"></i></a> 
                                    </div>
                                </div>
                            </div>
                            <div id="owl-demo" class="owl-carousel">
								<?php
								$cnt = 1;
								if(count($NewArrivalsOffer) > 0) {
								foreach($NewArrivalsOffer as $result) { 
									$dis_price = $result['size_prize']-($result['size_prize']*($result['size_descount']/100)); 
								?>
                                <div class="item "> 
                                    <i class="fav fa fa-heart-o" style="font-size: 20px; margin-right: 17px;color: black;" onclick="setColor(event, 'button', '#101010')"></i>
                                    <div class="col-item">
                                        <div class="photo">
                                            <a href="<?php echo base_url();?>products/product_details/<?=$result['product_pk_id']?>"> <img src="<?php echo base_url();?>assets/images/product_image/<?=$result['product_image']?>" class="img-responsive" alt="a" /></a>
                                        </div>
                                        <div class="info">
                                            <div class="col-md-12">
                                                <div class="price ">
                                                    <a href="<?php echo base_url();?>products/product_details/<?=$result['product_pk_id']?>"><h6 class="title-product"><?=$result['product_name']?></h6></a>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <div class="col-md-12">
                                                    <p class="price-tag">
                                                        <span class="price_strikethrough"><i class="fa fa-inr"></i><span><?=$result['size_prize']?></span></span>
                                                        <span style="color: #7D7D7D;"><i class="fa fa-inr"></i><span ><?php echo number_format((float)$dis_price, 2, '.', '');?></span></span>
                                                        <span><a href="<?php echo base_url();?>products/product_details/<?=$result['product_pk_id']?>"><button type="submit" class="btn btn-default shopbtn">Show Now  </button></a></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<?php $cnt++; } } else { ?>
		
								<?php } ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //print_r($NewArrivalsOffer); ?>
<div class="list-banner-adv">
    <div class="container">
		
        <div class="row" style="height: 338px;">
			
            <div class="col-md-4 col-sm-4 col-xs-12" >
			<?PHP	if(!empty($thirdsection[0])) { ?>
                <div class="item-adv-simple">
                    <a href=""><img src="<?=base_url()?>assets/images/slider/<?php echo $thirdsection[0]['slide']; ?>" alt="" style="height: 338px; !important" width="100%" class="img-responsive"></a>
                </div>
				<?PHP } ?> 
            </div>
			 
            <div class="col-md-5 col-sm-5 col-xs-12">
				<?PHP	if(!empty($thirdsection[1])) { ?>
                <div class="item-adv-simple">
                    <a href=""><img src="<?=base_url()?>assets/images/slider/<?php echo $thirdsection[1]['slide']; ?>" alt=""  width="100%" class="img-responsive"></a>
                </div>
				<?PHP } ?>
				<?PHP	if(!empty($thirdsection[2])) { ?>
                <div class="item-adv-simple">
                    <a href=""><img src="<?=base_url()?>assets/images/slider/<?php echo $thirdsection[2]['slide']; ?>" alt=""  width="100%" class="img-responsive"></a>
                </div>
				<?PHP } ?>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12"><?PHP	if(!empty($thirdsection[3])) { ?>
                <div class="item-adv-simple">
                    <a href=""><img src="<?=base_url()?>assets/images/slider/<?php echo $thirdsection[3]['slide']; ?>" alt="" style="height: 338px; !important" width="100%" class="img-responsive"></a>
			</div><?PHP } ?>
            </div>
        </div>
    </div>
</div>
<!--
<div class="container">
    <div class="row product_slider">
        <div class="col-md-12">
          <div id="demo">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="product_slider ">
                                    <div class="customNavigation"> 
                                        <div class="row">
                                            <div class="col-md-9 text-left">
                                                <h3 style="margin-top: 0">My Fashion</h3>
                                            </div>
                                            <div class="col-md-3"> 
                                                    <a class="btn prev1"><i class="fa fa-caret-left"></i></a> 
                                                    <a class="btn next1"><i class="fa fa-caret-right"></i></a> 
                                            </div>
                                        </div>
                                    </div>
                                    <div id="owl-demo1" class="owl-carousel">
                                        <div class="item "> 
                                            <i class="fav fa fa-heart-o" style="font-size: 20px; margin-right: 17px;color: black;" onclick="setColor(event, 'button', '#101010')"></i>
                                            <div class="col-item">
                                                <div class="photo">
                                                    <a href="product_list.php"> <img src="http://project1.inncrotech.site/assets/image/product/IMG-20170530-WA0049.jpg" class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="info">
                                                    <div class="col-md-12">
                                                        <div class="price ">
                                                            <a href="product_detail.php"><h6 class="title-product">LEVI'S Light Blue Washed Low Rise Skinny Fit Jeans </h6></a>
                                                        </div>
                                                    </div>
                                                    <div class="separator clear-left">
                                                        <div class="col-md-12">
                                                            <p class="price-tag">
                                                                <span class="price_strikethrough"><i class="fa fa-inr"></i><span>200</span></span>
                                                                <span><i class="fa fa-inr"></i><span>150</span></span>
                                                                <span><a href="product_list.php"><button type="submit" class="btn btn-default shopbtn">Show Now  </button></a></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <i class="fav fa fa-heart-o" style="font-size: 20px; margin-right: 17px;color: black;" onclick="setColor(event, 'button', '#101010')"></i>
                                            <div class="col-item">
                                                <div class="photo">
                                                    <a href="product_list.php"> <img src="http://project1.inncrotech.site/assets/image/product_adv/product4.jpg" class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="info">
                                                    <div class="col-md-12">
                                                        <div class="price ">
                                                            <a href="product_detail.php"><h6 class="title-product">LEVI'S Light Blue Washed Low Rise Skinny Fit Jeans </h6></a>
                                                        </div>
                                                    </div>
                                                    <div class="separator clear-left">
                                                        <div class="col-md-12">
                                                            <p class="price-tag">
                                                                <span class="price_strikethrough"><i class="fa fa-inr"></i><span>200</span></span>
                                                                <span><i class="fa fa-inr"></i><span>150</span></span>
                                                                <span><a href="product_list.php"><button type="submit" class="btn btn-default shopbtn">Show Now  </button></a></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <i class="fav fa fa-heart-o" style="font-size: 20px; margin-right: 17px;color: black;" onclick="setColor(event, 'button', '#101010')"></i>
                                            <div class="col-item">
                                                <div class="photo">
                                                    <a href="product_list.php"> <img src="http://project1.inncrotech.site/assets/image/product_adv/product4.jpg" class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="info">
                                                    <div class="col-md-12">
                                                        <div class="price ">
                                                            <a href="product_detail.php"><h6 class="title-product">LEVI'S Light Blue Washed Low Rise Skinny Fit Jeans </h6></a>
                                                        </div>
                                                    </div>
                                                    <div class="separator clear-left">
                                                        <div class="col-md-12">
                                                            <p class="price-tag">
                                                                <span class="price_strikethrough"><i class="fa fa-inr"></i><span>200</span></span>
                                                                <span><i class="fa fa-inr"></i><span>150</span></span>
                                                                <span><a href="product_list.php"><button type="submit" class="btn btn-default shopbtn">Show Now  </button></a></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <i class="fav fa fa-heart-o" style="font-size: 20px; margin-right: 17px;color: black;" onclick="setColor(event, 'button', '#101010')"></i>
                                            <div class="col-item">
                                                <div class="photo">
                                                    <a href="product_list.php"> <img src="http://project1.inncrotech.site/assets/image/product_adv/product4.jpg" class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="info">
                                                    <div class="col-md-12">
                                                        <div class="price ">
                                                            <a href="product_detail.php"><h6 class="title-product">LEVI'S Light Blue Washed Low Rise Skinny Fit Jeans </h6></a>
                                                        </div>
                                                    </div>
                                                    <div class="separator clear-left">
                                                        <div class="col-md-12">
                                                            <p class="price-tag">
                                                                <span class="price_strikethrough"><i class="fa fa-inr"></i><span>200</span></span>
                                                                <span><i class="fa fa-inr"></i><span>150</span></span>
                                                                <span><a href="product_list.php"><button type="submit" class="btn btn-default shopbtn">Show Now  </button></a></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <i class="fav fa fa-heart-o" style="font-size: 20px; margin-right: 17px;color: black;" onclick="setColor(event, 'button', '#101010')"></i>
                                            <div class="col-item">
                                                <div class="photo">
                                                    <a href="product_list.php"> <img src="http://project1.inncrotech.site/assets/image/product_adv/product4.jpg" class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="info">
                                                    <div class="col-md-12">
                                                        <div class="price ">
                                                            <a href="product_detail.php"><h6 class="title-product">LEVI'S Light Blue Washed Low Rise Skinny Fit Jeans </h6></a>
                                                        </div>
                                                    </div>
                                                    <div class="separator clear-left">
                                                        <div class="col-md-12">
                                                            <p class="price-tag">
                                                                <span class="price_strikethrough"><i class="fa fa-inr"></i><span>200</span></span>
                                                                <span><i class="fa fa-inr"></i><span>150</span></span>
                                                                <span><a href="product_list.php"><button type="submit" class="btn btn-default shopbtn">Show Now  </button></a></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <i class="fav fa fa-heart-o" style="font-size: 20px; margin-right: 17px;color: black;" onclick="setColor(event, 'button', '#101010')"></i>
                                            <div class="col-item">
                                                <div class="photo">
                                                    <a href="product_list.php"> <img src="http://project1.inncrotech.site/assets/image/product_adv/product4.jpg" class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="info">
                                                    <div class="col-md-12">
                                                        <div class="price ">
                                                            <a href="product_detail.php"><h6 class="title-product">LEVI'S Light Blue Washed Low Rise Skinny Fit Jeans </h6></a>
                                                        </div>
                                                    </div>
                                                    <div class="separator clear-left">
                                                        <div class="col-md-12">
                                                            <p class="price-tag">
                                                                <span class="price_strikethrough"><i class="fa fa-inr"></i><span>200</span></span>
                                                                <span><i class="fa fa-inr"></i><span>150</span></span>
                                                                <span><a href="product_list.php"><button type="submit" class="btn btn-default shopbtn">Show Now  </button></a></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <i class="fav fa fa-heart-o" style="font-size: 20px; margin-right: 17px;color: black;" onclick="setColor(event, 'button', '#101010')"></i>
                                            <div class="col-item">
                                                <div class="photo">
                                                    <a href="product_list.php"> <img src="http://project1.inncrotech.site/assets/image/product_adv/product4.jpg" class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="info">
                                                    <div class="col-md-12">
                                                        <div class="price ">
                                                            <a href="product_detail.php"><h6 class="title-product">LEVI'S Light Blue Washed Low Rise Skinny Fit Jeans </h6></a>
                                                        </div>
                                                    </div>
                                                    <div class="separator clear-left">
                                                        <div class="col-md-12">
                                                            <p class="price-tag">
                                                                <span class="price_strikethrough"><i class="fa fa-inr"></i><span>200</span></span>
                                                                <span><i class="fa fa-inr"></i><span>150</span></span>
                                                                <span><a href="product_list.php"><button type="submit" class="btn btn-default shopbtn">Show Now  </button></a></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <i class="fav fa fa-heart-o" style="font-size: 20px; margin-right: 17px;color: black;" onclick="setColor(event, 'button', '#101010')"></i>
                                            <div class="col-item">
                                                <div class="photo">
                                                    <a href="product_list.php"> <img src="http://project1.inncrotech.site/assets/image/product_adv/product4.jpg" class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="info">
                                                    <div class="col-md-12">
                                                        <div class="price ">
                                                            <a href="product_detail.php"><h6 class="title-product">LEVI'S Light Blue Washed Low Rise Skinny Fit Jeans </h6></a>
                                                        </div>
                                                    </div>
                                                    <div class="separator clear-left">
                                                        <div class="col-md-12">
                                                            <p class="price-tag">
                                                                <span class="price_strikethrough"><i class="fa fa-inr"></i><span>200</span></span>
                                                                <span><i class="fa fa-inr"></i><span>150</span></span>
                                                                <span><a href="product_list.php"><button type="submit" class="btn btn-default shopbtn">Show Now  </button></a></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <i class="fav fa fa-heart-o" style="font-size: 20px; margin-right: 17px;color: black;" onclick="setColor(event, 'button', '#101010')"></i>
                                            <div class="col-item">
                                                <div class="photo">
                                                    <a href="product_list.php"> <img src="http://project1.inncrotech.site/assets/image/product_adv/product4.jpg" class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="info">
                                                    <div class="col-md-12">
                                                        <div class="price ">
                                                            <a href="product_detail.php"><h6 class="title-product">LEVI'S Light Blue Washed Low Rise Skinny Fit Jeans </h6></a>
                                                        </div>
                                                    </div>
                                                    <div class="separator clear-left">
                                                        <div class="col-md-12">
                                                            <p class="price-tag">
                                                                <span class="price_strikethrough"><i class="fa fa-inr"></i><span>200</span></span>
                                                                <span><i class="fa fa-inr"></i><span>150</span></span>
                                                                <span><a href="product_list.php"><button type="submit" class="btn btn-default shopbtn">Show Now  </button></a></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <i class="fav fa fa-heart-o" style="font-size: 20px; margin-right: 17px;color: black;" onclick="setColor(event, 'button', '#101010')"></i>
                                            <div class="col-item">
                                                <div class="photo">
                                                    <a href="product_list.php"> <img src="http://project1.inncrotech.site/assets/image/product_adv/product4.jpg" class="img-responsive" alt="a" /></a>
                                                </div>
                                                <div class="info">
                                                    <div class="col-md-12">
                                                        <div class="price ">
                                                            <a href="product_detail.php"><h6 class="title-product">LEVI'S Light Blue Washed Low Rise Skinny Fit Jeans </h6></a>
                                                        </div>
                                                    </div>
                                                    <div class="separator clear-left">
                                                        <div class="col-md-12">
                                                            <p class="price-tag">
                                                                <span class="price_strikethrough"><i class="fa fa-inr"></i><span>200</span></span>
                                                                <span><i class="fa fa-inr"></i><span>150</span></span>
                                                                <span><a href="product_list.php"><button type="submit" class="btn btn-default shopbtn">Show Now  </button></a></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>
-->

<style>
    .product_box {
        border: 1px solid rgba(221, 221, 221, 0.63);
        padding: 10px;
        margin-bottom: 10px;
        transition: all 0.2s ease;
        cursor: pointer;
        min-height: 320px;
        background: #fff;
    }
    .product_box:hover {
        box-shadow: 3px 4px 4px 1px #d3d3d3;
    }
    .rmv{padding:1px }
    .title-product {

        .price_strikethrough{    
            color: #1a8dbb;
            text-decoration: line-through;}
        .shopbtn{    padding: 4px 10px;
                     background: #00c1f9;
                     color: white;}
    </style>