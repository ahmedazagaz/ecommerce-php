<?php

//connect to database
try{
    $pdo=new PDO("mysql:host=localhost;dbname=ecommerce_php","root","");
    echo"connected";
}catch(PDOException $e){
    echo "connection failed: ".$e->getMessage();
    die();
}
?>
