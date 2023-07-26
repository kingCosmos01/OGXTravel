<?php

    class PaymentManager extends Database {

        public $message;

        public function __construct()
        {
            if(isset($_POST['makeTripPayment']))
            {
                $payment = htmlentities($_POST['tripPayment']);

                if(!empty($payment))
                {
                    $query = "UPDATE trip SET amount = ? WHERE passenger = ?";
                    $stmt = $this->connect()->prepare($query);
                    $passenger = $_SESSION['userID'];
                    $stmt->execute(array($payment, $passenger));

                    $this->message = "Payment Successful! Paid NGN " . $payment;
                    $this->GenerateReceiptLink();
                    $this->GenerateReceipt();
                }
            }
        }

        private function GenerateReceipt()
        {
            $id = $_SESSION['userID'];
            $userData = $this->GetPassenger($id);

            // print_r($userData);

            $passenger = $_SESSION['user'];
            $source = $userData[0]['source'];
            $destination = $userData[0]['dest'];
            $tripDate = $userData[0]['trip_date'];
            $vehicleID = $userData[0]['vehicleid'];
            $tripCount = $userData[0]['trip'];
            $reservation = $userData[0]['reservations'];
            $amountPaid = $userData[0]['amount'];

            $tripManager = new TripManager();

            echo "
                <div class='tripPaymentForm' id='receipt'>
                    
                    <table class='card receipt'>
                            <tr><td class='closeBtn' id='ReceiptCloseBtn'>&times;</td></tr>

                            <tr class='head'><th>Luper Transport CO</th></tr>

                            <tr>
                                <th>Passenger:</th>
                                <td>$passenger</td>
                            </tr>
                            
                           
                            <tr>
                                <th>FROM:</th>
                                <td>$source</td>
                            </tr>
                           
                            <tr>
                                <th>DEST:</th>
                                <td>$destination</td>
                            </tr>
         
                            <tr>
                                <th>DATE:</th>
                                <td>$tripDate</td>
                            </tr>
         
                            <tr>
                                <th>VEHICLE ID:</th>
                                <td>$vehicleID</td>
                            </tr>
         
                            <tr>
                                <th>TRIP:</th>
                                <td>TRIP ($tripCount)</td>
                            </tr>

                            <tr>
                                <th>NO OF SEATS RESERVED:</th>
                                <td>SEATS ($reservation)</td>
                            </tr>
         
                            <tr>
                                <th>PAID:</th>
                                <td>NGN $amountPaid</td>
                            </tr>
         
                            <tr class='saveGroup'>
                            <td class='saveBtn' onClick='print()'>Save Receipt</td>
                            </tr>

                    </table>
                </div>
            ";

        }


        private function GetPassenger($id) {
            $query = "SELECT * FROM trip WHERE passenger = ?";
            $stmt = $this->connect()->prepare($query);

            $stmt->execute(array($id));

            $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $userData;
        }



        private function GenerateReceiptLink()
        {
            $_SESSION['receipt_link'] = "<a href='http://localhost/lupertransportco/public/views/receipt.php'>View Receipt</a>";
        }

    }