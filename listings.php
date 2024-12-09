<?php
include 'connection.php';

$user_id = isset($_COOKIE['user_id']) ? $_COOKIE['user_id'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>All Listings</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="Properties.css">
</head>
<body>
   <header>
   <?php include 'user_header.php'; ?>
   </header>

<section class="listings">

   <h1 class="heading">all listings</h1>

   <div class="box-container">
      <?php
      $query = "
         SELECT p.*, u.name AS user_name, 
                (SELECT COUNT(*) FROM `saved` WHERE property_id = p.id AND user_id = ?) AS is_saved,
                (CASE 
                   WHEN p.image_01 IS NOT NULL THEN 1 ELSE 0 END) +
                (CASE 
                   WHEN p.image_02 IS NOT NULL THEN 1 ELSE 0 END) +
                (CASE 
                   WHEN p.image_03 IS NOT NULL THEN 1 ELSE 0 END) +
                (CASE 
                   WHEN p.image_04 IS NOT NULL THEN 1 ELSE 0 END) +
                (CASE 
                   WHEN p.image_05 IS NOT NULL THEN 1 ELSE 0 END) AS total_images
         FROM `property` p
         LEFT JOIN `users` u ON p.user_id = u.id
         ORDER BY p.date DESC";

      $stmt = $conn->prepare($query);
      $stmt->bind_param("i", $user_id);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()) {
            $property_id = $row['id'];
            $is_saved = $row['is_saved'] > 0;
      ?>
      <form action="" method="POST">
         <div class="box">
            <input type="hidden" name="property_id" value="<?= $property_id; ?>">
            <button type="submit" name="save" class="save">
               <i class="<?= $is_saved ? 'fas fa-heart' : 'far fa-heart'; ?>"></i>
               <span><?= $is_saved ? 'saved' : 'save'; ?></span>
            </button>
            <div class="thumb">
               <p class="total-images"><i class="far fa-image"></i><span><?= $row['total_images']; ?></span></p>
               <img src="uploaded_files/<?= $row['image_01']; ?>" alt="">
            </div>
            <div class="admin">
               <h3><?= substr($row['user_name'], 0, 1); ?></h3>
               <div>
                  <p><?= $row['user_name']; ?></p>
                  <span><?= $row['date']; ?></span>
               </div>
            </div>
         </div>
         <div class="box">
            <div class="price">$<span><?= $row['price']; ?></span></div>
            <h3 class="name"><?= $row['property_name']; ?></h3>
            <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $row['address']; ?></span></p>
            <div class="flex">
               <p><i class="fas fa-house"></i><span><?= $row['type']; ?></span></p>
               <p><i class="fas fa-tag"></i><span><?= $row['offer']; ?></span></p>
               <p><i class="fas fa-bed"></i><span><?= $row['bhk']; ?> BHK</span></p>
               <p><i class="fas fa-trowel"></i><span><?= $row['status']; ?></span></p>
               <p><i class="fas fa-couch"></i><span><?= $row['furnished']; ?></span></p>
               <p><i class="fas fa-maximize"></i><span><?= $row['carpet']; ?>sqft</span></p>
            </div>
            <div class="flex-btn">
               <a href="view_property.php?get_id=<?= $property_id; ?>" class="btn">view property</a>
               <input type="submit" value="send enquiry" name="send" class="btn">
            </div>
         </div>
      </form>
      <?php
         }
      } else {
         echo '<p class="empty">no properties added yet! <a href="post_property.php" style="margin-top:1.5rem;" class="btn">add new</a></p>';
      }
      ?>
   </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>