<?php
$Id = $this->uri->segment('3');
$actionMsg = "Submit";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h4>
	Change Password
	<!--<small>Preview</small>-->
  </h4>
</section>
<div class="pull-left left15">
  <ol class="breadcrumb breadcrumb1">
	<li><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
	<li class="active">Change Password</li>

  </ol>
</div>

<!-- Main content -->
<section class="content content2">
<?php if($this->session->flashdata('msg')){ ?>
    <div class="alert alertstyle box-header with-border alert_message">
        <h3 class="box-title">
	        <span style="color:green"><?php echo $this->session->flashdata('msg'); ?></span>
        </h3>
    </div>
<?php } ?>
  <!-- SELECT2 EXAMPLE -->
  <div class="box box1 box-default">
	
	<!-- /.box-header -->
	<div class="box-body">
		<form method="post" id="changepassvalidator" enctype="multipart/form-data">
		  <div class="row">
			<div class="col-md-6">

				  <div class="form-group">
					<label>Old Password<span style="color:red">*</span></label>
					<input type="password" id="old_password" name="old_password" value="" class="form-control validate[required,ajax[ajaxcheckpass]]" placeholder="Old Password"><!--form-control validate[required,custom[email],ajax[ajaxcheckpass]] -->
				  </div><!-- /.form-group -->

				  <div class="form-group">
					<label>New Password<span style="color:red">*</span></label>
					<input type="password" id="password" name="t_password" value="" class="form-control validate[required,minSize[6],maxSize[15]]" placeholder="New Password">
				  </div><!-- /.form-group -->

				  <div class="form-group">
					<label>Confirm Password<span style="color:red">*</span></label>
					<input type="password" id="cpassword" name="cpassword" value="" class="form-control validate[required,minSize[6],maxSize[15],funcCall[confirmpassword]]" placeholder="Confirm Password">
				  </div><!-- /.form-group -->

				</div>
			  	<div class = "col-md-12 nopadding">
				  <div class="form-group">
						<input type="submit" class="btn btn-primary" value="<?php echo $actionMsg; ?>">
					  	 <a href="<?php echo base_url(); ?>" class="btn btn-danger back_btn">Cancel</a>
				  </div>
			 </div>
		  </div><!-- /.box-body -->
	    </form>
  	</div><!-- /.box -->
</div>
</section><!-- /.content -->
</div><!-- /.content-wrapper -->