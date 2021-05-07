<!DOCTYPE html>
<html>
<head>
	<title>Patients Details</title>
	<link rel="stylesheet" type="text/css" href="style1.css"/> 
	<link rel="icon" href="fav.png" type="image/gif" >

	<meta charset="utf-8">
	

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

echo '<h1>The Patients Details</h1>';


	echo"		<nav>
		<a href='main.php'>Home</a>
		<a href='p_record.php'>Patients</a>
		<a href='main_doc.php'>Doctors</a>
		<a href='main_room.php'>Rooms</a>
		<a href='med.php'>Medicine</a>
		<a href='staff.php'>Staff</a>
		<a href='log_out.php'>Log Out</a>
	</nav>";


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
$qry = 'SELECT patient.*, employee.E_NAME FROM patient, doctor_attendee, employee WHERE patient.P_ID = doctor_attendee.P_ID AND employee.E_ID = doctor_attendee.D_ID ORDER BY patient.DATE_ADMITTED
	
	'; 

/*Execute query*/ 
$result = mysqli_query($link,$qry);

 /*Draw the table for Players*/ 
echo '<table > 

<th> P_ID </th> 
<th> NAME </th>
<th> Doctor Incharge </th>
 <th> SEX </th>
 <th> ADDRESS </th>
 <th> DATE ADMITTED </th>
  <th> DATE DISCHARGED </th>
 <th> CONTACT NO. </th> ';

/*Show the rows in the fetched result set one by one*/ 
while ($row = mysqli_fetch_assoc($result))
{ 
echo '<tr> 

<td>'.$row['P_ID'].'</td>
<td>'.$row['P_NAME'].'</td>
<td>'.$row['E_NAME'].'</td>
<td>'.$row['SEX'].'</td>
<td>'.$row['P_ADDRESS'].'</td>
<td>'.$row['DATE_ADMITTED'].'</td>
<td>'.$row['DATE_DISCHARGED'].'</td>
<td>'.$row['CONTACT_NO'].'</td> 
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