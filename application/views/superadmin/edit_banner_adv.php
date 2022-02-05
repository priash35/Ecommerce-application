<?php 
	$Id = $this->uri->segment('3');
	
	 $sql = "SELECT banner_advrt.*, sub_categories.* FROM sub_categories INNER JOIN banner_advrt ON sub_categories.sc_pk_id=banner_advrt.sub_cat where banner_advrt.advet_id=".$Id;
	$query = $this->db->query($sql);
	$rs = $query->row();
	$catN = $rs->sc_category_name;
	
	
?>
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Banner And Slider Side Image Management  
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Banner Management</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Banner And Slider Side Image List</h3>
                    </div>
                    <form role="form"  method="post" id="productvalidator" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group col-md-12">
                                 <div class="col-md-6">
                                <label>Category:</label>
                                <Span ><b>
                                  <?=$catN?></b>
                                </span>
                                 </div>
                            </div>
                            <div class="col-md-12">
								<?php
								$cnt = 1;
								if(count($frontend_slider_data) > 0) { 
								foreach($frontend_slider_data as $result) { 
									
								?>
									<div class="col-md-3">
										<div class="form-group">
											<label>Image <?=$cnt?></label>
											<input type ="hidden" name="slide_id[<?=$cnt?>]" value="<?=$result['sec_advrt_baner_id']?>">
											<input type ="hidden" name="oldslide_[<?=$cnt?>]" value="<?=$result['sec_advrt_baner_image']?>">
											
											<input type="file" class="form-control" name="img_<?=$cnt?>" id="exampleInputsubcategory" >
										</div>
										<div class="col-xs-12">
											<div class="item-adv-simple">
												<?php if($result['sec_advrt_baner_image']!=''){$src = $result['sec_advrt_baner_image']; }else{ $src = 'No-image-found.jpg';} ?>
												<img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$src;?>" alt="" class="img-responsive">
											</div>
										</div>
									</div>
								<?php 
								$cnt++;
									}
								}
								?>
                                
                                </div>
                            </div>
                        </div>
                       
                        <!-- /.box-body -->
                        <div class="box-footer col-md-12">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>