<!DOCTYPE html>
<html>
<head>
<script>
function myFunction() {
    document.getElementById("demo").innerHTML = "Paragraph changed.";
}
</script>
</head>

<body>

<h1>JavaScript in Head</h1>

<p id="demo">A Paragraph.</p>

<button type="button" onclick="myFunction()">Try it</button>

</body>
<?php

$user = 932249894;


$mysqli = new mysqli("oniddb.cws.oregonstate.edu","mugicaj-db","RUjIVbuU8O3ucwM3","mugicaj-db");



if(!$mysqli->query("insert into Users(UserID,LastName,FirstName) values($user,'Mugica','Juan')")){
	printf("An utter failure");
}
 

if($_POST['formSubmit'] == "Submit") 
  {
    $varLink = $_POST['formLink'];
    printf($varlink);
    if(!$mysqli->query("insert into LINKS(UserID,url1,url2) values('932249894',$varLink,'dummy')")){
	printf("An utter failure numero 2");
    }

    
    
    
  }




?>

<form action="test.php" method="post">
    Input an image link:   
    <input type="text" name="formLink" maxlength="50" value="<?=$varLink;?>">
 
    
    <input type="submit" name="formSubmit" value="Submit">
</form>

</html> 