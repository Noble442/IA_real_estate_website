
    <div class="navbar">
        <div class="logo">
           <a href="Home.php">logo</a>
        </div>
        <div class="menu">
            <a href="listings.php">Properties</a>
            <a href="#about">About Us</a>
            <a href="#contact">Contact Us</a>
        </div>
        <ul>
            <li><a href="saved.php">saved <i class="far fa-heart"></i></a></li>
            <li><a href="#">account <i class="fas fa-angle-down"></i></a>
               <ul>
                  <li><a href="loginn.php">login now</a></li>
                  <li><a href="register.php">register new</a></li>
                  <?php if($user_id != ''){ ?>
                  <li><a href="update.php">update profile</a></li>
                  <li><a href="user_logout.php" onclick="return confirm('logout from this website?');">logout</a>
                  <?php } ?></li>
               </ul>
            </li>
         </ul>
    </div>