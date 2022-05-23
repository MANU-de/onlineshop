<?php
error_reporting(-1);
ini_set('display_errors', 'on');


$username = "root";
$password = "";
$dsn ="mysql:host=localhost;dbname=onlineshop;charset=utf8";
$db = new PDO($dsn, $username, $password);

$sql = "SELECT id, titel, description, price FROM products";
        $result = $db->query($sql);

     require __DIR__.'/templates/main.php';
