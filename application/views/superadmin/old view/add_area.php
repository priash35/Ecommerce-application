<?php
$Id = $this->uri->segment('3');
$getId = $Id!="" ? $Id : '0';

$area_name  = '';
$pincode  = '';
$isActive  = '';
$actionMsg = "Add";
$btnMsg = "Save";

if(isset($area_info) && !empty($area_info)) {
   $actionMsg = "Update";
   $btnMsg = "Update";
   $area_name = $area_info->area_name!="" ? $area_info->area_name : '';
   $pincode = $area_info->area_pin!="" ? $area_info->area_pin : '';
   $isActive = $area_info->area_status!="" ? $area_info->area_status : '';
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h4>
	Area  
	<!--<small>Preview</small>-->
  </h4>
</section>
<div class="pull-left left15">
  <ol class="breadcrumb breadcrumb1">
	<li><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
	<li class="active">Area Management</li>
	<li class="active"> Area</li>

  </ol>
</div>

<!-- Main content -->
<section class="content content2">
  <!-- SELECT2 EXAMPLE -->
  <div class="box box1 box-default">
	<!-- /.box-header -->
	<div class="box-body">
		<form method="post" id="areavalidator" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Area Name<span style="color:red">*</span></label>
						<input type="text" id="area_name" name="area_name" value="<?php echo $area_name ?>" class="form-control validate[required,maxSize[50],ajax[check_area_exist]]" placeholder="Area Name">
						<input type="hidden" name="id" id="id" value="<?php echo $getId; ?>">
						<input type="hidden" name="action" id="action" value="<?php echo $actionMsg; ?>">
					</div><!-- /.form-group --> 
					<div class="form-group">
						<label>Pincode<span style="color:red">*</span></label>
						<input type="text" id="pincode" name="pincode" value="<?php echo $pincode; ?>"
						class="form-control validate[required,minSize[6],maxSize[6]]" placeholder="Pincode">
					</div>
					<div class="form-group">
						<label>Status</label> <br/>
						<input type="radio" name="is_active" value="1" id="active" checked="checked" <?php if($isActive =="1") {?> checked <?php } ?>>
						<label class="labelclass" for="active" >Active</label>  
						&nbsp;&nbsp;<input type="radio" id="deactive" name="is_active" value="2" <?php if($isActive =="2") {?> checked <?php } ?>>
						<label class="labelclass" for="deactive" >Inactive</label>
					</div><!-- /.form-group -->
				</div>
				<div class="col-md-6">
					
				</div><!-- /.form-group -->
				<div class = "col-md-12 nopadding">
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="<?php echo $btnMsg; ?>">
						<a href="<?php echo base_url(); ?>area/area_list" class="btn btn-danger">Cancel</a>
					</div>
				</div>
			</div><!-- /.box-body -->
	    </form>
  	</div><!-- /.box -->
</div>
</section><!-- /.content -->
<section class="content content1">
  <div class="row">
	<div class="col-xs-12">
		<div>
	        <?php if($this->session->flashdata('user_add')){ ?>
	            <div class="alert alertstyle box-header with-border alert_message">
	            <h3 class="box-title">
	                <span style="color:green"><?php echo $this->session->flashdata('user_add'); ?></span>
	            </h3>
	            </div>
	        <?php } else if($this->session->flashdata('user_edit')) { ?>
	            <div class="alert alertstyle box-header with-border alert_message">
	            <h3 class="box-title">
	                <span style="color:green"><?php echo $this->session->flashdata('user_edit'); ?></span>
	            </h3>
	            </div>       
	        <?php } else if($isSuccess=="delete_success") { ?>
	            <div class="alert alertstyle box-header with-border alert_message">
	            <h3 class="box-title">
	                <span style="color:green">User has been deleted successfully</span>
	            </h3>
	            </div>
	        <?php } else if($isSuccess=="update_status") { ?>
			  	<div class="alert alertstyle box-header with-border alert_message">
	            <h3 class="box-title">
	                <span style="color:green">User status has been updated successfully</span>
	            </h3>
	            </div>        
	        <?php } ?>			
		</div>
	    <div class="box box1">
			<div class="box-body  table-responsivemobile">
			  <table id="example1" class="table table-bordered table-striped">
				<thead>
				  <tr>
					<th>Sr. No. <i class="fa fa-sort pull-right sortstyle" aria-hidden="true"></i></th>
					<th>Name <i class="fa fa-sort pull-right sortstyle" aria-hidden="true"></i></th>
					<th>Pincode <i class="fa fa-sort pull-right sortstyle" aria-hidden="true"></i></th>
					<th class="no-sort">Status</th>
					<th class="no-sort">Action</th>
				  </tr>
				</thead>
				<tbody>
				<?php
				$cnt = 1;
				if(count($area_data) > 0) {
				foreach($area_data as $result) { ?>
				  <tr>
					<td><?php echo $cnt; ?></td>
					<td><?php echo $result['area_name']; ?></td>
					<td><?php echo $result['area_pin']; ?></td>
					<td>
						<a href="javascript:void(0)" class="text-center" onclick="status_change(<?php echo $result['area_pk_id']; ?>,<?php echo $result['area_status'] ;?>)" title="<?php echo $result['status'];?>">
							<?php
								if($result['area_status'] == '1'){ ?>
									<img src="<?php echo base_url() ?>assets/images/greenstatus.png" width="20px;" height="20px"><?php
								}else { ?>
									<img src="<?php echo base_url() ?>assets/images/redstatus.png" width="20px;" height="20px">
								<?php }  ?>
						</a>
					</td>
					<td><a title="Edit" href="<?php echo base_url(); ?>area/edit_area/<?php echo $result['area_pk_id']; ?>"><img src="<?php echo base_url() ?>assets/images/pencil.png" border="0px"></a>|&nbsp;&nbsp;
					<a title="Delete" href="javascript:void(0)" onclick="delArea(<?php echo $result['area_pk_id']; ?>)"><img width="23px;" height="20px;" src="<?php echo base_url(); ?>assets/images/delete.png" broder="0px"></a></td>
					
				  </tr>
				<?php $cnt++; } } else { ?>
				
				<?php } ?>
				</tbody>
			  </table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
function delvenuealert(){
	swal("Can't delete! You can't delete yourself.")
}
function delArea(id) {
	swal({
			  title: "Are you sure you want to delete area?",
			  text: "You will not be able to recover this record!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, delete it!",
			  closeOnConfirm: false
			},
		 
	function(){
		 $.ajax({
            type: "POST",
            data: {id:id},
            url: url+'ajax/delete_area',
            success: function(data) { 
	            if(data >0)
	            {
				    swal("Deleted!", "Area has been deleted.", "success");
		            window.location.href = url+"area/area_list/delete_success";
	            } else {
	               swal("Oops...", "Error in delete area!", "error");
				   window.location.href = url+"area/area_list";
                }
            }
        });
		
	});
}

function status_change(id,status){
	 if(status == 1) {
		var stc = 'Inactive';
	} else {
		var stc = 'Active';
	}
	swal({
	  title: "Are you sure to do user "+stc+"?",
	  //text: "You will not be able to recover this record!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Yes,Change Status!",
	  closeOnConfirm: false
	},
	function(){	 
		jQuery.ajax({
			url: url+"ajax/area_status_change",
			type: "post",
			data:{id:id,status:status},
			success:function(msg){ 
				 window.location.href = url+"area/area_list/update_status";
			}
		});
	});
    return false;
 }
$(document).ready(function () {
	$('#example1').dataTable( {
		"order": [],
		"columnDefs": [ {
		  "targets"  : 'no-sort',
		  "orderable": false,
		}]
	});
});
</script>