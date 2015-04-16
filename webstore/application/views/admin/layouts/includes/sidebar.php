<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function() {
	$('#menu li').hover(function() {
		$(this).children(':hidden').slideDown();
	}, function() {
		$(this).parent().find('ul').slideUp();
	});
});
</script>

<div class="col-sm-3 col-md-2 sidebar">
<div id="menu">
	<ul class="nav nav-sidebar">
            <li class="<?php if($this->uri->segment(2)=="dashboard"){echo "active";}?>"><a href="<?php echo base_url(); ?>admin/dashboard">Overview</a></li>
			<li class="<?php if($this->uri->segment(2)=="products"){echo "active";}?>"><a href="<?php echo base_url(); ?>admin/products">Products</a></li>
			<li class="<?php if($this->uri->segment(2)=="categories"){echo "active";}?>"><a href="<?php echo base_url(); ?>admin/categories">Categories</a></li>
			<li class="<?php if($this->uri->segment(2)=="admins"){echo "active";}?>"><a href="<?php echo base_url(); ?>admin/admins">Admins</a></li>
			<li class="<?php if($this->uri->segment(2)=="home" || $this->uri->segment(2)=="about" || $this->uri->segment(2)=="contact"){echo "active";}?>"><a href="#">Pages +</a>
			  <ul>
				<li><a href="<?php echo base_url(); ?>admin/home">Home Page</a></li>
				<li><a href="<?php echo base_url(); ?>admin/about">About Page</a></li>
				<li><a href="<?php echo base_url(); ?>admin/contact">Contact Details</a></li>
			  </ul>
			</li>
    </ul>
</div>
</div>