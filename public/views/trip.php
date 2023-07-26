<?php

  session_start();

  if(!isset($_SESSION['user']))
  {
    header("location: http://localhost/lupertransportco/");
  }

  require_once '../../app/Database.php';
  require_once '../../app/TripManager.php';
  require_once '../../app/ParkManager.php';
  require_once '../../app/VehicleManager.php';
  require_once '../../app/PaymentManager.php';

  new PaymentManager();

  $parkManagerOBJ = new ParkManager();
  $parkData = $parkManagerOBJ->GetAllParks();

  $vehicleManagerOBJ = new VehicleManager();
  $vehicleData = $vehicleManagerOBJ->GetAllVehicles();

  if(isset($_POST['submit']))
  {
      $source = htmlentities($_POST['from']);
      $destination = htmlentities($_POST['to']);
      $DesiredTripDate = htmlentities($_POST['date']);
      $vehicle = htmlentities($_POST['vehicle']);
      $tripRound = htmlentities($_POST['trip']);
      $tripID = uniqid();
      $reservation = htmlentities($_POST['reservation']);

      $data = [
        "source" => $source,
        "destination" => $destination,
        "desiredTripDate" => $DesiredTripDate,
        "vehicle" => $vehicle,
        "vehicleID" => $vehicleData[0]['vehicleid'],
        "trip" => $tripRound,
        "tripID" => $tripID,
        "reservation" => $reservation,
        "passenger" => $_SESSION['userID']
      ];

      $TripManager = new TripManager();
      $TripManager->SetTrip($data);
  }


?>


<?php 

    if(isset($TripManager->message))
    {
      echo "<div id='alert' style='position:absolute;display:flex;top:10%;left:75%;padding:10px;background:green;color:white;text-align:center;'>" . $TripManager->message . "</div>";
    }
   
    if(isset($PaymentManager->message))
    {
      echo "<div id='alert' style='position:absolute;display:flex;top:10%;left:75%;padding:10px;background:green;color:white;text-align:center;'>" . $TripManager->message . "</div>";
    }
   

    if(isset($_GET['success']))
    {
        $message = $_GET['success'];

        echo "<div id='alert' style='position:absolute;display:flex;top:10%;left:75%;padding:10px;background:green;color:white;text-align:center;'>" . $message . "</div>";
    }

?>

<html>
<head>
  <title>My Trip</title>
  <link rel="stylesheet" href="../css/trip.css">
</head>

<body>

<form name="ogxdb" id="formland" method="post" onSubmit="return valid();">

<table width="559" border="5" align="center">

<tr>
  <td colspan="2" align="center">TRIP</td>
</tr>

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
    <td>DATE</td>
    <td><input type="date" name="date" required="required"></td>
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
    <td>NO OF SEATS RESERVED</td>
    <td><input type="number" name="reservation" value="1" required="required"></td>
	</tr>
  <tr><td>TRIP</td><td>
    <table width="200">
      <tr>
        <td><label>
          <input type="radio" name="trip" value="1">
          One Way (Go)</label></td>
      </tr>
      <tr>
        <td><label>
          <input type="radio" name="trip" value="2">
          Round Trip (Go / Come)</label></td>
      </tr>
    </table>
  </td>
  </tr>
  <tr>
    
    <td align="center" colspan="2"><button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">Submit</button></td>
  </tr>
  <tr>
    <td>
      <?php 
        
        if(isset($_SESSION['receipt_link'])) 
        {
          $link = $_SESSION['receipt_link'];
          echo $link;
        }
      ?>
    </td>
  </tr>
</table>
 
</form>


<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="../js/trip.js"></script>

</body>

</html>