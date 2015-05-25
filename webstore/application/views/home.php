<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
	<ol class="carousel-indicators">
	   <?php foreach($home as $row) : ?>
	   <?php if ($row->id == 1) : ?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $row->id ?>" class="active"></li>
	   <?php else : ?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $row->id ?>"></li>
	   <?php endif; ?>
	   <?php endforeach; ?>
    </ol>

	<!-- Slide Data -->
    <div class="carousel-inner" role="listbox">
	   <?php foreach($home as $row) : ?>
	    <?php if ($row->published == 1) : ?>
	   <?php if ($row->id == 1) : ?>
       <div class="item active">
	   <?php else : ?>
		<div class="item">
	   <?php endif; ?>
          <img src="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/slide/<?php echo $row->image; ?>" />
          <div class="container">
            <div class="carousel-caption">
              <h1><?php echo $row->title; ?></h1>
              <p><?php echo $row->description; ?></p>
			  <p><a class="btn btn-lg btn-primary" href="<?php echo base_url(); ?><?php echo $row->button_link; ?>" role="button"><?php echo $row->button_title; ?></a></p>
            </div>
          </div>
        </div>
		<?php endif; ?>
		<?php endforeach; ?>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="icon-prev" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="icon-next" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
	</div>

  <div class="container marketing">
  <p class="lead">Most Popular</p><hr>
	<div class="row">
    <!-- Get Most Popular Products -->
	<?php foreach(get_popular_h() as $popular) : ?>
	<div class="col-lg-4">
		<img class="img-circle" src="<?php echo base_url(); ?>assets/images/products/<?php echo $popular->image; ?>" alt="Generic placeholder image" style="width: 180px; height: 260px;">
		<h2><?php echo $popular->title; ?></h2>
		<p><?php echo $popular->description; ?></p>
		<p><a class="btn btn-default" href="<?php echo base_url(); ?>products/details/<?php echo $popular->id ?>" role="button">View details &raquo;</a></p>
	</div><!-- /.col-lg-4 --> 
	<?php endforeach;?>