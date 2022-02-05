<script>
    var currentURL = '<?php echo $_SERVER['QUERY_STRING']; ?>';
</script>
<div class="row product_list" style="background: rgba(239, 239, 239, 0.54)">
    <section class="col-md-12">
        <div class="col-md-2" style="padding-right: 0">
            <div class="filter_box">
                <div class="filter_title">
                    <h4 style=" font-size: 24px;color: #0023b2;">My Account</h4>
                </div>
                <ul class="list-category-dropdown myacc">
                    <li>
                        <a href="<?php echo base_url(); ?>users/orderDetails">
                            <i class="fa fa-list"></i>My Orders</a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url(); ?>users/edit_user"><i class="fa fa-user"></i>My Profile </a>
                    </li>

                    <li>
                        <a href="<?= base_url() ?>wishlist"><i class="fa fa-heart-o"></i>Wishlist</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-10" >

            <div class="order_box" style="padding: 0">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_default_1">
                        <div class="tabbable-panel">
                            <div class="item orderdetail_box">
                                <div class="order_box">
                                    <div class="tabbable-panel" style="border: none">
                                        <div class="tabbable-line">
                                            <ul class="nav nav-tabs ">
                                                <li class="active">
                                                    <a href="#tab_default_1" data-toggle="tab">
                                                        Orders</a>
                                                </li>
                                                <li>
                                                    <a href="#tab_default_2" data-toggle="tab">
                                                        Returns </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="order_box" style="padding: 0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_default_1">
                                            <div class="tabbable-panel">

                                                <div class="item orderdetail_box">
                                                    <h4 style="">
                                                        <span class="order_id">Order ID: <a href="#"><?php echo $users->order_id ?></a></span><br><p style="margin-top: 10px;">Order Placed on <?= $users->orderdate ?></p>
<!--                                                        <span class="order_details_btn">
                                                            <a href="<?php echo base_url(); ?>users/orderHistory/<?php echo $order->order_id ?>"><input type="button" value="Cancel Order" class="btn blue-white hidden-xs" style="cursor: pointer;"></a>
                                                        </span>-->
                                                    </h4>
                                                    <div class="row">
                                                        
                                                        <?php 
                                                        $total = 0;
                                                        foreach ($ord_del as $row){
                                                        ?>
                                                        <div class="prod_info">
                                                            <div class="col-md-2 no_padding">
                                                                <div class="prod_image">
                                                                    <!--<a href="">-->
                                                                        <?php
                                                                            $total += floatval($row->subtotal);
                                                                            $img =  $this->db->get_where('product_images', array('product_fk_id' => $row->productid))->row();
                                                                        
                                                                        ?>
                                                                        <img src="<?php echo base_url(); ?>assets/images/product_image/<?php echo $img->file_name ?>" class="img-responsive">
                                                                    <!--</a>-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 prod_details">
                                                                <h3><a target="_blank" href=""><?php echo $row->name ?></a></h3>
                                                                <!--<p>Total Price: <span><i class="fa fa-rupee"></i> 345</span></p>-->
                                                                <p>Quantity: <span><?php echo $row->quantity ?></span></p>
                                                                <p>Color: <span><?php echo $row->color ?></span></p>
                                                            </div>
                                                            <div class="col-md-2 prod_details">
                                                                <h3><i class="fa fa-rupee"></i><?php echo $row->price ?></h3>
                                                            </div>

                                                        </div>
                                                        <?php }?>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 text-left pdt10"><span class=""><span>Ordered On </span></span> <?= $users->orderdate ?></div>
                                                        <div class="col-md-6 text-right pdt10"><span class=""><span>Order Total </span></span><span style="font-weight: 500;"><i class="fa fa-rupee"></i><?php echo $total ?></span></div>
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
<style>
    label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: 400;
    }
</style>
