<?php  
include 'connection.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}else{
   $get_id = '';
   header('location:homee.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>View Property</title>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="view_propertyy.css">
</head>
<body>

<header>
<?php include 'user_header.php'; ?>
</header>


<section class="view-property">
   <h1 class="heading">property details</h1>
   <?php
      $stmt = $conn->prepare("SELECT * FROM `property` WHERE id = ? ORDER BY date DESC LIMIT 1");
      $stmt->bind_param("i", $get_id);
      $stmt->execute();
      $result = $stmt->get_result();

      if($result->num_rows > 0){
         $fetch_property = $result->fetch_assoc();
         $property_id = $fetch_property['id'];

         $user_stmt = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
         $user_stmt->bind_param("i", $fetch_property['user_id']);
         $user_stmt->execute();
         $user_result = $user_stmt->get_result();
         $fetch_user = $user_result->fetch_assoc();

         $saved_stmt = $conn->prepare("SELECT * FROM `saved` WHERE property_id = ? AND user_id = ?");
         $saved_stmt->bind_param("ii", $fetch_property['id'], $user_id);
         $saved_stmt->execute();
         $is_saved = $saved_stmt->get_result()->num_rows > 0;
   ?>
   <div class="details">
      <div class="swiper images-container">
         <div class="swiper-wrapper">
            <img src="images/<?= $fetch_property['image_01']; ?>" alt="" class="swiper-slide">
            <?php for ($i = 2; $i <= 5; $i++) {
               $image_key = 'image_0' . $i;
               if (!empty($fetch_property[$image_key])) { ?>
                  <img src="images/<?= $fetch_property[$image_key]; ?>" alt="" class="swiper-slide">
               <?php } 
            } ?>
         </div>
         <div class="swiper-pagination"></div>
      </div>

      <h3 class="name"><?= $fetch_property['property_name']; ?></h3>
      <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['address']; ?></span></p>
      <div class="info">
         <p>$<span><?= $fetch_property['price']; ?></span></p>
         <p><i class="fas fa-user"></i><span><?= $fetch_user['name']; ?></span></p>
         <p><i class="fas fa-phone"></i><a href="tel:">76 836 072</a></p>
         <p><i class="fas fa-building"></i><span><?= $fetch_property['type']; ?></span></p>
         <p><i class="fas fa-house"></i><span><?= $fetch_property['offer']; ?></span></p>
         <p><i class="fas fa-calendar"></i><span><?= $fetch_property['date']; ?></span></p>
      </div>
      <h3 class="title">details</h3>
      <div class="flex">
         <div class="box">
            <p><i>rooms :</i><span><?= $fetch_property['bhk']; ?> BHK</span></p>
            <p><i>deposit amount :</i><span><?= $fetch_property['deposite']; ?></span></p>
            <p><i>status :</i><span><?= $fetch_property['status']; ?></span></p>
            <p><i>bedroom :</i><span><?= $fetch_property['bedroom']; ?></span></p>
            <p><i>bathroom :</i><span><?= $fetch_property['bathroom']; ?></span></p>
            <p><i>balcony :</i><span><?= $fetch_property['balcony']; ?></span></p>
         </div>
         <div class="box">
            <p><i>carpet area :</i><span><?= $fetch_property['carpet']; ?>sqft</span></p>
            <p><i>age :</i><span><?= $fetch_property['age']; ?> years</span></p>
            <p><i>total floors :</i><span><?= $fetch_property['total_floors']; ?></span></p>
            <p><i>room floor :</i><span><?= $fetch_property['room_floor']; ?></span></p>
            <p><i>furnished :</i><span><?= $fetch_property['furnished']; ?></span></p>
            <p><i>loan :</i><span><?= $fetch_property['loan']; ?></span></p>
         </div>
      </div>

      <h3 class="title">amenities</h3>
      <div class="flex">
         <div class="box">
            <p><i class="fas fa-<?php if($fetch_property['lift'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>lifts</span></p>
            <p><i class="fas fa-<?php if($fetch_property['security_guard'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>security guards</span></p>
            <p><i class="fas fa-<?php if($fetch_property['play_ground'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>play ground</span></p>
            <p><i class="fas fa-<?php if($fetch_property['garden'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>gardens</span></p>
            <p><i class="fas fa-<?php if($fetch_property['water_supply'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>water supply</span></p>
            <p><i class="fas fa-<?php if($fetch_property['power_backup'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>power backup</span></p>
         </div>
         <div class="box">
            <p><i class="fas fa-<?php if($fetch_property['parking_area'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>parking area</span></p>
            <p><i class="fas fa-<?php if($fetch_property['gym'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>gym</span></p>
            <p><i class="fas fa-<?php if($fetch_property['shopping_mall'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>shopping mall</span></p>
            <p><i class="fas fa-<?php if($fetch_property['hospital'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>hospital</span></p>
            <p><i class="fas fa-<?php if($fetch_property['school'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>schools</span></p>
            <p><i class="fas fa-<?php if($fetch_property['market_area'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>market area</span></p>
         </div>
      </div>
      <h3 class="title">description</h3>
      <p class="description"><?= $fetch_property['description']; ?></p>

      <form action="" method="post" class="flex-btn">
         <input type="hidden" name="property_id" value="<?= $property_id; ?>">
         <?php if ($is_saved) { ?>
            <button type="submit" name="save" class="save"><i class="fas fa-heart"></i><span>saved</span></button>
         <?php } else { ?>
            <button type="submit" name="save" class="save"><i class="far fa-heart"></i><span>save</span></button>
         <?php } ?>
         <input type="submit" value="send enquiry" name="send" class="btn">
      </form>
   </div>
   <?php
      } else {
         echo '<p class="empty">Property not found! <a href="post_property.php" class="btn">Add new</a></p>';
      }
   ?>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
   var swiper = new Swiper(".images-container", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      loop: true,
      coverflowEffect: {
         rotate: 0,
         stretch: 0,
         depth: 200,
         modifier: 3,
         slideShadows: true,
      },
      pagination: { el: ".swiper-pagination" },
   });
</script>
</body>
</html>