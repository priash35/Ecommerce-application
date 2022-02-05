<?php
$Id = $this->uri->segment('3');
$getId = $Id!="" ? $Id : '0';

$area_name  = '';
$pincode  = '';
$isActive  = '';
$actionMsg = "Add";
$btnMsg = "Save";
$city ='';

if(isset($area_info) && !empty($area_info)) {
   $actionMsg = "Update";
   $btnMsg = "Update";
   $area_name = $area_info->area_name!="" ? $area_info->area_name : '';
   $pincode = $area_info->area_pin!="" ? $area_info->area_pin : ''; 
   $city = $area_info->city_id!="" ? $area_info->city_id : '';
   $isActive = $area_info->area_status!="" ? $area_info->area_status : '';
}
?>









<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Area Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Loaction Management</a></li>
            <li class="active">Area Management</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-5">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Area And Pin code</h3>
                    </div>
					<form method="post" id="areavalidator" enctype="multipart/form-data">
						<div class="box-body">
                            <div class="form-group">
							
                                <label>Select City</label>
                                <select name="city" class="form-control">
                                     <option>----- Select city-----</option>
							<?php $sql = "select * from city where city_status=1";
								$query = $this->db->query($sql);
								$cityData = $query->result();
								foreach($cityData as $CD){ 
								?>
                                    <option <?php if($city == $CD->city_pk_id){ echo "SELECTED";}?> value="<?=$CD->city_pk_id?>"><?=$CD->city_name?></option>
								<?php  } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> Area Name</label>
								<input type="text" id="area_name" name="area_name" value="<?php echo $area_name ?>" class="form-control validate[required,maxSize[50],ajax[check_area_exist]]" placeholder="Enter Area Name">
									<input type="hidden" name="id" id="id" value="<?php echo $getId; ?>">
									<input type="hidden" name="action" id="action" value="<?php echo $actionMsg; ?>">
                                
                            </div>
                            <div class="form-group">
                                <label> Area Pin Code</label>
								<input type="text" id="pincode" name="pincode" value="<?php echo $pincode; ?>"	class="form-control validate[required,minSize[6],maxSize[6]]" placeholder="Pincode">
                            </div>
							<div class="form-group">
								<label>Status</label> <br/>
								<input type="radio" name="is_active" value="1" id="active" checked="checked" <?php if($isActive =="1") {?> checked <?php } ?>>
								<label class="labelclass" for="active" >Active</label>  
								&nbsp;&nbsp;<input type="radio" id="deactive" name="is_active" value="2" <?php if($isActive =="2") {?> checked <?php } ?>>
								<label class="labelclass" for="deactive" >Inactive</label>
							</div><!-- /.form-group -->
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
                        <h3 class="box-title">Area And Pin code List</h3>

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
                                    <th>City Name</th>
                                    <th>Area Name</th>
                                    <th>Area Pin Code</th>
                                    <th>Active/Deactive</th>
                                    <th>Action</th>
                                </tr>
								<?php
									$cnt = 1;
									if(count($area_data) > 0) {
									foreach($area_data as $result) { ?>
									  <tr>
										<td><?php echo $cnt; ?></td>
										<?php 
										$sql = 'Select * from city where city_pk_id='.$result['city_id'];
										$query = $this->db->query($sql);
										if($row = $query->result()){ $ctN = $row[0]->city_name; }else{ $ctN ='NA';}
										
										?>
										<td><?php echo $ctN; ?></td>
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
 
</script>





