
<div style="background-color: #eaeaea;">
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>/
                    <li class="active">Sign In</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>

    <div id="login">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <form id = "SubLOg" class="sign-in-page">
                    <div class="row">
                        <!-- Sign-in -->			
                        <div class="col-md-7 col-sm-7 sign-in">
                            <h4 class="">Sign in</h4>
                            <p class="">Hello, Welcome to your account.</p>
                            <div class="social-sign-in outer-top-xs">
                                <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                                <a href="#" class="google-sign-in"><i class="fa fa-google-plus"></i> Sign In with Google</a>
                            </div>
                            <p class="text-center">--------------- OR ---------------</p>
                            <div class="register-form outer-top-xs" >
								<span id="redErr"></span>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                    <input type="email" class="form-control unicase-form-control text-input" required id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                    <input type="password" class="form-control unicase-form-control text-input" required id="Password1">
                                </div>
                                <div class="radio outer-xs">
                                    <!--<label>
                                        <input type="radio" name="optionsRadios" style="margin: 0px 10px 0px 0px;" id="optionsRadios2" value="option2">Remember me!
                                    </label>-->
                                    <a href="" data-toggle="modal" data-target="#fpassword" class="forgot-password pull-right">Forgot your Password?</a>
                                </div>
                                <button type="submit" class="btn-upper btn btn-primary " >Sign in</button>
                            </div>					
                        </div>
                        <!-- Sign-in -->

                        <!-- create a new account -->
                        <div class="col-md-5 col-sm-5 new-account">
                            <h5>Not Registered? <a href="<?php echo base_url(); ?>users/register" >SIGN UP</a></h5>
                            <h4 class="hidden-xs"><br></h4>
                            <h5 class="checkout-subtitle">Sign up today and you will be able to :</h5>
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
					<span id="msgotp"></span>
					<form id="clickOTP">
					
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Enter OTP Here :</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                                    <label class="info-title" for="exampleInputPassword13">OTP <span>*</span></label>
                                    <input type="text" class="form-control unicase-form-control text-input" style="border-radius: 0" id="otp">
                                </div>
                        <a href="index.php"> <button type="Submit" class="btn-upper btn btn-primary">Submit</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="fpassword" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">FORGOT PASSWORD?</h4>
      </div>
      <div class="modal-body">
        <p>Enter your email address and we will send you a link to reset your password.</p>
                                    <label class="info-title col-md-12" for="exampleInputPassword12">OTP <span>*</span></label>
                                   <div class="col-md-8"> 
                                    <input type="text" class="form-control unicase-form-control text-input" style="border-radius: 0" id="exampleInputPassword2" placeholder="Enter OTP"></div><br>
                                    
                        <a href="index.php" > <input type="button" class="btn-upper btn btn-primary">Submit</button></a>
      </div>
      
    </div>

  </div>
</div>
<script>
	$(document).ready(function(){ 
		$("form#SubLOg").submit(function(e) {  
		
		e.preventDefault();
		var flag = Array();
	var i = 0;
	var email = $("#exampleInputEmail1").val();
	var password = $("#Password1").val();
	
	if(password=='' || email==''){ 
		jQuery("#redErr").html('Invalid Email or Password').css('color','red');	
		flag[i] = false;
		i++;
	}else{ 
		jQuery.ajax({
			type: "POST",
			data: {email:email,password:password},
			url: "<?php echo base_url(); ?>users/login",
			async: false, 
			success:function(msg){ 
				if(msg==1){ 
					jQuery("#redErr").html('');
					flag[i] = true;
					i++;
				}else{
					jQuery("#redErr").html('Invalid Email or Password').css('color','red');
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
		jQuery.ajax({
			type: "POST",
			data: {email:email},
			url: "<?php echo base_url(); ?>users/genOTPlogin",
			async: false,
			success:function(msg){
				if(msg==1){
					$('#myModal').modal('show');
					$('form#clickOTP').submit(function(){ 
					 
						var otp = $("#otp").val();
						
						$.ajax({
							type: "POST",
							url: "<?php echo base_url(); ?>users/lotpverify",
							data: "&OTP=" + otp ,
							success: function(result){ 
							
								if(result != 0){
									var otpmsgS = 'Successfully veryfied';
									$('#otpverifyFORM').html('');
									$('.msgotp').html(otpmsgS).css('color','green');
										$.ajax({
											type: "POST",
											url: "<?php echo base_url(); ?>users/lotpreset",
											success: function(result){ 
											
												if(result != 0){
													
													window.location.href = '<?php echo base_url();?>';
													return false;
													
												}else{
													var otpmsgE = 'Sorry try agin';
													$('.msgotp').html(otpmsgE).css('color','red');
													return false;
												}
											}
										});
									
									
								}else{
									var otpmsgE = 'Sorry try agin';
									$('.msgotp').html(otpmsgE).css('color','red');
									return false;
								}
							}
						});
						return false;
					
					});
					
				}else{
					return false;
				}
			}
		});	
		return true;
	}
		
		
		});
		
		
	$("#myModal").on("hidden.bs.modal", function () {
		window.location.href = '<?php echo base_url();?>users/log_out';
	});	
		
	});
</script>
