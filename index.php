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

 
 $cartItems = 0;
 $userId = random_int(0, time());

 if(isset($_COOKIE['userId'])) {
    $userId = (int) $_COOKIE['userId'];
}
if(isset($_SESSION['userId'])) {
    $userId = (int) $_SESSION['userId'];
}
setcookie('userId', $userId, strtotime('+30 days'));

$url = $_SERVER['REQUEST_URI'];
$indexxPHPPosition = strpos($url, 'index.php');
$route = substr($url, $indexxPHPPosition);
$route = str_replace('index.php', '', $route);

if(strpos($route,'/card/add/') !== false){
      $routeParts = explode("/", $route);
      $productId = (int)$routeParts[3];
      $sql = "INSERT INTO cart SET user_id = :userId, product_id = :productId";
      $statement = $db->prepare($sql);

      $statement->execute([
          ':userId'=> $userId,
          ':productId'=> $productId
      ]);
      header("Location: /onlineshop/index.php");
      exit();

      var_dump($productId);
      }



 $sql = "SELECT COUNT(id) FROM cart WHERE user_id =".$userId;
  $cartResults = $db->query($sql); 
  

  $cartItems = $cartResults->fetchColumn();
  
     require __DIR__.'/templates/main.php';
