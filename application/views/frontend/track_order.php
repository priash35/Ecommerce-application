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
                                <form class="sign-in-page" id="sign-in-page" >
                                    <legend>Track Order Details</legend>
                                    <div class="col-md-12">
                                        <div class="col-sm-6">
                                            <div class="form-group required">
                                                <label class="info-title" for="order_id" >Order Id<span>*</span></label>
                                                <input type="text" name="order_id" style="border-radius: 0" value="" class="form-control unicase-form-control text-input" required id="order_id">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 buttons">
                                        <div class="pull-right col-md-12">
                                            <button type="botton"  name="submit" class="btn-upper btn btn-primary text-center">Submit</button>
                                            <!--<input type="button" value="Update" id="button-guest" data-loading-text="Loading..." class="btn btn-conti ">-->
                                        </div>
                                    </div>
                                </form>
                                <div class="order_box" style="padding: 0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_default_1">
                                            <div class="tabbable-panel">
                                                <div class="item orderdetail_box" id="trackorder">
                                                   
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div>
                                            <table class="table">
                                                <thead>
<!--                                                    <th>Product Id</th>
                                                    <th>Product Name</th> 
                                                    <th>Product Quantity</th> -->
                                                </thead>
                                                <tbody id="track">

                                                </tbody>
                                            </table>
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

            <script>

                var baseurl = '<?php echo base_url(); ?>';
                $("form#sign-in-page").submit(function (event) {
                    event.preventDefault();
                    var orderId = $("#order_id").val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>users/track_order",
                        data: "orderId=" + orderId,
                        success: function (track_info) {
//                            alert(track_info);
//                            if(track_info === "0"){
//                                
//                                alert('Please Check Order Id');
//                            } 
                            $('#trackorder').html(track_info);
                        }
                        
                    });
                });
            </script>