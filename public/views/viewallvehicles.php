<?php
session_start();
		error_reporting(0);
		include('include/config.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>View All Vehicles</title>
</head>

<body>
<table width="1086" border="5" align="center">
<tr><td colspan="6" align="center"> VIEW ALL VEHICLES</td></tr>
  <tr>
  <td width="44">SN</td>
    <td width="234">VEHICLE NUMBER</td>
    <td width="183">TYPE OF VEHICLE</td>
    <td width="97">MODEL</td>
    <td width="199">NUMBER OF SEATS</td>
    
    <td width="158">STATUS</td>
  </tr> 
  <?php

$vehicleid;
$vehicletype;
$model;
$noofseats;
$status=1;
$sn=1;
$result = $conn->query("SELECT * FROM vehicles");
								while($rowcourse = mysqli_fetch_array($result)){
								//parkid, parks, location, state, status
								
?>
  <tr>
  <td><?php echo $sn;?></td>
    <td><?php echo $rowcourse['vehicleid'];?></td>
    <td><?php echo $rowcourse['vehicletype'];?></td>
    <td><?php echo $rowcourse['model'];?></td>
    <td><?php echo $rowcourse['noofseats'];?></td>
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
