<?php
function send_email($to, $subject, $ext_message, $ext_headers){
 
  
  $message = "<html>
<head>
<title>HTML email</title>
</head>
<body>
$ext_message
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <Giff_Me_Support>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";
$headers .= "$ext_headers";
mail($to,$subject,$message,$headers);
  //mail($to,$subject,$message,$from);
}
/*
function send_email($to, $subject, $ext_message, $ext_headers){
  
$message = "<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>"."$ext_message"."</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>

</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <Giff Me Support>' . "\r\n";
$headers .= "$ext_headers"//fix this
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);

}*/
?>