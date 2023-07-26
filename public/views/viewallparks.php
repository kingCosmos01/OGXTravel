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

?>

<table width="853" border="5" align="center">
 <tr>
    <td colspan="6" align="center">VIEW ALL PARKS</td>
    
  </tr>
  <tr>
    <td>SN</td>
    <td>PARK ID</td>
    <td>PARK NAME</td>
    <td>LOCATION</td>
    <td>STATE</td>
    <td>STATUS</td>
  </tr>
  
  <?php

$state;
$location;
$park;
$status;
$parkid;
$sn=1;
$result = $conn->query("SELECT * FROM parks");
								while($rowcourse = mysqli_fetch_array($result)){
								//parkid, parks, location, state, status
								
?>
  <tr>
  <td><?php echo $sn;?></td>
    <td><?php echo $rowcourse['parkid'];?></td>
    <td><?php echo $rowcourse['parks'];?></td>
    <td><?php echo $rowcourse['location'];?></td>
    <td><?php echo $rowcourse['state'];?></td>
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
