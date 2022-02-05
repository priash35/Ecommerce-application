
<!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Menu Pages Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Menu Pages Management</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Menu Page Slider List</h3>

                        <div class="row" style="margin-top: 10px">
                           
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding table-striped table-bordered">
                        
                        <div class="col-md-12">
                            <table id="example1" class="table table-responsive">
                                <tr>
                                    
                                    <th>Menu</th><th>Image 1</th>
                                    <th>Image 2</th>
                                    <th>Image 3</th>
                                    <th>Image 4</th>
									<th>Action</th>
                                   
                                </tr>
                                <tbody>
                                
							   <tr>
							   <td>MENS</td>
							   <?php
								$cnt = 1;
								if(count($mens) > 0) {
								foreach($mens as $rmens) { ?>
                                    <?php if($rmens['slide']!=''){$frontend_slider_img = $rmens['slide']; }else{ $frontend_slider_img = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img;?>" class="img-responsive" width="50" /></td>
									<?php $cnt++; } } else { ?>
		
										<?php } ?>
									<td style="text-align: center;">
									<a href="<?php echo base_url(); ?>frontend/edit_menupage/slider/mens" class="btn  btn-primary">Edit</a> 
									</td>
								</tr>
								<tr><td>WOMENS</td>
							   <?php
								$cnt = 1;
								if(count($womens) > 0) {
								foreach($womens as $rmens) { ?>
                                    <?php if($rmens['slide']!=''){$frontend_slider_img = $rmens['slide']; }else{ $frontend_slider_img = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img;?>" class="img-responsive" width="50" /></td>
									<?php $cnt++; } } else { ?>
		
										<?php } ?>
									<td style="text-align: center;">
									<a href="<?php echo base_url(); ?>frontend/edit_menupage/slider/womens" class="btn  btn-primary">Edit</a> 
									</td>
								</tr>
								<tr><td>KIDS</td>
							   <?php
								$cnt = 1;
								if(count($kids) > 0) {
								foreach($kids as $rmens) { ?>
                                    <?php if($rmens['slide']!=''){$frontend_slider_img = $rmens['slide']; }else{ $frontend_slider_img = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img;?>" class="img-responsive" width="50" /></td>
									<?php $cnt++; } } else { ?>
		
										<?php } ?>
									<td style="text-align: center;">
									<a href="<?php echo base_url(); ?>frontend/edit_menupage/slider/kids" class="btn  btn-primary">Edit</a> 
									</td>
								</tr>
								<tr><td>ELECTRONICS</td>
								<?php
								$cnt = 1;
								if(count($Electronis) > 0) {
								foreach($Electronis as $rmens) { ?>
                                    <?php if($rmens['slide']!=''){$frontend_slider_img = $rmens['slide']; }else{ $frontend_slider_img = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img;?>" class="img-responsive" width="50" /></td>
									<?php $cnt++; } } else { ?>
		
										<?php } ?>
									<td style="text-align: center;">
									<a href="<?php echo base_url(); ?>frontend/edit_menupage/slider/electronics" class="btn  btn-primary">Edit</a> 
									</td>
								</tr>
								<tr><td>SPORTS</td>
								<?php
								$cnt = 1;
								if(count($Sports) > 0) {
								foreach($Sports as $rmens) { ?>
                                    <?php if($rmens['slide']!=''){$frontend_slider_img = $rmens['slide']; }else{ $frontend_slider_img = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img;?>" class="img-responsive" width="50" /></td>
									<?php $cnt++; } } else { ?>
		
										<?php } ?>
									<td style="text-align: center;">
									<a href="<?php echo base_url(); ?>frontend/edit_menupage/slider/sports" class="btn  btn-primary">Edit</a> 
									</td>
								</tr>
								<tr><td>FOOD</td><?php
								$cnt = 1;
								if(count($Food) > 0) {
								foreach($Food as $rmens) { ?>
                                    <?php if($rmens['slide']!=''){$frontend_slider_img = $rmens['slide']; }else{ $frontend_slider_img = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img;?>" class="img-responsive" width="50" /></td>
									<?php $cnt++; } } else { ?>
		
										<?php } ?>
									<td style="text-align: center;">
									<a href="<?php echo base_url(); ?>frontend/edit_menupage/slider/food" class="btn  btn-primary">Edit</a> 
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
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Menu Page First Section List</h3>

                        <div class="row" style="margin-top: 10px">
                           
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding table-striped table-bordered">
                        
                        <div class="col-md-12">
                            <table id="example1" class="table table-responsive">
                                <tr>
                                    
                                    <th>Menu</th>
									<th>Image 1</th>
                                    <th>Image 2</th>
                                    
									<th>Action</th>
                                   
                                </tr>
                                <tbody>
                                 <?php $cnt = 0;
						if(count($res) > 0) {
						foreach($res as $resData) {  ?>
							   <tr><td><?=strtoupper($catarr[$cnt]); ?></td>
							   <?php foreach($resData as $resDataD) { ?>
                                    <?php if($resDataD['slide']!=''){$frontend_slider_img = $resDataD['slide']; }else{ $frontend_slider_img = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img;?>" class="img-responsive" width="50" /></td>
								<?php } ?>
									<td style="text-align: center;">
									<a href="<?php echo base_url(); ?>frontend/edit_menupage/catfirst/<?=$resDataD['cat']?>" class="btn  btn-primary">Edit</a> 
									</td>
								</tr>
								<?php $cnt++; } } ?>
								
								
                              
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- /.box-body -->
					
                </div>
                <!-- /.box -->
            </div>
			<div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Menu Page second Section List(Banner)</h3>

                        <div class="row" style="margin-top: 10px">
                           
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding table-striped table-bordered">
                        
                        <div class="col-md-12">
                            <table id="example1" class="table table-responsive">
                                <tr>
                                    
                                    <th>Menu</th>
                                    <th>Image</th>
                                    
									<th>Action</th>
                                   
                                </tr>
                                <tbody>
                                  <?php $cnt = 0;
						if(count($resSec) > 0) {
						foreach($resSec as $resData) {  ?>
							   <tr><td><?=strtoupper($catarr[$cnt]); ?></td>
							   <?php foreach($resData as $resDataD) { ?>
                                    <?php if($resDataD['slide']!=''){$frontend_slider_img = $resDataD['slide']; }else{ $frontend_slider_img = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img;?>" class="img-responsive" width="50" /></td>
								<?php } ?>
									<td style="text-align: center;">
									<a href="<?php echo base_url(); ?>frontend/edit_menupage/catsecond/<?=$resDataD['cat']?>" class="btn  btn-primary">Edit</a> 
									</td>
								</tr>
								<?php $cnt++; } } ?>
								
								
								
								
                              
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- /.box-body -->
					
                </div>
                <!-- /.box -->
            </div>
			<div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Menu Page Fourth Section List </h3>

                        <div class="row" style="margin-top: 10px">
                           
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding table-striped table-bordered">
                        
                        <div class="col-md-12">
                            <table id="example1" class="table table-responsive">
                                <tr>
                                    
                                    <th>Menu</th>
                                    <th>Image 1</th>
                                     <th>Image 2</th>
									<th>Action</th>
                                   
                                </tr>
                                <tbody>
                                  <?php  $cnt = 0;
						if(count($resFO) > 0) {
						foreach($resFO as $resData) {  ?>
							   <tr><td><?=strtoupper($catarr[$cnt]); ?></td>
							   <?php foreach($resData as $resDataD) { ?>
                                    <?php if($resDataD['slide']!=''){$frontend_slider_img = $resDataD['slide']; }else{ $frontend_slider_img = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img;?>" class="img-responsive" width="50" /></td>
								<?php } ?>
									<td style="text-align: center;">
									<a href="<?php echo base_url(); ?>frontend/edit_menupage/catfourth/<?=$resDataD['cat']?>" class="btn  btn-primary">Edit</a> 
									</td>
								</tr>
								<?php $cnt++; } } ?>
								
								
								
								
                              
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- /.box-body -->
					
                </div>
                <!-- /.box -->
            </div>
        </div>
        
    </section><!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Menu Page Third Section List</h3>

                        <div class="row" style="margin-top: 10px">
                           
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding table-striped table-bordered">
                        
                        <div class="col-md-12">
                            <table id="example1" class="table table-responsive">
                                <tr>
                                    
                                    <th>Menu</th>
									<th>Image 1</th>
                                    <th>Image 2</th>
									<th>Image 3</th>
                                    <th>Image 4</th>
                                    
									<th>Action</th>
                                   
                                </tr>
                                <tbody>
								
                                 <?php $cnt = 0;
						if(count($resTh) > 0) {
						foreach($resTh as $resData) {  ?>
							   <tr>
								<td><?=strtoupper($catarr[$cnt]); ?></td>
							   <?php foreach($resData as $resDataD) { ?>
                                    <?php if($resDataD['slide']!=''){$frontend_slider_img = $resDataD['slide']; }else{ $frontend_slider_img = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img;?>" class="img-responsive" width="50" /></td>
								<?php } ?>
									<td style="text-align: center;">
									<a href="<?php echo base_url(); ?>frontend/edit_menupage/catthird/<?=$resDataD['cat']?>" class="btn  btn-primary">Edit</a> 
									</td>
								</tr>
								<?php $cnt++; } } ?>
								
								
                              
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- /.box-body -->
					
                </div>
                <!-- /.box -->
            </div>
			<div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Menu Page Fifth Section List</h3>

                        <div class="row" style="margin-top: 10px">
                           
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding table-striped table-bordered">
                        
                        <div class="col-md-12">
                            <table id="example1" class="table table-responsive">
                                <tr>
                                    
                                    <th>Menu</th>
									<th>Image 1</th>
                                    <th>Image 2</th>
									<th>Image 3</th>
                                    <th>Image 4</th>
                                    
									<th>Action</th>
                                   
                                </tr>
                                <tbody>
								
                                 <?php $cnt = 0;
						if(count($resFI) > 0) {
						foreach($resFI as $resData) {  ?>
							   <tr>
								<td><?=strtoupper($catarr[$cnt]); ?></td>
							   <?php foreach($resData as $resDataD) { ?>
                                    <?php if($resDataD['slide']!=''){$frontend_slider_img = $resDataD['slide']; }else{ $frontend_slider_img = 'No-image-found.jpg';}
									?>
									<td style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$frontend_slider_img;?>" class="img-responsive" width="50" /></td>
								<?php } ?>
									<td style="text-align: center;">
									<a href="<?php echo base_url(); ?>frontend/edit_menupage/catfive/<?=$resDataD['cat']?>" class="btn  btn-primary">Edit</a> 
									</td>
								</tr>
								<?php $cnt++; } } ?>
								
								
                              
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
            
        </div>
        
    </section>
</div>
