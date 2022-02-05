<?php  
$Id = $this->uri->segment('3');
$getId = $Id!="" ? $Id : '0';

$sc_category_name  = '';
$sz_category_name  = '';
 $cat_list = $category_list;
  $sc_category_fk_id = '';
$isActive  = '';
$actionMsg = "Add";
$btnMsg = "Save";

if(isset($category_info) && !empty($category_info)) { 
   $actionMsg = "Update";
   $btnMsg = "Update";
 $sc_category_name = $category_info->sz_sc_category_fk_id!="" ? $category_info->sz_sc_category_fk_id : ''; //subcategory
  
	$sql = 'Select * from sub_categories where sc_pk_id='.$sc_category_name;
	$query = $this->db->query($sql);
	if($row = $query->result()){ echo $sc_category_fk_id = $row[0]->sc_category_fk_id; } //category
	

   $sz_category_name = $category_info->sz_category_name!="" ? $category_info->sz_category_name : '';
//    $sc_category_fk_id = $category_info->sc_category_fk_id!="" ? $category_info->sc_category_fk_id : '';
   $isActive = $category_info->size_category_status!="" ? $category_info->size_category_status : '';
    $cat_list = $category_list;
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sub Sub - Category
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Category Management</a></li>
            <li class="active">Sub Category</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Sub Sub-Category</h3>
                    </div>
                    <form role="form"  method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Select Category</label>
                                <select required id="category_id" name="category_pk_id"  class="form-control">
                                     <option value="">----- Select Category-----</option>
									<?php if(count($cat_list) > 0) {
									foreach($cat_list as $resultcat) { ?>
                                   
                                    <option   value="<?=$resultcat['category_pk_id']?>" <?php if($resultcat['category_pk_id']==$sc_category_fk_id){ echo "selected"; }?> ><?=$resultcat['category_name']?></option>
									<?php } } ?>
                                </select>
                            </div>
                             <div id="sub_category">
								<?php if(isset($actionMsg) && $actionMsg=="Update"){ ?>
									<label>Select Sub Category</label>
									<select required class="form-control validate[required]" name="sub_cat" id="sub_cat" >
										<option value="" >--Select Sub Category--</option>
										<?php
										if(count($subcategory_data)>0){
											foreach($subcategory_data as $result){ 
												if($result['sc_pk_id']== $sc_category_name){
													$selected = 'selected';
												}else{
													$selected = '';
												}
												?>
												<option value="<?php echo $result['sc_pk_id']; ?>" <?php echo $selected;?>><?php echo ucfirst($result['sc_category_name']); ?></option>
												<?php
											}
										} ?>
									</select>
								<?php } ?>
						    </div>
                            <div class="form-group">
                                <label>Sub Sub-Category Name</label>
                                
								<input required type="text" id="sz_category_name" name="sz_category_name" value="<?php echo $sz_category_name ?>" class="form-control validate[required,maxSize[50]]" placeholder="Enter Sub Sub-Category">
								<input type="hidden" name="id" id="id" value="<?php echo $getId; ?>">
								<input type="hidden" name="action" id="action" value="<?php echo $actionMsg; ?>">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                           <input type="submit" class="btn btn-primary" value="<?php echo $btnMsg; ?>">
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Sub Sub-Category List</h3>

                        <div class="row" style="margin-top: 10px;">
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
                                    <th>Sub SUb-Category</th>
                                    <th>Sub Category</th>
                                   
									 <th>Category Name</th>
                                    <th>Active/Deactive</th>
                                    <th>Action</th>
                                </tr>
                                 <?php
									$cnt = 1;
									if(count($category_data) > 0) {
									foreach($category_data as $result) {  ?>
									  <tr>
										<td><?php echo $cnt; ?></td>
										<td><?php echo ucwords($result['sz_category_name']); ?></td>
										<td><?php echo ucwords($result['sc_category_name']); ?></td>
										<td><?php echo ucwords($result['category_name']); ?></td>
										<td>
											<a href="javascript:void(0)" class="text-center" onclick="status_change(<?php echo $result['sz_pk_id']; ?>,<?php echo $result['size_category_status'] ;?>)" title="<?php echo $result['status'];?>">
												<?php
													if($result['size_category_status'] == '1'){ ?>
														<button type="button" class="btn btn-block btn-info">Active</button><?php
													}else { ?>
														<button type="button" class="btn btn-block btn-primary">Deactive</button>
													<?php }  ?>
											</a>
										</td>
										<td><a title="Edit" href="<?php echo base_url(); ?>category/edit_size_category/<?php echo $result['sz_pk_id']; ?>"><img src="<?php echo base_url() ?>assets/images/pencil.png" border="0px"></a>|&nbsp;&nbsp;
										<a title="Delete" href="javascript:void(0)" onclick="delcategory(<?php echo $result['sz_pk_id']; ?>)"><img width="23px;" height="20px;" src="<?php echo base_url(); ?>assets/images/delete.png" broder="0px"></a></td>
										
									  </tr>
									<?php $cnt++; } } else { ?>
									
									<?php } ?>
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
	
	
	
<script>
$("#category_id").change(function() {
	var mydata = $(this).val();
	if(mydata==''){
		$('#sub_category').html('');
	} else{
		$.ajax({
			type: "POST",
			data: {mydata:mydata},
			url: url+'ajax/append_subcategory',
			success: function(data) { 
				$('#sub_category').html('');
				$('#sub_category').append(data);
			}
		});
	}
});
function delvenuealert(){
	swal("Can't delete! You can't delete yourself.")
}
function delcategory(id) {
	swal({
			  title: "Are you sure you want to delete subcategory?",
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
            url: url+'ajax/delete_size_category',
            success: function(data) { 
	            if(data >0)
	            {
				    swal("Deleted!", "Sub Sub category has been deleted.", "success");
		            window.location.href = url+"category/size_category_list/delete_success";
	            } else {
	               swal("Oops...", "Error in delete category!", "error");
				   window.location.href = url+"category/size_category_list";
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
	  title: "Are you sure to do subcategory "+stc+"?",
	  //text: "You will not be able to recover this record!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Yes,Change Status!",
	  closeOnConfirm: false
	},
	function(){	 
		jQuery.ajax({
			url: url+"ajax/sz_category_status_change",
			type: "post",
			data:{id:id,status:status},
			success:function(msg){ 
				 window.location.href = url+"category/size_category_list/update_sz_status";
			}
		});
	});
    return false;
 }
 
</script>
</div>