<?php
require_once "database/database.php";
$id = $_GET['id'];
if($_SERVER["REQUEST_METHOD"] = "POST"){
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$profile = $_POST['image_url'];
}
$student = array(
    'id' => $id,
    "name" => $name,
    "email" => $email,
    "age" => $age,
    "profile" => $profile
);

updateStudent($student);

if(isset($_POST['submit'])){
    header("Location: index.php"); //chuyển trang 
}



