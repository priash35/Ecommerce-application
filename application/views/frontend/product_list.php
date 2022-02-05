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
    
    .rmv {
        padding: 1px
    }
    
    .price_strikethrough {
        color: #1a8dbb;
        text-decoration: line-through;
    }
</style>
<div class="row product_list" style="background: rgba(239, 239, 239, 0.54)">
    <section class="col-md-12">
        <div class="col-md-2" style="padding-right: 0">
            <div class="buy_product hidden-md hidden-lg" style="margin-bottom: 10px;text-align: right;padding-right: 15px;">
                <a href="" data-toggle="modal" data-target="#filter" class="btn blue-white btn_effect" style="padding: 8px 0px;
                   width: 140px;">Filter By <i class="fa fa-filter"></i></a>
            </div>
            <div class="filter_box hidden-sm hidden-xs">
                <div class="filter_title">
                    <h4>Filter by</h4>
                </div>
                <div class="categories">
                    <p>CATEGORIES</p>
                    <ul class="sub_cate_view">
                        <li><a class="cursor-default" href="">Accessories</a>
                            <ul>
                                <li class="has-child children">
                                    <p><a href="">Women Accessories (238)</a></p>
                                </li>
                                <li class="has-child children">
                                    <p><a href="">Men Accessories (189)</a></p>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="price">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse0">
                                Price
                            </a>
                        </h4>
                    </div>
                    <div id="collapse0" class="panel-collapse collapse in">
                        <ul>
                            <li>
                                <p>Enter Price Range</p>
                                <div class="price-range ">
                                    <input class="input-sm" type="number">
                                    <label style="margin-left: 1px"> -</label>
                                    <input class="input-sm" type="number">
                                    <button class="input-sm">GO</button>
                                    <!--                                <button class="btn btn-primary btn-small apply-price action-btn-orange">GO</button>-->
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="brand">
                    <div class="panel-heading ">
                        <h4 class="panel-title">
                            <a class="accordion-toggle " data-toggle="collapse" href="#collapse1">
                                Brand
                            </a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value=""> citroen
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value=""> benz
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value=""> bmw
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="offers">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" href="#size">
                                Size</a>
                        </h4>
                    </div>
                    <div id="size" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">XXL
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">XL
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">X
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">L
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">M
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="color">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapse3">
                                Color</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        <div class="colorbox" style="background: red;"> </div> Red</label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        <div class="colorbox" style="background: blue;"> </div>
                                        Blue
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        <div class="colorbox" style="background: green;"> </div>
                                        Green
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="offers">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapse2">
                                Offers</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">Special Price
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">Rainy Offer
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">Get 10% off, Use code: EXTRA100
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="offers">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" href="#discount">
                                Discount</a>
                        </h4>
                    </div>
                    <div id="discount" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">Get 10% off
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">Buy 1 Get 1
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">Get 20% off
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="product_listview">
                <div class="container">
                    <div class="row">
				<?PHP	if(!empty($slider)) { ?>
                        <!--Slider start-->
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
								<?php
								$cnt = 1;
								
								foreach($slider as $result) { ?>
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="<?php if($cnt == 1){echo 'active';} ?>"></li>
                               <?php $cnt++; } ?>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <?php
								$cnt = 1;
								if(!empty($slider)) {
								foreach($slider as $result) { ?>
								<div class="item <?php if($cnt == 1){echo 'active';} ?>">
                                    <img src="<?=base_url()?>assets/images/slider/<?php echo $result['slide_image']; ?>" alt="" title="" width="100%" class="img-responsive"></a>
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
                        </div>
						<?PHP } else { ?>
								
								<?php } ?>
                        <!-- /carousel -->
                        <!-- End Slider -->
                    </div>
                </div>
            </div>

            <div class="col-md-12 product-area">
                <h4>Total Product </h4>
				<?php
                                if(!empty($product_list)){ 
//                                    echo "<pre>";
//                                    print_r($product_list);
//                                    echo "</pre>";
//                                    die();
					foreach($product_list as $record){
					$dis_price = $record['size_prize']-($record['size_prize']*($record['size_descount']/100));
					$sql = "select * from product_images where product_fk_id=".$record['product_pk_id'];
					$query = $this->db->query($sql);
					$imgData = $query->result();
					//print_r($imgData[0]);
				?>
					<div class="col-md-3 col-sm-4 rmv">
						<i class="fav fa fa-heart-o" style="font-size: 20px;color: black;" onclick="setColor(event, 'button', '#101010')"></i>
						<div class="product_box">

							<a href="<?php echo base_url();?>products/product_details/<?php echo $record['product_pk_id'];?>">
								<?php if($imgData[0]->file_name!=''){ $src=$imgData[0]->file_name;}else{ $src='no-image-140.jpg'; }?>
								<img src="<?php echo base_url();?>assets/images/product_image/<?=$src ?>" class="" style="width: 100%; height: 250px;">
							</a>
							<a href="<?php echo base_url();?>products/product_details/<?php echo $record['product_pk_id'];?>"><h6 class="title-product"><?php ucwords($record['product_name']);?></h6></a>
							<div>
								<p class="price-tag">
									<span class="price_strikethrough"><i class="fa fa-inr"></i><span><?php echo $record['size_prize'];?></span></span>
									 &nbsp; <span><i class="fa fa-inr"></i><span><?php echo $record['size_descprice'] //number_format((float)$dis_price, 2, '.', '');?></span></span>
								</p>
								<div class="row">
									<div class="col-md-7 col-xs-7">
										<div class="input-group">
											<span class="input-group-addon">Qty</span>
											<input type="number" class="form-control" id="qt{{$index}}" value="1" min="1" max="{{prolist.price_details.p_quantity}}" onchange="change_qty(this.value, '2')">
										</div>
									</div>
									<div class="col-md-4">
										<a class="form-group text-center">
											<button type="submit" ng-click="add_to_cart(prolist.product_id, $index)" class="btn btn-default">Add <i class="fa fa-shopping-basket"></i> </button>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } } ?>

            </div>

        </div>
    </section>
</div>