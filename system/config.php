<?php
	$name = "MMORTS";
	$metaTags = '<meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE edge" /><meta name="viewport" content="width=device-width, initial-scale=1" />';
	$embed = '<script src="https://use.fontawesome.com/d4e9b35443.js"></script><link href="frontend/design/css/bootstrap.min.css" rel="stylesheet" /><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><script src="frontend/design/js/bootstrap.min.js"></script><link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" /><link href="frontend/design/css/stylesheet.css" rel="stylesheet" type="text/css" />';
	
	// Change this to whatever your mysql information is.
	$dbserver = "localhost";
	$dbuser = "root";
	$dbpass = 'wx4mXBw3';
	$db = "browsergametutorial";

	$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $db);
	if (!$conn){
		die("Connection failed: ". mysqli_connect_error());
	}
	else {
		$query = "SELECT Name, Seperator, Description, Maintenance FROM configuration WHERE Name = '".$name."'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);

		if ($row['Maintenance'] == 0) {
			$maintenance = false;
		}
		else {
			$maintenance = true;
		}
		$title = $row['Name'];
		$seperator = $row['Seperator'];
		$description = $row['Description'];

	}
?>
