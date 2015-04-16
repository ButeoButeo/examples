<!--Display form validation errors-->
    <?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
	<form method="post" action="<?php echo base_url(); ?>admin/contact/edit/<?php echo $contact->id; ?>" accept-charset="utf-8" enctype="multipart/form-data">
		<div class="row">
		  <div class="col-md-6">
			<h1>Edit Contact Detail</h1>
		  </div>
			<div class="col-md-6">
				<div class="btn-group pull-right">
					<input type="submit" name="submit" class="btn btn-default" value="Save" />
					<a href="<?php echo base_url(); ?>admin/contact" class="btn btn-default">Close</a>
			</div>
		  </div>
		</div><!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<ol class="breadcrumb">
			  <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			  <li><a href="<?php echo base_url(); ?>admin/contact"><i class="fa fa-pencil"></i> Contact</a></li>
			  <li class="active"><i class="fa fa-plus-square-o"></i> Edit contact</li>
			</ol>
			</div>  
		</div><!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="form-group">
					<?php if (($contact->id) == 7) : ?>
						<label>Image</label>
						<input class="form-control" type="file" name="userfile" value="<?php echo set_value('value'); ?>" />
					<?php else : ?>
						<label><?php echo $contact->key; ?></label>
						<input class="form-control" type="text" name="value" value="<?php echo $contact->value; ?>" />
					<?php endif; ?>
				</div>				
			</div>
		</div><!-- /.row -->
	</form>