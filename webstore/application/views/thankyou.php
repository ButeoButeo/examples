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
	<div class = "col-md-10">
		<div class="panel panel-default">
			<div class="panel-heading panel-heading-green">
				<h3 class="panel-title">Mia's Web Store</h3>
			</div>
			<!-- Main -->
			<div class="panel-body" id="thankyou" style="background-image:url(<?php echo base_url(); ?>assets/images/thankyou.jpg)">
				<h3>THANK YOU FOR YOUR ORDER!</h3>
				<p>Your order was successfully processed. If you need to contact us about your order please <a href="<?php echo base_url(); ?>shop/contact">send us an email</a>.</p>
				<p>You can expect the package in the next few days.</p><br>
				<a class="btn btn-default" href="<?php echo base_url(); ?>products">Back To Shop</a>
			</div>
		</div>
