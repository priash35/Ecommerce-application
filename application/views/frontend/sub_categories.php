<br>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <!--Slider start-->
			<?PHP 	if(!empty($res[0])) { ?>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
       <?php
		$cnt = 1;
		if(count($res[0]) > 0) {
		foreach($res[0] as $result) { ?>
		<li data-target="#carousel-example-generic" data-slide-to="0" class="<?php if($cnt == 1){echo 'active';} ?>"></li>
	   <?php $cnt++; } } else { ?>
		
		<?php } ?> 
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php
		$cnt = 1;
		if(count($res[0]) > 0) {
		foreach($res[0] as $result) { ?>
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
			<?php } ?>
<!-- End Slider -->
        </div>
        <div class="col-md-4">
            <div class="row">
				<?php
				$cnt = 1;
				if(count($res[1]) > 0) { //echo '<pre>'; print_r($res);
				foreach($res[1] as $result) { 
				if($result['slide']!=''){
				?>
                <div class=" col-md-12 col-sm-6 col-xs-12 " style="margin-bottom: 10px">
					<a href="<?=base_url()?>products/product_list/1">
					<img src="<?=base_url()?>assets/images/slider/<?php echo $result['slide']; ?>"  width="100%" height="195" alt="Sample Banner 2" title="Sample Banner 2"></a></div>
                <?php $cnt++; } } }?>
		</div>
        </div>
		
        <div class=" col-md-12 col-sm-6 col-xs-12">
		<?php
				$cnt = 1;
				if(count($res[2]) > 0) { //echo '<pre>'; print_r($res);
				foreach($res[2] as $result) { if($result['slide']!=''){ ?>
            <a href="<?=base_url()?>products/product_list/1">
			<img src="<?=base_url()?>assets/images/slider/<?php echo $result['slide']; ?>" width="100%" height="250" alt="Sample Banner" title="Sample Banner"></a>
				<?php $cnt++; } } }?>
		</div>

    </div>
</div>

<!--start second product banner-->
<div class="marketshop-banner">
    <div class="container">
        <div class="row">
			<?php
				$cnt = 1;
				if(count($res[3]) > 0) { //echo '<pre>'; print_r($res);
				foreach($res[3] as $result) { if($result['slide']!=''){ ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<a href=""><IMG SRC="<?=base_url()?>assets/images/slider/<?php echo $result['slide']; ?>" alt="Sample Banner 2" title="Sample Banner 2"></a></div>
				<?php $cnt++; } } }?>
        </div>
    </div>
</div>
<!--End second product banner-->

<!--start second offer banner-->
<div class="container offer">
    <div class="row">
		<?php
				$cnt = 1;
				if(count($res[4]) > 0) { //echo '<pre>'; print_r($res);
				foreach($res[4] as $result) { if($result['slide']!=''){ ?>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <a href=""><IMG SRC="<?=base_url()?>assets/images/slider/<?php echo $result['slide']; ?>" width="100%" height="350" alt="Sample Banner" title="Sample Banner"></a>
        </div>
				<?php $cnt++; } } }?>
    </div>
</div>
<!--start second offer banner-->

<!--start product list banner-->
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
                                        <h3 style="margin-top: 0">New Products Offer</h3>
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
								//print_r($result);
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
<!--end product list banner-->

<!--start second product offer banner-->
<div class="list-banner-adv">
    <div class="container">
        <div class="row">
			<?php if($res[5][0]['slide']!=''){ ?>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="item-adv-simple">
                    <a href="product_list.php"><img src="<?=base_url()?>assets/images/slider/<?php echo $res[5][0]['slide']; ?>" alt=""></a>
                </div>
            </div>
			<?php } ?>
			
            <div class="col-md-5 col-sm-5 col-xs-12"><?php if($res[5][1]['slide']!=''){ ?>
                <div class="item-adv-simple">
                    <a href="product_list.php"><img src="<?=base_url()?>assets/images/slider/<?php echo $res[5][1]['slide']; ?>" style="height:220px;WIDTH: 100%;" alt=""></a>
                </div><?php } ?>
				<?php if($res[5][2]['slide']!=''){ ?>
                <div class="item-adv-simple">
                    <a href="product_list.php"><img src="<?=base_url()?>assets/images/slider/<?php echo $res[5][2]['slide']; ?>" style="height:200px;WIDTH: 100%;" alt=""></a>
                </div><?php } ?>
            </div>
			<?php if($res[5][3]['slide']!=''){ ?>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="item-adv-simple">
                    <a href="product_list.php"><img src="<?=base_url()?>assets/images/slider/<?php echo $res[5][3]['slide']; ?>" alt=""></a>
                </div>
            </div><?php } ?>
        </div>
    </div>
</div>
<!--endsecond product offer banner-->
