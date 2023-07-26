<?php

    class VehicleManager extends Database {


        public function GetAllVehicles()
        {
            $query = "SELECT * FROM vehicles";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute();

            $vehicleData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $vehicleData;
        }

        public function GetVehiclePrice($vehicle)
        {
            $query = "SELECT unitprice FROM price WHERE vehicle = ?";
            $stmt = $this->connect()->prepare($query);

            $stmt->execute(array($vehicle));

            $vehicleUnitPrice = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $vehicleUnitPrice;
        }

    }