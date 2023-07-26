<?php


    class Login extends Database {

        private $email;
        private $password;

        public $error;

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
                $userID = $userData[0]['userID'];
                $firstName = $userData[0]['firstName'];
                $lastName = $userData[0]['flastName'];
                $email = $userData[0]['email'];
                $phone = $userData[0]['phone'];
                $address = $userData[0]['address'];
                $nextOfKin = $userData[0]['nextOfKin'];
                $nextOfKinPhone = $userData[0]['nextOfKinPhone'];

                if($this->InitUser(
                    $userID,
                    $firstName,
                    $lastName,
                    $email,
                    $phone,
                    $address,
                    $nextOfKin,
                    $nextOfKinPhone
                ) == true)
                {
                    header("Location: " . URLROOT . "public/views/user/");
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
            $address,
            $nextOfKin,
            $nextOfKinPhone
        )
        {
            $_SESSION['ogx-userID'] = $userID;
            $_SESSION['ogx-user'] = ($firstName);  
            $_SESSION['ogx-userEmail'] = $email; 
            $_SESSION['ogx-userpPhone'] = $phone;
            $_SESSION['ogx-user_address'] = $address;
            $_SESSION['ogx-userNextOfKin'] = $nextOfKin;
            $_SESSION['ogx-nextOfKinPhone'] = $nextOfKinPhone;

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
            $query = "SELECT * FROM users WHERE email = ? AND password = ?";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute(array($email, $password));

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

    }