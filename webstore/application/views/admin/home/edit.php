<form method="post" action="<?php echo base_url(); ?>admin/home/edit/<?php echo $home->id; ?>" accept-charset="utf-8" enctype="multipart/form-data">
			  <div class="row">
			  <div class="col-md-6">
				<h1>Edit Home</h1>
			  </div>
				<div class="col-md-6">
					<div class="btn-group pull-right">
						<input type="submit" name="submit" class="btn btn-default" value="Save" />
						<a href="<?php echo base_url(); ?>admin/home" class="btn btn-default">Close</a>
				</div>
			  </div>
			</div><!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<ol class="breadcrumb">
				  		<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				  		<li><a href="<?php echo base_url(); ?>admin/home"><i class="fa fa-pencil"></i> Home</a></li>
				  		<li class="active"><i class="fa fa-plus-square-o"></i> Add home</li>
					</ol>
				</div>  
			</div><!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Title</label>
							<input class="form-control" type="text" name="title" id="title" value="<?php echo $home->title; ?>" placeholder="Enter home Title" />
						</div>	
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" id="body" rows="10"><?php echo $home->description; ?></textarea>
						</div><div class="form-group">
							<label>Button Title</label>
							<input class="form-control" type="text" name="button_title" id="button_title" value="<?php echo $home->button_title; ?>" placeholder="Enter Button Title" />
						</div>
						<div class="form-group">
							<label>Button Link</label>
							<input class="form-control" type="text" name="button_link" id="button_link" value="<?php echo $home->button_link; ?>" placeholder="Enter Button Link" />
						</div>							
						<div class="form-group">
							<label>Image</label>
							<input class="form-control" type="file" name="userfile" />
						</div>	
						<div class="form-group">
							<label>Published</label><br>		
							<label for="is_published" class="radio-inline">
                      			<input type="radio" name="is_published" id="is_published" value="1" <?php echo ($home->is_published== 1) ? 'checked' : ''; ?>> Yes
                    		</label>
                    		<label class="radio-inline">
                      			<input type="radio" name="is_published" id="is_published" value="0" <?php echo ($home->is_published == 0) ? 'checked' : ''; ?>> No
                    		</label>
						</div>
					</div>
				</div><!-- /.row -->
			</form>
