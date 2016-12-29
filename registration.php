<?php 
	require_once("system/functions.php");
	require_once("system/config.php");
	if ($maintenance == true){
		echo "This Website is currently down for maintenance!";
	}
	elseif ($maintenance == false){

 ?>
<!doctype html>
<html>
<head>
<?php echo $metaTags; ?>
<title><?php echo $title . " " . $seperator . " " . $description; ?></title>
<?php echo $embed; ?>
<script type="text/javascript">

function validateForm(){
	var user,pass,confirmPass,email,confirmEmail;

	user = document.forms["registrar"]["Username"].value;
	pass = document.forms["registrar"]["Password"].value;
	confirmPass = ddocument.forms["registrar"]["ConfirmPass"].value;
	email = document.forms["registrar"]["Email"].value;
	confirmEmail = document.forms["registrar"]["ConfirmEmail"].value;
	
	if(user == ""){
		document.forms["registrar"]["status"].innerHTML = "The two email addresses must match";
		return false;
	}
	if(pass == ""){
		document.forms["registrar"]["status"].innerHTML = "The two email addresses must match";
		return false;
	}
	if(user == ""){
		document.forms["registrar"]["status"].innerHTML = "The two email addresses must match";
		return false;
	}
	if(pass == ""){
		document.forms["registrar"]["status"].innerHTML = "The two email addresses must match";
		return false;
	}
	if(user == ""){
		document.forms["registrar"]["status"].innerHTML = "The two email addresses must match";
		return false;
	}
	if(pass != confirmPass){
		document.forms["registrar"]["status"].innerHTML = "The two email addresses must match";
		return false;
	}
	if(email != confirmEmail){
		document.forms["registrar"]["status"].innerHTML = "The two email addresses must match";
		return false;
	}
	document.getElementByName("submit").enabled = true;
	return true;
}

</script>
</head>
<body>
<div id="wrapper">
<div id="header" class="container-fluid text-center">
<h1><?php echo $title . " " . $seperator . " " ?>Registration</h1>
	</div>
	<div id="content" class="container-fluid text-center">
	<form name="registrar" method="POST" action="register.php" onsubmit="return validateForm()">
<p name="status"></p>
Desired Username: <input type="text" name="Username" /><br />
Desired Password: <input type="password" name="Password" /><br />
Confirm Password: <input type="password" name="ConfirmPass" /><br />
Email Address: <input type="email" name="Email" /><br />
Confirm Email: <input type="email" name="ConfirmEmail" /><br />
<input type="submit" name="submit" value="Submit" />
</form>
	</div>
	<div id="footer" class="container-fluid text-center">
	&copy; 2016 Kinslow Web Management
	</div>
</div>

</body>
</html>
<?php
}
?>