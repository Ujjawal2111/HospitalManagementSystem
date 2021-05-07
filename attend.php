<!DOCTYPE html>
<html>
<head>
	<title>Attendance Page</title>
	<link rel="stylesheet" type="text/css" href="form.css">
	<link rel="icon" href="fav.png" type="image/gif" >

	<style type="text/css">
		a{
			text-decoration: none;
		}
	</style>
		
</head>
<body>

<?php 
session_start(); 

if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 

	echo "
<header padding>
	<h2 align='center'> - Attendance - </h2> 	
</header>
	<nav>
		<a href='main.php'>Home</a>
		<a href='p_record.php'>Patients</a>
		<a href='main_doc.php'>Doctors</a>
		<a href='main_room.php'>Rooms</a>
		<a href='med.php'>Medicine</a>
		<a href='staff.php'>Staff</a>

		<a href='log_out.php'>Log Out</a>
	</nav>

<form name='myloginForm' method='post' action='attend_submit.php'> 
<table width='35%' height='35%'  align='center' cellpadding='5' cellspacing='0'> 
<tr> 
<td style='color:rgb(6,59,118)'><center><b>ID of Employee</b></center></td> 
<td><center> <input name='id' type='text' id='id' /></center></td> 
</tr>
<tr>
<td></td>
<td>
<input type='radio' id='yes' name='type' value='yes'>
<label for='yes'>Check IN</label><br>
</td>
</tr>
<tr>
<td></td>
<td>
<input type='radio' id='no' name='type' value='no'>
<label for='no'>Check Out</label><br>
	</td>
</tr>

</table> 

<div id = 'submit'>
	<center><input type='submit' name='submit' value='submit' padding = '10px'/></center></td> 
</div>

</form>";

} else{ 
	header('location:login_form.php'); 
	exit(); 
} 
?>


</body>
</html>

