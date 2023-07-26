<div class="navbar">
    <div class="wrapper">
        <div class="logo">
            <h2>
                OGX<span>Travel</span>
            </h2>
        </div>
        <div class="userNavTrigger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="ogx-navContainerOverlay" id="ogxNavContainerOverlay"></div>
        <div class="ogx-navContainer" id="OGXNavContainer">
            <div class="wrapper">
                <div class="head">
                    <h2>Howdy, <?php echo $_SESSION['ogx-user']; ?></h2>
                    <p>Dashboard</p>
                    <div class="ogxNavCloseBtn" id="ogxNavCloseBtn">&times;</div>
                </div>
                <ul class="navigations">
                    <li><a href="">Reservations</a></li>
                    <li><a href="">Trips</a></li>
                    <li><a href="">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="navs">
            <ul>
                <?php if(isset($_SESSION['ogx-user'])) { ?>
                    <li><a href="#" class="ogx-cta-btn user-btn" id="ogx-user-btn"><?php echo $_SESSION['ogx-user']; ?></a></li>
                    <div class="ogx-userCta" id="ogxUserCta">
                        <li>Profile</li>
                        <li>Support</li>
                    </div>
                    <li><a href="#" class="ogx-cta-btn ogx-danger">Logout</a></li>
                <?php } ?>
            
            </ul>
        </div>
    </div>
</div>