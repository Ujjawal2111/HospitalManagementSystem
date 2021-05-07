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

echo '<h1>Vacant Rooms</h1>';


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

 //SELECT room.ROOM_ID room.ROOM_TYPE FROM room WHERE NOT EXISTS ( SELECT room_assigned.ROOM_ID FROM room_assigned WHERE room_assigned.ROOM_ID = room.ROOM_ID )

$qry = 'SELECT room.ROOM_ID, room.ROOM_TYPE FROM room WHERE NOT EXISTS ( SELECT room_assigned.ROOM_ID FROM room_assigned WHERE room_assigned.ROOM_ID = room.ROOM_ID )'; 

/*Execute query*/ 
$result = mysqli_query($link,$qry);


 /*Draw the table for Players*/ 
echo '<table > 

<th> Room ID </th> 
<th> Room Type </th>
 ';

/*Show the rows in the fetched result set one by one*/ 
while ($row = mysqli_fetch_array($result))
{ 
echo '<tr> 
<td>'.$row['ROOM_ID'].'</td>
<td>'.$row['ROOM_TYPE'].'</td>
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