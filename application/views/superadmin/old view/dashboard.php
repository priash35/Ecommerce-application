     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Cossntrol panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
              <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->
      
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
          <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range">
                  <i class="fa fa-calendar"></i></button>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->

              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
                Visitors
              </h3>
            </div>
            <div class="box-body">
              <div id="world-map" style="height: 250px; width: 100%;"></div>
            </div>
            <!-- /.box-body-->
            <div class="box-footer no-border">
              <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <div id="sparkline-1"></div>
                  <div class="knob-label">Visitors</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <div id="sparkline-2"></div>
                  <div class="knob-label">Online</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center">
                  <div id="sparkline-3"></div>
                  <div class="knob-label">Exists</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
$user_type ='';
if(isset($this->session->userdata['super_admin_logged_in'])) {
	$userData = $this->session->userdata['super_admin_logged_in'];
	$user_type = $userData['SUPER_ADMIN_USER_TYPE'];
}
?>
<style>
.chart {
  position: absolute;
  width: 450px;
  height: 450px;
  top: 279px;
  left: 66%;
  margin: -225px 0 0 -225px;
}
.doughnutTip {
  position: absolute;
  min-width: 30px;
  max-width: 300px;
  padding: 5px 15px;
  border-radius: 1px;
  background: rgba(0,0,0,.8);
  color: #ddd;
  font-size: 17px;
  text-shadow: 0 1px 0 #000;
  text-transform: uppercase;
  text-align: center;
  line-height: 1.3;
  letter-spacing: .06em;
  box-shadow: 0 1px 3px rgba(0,0,0,0.5);
  pointer-events: none;
  &::after {
      position: absolute;
      left: 50%;
      bottom: -6px;
      content: "";
      height: 0;
      margin: 0 0 0 -6px;
      border-right: 5px solid transparent;
      border-left: 5px solid transparent;
      border-top: 6px solid rgba(0,0,0,.7);
      line-height: 0;
  }
}
.doughnutSummary {
  position: absolute;
  top: 50%;
  left: 50%;
  color: #d5d5d5;
  text-align: center;
  text-shadow: 0 -1px 0 #111;
  cursor: default;
}
.doughnutSummaryTitle {
  position: absolute;
  top: 50%;
  width: 100%;
  margin-top: -27%;
  font-size: 22px;
  letter-spacing: .06em;
}
.doughnutSummaryNumber {
  position: absolute;
  top: 50%;
  width: 100%;
  margin-top: -15%;
  font-size: 55px;
}
.chart path:hover { opacity: 0.65; }
.box2{position:relative;}
.box-body1{height:280px;}
</style>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="headtextstyle">
            Dashboard
          </h1>
        </section>
        <div class="leftstyle pull-left">
            <ol class="breadcrumb breadcrumb1">
              <li><a href="#">Home</a></li>
              <li class="active">Dashboard</li>
            </ol>
        </div>
        <div style="clear:both;"></div>
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
		  <?php if($user_type=='1'){ ?>
				<div class="row">
					<div class="col-lg-3 col-xs-6">
						<!-- small box -->
						<div class="small-box bg-aqua">
							<div class="inner">
								<h3>
									<?php echo count($total_products); ?>
								</h3>
								<p>
									Total Products
								</p>
							</div>
							<div class="icon">
								<i class="ion ion-wineglass"></i>
							</div>
							<a href="<?php echo base_url();?>product/product_list" class="small-box-footer">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div><!-- ./col -->
					<div class="col-lg-3 col-xs-6">
						<!-- small box -->
						<div class="small-box bg-green">
							<div class="inner">
								<h3>
									<?php echo count($total_category); ?>
								</h3>
								<p>
									Total Categories
								</p>
							</div>
							<div class="icon">
								<i class="ion ion-beer"></i>
							</div>
							<a href="<?php echo  base_url();?>category/category_list" class="small-box-footer">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div><!-- ./col -->
					<div class="col-lg-3 col-xs-6">
						<!-- small box -->
						<div class="small-box bg-yellow">
							<div class="inner">
								<h3>
									<?php echo count($total_area); ?>
								</h3>
								<p>
									Total Area
								</p>
							</div>
							<div class="icon">
								<i class="ion ion-person-stalker"></i>
							</div>
							<a href="<?php echo  base_url();?>area/area_list" class="small-box-footer">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div><!-- ./col -->
					<div class="col-lg-3 col-xs-6">
						<!-- small box -->
						<div class="small-box bg-red">
							<div class="inner">
								<h3>
									<?php  echo count($total_users); ?>
								</h3>
								<p>
									Total Users
								</p>
							</div>
							<div class="icon">
								<i class="ion ion-person"></i>
							</div>
							<a href="<?php echo  base_url();?>user/user_list" class="small-box-footer">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div><!-- ./col -->
				</div><!-- /.row -->
		  <?php } ?>
          <!-- Main row -->

          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

            </section><!-- /.Left col -->
              <!-- right col (We are only adding the ID to make the widgets sortable)-->
              <!--             <section class="col-lg-5 connectedSortable">
              </section> -->
          </div><!-- /.content-wrapper -->

          </div>
        </section>
      </div>

