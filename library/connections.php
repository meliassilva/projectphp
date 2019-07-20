<?php
/*
* Database connections
*/

function acmeConnect(){
$server = "localhost";
$database = "database";
$user = "iClient";
$password = "P797F84EFfq2UZMG"; 
$dsn = 'mysql:host='.$server.';dbname='.$database;
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
$acmeLink = new PDO($dsn,$user,$password,$options);
//echo '$acmeLink worked successfully<br>';
return $acmeLink;
} catch(PDOException $exc) {
    //echo $exc->getMessage();
    header('location: /acme/view/500.php');
    exit;
}
}
acmeConnect();