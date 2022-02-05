<script>
var currentURL = '<?php echo $_SERVER['QUERY_STRING'];?>';
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
                            <a href="<?= base_url()?>wishlist"><i class="fa fa-heart-o"></i>Wishlist</a>
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
                                        
                                        <table class="table table-bordered">
                                            <thead>
                                                <th>Order Id</th>
                                                <th>Order Date</th>
                                                <th>Order Status</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($order_data as $order) { ?>
                                                    <tr>
                                                        <td><?php echo $order->order_id ?></td>
                                                        <td><?php echo $order->orderdate ?></td>
                                                        <td><?php echo $order->order_status ?></td>
                                                        <td> 
                                                            <span class="order_details_btn">
                                                                <a href="<?php echo base_url(); ?>users/orderHistory/<?php echo $order->order_id ?>"><input type="button" value="Order Details" class="btn blue-white hidden-xs" style="cursor: pointer;"></a>
                                                            </span>		
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
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
