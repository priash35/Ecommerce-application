<?php include('./header.php') ?>
<style>
    .product-image-wrapper {
        border: 1px solid #F7F7F5;
        overflow: hidden;
        margin-bottom: 30px;
    }
    .single-products {
        position: relative;
    }
    .productinfo {
        position: relative;
    }
    .productinfo img {
        width: 80%;
    }
    .productinfo h2 {
        color: #FE980F;
        font-family: 'Roboto',sans-serif;
        font-size: 24px;
        font-weight: 700;
    }
    .productinfo p {
        font-family: 'Roboto',sans-serif;
        font-size: 14px;
        font-weight: 400;
        color: #696763;
    }
    .add-to-cart {
        background: #F5F5ED;
        border: 0 none;
        border-radius: 0;
        color: #696763;
        font-family: 'Roboto',sans-serif;
        font-size: 15px;
        margin-bottom: 25px;
    }
    .add-to-cart i {
        margin-right: 5px;
    }
    .product-overlay {
        background: #FE980F;
        top: 0;
        display: none;
        height: 0;
        position: absolute;
        transition: height 500ms ease 0s;
        width: 100%;
        display: block;
        /*    opacity: ;*/
    }
    .product-overlay .overlay-content {
        bottom: 0;
        position: absolute;
        bottom: 0;
        text-align: center;
        width: 100%;
    }
    .product-overlay h2 {
        color: #fff;
        font-family: 'Roboto',sans-serif;
        font-size: 24px;
        font-weight: 700;
    }
    .product-overlay p {
        font-family: 'Roboto',sans-serif;
        font-size: 14px;
        font-weight: 400;
        color: #fff;
    }
    .product-overlay .add-to-cart {
        background: #fff;
        border: 0 none;
        border-radius: 0;
        color: #FE980F;
        font-family: 'Roboto',sans-serif;
        font-size: 15px;
        margin-bottom: 25px;
    }
    .new, .sale {
        position: absolute;
        top: 0;
        right: 0;
    }
    .choose {
        border-top: 1px solid #F7F7F0;
    }
    .choose ul li a {
        color: #B3AFA8;
        font-family: 'Roboto',sans-serif;
        font-size: 13px;
        padding-left: 0;
        padding-right: 0;
    }
    .choose ul li a i {
        margin-right: 5px;
    }
    .prod{
        background: white;
        border: 1px solid rgba(221, 221, 221, 0.63);}
    .prod:hover {
        box-shadow: 3px 4px 4px 1px #d3d3d3;
    }
    .no_padding{padding: 0}
    .prod_image_warpper{border-bottom: 1px solid #e8e8e8;}
    .prod_image_warpper img{
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        max-width: 100%;}
    a{color: #333;}
    .prod-item-title{
        margin-top: 0;
        margin-bottom: 6px;
        text-decoration: none;
        color: #333;
        font-size: 16px;
        font-weight: 200;
        line-height: 1.2;
        padding-top: 10px;
        overflow: hidden;
    }
    body{overflow-x: hidden}
    .prod-item-price span{font-size: 17px;
                          font-weight: 600;}
    item-price-bold{font-weight: bold;color: #333;text-transform: uppercase;}
    .item-price-strikethrough{text-decoration: line-through;}
    .pro-image .image:before {
        background-color: #000;
        content: "";
        height: 100%;
        opacity: 0;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
        position: absolute;
        left: 0;
        top: 0;
        transition: all 0.3s ease 0s;
        width: 100%;
        z-index: 1;
    }
    .pro-details {
        background-color: #fafafa;
        border-top: 1px solid #f1f1f1;
        padding: 10px 15px 15px;
    }
    .pro-details .pro-title {
        color: #252525;
        display: block;
        font-size: 16px;
        font-weight: 600;
        margin-top: 10px;
        -webkit-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
    }
</style>
<div class="row product_list" style="background: rgba(239, 239, 239, 0.54)">
    <section class="col-md-12">
        <div class="col-md-2" style="padding-right: 0">
            <div class="filter_box">
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
                    <div id="collapse0" class="panel-collapse collapsed" >
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
                    <div id="collapse1" class="panel-collapse collapsed" >
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
                            <a class="accordion-toggle collapsed" data-toggle="collapse" href="#collapse3">
                                Color</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label><input type="checkbox" value=""><div class="colorbox" style="background: red;"></div></label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox" >
                                    <label>
                                        <input type="checkbox" value="">
                                        blue
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="checkbox"  >
                                    <label>
                                        <input type="checkbox" value="">
                                        green
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
            </div>
        </div>
        <div class="col-md-10">
            <div class="product_listview">
                <div class="container">
                    <div class="row">
                        <!--Slider start-->
                        <div id="myCarousel" class="carousel slide">
                            <!--                     Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="assets/image/product_adv/V0377_Home-Main-Slider-2-Levis-500-off-20052017.jpg" width="100%" class="img-responsive">
                                </div>
                                <div class="item">
                                    <img src="assets/image/product_adv/K0730-Mens-Main-Slider-3-Brand-day-Carlton-London-Min-40-off-20052017.jpg" width="100%" class="img-responsive">
                                </div>
                                <div class="item">
                                    <img src="assets/image/product_adv/K0730-Mens-Main-Slider-3-Brand-day-Carlton-London-Min-40-off-20052017.jpg" width="100%" class="img-responsive">
                                </div>
                            </div>
                            <!--                     Controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="icon-prev"></span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="icon-next"></span>
                            </a>  
                        </div>
                        <!-- End Slider -->
                    </div>
                </div>
            </div>
            <div class="col-md-12 no_padding">
                <div class="col-sm-3 no_padding">
                    <div class="col-xs-12 slick-slide slick-current slick-active" style="width: 308px;" data-slick-index="7" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide07">
                        <div class="sin-product" style="    border: 1px solid #f1f1f1;
                             position: relative;
                             -webkit-transition: all 0.3s ease 0s;
                             transition: all 0.3s ease 0s;">
                            <div class="pro-image fix" style="position: relative;    overflow: hidden;">
                                <a href="product-details-1.html" class="image" tabindex="0" style="display: block;
                                   position: relative;
                                   z-index: 1;"><img src="https://devitems.com/preview/priyoshop/img/product/1.jpg" alt="" style="    width: 100%;"></a>


                                <div class="pro-action">
                                    <a href="cart.html" class="action-btn cart" tabindex="0"><i class="zmdi zmdi-shopping-cart"></i></a>
                                    <a href="wishlist.html" class="action-btn wishlist" tabindex="0"><i class="zmdi zmdi-favorite-outline"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#productModal" class="action-btn quick-view" tabindex="0"><i class="zmdi zmdi-eye"></i></a>
                                </div>
                            </div>
                            <div class="pro-details text-center">
                                <div class="top fix">
                                    <a href="product-details-1.html" class="pro-title" tabindex="0">Wooden Furniture Chair</a>
                                    <div class="prod-item-price">
                                        <span class="first">Rs. 1,599.00</span>
                                    </div>
                                    <div class="prod-item-original-price">
                                        <span class="item-price-strikethrough">Rs. 3,198.00</span>
                                        <span class="item-price-pipe">|</span>
                                        <span class="item-price-bold">50% OFF</span>
                                    </div>
                                    <p>Easy Polo Black Edition</p>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
                <div class="col-sm-3 no_padding">

                </div>
            </div>
            <div class="col-md-12 no_padding">
                <div class="col-sm-3 no_padding">
                    <div class="prod">
                        <div class="productinfo text-center"><img src="assets/image/product_adv/product4.jpg" alt="website template image">
                            <h3 class="prod-item-title">
                                <a href="#" itemprop="url" title="">
                                    <span >Noble Faith Men's Navy color 100% Cotton Full Sleeves Shirt (NF16MSH003A)</span>
                                </a>
                            </h3>
                            <div class="prod-item-price">
                                <span class="first">Rs. 1,599.00</span>
                            </div>
                            <div class="prod-item-original-price">
                                <span class="item-price-strikethrough">Rs. 3,198.00</span>
                                <span class="item-price-pipe">|</span>
                                <span class="item-price-bold">50% OFF</span>
                            </div>
                            <p>Easy Polo Black Edition</p>
                            <a href="http://www.free-css.com/free-css-templates" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a></div>
                    </div>
                </div>
                <div class="col-sm-3 no_padding">
                    <div class="prod">
                        <div class="productinfo text-center"><img src="assets/image/product_adv/product4.jpg" alt="website template image">
                            <h3 class="prod-item-title">
                                <a href="#" itemprop="url" title="">
                                    <span >Noble Faith Men's Navy color 100% Cotton Full Sleeves Shirt (NF16MSH003A)</span>
                                </a>
                            </h3>
                            <div class="prod-item-price">
                                <span class="first">Rs. 1,599.00</span>
                            </div>
                            <div class="prod-item-original-price">
                                <span class="item-price-strikethrough">Rs. 3,198.00</span>
                                <span class="item-price-pipe">|</span>
                                <span class="item-price-bold">50% OFF</span>
                            </div>
                            <p>Easy Polo Black Edition</p>
                            <a href="http://www.free-css.com/free-css-templates" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a></div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<?php include('./footer.php') ?>