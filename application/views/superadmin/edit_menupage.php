<?php 
/* $src = '';
if(isset($frontend_slider_data) && !empty($frontend_slider_data)) {
	print_r($frontend_slider_data); die;
	$src = $frontend_slider_data[0]['slide']!="" ? $frontend_slider_data[0]['slide'] : 'No-image-found.jpg';
	$actionMsg = "Update";
   $btnMsg = "Update";
    
  
} */
 $Id = $this->uri->segment('4'); 
 $catId = $this->uri->segment('3');
 if($catId=='slider'){$tableH='Slider';}elseif($catId=='catfirst'){$tableH='First';}
elseif($catId=='catsecond'){$tableH='Second';}elseif($catId=='catthird'){$tableH='Third';}
elseif($catId=='catfourth'){$tableH='Fourth';}elseif($catId=='catfive'){$tableH='Five';}
?>
<!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit <?=$Id?> Category <?=$tableH?> Section Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Edit <?=ucfirst($Id)?> Category <?=$tableH?> Section Management</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=ucfirst($Id)?> Category <?=$tableH?> Section List</h3>

                        <div class="row" style="margin-top: 10px">
                           
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding table-striped table-bordered">
						<form role="form"  method="post" id="productvalidator" enctype="multipart/form-data">
							<table id="example1" class="table table-responsive">
                                <tr>
                                    <?php $cnt=1; 
									foreach($frontend_slider_data as $DataSlides){ ?>
                                    <th>Image <?=$cnt?></th>
                                    <?php $cnt++; } ?>
									
                                </tr>
                                <tbody>
                                
							   <tr><?php foreach($frontend_slider_data as $DataSlides){ ?>
                                    <?php if($DataSlides['slide']!=''){$frontend_slider_img = $DataSlides['slide']; }else{ $frontend_slider_img = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img;?>" class="img-responsive" width="50" /></td>
									<?php } ?>
									
								</tr>
								<tr>
									<?php 
									$cnt=1;
									foreach($frontend_slider_data as $DataSlides){ 
										$src = $DataSlides['slide']!="" ? $DataSlides['slide'] : 'No-image-found.jpg';
									?>
									<td>
									
										
									<input type="file" class="form-control" name="img_<?=$cnt?>"><br>
									<label>Product Code(SKU)</label><input class="form-control" type="number" name="SKU_[<?=$cnt?>]" placeholder="Enter Product Code(SKU)" requierd>
									<input type="hidden" name="slid_id[<?=$cnt?>]" value="<?=$DataSlides['slid_id']; ?>">
									<input type="hidden" name="oldslide_<?=$cnt?>" value="<?=$src; ?>">
									
									</td>
									<?php $cnt++; } ?>
									
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