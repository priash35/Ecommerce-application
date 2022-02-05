<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gravity Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">
	 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/validate_css.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<!-- jQuery 3.1.1 -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script>
	var url = '<?php echo base_url(); ?>';
</script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Gravity</b>Admin</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Log in to start your session</p>

   <form role="form" method="post" action="" name="adminLogin" id="adminLogin">
   <span name="err_invalid" id="err_invalid"></span>
      <div class="form-group has-feedback">
        <input type="email" name="email"  class="form-control validate[required,custom[email]]" id="email" placeholder="Email">
       
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control validate[required,ajax[ajaxlogin]]" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		<input type="hidden" name="domain_val" id="domain_val" value="">
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit"  id="AdminLoginBtn" value="login" name="login" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery_validate_js.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery_validate_eng.js"></script>
<script src="<?php echo base_url(); ?>assets/js/function.js"></script>
<script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
		$("#navItem1").on('click', function(){
    $('#forgotpsw').fadeIn(1000);
    $('#login').hide();
	$("#forgotpsw :input:not(:submit)").css({"border-color": "#d2d6de","border-radius": "0"});
	$("#forgotpsw .formErrorContent, .formErrorArrow").hide();
  });
  $("#navItem2").on('click', function(){
    $('#login').fadeIn(1000);
    $('#forgotpsw').hide();
	$("#login :input:not(:submit)").css({"border-color": "#d2d6de","border-radius": "0"});
	$("#login .formErrorContent, .formErrorArrow").hide();
  });
  $("#navItem3").on('click', function(){
	$("#adminRegister :input:not(:submit)").css({"border-color": "#d2d6de","border-radius": "0"});
	$(".formErrorContent, .formErrorArrow").hide();
    $('.register-box-body').fadeIn(1000);
    $('.login-box-body').hide();
  });
  $("#navItem4").on('click', function(){
	$("#adminLogin :input:not(:submit)").css({"border-color": "#d2d6de","border-radius": "0"});
	$(".formErrorContent, .formErrorArrow").hide();
    $('.login-box-body').fadeIn(1000);
    $('.register-box-body').hide();
  });
  $('#adminLogin').submit(function(e){
    $("#adminLogin .formErrorContent, .formErrorArrow").show();
  });
  $('#adminForgotpass').submit(function(e){
    $("#adminForgotpass .formErrorContent, .formErrorArrow").show();
  });
      function fadeInFirstContent(){
    $('.login-box-body').fadeIn(1000);}
  fadeInFirstContent();
    </script>
</body>
</html>
