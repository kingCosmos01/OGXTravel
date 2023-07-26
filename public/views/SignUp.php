<?php 

    session_start();

    require '../../app/Database.php';
    require '../../app/Config.php';
    require '../../app/SessionManager.php';

    // new SessionManager();

    if(isset($_POST['signup']))
    {
        $firstName = htmlentities($_POST['firstName']);
        $lastName = htmlentities($_POST['lastName']);
        $phoneNumber = htmlentities($_POST['phone']);
        $email = htmlentities($_POST['email']);
        $address = htmlentities($_POST['address']);
        $password = htmlentities($_POST['password']);
        $c_pass = htmlentities($_POST['c_pass']);

        $nextOfKin = htmlentities($_POST['nextOfKin']);
        $nextOfKinPhone = htmlentities($_POST['nextOfKinPhone']);

        $data = [
            "firstName" => $firstName,
            "lastName" => $lastName,
            "phoneNumber" => $phoneNumber,
            "email" => $email,
            "address" => $address,
            "password" => $password,
            "c_pass" => $c_pass,
            "nextOfKin" => $nextOfKin,
            "nextOfKinPhone" => $nextOfKinPhone
        ];

        require '../../app/Register.php';

        $RegisterManager = new Register($data);

        
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo URLROOT; ?>public/views/admin/assets/images/ogx_logo.jpg">
    <title><?php echo APPNAME; ?> SignUp</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    
    <div class="container">
        <div class="back-group">
            <a href="<?php echo URLROOT; ?>">&leftarrow; Back</a>
        </div>
        <div class="head">
            <h3><?php echo APPNAME; ?> SignUp</h3>
        </div>

        <form action="" method="post">
            <div class="input-group name-group">
                <div class="name-group-content">
                    <label>FirstName</label>
                    <input type="text" name="firstName" class="form-input" placeholder="Enter First Name" required/>
                </div>
                <div class="name-group-content">
                    <label>LastName</label>
                    <input type="text" name="lastName" class="form-input" placeholder="Enter Last Name" required/>
                </div>
            </div>

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" class="form-input" placeholder="Someone@mail.com" required/>
            </div>

            <div class="input-group">
                <label>Phone Number</label>
                <input type="phone" name="phone" class="form-input" placeholder="Enter your Phone Number" required/>
            </div>

            <div class="input-group">
                <label>Address</label>
                <input type="text" name="address" class="form-input address" placeholder="Someone@mail.com" required/>
            </div>
            
            <div class="input-group">
                <label>Next of Kin</label>
                <input type="text" name="nextOfKin" class="form-input" placeholder="Enter your Next of Kin's Fullname" required/>
            </div>
            
            <div class="input-group">
                <label>Next of Kin's Phone</label>
                <input type="text" name="nextOfKinPhone" class="form-input" placeholder="Enter your Next of Kin's Phone Number" required/>
            </div>
            
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" class="form-input" placeholder="Choose a Passwod" required/>
            </div>
            
            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="c_pass" class="form-input" placeholder="Confirm your Passwod" required/>
            </div>

            <div class="cta">
                <button type="submit" name="signup">SignUp</button>
                <p>Already have an Account? <a href="<?php echo URLROOT; ?>public/views/login.php">Login Here</a></p>
            </div>

        </form>
    </div>

</body>
</html>