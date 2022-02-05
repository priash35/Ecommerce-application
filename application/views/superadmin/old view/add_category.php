<?php
$Id = $this->uri->segment('3');
$getId = $Id!="" ? $Id : '0';

$category_name  = '';
$category_type  = '';
$isActive  = '';
$actionMsg = "Add";
$btnMsg = "Save";

if(isset($category_info) && !empty($category_info)) {
   $actionMsg = "Update";
   $btnMsg = "Update";
   $category_name = $category_info->category_name!="" ? $category_info->category_name : '';
   $category_type = $category_info->category_type_fk_id!="" ? $category_info->category_type_fk_id : '';
   $isActive = $category_info->category_status!="" ? $category_info->category_status : '';
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Category Add And List</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Category</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-5">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Category</h3>
                    </div>
                    <form role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" id="category_name" name="category_name" value="<?php echo $category_name ?>" class="form-control validate[required,maxSize[50]]" placeholder="Category Name">
								<input type="hidden" name="id" id="id" value="<?php echo $getId; ?>">
								<input type="hidden" name="action" id="action" value="<?php echo $actionMsg; ?>">
                            </div>
							<div class="form-group">
								<label>Status</label> <br/>
								<input type="radio" name="is_active" value="1" id="active" checked="checked" <?php if($isActive =="1") {?> checked <?php } ?>>
								<label class="labelclass" for="active" >Active</label>  
								&nbsp;&nbsp;<input type="radio" id="deactive" name="is_active" value="2" <?php if($isActive =="2") {?> checked <?php } ?>>
								<label class="labelclass" for="deactive" >Inactive</label>
							</div><!-- /.form-group -->
							<label class="checkbox-inline">
							
							  <input type="checkbox"  name="category_type" id="category_type" >As per Size, Price will Change
							</label>
                        </div>
                        <!-- /.box-body -->
							
                        <div class="box-footer">
							<input type="submit" class="btn btn-primary" value="<?php echo $btnMsg; ?>">
                           
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <div class="col-md-7">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Category list </h3>
                        
                        <div class="row" style="margin-top: 10px">
                            <div class="col-sm-6">
                                <div class="dataTables_length" id="example1_length">
                                    <label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                        entries
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="example1_filter" class="dataTables_filter">
                                    <label>
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding table-striped table-bordered">
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Change Price</th>
                                    <th>Active/Deactive</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td>Women</td>
									<td class="text-center">Yes</td>
                                    <td><button type="button" class="btn btn-block btn-info">Active</button></td>
                                    <td><a class="btn btn-social-icon btn-primary"><i class="fa fa-pencil-square-o"></i></a> <a class="btn btn-social-icon btn-danger"><i class="fa fa-trash-o"></i></a> </td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>Mens</td>
                                    <td class="text-center">No</td>
                                    <td><button type="button" class="btn btn-block btn-primary">Deactive</button></td>
                                    <td><a class="btn btn-social-icon btn-primary"><i class="fa fa-pencil-square-o"></i></a> <a class="btn btn-social-icon btn-danger"><i class="fa fa-trash-o"></i></a> </td>
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td>Kids</td>
                                    <td class="text-center">Yes</td>
                                    <td><button type="button" class="btn btn-block btn-info">Active</button></td>
                                    <td><a class="btn btn-social-icon btn-primary"><i class="fa fa-pencil-square-o"></i></a> <a class="btn btn-social-icon btn-danger"><i class="fa fa-trash-o"></i></a> </td>
                                </tr>
                                <tr>
                                    <td>04</td>
                                    <td>Shoes</td>
                                    <td class="text-center">Yes</td>
                                    <td><button type="button" class="btn btn-block btn-info">Active</button></td>
                                    <td><a class="btn btn-social-icon btn-primary"><i class="fa fa-pencil-square-o"></i></a> <a class="btn btn-social-icon btn-danger"><i class="fa fa-trash-o"></i></a> </td>
                                </tr>
                            </table>

                            <div class="box-footer clearfix">
                                <ul class="pagination pagination-sm no-margin pull-right">
                                    <li><a href="#">&laquo;</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">&raquo;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h4>
	Category  
	<!--<small>Preview</small>-->
  </h4>
</section>
<div class="pull-left left15">
  <ol class="breadcrumb breadcrumb1">
	<li><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
	<li class="active">Category Management</li>
	<li class="active"> Category</li>

  </ol>
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
						<label>Category Name<span style="color:red">*</span></label>
						<input type="text" id="category_name" name="category_name" value="<?php echo $category_name ?>" class="form-control validate[required,maxSize[50]]" placeholder="Category Name">
						<input type="hidden" name="id" id="id" value="<?php echo $getId; ?>">
						<input type="hidden" name="action" id="action" value="<?php echo $actionMsg; ?>">
					</div><!-- /.form-group -->
                    <div class="form-group">
						<label>Category Type<span style="color:red">*</span></label>
						<select class="form-control validate[required]" name="category_type" id="category_type" >
							<option value="">--Select Category Type--</option>
							<?php
							if(count($category_types)>0){
								foreach($category_types as $result){ 
									if($result['category_type_pk_id']== $category_type){
										$selected = 'selected';
									}else{
										$selected = '';
									}
									?>
									<option value="<?php echo $result['category_type_pk_id']; ?>" <?php echo $selected;?>><?php echo ucfirst($result['category_type']); ?></option>
									<?php
								}
							} ?>
						</select>
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
						<a href="<?php echo base_url(); ?>category/category_list" class="btn btn-danger">Cancel</a>
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
					<th>Category Type <i class="fa fa-sort pull-right sortstyle" aria-hidden="true"></i></th>
					<th class="no-sort">Status</th>
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
					<td><?php echo ucwords($result['category_name']); ?></td>
					<td><?php echo ucwords($result['category_type']); ?></td>
					<td>
						<a href="javascript:void(0)" class="text-center" onclick="status_change(<?php echo $result['category_pk_id']; ?>,<?php echo $result['category_status'] ;?>)" title="<?php echo $result['status'];?>">
							<?php
								if($result['category_status'] == '1'){ ?>
									<img src="<?php echo base_url() ?>assets/images/greenstatus.png" width="20px;" height="20px"><?php
								}else { ?>
									<img src="<?php echo base_url() ?>assets/images/redstatus.png" width="20px;" height="20px">
								<?php }  ?>
						</a>
					</td>
					<td><a title="Edit" href="<?php echo base_url(); ?>category/edit_category/<?php echo $result['category_pk_id']; ?>"><img src="<?php echo base_url() ?>assets/images/pencil.png" border="0px"></a>|&nbsp;&nbsp;
					<a title="Add Subcategory" href="<?php echo base_url(); ?>category/sub_category_list/<?php echo $result['category_pk_id']; ?>"><img src="<?php echo base_url() ?>assets/images/plus.png" border="0px"></a>&nbsp;&nbsp;|&nbsp;&nbsp;
					<a title="Delete" href="javascript:void(0)" onclick="delcategory(<?php echo $result['category_pk_id']; ?>)"><img width="23px;" height="20px;" src="<?php echo base_url(); ?>assets/images/delete.png" broder="0px"></a></td>
					
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
function delcategory(id) {
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
            url: url+'ajax/delete_category',
            success: function(data) { 
	            if(data >0)
	            {
				    swal("Deleted!", "Category has been deleted.", "success");
		            window.location.href = url+"category/category_list/delete_success";
	            } else {
	               swal("Oops...", "Error in delete category!", "error");
				   window.location.href = url+"category/category_list";
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