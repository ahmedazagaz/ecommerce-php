<?php

//connect to database
try{
    $pdo=new PDO("mysql:host=localhost;dbname=ecommerce_php","root","");
}catch(PDOException $e){
    echo "connection failed: ".$e->getMessage();
    die();
}
?>
