<?php

	session_start();
	
	error_reporting(0);

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "lupertransport";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
	//	include('include/config.php');

	
			if(isset($_POST['submit']))
		{	
		
$email=$_POST["email"];
$phoneno=$_POST["phoneno"];
$firstname=$_POST["firstname"];
$lastname=$_POST["lastnName"];
$address=$_POST["address"];
$nextofkin=$_POST["nok"];
$nokphoneno=$_POST["nokPhoneno"];
$status="1";
$driverid=$phoneno.$firstname;


echo "Driver_ID :".$driverid;
echo "<br>";
echo "Email: ".$email;
echo "<br>";
echo "Phone_No:".$phoneno;
echo "<br>";
echo "First_Name: ".$firstname;
echo "<br>";
echo "Last_Name: ".$lastname;
echo "<br>";
echo "address:".$address;
echo "<br>";
echo "next_of_kin:".$nextofkin;
echo "<br>";
echo "Next_of_Kin_Phone_No: ".$nokphoneno;
echo "<br>";
echo "Status: " .$status;

$sql= "insert into drivers(driverid, email, phoneno, firstname, lastname, address, nextofkin, nextofkinphoneno, status ) 
values ('$driverid','$email','$phoneno','$firstname','$lastname','$address','$nextofkin','$nokphoneno','$status' )";
if (mysqli_query($conn, $sql)) {
echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//====================================

//=============================
}
?>

<html>
<head>
<title>Add Driver</title>
</head>
<body>
<form name="Landapp2" id="formland" method="post" onSubmit="return valid();">

<table border="5" align="center">
<tr><td colspan="2" align="center">ADD NEW DRIVER</td></tr>
<tr>
<td>
<label>Email</label></td><td>
<input type="text" name="email" required="required"></td></tr>
<tr>
<td>
<label>Phone No</label></td><td>
<input type="text" name="phoneno"></td></tr>
<tr>
<td>
<label>First Name</label></td><td>
<input type="text" name="firstname"></td></tr>
<tr>
<td>
<label>Last Name</label></td><td>
<input type="text" name="lastnName"></td></tr>
<tr>
<td>
<label>Address</label></td><td>
<input type="text" name="address"></td></tr>
<tr>
<td>
<label>Next of kin</label></td><td>
<input type="text" name="nok"></td></tr>
<tr>
<td>
<label>Next of Kin Phone No</label></td><td>
<input type="text" name="nokPhoneno"></td></tr>
<tr>
<td colspan="2" align="center">
<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">submit</button></td> 

<table>
</form>
</body>
</html>