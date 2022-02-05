<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-picZoomer.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.picZoomer.js"></script>
<script type="text/javascript">
    $(function () {
        $('.picZoomer').picZoomer();


        //
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
        </div><?php //print_r($product_data[0]);         ?>
        <div class="col-md-10">
            <div class="products_details_box">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="picZoomer">
                                <?php
                                if (!empty($product_images)) {
                                    $prod_img = base_url() . 'assets/images/product_image/' . $product_images[0]['file_name'];
                                } else {
                                    $prod_img = base_url() . 'assets/frontend/product_image/no-image-140.jpg';
                                }
                                ?>
                                <img src="<?= $prod_img ?>" class="img-responsive" style="width: 100%; height: 250px;">
                            </div>

                            <ul class="piclist">
                                <?php
                                if (isset($product_images) && !empty($product_images)) {
                                    for ($i = 0; $i < count($product_images); $i++) {
                                        ?> 
                                        <li>
                                            <a href="#">
                                                <div class="ptImg"><img src="<?php echo base_url(); ?>assets/images/product_image/<?php echo $product_images[$i]['file_name']; ?>"></div>
                                                <!--<div class="ptSize">1 kg</div>
                                                <div class="ptAmount">&#8377; 1,234</div>-->
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">

                            <form action="<?php echo base_url(); ?>shopping/add" id="add_to_cart_form" method='POST'>
                                <div class="detail-info">
                                    <i class="fav fa fa-heart-o" style="font-size: 20px;color: black;" onclick="setColor(event, 'button', '#101010')"></i>
                                    <h2 class="title-detail"><?php echo $product_data[0]['product_name'] ?></h2>

                                    <div class="product-order">
                                        <span>235 Orders</span>
                                    </div>
                                    <div class="product-code">
                                        <label>Item Code  </label> <span>#<?= $product_data[0]['SUK'] ?></span>
                                    </div>
                                    <div class="product-stock">
                                        <label>Availability  </label> <span><?php
                                            if ($product_data[0]['QTY'] > 0) {
                                                echo "In Stock";
                                            } else {
                                                echo "Out of Stock";
                                            }
                                            ?></span>
                                    </div>
                                    <div class="delivery_check ">
                                        <label>Delivery </label> 
                                        <span class=""> 
                                            <div class="inner-addon left-addon">
                                                <i class="fa fa-map-marker"></i>
                                                <input type="text" class="pin" name="pincode" id="pincode" maxlength="6" placeholder="411028" style="border: none;border-bottom: 1px solid #1a8dbb;padding: 5px 3px 4px 32px;"/>
                                                <span style="font-weight: 500;cursor: pointer;font-size: 14px;color: #2874f0;margin-left: auto;" onclick="check_pincode_exist('<?php echo $product_data[0]['product_pk_id'] ?>');">Check</span>
                                            </div>
                                        </span>
                                        <span id="orderdays">Delivery Order in next 4-5 Days.</span>

                                        <p class="dstatus"></p>
                                    </div>
                                    <div class="info-price info-price-detail">
                                        <?php
                                        $dis_price = $product_data[0]['size_prize'] - ($product_data[0]['size_prize'] * ($product_data[0]['size_descount'] / 100));
                                        ?>
                                        <label>Price </label> <span id="pro_price"><i class="fa fa-rupee"></i><?php echo number_format((float) $dis_price, 2, '.', ''); ?></span><del id="actual_price"><i class="fa fa-rupee"></i><?php echo $product_data[0]['size_prize']; ?></del>
                                    </div>

                                    <?php if ($product_data[0]['product_color'] != "") { ?>
                                        <div class="color_order">

                                            <label>Color  </label>  
                                            <div class="btn-group" data-toggle="buttons">
                                                <?php
                                                $colr = (explode(",", $product_data[0]['product_color']));
                                                $colrCount = 1;
                                                foreach ($colr as $clrID) {
                                                    $sql = "select * from product_colors where color_pk_id=" . $clrID;
                                                    $query = $this->db->query($sql);

                                                    if ($query->num_rows() > 0) {
                                                        foreach ($query->result() as $row) {
                                                            $active = '';
                                                            if ($colrCount == 1) {
                                                                $active = 'active ';
                                                            }
                                                            ?>
                                                            <label class="btn <?php echo $active; ?>" style="background-color: <?php echo $row->color_code; ?> ">
                                                                <input type="radio" name="options" id="option2" value="<?php echo $row->color_code; ?>">
                                                                <span class="fa fa-check"></span>
                                                            </label>
                                                            <?php
                                                        }
                                                    } $colrCount++;
                                                }
                                                ?>


                                            </div>

                                        </div>
                                    <?php } 
                                   
                                    ?>
                                    <?php  if (!empty($product_size)) {
                                        if($product_size[0][size_name] != 0){
                                        ?>
                                    <div class="size_order">
                                        <label>Size  </label>
                                        <?php
                                        
                                            $i = 1;
                                            foreach ($product_size as $res) {
                                                $selected = '';
                                                $dis_price = $res['size_prize'] - ($res['size_prize'] * ($res['size_descount'] / 100));
                                                $disc_price = number_format((float) $dis_price, 2, '.', '');
                                                if ($i == 1) {
                                                    $selected = 'background:red';
                                                }
                                                ?>
                                                <span class="X" id="<?php echo $res['size_name'] ?>" style="<?php echo $selected; ?>" onclick="change_size('<?php echo $res['size_name'] ?>')"><?php echo $res['size'] ?></span>
                                                <input type="hidden" id="product_disc_<?php echo $res['size_name'] ?>"  value="<?php echo $disc_price; ?>">
                                                <input type="hidden" id="product_price_<?php echo $res['size_name'] ?>"  value="<?php echo $res['size_prize']; ?>">
                                                <input type="hidden" id="product_sizeid_<?php echo $res['size_name'] ?>"  value="<?php echo $res['ps_id']; ?>">

                                                <?php
                                                $i++;
                                            }
                                        
                                        ?>
                                    </div>
                                    
                                    <?php } }?>
                                    
                                        <input type="hidden" id="product_sizeid"  name="product_sizeid_price" value="<?php echo $product_data[0]['ps_id']; ?>">
                                        <input type="hidden" id="product_disc"  name="product_disc_price" value="<?php echo $dis_price; ?>">
                                        <input type="hidden" id="product_price" name="product_price_price" value="<?php echo $product_data[0]['size_prize']; ?>">

                                    <div class="row add-to-cart">
                                        <label class="col-md-1">Qty </label>
                                        <div class="col-md-4 product-qty">
                                            <span class="btn btn-info btn-sm btn-qty" onclick="incrementValue()">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true" ></span>
                                            </span>
                                            <input class="btn btn-default btn-sm btn-qty" name="qty" id="qty" value="1" />
                                            <span class="btn btn-danger btn-sm btn-qty" onclick="decrementValue()">
                                                <span class="glyphicon glyphicon-minus" aria-hidden="true" ></span>
                                            </span>
                                        </div>
                                    </div><!-- end row -->
                                    <div class="buy_product" style="margin-top: 10px;">
                                        <input type="hidden" name="id" id="product_id" value="<?php echo $product_data[0]['product_pk_id'] ?>">
                                        <input type="hidden" name="name" id="pro_name" value="<?php echo $product_data[0]['product_name'] ?>">
                                        <button  type="submit"  value="Add to Cart" name="action" id="add_to_cart"  class="btn blue-white btn_effect">Add To Cart</button>
                                        <button  class="btn blue_btn btn_effect"  id="buy_now">Buy Now</button>
                                    </div>
                                </div>
                            </form>
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
                                            <?php
                                            if (!empty($sub_cat_products)) {
                                                foreach ($sub_cat_products as $rec) {
                                                    $sql = "select * from product_images where product_fk_id=" . $rec['product_pk_id'];
                                                    $query = $this->db->query($sql);
                                                    $imgData = $query->result();

                                                    $dis_price = $rec['size_prize'] - ($rec['size_prize'] * ($rec['size_descount'] / 100));

                                                    if ($imgData[0]->file_name != '') {
                                                        $src = $imgData[0]->file_name;
                                                    } else {
                                                        $src = 'no-image-140.jpg';
                                                    }
                                                    ?>
                                                    <div class="item "> 
                                                        <!--<i class="fav fa fa-heart-o" style="font-size: 20px; margin-right: 17px;color: black;" onclick="setColor(event, 'button', '#101010')"></i>-->
                                                        <i class="fav fa fa-heart-o" style="font-size:20px; margin-right:17px; color: black;" onclick="setColor(event, 'button', '#0023b2', '<?php echo $rec['product_pk_id']?>' )"></i>
                                                        <div class="col-item">
                                                            <div class="photo">
                                                                <a href="<?php echo base_url(); ?>products/product_details/<?php echo $rec['product_pk_id']; ?>"> <img src="<?php echo base_url(); ?>assets/images/product_image/<?php echo $src; ?>" class="img-responsive" alt="a" /></a>
                                                            </div>
                                                            <div class="info">
                                                                <div class="col-md-12">
                                                                    <div class="price ">
                                                                        <a href="<?php echo base_url(); ?>products/product_details/<?php echo $rec['product_pk_id']; ?>"><h6 class="title-product"><?php echo $rec['product_name']; ?></h6></a>
                                                                    </div>
                                                                </div>
                                                                <div class="separator clear-left">
                                                                    <div class="col-md-12">
                                                                        <p class="price-tag">
                                                                            <span class="price_strikethrough"><i class="fa fa-inr"></i><span><?php echo $rec['size_prize']; ?></span></span>
                                                                            <span ><i class="fa fa-inr"></i><span><?php echo $dis_price; ?></span></span>
                                                                            <span><a href="<?php echo base_url(); ?>products/product_details/<?php echo $rec['product_pk_id']; ?>"><button type="submit" class="btn btn-default shopbtn">Show Now  </button></a></span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>

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

                    <a href="index.php" > <button type="button"  class="btn-upper btn btn-primary">Submit</button></a>
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
    function incrementValue() {
        var value = parseInt(document.getElementById('qty').value, 10);
        value = isNaN(value) ? 1 : value;
        value++;
        document.getElementById('qty').value = value;
    }
    function decrementValue() {
        var value = document.getElementById('qty').value;
        if (value > 1) {
            value--;
        }
        document.getElementById('qty').value = value;
    }

    function change_size(size) {
        $(".X").css('background', '#fff');
        $("#" + size).css('background', 'red');
        var disc_price = $("#product_disc_" + size).val();
        $("#product_disc").val(disc_price);

        var act_price = $("#product_price_" + size).val();
        $("#product_price").val(act_price);
        var act_pricesize = $("#product_sizeid_" + size).val();
        $("#product_sizeid").val(act_pricesize);

        $("#pro_price").html('');
        $("#pro_price").append('<i class="fa fa-rupee"></i>' + disc_price);
        $("#actual_price").html('');
        $("#actual_price").append('<i class="fa fa-rupee"></i>' + act_price);
    }

    function check_pincode_exist(id) {
        var pincode = jQuery("#pincode").val();
        jQuery.ajax({
            url: "<?php echo base_url(); ?>products/check_area_availability",
            data: {pincode: pincode, product_id: id},
            type: "post",
            async: false,
            success: function (msg) {
                if (msg == 1) {
                    jQuery(".dstatus").html("We are unable to deliver product in your area!").css("color", "red");
                    $("#buy_now").prop('disabled', true);
                    $("#add_to_cart").prop('disabled', true);
                    return false;
                } else {
                    var obj = jQuery.parseJSON(msg);
                    jQuery(".dstatus").html("Delivery Available").css("color", "green");
                    $('#orderdays').html('Delivery Order in next ' + obj.no_of_days + ' Days.')
//                    alert(delivery_charge);
                    $("#buy_now").prop('disabled', false);
                    $("#add_to_cart").prop('disabled', false);

                }
            }
        });
    }
</script>
<!-- jQuery library -->

<!-- Latest compiled JavaScript -->
</body>
</html>