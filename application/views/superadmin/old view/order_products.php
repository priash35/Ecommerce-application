<?php
?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/function.js">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="pull-left">
	  <h4>
		Order - Product
		List  
	  </h4>
	</div>
  <div class="clearFix"></div>
</section><br /><br />
<div class="pull-left left15">
  <ol class="breadcrumb breadcrumb1">
	<li><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
	<li class="active">Order Management</li>
  </ol>
</div>

<!-- Main content -->
<section class="content content1">
  <div class="row">
	<div class="col-xs-12">
		
	  <div class="box box1">
		<div class="box-body  table-responsivemobile">
		  <table id="example1" class="table table-bordered table-striped">
			<thead>
			  <tr>
				<th>Sr. No. <i class="fa fa-sort pull-right sortstyle" aria-hidden="true"></i></th>
				<th>Product <i class="fa fa-sort pull-right sortstyle" aria-hidden="true"></i></th>
				<th>Quantity <i class="fa fa-sort pull-right sortstyle" aria-hidden="true"></i></th>
				<th>Price <i class="fa fa-sort pull-right sortstyle" aria-hidden="true"></i></th>
				
			  </tr>
			</thead>
			<tbody>
			<?php
			$cnt = 1;
			if(count($orderData) > 0) {
			foreach($orderData as $result) { //Print_r($result);?>
			
			  <tr>
				<td><?php echo $cnt; ?></td>
				<td><?php echo ucwords($result['product_name']); ?></td>
				<td><?php echo $result['quantity']; ?></td>
				<td><?php echo $result['price']; ?></td>
				
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