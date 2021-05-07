<!DOCTYPE html>
<html>
<head>
	<title>Admission Processs</title>
	<link rel="stylesheet" type="text/css" href="mai_css.css">
	<link rel="icon" href="fav.png" type="image/gif" >

</head>
<body>



<?php
session_start(); 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 

echo "
	<header>
		<h2 align='center'> - Admisssion Process - </h2> 
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

if ($_POST['Add'] == 'Add'){

$validationFlag = true; 
 


$pid = $_POST['pid']; 
$code = $_POST['code']; 
$qty = $_POST['qty']; 

if($validationFlag){ 
$link = mysqli_connect('localhost', 'root', ''); 

if(!$link){ 
die('Failed to connect to server: ' . mysql_error()); 
} 
$db = mysqli_select_db($link,'hospital_management'); 
if(!$db){ 
die("Unable to select database"); 
} 

$q = mysqli_query($link, "SELECT PRICE FROM medicine WHERE CODE = $code");
if($q == FALSE)
	echo mysqli_error($link) . '<br>';
else{
	$row = mysqli_fetch_array($q);
	$price =  $row[0];
	echo "Medicine price found!!!";
}

//echo "ID generated as " . $val . "  " . date('Y-m-d');


$query = "INSERT INTO medicine_taken VALUES ($pid,$code,$price, $qty)"; 
//Execute query 
$results = mysqli_query($link,$query); 
 
//Check if query executes successfully 
if($results == FALSE) 
echo mysqli_error($link) . '<br>'; 
else {
echo '<h2><center>Medicine Bought successfully!!!</center></h2> '; 
header('location:medStore.php');

}
}

} 
 
if ($_POST['Done'] == 'Done'){

header('location:main.php');
}
 
} 
else{ 
header('location:login_form.php'); 
exit(); 
} 
?>


</body>
</html>