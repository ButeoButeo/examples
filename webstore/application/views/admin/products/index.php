 <!--Display Messages-->
 <?php if($this->session->flashdata('product_saved')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('product_saved') . '</p>'; ?>
 <?php endif; ?>
 <?php if($this->session->flashdata('product_published')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('product_published') . '</p>'; ?>
 <?php endif; ?>
 <?php if($this->session->flashdata('product_unpublished')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('product_unpublished') . '</p>'; ?>
 <?php endif; ?>
 <?php if($this->session->flashdata('product_deleted')) : ?> 
 	<?php echo '<p class="alert alert-success">' .$this->session->flashdata('product_deleted') . '</p>'; ?>
 <?php endif; ?>
<h1 class="page-header">Products</h1> <a href="<?php echo base_url(); ?>admin/products/add" class="btn btn-success pull-right">Add product</a></br></br>
          <div class="table-responsive">
             <table class="table table-striped">
              <thead>
                <tr>
                  <th width="70">#</th>
					<th width="200">Title</th>
					<th width="100">Category</th>
					<th width="280">Description</th>
					<th width="280">Specifications</th>
					<th width="100">Image</th>
					<th width="50">Price</th>
					<th width="250">Actions</th>
                </tr>
              </thead>
              <tbody>
			  <?php foreach($products as $product) : ?>
                <tr>
						<td height="200"><?php echo $product->id; ?></td>
						<td><?php echo $product->title; ?></td>
						<td><?php echo $product->category_name; ?></td>
						<td><?php echo $product->description; ?></td>
						<td><?php echo $product->specifications; ?></td>
						<td><img style="box-shadow: 0px 0px 0px 2px #000, 0px 0px 0px 5px #8A4F6B" src="<?php echo base_url(); ?>assets/images/products/<?php echo $product->image; ?>" width="72" height="90"/></td>
						<td><strong><?php echo $product->price; ?></strong></td>
				  <td><a href="<?php echo base_url(); ?>admin/products/edit/<?php echo $product->id; ?>" class="btn btn-primary">Edit</a> 
						<?php if($product->is_published == 1) : ?>
							<a href="<?php echo base_url(); ?>admin/products/unpublish/<?php echo $product->id; ?>" class="btn btn-warning">Unpublish</a> 
						<?php elseif($product->is_published == 0) : ?>
							<a href="<?php echo base_url(); ?>admin/products/publish/<?php echo $product->id; ?>" class="btn btn-success">Publish</a> 
						<?php endif; ?>
						<a href="<?php echo base_url(); ?>admin/products/delete/<?php echo $product->id; ?>" class="btn btn-danger">Delete</a></td>
                </tr>      
				<?php endforeach; ?>
              </tbody>
            </table>
          </div>