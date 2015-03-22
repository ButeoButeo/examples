<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/slide/slide_img_2.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Register Today</h1>
              <p>Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula. Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
              <p><a class="btn btn-lg btn-primary" href="<?php echo base_url(); ?>users/register" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/slide/slide_img_3.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Find Out More About Us</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="<?php echo base_url(); ?>shop/about" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/slide/slide_img_4.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>See Our Products</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="<?php echo base_url(); ?>products" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="icon-prev" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="icon-next" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
</div><!-- /.carousel -->

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