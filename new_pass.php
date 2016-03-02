<?php include("_header.php");?>



<?php
//if. $_GET["email"],. $_GET["ticket"] {}

if (isset($_GET["email"]) && isset($_GET["ticket"])) {
	// user is trying to log in; if valid login, then redirect to where the user is trying to get back to
	$email = $_GET["email"];
	$ticket = $_GET["ticket"];
//	$hashedPassword = base64_encode(hash('sha256',$password . $username));

	$query = $mysqli->prepare("select userID from Temp where email = ? and ticket = ?");////fix to our database
	$query->bind_param("ss",$email, $ticket);
	if ($query->execute()) {
		$query->bind_result($userID);
		while($query->fetch()){ 
			// if any rows come back, then the login is valid
			$_SESSION["userID"] = $userID;		
			exit();
		} 
		$query->close();///////////////delete row
	}else
		echo "<script>location.replace(".json_encode($sendBackTo).");</script>";///send corect place
}else
		echo "<script>location.replace(".json_encode($sendBackTo).");</script>";/// send correct place

?>

//}else
//redirect away say ticket has expired
?>
<form method="post" action='new_pass_go.php' class="inform">
<ul>
<li><label>Password:</label> <input type="password" name="password">
<li><label>Varify Password:</label> <input type="password" name="password2">
<li><input type=submit>
</ul>
<input type="hidden" name="sendBackTo" 
	value="<?= htmlspecialchars($sendBackTo) ?>">
</form>

<?php include("_footer.php");?>