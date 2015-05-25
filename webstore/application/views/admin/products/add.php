<!--Display form validation errors-->
<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<?php echo $this->upload->display_errors('<p class="alert alert-dismissable alert-danger">' , '</p>'); ?>
<form method="post" action="<?php echo base_url(); ?>admin/products/add" accept-charset="utf-8" enctype="multipart/form-data">
			  <div class="row">
			  <div class="col-lg-6">
				<h1>Add product</h1>
			  </div>
				<div class="col-lg-6">
					<div class="btn-group pull-right">
						<input type="submit" name="submit" class="btn btn-default" value="Save" />
						<a href="<?php echo base_url(); ?>admin/products" class="btn btn-default">Close</a>
				</div>
			  </div>
			</div><!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<ol class="breadcrumb">
				  		<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				  		<li><a href="<?php echo base_url(); ?>admin/products"><i class="fa fa-pencil"></i> Products</a></li>
				  		<li class="active"><i class="fa fa-plus-square-o"></i> Add product</li>
					</ol>
				</div>  
			</div><!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Product Title</label>
							<input class="form-control" type="text" name="title" value="<?php echo set_value('title'); ?>" placeholder="Enter product Title" />
						</div>
						<div class="form-group">
							<label>Category</label>
							<select name="category" class="form-control">
								 <option value="0">Select Category</option>
								 <?php foreach($categories as $category) : ?>
								 	<option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
								 <?php endforeach; ?>       
							</select>
						</div>		
						<div class="form-group">
							<label>Product Description</label>
							<textarea class="form-control" name="description" rows="10"><?php echo set_value('description'); ?></textarea>
						</div>
						<div class="form-group">
							<label>Product Specifications</label>
							<textarea class="form-control" name="specifications" rows="10"><?php echo set_value('specifications'); ?></textarea>
						</div>
						<div class="form-group">
							<label>Image</label>
							<input class="form-control" type="file" name="userfile" value="<?php echo set_value('image'); ?>" />
						</div>
						<div class="form-group">
							<label>Product Price</label>
							<input class="form-control" type="text" name="price" value="<?php echo set_value('price'); ?>" placeholder="Enter product Price" />
						</div>
						<div class="form-group">
							<label>Published</label><br>		
							<label for="published" class="radio-inline">
							<input type="radio" name="published" value="1" checked> yes
							</label>
							<label class="radio-inline">
							<input type="radio" name="published" value="0"> No
							</label>
						</div>
					</div>
				</div><!-- /.row -->
			</form>