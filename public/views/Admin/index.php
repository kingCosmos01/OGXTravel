<?php 

    session_start();

    require '../../../app/Config.php';
    require '../../../app/Database.php';
    require '../../../app/StaffLogin.php';
    require '../../../app/SessionManager.php';

    new SessionManager();

    if(isset($_POST['staff_login']))
    {
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);

        $staffLoginOBJ = new StaffLogin($email, $password);
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APPNAME; ?> Admin Login</title>
    <link rel="icon" href="<?php echo URLROOT; ?>public/views/admin/assets/images/ogx_logo.jpg">
    <link rel="stylesheet" href="../../css/admin.css">
</head>
<body>
    <div class="container">
        <div class="back-group">
            <a href="<?php echo URLROOT; ?>">&leftarrow; Back</a>
        </div>
        <div class="head">
            <h3><?php echo APPNAME; ?></h3>
        </div>
        <form action="" method="post">
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" class="form-input" placeholder="Someone@mail.com" required/>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" class="form-input" placeholder="Enter Password" required/>
            </div>
            <div class="cta">
                <button type="submit" name="staff_login">Login</button>
                <p>Forgotten Password? <a href="">Reset Here</a></p>
            </div>
            
        </form>
    </div>
    
</body>
</html>