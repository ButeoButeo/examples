<div class="container marketing">
  <hr class="featurette-divider">
<?php foreach($about as $row) : ?>
<?php if ($row->published == 1) : ?>
  <div class="row featurette">
  
	<div class="col-md-7">
	  <h2 class="featurette-heading"><?php echo $row->title; ?></h2>
	  <p class="lead"><?php echo $row->description; ?></p>
	</div>
	<div class="col-md-5">
	  <img src="<?php echo base_url(); ?>assets/images/about/<?php echo $row->image; ?>" width="500" height="500">
	</div>
  </div>
  <hr class="featurette-divider">
<?php endif; ?>
<?php endforeach; ?>