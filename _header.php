<?php 
session_start(); 


function currentUrl() {
	$pageURL = 'http';
	if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["SCRIPT_NAME"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["SCRIPT_NAME"];
	}
	// FYI: You could also append the query string if that was important to you
	return $pageURL;
}

// returns the user's uid if logged in
// or returns "" <-- in this case, pass $redirectIfNeeded = true to force login
function checkAuth($redirectIfNeeded = 'cur', $go_elsewhere= 0) {
	// is the user already logged in?
	if (isset($_SESSION["userID"]) && $_SESSION["userID"] != "") {
		// yes, already logged in
		//echo 'sup';
		return $_SESSION["userID"];
	} else if ($redirectIfNeeded) {
		// user is not logged in and needs to do so
		// send to the login page

		echo 'somber';
		// pass the current URL so that we can come back here after login
		if($redirectIfNeeded === 'cur'){
			$currentUrl = currentUrl();
		}else{
			$currentUrl = $redirectIfNeeded;
		}
		// rawurlencode converts the string so it's safe to pass as a URL GET parameter
		if($go_elsewhere === 1){
			$urlGoTo = $currentUrl;
		}else
			$urlGoTo = "login.php?sendBackTo=".rawurlencode($currentUrl)."&cb=".microtime(true);
		// use a JavaScript redirect; FYI, there's also an http header (Location:) that 
		//    can be used to redirect, but that MUST be sent before any HTML, and this 
		//    function (checkAuth) might be called after some HTML is sent
		echo "<script>location.replace('$urlGoTo');</script>";
		return "";
	} else {
		// user is not logged in, but whoever called this function doesn't care
		echo 'hi'.'$_SESSION["userID"]';
		return "";
	}
}


?>

<html><head>
<title>My example application</title>
<link rel="stylesheet" type="text/css" href="style.css">


</head>
<body>
<nav>

<a href="index.php">Home</a>
<a href="add_course.php">Add course</a>
<a href="add_user.php">Register</a>
<a href="logout.php?cb=<?= microtime(true) ?>">Logout</a>

</nav>
<main>



<?php
ini_set('display_errors', 'On');
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","mugicaj-db","A9m4Bu2nBA0JDc1P","mugicaj-db");
?>
