
<!-- Middle Section Start -->
<section class="middleSection cmsSection">
	<div class="container">
		<div class="contactusSection">
			<h2 class="heading clearfix">
				<span>Register Here</span>
			</h2>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="smallHeading">Register Form</div>
					<form class="contactForm" id="register_form" action="<?=base_url()?>users/register" method="post">
						<div class="form-group">
							<label for="exampleInputEmail1">First name</label>
							<input type="text" id="first_name" name="first_name" class="form-control" id="" placeholder="" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Last name</label>
							<input type="text" id="last_name" name="last_name" class="form-control" id="" placeholder="">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Password</label>
							<input type="password" id="password" name="password" class="form-control" id="" placeholder="" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" id="email" name="email" class="form-control" id="" placeholder="" required>
							<span class="email"></span>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Phone</label>
							<input type="text" id="contact" name="contact" class="form-control" id="" placeholder="" required>
							<span class="contact"></span>
						</div>
						<button type="submit" class="btn purpleBtn">Submit</button>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</section>
<!-- Middle Section End -->
