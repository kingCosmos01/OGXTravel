<?php

    class StaffLogin extends Database {

        protected $email;
        protected $password;

        public $error;
        public $message;

        public function __construct($email, $password)
        {
            $this->email = $email;
            $this->password = $password;

            if($this->CheckEmptyInputs($this->email, $this->password) == true)
            {
                $this->isUserFound();
            }
            else
            {
                echo "Empty Inputs Found!";
            }
        }



        private function isUserFound()
        {
            // $result;

            $userData = $this->GetUser($this->email, $this->password);
            
            if($userData != null)
            {
                $userID = $userData[0]['staff_id'];
                $firstName = $userData[0]['firstName'];
                $lastName = $userData[0]['lastName'];
                $email = $userData[0]['email'];
                $phone = $userData[0]['phone'];
                $address = $userData[0]['address'];
                $role = $userData[0]['role'];

                if($this->InitUser(
                    $userID,
                    $firstName,
                    $lastName,
                    $email,
                    $phone,
                    $role
                ) == true)
                {
                   switch ($role) {
                    case 'Cashier':
                        $_SESSION['ogx-staff-cashier'] = $userID;
                        header("Location: " . URLROOT . "public/views/admin/dashboard/cashier");
                        break;
                    case 'Driver':
                        $_SESSION['ogx-staff-driver'] = $userID;;
                        header("Location: " . URLROOT . "public/views/admin/dashboard/driver");
                        break;
                    case 'Station Manager':
                        $_SESSION['ogx-staff-stationManager'] = $userID;;
                        header("Location: " . URLROOT . "public/views/admin/dashboard/StationManager");
                        break;
                    case 'Operations Manager':
                        $_SESSION['ogx-staff-operationsManager'] = $userID;;
                        header("Location: " . URLROOT . "public/views/admin/dashboard/OperationsManager");
                        break;
                    case 'Admin':
                        $_SESSION['ogx-staff-admin'] = $userID;;
                        header("Location: " . URLROOT . "public/views/admin/dashboard/");
                        break;
                    
                    default:
                        header("Location: " . URLROOT . "public/views/admin/");
                        break;
                   }
                }
            }
            else {
                $this->error = "User Not Found!";
            }
        }

        private function InitUser(
            $userID,
            $firstName,
            $lastName,
            $email,
            $phone,
            $role
        )
        {
            $_SESSION['ogx-staffID'] = $userID;
            $_SESSION['ogx-staff'] = ($firstName);  
            $_SESSION['ogx-staff-email'] = $email; 
            $_SESSION['ogx-staff-phone'] = $phone;
            $_SESSION['ogx-staff-role'] = $role;

            return true;
        }

        private function CheckEmptyInputs($email, $password)
        {
            if(!empty($email) && !empty($password) )
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        private function GetUser($email, $password)
        {
            $query = "SELECT * FROM ogx_staff WHERE email = ? AND password = ?";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute(array($email, $password));

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }


    }