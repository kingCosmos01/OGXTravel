<?php 

    session_start();

    require_once './app/config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./public/views/admin/assets/images/ogx_logo.jpg">
    <title><?php echo APPNAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>public/css/main.css">
</head>
<body>

    <?php include_once  './public/include/navbar.php'; ?>

    <div class="ogx-container">
        <div class="ogx-welcome-head">
            <p class="ogx-head">Welcome Home</p>
            <h1>OUR WORLD IS YOUR PLAYGROUND</h1>
            <P class="ogx-phrase">Be confident to be at a place that cares about your safety and security on your trips around the country.</P>
        </div>
        <div class="ogx-main-center">
            <img src="./public/images/ogx_logo.jpg" alt="">
        </div>

        <?php include_once './public/include/footer.php'; ?>
    </div>

    <div class="scrollTop" id="scrollTop">
        <span></span>
        <span></span>
    </div>

    <script src="<?php echo URLROOT; ?>public/views/admin/assets/js/appLoader.js"></script>
</body>
</html>