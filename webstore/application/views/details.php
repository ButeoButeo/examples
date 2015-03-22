<script src="<?php echo base_url(); ?>assets/js/zoom.js"></script>
<script>
		$(document).ready(function(){
			$('#ex2').zoom({ on:'grab' });
		});
</script>
<style>
/* Image Zoom */
.zoom {
	display:inline-block;
	position: relative;
}
		
/* magnifying glass icon */
.zoom:after {
	content:'';
	display:block; 
	width:33px; 
	height:33px; 
	position:absolute; 
	top:0;
	right:0;
	background:url(<?php echo base_url(); ?>assets/images/icon.png);
}

.zoom img {
	display: block;
}

.zoom img::selection { background-color: transparent; }

#ex2 img:hover { cursor: url(<?php echo base_url(); ?>assets/images/grab.cur), default; }
#ex2 img:active { cursor: url(<?php echo base_url(); ?>assets/images/grabbed.cur), default; }
</style>		
		
</script>
<div class="container marketing">
	<hr class="featurette-divider">
	<div class = "row">
		<div class = "col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading panel-heading-green">
				<h3 class="panel-title">Mia's Web Store</h3>
			</div>
<div class="panel-body">
<div class="row details">
	<div class="col-md-4">
		<span class='zoom' id='ex2'><img src="<?php echo base_url(); ?>assets/images/products/<?php echo $product->image; ?>"/></span>
	</div>
	<div class="col-md-8">
		<h3><?php echo $product->title; ?></h3>
			<div class="details-price">
				Price: &euro;<?php echo $product->price; ?>
			</div><hr>
		<div class="details-description">
		<h4 style="color:#8A4F6B">Style Notes:</h4>
			<?php echo $product->description; ?>
		</div>
		</br>
		<div class="details-specifications">
		<h4 style="color:#8A4F6B">Specifications:</h4>
		<ul>
			<?php
				$arr = explode(",", $product->specifications);
				foreach ($arr as $key => $val)
				echo '<li>'.$val.'</li>';
			?>
		</ul>
		</div>
		</br><hr>								
		<div class="details-buy">
			<form method="post" action="<?php echo base_url(); ?>cart/add/<?php echo $product->id; ?>">
				QTY: <input class="qty" type="text" name="qty" value="1" /></br>
				<input type="hidden" name="item_number" value="<?php echo $product->id; ?>" />
				<input type="hidden" name="price" value="<?php echo $product->price; ?>" />
				<input type="hidden" name="title" value="<?php echo $product->title; ?>" />
				<button class="btn btn-primary" type="submit">Add To Cart</button>
			</form>
		</div><br><br>
		<a class="btn btn-default btn pull-right" href="<?php echo base_url(); ?>products">Back To Shop</a>
	</div>
</div>
</div>
</div>