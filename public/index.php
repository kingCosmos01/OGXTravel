<?php

    session_start();

    if(isset($_SESSION['user']))
    {
        echo $_SESSION['user'];
        header("Location: http://localhost/ogxtravel/");
    }
    else
    {
        header("Location: http://localhost/ogxtravel/public/views/login.php");
    }