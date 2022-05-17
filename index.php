<?php
error_reporting(-1);
ini_set('display_errors', 'on');
$username = "root";
$password = "";
$dsn ="mysql:host=localhost;dbname=onlineshop;charset=utf8";
$db = new PDO($dsn, $username, $password);

$sql = "SELECT id, titel, beschreibung, price FROM products";
        $result = $db->query($sql);
?>
<!Doctype html>
<html lang="de">
    <head>
        <title>
            Pictures Shop
        </title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>
    <body>
        <header class="jumpotron">
            <div class="container">
            <h1>Welcome to the Pictures Shop</h1>
            </div>
        </header>
        <section class="container" id="products">
       <div class="row">
                <?php while($row = $result->fetch()):?>
                    <div class ="col">
                    <?php include 'card.php'?>
            </div>
            <?php endwhile;?>
            </div>
            </section>
 


      <script src="assets/js/bootstrap.bundle.js"></script>
    </body>
</html>