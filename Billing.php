<!DOCTYPE html>
<html>
<head>
	<title>Bill Desk</title>
	<link rel="stylesheet" type="text/css" href="sst.css">
	<link rel="icon" href="fav.png" type="image/gif" >

</head>
<body>



<?php
session_start(); 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 


if ($_POST['submit'] == 'submit'){

$validationFlag = true; 
 


$pid = $_POST['pid']; 
if($validationFlag){ 
$link = mysqli_connect('localhost', 'root', ''); 

if(!$link){ 
die('Failed to connect to server: ' . mysql_error()); 
} 
$db = mysqli_select_db($link,'hospital_management'); 
if(!$db){ 
die("Unable to select database"); 
} 


$qry = mysqli_query($link, "SELECT P_NAME FROM patient WHERE P_ID = $pid ");
if($qry == FALSE)
	echo mysqli_error($link) . '<br>';
else{
		$row = mysqli_fetch_array($qry);
	$val =  $row[0];
}


echo "
	<header>
		<h2 align='center'>  Patient : ". $val. "  </h2> 
	</header>
	
	<nav>
		<a href='main.php'>Home</a>
		<a href='p_record.php'>Patients</a>
		<a href='main_doc.php'>Doctors</a>
		<a href='main_room.php'>Rooms</a>
		<a href='med.php'>Medicine</a>
		<a href='staff.php'>Staff</a>
		<a href='log_out.php'>Log Out</a>
</nav>";



$q = mysqli_query($link, "SELECT medicine_taken.CODE,medicine_taken.PRICE,medicine_taken.QUANTITY, medicine.M_NAME FROM medicine_taken, medicine WHERE P_ID = $pid AND medicine.CODE = medicine_taken.CODE");
if($q == FALSE)
	echo mysqli_error($link) . '<br>';
else{
	echo '<center><div class = side>

	<h3> Medicines Taken by patient</h3>
	<table > 

<th> Code </th> 
 <th> Name </th>
<th> Price </th>
<th> Quantity </th>
 ';

$amt  = 0;

while ($row = mysqli_fetch_assoc($q))
{ 
echo '<tr> 

<td>'.$row['CODE'].'</td>
<td>'.$row['M_NAME'].'</td>
<td>'.$row['PRICE'].'</td>
<td>'.$row['QUANTITY'].'</td>
</tr>'; 

$amt = $amt + $row['PRICE']*$row['QUANTITY'];

}

$query = "SELECT DATE_ADMITTED FROM patient WHERE P_ID = $pid"; 
//Execute query 
$results = mysqli_query($link,$query); 

if($results == FALSE)
	echo mysqli_error() . '<br>';
else{
	$row = mysqli_fetch_array($results);
	$dat =  $row[0];
}
 
$current_date = date("Y-m-d h:m:s");

$qy = "SELECT DATEDIFF( '$current_date', '$dat') AS DateDiff"; 
//Execute query 
$results = mysqli_query($link,$qy); 

if($results == FALSE)
	echo mysqli_error() . '<br>';
else{
	$row = mysqli_fetch_array($results);
	$dat =  $row[0];
}

echo '</table></div>';

echo '<div class = side ><h3><center>Medicine Cost : ' . $amt . '</center></h3>';

echo '<h3><center>Number of Days : '. $dat .'</center></h3>';

echo '<h3><center>Doctor\'s  Fee : 650 </center></h3>';


$charge = $dat * 1200;

echo '<h3><center>Hospital Charges : '. $charge .'</center></h3>';

$amt = $amt + $charge + 650;

echo '<h2><center>Net Amount :'. $amt  .'</center></h2></div></center>';
	
}

echo "<form name='myloginForm' method='post' action = 'cnfdischarge.php'> 
<div id = 'submit'>
	<center><input type='submit' name='Discharge' value='Discharge' padding = '10px'/></center></td> 
</div></form>";


//Check if query executes successfully
 /*
if($results == FALSE) 
echo mysqli_error($link) . '<br>'; 
else {
echo '<h2><center>Medicine Bought successfully!!!</center></h2> '; 
header('location:medStore.php');
*/
}
}

} 
 

else{ 
header('location:login_form.php'); 
exit(); 
} 
?>


</body>
</html>