<h1 class="page-header">Dashboard</h1>
 <div class="row">
   <h3>Best-Selling</h3></p></br>
    <!-- Get Best-Selling Products -->
	<?php foreach(get_popular_h() as $popular) : ?>
	<div class="col-lg-4" style="text-align:center;">
		<img class="img-circle" src="<?php echo base_url(); ?>assets/images/products/<?php echo $popular->image; ?>" alt="Generic placeholder image" style="width: 140px; height: 200px;">
		<h4 style="text-align:center;"><?php echo $popular->title; ?></h4>
	</div>
	<?php endforeach;?>
  </div></br>
  
	<!-- GetProducts -->
  	<h3>Products</h3>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th width="70">#</th>
					<th>Title</th>
					<th>Category</th>
					<th>Image</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($products as $product) : ?>
					<tr>
						<td><?php echo $product->id; ?></td>
						<td><?php echo $product->title; ?></td>
						<td><?php echo $product->category_name; ?></td>
						<td><img style="box-shadow: 0px 0px 0px 2px #000, 0px 0px 0px 5px #8A4F6B" src="<?php echo base_url(); ?>assets/images/products/<?php echo $product->image; ?>" width="72" height="90"/></td>
						<td><strong><?php echo $product->price; ?></strong></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<hr>
	
	<div class="row">
	  <div class="col-md-6">
		<!-- GetProducts -->
		<h3>Categories</h3>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th width="70">#</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($categories as $category) : ?>
						<tr>
							<td><?php echo $category->id; ?></td>
							<td><?php echo $category->name; ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	
	<div class="col-md-6">
		<!-- Contact Details -->
		<h3>Contact Details</h3>
	    <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th width="70">#</th>
                  <th>Name</th>               
				  <th>Value</th>
                </tr>
              </thead>
              <tbody>
              	<?php foreach($contact as $row) : ?>
	                <tr>
	                  <td><?php echo $row->id; ?></td>        
	                  <td><?php echo $row->key; ?></td>       
	                  <td><?php echo $row->value; ?></td>
	                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
	  <hr>
	
	<div class="row">
	  <div class="col-md-6">
		<!-- Get Home Data -->
		<h3>Home</h3>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th width="70">#</th>
						<th>Title</th>
						<th>Image</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($home as $row) : ?>
						<tr>
							<td height="100"><?php echo $row->id; ?></td>
							<td><?php echo $row->title; ?></td>
							<td><img style="box-shadow: 0px 0px 0px 2px #000, 0px 0px 0px 5px #8A4F6B" src="<?php echo base_url(); ?>assets/images/slide/<?php echo $row->image; ?>" width="90" height="50"/></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	  </div>
		

	  <div class="col-md-6">
		<!-- Get About Data -->
		<h3>About</h3>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th width="70">#</th>
						<th>Title</th>
						<th>Image</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($about as $row) : ?>
						<tr>
							<td height="100"><?php echo $row->id; ?></td>
							<td><?php echo $row->title; ?></td>
							<td><img style="box-shadow: 0px 0px 0px 2px #000, 0px 0px 0px 5px #8A4F6B" src="<?php echo base_url(); ?>assets/images/about/<?php echo $row->image; ?>" width="80" height="80"/></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	  </div>
	</div>
	