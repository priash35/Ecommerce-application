
<!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Front End Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Front End Management</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Front End Slider List</h3>

                        <div class="row" style="margin-top: 10px">
                           
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding table-striped table-bordered">
                        
                        <div class="col-md-12">
                            <table id="example1" class="table table-responsive">
                                <tr>
                                    <th style="width: 8%">ID</th>
                                    <th>Slider Image 1</th>
                                    <th>Slider Image 2</th>
                                    <th>Slider Image 3</th>
                                    <th>Slider Image 4</th>
                                    <th>Sub Category</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                                <tbody>
								<?php
								$cnt = 1;
								if(count($frontend_slider_data) > 0) { 
								foreach($frontend_slider_data as $result) { 
									
								?>
                                <tr>
                                    
									<td><?=$cnt;?></td>
                                    <?php $sql = "select * from slides where slider_id=".$result['slider_id'];
										$query = $this->db->query($sql);
										if ($query->num_rows() > 0) {
									  foreach ($query->result() as $row) {
										  if($row->slide_image!=''){$src = $row->slide_image; }else{ $src = 'No-image-found.jpg';}
										  ?>
											
										<td><img src="<?php echo base_url(); ?>assets/images/slider/thumb/<?=$src;?>" class="img-responsive" width="50" /></td>
										<?php }  }else{ echo "<td colspan='4' style='color:red'>Slider doesn't have slides. Please add slides using edit button.</td>"; }?>
                                    <td><?=$result['sc_category_name']?></td>	
                                    <td>
									<a href="<?php echo base_url(); ?>frontend/edit_slider/<?php echo $result['slider_id']; ?>" class="btn btn-social-icon btn-primary"><i class="fa fa-pencil-square-o"></i></a> </td>
                                </tr>
								<?php $cnt++; } } else { ?>
								<?php } ?>
								<tr><td colspan='7' style='color:red'>If slider doesn't have slides. Please add slides using edit button.</td></tr>
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

 