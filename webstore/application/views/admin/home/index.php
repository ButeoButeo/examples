 <!--Display Messages-->
 <?php if($this->session->flashdata('home_saved')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('home_saved') . '</p>'; ?>
 <?php endif; ?>
 <?php if($this->session->flashdata('home_published')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('home_published') . '</p>'; ?>
 <?php endif; ?>
 <?php if($this->session->flashdata('home_unpublished')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('home_unpublished') . '</p>'; ?>
 <?php endif; ?>
 <?php if($this->session->flashdata('home_deleted')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('home_deleted') . '</p>'; ?>
 <?php endif; ?>
<h1 class="page-header">Home</h1>
<a href="<?php echo base_url(); ?>admin/home/add" class="btn btn-success pull-right">Add Home</a></br></br>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th width="70">#</th>
					<th>Title</th>
					<th>Description</th>
					<th width="150">Button Title</th>
					<th width="100">Button Link</th>
					<th>Image</th>
					<th width="250">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($home as $row) : ?>
					<tr>
						<td height="100"><?php echo $row->id; ?></td>
						<td><?php echo $row->title; ?></td>
						<td><?php echo $row->description; ?></td>
						<td><?php echo $row->button_title; ?></td>
						<td><?php echo $row->button_link; ?></td>
						<td><img style="box-shadow: 0px 0px 0px 2px #000, 0px 0px 0px 5px #8A4F6B" src="<?php echo base_url(); ?>assets/images/slide/<?php echo $row->image; ?>" width="90" height="50"/></td>
						<td><a href="<?php echo base_url(); ?>admin/home/edit/<?php echo $row->id; ?>" class="btn btn-primary">Edit</a>
						<?php if($row->is_published == 1) : ?>
							<a href="<?php echo base_url(); ?>admin/home/unpublish/<?php echo $row->id; ?>" class="btn btn-warning">Unpublish</a>
						<?php elseif($row->is_published == 0) : ?>
							<a href="<?php echo base_url(); ?>admin/home/publish/<?php echo $row->id; ?>" class="btn btn-success">Publish</a>
						<?php endif; ?>
						<a href="<?php echo base_url(); ?>admin/home/delete/<?php echo $row->id; ?>" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>