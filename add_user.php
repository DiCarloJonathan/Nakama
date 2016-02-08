<?php include("_header.php");?>

<h1>Register</h1>

<form method="post" action='add_user_receive.php' class="inform">
<ul>
<li><label>Username:</label> <input type="text" name="username">
<li><label>Password:</label> <input type="password" name="password">
<li><label>Varify Password:</label> <input type="password" name="password2">
<li><label>Email:</label> <input type="text" name="email">


<li><input type=submit>
</ul>
</form>


<?php include("_footer.php");?>
