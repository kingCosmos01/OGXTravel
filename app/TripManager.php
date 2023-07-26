<?php

    class TripManager extends Database {

        public $tripPrice;

        private $tripPaymentMade;


        public function GetAllTrips()
        {
            $query = "SELECT * FROM trip";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute();

            $tripData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $tripData;
        }

        public function SetTrip($reqData)
        {
            // print_r($reqData);

            $tripID = $reqData['tripID'];
            $source = $reqData['source'];
            $destination = $reqData['destination'];
            $desiredTripDate = $reqData['desiredTripDate'];
            $tripVehicle = $reqData['vehicle'];
            $vehicleID = $reqData['vehicleID'];
            $tripCount = $reqData['trip'];
            $reservation = $reqData['reservation'];
            $passenger = $reqData['passenger'];
            $tripStatus = 0;

            $vehicleManager = new VehicleManager();
            
            $pricePerTrip = $vehicleManager->GetVehiclePrice($tripVehicle);

            $this->tripPrice = $this->SetTripPrice($pricePerTrip, $tripCount, $reservation);

            if($this->RegisterTrip(
                $tripID,
                $source,
                $destination,
                $desiredTripDate,
                $vehicleID,
                $tripCount, 
                $passenger,
                $tripStatus,
                $reservation
            ) == true)
            {
                $this->RequestPayment();
            }
            else
            {
                echo "Trip Not Added!";
            }
            

        }


        private function SetTripPrice($pricePerTrip, $tripCount, $reservations)
        {
            return ($pricePerTrip[0]['unitprice'] * $tripCount) * $reservations;
        }


        private function RequestPayment()
        {
            
            echo "
                <div class='tripPaymentForm' >
                    
                    <form action=''  method='post' id='paymentForm'>
                        <h3>Make Payment for your Trip</h3>
                        <input type='text' name='tripPayment' id='amount' value='$this->tripPrice'>
                        <button type='submit' name='makeTripPayment'> Make Payment </button> >
                    </form>
                </div>
            ";
        }

        private function SetpaymentComplete()
        {
            $query = "UPDATE trip SET status = 1";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute();

            return true;
        }
       

        private function RegisterTrip(
            $tripID,
            $source,
            $destination,
            $desiredTripDate,
            $vehicleID,
            $tripCount, 
            $passenger,
            $tripStatus,
            $reservation)
        {
            $query = "INSERT INTO trip (tripid, source, dest, trip_date, vehicleid, trip, passenger, status, reservations) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) ";
            $stmt = $this->connect()->prepare($query);

            $stmt->execute(array(
                $tripID,
                $source,
                $destination,
                $desiredTripDate,
                $vehicleID,
                $tripCount, 
                $passenger,
                $tripStatus,
                $reservation
            ));

            return true;
        }

        

    }