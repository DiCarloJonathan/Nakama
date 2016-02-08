<?php include("_header.php");?>

<?php
include ("email.php");
//$email = "dicarlojonathan@gmail.com";
if (isset($_POST["email"])){
	$email = $_POST["email"];
	if($result = $mysqli->query("select userName from Users where email == $email")){//////////ned to fix
		$body = "Your User name is: "."put my sql var here";
		send_email("$email","Your Giff Me Username", "$body","");
		echo "Email has been sent this may take a while";
	}
	else 
		echo "Failed email, Please go back and try again";
//}
}
?>

<?php include("_footer.php");?>