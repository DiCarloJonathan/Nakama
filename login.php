<?php include("_header.php");?>

<h1>Log in</h1>

<?php

// where is the user trying to get back to, after logging in?
$sendBackTo = isset($_REQUEST["sendBackTo"]) ? $_REQUEST["sendBackTo"] : "DisplayImgs.php";

if (isset($_POST["username"]) && isset($_POST["password"])) {
	// user is trying to log in; if valid login, then redirect to where the user is trying to get back to
	$username = $_POST["username"];
	$password = $_POST["password"];
	$hashedPassword = base64_encode(hash('sha256',$password . $username));

	$query = $mysqli->prepare("select userID from Users where userName = ? and password = ?");
	$query->bind_param("ss",$username, $hashedPassword);
	if ($query->execute()) {
		$query->bind_result($userID);
		while($query->fetch()){ 
			// if any rows come back, then the login is valid
			$_SESSION["userID"] = $userID;
			echo "<script>location.replace(".json_encode($sendBackTo).");</script>";
			exit();
		} 
		$query->close();
	}
	echo "Please enter a valid username and password.";
}

?>
<body>

<form method="post" action='login.php' class="inform">
<ul>
<li><label>Username:</label> <input type="text" name="username">
<li><label>Password:</label> <input type="password" name="password">
<li><input type=submit>
</ul>
<input type="hidden" name="sendBackTo" 
	value="<?= htmlspecialchars($sendBackTo) ?>">
</form>

<a href = 'http://web.engr.oregonstate.edu/~dicarloj/Nakama/forgot_username.php'> Forgot Username</a>
<a href = 'http://web.engr.oregonstate.edu/~dicarloj/Nakama/forgot_password.php'> Forgot Password</a>
</body>
<?php include("_footer.php");?>
