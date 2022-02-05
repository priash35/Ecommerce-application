<?php
$Id = $this->uri->segment('3');
$getId = $Id!="" ? $Id : '0';

$first_name  = '';
$last_name  = '';
$email = '';
$contact = '';
$address = '';
$user_type='';
$isActive = '';
$user_profile='';
$actionMsg = "Add";
$btnMsg = "Save";
if(isset($getuser) && !empty($getuser)) { 
   $actionMsg = "Update";
   $btnMsg = "Update";
   $first_name = $getuser->user_first_name!="" ? $getuser->user_first_name : '';
   $last_name = $getuser->user_last_name!="" ? $getuser->user_last_name : '';
   $email = $getuser->user_email!="" ? $getuser->user_email : '';
   $contact = $getuser->user_contact!="" ? $getuser->user_contact : '';
   $address = $getuser->user_address!="" ? $getuser->user_address : '';
   $user_profile=$getuser->profile_image!="" ? $getuser->profile_image : '';
   $user_type=$getuser->user_type!="" ? $getuser->user_type : '';
   $isActive = $getuser->user_status!="" ? $getuser->user_status : '';
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h4>
		<?php echo $actionMsg; ?> User 
		<!--<small>Preview</small>-->
	  </h4>
	</section>
	<div class="pull-left left15">
	    <ol class="breadcrumb breadcrumb1">
			<li><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
			<li class="active">User Management</li>
			<li class="active"><?php echo $actionMsg; ?> User</li>
	    </ol>
	</div>

	<!-- Main content -->
	<section class="content content2">

	  <!-- SELECT2 EXAMPLE -->
			<div class="box box1 box-default">
			<?php
				$status = '';
				if(isset($insuser) && $insuser!="" && $insuser > 0) {
					$status = "added";
				} else if(isset($isUpduser) && $isUpduser>0) {
					$status = "updated";
				}
			?>
			<?php if($status!="") { ?>
			<div class="box-header with-border">
				<h3 class="box-title">
					<span style="color:green">User has been <?php echo $status; ?> successfully</span>
				</h3>
			</div>
			<?php } ?>
			<!-- /.box-header -->
			<div class="box-body">
				<form method="post" id="uservalidator" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>First Name<span style="color:red">*</span></label>
								<input type="text" id="first_name" name="first_name" value="<?php echo $first_name ?>" class="form-control validate[required,maxSize[50],custom[onlyLetter]]" placeholder="First Name">
								<input type="hidden" name="id" id="id" value="<?php echo $getId; ?>">
								<input type="hidden" name="action" id="action" value="<?php echo $actionMsg; ?>">
							</div><!-- /.form-group -->
							
							<div class="form-group">
								<label>Last Name<span style="color:red">*</span></label>
								<input type="text" id="last_name" name="last_name" value="<?php echo $last_name ?>" class="form-control validate[required,maxSize[50],custom[onlyLetter]]" placeholder="Last Name">
								
							</div><!-- /.form-group -->
							<div class="form-group">
								<label>Email ID<span style="color:red">*</span></label>
								<input type="text" id="email" name="email" value="<?php echo $email ?>" class="form-control validate[required,custom[email],ajax[ajaxcheckemailexist]]" placeholder="Email ID">
							</div><!-- /.form-group -->
							
							<?php if(isset($actionMsg) && $actionMsg=="Add"){ ?>
								<div class="form-group">
									<label>Password<span style="color:red">*</span></label>
									<input type="password" id="password" name="password" value="" class="form-control validate[required,minSize[6],maxSize[15]]" placeholder="Password">
								</div><!-- /.form-group -->
							
								<div class="form-group">
									<label>Confirm Password<span style="color:red">*</span></label>
									<input type="password" id="cpassword" name="cpassword" value="" class="form-control validate[required,minSize[6],maxSize[15],funcCall[confirmpassword]]" placeholder="Confirm Password">
								</div><!-- /.form-group -->
							<?php } ?>
							<div class="form-group">
								<label>Contact Number<span style="color:red">*</span></label>
								<input type="text" id="contact" name="contact" value="<?php echo $contact ?>" class="form-control validate[required,custom[phone],minSize[10],maxSize[10],ajax[ajaxcheckusercontactexist]]" placeholder="Contact">
							</div><!-- /.form-group -->
							  
							<div class="form-group">
								<label>Address<span style="color:red">*</span></label>
								<textarea type="text" id="address" name="address" class="form-control validate[required]" placeholder="Address"><?php echo $address ?></textarea>
							</div><!-- /.form-group -->
							
							<div class="form-group">
								<label>Status</label> <br/>
								<input type="radio" name="is_active" value="1" id="active" checked="checked" <?php if($isActive =="1") {?> checked <?php } ?>>
								<label class="labelclass" for="active" >Active</label>  
								&nbsp;&nbsp;<input type="radio" id="deactive" name="is_active" value="2" <?php if($isActive =="2") {?> checked <?php } ?>>
								<label class="labelclass" for="deactive" >Inactive</label>
							</div><!-- /.form-group -->
							<div class="form-group" id="user_type">
								<label>Select User Type</label> <br/>
								<input type="radio" name="user_type" value="1" id="party_admin" checked="checked" <?php if($user_type =="1") {?> checked <?php } ?>>
								<label class="labelclass" for="party_admin" >Admin</label>  
								&nbsp;&nbsp;<input type="radio" id="venue_admin" name="user_type" value="2" <?php if($user_type =="2") {?> checked <?php } ?>>
								<label class="labelclass" for="venue_admin" >User</label>
							</div><!-- /.form-group -->
							<div class="form-group">
								<label for="exampleInputEmail1">User Profile Image</label>
								<input type="file" name="user_photo" id="user_photo" class="validate[optional,custom[validateMIME[image/gif|image/bmp|image/jpg|image/jpeg|image/png]]]">
								<?php if($user_profile!="") { ?>
									<img id ='user_photo_old' style="margin-top:10px;" src="<?php echo base_url(); ?>assets/images/user_profile/thumb/<?php echo $user_profile; ?>" width="137px" height="112px">
									<input type="hidden" name="user_photo_old" value="<?php echo $user_profile; ?>">
								<?php }else{ ?>
									<img id ='user_photo_old' style="margin-top:10px;" src="<?php echo base_url(); ?>assets/images/profile.jpg" width="137px" height="112px">
								<?php } ?>
								<img id="appended_logo" src="javascript:void(0);" style="margin-top:10px;display:none;" width="137px" height="112px"/>
							</div>   
						</div>
						<div class = "col-md-12 nopadding">
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="<?php echo $btnMsg; ?>">
								<a href="<?php echo base_url(); ?>User/user_list" class="btn btn-danger">Cancel</a>
							</div>
						</div>
					</div><!-- /.box-body -->
				</form>
			</div><!-- /.box -->
		</div>
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#appended_logo').show();
			$('#user_photo_old').hide();
			$('#appended_logo').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

$("#user_photo").change(function(){
    readURL(this);
});
$("#user_type input[name='user_type']").click(function(){
    if($('input:radio[name=user_type]:checked').val() == "2"){
		$("#select_venue").show();
    }else if($('input:radio[name=user_type]:checked').val() == "1"){
		$("#select_venue").hide();
	}else{
		$("#select_venue").hide();
	}
});
<?php if($actionMsg=='Update'){
		if($venue_id !="" && $venue_id>0) { ?>
			$("#select_venue").show();
<?php } 
 } ?>
</script>