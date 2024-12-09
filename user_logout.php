<?php

include 'connection.php';

setcookie('user_id', '', time() - 1, '/');

header('location:homee.php');

?>