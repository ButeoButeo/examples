<form method="post" action="<?php echo base_url(); ?>admin/about/edit/<?php echo $about->id; ?>" accept-charset="utf-8" enctype="multipart/form-data">
			  <div class="row">
			  <div class="col-md-6">
				<h1>Edit About</h1>
			  </div>
				<div class="col-md-6">
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
							<input class="form-control" type="text" name="title" id="title" value="<?php echo $about->title; ?>" placeholder="Enter about Title" />
						</div>	
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" id="body" rows="10"><?php echo $about->description; ?></textarea>
						</div>						
						<div class="form-group">
							<label>Image</label>
							<input class="form-control" type="file" name="userfile" value="<?php echo set_value('image'); ?>" />
						</div>	
						<div class="form-group">
							<label>Published</label><br>		
							<label for="published" class="radio-inline">
                      			<input type="radio" name="published" id="published" value="1" <?php echo ($about->published== 1) ? 'checked' : ''; ?>> Yes
                    		</label>
                    		<label class="radio-inline">
                      			<input type="radio" name="published" id="published" value="0" <?php echo ($about->published == 0) ? 'checked' : ''; ?>> No
                    		</label>
						</div>
					</div>
				</div><!-- /.row -->
			</form>
