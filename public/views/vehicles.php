<?php
session_start();
		error_reporting(0);
		$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lupertransportdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
	//	include('include/config.php');


			if(isset($_POST['submit']))
		{	
	
$vehicleid=$_POST["vehicleid"];
$vehicletype=$_POST["typeofvehicle"];
$model=$_POST["model"];
$noofseats=$_POST["noofseat"];
$status=1;

echo "vehicleid :".$vehicleid;
echo "<br>";
echo "typeofvehicle: ".$typeofvehicle;
echo "<br>";
echo "model: ".$model;
echo "<br>";
echo "noofseat : ".$noofseat;
echo "<br>";
echo "status : ".$status;

$sql="insert into vehicles(vehicleid, vehicletype, model, noofseats, status) values ('$vehicleid','$vehicletype','$model','$noofseats','$status')";
if(mysqli_query($conn, $sql)){
echo "new Record created succesfully";
}else {
echo "Error: ".$sql. "<br>".mysqli_error($conn);
}
mysqli_close($conn);




}

?>



<html>
<head>
<title>my title</title>
</head>
<body>
<form name="ogxdb" id="vehicle" method="post" onSubmit="return valid();">
<tr>
<table border="5" align="center">
<tr><td colspan="2" align="center">ADD NEW VEHICLES</td></tr>
<td>
<label> VEHICLE NUMBER</label></td><td>
<input type="text" name="vehicleid"></td></tr>
<tr>
<td>
<label>TYPE OF VEHICLE</label></td><td>
<input type="text" name="typeofvehicle"></td></tr>
<tr>
<td>
<label> MODEL</label></td><td>
<input type="text" name="model"></td></tr>
<tr>
<td>
<label>NUMBER OF SEATS</label></td><td>
<input type="text" name="noofseat"></td></tr>

<tr>
<td colspan="2" align="center">
<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">submit</button></td>
</tr>
</table>
</form>
</body>
</html>
