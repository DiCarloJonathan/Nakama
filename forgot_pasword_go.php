<?php include("_header.php");?>

<?php
function gen_ticket($user){
	return 1;
}

include ("email.php");
if (isset($_POST["email"])){
	$email = $_POST["email"];
	if($result = $mysqli->query("select userName from Users where email = '$email'")){//////////dont need this use email
		$obj = $result->fetch_object();
		$ticket = gen_ticket($obj->userName);
		//$currentUrl =rawurlencode('http://web.engr.oregonstate.edu/~dicarloj/Nakama/new_pass.php?email=$email&ticket=$ticket');
	
		//set ticket and email in data base with timer
		//$body = "click this link to reset your password: "."<a href = 'http://web.engr.oregonstate.edu/~dicarloj/Nakama/new_pass.php?email=$email&ticket=$ticket> Link</a> ";
		$body = "click this link to reset your password:"."http://web.engr.oregonstate.edu/~dicarloj/Nakama/new_pass.php?email=$email&ticket=$ticket";
		send_email("$email","Reset Your password", "$body","");
		
		echo "Email has been sent this may take a while";
		$result->close();
	}
	else 
		echo "Failed email, Please go back and try again";
	//$body = "click this link to reset your password: "."<a href = 'http://web.engr.oregonstate.edu/~dicarloj/Nakama/new_pass.php?email=$email&ticket=$ticket> Link</a> ";
}
?>

<?php include("_footer.php");?>
