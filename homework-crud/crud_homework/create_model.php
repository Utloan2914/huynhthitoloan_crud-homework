<?php
require_once "database/database.php";
if($_SERVER["REQUEST_METHOD"] = "POST"){
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$profile = $_POST['image_url'];
}
$student = array(
    "name" => $name,
    "email" => $email,
    "age" => $age,
    "profile" => $profile
);

createStudent($student);

if(isset($_POST['submit'])){
    header("Location: index.php"); //chuyển trang 
}



