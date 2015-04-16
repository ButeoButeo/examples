<!--Display form validation errors-->
<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<form method="post" action="<?php echo base_url(); ?>admin/admins/edit/<?php echo $admin->id; ?>">
				  <div class="row">
				  <div class="col-md-6">
					<h1>Edit Admin</h1>
				  </div>
					<div class="col-md-6">
						<div class="btn-group pull-right">
							<input type="submit" name="submit" id="page_submit" class="btn btn-default" value="Save" />
							<a href="<?php echo base_url(); ?>admin/admins" class="btn btn-default">Close</a>
					</div>
				  </div>
				</div><!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
					  <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				  		<li><a href="<?php echo base_url(); ?>admin/admins"><i class="fa fa-pencil"></i> Admins</a></li>
				  		<li class="active"><i class="fa fa-plus-square-o"></i> Edit Admin</li>
					</ol>
					</div>  
				</div><!-- /.row -->
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>First Name</label>
								<input class="form-control" type="text" name="first_name" value="<?php echo $admin->first_name; ?>" placeholder="Enter First Name" />
							</div>
							<div class="form-group">
								<label>Last Name</label>
								<input class="form-control" type="text" name="last_name" value="<?php echo $admin->last_name; ?>" placeholder="Enter Last Name" />
							</div>	
							<div class="form-group">
								<label>Email Address</label>
								<input class="form-control" type="email" name="email" value="<?php echo $admin->email; ?>" placeholder="Enter Email" />
							</div>	
							<div class="form-group">
								<label>Username</label>
								<input class="form-control" type="text" name="username" value="<?php echo $admin->username; ?>" placeholder="Enter Username" />
							</div> 
					</div><!-- /.row -->
			</form>