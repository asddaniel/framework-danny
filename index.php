<?php
// header('Access-Control-Allow-Origin: *');
session_start();

// require 'vendor/autoload.php';
require("init.php");
  use App\Controllers\ControllerApp;
 $app = new ControllerApp();

use App\Exemple\Exercice;
$exercice = new Exercice();
 
//  // var_dump($_GET);
 if(isset($_GET["page"])){
 $app->get($_GET['page']);
}else{
    $app->get("/");
}
  ?>


