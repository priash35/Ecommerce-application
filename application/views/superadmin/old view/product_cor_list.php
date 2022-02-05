<?php
$isSuccess = $this->uri->segment('3');
?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/function.js">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="pull-left">
	  <h4>
		Corporate product
		List  
	  </h4>
	</div>
  <div class="active pull-right margintop15"><a href="<?php echo base_url(); ?>product/add_product"><button class="btn btn-block btn-info btn-flat">Add</button></a></div>
  <div class="clearFix"></div>
</section><br /><br />
<div class="pull-left left15">
  <ol class="breadcrumb breadcrumb1">
	<li><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
	<li class="active">Corporate product Management</li>
	<li class="active">product List</li>
  </ol>
</div>

<!-- Main content -->
<section class="content content1">
  <div class="row">
	<div class="col-xs-12">
		<div>
	        <?php if($this->session->flashdata('product_add')){ ?>
	            <div class="alert alertstyle box-header with-border alert_message">
	            <h3 class="box-title">
	                <span style="color:green"><?php echo $this->session->flashdata('product_add'); ?></span>
	            </h3>
	            </div>
	        <?php } else if($this->session->flashdata('product_edit')) { ?>
	            <div class="alert alertstyle box-header with-border alert_message">
	            <h3 class="box-title">
	                <span style="color:green"><?php echo $this->session->flashdata('product_edit'); ?></span>
	            </h3>
	            </div>       
	        <?php } else if($isSuccess=="delete_success") { ?>
	            <div class="alert alertstyle box-header with-border alert_message">
	            <h3 class="box-title">
	                <span style="color:green">product has been deleted successfully</span>
	            </h3>
	            </div>
	        <?php } else if($isSuccess=="update_status") { ?>
			  	<div class="alert alertstyle box-header with-border alert_message">
	            <h3 class="box-title">
	                <span style="color:green">product status has been updated successfully</span>
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
				<th>Product Name <i class="fa fa-sort pull-right sortstyle" aria-hidden="true"></i></th>
				<th>Category Name <i class="fa fa-sort pull-right sortstyle" aria-hidden="true"></i></th>
				<th>Area Name <i class="fa fa-sort pull-right sortstyle" aria-hidden="true"></i></th>
				<th class="no-sort">Status</th>
				<th class="no-sort">Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php
			$cnt = 1;
			if(count($product_data) > 0) {
			foreach($product_data as $result) { //print_r($result); ?>
			  <tr>
				<td><?php echo $cnt; ?></td>
				<td><?php echo ucwords($result['product_name']); ?></td>
				<td><?php echo $result['CorporateType']; ?></td>
				<td><?php echo $result['area_name']; ?></td>
				<td>
					<a href="javascript:void(0)" class="text-center" onclick="status_change(<?php echo $result['product_pk_id']; ?>,<?php echo $result['product_status'] ;?>)" title="<?php echo $result['status'];?>">
						<?php
							if($result['product_status'] == '1'){ ?>
								<img src="<?php echo base_url() ?>assets/images/greenstatus.png" width="20px;" height="20px"><?php
							}else { ?>
								<img src="<?php echo base_url() ?>assets/images/redstatus.png" width="20px;" height="20px">
							<?php }  ?>
					</a>
			    </td>
				<td><a title="Edit" href="<?php echo base_url(); ?>product/edit_cor_product/<?php echo $result['product_pk_id']; ?>"><img src="<?php echo base_url() ?>assets/images/pencil.png" border="0px"></a>|&nbsp;&nbsp;
				<a title="Delete" href="javascript:void(0)" onclick="delproduct(<?php echo $result['product_pk_id']; ?>)"><img width="23px;" height="20px;" src="<?php echo base_url(); ?>assets/images/delete.png" broder="0px"></a></td>
				
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
function delproduct(id) {
	swal({
			  title: "Are you sure you want to delete Product?",
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
            url: url+'ajax/delete_product',
            success: function(data) { 
	            if(data >0)
	            {
				    swal("Deleted!", "Product has been deleted.", "success");
		            window.location.href = url+"product/product_list/delete_success";
	            } else {
	               swal("Oops...", "Error in delete product!", "error");
				   window.location.href = url+"product/product_list";
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
	  title: "Are you sure to do product "+stc+"?",
	  //text: "You will not be able to recover this record!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Yes,Change Status!",
	  closeOnConfirm: false
	},
	function(){	 
		jQuery.ajax({
			url: url+"ajax/product_status_change",
			type: "post",
			data:{id:id,status:status},
			success:function(msg){ 
				 window.location.href = url+"product/product_list/update_status";
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