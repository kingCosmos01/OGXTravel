<?php

    class ParkManager extends Database {


        public function GetAllParks()
        {
            $query = "SELECT * FROM parks";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute();

            $parkData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $parkData;
        }

    }