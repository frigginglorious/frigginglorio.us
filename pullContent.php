			<?php

				if (isset($_GET["postID"])){
					$postID = $_GET["postID"];
					$result = mysqli_query($link, "SELECT author, title, catID, content, date FROM post WHERE id = '" . $postID . "' AND author = 1");

					$row = mysqli_fetch_assoc($result);
					$authQ = mysqli_query($link, "SELECT name FROM author WHERE id = '" . $row["author"] . "'");
					$aRow = mysqli_fetch_assoc($authQ);
					$catQuery = mysqli_query($link, "SELECT name, id, cat FROM cat WHERE id = '" . $row["catID"] . "'");
					$catInfo = mysqli_fetch_assoc($catQuery);
					echo "<h2>" . $row["title"] . "</h2>Posted By: " . $aRow["name"] . ", Posted In: " . $catInfo["name"] . ", at: " . $row["date"] . " EST.<br /><br />";
					echo $row["content"];
					mysqli_free_result($result);
					mysqli_free_result($authQ);
				}
				else if (isset($_GET["cat"])){

					$cat = $_GET["cat"];
					$catQuery = mysqli_query($link, "SELECT name, id, cat FROM cat WHERE cat = '" . $cat . "'");
					$catInfo = mysqli_fetch_assoc($catQuery);


					echo "<h2>" . $catInfo["name"] . "</h2>";
					$result = mysqli_query($link, "SELECT author, title, catID, content, date FROM post WHERE catID = '" . $catInfo["id"] . "' AND author = 1 ORDER BY date DESC");


					while ($row = mysqli_fetch_assoc($result)) {

						$authQ = mysqli_query($link, "SELECT name FROM author WHERE id = '" . $row["author"] . "'");
						$aRow = mysqli_fetch_assoc($authQ);

						echo "<div class='post'><h3>" . $row["title"] . "</h3>Posted By: " . $aRow["name"] . ", Posted at: " . $row["date"] . " EST.<br /><br />\n";
						echo $row["content"] . "&nbsp;</div>\n";

					}


					mysqli_free_result($catQuery);
					mysqli_free_result($result);

				}
				else{
					include 'homeContent.php';
				}
			?>
