<?php include("_header.php");?>

<?php
include ("email.php");
if (isset($_POST["username"])){
	$username = $_POST["username"];
	if($result = $mysqli->query("select email from Users where userName == $username")){//////////ned to fix
		$body = "click this link to reset your password: "."put my sql var here";///////////need to send email that takes you to web page ask teacher how to keep well.
		send_email("$email","Reset Your password", "$body","");
		
		echo "Email has been sent this may take a while";
	}
	else 
		echo "Failed username, Please go back and try again";
//}
}
?>

<?php include("_footer.php");?>
