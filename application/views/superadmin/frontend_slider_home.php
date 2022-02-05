
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
                        
                        <div class="col-md-12">
                            <table id="example1" class="table table-responsive">
                                <tr>
                                    
                                    <th>Image 1</th>
                                    <th>Image 2</th>
                                    <th>Image 3</th>
                                    <th>Image 4</th>
									<th>Action</th>
                                   
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
									
									<td style="text-align: center;">
									<a href="<?php echo base_url(); ?>frontend/edit_home_slider" class="btn  btn-primary">Edit</a> 
									</td>
								</tr>
								
								
                              
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- /.box-body -->
					
                </div>
                <!-- /.box -->
            </div>
        </div>
        
    </section> 
	<!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Home Page Second Section List</h3>

                        <div class="row" style="margin-top: 10px">
                           
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding table-striped table-bordered">
                        
                        <div class="col-md-12">
                            <table id="example1" class="table table-responsive">
                                <tr>
                                    
                                    <th>Image 1</th>
                                    <th>Image 2</th>
                                    <th>Image 3</th>
                                    <th>Image 4</th>
									<th>Action</th>
                                   
                                </tr>
                                <tbody>
                                 
							   <tr>
                                    <?php if($secondsection[0]['slide']!=''){$frontend_slider_img = $secondsection[0]['slide']; }else{ $frontend_slider_img = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img;?>" class="img-responsive" width="50" /></td>
									<?php if($secondsection[1]['slide']!=''){$frontend_slider_img1 = $secondsection[1]['slide']; }else{ $frontend_slider_img1 = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img1;?>" class="img-responsive" width="50" /></td>
									<?php if($secondsection[2]['slide']!=''){$frontend_slider_img2 = $secondsection[2]['slide']; }else{ $frontend_slider_img2 = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img2;?>" class="img-responsive" width="50" /></td>
									<?php if($secondsection[3]['slide']!=''){$frontend_slider_img3 = $secondsection[3]['slide']; }else{ $frontend_slider_img3 = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img3;?>" class="img-responsive" width="50" /></td>
									
									<td style="text-align: center;">
									<a href="<?php echo base_url(); ?>frontend/edit_homesecondsection" class="btn  btn-primary">Edit</a> 
									</td>
								</tr>
								
								
                              
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- /.box-body -->
					
                </div>
                <!-- /.box -->
            </div>
        </div>
        
    </section>
	<!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Home Page Third Section List</h3>

                        <div class="row" style="margin-top: 10px">
                           
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding table-striped table-bordered">
                        
                        <div class="col-md-12">
                            <table id="example1" class="table table-responsive">
                                <tr>
                                    
                                    <th>Image 1</th>
                                    <th>Image 2</th>
                                    <th>Image 3</th>
                                    <th>Image 4</th>
									<th>Action</th>
                                   
                                </tr>
                                <tbody>
                                 
							   <tr>
                                    <?php if($thirdsection[0]['slide']!=''){$frontend_slider_img = $thirdsection[0]['slide']; }else{ $frontend_slider_img = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img;?>" class="img-responsive" width="50" /></td>
									<?php if($thirdsection[1]['slide']!=''){$frontend_slider_img1 = $thirdsection[1]['slide']; }else{ $frontend_slider_img1 = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img1;?>" class="img-responsive" width="50" /></td>
									<?php if($thirdsection[2]['slide']!=''){$frontend_slider_img2 = $thirdsection[2]['slide']; }else{ $frontend_slider_img2 = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img2;?>" class="img-responsive" width="50" /></td>
									<?php if($thirdsection[3]['slide']!=''){$frontend_slider_img3 = $thirdsection[3]['slide']; }else{ $frontend_slider_img3 = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img3;?>" class="img-responsive" width="50" /></td>
									
									<td style="text-align: center;">
									<a href="<?php echo base_url(); ?>frontend/edit_homethirdsection" class="btn  btn-primary">Edit</a> 
									</td>
								</tr>
								
								
                              
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- /.box-body -->
					
                </div>
                <!-- /.box -->
            </div>
        </div>
        
    </section>
</div>
