
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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>View All Drivers</title>
</head>

<body>
<table width="1289" border="5" align="center">
<tr><td colspan="10" align="center"> VIEW ALL DRIVERS</td></tr>
  <tr>
  <td width="44">SN</td>
    <td width="234">DRIVER ID</td>
    <td width="183">EMAIL</td>
    <td width="97">PHONE NUMBER</td>
    <td width="199">FIRST NAME</td>
        <td width="158">LAST NAME</td>
		<td width="158">ADDRESS</td>
		<td width="158">NEXT OF KIN</td>
		<td width="158">NEXT OF KIN PHONE NUMBER</td>
		
		<td width="158">STATUS</td>
  </tr> 
  <?php

$email;
$phoneno;
$firstname;
$lastname;
$address;
$nextofkin;
$nokphoneno;
$status="1";
$driverid=$phoneno.$firstname;

$sn=1;
$result = $conn->query("SELECT * FROM drivers");
								while($rowcourse = mysqli_fetch_array($result)){
//driverid, email, phoneno, firstname, lastname, address, nextofkin, nextofkinphoneno, status
								
?>
  <tr>
  <td><?php echo $sn;?></td>
    <td><?php echo $rowcourse['driverid'];?></td>
    <td><?php echo $rowcourse['email'];?></td>
    <td><?php echo $rowcourse['phoneno'];?></td>
    <td><?php echo $rowcourse['firstname'];?></td>
	 <td><?php echo $rowcourse['lastname'];?></td>
    <td><?php echo $rowcourse['address'];?></td>
    <td><?php echo $rowcourse['nextofkin'];?></td>
    <td><?php echo $rowcourse['nextofkinphoneno'];?></td>
   
    <td><?php 
	
	if($rowcourse['status'] ==1){
	echo "Active";
	}else{
	
	echo "Inactive";
	}
	
	
	?></td>
    
  </tr>
  <?php 
											
									$sn=$sn+1;
											}
											
											 ?>
</table>
</body>
</html>
