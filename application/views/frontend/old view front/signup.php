
<div style="background-color: #eaeaea;">
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>/
                    <li class="active">Sign Up</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>

    <div id="login">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <form class="sign-in-page" id="sign-in-page" >
                    <div class="row">
                        <!-- Sign-in -->			
                        <div class="col-md-7 col-sm-7 sign-in">
                            <h4 class="">Sign Up</h4>
                            <p class="">Hello, Welcome to Shopping.</p>
                            <div class="register-form outer-top-xs" >
                                <div class="form-group">
                                    <label class="info-title" for="InputFullname" >Full Name<span>*</span></label>
                                    <input type="text" name="fullname" style="border-radius: 0" class="form-control unicase-form-control text-input" required id="InputFullname">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="InputNumber">Mobile No.<span>*</span></label>
                                    <input required type="number" name="phone" id="phone" onKeyPress="if (this.value.length == 10) return false;" class="form-control" aria-invalid="false" />
									<span class="contact"></span>
								</div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                    <input type="email" name="email" class="form-control unicase-form-control text-input" required id="InputEmail1">
									<span class="email"></span>
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputPassword1" >Password <span>*</span></label>
                                    <input type="password" name="pass" required class="form-control unicase-form-control text-input" onKeyPress="if (this.value.length == 10)
                                                        return false;" id="InputPassword1">
													<span class="password"></span>
                                </div>
                                <button type="botton"  name="register" class="btn-upper btn btn-primary text-center"  >Sign Up</button>
								
							</div>					
                        </div>
                        <!-- Sign-in -->

                        <!-- create a new account -->
                        <div class="col-md-5 col-sm-5 new-account">
                            <h5>Already Registered? <a href="<?php echo base_url(); ?>users/login" >SIGN IN</a></h5>
                            <h4 class="hidden-xs"><br></h4>
                            <h5 class="checkout-subtitle text-center">Or </h5>
                            <h5 class="checkout-subtitle text-center">Sign Up With</h5>
                            <div class="sign-in text-center">
                            <div class="social-sign-in outer-top-xs">
                                <a href="#" class="facebook-sign-in" style="margin-bottom: 10px; padding: 11px 30px;"><i class="fa fa-facebook"></i> Sign Up with Facebook</a>
                                <a href="#" class="google-sign-in" style=" padding: 11px 30px;"><i class="fa fa-google-plus" ></i> Sign Up with Google</a>
                            </div>
                            </div>
                            <ul>
                                <li>Speed your way through checkout</li>
                                <li>Track your orders easily</li>
                                <li>Keep a record of all your purchases</li>
                            </ul>
                            <br>
                            <div class="text-center col-md-12 col-sm-4 col-xs-12">
                                <div class="logo">
                                    <a href="index.php" ><img src="assets/image/logo1.jpg" width="205" alt=""></a>
                                </div>
                            </div>
                        </div>	
                        <!-- create a new account -->
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Enter OTP Here :</h4>
                    </div>
                    <div class="modal-body">
						<span class="msgotp"></span>
						<Form id="otpverifyFORM">
                        <div class="form-group">
                                    <label class="info-title" for="exampleInputPassword1">OTP <span>*</span></label>
                                    <input type="text" name="OTP" class="form-control unicase-form-control text-input" required style="border-radius: 0" id="otp">
                                </div>
								<input type="hidden" name="HEmail" value="" id="hemail">
                       <button type="button" id="clickOTP" class="btn-upper btn btn-primary">Submit</button>
						
						</form>
						
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	$(document).ready(function(){ 
		var baseurl ='<?php echo base_url();?>';	
		$("#InputEmail1").focusout(function(e){   
			var email = jQuery("#InputEmail1").val();
			jQuery.ajax({
				url: baseurl+"users/check_email",
				data: {email: email},
				type:"post",
				async: false,
				success:function(msg){ 
					if(msg>0){ 
						jQuery(".email").html("");
						return true;
					}else{
						jQuery(".email").html("Email id already exist, Please try another!").css("color","red");
						return false;
					}
				}
			});
		});
	
		$("form#sign-in-page").submit(function(event) { 
			event.preventDefault();
			var fname = $("#InputFullname").val();
			var phone = $("#phone").val();
			var email = $("#InputEmail1").val();
			var pass = $("#InputPassword1").val();
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
					}else{
						jQuery.ajax({ 
							url: baseurl+"users/check_email",
							data: {email: email},
							type:"post",
							async: false,
							success:function(msg){ 
								if(msg>0){ 
									jQuery(".email").html("");
									flag[i] = true;
									i++;
									
								}else{
									jQuery(".email").html("Email id already exist, Please try another!").css("color","red");
									flag[i] = false;
									i++;
								}
							}
						});
						
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
							url: "<?php echo base_url(); ?>users/register",
							data: "fname=" + fname + "&phone=" + phone + "&email=" + email + "&pass=" + pass,
							success: function(result){  
								$('#myModal').modal('show');
								$('#clickOTP').click(function(){ 
								 
									var hemail = $("#hemail").val();
									var otp = $("#otp").val();
									$.ajax({
										type: "POST",
										url: "<?php echo base_url(); ?>users/otpverify",
										data: "HEmail=" + hemail + "&OTP=" + otp ,
										success: function(result){ 
											if(result != 0){
												var otpmsgS = 'Successfully veryfied';
												$('#otpverifyFORM').html('');
												$('.msgotp').html(otpmsgS).css('color','green');
												window.location.href = '<?php echo base_url(); ?>users/login'; 
											}else{
												var otpmsgE = 'Sorry try agin';
												$('.msgotp').html(otpmsgE).css('color','red');
											}
										}
									});
								
								});
							}
							
						});	
					}
		});
	});
	 
    
</script>