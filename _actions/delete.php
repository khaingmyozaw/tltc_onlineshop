<?php

include("../vendor/autoload.php");

use Helpers\Auth;
use Helpers\HTTP;
use Libs\MySQL;
use Libs\MyTable;

$table = new MyTable(new MySQL);

$user = Auth::check();

if($user->id) {
    $table->delete($user->id);

    unset($_SESSION['user']);

    HTTP::redirect("index.php");
}else {
    HTTP::redirect("index.php");
}

// print_r($user);