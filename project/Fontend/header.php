<nav>
        <div class="container nav__container">
            <a href="./index.php"><img class="nav__logo" src="../images/logo1.png" alt="logo"></a>
            <ul class="nav__items">
                <li><a href="./index.php">Home</a></li>
                <li><a href="./courses.php">Courses</a></li>
                <li><a href="./instructors.php">Instructors</a></li>
                <li><a href="#">Contact Us</a></li>
                
                <?php

                // session_start();

                if ( isset($_SESSION['active_status'])  )
                {
      
                                 
                echo '
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="../images/profile1.jpeg">
                    </div> ' .

                    $_SESSION['user_name']
                    
                 
                .'
                    <ul>
                        <li><a href="./profile.html">Profile</a></li>
                        <li><a href="./dashboard.php">Dashboard</a></li>
                        <li><a href="./logout.php">Logout</a></li>
                    </ul>
                </li> '      ;
                    
                }

                else{

                    echo '
                    <li><a href="./signin.php">Login</a></li>
                <li><a href="./signup.php">Sign Up</a></li>
                
                ' ;

                }
                
                

                ?>
            </ul>

            <!-- hamburger icon -->
            <!-- <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close__nav-btn"><i class="uil uil-times-square"></i></button> -->
        </div>
    </nav>