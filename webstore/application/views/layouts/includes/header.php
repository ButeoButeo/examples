<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Mia's Web Store">
    <meta name="author" content="Andrea Njegovan">

    <title>Mia's Web Store</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="<?php echo base_url(); ?>assets/css/carousel.css" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/docs.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/workaround.js"></script>
	
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/mia_logo.jpg"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li><a href="<?php echo base_url(); ?>about">About</a></li>
                <li><a href="<?php echo base_url(); ?>contact">Contact</a></li>
				
				<!--Shop Dropdown Button -->
				
				<li class="dropdown">
                  <a href="<?php echo base_url(); ?>products" class="dropdown-toggle" data-toggle="dropdown" role="href" aria-expanded="false">Shop<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo base_url(); ?>products">All</a></li>
					<li class="divider"></li>
					<?php foreach(get_categories_h() as $category) : ?>
						<li><a href="<?php echo base_url(); ?>products/category/<?php echo $category->id ?>"><?php echo $category->name; ?></a></li>
					<?php endforeach; ?>
                  </ul>
                </li>
				
				<!-- Create Account -->
				
				<?php if (!$this->session->userdata('logged_in')) : ?>
				<li><a href="<?php echo base_url(); ?>register">Register</a></li>
				<?php endif; ?>
				
				<!--Cart Dropdown -->
				
				<li class="dropdown">
                  <a href="<?php echo base_url(); ?>products" class="dropdown-toggle" data-toggle="dropdown" role="href" aria-expanded="false"><img src="<?php echo base_url(); ?>assets/images/basket.jpg" style="width:48px; height: 48px;" /><span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
				  <div class = "dropdown-cart">
				  <?php if($this->cart->contents()) : ?>
				  <form action="cart/update" method="post">
				  <table data-toggle="table">
				  <thead>
					<tr>
						<td><strong>QTY</strong></td>
						<td style="text-align:center"><strong>Item Title</strong></td>
						<td style="text-align:right"><strong>Item Price</strong></td>
					</tr>
					</thead>
					<tbody>
					<?php $i = 0; ?>
					<?php foreach ($this->cart->contents() as $items): ?>
						<tr>
							<td><?php echo $items['qty']; ?></td>
							<td><?php echo $items['name']; ?></td>
							<td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
						</tr>		
							<?php echo '<input type="hidden" name="item_name['.$i.']" value="'.$items['name'].'" />';?>
							<?php echo '<input type="hidden" name="item_code['.$i.']" value="'.$items['id'].'" />';?>
							<?php echo '<input type="hidden" name="item_qty['.$i.']" value="'.$items['qty'].'" />';?>
						<?php $i++; ?>
					<?php endforeach; ?>
					<hr>
					<tr>
						<td class="right"><strong>Total</strong></td>
						<td></td>
						<td class="right" style="text-align:right"><strong>&euro;<?php echo $this->cart->format_number($this->cart->total()); ?></strong></td>
					</tr>
					</tbody>
					</table>
					</form>
					<?php else : ?>
							<p>There are no items in your cart</p>
					<?php endif; ?>
					<hr>
						<p><a class="btn btn-primary" href="<?php echo base_url(); ?>cart">Go To Cart</a></p>
					</div>
                  </ul>
                </li>
              </ul>
			  
			  <!-- User LogIn & LogOut -->
			  
			  <?php if (!$this->session->userdata('logged_in')) : ?>
			  	<form method = "post" action = "<?php echo base_url(); ?>users/login" class="navbar-form navbar-right">
					<div class="form-group">
						<input name = "username" type="text" class="form-control" placeholder="Enter Username">
					</div>
					<div class="form-group">
						<input name = "password" type="password" class="form-control" placeholder="Enter Password">
					</div>
					<button name = "submit" type="submit" class="btn btn-default">LogIn</button>
				</form>
				<?php else : ?>
				<form class="navbar-form navbar-right" method="post" action="<?php echo base_url(); ?>users/logout">
					<button name="submit" type="submit" class="btn btn-default">LogOut</button>
				</form>
				<?php endif; ?>
            </div>
          </div>
        </nav>

      </div>
    </div>