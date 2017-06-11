			<?php

				if (isset($_GET["postID"])){
					$postID = $_GET["postID"];
					// // $result = mysqli_query($link, "SELECT author, title, catID, content, date FROM post WHERE id = '" . $postID);
					//
					// $link = include("cms/dbConnect.php");
					//
					// $sql = "SELECT author, title, catID, content, date FROM post WHERE id = '" . $postID;
					//
					// if ($result = $link->query($sql)){
					//
					//     while ($obj = $result->fetch_object()) {
					// 		echo "<h2>" . $obj->title . "</h2>Posted By: " . $obj->name . ", Posted In: " . $catInfo["name"] . ", at: " . $row["date"] . " EST.<br /><br />";
					//
					// 	}
					// }
					//
					// $row = mysqli_fetch_assoc($result);
					// $authQ = mysqli_query($link, "SELECT name FROM author WHERE id = '" . $row["author"] . "'");
					// $aRow = mysqli_fetch_assoc($authQ);
					// $catQuery = mysqli_query($link, "SELECT name, id, cat FROM cat WHERE id = '" . $row["catID"] . "'");
					// $catInfo = mysqli_fetch_assoc($catQuery);
					// echo "<h2>" . $row["title"] . "</h2>Posted By: " . $aRow["name"] . ", Posted In: " . $catInfo["name"] . ", at: " . $row["date"] . " EST.<br /><br />";
					// echo $row["content"];
					// mysqli_free_result($result);
					// mysqli_free_result($authQ);

					// $pdo = include("cms/dbConnect.php");

					// $sql = "SELECT post.id, title, catID, cat.id, cat.name FROM post JOIN cat WHERE cat.id = catID ORDER BY date DESC";
					$sql = "SELECT post.id as postID, author, title, catID, content, author.id as authorID, author.name as authorName, cat.name as catName, date FROM post JOIN author on author.id = author JOIN cat on cat.id = post.catID WHERE post.id = ?";// . $postID;
					$stmt = $pdo->prepare($sql);
					$stmt->execute([$postID]);
					foreach ($stmt as $row)
					{
					   echo "<h2>" . $row["title"] . "</h2>Posted By: " . $row["authorName"] . ", Posted In: " . $row["catName"] . ", at: " . $row["date"] . " EST.<br /><br />";
					   echo $row["content"];
					}
				}
				elseif (isset($_GET["cat"])){

					$cat = $_GET["cat"];
					// $catQuery = mysqli_query($link, "SELECT name, id, cat FROM cat WHERE cat = '" . $cat . "'");
					// $catInfo = mysqli_fetch_assoc($catQuery);
					//
					//
					// echo "<h2>" . $catInfo["name"] . "</h2>";
					// $result = mysqli_query($link, "SELECT author, title, catID, content, date FROM post WHERE catID = '" . $catInfo["id"] . "' ORDER BY date DESC");
					//
					//
					// while ($row = mysqli_fetch_assoc($result)) {
					//
					// 	$authQ = mysqli_query($link, "SELECT name FROM author WHERE id = '" . $row["author"] . "'");
					// 	$aRow = mysqli_fetch_assoc($authQ);
					//
					// 	echo "<div class='post'><h3>" . $row["title"] . "</h3>Posted By: " . $aRow["name"] . ", Posted at: " . $row["date"] . " EST.<br /><br />\n";
					// 	echo $row["content"] . "&nbsp;</div>\n";
					//
					// }
					//
					//
					// mysqli_free_result($catQuery);
					// mysqli_free_result($result);
					$sql = "SELECT post.id as postID, author, title, catID, content, author.id as authorID, author.name as authorName, cat.name as catName, date FROM post JOIN author on author.id = author JOIN cat on cat.id = post.catID WHERE cat.cat = ?";// . $postID;
					$stmt = $pdo->prepare($sql);
					$stmt->execute([$cat]);
					foreach ($stmt as $row)
					{
					   echo "<h2>" . $row["title"] . "</h2>Posted By: " . $row["authorName"] . ", Posted In: " . $row["catName"] . ", at: " . $row["date"] . " EST.<br /><br />";
					   echo $row["content"];
					}

				}
				else{
					include 'homeContent.php';
				}
			?>
