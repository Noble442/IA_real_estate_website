<?php

include 'connection.php'; 

$user_id = isset($_COOKIE['user_id']) ? $_COOKIE['user_id'] : '';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = sha1($_POST['pass']);
    $c_pass = sha1($_POST['c_pass']);

    $query = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        echo "Email already taken!";
    } else {
        if ($pass != $c_pass) {
            echo "Passwords do not match!";
        } else {
            $insert = $conn->prepare("INSERT INTO `users` (id, name, email, password) VALUES (?, ?, ?, ?)");
            $insert->bind_param("ssss", $id, $name, $email, $pass);
            if ($insert->execute()) {
                $verify = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
                $verify->bind_param("ss", $email, $pass);
                $verify->execute();
                $user = $verify->get_result()->fetch_assoc();

                if ($user) {
                    setcookie('user_id', $user['id'], time() + 60 * 60 * 24 * 30, '/');
                    header('Location: homee.php');
                } else {
                    echo "Something went wrong!";
                }
            } else {
                echo "Failed to register user!";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <link rel="stylesheet" href="register.css">

</head>
<body>

    <header>
        <div class="navbar">
            <div class="logo">
               <a href="Home.php">logo</a>
            </div>
            <div class="menu">
                <a href="Properties.php">Properties</a>
                <a href="#">Add Property</a>
                <a href="#">Contact Us</a>
            </div>
            <ul>
                <li><a href="#">saved <i class="far fa-heart"></i></a></li>
                <li><a href="#">account <i class="fas fa-angle-down"></i></a>
                   <ul>
                      <li><a href="loginn.php" style="background-color:#e7e1e1">login</a></li>
                      <li><a href="register.php" style="background-color: #e7e1e1;">register</a></li>
                   </ul>
                </li>
             </ul>
        </div>
       </header>

<section class="form-container">

   <form action="" method="post">
      <h3>Start Your Journey<br>create an account!</h3>
      <input type="tel" name="name" required maxlength="50" placeholder="enter your name" class="box">
      <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
      <input type="password" name="pass" required maxlength="20" placeholder="enter your password" class="box">
      <input type="password" name="c_pass" required maxlength="20" placeholder="confirm your password" class="box">
      <p>already have an account? <a href="loginn.html">login now</a></p>
      <input type="submit" value="register now" name="submit" class="btn">
   </form>

</section>
</body>
</html>