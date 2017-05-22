<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
$config = include('config.php');

$link = mysqli_connect($config["host"], $config["username"], $config["password"]) or
die("Could not connect: " . mysql_error());
mysqli_select_db($link, $config["database"]);

$resultQuery = mysqli_query($link, "SELECT id, title, catID FROM post WHERE author = 1 ORDER BY date DESC");

if($resultQuery){
    while ($row = mysqli_fetch_assoc($resultQuery)) {
       $catNameQuery = mysqli_query($link, "SELECT id, name FROM cat WHERE id ='" . $row["catID"] . "'");
       $catName = mysqli_fetch_array($catNameQuery, MYSQL_ASSOC);
       printf ("<tr><td><a href='index.php?postID=%s' onclick='i1_onClick();'> %s </a> - %s</td></tr>\n", $row["id"], $row["title"], $catName["name"]);

   }
   mysqli_free_result($resultQuery);
}else{
    echo "Bad mysqli_query returned false.";
}


?>
