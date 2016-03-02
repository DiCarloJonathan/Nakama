<?php include("_header.php");?>
<?php

function put_to_server($url){
	
	$user = rand(1810, 2015);
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","mugicaj-db","A9m4Bu2nBA0JDc1P","mugicaj-db");
	if(!($mysqli->query("insert into Links(UID,url) values($user,'$url')"))){
		printf("Did not save to database");
    }
 
}

function do_stuf($im){
$img=$im;
//if(isset($_POST['submit'])){ 
// if($img['name']==''){  
//  echo "<h2>An Image Please.</h2>";
// }else{
  $filename = $im;//$img['tmp_name'];
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
	put_to_server($url);
	echo "<h2>Uploaded Without Any Problem</h2>";
   
  }else{
   echo "<h2>There's a Problem: Imgur</h2>";
   echo $pms['data']['error'];  
 // } 
 //}
}
}

$dirname = "memeFaces/";
$images = glob($dirname."*.png");
foreach($images as $image) {
do_stuf($image);
}

?>


<?php include("_footer.php");?> 