<?php
$conn=mysqli_connect("localhost","root","","ia_real_estate");

if($conn->connect_error){
echo"Failed to connect to db".$conn->connect_error; 
}
function create_unique_id(){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 20; $i++) {
        $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>