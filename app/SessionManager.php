<?php

    class SessionManager {

        public function __construct()
        {           
            if(isset($_SESSION['ogx-user']))
            {
                $this->Redirect("/public/views/login.php");
            }

            if(isset($_SESSION['ogx-staff-cashier']))
            {
                $this->Redirect("public/views/admin/dashboard/cashier");
            }

            if(isset($_SESSION['ogx-staff-driver']))
            {
                $this->Redirect("public/views/admin/dashboard/driver");
            }

            if(isset($_SESSION['ogx-staff-stationManager']))
            {
                $this->Redirect("public/views/admin/dashboard/StationManager");
            }

            if(isset($_SESSION['ogx-staff-operationsManager']))
            {
                $this->Redirect("public/views/admin/dashboard/OperationsManager");
            }

            if(isset($_SESSION['ogx-staff-admin']))
            {
                $this->Redirect("public/views/admin/dashboard/");
            }
        }

        private function Redirect($dir)
        {
            header("Location: " . URLROOT . $dir);
        }

    }