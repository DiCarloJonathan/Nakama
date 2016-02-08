<?php include("_header.php");?>

<h1>Saving your submission...</h1>

<?php

if (isset($_POST["username"]) && isset($_POST["password"])&& isset($_POST["password2"])&& isset($_POST["email"])) {//add pass2 and email
	$username = $_POST["username"];
	$password = $_POST["password"];
	$password2 = $_POST["password2"];
	$email = $_POST["email"];

	$errorMsg = "";
	if ($username == "") {
		$errorMsg = "Please go back and enter a username.";
	}elseif($password == "") {
		$errorMsg = "Please go back and enter a password.";
	}elseif($password2 == "") {
		$errorMsg = "Please go back and Varify password.";
	}elseif($password != $password2) {
		$errorMsg = "Paswords do not match.";
	}elseif($email == "") {
		$errorMsg = "Please go back and enter an Email.";
	}else {
		// check if username is taken
		$query = $mysqli->prepare("select userID from Users where userName = ?");
		$query->bind_param("s",$username);
		if ($query->execute()) {
  			$query->bind_result($uid);

			if($query->fetch()){ 
				// if any rows come back, then this user exists already
				$errorMsg = "That username is taken. Go back and pick another.";
    			} 

			$query->close();
		}
	}//////////add email into it

	if ($errorMsg == "") {
		// ok, we can just insert the record
		$userGet = $mysqli->query("select theNum from oneNum");
		//$serID = $mysqli->query($userGet);
		echo $serID;
		$mysqli->query("update oneNum set theNum = theNum +1");
		$hashedPassword = base64_encode(hash('sha256',$password . $username));

		if ($stmt = $mysqli->prepare("insert into Users(userID,userName,password,email) values(?,?,?,?)")) {
			$stmt->bind_param("ssss",$serID, $username, $hashedPassword, $email);
	    		$stmt->execute();
			$stmt->close();
			echo '<p>Created... You may now <a href="login.php">log in...</a></p>';
		} else {
	  		printf("Error: %s\n", $mysqli->error);
		}
	} else {
		echo "<h4 class='error'>".htmlspecialchars($errorMsg)."</h4>";
	}
}


?>




<?php include("_footer.php");?>
