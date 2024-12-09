<?php  

include 'connection.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_forward" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>IA Real Estate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="stylee.css">
</head>
<body>
<header>
<?php include 'user_header.php'; ?>
    <div class="header-content">
        <h1>IA Real Estate</h1>
        <p>Your dream home is closer than ever.</p>
        <div class="search-container">
            <input type="text" placeholder="Location">
            <input type="text" placeholder="Keywords">
            <select>
                <option value="" disabled selected>Type</option>
                <option value="apartment">Apartment</option>
                <option value="house">House</option>
            </select>
            <select>
                <option value="" disabled selected>Sale or Rent</option>
                <option value="sale">Sale</option>
                <option value="rent">Rent</option>
            </select>
            <button>Search</button>
        </div>
    </div>

</header>
<br><br>
<div> <h1 style="color:black ;" class="type">Platinum & Recommended</h1></div>
<section id="property">
    <div class="container swiper">
        <div class="card-wrapper">
            <ul class="card-list swiper-wrapper">
                <li class="card-item swiper-slide">
                    <a href="listings.php" class="card-link">
                        <img src="properties/1.jpg" alt="" class="card-image">
                        <p class="badge">$$$$</p>
                        <h2 class="card-title"></h2>
                        <button class="card-button material-symbols-rounded">arrow_forward</button>
                    </a>
                </li>
                <li class="card-item swiper-slide">
                    <a href="listings.php" class="card-link">
                        <img src="properties/10.avif" alt="" class="card-image">
                        <p class="badge">$$$$</p>
                        <h2 class="card-title"></h2>
                        <button class="card-button material-symbols-rounded">arrow_forward</button>
                    </a>
                </li>
                <li class="card-item swiper-slide">
                    <a href="listings.php" class="card-link">
                        <img src="properties/14.webp" alt="" class="card-image">
                        <p class="badge">$$$$</p>
                        <h2 class="card-title"></h2>
                        <button class="card-button material-symbols-rounded">arrow_forward</button>
                    </a>
                </li>
                <li class="card-item swiper-slide">
                    <a href="listings.php" class="card-link">
                        <img src="properties/2.webp" alt="" class="card-image">
                        <p class="badge">$$$$</p>
                        <h2 class="card-title"></h2>
                        <button class="card-button material-symbols-rounded">arrow_forward</button>
                    </a>
                </li>
                <li class="card-item swiper-slide">
                    <a href="listings.php" class="card-link">
                        <img src="properties/15.webp" alt="" class="card-image">
                        <p class="badge">$$$$</p>
                        <h2 class="card-title"></h2>
                        <button class="card-button material-symbols-rounded">arrow_forward</button>
                    </a>
                </li>
                <li class="card-item swiper-slide">
                    <a href="listings.php" class="card-link">
                        <img src="properties/16.webp" alt="" class="card-image">
                        <p class="badge">$$$$</p>
                        <h2 class="card-title"></h2>
                        <button class="card-button material-symbols-rounded">arrow_forward</button>
                    </a>
                </li>
                <li class="card-item swiper-slide">
                    <a href="listings.php" class="card-link">
                        <img src="properties/4.jpg" alt="" class="card-image">
                        <p class="badge">$$$$</p>
                        <h2 class="card-title"></h2>
                        <button class="card-button material-symbols-rounded">arrow_forward</button>
                    </a>
                </li>
                <li class="card-item swiper-slide">
                    <a href="listings.php" class="card-link">
                        <img src="properties/8.webp" alt="" class="card-image">
                        <p class="badge">$$$$</p>
                        <h2 class="card-title"></h2>
                        <button class="card-button material-symbols-rounded">arrow_forward</button>
                    </a>
                </li>
                <li class="card-item swiper-slide">
                    <a href="listings.php" class="card-link">
                        <img src="properties/3.webp" alt="" class="card-image">
                        <p class="badge">$$$$</p>
                        <h2 class="card-title"></h2>
                        <button class="card-button material-symbols-rounded">arrow_forward</button>
                    </a>
                </li>
            </ul>
      
            <div class="swiper-pagination"></div>
            <div class="swiper-slide-button swiper-button-prev"></div>
            <div class="swiper-slide-button swiper-button-next"></div>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</section>



<section id="about">
    <div class="heading">
     <h1>About Us</h1>
    </div>
    <div class="container"> 
     <div class="about-content">
         <h2>Welcome to our website</h2>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At fuga quas vel velit, officia hic voluptas dolore corrupti esse totam illo itaque odio modi ad amet libero atque fugiat praesentium.</p>
         <button class="cta-button">Learn More</button>
     </div>
     <div class="about-image">
         <img src="images/giphy.gif" alt="">
     </div>
    </div>
</section>


<section id="contact">
    <div class="content">
        <h2>Contact Us</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime assumenda quia impedit optio repellat quidem exercitationem incidunt, provident saepe. Nesciunt, veritatis? Dolorum repellendus molestias minus esse impedit totam tenetur quibusdam.</p>
    </div>
    <div class="containerC">
        <div class="contactInfo">
            <div class="box">
                <div class="icon"><i class='bx bx-current-location'></i></div>
                <div class="text">
                    <h3>Address</h3>
                    <p>4671 Saida main road,<br>Saida,lebanon,<br>55060</p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><i class='bx bxs-phone' ></i></div>
                <div class="text">
                    <h3>Phone</h3>
                    <p>+961 78 995 371</p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><i class='bx bx-envelope' ></i></i></div>
                <div class="text">
                    <h3>Email</h3>
                    <p>IA@gmail.com</p>
                </div>
            </div>
        </div>
        <div class="contactForm">
            <form action="contact-action.php" method="POST">
                <h2>Send Message</h2>
                <div class="inputBox">
                    <input type="text" name="name" required>
                    <span>Full Name</span>
                </div>
                <div class="inputBox">
                    <input type="text" name="email" required>
                    <span>Email</span>
                </div>
                <div class="inputBox">
                    <textarea name="message" required></textarea>
                    <span>Type youe Message...</span>
                </div>
                <div class="inputBox">
                    <input type="submit">
                </div>
            </form>
        </div>
    </div>
</section>

<script src="javaScript/script.js"></script>
</body>
</html>