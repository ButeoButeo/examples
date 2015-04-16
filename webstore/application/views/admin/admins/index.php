 <!--Display Messages-->
 <?php if($this->session->flashdata('user_saved')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('user_saved') . '</p>'; ?>
 <?php endif; ?>

 <?php if($this->session->flashdata('user_deleted')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('user_deleted') . '</p>'; ?>
 <?php endif; ?>
<h1 class="page-header">Admins</h1> 
<a href="<?php echo base_url(); ?>admin/admins/add" class="btn btn-success pull-right">Add Admin</a></br></br>
          <div class="table-responsive">
 <table class="table table-striped">
              <thead>
                <tr>
                  <th width="70">#</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	<?php foreach($admins as $admin) : ?>
	                <tr>
	                  <td><?php echo $admin->id; ?></td>
	                  <td><?php echo $admin->first_name; ?> <?php echo $admin->last_name; ?></td>
	                  <td><?php echo $admin->username; ?></td>
	                  <td><?php echo $admin->email; ?></td>
					  <td><a href="<?php echo base_url(); ?>admin/admins/edit/<?php echo $admin->id; ?>" class="btn btn-primary">Edit</a> 
					  <a href="<?php echo base_url(); ?>admin/admins/delete/<?php echo $admin->id; ?>" class="btn btn-danger">Delete</a></td>
	                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
	 </div>