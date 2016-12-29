<?php 
	require_once("system/functions.php");
	require_once("system/config.php");
	if ($maintenance == true){
		echo "This Website is currently down for maintenance!";
	}
	elseif ($maintenance == false){
		getPage();
	}
?>