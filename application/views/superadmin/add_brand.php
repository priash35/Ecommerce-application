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
        <h1>Brand Add And List</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Brand</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-5">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Brand</h3>
                    </div>
                    <form role="form" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Brand Name</label>
                                <input type="text" id="brand_name" name="brand_name" value="<?php echo $brand_info->brand_name?>" class="form-control validate[required,maxSize[50]]" placeholder="Brand Name">
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
                        <h3 class="box-title">Brand list </h3>
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
                                    <th>Brand Name</th>
                                    <th>Active/Deactive</th>
                                    <th>Action</th>
                                </tr>
				<?php $cnt = 1;
                                    if(count($brand_data) > 0) {
					foreach($brand_data as $result) { ?>
                                            <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo ucwords($result['brand_name']); ?></td>
                                                    <td>
                                                        <a href="javascript:void(0)" class="text-center" onclick="status_change(<?php echo $result['brand_pk_id']; ?>,<?php echo $result['brand_status'] ;?>)" title="<?php echo $result['status'];?>">
                                                            <?php
                                                                    if($result['brand_status'] == '1'){ ?>
                                                                            <button type="button" class="btn btn-block btn-info">Active</button><?php
                                                                    }else { ?>
                                                                            <button type="button" class="btn btn-block btn-primary">Deactive</button>
                                                            <?php }  ?>
                                                        </a>
                                                    </td>
                                                    <td><a title="Edit" href="<?php echo base_url(); ?>product/edit_brand/<?php echo $result['brand_pk_id']; ?>"><img src="<?php echo base_url() ?>assets/images/pencil.png" border="0px"></a>|&nbsp;&nbsp;
                                                    <a title="Delete" href="javascript:void(0)" onclick="delcategory(<?php echo $result['brand_pk_id']; ?>)"><img width="23px;" height="20px;" src="<?php echo base_url(); ?>assets/images/delete.png" broder="0px"></a></td>
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
function delcategory(id) {
	swal({
                title: "Are you sure you want to delete brand?",
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
            url: url+'ajax/delete_brand',
            success: function(data) {
	            if(data >0)
	            {
                        swal("Deleted!", "Category has been deleted.", "success");
		        window.location.href = url+"product/brand_list/delete_success";
	            } else {
	               swal("Oops...", "Error in delete brand!", "error");
			window.location.href = url+"product/brand_list";
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
	  title: "Are you sure to do brand "+stc+"?",
	  //text: "You will not be able to recover this record!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Yes,Change Status!",
	  closeOnConfirm: false
	},
	function(){
		jQuery.ajax({
			url: url+"ajax/brand_status_change",
			type: "post",
			data:{id:id,status:status},
			success:function(msg){
				 window.location.href = url+"product/brand_list/update_status";
			}
		});
	});
    return false;
 }

</script>