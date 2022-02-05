<?php 
$sz_category_name = '';
$src = '';

if(isset($frontend_slider_data) && !empty($frontend_slider_data)) {
	
	$src = $frontend_slider_data[0]['slide']!="" ? $frontend_slider_data[0]['slide'] : 'No-image-found.jpg';
	$actionMsg = "Update";
   $btnMsg = "Update";
     
  
}
?>
<!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Home Page Slider Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Home Page Slider Management</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Home Page Slider List</h3>

                        <div class="row" style="margin-top: 10px">
                           
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding table-striped table-bordered">
						<form role="form"  method="post" id="productvalidator" enctype="multipart/form-data">
							<table id="example1" class="table table-responsive">
                                <tr>
                                    
                                    <th>Image 1</th>
                                    <th>Image 2</th>
                                    <th>Image 3</th>
                                    <th>Image 4</th>
									
                                </tr>
                                <tbody>
                                
							   <tr>
                                    <?php if($frontend_slider_data[0]['slide']!=''){$frontend_slider_img = $frontend_slider_data[0]['slide']; }else{ $frontend_slider_img = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img;?>" class="img-responsive" width="50" /></td>
									<?php if($frontend_slider_data[1]['slide']!=''){$frontend_slider_img1 = $frontend_slider_data[1]['slide']; }else{ $frontend_slider_img1 = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img1;?>" class="img-responsive" width="50" /></td>
									<?php if($frontend_slider_data[2]['slide']!=''){$frontend_slider_img2 = $frontend_slider_data[2]['slide']; }else{ $frontend_slider_img2 = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img2;?>" class="img-responsive" width="50" /></td>
									<?php if($frontend_slider_data[3]['slide']!=''){$frontend_slider_img3 = $frontend_slider_data[3]['slide']; }else{ $frontend_slider_img3 = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img3;?>" class="img-responsive" width="50" /></td>
									
									
								</tr>
								<tr>
									<td style="text-align: center;">
									
										
									<input type="file" name="img_1">
									<input type="hidden" name="slid_id[1]" value="<?=$frontend_slider_data[0]['slid_id']; ?>">
									<input type="hidden" name="oldslide_1" value="<?=$src; ?>">
									
									</td>
									<td style="text-align: center;">
									
								
									<input type="file" name="img_2">
									<input type="hidden" name="oldslide_2" value="<?=$src; ?>">
									<input type="hidden" name="slid_id[2]" value="<?=$frontend_slider_data[1]['slid_id']; ?>">
									</td><td style="text-align: center;">
									
								
									<input type="file" name="img_3">
									<input type="hidden" name="oldslide_3" value="<?=$src; ?>">
									<input type="hidden" name="slid_id[3]" value="<?=$frontend_slider_data[2]['slid_id']; ?>">
									</td><td style="text-align: center;">
									
								
									<input type="file" name="img_4">
									<input type="hidden" name="oldslide_4" value="<?=$src; ?>">
									<input type="hidden" name="slid_id[4]" value="<?=$frontend_slider_data[3]['slid_id']; ?>">
									</td>
								</tr>
								
                              
                                </tbody>
                            </table>
							
							
							<div class="col-md-12">
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
						</form >
						</div>
                    <!-- /.box-body -->
					
                </div>
                <!-- /.box -->
            </div>
        </div>
        
    </section>
</div>
<script>
$("#category_id").change(function() {  
	var mydata = $(this).val();
	if(mydata==''){
		$('#sub_category').html('');
	} else{
		$.ajax({
			type: "POST",
			data: {mydata:mydata},
			url: url+'ajax/append_subcategory_addproduct',
			success: function(data) { 
				$('#sub_category').html('');
				$('#sub_category').append(data);
				$('select#sub_catidXYZ').on('change', function () {
					var mydata1 = $(this).val();
					if(mydata==''){
						$('#size_category').html('');
					} else{
						$.ajax({
							type: "POST",
							data: {mydata1:mydata1},
							url: url+'ajax/append_sizecategory_addproduct',
							success: function(data) { 
								$('#size_category').html('');
								$('#size_category').append(data);
							}
						});
					} 
				});
			}
		});
	}
	
});
</script>