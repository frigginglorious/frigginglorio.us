			<?php

				if (isset($_GET["postID"])){
					$postID = $_GET["postID"];

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

					$sql = "SELECT post.id as postID, author, title, catID, content, author.id as authorID, author.name as authorName, cat.name as catName, cat.icon as catIcon, date FROM post JOIN author on author.id = author JOIN cat on cat.id = post.catID WHERE cat.cat = ? ORDER BY date DESC";
					$stmt = $pdo->prepare($sql);
					$stmt->execute([$cat]);
					$rows = $stmt->fetchAll();

					// Displays at top of category
					if(count($rows)>0){
						$catName = $rows[0]['catName'];
						$catIcon = $rows[0]['catIcon'];
						echo "<h2>{$catName}</h2>";
						for ($i = 0; $i < strlen($catName); $i++){
							echo "<i class='fa {$catIcon}'></i>";
						}
					}

					foreach ($rows as $row)
					{
					   echo "<h3>" . $row["title"] . "</h3>Posted By: " . $row["authorName"] . ", at: " . $row["date"] . " EST.<br /><br />";
					   echo $row["content"];
					}

				}
				else{
					include 'homeContent.php';
				}
			?>
