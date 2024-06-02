<?php 
function connectToDb($host, $db, $user, $pass){
    $pdo = new PDO('mysql:host=' . $host . '; port=3306; dbname=' . $db, $user, $pass);
    return $pdo;
}
$pdo = connectToDb('localhost', 'db1', 'mattis', '49610');