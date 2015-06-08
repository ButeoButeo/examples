<!DOCTYPE html>
<html>
<head>

    <?php echo $this->Html->charset(); ?>
    <meta name="description" content="JobsIn - Search For Available Jobs">
    <meta name="author" content="Andrea Njegovan">

    <title>
        <?php echo $this->fetch('title'); ?>
    </title>
    <?php
		echo $this->Html->meta('icon');

        echo $this->Html->css('kickstart');
        echo $this->Html->css('style');

        echo $this->Html->script('jquery');
        echo $this->Html->script('kickstart');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<body>
<div id="container" class="grid">
    <header>
        <div class="col_6 column">
            <h1><a href="<?php echo $this->webroot; ?>"><strong>JobsIn</strong> Artificer</a></h1>
        </div>
        <div class="col_6 column right">
            <form id="add_job_link" action="<?php echo $this->webroot; ?>jobs/add">
                <button class="large blue"><i class="fa fa-plus"></i> Add Job</button>
            </form>
        </div>
    </header>

    <div class="col_12 column">
        <!-- Menu Horizontal -->
        <ul class="menu">
            <li <?php echo ($this->here == '/jobsin/' || $this->here == 'jobsin/jobs') ? 'class="current"' : '' ?>><a href="<?php echo $this->webroot; ?>"><i class="fa fa-home"></i> Home</a></li>
            <li <?php echo ($this->here == '/jobsin/jobs/browse') ? 'class="current"' : '' ?>><a href="<?php echo $this->webroot; ?>jobs/browse"><i class="fa fa-desktop"></i> Browse Jobs</a></li>
            <li <?php echo ($this->here == '/jobsin/users/register') ? 'class="current"' : '' ?>><a href="<?php echo $this->webroot; ?>users/register"><i class="fa fa-user"></i> Register</a></li>
            <li <?php echo ($this->here == '/jobsin/users/login') ? 'class="current"' : '' ?>><a href="<?php echo $this->webroot; ?>users/login"><i class="fa fa-key"></i> Login</a></li>
        </ul>
    </div>

    <div class="col_12 column">

        <!--Display Messages-->
        <?php echo $this->Session->flash(); ?>
        <!--Include Main Area-->
        <?php echo $this->fetch('content'); ?>

    </div>

    <div class="clearfix"></div>

    <footer>
        <p>Copyright &copy; 2015, JobsIn, All Rights Reserved</p>
    </footer>
</div> <!-- End Grid -->
</body>
</html>
