<div class="nevbar" id="nevbar">
    <!-- <div class="logo">
        <a href="index.php" id="logo"><h1><span><i class="fas fa-layer-group"></i> </span> STACK<span> FORUM</span></h1></a>
    </div> -->
    <div class="menu" id="menu">
        <ul>
            <!-- <li><a id="home" href="index.php">Home</a></li> -->
            <!-- <li><a id="about" href="/aboutus.html">About</a></li> -->
            <!-- <li><a id="service" href="/service.html">Service</a></li> -->
            <!-- <li><a id="pricing" href="/pricing.html">Pricing</a></li> -->
            <!-- <li><a id="cars" href="/cars.html">Cars</a></li> -->

            <!-- <li><a id="contact" href="/contact.html">Contact</a></li> -->
            <!-- <input id="search" type="text" placeholder="&#xF002; Search" name="search" style="font-family:Arial, FontAwesome"> -->
            <li>
                    
                <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        echo '
            
                            <i class="fas fa-user user_img"></i> '.$_SESSION['username']. '
                            <a id="signup" href="logout.php">logout</a>
                        ';
                    }else {
                        echo '
                        <a id="login" href="login.php">Log in</a>
                        <a id="signup" href="signup.php">Sign up</a>
                        ';
                    }
                ?>
                
            </li>

            <!-- <li><a id="signup" href="">SignUp</a></li> -->

        </ul>
    </div>
    <!-- <div class="menuicon">
        <i id="menuicon" onclick="togglemenu()" class="fas fa-chevron-circle-down"> <span>MENU</span></i>
    </div> -->
</div>