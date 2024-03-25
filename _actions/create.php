<?php

include("../vendor/autoload.php");

use Libs\MySQL;
use Libs\MyTable;
use Helpers\HTTP;

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$pass = $_POST['password'];
$confirm_pass= $_POST['confirm-password']; 
$address = $_POST['address'];
$full_address = $_POST['full-address'];
// Notice that I use '-' in html and '_' in php or sql as conjunction because I like

$current_ip = $_SERVER['REMOTE_ADDR'];
$device = $_SERVER['HTTP_USER_AGENT'];

if($pass === $confirm_pass)
{
   try {
     // $password = md5($pass);
     $password = password_hash($pass, PASSWORD_BCRYPT); // password for testing is "1234"

     $table = new MyTable(new MySQL);
     $table->insert([
         "name" => $name,
         "email" => $email,
         "phone" => $phone,
         "age" => $age,
         "gender" => $gender,
         "password" => $password,
         "address" => $address,
         "full_address" => $full_address,
         "current_ip" => $current_ip,
         "device" => $device,
     ]);
     HTTP::redirect("login.php", "register=success");

    // echo $password;
   }catch (PDOException $e) {
    $e->getMessage();
    exit();
   }

}
