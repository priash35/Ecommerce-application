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
                                <form class="sign-in-page" id="sign-in-page" >
                                    <legend>Your Personal Details</legend>
                                    <div class="col-md-12">
                                        <div class="col-sm-6">
                                            <div class="form-group required">
                                               <label class="info-title" for="InputFullname" >Full Name<span>*</span></label>
                                        <input type="text" name="fullname" style="border-radius: 0" value="<?php echo $user_info->user_first_name ?>" class="form-control unicase-form-control text-input" required id="InputFullname">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-group required ">
                                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                                <input type="email" name="email" value="<?php echo $user_info->user_email ?>" class="form-control unicase-form-control text-input" required id="user_email">
                                                <span class="email"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-group required">
                                                <label class="control-label">Telephone</label>
                                                <label class="info-title" for="InputNumber">Mobile No.<span>*</span></label>
                                                <input required type="text" maxlength="10" name="phone" id="phone" value="<?php echo $user_info->user_contact ?>"  class="form-control numbersOnly" aria-invalid="false" />
                                                <span class="contact"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <legend>Your Address</legend>
                                    <div class="col-md-12">
                                        <div class="col-sm-6">
                                            <div class="form-group required">
                                                <label class="control-label">Address 1</label>
                                                <input type="text" name="user_address" value="<?php echo $user_info->user_address ?>" placeholder="Address 1" id="input-payment-address-1" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Address 2</label>
                                                <input type="text" name="user_address1" value="<?php echo $user_info->user_address1 ?>" placeholder="Address 2" id="input-payment-address-2" class="form-control">
                                            </div>
                                          
                                            <div class="form-group required">
                                                <label class="control-label">City</label>
                                                <select id="secondlist" name="city" id="input-payment-zone" class="form-control city">
                                                    <option value="Ahmednagar" <?= $user_info->city=="Ahmednagar" ? 'selected' : "";?> >Ahmednagar</option>
                                                    <option value="Akola" <?= $user_info->city=="Akola" ? 'selected' : "";?>>Akola</option>
                                                    <option value="Alibag" <?= $user_info->city=="Alibag" ? 'selected' : "";?>>Alibag</option>
                                                    <option value="Amaravati" <?= $user_info->city=="Amaravati" ? 'selected' : "";?>>Amaravati</option>
                                                    <option value="Arnala" <?= $user_info->city=="Arnala" ? 'selected' : "";?>>Arnala</option>
                                                    <option value="Aurangabad" <?= $user_info->city=="Aurangabad" ? 'selected' : "";?>>Aurangabad</option>
                                                    <option value="Bandra" <?= $user_info->city=="Bandra" ? 'selected' : "";?>>Bandra</option>
                                                    <option value="Bassain" <?= $user_info->city=="Bassain" ? 'selected' : "";?>>Bassain</option>
                                                    <option value="Belapur" <?= $user_info->city=="Belapur" ? 'selected' : "";?>>Belapur</option>
                                                    <option value="Bhiwandi" <?= $user_info->city=="Bhiwandi" ? 'selected' : "";?>>Bhiwandi</option>
                                                    <option value="Bhusaval" <?= $user_info->city=="Bhusaval" ? 'selected' : "";?>>Bhusaval</option>
                                                    <option value="Borliai-Mandla" <?= $user_info->city=="Borliai-Mandla" ? 'selected' : "";?>>Borliai-Mandla</option>
                                                    <option value="Chandrapur" <?= $user_info->city=="Chandrapur" ? 'selected' : "";?>>Chandrapur</option>
                                                    <option value="Dahanu" <?= $user_info->city=="Dahanu" ? 'selected' : "";?>>Dahanu</option>
                                                    <option value="Daulatabad" <?= $user_info->city=="Daulatabad" ? 'selected' : "";?>>Daulatabad</option>
                                                    <option value="Dighi (Pune)" <?= $user_info->city=="Dighi (Pune)" ? 'selected' : "";?>>Dighi (Pune)</option>
                                                    <option value="Dombivali" <?= $user_info->city=="Dombivali" ? 'selected' : "";?>>Dombivali</option>
                                                    <option value="Goa" <?= $user_info->city=="Goa" ? 'selected' : "";?>>Goa</option>
                                                    <option value="Jaitapur" <?= $user_info->city=="Jaitapur" ? 'selected' : "";?>>Jaitapur</option>
                                                    <option value="Jalgaon" <?= $user_info->city=="Jalgaon" ? 'selected' : "";?>>Jalgaon</option>
                                                    <option value="Jawaharlal Nehru (Nhava Sheva)" <?= $user_info->city=="Jawaharlal Nehru (Nhava Sheva)" ? 'selected' : "";?>>Jawaharlal Nehru (Nhava Sheva)</option>
                                                    <option value="Kalyan" <?= $user_info->city=="Kalyan" ? 'selected' : "";?>>Kalyan</option>
                                                    <option value="Karanja" <?= $user_info->city=="Karanja" ? 'selected' : "";?>>Karanja</option>
                                                    <option value="Kelwa" <?= $user_info->city=="Kelwa" ? 'selected' : "";?>>Kelwa</option>
                                                    <option value="Khopoli" <?= $user_info->city=="Khopoli" ? 'selected' : "";?>>Khopoli</option>
                                                    <option value="Kolhapur" <?= $user_info->city=="Kolhapur" ? 'selected' : "";?>>Kolhapur</option>
                                                    <option value="Lonavale" <?= $user_info->city=="Lonavale" ? 'selected' : "";?>>Lonavale</option>
                                                    <option value="Malegaon" <?= $user_info->city=="Malegaon" ? 'selected' : "";?>>Malegaon</option>
                                                    <option value="Malwan" <?= $user_info->city=="Malwan" ? 'selected' : "";?>>Malwan</option>
                                                    <option value="Manori" <?= $user_info->city=="Manori" ? 'selected' : "";?>>Manori</option>
                                                    <option value="Mira Bhayandar" <?= $user_info->city=="Mira Bhayandar" ? 'selected' : "";?>>Mira Bhayandar</option>
                                                    <option value="Miraj" <?= $user_info->city=="Miraj" ? 'selected' : "";?>>Miraj</option>
                                                    <option value="Mumbai (ex Bombay)" <?= $user_info->city=="Mumbai (ex Bombay)" ? 'selected' : "";?>>Mumbai (ex Bombay)</option>
                                                    <option value="Murad" <?= $user_info->city=="Murad" ? 'selected' : "";?>>Murad</option>
                                                    <option value="Nagapur" <?= $user_info->city=="Nagapur" ? 'selected' : "";?>>Nagapur</option>
                                                    <option value="Nagpur" <?= $user_info->city=="Nagpur" ? 'selected' : "";?>>Nagpur</option>
                                                    <option value="Nalasopara" <?= $user_info->city=="Nalasopara" ? 'selected' : "";?>>Nalasopara</option>
                                                    <option value="Nanded" <?= $user_info->city=="Nanded" ? 'selected' : "";?>>Nanded</option>
                                                    <option value="Nandgaon" <?= $user_info->city=="Nandgaon" ? 'selected' : "";?>>Nandgaon</option>
                                                    <option value="Nasik" <?= $user_info->city=="Nasik" ? 'selected' : "";?>>Nasik</option>
                                                    <option value="Navi Mumbai" <?= $user_info->city=="Navi Mumbai" ? 'selected' : "";?>>Navi Mumbai</option>
                                                    <option value="Nhave" <?= $user_info->city=="Nhave" ? 'selected' : "";?>>Nhave</option>
                                                    <option value="Osmanabad" <?= $user_info->city=="Osmanabad" ? 'selected' : "";?>>Osmanabad</option>
                                                    <option value="Palghar" <?= $user_info->city=="Palghar" ? 'selected' : "";?>>Palghar</option>
                                                    <option value="Panvel" <?= $user_info->city=="Panvel" ? 'selected' : "";?>>Panvel</option>
                                                    <option value="Pimpri" <?= $user_info->city=="Pimpri" ? 'selected' : "";?>>Pimpri</option>
                                                    <option value="Pune" <?= $user_info->city=="Pune" ? 'selected' : "";?>>Pune</option>
                                                    <option value="Ratnagiri" <?= $user_info->city=="Ratnagiri" ? 'selected' : "";?>>Ratnagiri</option>
                                                    <option value="Sholapur" <?= $user_info->city=="Sholapur" ? 'selected' : "";?>>Sholapur</option>
                                                    <option value="Shrirampur" <?= $user_info->city=="Shrirampur" ? 'selected' : "";?>>Shrirampur</option>
                                                    <option value="Shriwardhan" <?= $user_info->city=="Shriwardhan" ? 'selected' : "";?>>Shriwardhan</option>
                                                    <option value="Tarapur" <?= $user_info->city=="Tarapur" ? 'selected' : "";?>>Tarapur</option>
                                                    <option value="Thane" <?= $user_info->city=="Thane" ? 'selected' : "";?>>Thane</option>
                                                    <option value="Trombay" <?= $user_info->city=="Trombay" ? 'selected' : "";?>>Trombay</option>
                                                    <option value="Varsova" <?= $user_info->city=="Varsova" ? 'selected' : "";?>>Varsova</option>
                                                    <option value="Vengurla" <?= $user_info->city=="Vengurla" ? 'selected' : "";?>>Vengurla</option>
                                                    <option value="Virar" <?= $user_info->city=="Virar" ? 'selected' : "";?>>Virar</option>
                                                    <option value="Wada" <?= $user_info->city=="Wada" ? 'selected' : "";?>>Wada</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group required">
                                                <label class="control-label">Pin Code</label>
                                                <input type="text" name="pincode" value="<?php echo $user_info->pincode ?>" placeholder="Pin Code" id="input-payment-postcode" class="form-control">
                                            </div>
                                            <div class="form-group required">
                                                <label class="control-label" for="input-payment-zone">Region / State</label>
                                                <select name="state" id="input-payment-zone1" class="form-control">
                                                <!-- <option value=""> --- Please Select --- </option><option value="Andhra Pradesh">Andhra Pradesh</option><option value="Arunachal Pradesh">Arunachal Pradesh</option><option value="Assam">Assam</option><option value="Bihar">Bihar</option><option value="Chhattisgarh">Chhattisgarh</option><option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option><option value="Daman and Diu">Daman and Diu</option><option value="Delhi">Delhi</option><option value="Goa">Goa</option><option value="Gujarat">Gujarat</option><option value="Haryana">Haryana</option><option value="Himachal Pradesh">Himachal Pradesh</option><option value="Jammu and Kashmir">Jammu and Kashmir</option><option value="Jharkhand">Jharkhand</option><option value="Karnataka">Karnataka</option><option value="Kerala">Kerala</option><option value="Madhya Pradesh">Madhya Pradesh</option>--><option value="Maharashtra">Maharashtra</option><!--<option value="Manipur">Manipur</option><option value="Meghalaya">Meghalaya</option><option value="Mizoram">Mizoram</option><option value="Nagaland">Nagaland</option><option value="Orissa">Orissa</option><option value="Puducherry">Puducherry</option><option value="Punjab">Punjab</option><option value="Rajasthan">Rajasthan</option><option value="Sikkim">Sikkim</option><option value="Tamil Nadu">Tamil Nadu</option><option value="Telangana">Telangana</option><option value="Tripura">Tripura</option><option value="Uttar Pradesh">Uttar Pradesh</option><option value="Uttarakhand">Uttarakhand</option><option value="West Bengal">West Bengal</option>--></select>
                                            </div>
                                            <div class="form-group required">
                                                <label class="control-label">Country</label>
                                                <select name="country" id="input-payment-country" class="form-control">
                                                    <!--<option value=""> --- Please Select --- </option>-->

                                                    <option value="India">India</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 buttons">
                                        <div class="pull-right col-md-12">
                                            <button type="botton"  name="register" class="btn-upper btn btn-primary text-center">Update</button>
                                            <!--<input type="button" value="Update" id="button-guest" data-loading-text="Loading..." class="btn btn-conti ">-->
                                        </div>
                                    </div>
                                 </form>
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
    jQuery('.numbersOnly').keyup(function () { 
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });
    
	$(document).ready(function(){
		var baseurl ='<?php echo base_url();?>';
//		$("#InputEmail1").focusout(function(e){
//			var email = jQuery("#InputEmail1").val();
//			jQuery.ajax({
//				url: baseurl+"users/check_email",
//				data: {email: email},
//				type:"post",
//				async: false,
//				success:function(msg){
//					if(msg>0){
//						jQuery(".email").html("");
//						return true;
//					}else{
//						jQuery(".email").html("Email id already exist, Please try another!").css("color","red");
//						return false;
//					}
//				}
//			});
//		});

		$("form#sign-in-page").submit(function(event) {
			event.preventDefault();
			var fname = $("#InputFullname").val();
			var phone = $("#phone").val();
			var email = $("#user_email").val();
//			var pass = $("#InputPassword1").val();
                        var address1 = $("#input-payment-address-1").val();
			var addrerss2 = $("#input-payment-address-2").val();
			var city = $(".city").val();
			var pincode = $("#input-payment-postcode").val();
                        var state = $("#input-payment-zone1").val();
			var country = $("#input-payment-country").val();
//                        alert(city);
			$("#hemail").val(email);

					var flag = Array();
					var i = 0;

					var contact=$("#phone").val();
					if((isNaN(contact)) || ($.trim(contact)=='')){
						$(".contact").html("Please enter phone").css("color","red");
						flag[i] = false;
						i++;
					}else if(contact.length!='10'){
						$(".contact").html("Please enter 10 digit phone").css("color","red");
						flag[i] = false;
						i++;
					}else{
						$(".contact").html("");
						flag[i] = true;
						i++;
					}
					if(($.trim(email)=='')){
						flag[i] = false;
						i++;
                                        }
					var n = 0;
					for(var j=0;j<flag.length;j++){
						if(flag[j] == false){
							n++;
						}else{

						}
					}
					if(n>0){
						return false;
					}else{

						$.ajax({
							type: "POST",
							url: "<?php echo base_url(); ?>users/edit_user",
							data: "fname=" + fname + "&phone=" + phone + "&email=" + email + "&address1=" + address1+ "&addrerss2=" + addrerss2
                                                                + "&city=" + city+ "&pincode=" + pincode+ "&state=" + state+ "&country=" + country,
							success: function(result){

                                                                alert("Profile Updated Successfully");

							}

						});
					}
		});
	});


</script>