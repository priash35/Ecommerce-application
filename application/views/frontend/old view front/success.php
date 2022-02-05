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
$email= $_POST["email"];
$phone=$_POST["phone"];
$salt="eCwWELxi";
//echo '<br>';
//pre($_POST,1);
if(isset($_POST["additionalCharges"])) {
	$additionalCharges=$_POST["additionalCharges"];
	$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'||||||'.$invoice_number.'|'.$penalty.'|'.$discount.'|'.$fee_id.'|'.$stud_details_id.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;        
}else {	 
	 $retHashSeq = $salt.'|'.$status.'||||||'.$invoice_number.'|'.$penalty.'|'.$discount.'|'.$fee_id.'|'.$stud_details_id.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
}
/////////////////////////////
$msg ='';
$hash = hash("sha512", $retHashSeq);		 
if ($hash != $posted_hash) {
	$msg =  "<h6 class='orange'>Invalid Transaction. Please try again</h6>";
}
else {
	$CI = & get_instance();
	$CI->load->library('cart');
	$CI->load->model('billing_model');
	$CI->load->model('user_model');
	$Name ='';
	if(isset($CI->session->userdata['sender_name'])) {
		$senderData = $CI->session->userdata['sender_name'];
		$Name = $senderData['name'];
	}
	$passWord=rand();
	$insertDataUser = array(
					"user_first_name"=>$Name,
					"user_email"=>$_POST['email'],
					"user_password"=>MD5($passWord),
					"user_contact"=>$_POST['phone'],
					"user_status"=>1,
					"user_type"=>2
				);
	$NewUser = $CI->user_model->add_user($insertDataUser);
	//print_r($NewUser); die;
	$customer = array(
					'name'=>$Name,
					'email'=>$_POST['email'],
					'phone'=>$_POST['phone'],
					'user_fk_id'=>$NewUser
				);
				
	$customer_id = $CI->billing_model->insert_customer($customer);
	$order = array(
					'date'=>date('Y-m-d H:i:s'),
					'customerid'=>$customer_id
				);
	
	$order_id = $CI->billing_model->insert_order($order);
	$orderTrack = array(
					'orderID'=>$order_id,
					'ord_status'=>1
				);
	
	$orderTrack_ID = $CI->billing_model->insert_order_track($orderTrack);
	
	$receiver = array(
					'rname'=>$_POST['udf1'],
					'rmob'=>$_POST['udf2'],
					'remail'=>$_POST['udf3'],
					'radd1'=>$_POST['address1'],
					'radd2'=>$_POST['address2'],
					'rcon'=>$_POST['country'],
					'rpin'=>$_POST['zipcode'],
					'rcity'=>$_POST['city'],
					'rmsgC'=>$_POST['udf4'],
					'txnid'=>$_POST['txnid'],
					'amount'=>$_POST['amount'],
					'orderid'=>$order_id
				);
	
	$receiver_id = $CI->billing_model->insert_receiver($receiver);

	$query = 'INSERT INTO order_detail (orderid,productid,quantity,price) VALUES ';
	$query_parts = array();
	if(isset($CI->session->userdata['prod_arr'])) {
		$prod_arr = $CI->session->userdata['prod_arr'];
		$query_parts[] = "('".$order_id."','".$prod_arr['prod_id']."','1','".$prod_arr['price']."')";
	}else{
		if ($cart = $CI->cart->contents()){
			foreach ($cart as $item){ 
				$sub_total =($item['price']*$item['qty']);
				$query_parts[] = "('".$order_id."','".$item['id']."','".$item['qty']."','".$sub_total."')";
			}
		}
	}
	if(!empty($query_parts)){
		$query.= implode(',',$query_parts);
		$insertRecord = $CI->db->query($query);
	}
	
	$grand_total = 0;
	$html = '<html><head></head><body><div>'.
		'<table style="width:100%">'.
			'<thead>';
				if ($cart = $CI->cart->contents()){
					$html .='<tr>'.
						'<th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">Invoice Number</th>'. 
						'<th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$invoice_number.'</th>'.
						'<th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">Name</th>'. 
						'<th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$firstname.'</th>'.
						'</tr>';
					$html .='<tr >'.
					'<th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">Product Info</th>'. 
					'<th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">Quantity</th>'.
					'<th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">Amount</th>'.
					'<th style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">Total</th>'.
				'</tr>'. 
			'</thead>'. 
			'<tbody>'; 
			$grand_total = 0;
			$sub_total = 0;
			foreach ($cart as $item){
			$html.='<tr>'.
				'<td style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$item['name'].'</td>'.
				'<td style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$item['qty'].'</td>'. 
				'<td style=" border: 1px solid #dddddd;text-align: left;padding: 8px;" class="price">Rs.'.number_format($item['price'], 2).'</td>'. 
				'<td style=" border: 1px solid #dddddd;text-align: left;padding: 8px;" class="price">Rs.'.number_format(($item['price']*$item['qty']),2).'</td>';
				$sub_total =($item['price']*$item['qty']);
                $grand_total = $grand_total + $sub_total; 
             $html.='<tr>';
}}
	'</tbody><tbody><tr><td colspan="2" style=" border: 1px solid #dddddd;text-align: left;padding: 8px;"></t ><td style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">Total</td><td style=" border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$grand_total.'</td></tr></tbody>'.
	$html.='</table><div><B>Usrename: </B>'.$_POST['email'].'<br><b>Password: </b>'.$passWord.'<br><b>Traking Id / order Id: </b>'.$order_id.'</div>'.
			'</div></body></html>';
$this->load->library('email');
$this->email->set_mailtype('html');
//$this->email->from('dhananjay7747@gmail.com', 'Florisan');
$this->email->from('orders@florisan.in', 'Florisan');
$this->email->to($_POST["email"]);
$this->email->cc('');
$this->email->bcc('');

$this->email->subject('Invoice');
$this->email->message($html);

$this->email->send();
	$CI->cart->destroy();
	$CI->session->unset_userdata('prod_arr');
	$msg.= "<h6 class='orange'>Thank You. Your order status is ". $status .".</h6>";
	$msg.= "<h6 class='orange'>Your Transaction ID for this transaction is ".$txnid.".</h6>";
	$msg.= "<h6 class='orange'>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h6>";           
} 

?>
<!-- Middle Section Start -->
<section class="middleSection cmsSection">
	<div class="container">
		<div class="contactusSection">
			<h2 class="heading clearfix">
				<span>Payment Successful</span>
			</h2>
			<div class="row">
				<div class="col-md-6 col-sm-6">
       
           <?php echo $msg;?>
			</div> 
			</div>
		</div> 
	</div>
</section>	