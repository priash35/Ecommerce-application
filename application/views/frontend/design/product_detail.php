<?php include('./header.php') ?>
<link rel="stylesheet" type="text/css" href="assets/css/jquery-picZoomer.css">
    <script type="text/javascript" src="assets/js/jquery.picZoomer.js"></script>
    <script type="text/javascript">
        $(function () {
            $('.picZoomer').picZoomer();


            //切换图片
            $('.piclist li').on('click', function (event) {
                var $pic = $(this).find('img');
                $('.picZoomer-pic').attr('src', $pic.attr('src'));
            });
        });
    </script>
<style>
.btn.active.focus,.btn.active:focus,.btn.focus,.btn:active.focus,
                    .btn:active:focus,.btn:focus{outline: none;outline-offset: 0}
.piclist{
        margin-top: 30px;
    }
    .green{
    background: green;
    padding: 1px 10px;
    margin: 10px 4px;
}
 .white{
    background: white;
    padding: 1px 10px;
    margin: 10px 4px;
}
.blue.active span.fa,.red.active span.fa,.green.active span.fa,.black.active span.fa,.pink.active span.fa{color:#fff}

    .piclist li{
        display: inline-block;
        width: 50px;
        height: 50px;
    }
    .piclist li img{
        width: 100%;
        height: auto;
    }
.color_order .btn{padding:6px 6px;border: 1px solid #d0c8c8;}
.btn span.fa{    			
	opacity: 0;				
}
.btn.active span.fa{				
	opacity: 1;				
}
    /* custom style */
    .picZoomer-pic-wp,
    .picZoomer-zoom-wp{
        border: 1px solid #fff;
    }

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
        padding-top: 5px;
        font-size: 14px;
        font-weight: 700;
        margin: 0 0 8px;
    }
    .price_strikethrough{    color: #1a8dbb;
                             text-decoration: line-through;}
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
                    <div id="collapse0" class="panel-collapse collapse in" >
                        <ul>
                            <li>
                                <p>Enter Price Range</p>
                                <div class="price-range ">
                                    <input class="input-sm" type="number"><label style="margin-left: 1px"> -</label>
                                    <input class="input-sm" type="number">
                                    <button class="input-sm">GO</button>
                                    <!--                                <button class="btn btn-primary btn-small apply-price action-btn-orange">GO</button>-->
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="brand">
                    <div class="panel-heading " >
                        <h4 class="panel-title">
                            <a class="accordion-toggle " data-toggle="collapse" href="#collapse1">
                                Brand
                            </a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in" >
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        citroen
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox" >
                                    <label>
                                        <input type="checkbox" value="">
                                        benz
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox"  >
                                    <label>
                                        <input type="checkbox" value="">
                                        bmw
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="size">
                    <div class="panel-heading" >
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
                                <div class="checkbox" >
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
                    <div class="panel-heading" >
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapse3">
                                Color</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item">
                                  <div class="checkbox">
                                    <label><input type="checkbox" value=""><div class="colorbox" style="background: red;"> </div> Red</label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox" >
                                    <label>
                                        <input type="checkbox" value=""><div class="colorbox" style="background: blue;"> </div>
                                        Blue
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox"  >
                                    <label>
                                        <input type="checkbox" value=""><div class="colorbox" style="background: green;"> </div>
                                        Green
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                 <div class="offers">
                    <div class="panel-heading" >
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
                                <div class="checkbox" >
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
                    <div class="panel-heading" >
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
                                <div class="checkbox" >
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
            <div class="products_details_box">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                           <div class="picZoomer">
                                <img src="https://unsplash.it/375/500?image=201" height="320" width="320" alt="" class="img-responsive">
                            </div>

                            <ul class="piclist">
                                <li><img src="https://unsplash.it/375/500?image=201" alt=""></li>
                                <li><img src="https://unsplash.it/375/500?image=203" alt=""></li>
                                <li><img src="https://unsplash.it/375/500?image=212" alt=""></li>
                                <li><img src="https://unsplash.it/375/500?image=220" alt=""></li>
                                <li><img src="https://unsplash.it/375/500?image=223" alt=""></li>
                            </ul>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="detail-info">
                                <i class="fav fa fa-heart-o" style="font-size: 20px;color: black;" onclick="setColor(event, 'button', '#101010')"></i>
                                <h2 class="title-detail">Burberry Pink &amp; Black</h2>

                                <div class="product-order">
                                    <span>235 Orders</span>
                                </div>
                                <div class="product-code">
                                    <label>Item Code  </label> <span>#12980496023</span>
                                </div>
                                <div class="product-stock">
                                    <label>Availability  </label> <span>In stock</span>
                                </div>
                                <div class="delivery_check ">
                                    <label>Delivery </label> 
                                    <span class=""> 
                                        <div class="inner-addon left-addon">
                                            <i class="fa fa-map-marker"></i>
                                            <input type="text" class="pin" maxlength="6" placeholder="411028" style="border: none;border-bottom: 1px solid #1a8dbb;padding: 5px 3px 4px 32px;"/>
                                            <span style="font-weight: 500;cursor: pointer;font-size: 14px;color: #2874f0;margin-left: auto;">Check</span>
                                        </div>
                                    </span>
                                    <span>Delivery Order in next 4-5 Days.</span>
                                </div>
                                <div class="info-price info-price-detail">
                                    <label>Price </label> <span><i class="fa fa-rupee"></i>59.52</span><del><i class="fa fa-rupee"></i>17.96</del>
                                </div>
                                <div class="color_order">
                                    <label>Color  </label>  
                                    	<div class="btn-group" data-toggle="buttons">
			
			<label class="btn red active">
				<input type="radio" name="options" id="option2" autocomplete="off" chacked>
				<span class="fa fa-check"></span>
			</label>

			<label class="btn blue">
				<input type="radio" name="options" id="option1" autocomplete="off">
				<span class="fa fa-check"></span>
			</label>

			<label class="btn green">
				<input type="radio" name="options" id="option2" autocomplete="off">
				<span class="fa fa-check"></span>
			</label>

			<label class="btn black">
				<input type="radio" name="options" id="option2" autocomplete="off">
				<span class="fa fa-check"></span>
			</label>

			<label class="btn pink">
				<input type="radio" name="options" id="option2" autocomplete="off">
				<span class="fa fa-check"></span>
			</label>

			<label class="btn white">
				<input type="radio" name="options" id="option2" autocomplete="off">
				<span class="fa fa-check"></span>
			</label>
		
		</div>
		
                                </div>

                                <div class="size_order">
                                    <label>Size  </label> <span class="X">X</span><span class="XL">XL</span><span class="XXL">XXL</span><span class="XXX">XXX</span>
                                </div>
                                <div class="row add-to-cart">
                                    <label class="col-md-1">Qty  </label>
                                    <div class="col-md-4 product-qty">
                                        <span class="btn btn-default btn-sm btn-qty">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                        </span>
                                        <input class="btn btn-default btn-sm btn-qty" value="1" />
                                        <span class="btn btn-default btn-sm btn-qty">
                                            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                        </span>
                                    </div>
                                </div><!-- end row -->
                                <div class="buy_product" style="margin-top: 10px;">
                                    <button  class="btn blue-white btn_effect">Add To Cart</button>
                                    <button  class="btn blue_btn btn_effect">Buy Now</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                        <h3 style="margin-top: 0">RELATED PRODUCTS</h3>
                                    </div>
                                    <div class="col-md-3"> 
                                        <a class="btn prev"><i class="fa fa-caret-left"></i></a> 
                                        <a class="btn next"><i class="fa fa-caret-right"></i></a> 
                                    </div>
                                </div>
                            </div>
                            <div id="owl-demo" class="owl-carousel">
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
        </div>
    </section>
</div>

<footer id="footer" class="footer color-bg">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-5">
                    <div class="module-heading">
                        <h4 class="module-title">Contact Us</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class="toggle-footer" style="">
                            <li class="media">
                                <div class="pull-left">
                                    <span class="icon fa-stack fa-lg">
                                        <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <p>345 Hadapsar, Pune. 411 028.</p>
                                </div>
                            </li>

                            <li class="media">
                                <div class="pull-left">
                                    <span class="icon fa-stack fa-lg">
                                        <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <p>+(888) 123-4567<br>+(888) 456-7890</p>
                                </div>
                            </li>

                             <li class="media">
                                <div class="pull-left">
                                    <span class="icon fa-stack fa-lg">
                                        <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <p>abc@gmail.com</p>
                                     <p> <a href="contactus.php" style="line-height: 0;margin-left: 0;">Contact Us</a></p>
                                </div>
                            </li>

                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="module-heading">
                        <h4 class="module-title">Customer Service</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class="list-unstyled">
                          
                            <li class="first"><a href="myprofile.php" title="My Account">My Account</a></li>
                            <li><a href="myorder.php" title="Order History">Order History</a></li>
                            <li><a href="faq.php" title="faq">FAQ</a></li>
                         
                            <li class="last"><a href="help.php" title="Where is my order?">Help Center</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->


                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">About Us</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                         <ul class="list-unstyled">
                           <!-- <li class="first"><a href="myorder.php" title="Track Order">Track Order</a></li>-->
                            <li><a href="aboutus.php" title="Company">Gravity BS</a></li>
                            <li><a href="" title="About Company">About </a></li>
                            <li><a href="" title="Testimonials">Testimonials</a></li>
<!--                            <li class=" last"><a href="contactus.php" title="Suppliers">Contact Us</a></li>-->
                        </ul>
                    </div><!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-7 col-sm-6 no-padding social">
                <ul class="link">
                    <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
                    <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
                    <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
                    <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
                </ul>
            </div>
            <div class="col-xs-5 col-sm-6 no-padding">
                <div class="clearfix payment-methods">
                    <ul>
                       <!-- <li><img src="assets/image/paypal.png" alt=""></li>-->
                        <li><img src="assets/image/visa.png" alt=""></li>
                        <li><img src="assets/image/maestro.png" alt=""></li>

                    </ul>
                </div><!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>

         <!--  start filter Modal -->
<div id="filter" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modelhead">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Filter By</h4>
      </div>
      <div class="modal-body">
          <div class="filter_box">
                <div class="price ">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" href="#pricem">
                                Price
                            </a>
                        </h4>
                    </div>
                    <div id="pricem" class="panel-collapse collapse in" >
                        <ul>
                            <li>
                                <p>Enter Price Range</p>
                                <div class="price-range ">
                                    <input class="input-sm" type="number"><label style="margin-left: 1px"> -</label>
                                    <input class="input-sm" type="number">
                                    <button class="input-sm">GO</button>
                                    <!--                                <button class="btn btn-primary btn-small apply-price action-btn-orange">GO</button>-->
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="brand">
                    <div class="panel-heading " >
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" href="#brandm">
                                Brand
                            </a>
                        </h4>
                    </div>
                    <div id="brandm" class="panel-collapse collapse " >
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        citroen
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox" >
                                    <label>
                                        <input type="checkbox" value="">
                                        benz
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox"  >
                                    <label>
                                        <input type="checkbox" value="">
                                        bmw
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="color">
                    <div class="panel-heading" >
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" href="#colorm">
                                Color</a>
                        </h4>
                    </div>
                    <div id="colorm" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label><input type="checkbox" value=""><div class="colorbox" style="background: red;"> </div> Red</label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox" >
                                    <label>
                                        <input type="checkbox" value=""><div class="colorbox" style="background: blue;"> </div>
                                        Blue
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox"  >
                                    <label>
                                        <input type="checkbox" value=""><div class="colorbox" style="background: green;"> </div>
                                        Green
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="offers">
                    <div class="panel-heading" >
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" href="#offerm">
                                Offers</a>
                        </h4>
                    </div>
                    <div id="offerm" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">Get 10% off, Use code: BEST100
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox" >
                                    <label>
                                        <input type="checkbox" value="">Get 20% off,Use code: SHOP200
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
                 
          </div><div class="col-md-12 text-right">
               
          <a href="index.php" > <button type="button" class="btn-upper btn btn-primary">Submit</button></a>
          </div>
      </div>
      
    </div>

  </div>
</div>
 <!--end filter Modal -->
<script>
            $('i.fav').click(function () {
                $(this).toggleClass('fa-heart fa-heart-o');

            });
            function setColor(e, btn, color) {
                var target = e.target,
                        count = +target.dataset.count;

                target.style.color = count === 1 ? "black" : '#ff4f19';
                target.dataset.count = count === 1 ? 0 : 1;
            }
           $(document).ready(function () {
                    var owl = $("#owl-demo");
                    owl.owlCarousel({
                        autoPlay: 3500,
                        items: 4, //10 items above 1000px browser width
                        itemsDesktop: [1000, 4], //5 items between 1000px and 901px
                        itemsDesktopSmall: [900, 3], // 3 items betweem 900px and 601px
                        itemsTablet: [600, 2], //2 items between 600 and 0;
                        itemsMobile: [400, 1], // itemsMobile disabled - inherit from itemsTablet option
                        pagination: false
                    });
                    $(".next").click(function () {
                        owl.trigger('owl.next');
                    })
                    $(".prev").click(function () {
                        owl.trigger('owl.prev');
                    })
                });
        </script>
<!-- jQuery library -->

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>