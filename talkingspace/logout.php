<?php include ('core/init.php'); ?>

<?php
if (isset($_POST['do_logout'])) {
	//Create User Object
	$user = new User;
	
	if ($user->logout()) {
		redirect('index.php', 'You are logged out', 'success');
	}
} else {
	redirect('index.php');
}