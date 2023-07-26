<?php


    class Register extends Database {

        // user vars
        private $firstName;
        private $lastName;
        private $phone;
        private $email;
        private $address;
        private $password;
        private $c_pass;
        private $userID;

        // next of kin vars
        private $nextOfKin;
        private $nextOfKinPhone;

        public $error;
        public $message;

        public function __construct($userData) {
            
            if($userData != null)
            {
                $this->firstName = $userData['firstName'];
                $this->lastName = $userData['lastName'];
                $this->email = $userData['email'];
                $this->phone = $userData['phoneNumber'];
                $this->address = $userData['address'];
                $this->password = $userData['password'];
                $this->c_pass = $userData['c_pass'];
                $this->nextOfKin = $userData['nextOfKin'];
                $this->nextOfKinPhone = $userData['nextOfKinPhone'];

                if($this->isUnique($this->email) == true) 
                {   
                    $this->userID = uniqid();

                    if($this->ValidatePasswordRegex($this->password) == true)
                    {
                        if($this->AddUserToDatabase(
                            $this->userID,
                            $this->firstName,
                            $this->lastName,
                            $this->email,
                            $this->phone,
                            $this->address,
                            $this->password,
                            $this->nextOfKin,
                            $this->nextOfKinPhone
                        ) == true ) 
                        {
                            $this->message = "User Account Created!";
                            
                            if($this->InitUser() == true)
                            {
                                header("Location: " . URLROOT . "public/views/user/" . "?success=" . urlencode($this->message) );
                            }
                        }  
                    }
                    else
                    {
                        $this->error = "Password must contain at least one lowercase, uppercase and a number";
                        header("Location: " . URLROOT . "public/views/SignUp.php?err=" . urlencode($this->error));
                        exit();
                    }
                    
                }         
            }

        }   // constructor ends here


        private function InitUser()
        {   
            $_SESSION['ogx-userID'] = $this->userID;  
            $_SESSION['ogx-user'] = $this->firstName;  
            $_SESSION['ogx-userEmail'] = $this->email; 
            $_SESSION['ogx-userPhone'] = $this->phone;
            $_SESSION['ogx-userAddress'] = $this->address;
            $_SESSION['ogx-userNextOfKin'] = $this->nextOfKin;
            $_SESSION['ogx-userNextOfKinPhone'] = $this->nextOfKinPhone;

            return true;
        }


        private function AddUserToDatabase($userID, $firstName, $lastName, $email, $phone, $address, $password, $nextOfKin, $nextOfKinPhone ) 
        {
            $query = "INSERT INTO users (userID, firstName, lastName, email, phone, address, password, nextOfKin, nok_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) ";

            $stmt = $this->connect()->prepare($query);

            $stmt->execute(array(
                $userID,
                $firstName, 
                $lastName, 
                $email, 
                $phone, 
                $address, 
                $password,
                $nextOfKin, 
                $nextOfKinPhone
            ));

            return true;
        }

        private function CheckPasswordMatch($password, $c_pass)
        {
            if($password !== $c_pass)
            {
                return false;
            }
            else
            {
                return true;
            }
        }


        private function CheckEmptyInputs(
            $firstName, 
            $lastName, 
            $email, 
            $phone, 
            $address, 
            $password,
            $nextOfKin, 
            $nextOfKinPhone
        )
        {
            $result;

            if(!empty($firstName) && !empty($lastName) && !empty($email) && !empty($phone) && !empty($address) && !empty($password) && !empty($c_pass) && !empty($nextOfKin) && !empty($nextOfKinPhone))
            {
                $result = true;
            }
            else
            {
                $result = false;
            }

            return $result;
        }

        private function ValidatePasswordRegex($password)
        {    
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);

            if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) 
            {
                return false;
            }
            else
            {
                return true;
            }
        }


        private function isUnique($email)
        {
            $result;

            $query = "SELECT email FROM users WHERE email = ?";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute(array($email));

            $row = $stmt->rowCount();
            
            if($row > 0)
            {
                $result = false;
            }
            else
            {
                $result = true;
            }
            return $result;
        }

    }