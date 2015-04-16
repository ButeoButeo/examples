<div class="container marketing">
<hr class="featurette-divider">
<div class = "row">
	<!-- Side Bar -->
	<div class = "col-md-2">
		<div class="panel panel-default panel-list">
			<div class="panel-heading panel-heading-dark">
				<h3 class="panel-title">Categories</h3>
			</div>
			<!-- List Categories -->
			<ul class="list-group">
				<li class="list-group-item"><a href="<?php echo base_url(); ?>products">All</a></li>
				<?php foreach(get_categories_h() as $category) : ?>
					<li class="list-group-item"><a href="<?php echo base_url(); ?>products/category/<?php echo $category->id ?>"><?php echo $category->name; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
				
		<div class="panel panel-default panel-list">
			<div class="panel-heading">
				<h3 class="panel-title">Most Popular</h3>
			</div>
			<!-- List Most Popular -->
			<ul class="list-group">
				<?php foreach(get_popular_h() as $popular) : ?>
					<li class="list-group-item"><a href="<?php echo base_url(); ?>products/details/<?php echo $popular->id ?>"><?php echo $popular->title; ?></a></li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
	
	<!-- Main -->
	<div class = "col-md-10">
		<div class="panel panel-default">
				<div class="panel-heading panel-heading-green">
					<h3 class="panel-title">Mia's Web Store</h3>
					<form method = "post" action = "<?php echo base_url(); ?>products">
						<input type="text" name="keywords" class="search" placeholder="Search Products...">
					</form>
				</div>
			<div class="panel-body">
			<?php if ($this->session->flashdata('registered')) : ?>
				<div class="alert alert-success">
					<?php echo $this->session->flashdata('registered'); ?>
				</div>
			<?php endif; ?>

			<?php if ($this->session->flashdata('pass_login')) : ?>
				<div class="alert alert-success">
					<?php echo $this->session->flashdata('pass_login'); ?>
				</div>
			<?php endif; ?>

			<?php if ($this->session->flashdata('fail_login')) : ?>
				<div class="alert alert-danger">
					<?php echo $this->session->flashdata('fail_login'); ?>
				</div>
			<?php endif; ?>
			
			<?php if ($this->session->flashdata('added')) : ?>
				<div class="alert alert-success">
					<?php echo $this->session->flashdata('added'); ?>
				</div>
			<?php endif; ?>

			<?php foreach ($products as $product) : ?>
			<?php if ($product->is_published == 1) : ?>
				<div class="col-md-4 clothes">
				<div class="clothes-price">€<?php echo $product->price; ?></div>
					<a href="<?php echo base_url(); ?>products/details/<?php echo $product->id; ?>">
						<img src="<?php echo base_url(); ?>assets/images/products/<?php echo $product->image; ?>" />
					</a>
				<div class="clothes-title"><?php echo $product->title; ?></div>
					<div class="clothes-add">
						<form method="post" action="<?php echo base_url(); ?>cart/add">
										QTY: <input class="qty" type="text" name="qty" value="1" /><br>
										<input type="hidden" name="item_number" value="<?php echo $product->id; ?>" />
										<input type="hidden" name="price" value="<?php echo $product->price; ?>" />
										<input type="hidden" name="title" value="<?php echo $product->title; ?>" />
										<button class="btn btn-primary" type="submit">Add To Cart</button>
						</form>
					</div>
				</div>
				<?php endif; ?>
			<?php endforeach; ?>
			<span class="pagination"><?php echo $links; ?></span>
			</div>
		</div>