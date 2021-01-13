<?php
try {
    $dbhost = 'localhost:3307';
    $dbname = 'lior'; 
    $dbuser = 'yaniv'; 
    $dbpass = 'Clinton55'; 
    $con = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error : " . $e->getMessage() . "<br/>";
    die();
}
