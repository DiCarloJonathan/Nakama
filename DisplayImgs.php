<?php include("_header.php");?>
<?php
checkAuth(); 
?>
<?php

/*$con = mysqli_connect("oniddb.cws.oregonstate.edu","mugicaj-db","A9m4Bu2nBA0JDc1P");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
*/
//mysql_select_db("mugicaj-db", $con);

$user = $_SESSION["userID"];

$result = $mysqli->query("SELECT url FROM Links WHERE UID = '$user'");

while($row = $result->fetch_array(MYSQLI_ASSOC))
  {
   $urlname = $row['url'];
   
   echo "<img src= $urlname alt= 'looks like we failed' height='200' width='200' />"."<BR>";///figure out better set up
  }

//mysqli_close($con);
?>
<?php include("_footer.php");?> 