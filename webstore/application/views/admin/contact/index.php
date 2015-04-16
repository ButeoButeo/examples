   <!--Display Messages-->
 <?php if($this->session->flashdata('contact_saved')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('contact_saved') . '</p>'; ?>
 <?php endif; ?>
 <?php if($this->session->flashdata('contact_deleted')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('contact_deleted') . '</p>'; ?>
 <?php endif; ?>

<h1 class="page-header">Contact Details</h1>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th width="70">#</th>
                  <th>Contact Detail Name</th>               
				  <th>Contact Detail Value</th>
				  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	<?php foreach($contact as $row) : ?>
	                <tr>
	                  <td><?php echo $row->id; ?></td>        
	                  <td><?php echo $row->key; ?></td>       
	                  <td><?php echo $row->value; ?></td>
					  <td><a href="<?php echo base_url(); ?>admin/contact/edit/<?php echo $row->id; ?>" class="btn btn-primary">Edit</a></td>
	                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>