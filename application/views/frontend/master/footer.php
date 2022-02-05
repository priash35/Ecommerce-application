<!--<div class="footer-newsletter">
                <div class="container">
                        <div class="row">
                                <div class="col-xs-12 col-sm-7">
                                        <h5 class="newsletter-title">Sign up to Newsletter</h5>
                                        <span class="newsletter-marketing-text">...and receive <strong>$20 coupon for first shopping</strong></span>
                                </div>
                                <div class="col-xs-12 col-sm-5">
                                        <form>
                                                <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Enter your email address">
                                                        <span class="input-group-btn">
                                                                <button class="btn btn-secondary" type="button">Sign Up</button>
                                                        </span>
                                                </div>
                                        </form>
                                </div>
                        </div>
                </div>
        </div>-->
<footer id="footer" class="footer color-bg">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-5">
                    <div class="module-heading">
                        <h4 class="module-title">Contact Us</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class="toggle-footer" style="">
                            <li class="media">
                                <div class="pull-left">
                                    <span class="icon fa-stack fa-lg">
                                        <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <p>345 Hadapsar, Pune. 411 028.</p>
                                </div>
                            </li>

                            <li class="media">
                                <div class="pull-left">
                                    <span class="icon fa-stack fa-lg">
                                        <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <p>+(888) 123-4567<br>+(888) 456-7890</p>
                                </div>
                            </li>

                            <li class="media">
                                <div class="pull-left">
                                    <span class="icon fa-stack fa-lg">
                                        <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <p>abc@gmail.com</p>
                                    <p> <a href="<?php echo base_url(); ?>cms/cmsPages" style="line-height: 0;margin-left: 0;">Contact Us</a></p>
                                </div>
                            </li>
                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="module-heading">
                        <h4 class="module-title">Customer Service</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class="list-unstyled">

                            <li class="first"><a href="<?php echo base_url(); ?>users/edit_user" title="My Account">My Account</a></li>
                            <li><a href="<?php echo base_url(); ?>users/orderDetails" title="Order History">Order History</a></li>
                            <li><a href="<?php echo base_url(); ?>cmspages/FAQ" title="faq">FAQ</a></li>
                            <li class="last"><a href="<?php echo base_url(); ?>cmspages/Help" title="Help Center">Help Center</a></li>
                            <li class="last"><a href="myorder.php" title="Track order">Track Order</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->


                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">About Us</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class="list-unstyled">
                            <!-- <li class="first"><a href="myorder.php" title="Track Order">Track Order</a></li>-->
                            <li><a href="" title="Company">Gravity BS</a></li>
                            <li><a href="<?php echo base_url(); ?>cmspages/AboutUs" title="About Company">About </a></li>
                            <li><a href="<?php echo base_url(); ?>cmspages/Testimonials" title="Testimonials">Testimonials</a></li>
                            <!--                            <li class=" last"><a href="contactus.php" title="Suppliers">Contact Us</a></li>-->
                        </ul>
                    </div><!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-7 col-sm-6 no-padding social">
                <ul class="link">
                    <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
                    <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
                    <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
                    <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
                </ul>
            </div>
            <div class="col-xs-5 col-sm-6 no-padding">
                <div class="clearfix payment-methods">
                    <ul>
                       <!-- <li><img src="assets/frontend/image/paypal.png" alt=""></li>-->
                        <li><img src="<?php echo base_url(); ?>assets/frontend/image/visa.png" alt=""></li>
                        <li><img src="<?php echo base_url(); ?>assets/frontend/image/maestro.png" alt=""></li>

                    </ul>
                </div><!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>

