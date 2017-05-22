<?php
$config = include('../config.php');

// $link = mysqli_connect($config["host"], $config["username"], $config["password"]) or
// die("Could not connect: " . mysql_error());
// mysqli_select_db($link, $config["database"]);
$link = new mysqli($config["host"], $config["username"], $config["password"], $config["database"]);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
return $link;
 ?>
