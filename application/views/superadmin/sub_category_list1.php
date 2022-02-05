<?php
$Id = $this->uri->segment('3');
$getId = $Id!="" ? $Id : '0';

$sub_category_name  = '';
$cat_id = $cat_id;
$actionMsg = "Add";
$btnMsg = "Save";

if(isset($category_info) && !empty($category_info)) {
   $actionMsg = "Update";
   $btnMsg = "Update";
   $sub_category_name = $category_info->sc_category_name!="" ? $category_info->sc_category_name : '';
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h4>
	Sub Category  
	<!--<small>Preview</small>-->
  </h4>
</section>
<div class="pull-left left15">
  <ol class="breadcrumb breadcrumb1">
	<li><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
	<li class="active">Category Management</li>
	<li class="active"> Sub Category</li>
  </ol>
</div>
<div class=" pull-right" style="margin-top:-25px;margin-right:20px">
	<a href="<?php echo base_url(); ?>category/category_list"><button class="btn btn-primary" style="cursor:pointer;">Back</button></a>
</div>
<!-- Main content -->
<section class="content content2">
  <!-- SELECT2 EXAMPLE -->
  <div class="box box1 box-default">
	<!-- /.box-header -->
	<div class="box-body">
		<form method="post" id="categoryvalidator" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Sub Category Name<span style="color:red">*</span></label>
						<input type="text" id="sub_category_name" name="sub_category_name" value="<?php echo $sub_category_name ?>" class="form-control validate[required,maxSize[50]]" placeholder="Category Name">
						<input type="hidden" name="id" id="id" value="<?php echo $getId; ?>">
						<input type="hidden" name="action" id="action" value="<?php echo $actionMsg; ?>">
						<input type="hidden" name="cat_id" id="cat_id" value="<?php echo $cat_id; ?>">
					</div><!-- /.form-group -->
				</div>
				<div class="col-md-6">
					
				</div><!-- /.form-group -->
				<div class = "col-md-12 nopadding">
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="<?php echo $btnMsg; ?>">
						<a href="<?php echo base_url(); ?>category/sub_category_list/<?php echo $cat_id; ?>" class="btn btn-danger">Cancel</a>
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
					<th class="no-sort">Action</th>
				  </tr>
				</thead>
				<tbody>
				<?php
				$cnt = 1;
				if(count($category_data) > 0) {
				foreach($category_data as $result) { ?>
				  <tr>
					<td><?php echo $cnt; ?></td>
					<td><?php echo ucwords($result['sc_category_name']); ?></td>
					<td><a title="Edit" href="<?php echo base_url(); ?>category/edit_sub_category/<?php echo $result['sc_pk_id']; ?>/<?php echo $result['sc_category_fk_id']; ?>"><img src="<?php echo base_url() ?>assets/images/pencil.png" border="0px"></a>|&nbsp;&nbsp;
					<a title="Delete" href="javascript:void(0)" onclick="delsubcategory(<?php echo $result['sc_pk_id']; ?>,<?php echo $result['sc_category_fk_id']; ?>)"><img width="23px;" height="20px;" src="<?php echo base_url(); ?>assets/images/delete.png" broder="0px"></a></td>
					
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
function delsubcategory(id,cat_id) {
	swal({
			  title: "Are you sure you want to delete category?",
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
            url: url+'ajax/delete_sub_category',
            success: function(data) { 
	            if(data >0)
	            {
				    swal("Deleted!", "Category has been deleted.", "success");
		            window.location.href = url+"category/sub_category_list/"+cat_id+"/delete_success";
	            } else {
	               swal("Oops...", "Error in delete category!", "error");
				   window.location.href = url+"category/sub_category_list/"+cat_id;
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
			url: url+"ajax/category_status_change",
			type: "post",
			data:{id:id,status:status},
			success:function(msg){ 
				 window.location.href = url+"category/category_list/update_status";
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