<div class="container marketing">
	 <hr class="featurette-divider">
		  

	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-heading panel-heading-green">
				<h3 class="panel-title">Contact Us</h3>
			</div>
			<?php echo $map['js']; ?>			
		<div class="panel-body">

			<div class="contact-image">
			  <img src = "<?php echo base_url(); ?>assets/images/contact.jpg" />
			</div>
				
			<div class="row">
			 <div class="contact-details">
				<div class="col-md-4" id="contact">
				  <img src = "<?php echo base_url(); ?>assets/images/reach_us1.jpg" style="height:35px;"/>
				  <hr>
				  <p>Please use the contact form on the right side if you have any questions conserning our servis.</p><br>
				  <p>We will respond to your message within 24 hours.</p><br>
				  <p>Below you can find a map of our manufacture:</p><br>
				  <?php echo $map['html']; ?>
				</div>

				<div class="col-md-4" id="contact">
				<img src = "<?php echo base_url(); ?>assets/images/general1.jpg" style="height:35px;" />
				<hr>
					<h4>Location:</h4>
					<p>Address: 100 2nd Avenue</p>
					<p>City: Seattle 500</p>
					<p>State: Seattle, WA 98 101</p>
					<hr>
					<h4>Contact Details:</h4>
					<p>Phone Numbers: <ul><li>+381 (0)11 4 100 2020</li><li>+381 (0)11 4 100 2520</li><li>+381 (0)11 4 100 2009</li></ul></p>
					<p>Email: <span><a style="color:#DFCBBC" target href="mailto:mianjegovan@gmail.com">mianjegovan@gmail.com</a></span></p>
					<p>Skype: WA 98 101</p>
					<hr>
					<h4>On The Web:</h4>
					<p><a style="color:#DFCBBC" href="#">Facebook</a></p>
					<p><a style="color:#DFCBBC" href="#">LinkedIn</a></p>
					<p><a style="color:#DFCBBC" href="#">Twiter</a></p>
					<hr>
				</div>
				<div class = "col-md-4" id="contact">
				<img src = "<?php echo base_url(); ?>assets/images/mail_us1.jpg" style="height:35px;" />
				<hr>
				  <div class="cart-block">
				  
				    <?php echo validation_errors('<div class = "alert alert-danger">','</div>'); ?>
				  
				   <form role="form" method="post" action="<?php echo base_url(); ?>shop/send_email" id="contactform">
				      <?php if ($this->session->flashdata('pass_message')) : ?>
						<div class="alert alert-success">
						  <?php echo $this->session->flashdata('pass_message'); ?>
						</div>
					  <?php endif; ?>
					  <fieldset>
						<h3><img src = "<?php echo base_url(); ?>assets/images/contact1.jpg"  style="width:325px" /></h3>
						
						<div class="form-group">
						  <label for="name">How Shall We Call You?<span class="help-required">*</span></label>
						  <input type="text" name="contactname" id="contactname" placeholder="Type your name here" value="<?php echo set_value('contactname'); ?>" class="form-control required" role="input" />
						</div>
						
						<div class="form-group">
							<label for="email">Share Your Email<span class="help-required">*</span></label>
							<input type="text" name="email" id="email" placeholder="Type your email address" value="<?php echo set_value('email'); ?>" class="form-control required email" role="input" />
						</div>
					  
						<div class="form-group">
						  <label for="subject">Subject<span class="help-required">*</span></label>
						  <select name="subject" id="subject" class="form-control required" role="select" >
							<option></option>
							<option>One</option>
							<option>Two</option>
							<option>Three</option>
						  </select>
						</div>
					  
						<div class="form-group">
						  <label for="message">Message<span class="help-required">*</span></label>
						  <textarea rows="5" name="message" id="message" class="form-control required" role="textbox" ></textarea>
						</div>
					  
						<div class="actions">
						  <input type="submit" value="Send Your Message" name="submit" id="submitButton" class="btn btn-primary" />
						  <input type="reset" value="Clear Form" class="btn btn-danger" />
						</div>
					  </fieldset>
				   </form>
				  </div>
				</div>
			  </div>
			</div>
		
		</div>