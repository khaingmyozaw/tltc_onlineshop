<?php

include("../vendor/autoload.php");

use Helpers\HTTP;
use Libs\MySQL;
use Libs\MyTable;

$email = $_POST['email'];
$password = $_POST['password'];

$table = new MyTable(new MySQL);
$user = $table->find($email);

if(password_verify($password, $user->password)) { // if user exit check password and set session 
    session_start();

    $_SESSION['user'] = $user;
    HTTP::redirect("index.php");
} else {
HTTP::redirect("login.php", "invalid=login");
}