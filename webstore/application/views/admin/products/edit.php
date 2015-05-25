<form method="post" action="<?php echo base_url(); ?>admin/products/edit/<?php echo $product->id; ?>" accept-charset="utf-8" enctype="multipart/form-data">
			  <div class="row">
			  <div class="col-md-6">
				<h1>Edit product</h1>
			  </div>
				<div class="col-md-6">
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
							<label>product Title</label>
							<input class="form-control" type="text" name="title" id="title" value="<?php echo $product->title; ?>" placeholder="Enter product Title" />
						</div>
						<div class="form-group">
							<label>Category</label>
							<select name="category" class="form-control">
								 <option value="0">Select Category</option>
								 <?php foreach($categories as $category) : ?>
								 	<?php if($category->id == $product->category_id) : ?>
								 		<?php $selected = 'selected'; ?>
								 	<?php else : ?>
								 		<?php $selected = ''; ?>
								 	<?php endif; ?>
								 	<option value="<?php echo $category->id; ?>" <?php echo $selected; ?>><?php echo $category->name; ?></option>
								 <?php endforeach; ?>       
							</select>
						</div>		
						<div class="form-group">
							<label>Product Description</label>
							<textarea class="form-control" name="description" id="description" rows="10"><?php echo $product->description; ?></textarea>
						</div>
						<div class="form-group">
							<label>Product Specifications</label>
							<textarea class="form-control" name="specifications" id="specifications" rows="10"><?php echo $product->specifications; ?></textarea>
						</div>
						<div class="form-group">
							<label>Image</label>
							<input class="form-control" type="file" name="userfile" value="<?php echo $product->image; ?>" />
						</div>
						<div class="form-group">
							<label>product Price</label>
							<input class="form-control" type="text" name="price" id="price" value="<?php echo $product->price; ?>" placeholder="Enter product price" />
						</div>						
						<div class="form-group">
							<label>Published</label><br>		
							<label for="published" class="radio-inline">
                      			<input type="radio" name="published" id="published" value="1" <?php echo ($product->published== 1) ? 'checked' : ''; ?>> Yes
                    		</label>
                    		<label class="radio-inline">
                      			<input type="radio" name="published" id="published" value="0" <?php echo ($product->published == 0) ? 'checked' : ''; ?>> No
                    		</label>
						</div>
						</div>
				</div><!-- /.row -->
			</form>