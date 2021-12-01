<?php
	require_once("system/functions.php");
	require_once("system/config.php");
	ini_set("display_errors", "true");
	if ($maintenance == true){
		echo "This Website is currently down for maintenance!";
	}
	elseif ($maintenance == false){
	$file = null;
	$filepath = "";
	$Read = "";
	$UserValid = true;
	$EmailValid = true;
	$userId = 0;
	$user = $_POST["Username"];
	$pass = $_POST["Password"];
	$confirmPass = $_POST["ConfirmPass"];
	$email = $_POST["Email"];
	$confirmEmail = $_POST["ConfirmEmail"];
	//Uncomment Echo Statement to make sure that your page is recieving the form data
	//echo "$user $pass $confirmPass $email $confirmEmail";
	if ($user == ""){
		echo "You must Provide A Username";
	}elseif ($pass == ""){
		echo "You must Provide A Password";
	}elseif ($confirmPass == ""){
		echo "You must Confirm Your Password";
	}elseif ($email == ""){
		echo "You must Provide An Email Address";
	}elseif ($confirmEmail == ""){
		echo "You must Confirm Your Email Address";
	}elseif ($pass != $confirmPass){
		echo "The two passwords must match";
	}elseif ($email != $confirmEmail){
		echo "The two email addresses must match";
	}

	
	//Echos when successfully connected to database
	//echo "Connected successfully";
	// Checks to see if username already exists
	$sql = "SELECT * FROM Users WHERE Username='" . $user ."'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0){
		// output data of each row
		$UserValid = false;
	}else{
		$UserValid = true;
	}
	// Checks to see if email address is already linked to an account
	$sql = "SELECT * FROM Users WHERE Email='" . $email ."'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0){
		// output data of each row
		$EmailValid = false;
	}else{
		$EmailValid = true;
	}

	if (!$UserValid){
		die("Username already exists!");
	}elseif (!$EmailValid){
		die("Email Address already used for another account!");
	}
	// Echo saying username and email available
	//echo "Username and Email Address Available!"
	//$passHash = password_hash($pass);

	$sql = "INSERT INTO Users (Username, Password, Email) VALUES ('" . $user . "', '" . $pass . "', '" . $email . "')";
	if (mysqli_query($conn, $sql)) {
		echo "You have successfully registered!\n";
	} else {
		die("Error: " . $sql . "<br />" . mysqli_error($conn));
	}

	$sql = "SELECT * FROM Users WHERE Username='" . $user ."'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);
		$userId = $row["id"];
	} else {
		die ("Unable to fetch UserID!");
	}

	if (1 == 1) {
		$filepath = "system/data/characters/" . $userId . ".xml";
		$file = fopen($filepath, "a+");
		if (!$file){
			die("Error opening characters file!");
		}else{
			fclose($file);
			$userCharacter = simplexml_load_file("system/data/characters/template.xml");
			$userCharacter->character[0]->name = $user;
			$userCharacter->saveXML($filepath);
			echo "Successfully wrote Character file.";
		}
	}else{
		die("Error copying characters template file!");
	}

	// Tie up any loose ends
	mysqli_close($conn);
}
?>
