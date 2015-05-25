 <!--Display Messages-->
 <?php if($this->session->flashdata('about_saved')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('about_saved') . '</p>'; ?>
 <?php endif; ?>
 <?php if($this->session->flashdata('about_published')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('about_published') . '</p>'; ?>
 <?php endif; ?>
 <?php if($this->session->flashdata('about_unpublished')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('about_unpublished') . '</p>'; ?>
 <?php endif; ?>
 <?php if($this->session->flashdata('about_deleted')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('about_deleted') . '</p>'; ?>
 <?php endif; ?>
<h1 class="page-header">About</h1>
<a href="<?php echo base_url(); ?>admin/about/add" class="btn btn-success pull-right">Add About</a></br></br>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th width="70">#</th>
					<th>Title</th>
					<th>Description</th>
					<th>Image</th>
					<th width="250">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($about as $row) : ?>
					<tr>
						<td height="100"><?php echo $row->id; ?></td>
						<td><?php echo $row->title; ?></td>
						<td><?php echo $row->description; ?></td>
						<td><img style="box-shadow: 0px 0px 0px 2px #000, 0px 0px 0px 5px #8A4F6B" src="<?php echo base_url(); ?>assets/images/about/<?php echo $row->image; ?>" width="80" height="80"/></td>
						<td><a href="<?php echo base_url(); ?>admin/about/edit/<?php echo $row->id; ?>" class="btn btn-primary">Edit</a>
						<?php if($row->published == 1) : ?>
							<a href="<?php echo base_url(); ?>admin/about/unpublish/<?php echo $row->id; ?>" class="btn btn-warning">Unpublish</a>
						<?php elseif($row->published == 0) : ?>
							<a href="<?php echo base_url(); ?>admin/about/publish/<?php echo $row->id; ?>" class="btn btn-success">Publish</a>
						<?php endif; ?>
						<a href="<?php echo base_url(); ?>admin/about/delete/<?php echo $row->id; ?>" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>