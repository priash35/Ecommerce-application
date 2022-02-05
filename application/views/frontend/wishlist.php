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
                    <li>
                        <a href="<?= base_url() ?>users/edit_user"><i class="fa fa-user"></i>My Profile </a>
                    </li>
                    <!--<li>
                        <a href="trackoreder.php"><i class="fa fa-map-marker"></i>Track Order</a>
                    </li>-->
                    <li class="active">
                        <a href="<?= base_url() ?>wishlist"><i class="fa fa-heart-o"></i>Wishlist</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-10">
            <div class="order_box">
                <div class="row">
                    <div class="pull-right" style="margin-right: 20px; margin-bottom: 15px">
                        <button class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Wishlist</button>
                    </div>
                </div>

                <div class="tab-content">
                    <div class="tab-pane active" id="tab_default_1">
                        <div class="tabbable-panel">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="example">
                                    <thead>
                                        <tr>
                                            <td class="text-center">Sr. NO</td>
                                            <td class="text-center">Product Image</td>
                                            <td class="text-center">Product Name</td>
                                            <td class="text-center">Date</td>
                                            <td class="text-center">Action</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i =1;
                                        foreach ($wishlist as $row) { 
                                                //print_r($wishlist);

                                            ?>

                                            <tr>
                                                <td class="text-center">      
                                                    <?= $i++;?>
                                                </td>
                                                <td class="text-center">
                                                    <div class="photo">
                                                    <a href="<?php echo base_url();?>products/product_details/<?=$result['product_pk_id']?>"> 
                                            <img src="<?php echo base_url();?>assets/images/product_image/<?= $row->product_image ?>" class="img-responsive"  style=" height: 50px;
    width: 50px;"/></a>
                                               <div>
                                                </td>
                                                <td class="text-center">
                                                   
                                                    <?= $row->product_name ?>
                                                </td>
                                                <td class="text-center"> <?= $row->create_date?></td>
                                                
                                                <td class="text-center">
                                                    <a class="btn btn-danger" href="<?= base_url()?>wishlist/delete/<?= $row->w_id ?>"><i class="fa fa-close"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                    <tfoot>


                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form action="<?= base_url() ?>wishlist/add" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Wishlist</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Wishlist Title</label>
                        <input type="text" class="form-control" name="wishlittitle" id="wishlittitle" value="" placeholder="Wishlist Title">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" >Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>