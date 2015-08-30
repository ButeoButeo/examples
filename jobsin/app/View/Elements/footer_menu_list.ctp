<h5> <?php echo $menu['Menu']['label']; ?> </h5>
<?php
foreach ($menu["MenuLink"] as $menuLink) {
	$link = "#";
	if (!empty($menuLink["Page"]["link"])) {
		$link = $menuLink["Page"]["link"];
	}

	?>
<a id="footer" href="<?=$link; ?>"><?php echo $menuLink['label']; ?></a><br>
<?php
} ?>