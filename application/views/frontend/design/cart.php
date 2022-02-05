<?php include('./header.php') ?>
<div style="background-color: #f3f3f3;">
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
                <form class="sign-in-page">
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
                            <div class="register-form outer-top-xs" role="form">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                    <input type="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1">
                                </div>
                                <div class="radio outer-xs">
                                    <label>
                                        <input type="radio" name="optionsRadios" style="margin: 0px 10px 0px 0px;" id="optionsRadios2" value="option2">Remember me!
                                    </label>
                                    <a href="#" class="forgot-password pull-right">Forgot your Password?</a>
                                </div>
                                <button type="button" class="btn-upper btn btn-primary " data-toggle="modal" data-target="#myModal">Login</button>
                            </div>					
                        </div>
                        <!-- Sign-in -->

                        <!-- create a new account -->
                        <div class="col-md-5 col-sm-5 new-account">
                            <h5>Not Registered? <a href="signup.php" >SIGN UP</a></h5>
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
                                    <a href="index.php" ><img src="assets/image/logo.png" alt=""></a>
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
                        <div class="form-group">
                                    <label class="info-title" for="exampleInputPassword1">OTP <span>*</span></label>
                                    <input type="text" class="form-control unicase-form-control text-input" style="border-radius: 0" id="exampleInputPassword1">
                                </div>
                        <a href="index.php"> <button type="button" class="btn-upper btn btn-primary">Submit</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('./footer.php') ?>

