
<div class="row order_box" style="margin-bottom: 0px; ">
    <section class="col-md-12">
        <div class="col-md-10 col-md-offset-1">
            <div class="" style="padding: 0">
                <div class="tab-content">
                    <div class="contact">
                        <div class="container">
                            <h3>Contact Us</h3>
                            <div class="col-md-3 col-sm-3 text-left">
                                <div class="address">
                                    <h4>ADDRESS</h4>
                                    <h5>345 Hadapsar,</h5>
                                    <h5>Pune. 411 028.</h5>
                                </div>
                                <div class="phone">
                                    <h4>PHONE</h4>
                                    <h5>+91 401 123 4567.</h5>
                                    <h5>+91 804 426 1150.</h5>
                                </div>
                                <div class="email">
                                    <h4>EMAIL</h4>
                                    <h5><a href="mailto:info@example.com">example@gmail.com</a></h5>
                                    <h5><a href="mailto:info@example.com">example2@yahoo.com</a></h5>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-9 text-right">
                                <form action="<?= base_url()?>/users/send_contact" method="post">
                                    <div class="col-md-12">
                                        <div class="col-md-6"><input type="text" name="name" placeholder="Your name" required></div>
                                        <div class="col-md-6"><input type="text"  pattern="[A-Za-z0-9._%+-]{3,}@[a-zA-Z]{3,}([.]{1}[a-zA-Z]{2,}|[.]{1}[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,})" name="email" placeholder="Your email" required></div>
                                        <div class="col-md-6"><input type="text" name="subject" placeholder="Your subject" required></div>
                                        <div class="col-md-6"><input type="text" name="phonenumber" pattern="[0-9]{10}" placeholder="Phone number" required></div>
                                        <div class="col-md-12"><textarea name="message" placeholder="Your message" required></textarea></div>
                                        <div class="col-md-12">
                                            <input type="submit" value="Send message" class=" btn blue_btn btn_effect">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="col-md-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60539.19735398106!2d73.90439916317791!3d18.497250780046034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2e9ff81f1aae9%3A0x2560343555ac8b53!2sHadapsar%2C+Pune%2C+Maharashtra!5e0!3m2!1sen!2sin!4v1496206106138" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>