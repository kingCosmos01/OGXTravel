<?php

    class PriceManager extends Database {

        public $message;
        

        public function SetPrice($reqData)
        {

            $priceID = uniqid();
            $source = $reqData['source'];
            $destination = $reqData['destination'];
            $vehicle = $reqData['vehicle'];
            $numberOfSeats = $reqData['noOfSeats'];
            $unitPrice = $reqData['unitPrice'];

            if($this->RegisterPrice($priceID, $source, $destination, $vehicle, $numberOfSeats, $unitPrice, 1) == true )
            {
                $this->message = "Price Added Successfully!";
            }

        }

        private function RegisterPrice($priceID, $source, $destination, $vehicle, $numberOfSeats, $unitPrice, $status)
        {
            $query = "INSERT INTO price (priceid, source, destination, vehicle, noofseats, unitprice, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute(array(
                $priceID, 
                $source, 
                $destination, 
                $vehicle, 
                $numberOfSeats, 
                $unitPrice, 
                $status
            ));

            return true;
        }

    }