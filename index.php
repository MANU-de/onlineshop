<?php
session_start();
error_reporting(-1);
ini_set('display_errors', 'on');


$username = "root";
$password = "";
$dsn ="mysql:host=localhost;dbname=onlineshop;charset=utf8";
$db = new PDO($dsn, $username, $password);

$sql = "SELECT id, titel, description, price FROM products";
        $result = $db->query($sql);

 $userId = 1337;
 $cartItems = 0;

if(isset($_SESSION['userId'])) {
    $userId = (int) $_SESSION['userId'];
}
if(isset($_COOKIE['userId'])) {
    $userId = (int) $_COOKIE['userId'];
}

 $sql = "SELECT COUNT(id) FROM cart WHERE user_id =".$userId;
  $cartResults = $db->query($sql); 
  

  $cartItems = $cartResults->fetchColumn();
  
     require __DIR__.'/templates/main.php';
