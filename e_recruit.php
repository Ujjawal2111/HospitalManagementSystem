<!DOCTYPE html>
<html>
<head>
	<title>MAIN PAGE</title>
	<link rel="stylesheet" type="text/css" href="form.css">
	<link rel="icon" href="fav.png" type="image/gif" >

		
</head>
<body>

<?php 
session_start(); 

if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 

	echo "
<header padding>
	<h2 align='center'> - Enter Candidate's Details - </h2> 	
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

<form name='myloginForm' method='post' action='emp_recruit.php'> 
<table width='35%' height='35%'  align='center' cellpadding='5' cellspacing='0'> 
<tr> 
<td style='color:rgb(6,59,118)'><center><b>Name</b></center></td> 
<td><center> <input name='name' type='text' id='name' /></center></td> 
</tr>
<tr> 
<td style='color:rgb(6,59,118)'><center><b>Job Title</b></center></td> 
<td><center> <input name='jt' type='text' id='jt' /></center></td> 
</tr>
<tr> 
<td style='color:rgb(6,59,118) '><center><b>Sex</b></center></td> 
<td><center> <input name='sex' type='text' id='sex' /></center></td> 
</tr>
<tr> 
<td style='color:rgb(6,59,118) '><center><b>Address</b></center></td> 
<td><center> <input name='add' type='text' id='add' /></center></td> 
</tr>
<tr> 
<td style='color:rgb(6,59,118) '><center><b>Contact No</b></center></td> 
<td><center> <input name='cno' type='text' id='cno' /></center></td> 
</tr>
<tr> 
<td style='color:rgb(6,59,118) '><center><b>Salary</b></center></td> 
<td><center> <input name='sal' type='text' id='sal' /></center></td> 
</tr>
<tr> 
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

