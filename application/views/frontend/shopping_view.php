
<script type="text/javascript">
// To conform clear all data in cart.
    function clear_cart() {
        var result = confirm('Are you sure want to clear all bookings?');

        if (result) {
            window.location = "<?php echo base_url(); ?>index.php/shopping/remove/all";
        } else {
            return false; // cancel button
        }
    }
</script>

<div class="row product_list" style="background: rgba(239, 239, 239, 0.54)">
    <section class="col-md-12">
        <div class="col-md-10 col-md-offset-1" style="    padding-right: 0;
             background: white;
             margin-bottom: 20px;">
            <div class="container">

                <?php
                $cart_check = $this->cart->contents();

// If cart is empty, this will show below message.
                if (empty($cart_check)) {
                    echo'<table class="table table-bordered">';
                    echo'<thead>';
                    echo'<tr id= "main_heading">
                                    <td class="text-center">Image</td>
                                    <td class="text-center">Product Name</td>
                                    <!--<td class="text-center">Model</td>-->
                                    <td class="text-center">Quantity</td>
                                    <td class="text-center">Unit Price</td>
                                    <td class="text-center">Total</td>
                                    <td class="text-center">Action</td>
                                </tr> ';
                    echo'</thead>';
                    echo'<tbody>';
                    echo'<td>';
                    echo'</td>';
                    echo'</tbody>';
                    echo '</table>';
//                    echo 'To add products to your shopping cart click on "Add to Cart" Button';
                }
                ?> 
                <div class="table-responsive">
                    <?php echo form_open('shopping/update_cart'); ?>
                    <table class="table table-bordered">
                        <thead>

                            <?php
                            // All values of cart store in "$cart".
                            //pre($this->cart->contents(),1);
                            if ($cart = $this->cart->contents()):
                                ?>
                                <tr id= "main_heading">
                                    <td class="text-center">Image</td>
                                    <td class="text-center">Product Name</td>
                                    <!--<td class="text-center">Model</td>-->
                                    <td class="text-center">Quantity</td>
                                    <td class="text-center">Unit Price</td>
                                    <td class="text-center">Total</td>
                                    <td class="text-center">Action</td>
                                </tr> 
                            </thead> 
                            <tbody> 
                                <?php
                                // Create form and send all values in "shopping/update_cart" function.

                                $grand_total = 0;
                                $i = 1;
                                foreach ($cart as $item):

//                                    die();
                                    echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                                    echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                                    echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                                    echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                                    echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                                    ?>
                                    <tr> 
                                        <td>
                                            <div class="scProductInfo">

                                                <a href="<?php echo base_url(); ?>products/product_details/<?php echo $item['product_id']; ?>"" class="scImg">
                                                    <?php
                                                    $sql = "SELECT * FROM product_images where product_fk_id=" . $item['product_id'] . " LIMIT 1";
                                                    $query = $this->db->query($sql);
                                                    $itemImg = $query->result();
                                                    if ($query->num_rows() > 0) {

                                                        $prod_img = base_url() . 'assets/images/product_image/' . $itemImg[0]->file_name;
                                                    } else {
                                                        $prod_img = base_url() . 'assets/frontend/img/product1.jpg';
                                                    }
                                                    ?>
                                                    <img src="<?php echo $prod_img; ?>" id="productZoom" data-zoom-image="<?php echo $prod_img; ?>" class="img-thumbnail img-responsive" width="100">
                                                </a>
                                            </div>
                                        </td> 
                                        <td><a href="<?php echo base_url(); ?>products/product_details/<?php echo $item['product_id']; ?>"><?php echo $item['name']; ?></a><br>
                                            <?php 
                                            if($item['color'] != ""){
                                            ?>
                                            <small>Color: <label class="btn " style="background-color: <?php echo $item['color']; ?>; height: 20px; width: 20px ">

                                                </label></small>
                                            <?php }?>
                                        </td>
                                        <td>
                                        <!--<td></td>-->
                                            <div class="input-group btn-block" style="max-width: 50px;">
                                                <input type="number" class="form-control col-md-3" id="qt{{$index}}" value="<?php echo $item['qty']; ?>" min="1" max="{{prolist.price_details.p_quantity}}" onchange="change_qty('<?php echo $item['rowid']; ?>', this.value)" >
                                            </div>
                                        </td> 
                                        <td class="unitprice" id="unitprice<?php echo $item['rowid']; ?>">Rs.<?php echo number_format($item['price'], 2); ?></td> 
                                        <td class="totalprice" id="totalprice<?php echo $item['rowid']; ?>">Rs. <?php echo number_format(($item['price'] * $item['qty']), 2); ?></td>
                                        <td class="deleteItem text-center"><a href="<?php echo base_url(); ?>shopping/remove/<?php echo $item['rowid']; ?>"><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></a></td>						
                                        <?php //echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"');  ?>
                                        <?php
                                        $sub_total = ($item['price'] * $item['qty']);
                                        $grand_total = $grand_total + $sub_total;
                                        ?>
                                        <?php //echo number_format($item['subtotal'], 2) ?>

                                        <?php
                                        // cancle image.
                                        //$path = "<img src='http://localhost/codeigniter_cart/images/cart_cross.jpg' width='25px' height='20px'>";
                                        //echo anchor('shopping/remove/' . $item['rowid'], $path); 
                                        ?>
                                    <?php endforeach; ?>
                                <tr>
                            </tbody> 
                            <tfoot>
                                <tr class="visible-xs">
                                    <td class="text-center "><strong id="grand_totla">Total : <?php echo $grand_total; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>
                                        <button class ='btn btn-conti' type="button" onclick="window.location = '<?php echo base_url(); ?>'"> <i class="fa fa-angle-left"></i> Continue Shopping</button>
                                        <!--<input class ='btn btn-conti' onclick="window.location = '<?php echo base_url(); ?>'"  type="button" value="Continue Shopping"></td>-->
                                    <td colspan="3" class="hidden-xs"></td>                      
                                    <td>
                                        <button class ='btn btn-checkout btn-block' type="button" onclick="window.location = '<?php echo base_url(); ?>shopping/billing_view'">Checkout <i class="fa fa-angle-right"></i> </button>
                                        <!--<input class ='btn btn-checkout btn-block' type="button" value="Checkout" onclick="window.location = '<?php echo base_url(); ?>shopping/billing_view'">--> 
                                    </td>
                                    <td class="hidden-xs text-center grand_totla" id="grand_totla"><strong>Total <i class="fa fa-rupee"></i> <?php echo $grand_total; ?></strong></td>
                                </tr>
                            </tfoot><?php endif; ?>
                    </table>
                </div>
                </table> <?php echo form_close(); ?>
            </div>
        </div>
</div>
</section>
<script>
    function change_qty(row_id, qty) {
        jQuery.ajax({
            url: "<?php echo base_url(); ?>shopping/updatecart",
            data: {rowid: row_id, qty: qty},
            type: "post",
            async: false,
            success: function (msg) {
                var obj = jQuery.parseJSON(msg);
                $('.grand_totla').html('<strong>Total <i class="fa fa-rupee"></i> ' + obj.total_amount +' </strong>');
                $('#grand_totla').html(obj.total_amount);
                $('#unitprice'+ row_id).html('Rs. '+ obj.price);
                $('#totalprice'+ row_id).html('Rs. '+obj.subtotal);
            }
        });
    }
</script>