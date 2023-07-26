<?php 

    session_start();

    require_once '../../../app/config.php';

    if(!isset($_SESSION['ogx-user']))
    {   
        header("Location: " . URLROOT . "public/views/login.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo URLROOT;?>public/views/admin/assets/images/ogx_logo.jpg">
    <title><?php echo APPNAME;?> - User Dashboard </title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>public/css/main.css">
    <link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>
    
    <?php include './includes/navbar.php'; ?>


    <script src="./assets/js/main.js"></script>
</body>
</html>