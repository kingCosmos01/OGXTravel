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
		
$state=$_POST["state"];
$location=$_POST["location"];
$park=$_POST["park"];
$status="1";
$parkid=$state ." ".$location." ".$park;
echo $state;
echo $location;
echo $park;
echo $status;
echo $parkid;


$sql= "insert into  parks(parkid, parks, location, state, status) values ('$parkid','$park','$location', '$state','$status')";
if (mysqli_query($conn, $sql)) {
		//mysqli_query($conn, $sql1);
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
		
echo "State :".$state;
echo "<br>";
echo "Location: ".$location;
echo "<br>";
echo "Park: ".$park;
echo "<br>";
echo "Status : ".status;

}

?>




<html>
<head>
<title>Parks</title>
</head>
<body>
<form name="ogxdb" id="formland" method="post" onsubmit="return valid();">
<table border="5" align="center">
<tr>
<td>
<label>Park Name</label></td><td>
<input type="text" name="park"></td></tr>
<tr>
<td>
<label>State</label></td><td><select name="state">
<option>Abia </option>
<option>Adamawa </option>
<option>Akwa Ibom </option>
<option>Anambra </option>
<option>Bauchi </option>
<option>Bayelsa </option>
<option>Benue </option>
<option>Borno </option>
<option>Cross </option>
<option>Delta  </option>
<option>Ebonyi  </option>
<option>Edo  </option>
<option>Ekiti  </option>
<option>Enugu  </option>
<option>Gombe  </option>
<option>Imo  </option>
<option>Jigawa  </option>
<option>Kaduna  </option>
<option>Kano  </option>
<option>Katsina  </option>
<option>Kebbi  </option>
<option>Kogi  </option>
<option>Kwara  </option>
<option>Lagos </option>
<option>Nasarawa  </option>
<option>Niger  </option>
<option>Ogun  </option>
<option>Ondo  </option>
<option> Osun </option>
<option>Oyo  </option>
<option>Plateau </option>
<option>Rivers  </option>
<option>Sokoto  </option>
<option>Taraba  </option>
<option>Yobe  </option>
<option>Zamfara  </option>
</select>
</td></tr>
<tr>
<td>
<label>Location</label></td><td><select name="location">
<option>Umuahia</option>
<option>Yola </option>
<option>Uyo </option>
<option>Awka </option>
<option> Bauchi </option>
<option> Yenagoa </option>
<option> Makurdi</option>
<option> Maiduguri</option>
<option> Calabar</option>
<option> Asaba</option>
<option> Abakaliki</option>
<option> Benin City</option>
<option> Ado Ekiti</option>
<option> Enugu  </option>
<option >Gombe  </option>
<option> Owerri</option>
<option> Dutse</option>
<option> Kaduna  </option>
<option> Kano  </option>
<option> Katsina  </option>
<option> Birnin Kebbi</option>
<option> Lokoja</option>
<option> Ilorin</option>
<option> Ikeja</option>
<option> Lafia</option>
<option> Minna</option>
<option> Abeokuta</option>
<option> Akure</option>
<option> Oshogbo</option>
<option> Ibadan</option>
<option> Jos</option>
<option> Port Harcourt</option>
<option> Damaturu</option>
<option>Gusau  </option>
</select>
</td></tr>
<tr>
<td></td>
<td><button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">submit</button>
</td></tr>
</table>
</body>
</html>