<!--  start filter Modal -->
<div id="filter" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modelhead">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Filter By</h4>
            </div>
            <div class="modal-body">
                <div class="filter_box">
                    <div class="price ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" href="#pricem">
                                    Price
                                </a>
                            </h4>
                        </div>
                        <div id="pricem" class="panel-collapse collapse in" >
                            <ul>
                                <li>
                                    <p>Enter Price Range</p>
                                    <div class="price-range ">
                                        <input class="input-sm" type="number"><label style="margin-left: 1px"> -</label>
                                        <input class="input-sm" type="number">
                                        <button class="input-sm">GO</button>
                                        <!--                                <button class="btn btn-primary btn-small apply-price action-btn-orange">GO</button>-->
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="brand">
                        <div class="panel-heading " >
                            <h4 class="panel-title">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" href="#brandm">
                                    Brand
                                </a>
                            </h4>
                        </div>
                        <div id="brandm" class="panel-collapse collapse " >
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">
                                            citroen
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox" >
                                        <label>
                                            <input type="checkbox" value="">
                                            benz
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox"  >
                                        <label>
                                            <input type="checkbox" value="">
                                            bmw
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="color">
                        <div class="panel-heading" >
                            <h4 class="panel-title">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" href="#colorm">
                                    Color</a>
                            </h4>
                        </div>
                        <div id="colorm" class="panel-collapse collapse">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value=""><div class="colorbox" style="background: red;"> </div> Red</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox" >
                                        <label>
                                            <input type="checkbox" value=""><div class="colorbox" style="background: blue;"> </div>
                                            Blue
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox"  >
                                        <label>
                                            <input type="checkbox" value=""><div class="colorbox" style="background: green;"> </div>
                                            Green
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="offers">
                        <div class="panel-heading" >
                            <h4 class="panel-title">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" href="#offerm">
                                    Offers</a>
                            </h4>
                        </div>
                        <div id="offerm" class="panel-collapse collapse">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">Get 10% off, Use code: BEST100
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox" >
                                        <label>
                                            <input type="checkbox" value="">Get 20% off,Use code: SHOP200
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">Get 10% off, Use code: EXTRA100
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div><div class="col-md-12 text-right">

                    <a href="<?php echo base_url(); ?>" > <button type="button" class="btn-upper btn btn-primary">Submit</button></a>
                </div>
            </div>

        </div>

    </div>
</div>
<!--end filter Modal -->


<script> 
   
<?php if ($this->session->flashdata('success')) { ?>
        setTimeout(function () {
            $.toaster('<?= $this->session->flashdata('success'); ?>', 'Success', 'success');
        }, 1000);

<?php } ?>
<?php if ($this->session->flashdata('error')) { ?>
        setTimeout(function () {
            $.toaster('<?php echo $this->session->flashdata('error'); ?>', 'Error', 'danger');
        }, 1000);

<?php } ?>
</script>
<script>


    $('i.fav').click(function () {
        $(this).toggleClass('fa-heart fa-heart-o');
		
    });
	
    function setColor(e, btn, color, pro_id) {
        var target = e.target,
        count = +target.dataset.count;

        target.style.color = count === 1 ? "black" : '#ff4f19';
        target.dataset.count = count === 1 ? 0 : 1;
       
        var col = color;
        var pid = pro_id;
       
        $.ajax({ 
             type: 'post', 
            url:"<?php echo base_url();?>Wishlist/add",  
            data: {pid:pid, col:col},

            //data:  {id:$(this).val()},                 
           // type: "POST",  
             success: function(result) { //we got the response
             alert('Successfully called');
             },
             error: function(jqxhr, status, exception) {
                 alert('Exception:', exception);
             }
      });  

    }


    $(document).ready(function () {
        var owl = $("#owl-demo");
        owl.owlCarousel({
            autoPlay: 3500,
            items: 4, //10 items above 1000px browser width
            itemsDesktop: [1000, 4], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 3], // 3 items betweem 900px and 601px
            itemsTablet: [600, 2], //2 items between 600 and 0;
            itemsMobile: [400, 1], // itemsMobile disabled - inherit from itemsTablet option
            pagination: false
        });
        $(".next").click(function () {
            owl.trigger('owl.next');
        })
        $(".prev").click(function () {
            owl.trigger('owl.prev');
        })
    });
    $(document).ready(function () {
        var owl = $("#owl-demo1");
        owl.owlCarousel({
            autoPlay: 3500,
            items: 4, //10 items above 1000px browser width
            itemsDesktop: [1000, 4], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 3], // 3 items betweem 900px and 601px
            itemsTablet: [600, 2], //2 items between 600 and 0;
            itemsMobile: [400, 1], // itemsMobile disabled - inherit from itemsTablet option
            pagination: false
        });
        $(".next1").click(function () {
            owl.trigger('owl.next');
        })
        $(".prev1").click(function () {
            owl.trigger('owl.prev');
        })
    });

</script>
<!-- jQuery library -->


<!-- Latest compiled JavaScript -->
<script src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/owl.carousel.min.js"></script>
</body>
</html>
