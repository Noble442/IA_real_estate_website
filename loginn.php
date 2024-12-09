<?php

include 'connection.php';

$user_id = isset($_COOKIE['user_id']) ? $_COOKIE['user_id'] : '';

if (isset($_POST['submit'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING); 
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $select_users = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1");
    $select_users->bind_param("ss", $email, $pass);
    $select_users->execute();
    $result = $select_users->get_result();

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      if ($email == 'admin@gmail.com' && $pass == sha1('admin123')) {
          setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
          header('Location: add_property.php');
          exit();
      } else {
          setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
          header('Location: homee.php');
          exit();
      }
  } else {
      echo 'Incorrect username or password!';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="loginn.css">

</head>
<body>
   <header>
      <?php include 'user_header.php'; ?>
     </header>

<section class="form-container">

   <form action="" method="post">
      <h3>welcome back<br> to IA REAL ESTATE!</h3>
      <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
      <input type="password" name="pass" required maxlength="20" placeholder="enter your password" class="box">
      <p>don't have an account? <a href="register.html">register new</a></p>
      <input type="submit" value="login now" name="submit" class="btn">
   </form>

</section>
</body>
</html>