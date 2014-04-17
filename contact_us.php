<?php
	session_start();
	$pageTitle = 'ContactUs';
	include ('v-templates/header.php');
?>

<!-- body starts here -->
<div id="profile_body_outline">
	
    <!-- div for showing success message--->
	<div class="alert alert-success" id="success_msg"></div>
	<!-- div for showing warning message--->
	<div class="alert alert-danger" id="warning_msg"></div>
    

	<div class="container">
	<!-- sign up box starts here -->
		<div class="row">
		<div class="col-md-8">
			<h2 class="post_project_top_heading">CONTACT US</h2>
		</div>
		<div class="col-md-4"></div>
		</div>
		<div class="row background-custom">
		<div class="col-md-8">
			<div class="contact-box">
				<div class="col-md-12">
					<div class="col-md-12">
						<h4 class="contact-txt">lorem ipsum lorem ipsum lorem ipsum lorem ipsum </h4>
					</div>
					<div class="clearfix"></div>
					<hr>
					
				</div>
				
				<div class="clearfix"></div>
					<div class="col-md-12">
					<div class="col-md-12">
					<h4 class="login-txt"></h4>
					</div>
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<form class="form-horizontal" role="form">
						  <div class="form-group">
							<label class="col-sm-3 control-label custom-chk2">Name</label>
							<div class="col-sm-9">
							  <input type="email" class="form-control custom-width" id="inputEmail3" placeholder="Your name please">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-3 control-label custom-chk2">Phone Number </label>
							<div class="col-sm-9">
							  <input type="password" class="form-control custom-width" id="inputPassword3" placeholder="So that we can contact you ">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-3 control-label custom-chk2">Email </label>
							<div class="col-sm-9">
							  <input type="password" class="form-control custom-width" id="inputPassword3" placeholder="So that we can send you an email">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-3 control-label custom-chk2">Title</label>
							<div class="col-sm-9">
							  <input type="email" class="form-control custom-width" id="inputEmail3" placeholder="Title of the query">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-3 control-label custom-chk2">Subject</label>
							<div class="col-sm-9">
							  <input type="email" class="form-control custom-width" id="inputEmail3" placeholder="Subject of the query">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-3 control-label custom-chk2">Your message</label>
							<div class="col-sm-9">
								 <textarea class="form-control" rows="3"></textarea>
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
							  <button type="submit" name="sign-up" class="btn btn-lg btn-primary">Send</button>
							</div>
						  </div>
					</form>
						<div class="col-sm-offset-3 alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						Your message has been successfully sent to us.We will reply you soon.</div>
							<div class="col-sm-offset-3 alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							You have left an empty field.Please fill it up for success.</div>

					</div>
					<div class="col-md-1"></div>
					<div class="clearfix"></div>
				
			</div>
			</div>
		
		<!-- sign up box ends here -->
		<!-- log in box starts here -->
		<div class="col-md-3">
			<div class="contact-box address-part">
			<h3>Our Address</h3>
			<hr>
			<p><span class="glyphicon glyphicon-envelope"></span> +123456789</p>
			<p><span class="glyphicon glyphicon-envelope"></span> support@cygna.com</p>
			<div class="queries-top">
					<div class="panel-group" id="accordion">
					  <div class="panel panel-info">
					    <div class="panel-heading">
					      <h4 class="panel-title panel-txt">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
						  For top queries please click here!
						</a>
					      </h4>
					    </div>
					    <div id="collapseOne" class="panel-collapse collapse">
					      <div class="panel-body">
					<a href="#"><p>For top queries please click here!</p></a>
					<a href="#"><p>For top queries please click here!</p></a>
					<a href="#"><p>For top queries please click here!</p></a>
					<a href="#"><p>For top queries please click here!</p></a>
					<a href="#"><p>For top queries please click here!</p></a>
					<a href="#"><p>For top queries please click here!</p></a>
					<a href="#"><p>For top queries please click here!</p></a>
					<a href="#"><p>For top queries please click here!</p></a>
					<a href="#"><p>For top queries please click here!</p></a>
					<a href="#"><p>For top queries please click here!</p></a>
					 </div>
					    </div>
					  </div>
			</div>
			<div class="clearfix"></div>

			</div>
		</div>
		<div class="col-md-1"></div>
		<!-- log in box ends here -->
		</div>
	</div>
</div>

<!-- body ends here -->
<?php
	include 'v-templates/footer.php';
?>
