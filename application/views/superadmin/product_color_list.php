<?php
$isSuccess = $this->uri->segment('3');
?>
<style>
    .onoffswitch {
        position: relative; width: 90px;
        -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
    }

    .onoffswitch-checkbox {
        display: none;
    }

    .onoffswitch-label {
        display: block; overflow: hidden; cursor: pointer;
        border: 2px solid #999999; border-radius: 20px;
    }

    .onoffswitch-inner {
        display: block; width: 200%; margin-left: -100%;
        -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
        -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
    }

    .onoffswitch-inner:before, .onoffswitch-inner:after {
        display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
        font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
        -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
    }

    .onoffswitch-inner:before {
        content: "Active";
        padding-left: 10px;
        background-color: #2FCCFF; color: #FFFFFF;
    }

    .onoffswitch-inner:after {
        content: "DeAct";
        padding-right: 10px;
        background-color: #EEEEEE; color: #999999;
        text-align: right;
    }

    .onoffswitch-switch {
        display: block; width: 18px; margin: 6px;
        background: #FFFFFF;
        border: 2px solid #999999; border-radius: 20px;
        position: absolute; top: 0; bottom: 0; right: 56px;
        -moz-transition: all 0.3s ease-in 0s; -webkit-transition: all 0.3s ease-in 0s;
        -o-transition: all 0.3s ease-in 0s; transition: all 0.3s ease-in 0s; 
    }

    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
        margin-left: 0;
    }

    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
        right: 0px; 
    }
.btn-group .btn{padding: 2px}
</style>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/function.js">
 <link href="<?php echo base_url(); ?>assets/color_picker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/color_picker/js/bootstrap-colorpicker.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Product Color List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Product Color Management</a></li>
        </ol>
    </section>
    <!-- Main content -->
	<section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Color</h3>
                    </div>
					<form method="post" id="areavalidator" enctype="multipart/form-data">
                            <div class="form-group col-md-6">
                                <label> Select Color</label>
								<input type="text" id="color_pick" name="color_pick" value="" class="form-control validate[required]" placeholder="Select Color">
                            </div>
                        <!-- /.box-body -->	
						<div class="box-footer">
                            <input type="submit" style="margin-top:1.2%;" class="btn btn-primary" value="Submit">
                        </div>
					</form>
                     
                </div>
                <!-- /.box -->


            </div>
		</div>
		</section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List</h3>

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
                                    <th>Sr.No.</th>
                                    <th>Color Code</th>
                                    <th>Action</th>
                                </tr>
                                <?php
								 $cnt = 1; 
								if(count($color_data) > 0) {
								foreach($color_data as $result) { 
								?>
								  <tr>
									
									<td><?php echo $cnt; ?></td>
									<td><?php echo $result['color_code']; ?></td>
									<td><a title="Delete" href="javascript:void(0)" onclick="delproductcolor(<?php echo $result['color_pk_id']; ?>)"><img width="23px;" height="20px;" src="<?php echo base_url(); ?>assets/images/delete.png" broder="0px"></a></td>
									
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

        <!--Edit Modal -->
        <div class="modal fade" id="edit" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p>This is a large modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--end Edit model -->
    </section>
</div>

<script>
function delvenuealert(){
	swal("Can't delete! You can't delete yourself.")
}
function delproductcolor(id) {
	swal({
			  title: "Are you sure you want to delete product color?",
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
            url: url+'ajax/delete_product_color',
            success: function(data) { 
	            if(data >0)
	            {
				    swal("Deleted!", "Product color has been deleted.", "success");
		            window.location.href = url+"product/product_colors/delete_success";
	            } else {
	               swal("Oops...", "Error in delete product!", "error");
				   window.location.href = url+"product/product_colors";
                }
            }
        });
		
	});
}$('#color_pick').colorpicker({ /*options...*/ });
</script>