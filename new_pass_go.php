<?php include("_header.php");?>

<?php checkAuth('http://web.engr.oregonstate.edu/~dicarloj/Nakama/invalid_key.php', 1) ?>

<?php
if (isset($_POST["password"])) {///rerrorcheck password and password2
	$password = $_POST["password"];
/*	&userID = $_SESSION["userID"];
	if($result = $mysqli->query("select userName,password from Users wheren userID = '$userID'")){//////////dont need this use email
		$obj = $result->fetch_object();
		$username = $obj->userName;
		$hashedPassword = base64_encode(hash('sha256',$password . $username));
	///set password to hashpassword in Users where userID = $user ID 
		echo 'Your password has been changed';
		$result->close();
	}*/
}
echo 'hi';
?>

<?php include("_footer.php");?>