<script type="text/javascript">
	// Conform clear all data in cart
	function clear_cart() {
		var result = confirm('Are you sure want to remove all products?');

		if (result) {
			window.location = "<?php echo base_url(); ?>cart/remove/all";
		} else {
		return false;
		}
	}
</script>

<div class="container marketing">
  <hr class="featurette-divider">
  <div class = "row">
    <!-- Include Sidebar -->
	<div class = "col-md-4">
		<?php $this->load->view('layouts/includes/sidebar'); ?>
	</div>
	<!-- Main -->
	<div class = "col-md-8">
	<div class="panel panel-default">
		<div class="panel-heading panel-heading-green">
			<h3 class="panel-title">Mia's Web Store</h3>
		</div>
		<div class="panel-body">
		  <!-- Cart Content -->
		  <?php if($this->cart->contents()) : ?>
			<form method="post" action="<?php echo base_url(); ?>cart/process">
				<table class="table table-striped">
					<tr>
						<th>Serial</th>
						<th>Quanity</th>
						<th>Item Title</th>
						<th style="text-align:right">Item Price</th>
						<th style="text-align:right">Remove</th>
					</tr>
					<?php $i = 1; ?>
					<?php foreach ($this->cart->contents() as $items): ?>
						<?php echo '<input type="hidden" name="item_code['.$i.']" value="'.$items['id'].'" />';?>
						<?php echo '<input type="hidden" name="rowid['.$i.']" value="'.$items['rowid'].'" />';?>
						<?php echo '<input type="hidden" name="item_name['.$i.']" value="'.$items['name'].'" />';?>
						<?php echo '<input type="hidden" name="item_qty['.$i.']" value="'.$items['qty'].'" />';?>
						
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $items['qty']; ?></td>
						<td><?php echo $items['name']; ?></td>
						<td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
						<td style="text-align:right">
						<?php // Cancel Image
						$path = "<img src='http://localhost/webstore/assets/images/remove.jpg' width='25px' height='20px'>";
						echo anchor('cart/remove/' . $items['rowid'], $path); ?>
						</td>
						<?php endforeach; ?>
					</tr>	
						
					<tr>
						<td></td>
						<td class="right"><strong>Total</strong></td>
						<td></td>
						<td class="right" style="text-align:right"><strong>&euro;<?php echo $this->cart->format_number($this->cart->total()); ?></strong></td>
						<td></td>
					</tr>
					<tr>
						<td colspan="5" align="right"><input  class ='btn btn-danger' type="button" value="Clear Cart" onclick="clear_cart()">
					</tr>
				
				</table>
				<br>
				<!-- Shipping Info -->
				<?php if (!$this->session->userdata('logged_in')) : ?>
					<p><a href="<?php echo base_url(); ?>users/register" class="btn btn-primary">Create An Account</a></p>
					<p><em>You must log in to make purchases</em></p>
				<?php else : ?>
				<?php echo validation_errors('<div class = "alert alert-danger">','</div>'); ?>
					<h3>Shipping Info</h3>
					<div class="form-group">
						<label>Address*</label>
						<input type="text" class="form-control" name="address">
					</div>
					<div class="form-group">
						<label>Address 2</label>
						<input type="text" class="form-control" name="address2">
					</div>
					<div class="form-group">
						<label>City*</label>
						<input type="text" class="form-control" name="city">
					</div>
					<div class="form-group">
						<label>State*</label>
						<input type="text" class="form-control" name="state">
					</div>
					<div class="form-group">
						<label>Zipcode*</label>
						<input type="text" class="form-control" name="zipcode">
					</div>
					<p><button class="btn btn-primary" type="submit" name="submit">Submit</button>
					<a class="btn btn-default btn pull-right" href="<?php echo base_url(); ?>products">Back To Shop</a></p>
				<?php endif; ?>
			</form>
		  <!-- Empty Cart -->
		  <?php else : ?>
			<a href="<?php echo base_url(); ?>products"><img src="<?php echo base_url(); ?>assets/images/empty.jpg" /></a>
		  <?php endif; ?>
		</div>
	</div>