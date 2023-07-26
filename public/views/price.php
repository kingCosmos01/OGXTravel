<?php

	session_start();

	require_once '../../app/Database.php';
	require_once '../../app/PriceManager.php';
	require_once '../../app/ParkManager.php';
	require_once '../../app/VehicleManager.php';

	$parkManagerOBJ = new ParkManager();
	$parkData = $parkManagerOBJ->GetAllParks();

	$vehicleManagerOBJ = new VehicleManager();
	$vehicleData = $vehicleManagerOBJ->GetAllVehicles();


	if(isset($_POST['submit_price']))
	{
		$source = htmlentities($_POST['from']);
		$destination = htmlentities($_POST['to']);
		$vehicle = htmlentities($_POST['vehicle']);
		$noOfSeats = htmlentities($_POST['noofseats']);
		$unitPrice = htmlentities($_POST['unitprice']);

		$data = [
			"source" => $source,
			"destination" => $destination,			
			"vehicle" => $vehicle,
			"noOfSeats" => $vehicleData[0]['noofseats'],
			"unitPrice" => $unitPrice
		];

		$priceManagerOBJ = new PriceManager();
		$priceManagerOBJ->SetPrice($data);
	}


?>

<html>
<head>
<title>Price</title>
</head>

<body>

	<?php 
		if(isset($priceManagerOBJ->message))
		{
			echo "<div style='position:absolute;display:flex;top:10%;left:75%;padding:10px;background:green;color:white;text-align:center;'>" . $priceManagerOBJ->message . "</div>";
			header("refresh:1");
		}
	?>

<form name="ogxdb" id="formland" method="post" onSubmit="return valid();">

<table width="559" border="5" align="center">
<tr><td colspan="2" align="center">PRICE SETUP</td></tr>
  
<tr>
    <td>FROM</td>
	<td>
		<select name="from">
		<?php foreach ($parkData as $key => $park) { ?>
			<option><?php echo $park['parkid']; ?></option>
		<?php } ?>
       </select>
	</td>
</tr>

<tr>
    <td>TO</td>
	<td>
		<select name="to">
		<?php foreach ($parkData as $key => $park) { ?>
			<option><?php echo $park['parkid']; ?></option>
		<?php } ?>
		</select>
	</td>
</tr>

<tr>
    <td>VEHICLE</td>    
	<td>
		<select name="vehicle">
		<?php foreach ($vehicleData as $key => $vehicle) { ?>
            <option><?php echo $newVehicle =  ( $vehicle['vehicletype'] .$vehicle['noofseats'] ); ?></option>
          <?php } ?>
		</select>
	</td>
</tr>

<tr>
    <td>NUMBER OF SEATS</td>    
	<td><input type="text" name="noofseats" required="required"></td>
</tr>

<tr>
	<td>PRICE</td>
	<td><input type="text" name="unitprice" required="required"></td>
</tr>

<tr>
    <td align="center" colspan="2">
		<button type="submit" name="submit_price" id="submit" class="btn btn-o btn-primary">Submit</button>
	</td>
</tr>

</table>
 
</form>
</body>

</html>