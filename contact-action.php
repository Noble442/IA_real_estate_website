<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $query = "INSERT INTO contact (db_fullName, db_email, db_message) VALUES ('$name', '$email', '$message')";
    if (mysqli_query($conn, $query)) {
        header("location: homee.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>