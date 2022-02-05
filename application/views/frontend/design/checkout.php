<?php include('./header.php') ?>
<style>
    .head{background-color:  #0023b2 !important;color: #fff !important}
    .close {
        float: right;
        font-size: 21px;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        opacity: 1;
    }
    .panel-heading .accordion-toggle:after {

        float: right;
        color: #fff;
        font-size: 11px;
    }
    .pl-ziro { padding-left: 0px; }
</style>
<div class="col-md-12 product_list" >
    <section>

        <div class="col-md-9" style="padding: 0 8px;">
            <div class="checkout">
                <div class="container">
                    <div class="row">  
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading head">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="accordion-toggle collapsed">
                                            1. Login <label class="hidden"> with : xyz@gmail.com</label> </a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h2>New Customer</h2>
                                                <p>Checkout Options:</p>
                                                <div class="radio">
                                                    <p>click here to <a href="http://project1.inncrotech.site/signup.php">Signup</a></p>

                                                </div>
                                                <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="accordion-toggle collapsed" aria-expanded="false">  <input type="button" value="Continue" id="button-account" data-loading-text="Loading..." class="btn btn-checkout"></a>
                                            </div>
                                            <div class="col-sm-6">
                                                <h2>Returning Customer</h2>
                                                <p>I am a returning customer</p>
                                                <div class="form-group">
                                                    <label class="control-label" for="input-email">E-Mail</label>
                                                    <input type="text" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="input-password">Password</label>
                                                    <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
                                                    <a href=""  data-toggle="modal" data-target="#fpassword" >Forgotten Password</a></div>
                                                <input type="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" value="Login" id="button-login" data-loading-text="Loading..." class="btn btn-checkout">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading head">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="accordion-toggle ">
                                            2. Delivery Address</a>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="checkbox">
                                            <div class="col-md-12">
                                                <label class="col-md-12">
                                                    <input type="checkbox" name="shipping_address" value="1" checked="checked">
                                                    <b>John Dev</b>&nbsp;<b>+91 1234567890</b>
                                                </label>
                                                <div class="col-md-7">
                                                    <p>&nbsp;Hadapsar , Pune 411028.&nbsp;<a href="" data-toggle="modal" data-target="#addressedit">Edit</a></p>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" value="Delivery Here" id="button-account" data-loading-text="Loading..." class="btn btn-checkout">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading head">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#addaddress" class="accordion-toggle ">
                                            + Add New Address</a>
                                    </h4>
                                </div>
                                <div id="addaddress" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <fieldset id="account">
                                                    <legend>Your Personal Details</legend>
                                                    <div class="col-md-6">
                                                        <div class="form-group required">
                                                            <label class="control-label" >Full Name</label>
                                                            <input type="text" name="Fullname" value="" placeholder="Full Name" id="input-payment-fullname" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group required ">
                                                            <label class="control-label" >E-Mail</label>
                                                            <input type="text" name="email" value="" placeholder="E-Mail" id="input-payment-email" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group required">
                                                            <label class="control-label" >Mobile</label>
                                                            <input type="number" onKeyPress="if (this.value.length == 10)
                                                                        return false;" name="Mobile" value="" placeholder="Mobile" maxlength="10" id="input-payment-mobile" class="form-control">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-12">
                                                <fieldset id="address" class="required">
                                                    <legend>Your Address</legend>
                                                    <div class="col-md-6">
                                                        <div class="form-group required">
                                                            <label class="control-label" >Address 1</label>
                                                            <input type="text" name="address_1" value="" placeholder="Address 1" id="input-payment-address-1" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" >Address 2</label>
                                                            <input type="text" name="address_2" value="" placeholder="Address 2" id="input-payment-address-2" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group required">
                                                            <label class="control-label">City</label>
                                            <select id="secondlist" name="city_id" id="input-payment-zone" class="form-control"><option value="Ahmednagar">Ahmednagar</option><option value="Akola">Akola</option><option value="Alibag">Alibag</option><option value="Amaravati">Amaravati</option><option value="Arnala">Arnala</option><option value="Aurangabad">Aurangabad</option><option value="Aurangabad">Aurangabad</option><option value="Bandra">Bandra</option><option value="Bassain">Bassain</option><option value="Belapur">Belapur</option><option value="Bhiwandi">Bhiwandi</option><option value="Bhusaval">Bhusaval</option><option value="Borliai-Mandla">Borliai-Mandla</option><option value="Chandrapur">Chandrapur</option><option value="Dahanu">Dahanu</option><option value="Daulatabad">Daulatabad</option><option value="Dighi (Pune)">Dighi (Pune)</option><option value="Dombivali">Dombivali</option><option value="Goa">Goa</option><option value="Jaitapur">Jaitapur</option><option value="Jalgaon">Jalgaon</option><option value="Jawaharlal Nehru (Nhava Sheva)">Jawaharlal Nehru (Nhava Sheva)</option><option value="Kalyan">Kalyan</option><option value="Karanja">Karanja</option><option value="Kelwa">Kelwa</option><option value="Khopoli">Khopoli</option><option value="Kolhapur">Kolhapur</option><option value="Lonavale">Lonavale</option><option value="Malegaon">Malegaon</option><option value="Malwan">Malwan</option><option value="Manori">Manori</option><option value="Mira Bhayandar">Mira Bhayandar</option><option value="Miraj">Miraj</option><option value="Mumbai (ex Bombay)">Mumbai (ex Bombay)</option><option value="Murad">Murad</option><option value="Nagapur">Nagapur</option><option value="Nagpur">Nagpur</option><option value="Nalasopara">Nalasopara</option><option value="Nanded">Nanded</option><option value="Nandgaon">Nandgaon</option><option value="Nasik">Nasik</option><option value="Navi Mumbai">Navi Mumbai</option><option value="Nhave">Nhave</option><option value="Osmanabad">Osmanabad</option><option value="Palghar">Palghar</option><option value="Panvel">Panvel</option><option value="Pimpri">Pimpri</option><option value="Pune">Pune</option><option value="Ratnagiri">Ratnagiri</option><option value="Sholapur">Sholapur</option><option value="Shrirampur">Shrirampur</option><option value="Shriwardhan">Shriwardhan</option><option value="Tarapur">Tarapur</option><option value="Thana">Thana</option><option value="Thane">Thane</option><option value="Trombay">Trombay</option><option value="Varsova">Varsova</option><option value="Vengurla">Vengurla</option><option value="Virar">Virar</option><option value="Wada">Wada</option></select>
                                        
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group required">
                                                            <label class="control-label" >Pin Code</label>
                                                            <input type="text" name="postcode" value="" placeholder="Pin Code" id="input-payment-postcode" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group required">
                                                            <label class="control-label" >Country</label>
                                                            <select name="country_id" id="input-payment-country" class="form-control">
                                                                <!--<option value=""> --- Please Select --- </option>-->
                                                                <option value="india">India</option>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group required">
                                                            <label class="control-label" >State</label>
                                                            <select name="country_id" id="input-payment-country" class="form-control">
                                                                <!--<option value=""> --- Please Select --- </option>-->
                                                                <option value="Maharashtra">Maharashtra</option>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <div class="col-md-12">
                                                    <input type="button"  data-toggle="collapse" data-parent="#accordion" href="#collapse3" value="Add & Delivery Here" id="button-account" data-loading-text="Loading..." class="btn btn-checkout">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading head">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="accordion-toggle ">
                                            3. Order Detail</a>
                                    </h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="prod_info">
                                                <div class="col-md-2 no_padding">
                                                    <div class="prod_image">
                                                        <a href="">
                                                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample4.jpg" class="img-responsive">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-11 prod_details">
                                                    <h3><a target="_blank" href="">Marco Ferro Dzire Boat</a></h3>
                                                    <!--<p>Total Price: <span><i class="fa fa-rupee"></i> 345</span></p>-->

                                                    <div class="row add-to-cart">
                                                        <p  class="col-md-2">QTY:</p>
                                                        <div class="col-md-7 product-qty">
                                                            <span class="btn btn-default btn-sm btn-qty">
                                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                            </span>
                                                            <input class="btn btn-default btn-sm btn-qty" value="1">
                                                            <span class="btn btn-default btn-sm btn-qty">
                                                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <p>Color: <span>Black</span></p>
                                                    <p>Seller: <span>Brand</span></p>
                                                </div>
                                                <div class="col-md-1 col-xs-1 prod_details">
                                                    <h3><i class="fa fa-rupee"></i> 345</h3>
                                                </div>
                                                <div class="col-md-4 prod_details">
                                                    <div class="status_tracking">
                                                        <h3>
                                                            <span class="del_status">delivery by Thus, 18 May' 17</span>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 prod_details">
                                                    <h3><a href=""><i class="fa fa-trash-o"></i></a></h3>
                                                </div>
                                            </div>

                                        </div> <hr>
                                        <div class="row">
                                            <div class="col-md-8 text-left pdt10"><span class=""><span>Order confirmation email will be sent to </span></span>xyz@gmail.com</div>
                                            <div class="col-md-4 text-right pdt10"> <input type="button" value="Continue" id="button-account" data-toggle="collapse" data-parent="#accordion" href="#payment" class="btn btn-checkout"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading head">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#payment" class="accordion-toggle ">
                                            4. Payment </a>
                                    </h4>
                                </div>
                                <div id="payment" class="panel-collapse collapse">
                                
                                    <div class="panel-body">
                                    <div class="col-md-12 col-xs-12" style="padding:0 ;">
                                    <Button href="" class="apply btn blue-white btn_effect" style="margin-bottom:10px;">Apply Coupons</Button>
                                    
                                    	<div class="col-md-4 col-sm-11 col-xs-12 inputcode" style="display:none;padding:0 ;">
                                    		<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control" id="uLogin" placeholder="Enter Coupons Code">
							<label for="uLogin" class="input-group-addon btn-checkout successbtn">Apply</label>
						</div>
						<label class="offertxt" style="display:none;color: green;">Code Apply Successfully</label>
						</div>
					</div> <!-- /.form-group -->
                                    	</div>
                                        <p>Please select the preferred payment method to use on this order.</p>

                                        <ul class="nav nav-tabs">
                                            <li class="active hidden-xs hidden-sm"><a data-toggle="tab" href="#home">Cash On Delivery</a></li>
                                            <li class="hidden-xs hidden-sm"><a data-toggle="tab" href="#menu1">Credit | Debit Cards</a></li>
                                             <li class="active hidden-md hidden-lg"><a data-toggle="tab" href="#home">COD</a></li>
                                            <li class="hidden-md hidden-lg"><a data-toggle="tab" href="#menu1">Debit Cards</a></li>
                                        </ul>

                                        <div class="tab-content">
                                            <div id="home" class="tab-pane fade in active">
                                                <div class="col-md-12">
                                                    <p></p>
                                                    <a href="" data-toggle="modal" data-target="#conforim"><input type="button" value="Confirm Order" id="button-account" data-loading-text="Loading..." class="btn btn-checkout collapsed" aria-expanded="false"></a>
                                                </div>
                                            </div>
                                            <div id="menu1" class="tab-pane fade">
                                                <p><form action="" style="    font-size: 13px;">
  <input type="radio" name="gender" value="male" checked class="savedcard"> Saved Cards
  <input type="radio" name="gender" value="female" class="newcard"> New Card
</form></p>  <div class="col-md-12 savedcardform" style="padding:0">
                                                 <!-- CREDIT CARD FORM STARTS HERE -->
             <div  class="col-md-6 " style="padding: 0; margin-bottom: 10px;">                                                     
            <div class="panel panel-default credit-card-box">
                <div class="panel-body">
                    <form role="form" id="payment-form" method="POST" action="javascript:void(0);">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">CARD NUMBER</label>
                                    <div class="input-group">
                                        <input 
                                            type="tel"
                                            class="form-control"
                                            name="cardNumber"
                                            placeholder="87XX XXXX XXXX XX56"
                                            autocomplete="cc-number"
                                            autofocus disabled
                                        />
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control" 
                                        name="cardExpiry"
                                        value="12 / 22"
                                        autocomplete="cc-exp"
                                        required disabled
                                    />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">CV</label>
                                    <input 
                                        type="tel" 
                                        class="form-control"
                                        name="cardCVC"
                                        placeholder="CVC"
                                        autocomplete="cc-csc"
                                        required 
                                    />
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>            </div>
            <!-- CREDIT CARD FORM ENDS HERE -->
                                                     <!-- CREDIT CARD FORM STARTS HERE -->
          <div  class="col-md-6 " style="padding: 0; margin-bottom: 10px;">                                                     
            <div class="panel panel-default credit-card-box">
                <div class="panel-body">
                    <form role="form" id="payment-form" method="POST" action="javascript:void(0);">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">CARD NUMBER</label>
                                    <div class="input-group">
                                        <input 
                                            type="tel"
                                            class="form-control"
                                            name="cardNumber"
                                            value="78XX XXXX XXXX XX24"
                                            autocomplete="cc-number"
                                            required autofocus disabled
                                        />
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control" 
                                        name="cardExpiry"
                                        placeholder="01 / 25"
                                        autocomplete="cc-exp"
                                        required disabled
                                    />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">CV</label>
                                    <input 
                                        type="tel" 
                                        class="form-control"
                                        name="cardCVC"
                                        placeholder="CVC"
                                        autocomplete="cc-csc"
                                        required
                                    />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            </div>
            <!-- CREDIT CARD FORM ENDS HERE -->
            <div class="col-md-12" style="    margin-top: 15px;">
                            <div class="col-md-5 text-left col-xs-12">
                                <button class="subscribe btn btn-checkout btn-lg btn-block" type="button">Pay <i class="fa fa-rupee"></i> 98.00</button>
                            </div>
                        </div>
                                                </div>
                                                <div  class="newcardform" style="display:none">
                                                <!-- CREDIT CARD FORM STARTS HERE -->
          <div  class="col-md-6 "  style="padding: 0; margin-bottom: 10px;">                                                     
            <div class="panel panel-default credit-card-box">
                <div class="panel-body">
                    <form role="form" id="payment-form" method="POST" action="javascript:void(0);">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">CARD NUMBER</label>
                                    <div class="input-group">
                                        <input 
                                            type="tel"
                                            class="form-control"
                                            name="cardNumber"
                                            placeholder="Valid Card Number"
                                            autocomplete="cc-number"
                                            required autofocus 
                                        />
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control" 
                                        name="cardExpiry"
                                        placeholder="MM / YY"
                                        autocomplete="cc-exp"
                                        required 
                                    />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">CV</label>
                                    <input 
                                        type="tel" 
                                        class="form-control"
                                        name="cardCVC"
                                        placeholder="CVC"
                                        autocomplete="cc-csc"
                                        required
                                    />
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="subscribe btn btn-checkout btn-lg btn-block" type="button">Pay <i class="fa fa-rupee"></i> 98.00</button>
                            </div>
                        </div>
                        <div class="row" style="display:none;">
                            <div class="col-xs-12">
                                <p class="payment-errors"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            </div>
            <!-- CREDIT CARD FORM ENDS HERE -->
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
        <div class="col-md-3" style="padding: 0;">
            <div class="checkout" >
                <div class="panel panel-default">
                    <div class="panel-heading head">Order Details</div>
                    <div class="panel-body">
                        <div>
                            <div class="col-md-8 col-xs-8 text-left">
                                <p>Amount <span>1 Item</span></p>
                            </div>
                            <div class="col-md-4 col-xs-4 text-right">
                                <p><i class="fa fa-rupee"> </i> 98.00 </p>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-8 col-xs-8 text-left">
                                <p>Delivery Charges</p>
                            </div>
                            <div class="col-md-4 col-xs-4 text-right">
                                <p><i class="fa fa-rupee"> </i> 20.00 </p>
                            </div>
                        </div>
                        <div >
                            <div class="col-md-8 col-xs-8 text-left">
                                <p>Coupon Apply</p>
                            </div>
                            <div class="col-md-4 col-xs-4 text-right">
                                <p class="nocode"><i class="fa fa-rupee"> </i> 0.00 </p>
                                <p style="display:none" class="offertxt"><i class="fa fa-rupee" > </i> 20.00 </p>
                            </div>
                        </div>
                        <hr style="border: 1px solid #8c8787;">
                        <div>
                            <div class="col-md-8 col-xs-8 text-left">
                                <label>Total Amount</label>
                            </div>
                            <div class="col-md-4 col-xs-4 text-right">
                                <label><i class="fa fa-rupee"> </i> 98.00 </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Address Edit Modal -->
<div class="modal fade" id="addressedit" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header head modelhead">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Address</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <fieldset id="account">
                            <legend>Your Personal Details</legend>
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label class="control-label" >Full Name</label>
                                    <input type="text" name="Fullname" value="" placeholder="Full Name" id="input-payment-fullname" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required ">
                                    <label class="control-label" >E-Mail</label>
                                    <input type="text" name="email" value="" placeholder="E-Mail" id="input-payment-email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label class="control-label" >Mobile</label>
                                    <input type="number" onKeyPress="if (this.value.length == 10)
                                                return false;" name="Mobile" value="" placeholder="Mobile" maxlength="10" id="input-payment-mobile" class="form-control">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-sm-12">
                        <fieldset id="address" class="required">
                            <legend>Your Address</legend>
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label class="control-label" >Address 1</label>
                                    <input type="text" name="address_1" value="" placeholder="Address 1" id="input-payment-address-1" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" >Address 2</label>
                                    <input type="text" name="address_2" value="" placeholder="Address 2" id="input-payment-address-2" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label class="control-label">City</label>
                                            <select id="secondlist" name="city_id" id="input-payment-zone" class="form-control"><option value="Ahmednagar">Ahmednagar</option><option value="Akola">Akola</option><option value="Alibag">Alibag</option><option value="Amaravati">Amaravati</option><option value="Arnala">Arnala</option><option value="Aurangabad">Aurangabad</option><option value="Aurangabad">Aurangabad</option><option value="Bandra">Bandra</option><option value="Bassain">Bassain</option><option value="Belapur">Belapur</option><option value="Bhiwandi">Bhiwandi</option><option value="Bhusaval">Bhusaval</option><option value="Borliai-Mandla">Borliai-Mandla</option><option value="Chandrapur">Chandrapur</option><option value="Dahanu">Dahanu</option><option value="Daulatabad">Daulatabad</option><option value="Dighi (Pune)">Dighi (Pune)</option><option value="Dombivali">Dombivali</option><option value="Goa">Goa</option><option value="Jaitapur">Jaitapur</option><option value="Jalgaon">Jalgaon</option><option value="Jawaharlal Nehru (Nhava Sheva)">Jawaharlal Nehru (Nhava Sheva)</option><option value="Kalyan">Kalyan</option><option value="Karanja">Karanja</option><option value="Kelwa">Kelwa</option><option value="Khopoli">Khopoli</option><option value="Kolhapur">Kolhapur</option><option value="Lonavale">Lonavale</option><option value="Malegaon">Malegaon</option><option value="Malwan">Malwan</option><option value="Manori">Manori</option><option value="Mira Bhayandar">Mira Bhayandar</option><option value="Miraj">Miraj</option><option value="Mumbai (ex Bombay)">Mumbai (ex Bombay)</option><option value="Murad">Murad</option><option value="Nagapur">Nagapur</option><option value="Nagpur">Nagpur</option><option value="Nalasopara">Nalasopara</option><option value="Nanded">Nanded</option><option value="Nandgaon">Nandgaon</option><option value="Nasik">Nasik</option><option value="Navi Mumbai">Navi Mumbai</option><option value="Nhave">Nhave</option><option value="Osmanabad">Osmanabad</option><option value="Palghar">Palghar</option><option value="Panvel">Panvel</option><option value="Pimpri">Pimpri</option><option value="Pune">Pune</option><option value="Ratnagiri">Ratnagiri</option><option value="Sholapur">Sholapur</option><option value="Shrirampur">Shrirampur</option><option value="Shriwardhan">Shriwardhan</option><option value="Tarapur">Tarapur</option><option value="Thana">Thana</option><option value="Thane">Thane</option><option value="Trombay">Trombay</option><option value="Varsova">Varsova</option><option value="Vengurla">Vengurla</option><option value="Virar">Virar</option><option value="Wada">Wada</option></select></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label class="control-label" >Pin Code</label>
                                    <input type="text" name="postcode" value="" placeholder="Pin Code" id="input-payment-postcode" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label class="control-label" >Country</label>
                                    <select name="country_id" id="input-payment-country" class="form-control">
                                       <!-- <option value=""> --- Please Select --- </option>-->
                                        <option value="india">India</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label class="control-label" >State</label>
                                    <select name="country_id" id="input-payment-country" class="form-control">
                                        <!-- <option value=""> --- Please Select --- </option>-->
                                        <option value="Maharashtra">Maharashtra</option>
                                    </select> 
                                </div>
                            </div>
                        </fieldset>
                        <div class="col-md-12">
                            <input type="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" data-dismiss="modal" value="Update & Delivery Here" id="button-account" data-loading-text="Loading..." class="btn btn-checkout">
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


<div class="modal fade" id="conforim" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header head modelhead">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Order Received</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <fieldset id="account">
                              <p>Your Order has received. <br><b>Order No :</b> XCA123456 </p>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
       $(".apply").click(function(){
        $(".inputcode").show();
         $(".apply").hide();
    });
     $(".successbtn").click(function(){
        $(".offertxt").show();
         $(".nocode").hide();
        
    });
    $(".savedcard").click(function(){
        $(".savedcardform").show();
         $(".newcardform").hide();
        
    });
    $(".newcard").click(function(){
        $(".newcardform").show();
         $(".savedcardform").hide();
        
    });
});
</script>
<?php include('./footer.php') ?>