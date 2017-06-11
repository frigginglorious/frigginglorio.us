<?php
$config = include($_SERVER['DOCUMENT_ROOT'] . "/config.php");

// $link = new mysqli($config["host"], $config["username"], $config["password"], $config["database"]);
//
// if ($link->connect_error) {
//     die("Connection failed: " . $link->connect_error);
// }
// return $link;


$host = $config["host"];
$db   = $config["database"];
$user = $config["username"];
$pass = $config["password"];
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
// $pdo = new PDO($dsn, $user, $pass, $opt);
return new PDO($dsn, $user, $pass, $opt);

 ?>
