<!DOCTYPE html>
<html>
<head>
	<title>Patients Details</title>
	<link rel="stylesheet" type="text/css" href="style1.css"/> 
	<link rel="icon" href="fav.png" type="image/gif" >

	<meta charset="utf-8">
	<style type="text/css">
		table{
			width: 30%;
		}
	</style>
	

</head>
<body>

	<?php 
	
//Start the session to see if the user is authencticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
//require('menu.php'); 
 
 /*Connect to mysql server*/ 
$link = mysqli_connect('localhost', 'root', '');  

echo '<h1>Staff Currently Available</h1>';


	echo"		<nav>
			<a href='main.php'>Home</a>
		<a href='p_record.php'>Patients</a>
		<a href='main_doc.php'>Doctors</a>
		<a href='main_room.php'>Rooms</a>
		<a href='med.php'>Medicine</a>
		<a href='staff.php'>Staff</a>
		<a href='log_out.php'>Log Out</a>
	</nav></nav>";


/*Check link to the mysql server*/ 
if(!$link)
{ 
die('Failed to connect to server: ' . mysql_error());
 } 

/*Select database*/ 
$db = mysqli_select_db($link,'hospital_management'); 
if(!$db)
{
 die("Unable to select database"); 
}

 /*Create query   SELECT patient.*, employee.E_NAME FROM patient, doctor_attendee, employee WHERE patient.P_ID = doctor_attendee.P_ID AND employee.E_ID = doctor_attendee.D_ID
*/ 
$qry = 'SELECT E_ID, E_NAME, JOB_TITLE
		FROM employee
		WHERE AVAILABLE LIKE "yes"
		ORDER BY JOB_TITLE'; 

/*Execute query*/ 
$result = mysqli_query($link,$qry);

 /*Draw the table for Players*/ 
echo '<table > 

<th> ID </th> 
<th> NAME </th> 
<th> JOB TITLE </th> 
';

/*Show the rows in the fetched result set one by one*/ 
while ($row = mysqli_fetch_assoc($result))
{ 
echo '<tr> 

<td>'.$row['E_ID'].'</td>
<td>'.$row['E_NAME'].'</td>
<td>'.$row['JOB_TITLE'].'</td>

</tr>'; 
}

echo '</table>';
} 
else{ 
header('location:login_form.php'); 
exit(); 
} 



	 ?>

</body>
</html>