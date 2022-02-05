<!DOCTYPE html>
<html>
    <head>
        <title>Gravity | Business Services</title>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url(); ?>assets/frontend/css/animate.css" rel="stylesheet">
      	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/frontend/image/icon.jpg" />
        <link href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.min.css" rel="stylesheet">
         <link href="<?php echo base_url(); ?>assets/frontend/css/main.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/frontend/css/owl.carousel.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/frontend/css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/font-awesome.css">
        
<script src="<?php echo base_url(); ?>assets/frontend/js/jquery-1.11.3.min.js"></script>
        <style>
  body{overflow-x:hidden}
        </style>
    </head>
<body>
<body>
<?php //print_r(($this->session->userdata['front_user_logged_in']));?>
        <div id="header">
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-5 col-xs-12">
                            <ul class="top-menu">
                                <li><a href="<?php echo base_url(); ?>page/aboutus">About Us</a></li>
                                <li><a href="" data-toggle="modal" data-target="#refer">Refer a Friend</a></li>
                                <li><a href="<?php echo base_url(); ?>page/contact">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-md-9 col-sm-7 col-xs-12">
                            <ul class="top-info">
                                <li class="top-help"><a href="<?php echo base_url(); ?>page/help"> Help</a></li>
                                <li class="top-mobile"><a href="wishlist.php"><i class="fa fa-heart-o"></i> Wish List</a></li>
                                 <li class="top-mobile"><a href="myorder.php"><i class="fa fa-map-marker"></i> Track Order</a></li>
								<?php if(isset($this->session->userdata['front_user_logged_in'])) {?>
								<li class="top-account has-child ">
                                    <a href="">My Account</a>
                                    <ul class="sub-menu-top">
                                        <li><a href="<?php echo base_url(); ?>myprofile.php"><i class="fa fa-user"></i> My Profile</a></li>
                                        <li><a href="<?php echo base_url(); ?>myorder.php"><i class="fa fa-list-alt"></i> My Order</a></li>
                                        <li><a href="<?php echo base_url(); ?>users/log_out"><i class="fa fa-sign-in"></i> Logout</a></li>
                                    </ul>
                                </li>
								<?php }else{ ?>
                                <li class="top-mobile hidden-sm"><a href="<?php echo base_url(); ?>users/login">Sign In</a></li>
                                <li class="top-mobile hidden"><a href="<?php echo base_url(); ?>users/register">Sign Up</a></li>
								<?php } ?>
                                <li class="top-mobile hidden-lg hidden-md hidden-sm "><a href="my_cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top Header -->
            <div class="header">
                <div class="container">
                    <div class="header-main">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="logo">
                                    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/frontend/image/logo1.jpg" width="225" alt=""></a>
                                </div>
                            </div>

                            <div class="col-md-7 col-sm-8 col-xs-12 ">
                                <div class="smart-search">
                                    <form class="smart-search-form">
                                        <input type="text"  placeholder="I am shopping for..." >
                                        <input type="submit" value="">
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-4 col-xs-12 hidden-xs">
                                <div class="mini-cart">
                                    <a href="my_cart.php" class="header-mini-cart">
                                        <span class="total-mini-cart-item">0 Item(s) - </span>
                                        <span class="total-mini-cart-price"><i class="fa fa-rupee"></i>0.00</span>
                                    </a>
                                </div>
                                <!-- End Mini Cart -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->
		<div class="header-nav">
            <div class="">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12  mobilepadding">
                        <div class="category-dropdown hidden-category-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <h2 class="title-category-dropdown"><span>Categories</span></h2></a> 
                            <ul class="dropdown-menu">
                                <li><div class="wrap-category-dropdown" style="display: block;">
                                    <ul class="list-category-dropdown ">
                                        <li class="has-cat-mega">
                                            <a href="#">Clothing<img src="<?php echo base_url(); ?>assets/frontend/image/cart/cat4.png" alt=""></a>
                                            <div class="cat-mega-menu cat-mega-style1 hidden-xs hidden-sm">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4">
                                                        <div class="list-cat-mega-menu">
                                                            <h2 class="title-cat-mega-menu"><a href="sub_categories.php">Men</a></h2>
                                                            <ul>
                                                                <li><a href="#">Dresses</a></li>
                                                                <li><a href="#">Coats &amp; Jackets</a></li>
                                                                <li><a href="#">Blouses &amp; Shirts</a></li>
                                                                <li><a href="#">Tops &amp; Tees</a></li>
                                                                <li><a href="#">Hoodies &amp; Sweatshirts</a></li>
                                                                <li><a href="#">Intimates</a></li>
                                                                <li><a href="#">Swimwear</a></li>
                                                                <li><a href="#">Pants &amp; Capris</a></li>
                                                                <li><a href="#">Sweaters</a></li>
                                                                <li><a href="#">Accessories</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4">
                                                        <div class="list-cat-mega-menu">
                                                            <h2 class="title-cat-mega-menu"><a href="sub_categories.php"> Women</a></h2>
                                                            <ul>
                                                                <li><a href="#">Tops &amp; Tees</a></li>
                                                                <li><a href="#">Coats &amp; Jackets</a></li>
                                                                <li><a href="#">Underwear</a></li>
                                                                <li><a href="#">Shirts</a></li>
                                                                <li><a href="#">Hoodies &amp; Sweatshirts</a></li>
                                                                <li><a href="#">Jeans</a></li>
                                                                <li><a href="#">Pants</a></li>
                                                                <li><a href="#">Suits &amp; Blazer</a></li>
                                                                <li><a href="#">Shorts</a></li>
                                                                <li><a href="#">Accessories</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6">
                                                        <div class="list-cat-mega-menu">
                                                            <h2 class="title-cat-mega-menu"><a href="sub_categories.php"> Children/Kids</a></h2>
                                                            <ul>
                                                                <li><a href="#">Dresses</a></li>
                                                                <li><a href="#">Coats &amp; Jackets</a></li>
                                                                <li><a href="#">Blouses &amp; Shirts</a></li>
                                                                <li><a href="#">Tops &amp; Tees</a></li>
                                                                
                                                            </ul>
                                                             <h2 class="title-cat-mega-menu"><a href="sub_categories.php"> Handicraft</a></h2>
                                                            <ul>
                                                                <li><a href="#">Handmade</a></li>
                                                                <li><a href="#">Example</a></li>
                                                                <li><a href="#">Example</a></li>
                                                                <li><a href="#">Tops &amp; Tees</a></li>
                                                               
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </li>
                                        <li class="has-cat-mega">
                                            <a href="#">Home Appliances<img src="<?php echo base_url(); ?>assets/frontend/image/cart/cat2.png" alt=""></a>
                                            <!--<div class="cat-mega-menu cat-mega-style2 hidden-xs hidden-sm">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-3">
                                                        <div class="list-cat-mega-menu">
                                                <h2 class="title-cat-mega-menu">Special products</h2>
                                               
                                                  
                                                    </div>
                                            </div>
                                            <div class="col-md-4 col-sm-3">
                                                        <div class="list-cat-mega-menu">
                                                <h2 class="title-cat-mega-menu">Special products</h2>
                                               
                                                  
                                                    </div>
                                            </div>
                                                </div>
                                            </div>-->
                                        </li>
                                        <li class="has-cat-mega">
                                            <a href="#">Food Products<img src="<?php echo base_url(); ?>assets/frontend/image/cart/cat7.png" alt=""></a>
                                            <div class="cat-mega-menu cat-mega-style2 hidden-xs hidden-sm">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-3">
                                                        <div class="list-cat-mega-menu">
                                                <h2 class="title-cat-mega-menu">Ready to Eat</h2>
                                               <ul>
                                                                <li><a href="#">Example</a></li>
                                                              <li><a href="#">Example</a></li>
                                                               <li><a href="#">Example</a></li>
                                                                <li><a href="#">Example</a></li>
                                                                 <li><a href="#">Example</a></li>
                                                              <li><a href="#">Example</a></li>
                                                            </ul>
                                                  
                                                    </div>
                                            </div>
                                            <div class="col-md-4 col-sm-3">
                                                        <div class="list-cat-mega-menu">
                                                <h2 class="title-cat-mega-menu">Spices</h2>
                                               <ul>
                                                                <li><a href="#">Example</a></li>
                                                              <li><a href="#">Example</a></li>
                                                               <li><a href="#">Example</a></li>
                                                                <li><a href="#">Example</a></li>
                                                                 <li><a href="#">Example</a></li>
                                                              <li><a href="#">Example</a></li>
                                                            </ul>
                                                  
                                                    </div>
                                            </div>
                                                </div>
                                            </div>
                                        </li>
                                          <li class="has-cat-mega">
                                            <a href="#">Women's Fashion<img src="<?php echo base_url(); ?>assets/frontend/image/cart/cat4.png" alt=""></a>
                                            <div class="cat-mega-menu cat-mega-style1 hidden-xs hidden-sm">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-3">
                                                        <div class="list-cat-mega-menu">
                                                            <h2 class="title-cat-mega-menu"><a href="sub_categories.php">Jewellery</a></h2>
                                                            <ul>
                                                                <li><a href="#">Dresses</a></li>
                                                                <li><a href="#">Coats &amp; Jackets</a></li>
                                                                <li><a href="#">Blouses &amp; Shirts</a></li>
                                                                <li><a href="#">Tops &amp; Tees</a></li>
                                                                <li><a href="#">Hoodies &amp; Sweatshirts</a></li>
                                                                <li><a href="#">Intimates</a></li>
                                                                <li><a href="#">Swimwear</a></li>
                                                                <li><a href="#">Pants &amp; Capris</a></li>
                                                                <li><a href="#">Sweaters</a></li>
                                                                <li><a href="#">Accessories</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-3">
                                                        <div class="list-cat-mega-menu">
                                                            <h2 class="title-cat-mega-menu"><a href="sub_categories.php"> Accessories</a></h2>
                                                            <ul>
                                                                <li><a href="#">Tops &amp; Tees</a></li>
                                                                <li><a href="#">Coats &amp; Jackets</a></li>
                                                                <li><a href="#">Underwear</a></li>
                                                                <li><a href="#">Shirts</a></li>
                                                                <li><a href="#">Hoodies &amp; Sweatshirts</a></li>
                                                                <li><a href="#">Jeans</a></li>
                                                                <li><a href="#">Pants</a></li>
                                                                <li><a href="#">Suits &amp; Blazer</a></li>
                                                                <li><a href="#">Shorts</a></li>
                                                                <li><a href="#">Accessories</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-3">
                                                        <div class="list-cat-mega-menu">
                                                            <h2 class="title-cat-mega-menu"><a href="sub_categories.php">Cosmetics</a></h2>
                                                            <ul>
                                                                <li><a href="#">Dresses</a></li>
                                                                <li><a href="#">Coats &amp; Jackets</a></li>
                                                                <li><a href="#">Blouses &amp; Shirts</a></li>
                                                                <li><a href="#">Tops &amp; Tees</a></li>
                                                                
                                                            </ul>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </li>
                                        <li  class="has-cat-mega">
                                            <a href="#">Travel<img src="<?php echo base_url(); ?>assets/frontend/image/cart/cat8.png" alt=""></a>
                                            <div class="cat-mega-menu cat-mega-style1 hidden-xs hidden-sm">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-3">
                                                        <div class="list-cat-mega-menu">
                                                            <h2 class="title-cat-mega-menu"><a href="sub_categories.php">Travel Accessories</a></h2>
                                                            <ul>
                                                                <li><a href="#">Example</a></li>
                                                              <li><a href="#">Example</a></li>
                                                               <li><a href="#">Example</a></li>
                                                                <li><a href="#">Example</a></li>
                                                                 <li><a href="#">Example</a></li>
                                                              <li><a href="#">Example</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-3">
                                                        <div class="list-cat-mega-menu">
                                                            <h2 class="title-cat-mega-menu"><a href="sub_categories.php">Travel Packages</a></h2>
                                                            <ul>
                                                                <li><a href="#">Within India</a></li>
                                                              <li><a href="#">Outside India</a></li>
                                                             
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </li>
                                        
                                    </ul>
                                   <!-- <a href="#" class="expand-category-link"></a>-->
                                </div>
                                </li>   
                            </ul>
                        </div>
                        <!-- End Category Dropdown -->
                    </div>
                    <div class="col-md-9 col-sm-8 col-xs-6 mobilepadding" style="padding-right: 0;">
                        <nav class="main-nav">
                            <ul>
                                <li class="menu-item-has-children">
                                    <a href="<?php echo base_url(); ?>">home</a>
                                </li>
                                <li class="has-mega-menu">
                                    <a href="sub_categories.php">Womens</a>
                                </li>
                                <li class="has-mega-menu">
                                    <a href="sub_categories.php">Mens</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="sub_categories.php">Kids</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="sub_categories.php">Electronis</a>
                                </li>
                                <li class="hidden-sm"><a href="sub_categories.php">Sports</a></li>
                                <li class="hidden-sm"><a href="sub_categories.php">Food Products</a></li>
                            </ul>
                        </nav>
                        <!--                                         End Main Nav -->
                    </div>
                </div>
            </div>
        </div><!-----End Header Nav------>
       
       
      <!-- Modal -->
