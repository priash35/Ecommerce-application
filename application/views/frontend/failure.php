<?php
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$stud_details_id=$_POST["udf1"];
$fee_id=$_POST["udf2"];
$discount=$_POST["udf3"];
$penalty=$_POST["udf4"];
$invoice_number=$_POST["udf5"];
$submission_id=$_POST["address1"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="eCwWELxi";
//echo "<pre>";
//print_r($_REQUEST); 
$msg = '';
if(isset($_POST["additionalCharges"])) {
	$additionalCharges=$_POST["additionalCharges"];
	$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'||||||'.$invoice_number.'|'.$penalty.'|'.$discount.'|'.$fee_id.'|'.$stud_details_id.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;        
}else {	 
	$retHashSeq = $salt.'|'.$status.'||||||'.$invoice_number.'|'.$penalty.'|'.$discount.'|'.$fee_id.'|'.$stud_details_id.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
}
$hash = hash("sha512", $retHashSeq);  
if ($hash != $posted_hash) {
	$msg =  "<h6 class='orange'>Invalid Transaction. Please try again</h6>";
}else {
	
	 $msg.= "<h6 class='orange'>Your order status is ". $status .".</h6>";
	 $msg.= "<h6 class='orange'>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h6>";          
 } 
?>
<!--Please enter your website homepagge URL -->
<!--<p><a href=http://localhost/payMoney/success_failure/PayUMoney_form.php> Try Again</a></p>-->
<div class="content-wrapper">
  <section class="content">
	<div class="col-md-12 col-xs-12 column-3 subbox">
		<div class="box box1">
			<div class="box-body">
				<h2 class="cmn-headtext">Payment Failure</h2>
				<hr class="hrstyle">
				<div class="subcol-back" id="sub_col2">
					<p><?php echo $msg;?><br><br>
					<p><a href="<?php echo base_url();?>student_fees"> Try Again</a></p>
				</div>		
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
  </section>
</div>