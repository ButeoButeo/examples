<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mia's Web Store | Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/signin.css" rel="stylesheet">
  </head>

  <body>
	<img alt="full screen background image" src="<?php echo base_url(); ?>assets/images/admin.jpg" id="full-screen-background-image" />
    <div class="container">
		<?php $attributes = array(
								'class' => 'form-signin'
							); 
		?>
		<?php echo form_open('admin/authenticate/login',$attributes); ?>
			<h2 class="form-signin-heading">Mia's Web Store</h2>
			<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
			<?php if($this->session->flashdata('fail_login')) : ?>
				<?php echo '<p class="alert alert-dismissable alert-danger">' .$this->session->flashdata('fail_login') . '</p>'; ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('access_denied')) : ?>
				<?php echo '<p class="alert alert-dismissable alert-danger">' .$this->session->flashdata('access_denied') . '</p>'; //Access denied ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('logged_out')) : ?>
				<?php echo '<p class="alert alert-dismissable alert-success">' .$this->session->flashdata('logged_out') . '</p>'; ?>
			<?php endif; ?>
			
			<?php 
        $data = array(
        		'name'        => 'username',
        		'class'          => 'form-control',
        		'placeholder'       => 'Username'
        );
        
        echo form_input($data);
    ?>
    <?php 
        $data = array(
        		'name'        => 'password',
        		'class'          => 'form-control',
        		'placeholder'       => 'Password'
        );
        
        echo form_password($data);
    ?>       
    <?php 
        $data = array(
        		'class'          => 'btn btn-lg btn-primary btn-block',
				'content'       => 'Login',
        		'placeholder'       => 'Password',
				'type'       => 'submit',
        );
        echo form_button($data);
    ?>
		<?php echo form_close(); ?>
    </div> <!-- /container -->

  </body>
</html>