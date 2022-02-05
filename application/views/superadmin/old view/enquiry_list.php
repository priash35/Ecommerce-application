<?php
$ses = $this->session->userdata('super_admin_logged_in');
$isSuccess = $this->uri->segment('3');
?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/function.js">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="pull-left">
	  <h4>
		Enquiry
		List  
	  </h4>
	</div>
  <div class="clearFix"></div>
</section><br /><br />
<div class="pull-left left15">
  <ol class="breadcrumb breadcrumb1">
	<li><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
	<li class="active">Corporate Product Enquiry</li>
	<li class="active">Enquiry List</li>
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
				<th>Name <i class="fa fa-sort pull-right sortstyle" aria-hidden="true"></i></th>
				<th>Email ID <i class="fa fa-sort pull-right sortstyle" aria-hidden="true"></i></th>
				<th>Contact Number <i class="fa fa-sort pull-right sortstyle" aria-hidden="true"></i></th>
				<th>Product Name <i class="fa fa-sort pull-right sortstyle" aria-hidden="true"></i></th>
				<th>Quantity <i class="fa fa-sort pull-right sortstyle" aria-hidden="true"></i></th>
				<th>Company Name <i class="fa fa-sort pull-right sortstyle" aria-hidden="true"></i></th>
				<th>Enquiry Date</th>
			  </tr>
			</thead>
			<tbody>
			<?php
			$cnt = 1;
			if(count($enquiry_data) > 0) { 
			foreach($enquiry_data as $result) { ?>
			  <tr>
				<td><?php echo $cnt; ?></td>
				<td><?php echo ucwords($result['name']); ?></td>
				<td><?php echo $result['email']; ?></td>
				<td><?php echo $result['contact_number']; ?></td>
				<td><?php echo $result['product_name']; ?></td>
				<td><?php echo $result['quantity']; ?></td>
				<td><?php echo $result['company_name']; ?></td>
				<td><?php echo date('d-m-Y',strtotime($result['added_on'])); ?></td>
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