<!--Display form validation errors-->
<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<?php echo $error; ?>
	<form action="<?php echo base_url(); ?>admin/about/add" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	  <div class="row">
	  <div class="col-lg-6">
		<h1>Add About</h1>
	  </div>
		<div class="col-lg-6">
			<div class="btn-group pull-right">
				<input type="submit" name="submit" class="btn btn-default" value="Save" />
				<a href="<?php echo base_url(); ?>admin/about" class="btn btn-default">Close</a>
		</div>
	  </div>
	</div><!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
		  		<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  		<li><a href="<?php echo base_url(); ?>admin/about"><i class="fa fa-pencil"></i> About</a></li>
		  		<li class="active"><i class="fa fa-plus-square-o"></i> Add About</li>
			</ol>
		</div>  
	</div><!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="form-group">
					<label>Title</label>
					<input class="form-control" type="text" name="title" value="<?php echo set_value('title'); ?>" placeholder="Enter About Title" />
				</div>	
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="description" rows="10"><?php echo set_value('description'); ?></textarea>
				</div>					
				<div class="form-group">
					<label>Image</label>
					<input class="form-control" type="file" name="userfile" value="<?php echo set_value('image'); ?>" />
				</div>
				</div>	
				<div class="form-group">
					<label>Published</label><br>		
					<label for="is_published" class="radio-inline">
					<input type="radio" name="is_published" value="1" checked> yes
					</label>
					<label class="radio-inline">
					<input type="radio" name="is_published" value="0"> No
					</label>
				</div>
			</div>
		</div><!-- /.row -->
	</form>