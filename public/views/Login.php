<?php 

    // session_start();

    require '../../app/Database.php';
    require '../../app/Config.php';
    require '../../app/SessionManager.php';

 

    if(isset($_POST['login_user']))
    {
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);

        require '../../app/Login.php';

        $LoginManager = new Login($email, $password);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo URLROOT; ?>public/views/admin/assets/images/ogx_logo.jpg">
    <title><?php echo APPNAME; ?> - Login to Account</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="container">
        <div class="back-group">
            <a href="<?php echo URLROOT; ?>">&leftarrow; Back</a>
            <a href="<?php echo URLROOT; ?>public/views/SignUp.php">Create Account?</a>
        </div>
        <div class="head">
            <h3><?php echo APPNAME; ?> - SignUp</h3>
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
                <button type="submit" name="login_user">Login</button>
                <p>Reset Password? <a href="">Reset Here</a></p>
            </div>
        </form>
    </div>
    
</body>
</html>