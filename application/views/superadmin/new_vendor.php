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
  $bus_name = '';
   $reg_no = '';
   $ven_subcription =  '';
    
if(isset($getuser) && !empty($getuser)){ 
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
if(isset($VENDER_info) && !empty($VENDER_info)){ 
   $bus_name = $VENDER_info->bus_name!="" ? $VENDER_info->bus_name : '';
   $reg_no = $VENDER_info->reg_no!="" ? $VENDER_info->reg_no : '';
   $ven_subcription = $VENDER_info->ven_subcription!="" ? $VENDER_info->ven_subcription : ''; 
}
?>

            <div class="content-wrapper" style="min-height: 946px;">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        New Vendor
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Vendor Management</a></li>
                        <li class="active">New Vendor</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Vendor Details</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" method="post" id="uservalidator" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="row">

                                          <!--  <div class="col-md-12">
                                               
                                                 <div class="col-sm-4">
													<div class="form-group">
													 <label>Vendor create Date:</label>
														<div class='input-group date' id='datetimepicker1'>
															<input type='text' class="form-control" placeholder="DD-MM-YYYY"/>
															<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
													</div>
												</div>
                                            </div>-->
                                            
                                            <div class="col-md-12">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Business Name">Business Name</label>
                                                        <input type="text" class="form-control" id="bus_name" value="<?php echo $bus_name ?>"  name="bus_name" placeholder="Business Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- /.form group -->
                                                    <div class="form-group">
                                                        <label for="user_first_name">Vendor Full Name</label>
														<input type="text" id="first_name" name="first_name" value="<?php echo $first_name ?>" class="form-control validate[required,maxSize[50],custom[onlyLetter]]" placeholder="Vendor Full Name">
														<input type="hidden" name="id" id="id" value="<?php echo $getId; ?>">
														<input type="hidden" name="action" id="action" value="<?php echo $actionMsg; ?>">
                                                        
                                                    </div>
                                                </div>
                                               <!-- <div class="col-md-6">
                                                    <!-- /.form group -->
                                                  <!--  <div class="form-group">
                                                        <label for="exampleInputEmail1">Vendor Code</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Vendor Code">
                                                    </div> 
                                                </div>-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="user_contact">Contact No.</label>
                                                        
														<input type="text" id="contact" name="contact" value="<?php echo $contact ?>" class="form-control validate[required,custom[phone],minSize[10],maxSize[10],ajax[ajaxcheckusercontactexist]]" placeholder="Contact">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="user_email">Email address</label>
														<input type="text" id="email" name="email" value="<?php echo $email ?>" class="form-control validate[required,custom[email],ajax[ajaxcheckemailexist]]" placeholder="Email ID">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="reg_no">Register Number</label>
                                                        <input type="text" class="form-control" id="reg_no" name="reg_no"  value="<?php echo $reg_no ?>"  placeholder="Register Number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="user_address">Vendor Address</label>
                                                       <textarea type="text" id="address" name="address" class="form-control validate[required]" placeholder="Address"><?php echo $address ?></textarea>
												   </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Subscription </label>
                                                        <select class="form-control" name="ven_subcription">
															<?php foreach($subc_data as $sd){  ?>	
														  <option value="<?=$sd['subc__id']?>" <?php if( $ven_subcription == $sd['subc__id'] ){ echo 'Selected';} ?>><?=$sd['subc__title']?></option>
															<?php } ?>	 														  
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="profile_image">Image Upload</label>
                                                         
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
                                                <div class="col-md-12">
                                                    <div class="box-footer">
                                                       
														<input type="submit" class="btn btn-primary" value="<?php echo $btnMsg; ?>">
                                                    </div> 
                                                </div>
                                            </div>
                                        </div> 
                                    </div>

                            </div>
                            <!-- /.box-body -->


                            </form>
                        </div>
                        <!-- /.box -->
                    </div>
                </section>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->

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