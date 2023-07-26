<?php 

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="appLoader" id="appLoader">
        <div class="spinner"></div>
    </div>

    <?php include_once '../includes/navbar.php'; ?> 
    <?php include_once '../includes/sidebar.php'; ?> 

    <div class="scrollTop" id="scrollTop">
        <span></span>
        <span></span>
    </div>

    <script src="../assets/js/appLoader.js"></script>
</body>
</html>