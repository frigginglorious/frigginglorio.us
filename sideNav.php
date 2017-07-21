<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);



$sql = "SELECT post.id as postID, title, catID, cat.id as catID, cat.name as catName, cat.icon, featured FROM post JOIN cat WHERE cat.id = catID ORDER BY date DESC";

$stmt = $pdo->query($sql);
foreach ($stmt as $row)
{
	$strong = ($row["featured"] ? "<strong>" : "");
	$endStrong = ($row["featured"] ? "</strong>" : "");
   printf ("<tr><td>%s<i class='fa %s' aria-hidden='true'></i> <a href='index.php?postID=%s' onclick='i1_onClick();'> %s </a>%s</td></tr>\n", $strong, $row["icon"], $row["postID"], $row["title"], $endStrong);
}

?>