<div id="refer" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modelhead">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Refer A Friend</h4>
      </div>
      <div class="modal-body">
        <p>Enter your friend email address </p>
              <form>
                            <!-- Form start -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
<!--                                        <label class="control-label" for="name">Name</label>-->
                                        <input id="name" name="name" type="text" placeholder="Enter Name" class="form-control input-md">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                       <!-- <label class="control-label" for="email">Email</label>-->
                                        <input id="email" name="email" type="text" placeholder="Enter E-Mail" class="form-control input-md">
                                    </div>
                                </div>
                            </div>
              </form>
                        <a href="<?php echo base_url(); ?>" > <button type="button" class="btn-upper btn btn-primary">Submit</button></a>
      </div>
      
    </div>

  </div>
</div>



<!-- Modal -->
<div id="fpassword" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modelhead">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">FORGOT PASSWORD?</h4>
      </div>
      <div class="modal-body">
        <p>Enter your email address and we will send you a link to reset your password.</p>
                                    <label class="info-title col-md-12" for="exampleInputPassword1">Email <span>*</span></label>
                                   <div class="col-md-8"> 
                                    <input type="text" class="form-control unicase-form-control text-input" style="border-radius: 0" id="exampleInputPassword1" placeholder="Enter email"></div><br>
                                    
                        <a href="<?php echo base_url(); ?>" > <button type="button" class="btn-upper btn btn-primary">Submit</button></a>
      </div>
      
    </div>

  </div>
</div>