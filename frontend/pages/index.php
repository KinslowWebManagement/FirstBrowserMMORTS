<?php
	global $title;
	global $seperator;
	global $description;
	global $metaTags;
	global $embed;
?>
<!doctype html>
<html>
<head>
	<?php echo $metaTags; ?>
	<title><?php echo $title . " " . $seperator . " " . $description; ?></title>
	<?php echo $embed; ?>
</head>
<body>
<div id="wrapper">
<div id="header" class="container-fluid text-center">
	<h1><?php echo $title . " " . $seperator . " " ?>Registration</h1>
</div>
	<div id="content" class="container-fluid text-center">
		<a href="index.php?page=contact">Contact</a>
	</div>
	<div id="footer" class="container-fluid text-center">
		&copy; 2016 Kinslow Web Management
	</div>
</div>

</body>
</html>