<!DOCTYPE html>
<html>
<head>
<?php

////This is functionality need to hook it to site.
$img=$_FILES['img'];
if(isset($_POST['submit'])){ 
 if($img['name']==''){  
  echo "<h2>An Image Please.</h2>";
 }else{
  $filename = $img['tmp_name'];
  $client_id="ee8ea002d5494d8";
  $handle = fopen($filename, "r");
  $data = fread($handle, filesize($filename));
  $pvars   = array('image' => base64_encode($data));
  $timeout = 30;
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
  curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
  $out = curl_exec($curl);
  curl_close ($curl);
  $pms = json_decode($out,true);
  $url=$pms['data']['link'];
  if($url!=""){
   echo "<h2>Uploaded Without Any Problem</h2>";
   echo "<img src='$url' alt= 'looks like we failed' height='100' width='100' />";
  }else{
   echo "<h2>There's a Problem</h2>";
   echo $pms['data']['error'];  
  } 
 }
}
echo "$url";




$user = 0; //Set to 0 for now, will eventually take in the userID of the person currently logged in.


$mysqli = new mysqli("oniddb.cws.oregonstate.edu","mugicaj-db","RUjIVbuU8O3ucwM3","mugicaj-db");



if($url != ""){

if(!$mysqli->query("insert into Links(UID,url1,url2,url3,url4,url5) values($user,'$url','workDamnYou','dummy','dummy','dummy')")){
	printf("Did not save to database");
    }
}
    
 

?>

    <form action="upload.php" enctype="multipart/form-data" method="POST">
 	Choose Image : <input name="img" size="35" type="file"/><br/>
 	<input type="submit" name="submit" value="Upload"/>
</form>
</html> 