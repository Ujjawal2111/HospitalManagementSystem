 
<?php 
session_start(); 
session_unset(); 
session_destroy(); 
?> 
<html> 
<head> 
<title>Login Page</title> 
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="icon" href="fav.png" type="image/gif" >
<style type="text/css">
	table{
		margin-top: 15px;
	}
	
	


</style>
</head> 
<body> 
<header>
	<h2 align="center"> - Enter your login Details - </h2> 	
</header>

<form name="myloginForm" method="post" action="login_check.php"> 
<table width="35%" height="35%"  align="center" cellpadding="5" cellspacing="0"> 
<tr> 
<td style="color:rgb(6,59,118) "><center><b>Username</b></center></td> 
<td><center> <input name="login" type="text" id="login" /></center></td> 
</tr> 
<tr> 
<td style="color:rgb(6,59,118)"><center><b>Password</b></center></td> 
<td><center><input name="password" type="password" s/></center></td> 
</tr> 
</table> 
<div id = 'submit'>
	<center><input type="submit" name="submit" value="Login" padding = '10px'/></center></td> 
</div>

</form>
</body> 
</html>
