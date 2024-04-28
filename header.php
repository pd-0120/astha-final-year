<?php
    $user = [];
    $user = isset($_SESSION['USER']) ? $_SESSION['USER'] : [];
?>
<header class="ltn__header-area ltn__header-5 ltn__header-transparent--- gradient-color-4---">
    <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="site-logo-wrap">
                        <div class="site-logo">
                            <a href="index.php"><img src="asset/media/logo1.png" alt="Logo" width="30%" height="auto"></a>
                        </div>
                        <div class="get-support clearfix d-none">
                            <div class="get-support-icon">
                                <i class="icon-call"></i>
                            </div>
                            <div class="get-support-info">
                                <h6>Get Support</h6>
                                <h4><a href="tel:+918905027789">+91 8905027789</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col header-menu-column">
                    <div class="header-menu d-none d-xl-block">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li class=""><a href="about.php">About</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="properties.php">Properties</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col ltn__header-options ltn__header-options-2 mb-sm-20">
                    <div class="ltn__drop-menu user-menu">
                        <ul>
                            <li>
                                <a href="#"><i class="icon-user"></i></a>
                                <ul>
                                    <?php if(count($user) > 0) {
                                        ?>
                                            <li><?php echo $user['firstName'] . " " . $user['lastName']; ?></li>
                                            <li><a href="logout.php" rel="noopener noreferrer">Logout</a></li>
                                        <?php 
                                    } else {
                                        ?>
                                        <li><a href="login.php">Sign in</a></li>
                                        <li><a href="register.php">Register</a></li>
                                    <?php
                                    }?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>