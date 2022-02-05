<?php
$userName = '';
if(isset($this->session->userdata['super_admin_logged_in'])) {
	$userData = $this->session->userdata['super_admin_logged_in'];
	$userName = $userData['SUPER_ADMIN_USER_NAME'];
	$user_type = $userData['SUPER_ADMIN_USER_TYPE'];
	$isUser = "super";
}

$url_name = $_SERVER["REQUEST_URI"];
$page_arr=explode("/",$url_name);
$page=(isset($page_arr[2])!='') ? $page_arr[2]:$page_arr[1];
//echo $page; exit;
?>
 <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $userName ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                       
						<li class="treeview <?php if ($page == 'dashboard') { echo 'active'; } ?>" >
						  <a href="<?php echo base_url(); ?>dashboard">
							<i class="fa fa-dashboard"></i> <span>Dashboard</span>
						  </a>
						</li>
                        
						<li class="treeview <?php if ($page == 'add_user' || $page == 'user_list' || $page == 'edit_user') { echo 'active'; } ?>">
							<a href="#">
								<i class="fa fa-users"></i>
                                <span>User Management</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
							</a>
						   <ul class="treeview-menu">
								<li class="<?php if ($page == 'user_list') { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>user/user_list"><i class="fa fa-circle-o"></i>List</a></li>
							</ul>
						</li>
                        <li class="treeview">
                            <a href="user_management.php">
                                <i class="fa fa-user"></i>
                                <span>Vendor Management</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="new_vendor.php"><i class="fa fa-circle-o"></i> New Vendor</a></li>
                                <li><a href="vendor_list.php"><i class="fa fa-circle-o"></i> Vendor List</a></li>
                            </ul>
                        </li>
                        <li class="treeview <?php if ($page == 'category' || $page == 'category_list') { echo 'active'; } ?>">
                            <a href="">
                                <i class="fa fa-sitemap"></i>
                                <span>Category Management</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>category/category_list">
									<i class="fa fa-circle-o" aria-hidden="true"></i> <span>Category List</span>
								</a>
								</li>
                                <li><a href="category.php"><i class="fa fa-circle-o"></i> New Category</a></li>
                                <li><a href="subcategory.php"><i class="fa fa-circle-o"></i>Sub Category</a></li>
                                <li><a href="subsubcategory.php"><i class="fa fa-circle-o"></i>Sub Sub Category</a></li>
                            </ul>
                        </li>
						
                        <li class="treeview">
                            <a href="product_management.php">
                                <i class="fa fa-shopping-basket"></i>
                                <span>Product Management</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                              <!--<li class="treeview"><a href="product_management.php">
                                <i class="fa fa-shopping-basket"></i>
                                <span>Product Size Management</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                              <ul class="treeview-menu">
                              <li class="treeview"><a href="size_category.php"><i class="fa fa-circle-o"></i>Size Category</a></li>
                                <li><a href="product_size.php"><i class="fa fa-circle-o"></i>Product Size</a></li>
                            </ul>
                              </li>-->
									<li><a href="product_size.php"><i class="fa fa-circle-o"></i>Product Size Management </a></li>
                                <li><a href="new_product.php"><i class="fa fa-circle-o"></i> New Product </a></li>
                                <li><a href="product_list.php"><i class="fa fa-circle-o"></i>Product List</a></li>
                            </ul>
                        </li>
						
                        <li class="<?php if ($page == 'orders') { echo 'active'; } ?>">
							<a href="<?php echo base_url(); ?>orders"><i class="fa fa-book"></i> <span>User Order Management</span></a>
						</li>
                        <li class="treeview <?php if ($page == 'area' || $page == 'area_list') { echo 'active'; } ?>">
                            <a href="">
                                <i class="fa fa-sitemap"></i>
                                <span>Location Management</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="city_management.php"><i class="fa fa-circle-o"></i> City Management</a></li>
                                <li >
									<a href="<?php echo base_url(); ?>area/area_list">
										<i class="fa fa-circle-o" aria-hidden="true"></i> <span>Area Management</span>
									</a>
								</li>
                            </ul>
                        </li>
						
                        <li class="treeview">
                            <a href="">
                                <i class="fa fa-file"></i>
                                <span>CMS Management</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="add_cmspage.php"><i class="fa fa-circle-o"></i> Add CMS Page</a></li>
                                <li><a href="cms_list.php"><i class="fa fa-circle-o"></i> CMS Page List</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="">
                                <i class="fa fa-university"></i>
                                <span>Subscription & VAT Manage</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="new_subscription.php"><i class="fa fa-circle-o"></i>Subscription Management</a></li>
                                <li><a href="vat_manage.php"><i class="fa fa-circle-o"></i> VAT Management</a></li>
                            </ul>
                        </li>
  <li><a href="changepwd.php"><i class="fa fa-book"></i> <span>Change Password</span></a></li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
