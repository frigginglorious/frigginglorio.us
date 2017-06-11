<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);


$pdo = include("cms/dbConnect.php");

$sql = "SELECT post.id as postID, title, catID, cat.id as catID, cat.name as catName FROM post JOIN cat WHERE cat.id = catID ORDER BY date DESC";

$stmt = $pdo->query($sql);
foreach ($stmt as $row)
{
   printf ("<tr><td><a href='index.php?postID=%s' onclick='i1_onClick();'> %s </a> - %s</td></tr>\n", $row["postID"], $row["title"], $row["catName"]);

}

?>
