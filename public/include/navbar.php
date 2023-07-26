<div class="navbar">
    <div class="wrapper">
        <div class="logo">
            <h2>
                OGX<span>Travel</span>
            </h2>
        </div>
        <div class="navs">
            <ul>
                <li><a href="" class="active">Home</a></li>
                <li><a href="#">Trips</a></li>
                <li><a href="#">About Us</a></li>

                <?php if(isset($_SESSION['ogx-user'])) { ?>
                    <li><a href="#" class="ogx-cta-btn">Reservation</a></li>
                    <li><a href="#" class="ogx-cta-btn ogx-danger">Logout</a></li>
                <?php } else { ?>
                    <li><a href="#" class="ogx-cta-btn">Reservation</a></li>
                    <li><a href="http://localhost/ogxtravel/public/views/login.php" class="ogx-cta-btn ogx-info">Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>