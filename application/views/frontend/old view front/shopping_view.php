
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

<!-- Middle Section Start -->
<section class="middleSection cmsSection shoppingCartPage">
	<div class="container">
		<h2 class="heading clearfix">
			<span>My Cart</span>
		</h2>
<?php $cart_check = $this->cart->contents();
//print_r($cart_check);
// If cart is empty, this will show below message.
if(empty($cart_check)) {
echo 'To add products to your shopping cart click on "Add to Cart" Button';
} ?> 
<div class="table-responsive">
		<table class="table table-bordered shopCartTable"> 
			<thead> 
				<?php
				// All values of cart store in "$cart".
				//pre($this->cart->contents(),1);
				if ($cart = $this->cart->contents()): ?>
				<tr id= "main_heading">
					<th>Product Info</th> 
					<th>Quantity</th>
					<th>Amount</th>
					<th>Total</th>
					<th>&nbsp;</th>
				</tr> 
			</thead> 
			<tbody> 
			<?php
				// Create form and send all values in "shopping/update_cart" function.
				echo form_open('shopping/update_cart');
				$grand_total = 0;
				$i = 1;
				foreach ($cart as $item):
				// echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
				// Will produce the following output.
				// <input type="hidden" name="cart[1][id]" value="1" />

				echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
				echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
				echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
				echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
				echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
				?>
			<tr> 
				<td>
					<div class="scProductInfo">
					  
                                                        <a href="#" class="scImg">
                                            <?php 
                                                $sql ="SELECT * FROM product_images where product_fk_id=".$item['id']." LIMIT 1";
                                                $query = $this->db->query($sql);                
                                 $itemImg = $query->result();
                                                    if ($query->num_rows() > 0){                          
						
							$prod_img = base_url().'assets/images/product_image/'.$itemImg[0]->file_name;
						}else{
							$prod_img =base_url().'assets/frontend/img/product1.jpg';
						} 
						?>
						<img src="<?php echo $prod_img; ?>" id="productZoom" data-zoom-image="<?php echo $prod_img; ?>">
						</a>
					  <div class="scProductBody">
						<div class="scpName"><?php echo $item['name']; ?></div>
						
						<?php if(isset($item['pincode']) && $item['pincode']!=''){ echo $item['pincode']; } ?>
						<br/>
						<?php
							if(isset($item['delivery_time']) && $item['delivery_time']!=''){
								$arry1 = explode(' ',$item['delivery_time']); 
								$delType = array_shift($arry1);
								$timeA = implode(' ',$arry1);
								if($delType=='SD'){ $typeI = 'Standard Delivery'; }
								elseif($delType=='EXD'){$typeI = 'Express Delivery'; }
								elseif($delType=='FTD'){$typeI = 'Fixed Time Delivery'; }
								elseif($delType=='MD'){$typeI = 'Midnight Delivery'; }else{ $typeI='';}
							}else{
								$timeA='';
								$typeI='';
							}
						?>
						<span class="blueTxt"><?php if(isset($item['delivery_date']) && $item['delivery_date']!=''){ echo $item['delivery_date']; } ?>,
						<?=$timeA?></span><br/>
						<?=$typeI?><br/>
					  </div>
					</div>
				</td> 
				<td><?php echo $item['qty'];?></td> 
				<td class="price">Rs.<?php echo number_format($item['price'], 2); ?></td> 
				<td class="price">Rs. <?php echo number_format(($item['price']*$item['qty']),2);?></td>
				<td class="deleteItem text-center"><a href="<?php echo base_url();?>shopping/remove/<?php echo $item['rowid'];?>"><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></a></td>						
	<?php //echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
<?php 
$sub_total = ($item['price']*$item['qty']);
$grand_total = $grand_total + $sub_total; ?>
<?php //echo number_format($item['subtotal'], 2) ?>

<?php
// cancle image.
//$path = "<img src='http://localhost/codeigniter_cart/images/cart_cross.jpg' width='25px' height='20px'>";
//echo anchor('shopping/remove/' . $item['rowid'], $path); ?>
<?php endforeach; ?>
<tr>
		</tbody> 
	</table>
</div>
<hr>
<div class="row cartTotalTable">
			<div class="col-sm-4 col-sm-offset-8 col-xs-6 col-xs-offset-6">
				<table class="table table-bordered clean">
					<tbody>
						<tr>
							<td class="text-right totalTxt"><strong>Sub-Total:</strong></td>
							<td class="text-right price-total">Rs.<?php echo number_format($grand_total, 2) ?></td>
						</tr>
						<tr>
							<td class="text-right totalTxt"><strong>Total:</strong></td>
							<td class="text-right price-total">Rs. <?php echo $grand_total; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="scBotBtns text-right">
			<input class ='fg-button teal btn purpleBtn' onclick="window.location = '<?php echo base_url(); ?>'"  type="button" value="Continue Shopping">
			<input class ='fg-button teal btn purpleBtn' type="button" value="Checkout" onclick="window.location = '<?php echo base_url(); ?>shopping/billing_view'">
			
		</div>
	</div>
</section>

<?php echo form_close(); ?>

<!-- "Place order button" on click send "billing" controller -->

</tr>
<?php endif; ?>
</table>
</div>
