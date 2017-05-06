<?php include $_SERVER['DOCUMENT_ROOT'].'/tpl/head.php';?>

			<div class="navItem" id="i1" onclick="i1_onClick()">
				<span class="item">
					Trip Blog
				</span>
			</div>
			<div class="navItem" id="i2" onclick="i2_onClick()">
				<span class="item">
					Map
				</span>
			</div>
			<div class="navItem" id="i3" onclick="i3_onClick()">
				<span class="item">
					Calendar
				</span>
			</div>

		</div>
	</header>


	<div id="main">
		<div id="leftMain">
			<div id="mainNav">

				<table class="mainNav">
					<tr>
						<th>
							Blog Posts
						</th>
					</tr>
					<?php

						$config = include('../config.php');
						$link = mysqli_connect($config["host"], $config["username"], $config["password"]) or
						die("Could not connect: " . mysql_error());
						mysqli_select_db($link, $config["database"]);

						$result = mysql_query("SELECT id, title, country FROM post ORDER BY date DESC");

						 while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
							 printf ("<tr><td><a href='index.php?postID=%s' onclick='i1_onClick();'> %s </a> from: %s</td></tr>\n", $row["id"], $row["title"], $row["country"]);

						}

						mysql_free_result($result);

					?>

				</table>



			</div>
			<div id="login">
				Log in to create post:
				<form action="cms/login.php" method = "post">
					<label for="username">Username:</label> <input type="username" id="username" name="username"><br />
					<label for="password">Password:</label> <input type="password" id="password" name="password"><br />
					<button type = "submit">Login</button>
				</form>
			</div>
		</div>
		<content>


		<div id="c1" class="content">
			<?php

				$postID = $_GET["postID"];
				if ($_GET["postID"]){
					$result = mysql_query("SELECT author, title, country, content, date FROM post WHERE id = '" . $postID . "'");

					$row = mysql_fetch_array($result, MYSQL_ASSOC);
					$authQ = mysql_query("SELECT name FROM author WHERE id = '" . $row["author"] . "'");
					$aRow = mysql_fetch_array($authQ, MYSQL_ASSOC);
					echo "<h2>" . $row["title"] . "</h2>Posted By: " . $aRow["name"] . ", Posted From: " . $row["country"] . ", at: " . $row["date"] . " CST.<br />";
					echo $row["content"];
					mysql_free_result($result);
					mysql_free_result($authQ);
				}
				else{
					echo "<h2>Dan & Emma: A Couple of Lovely Fucking Pilgrims</h2>\n";

					$results = mysql_query("SELECT author, title, country, content, date FROM post ORDER BY date DESC");

					while ($row = mysql_fetch_array($results, MYSQL_ASSOC)) {
						$authQ = mysql_query("SELECT name FROM author WHERE id = '" . $row["author"] . "'");
						$aRow = mysql_fetch_array($authQ, MYSQL_ASSOC);
						echo "<div class='post'><h3>" . $row["title"] . "</h2>Posted By: " . $aRow["name"] . ", Posted From: " . $row["country"] . ", at: " . $row["date"] . " EST.<br />\n";
						echo $row["content"] . "&nbsp;</div>\n";

					}
					mysql_free_result($authQ);
					mysql_free_result($results);

				}
			?>


		</div>

		<div id="c2" class="content">
			<iframe src="https://mapsengine.google.com/map/embed?mid=zUoSrfQ0IknU.kbtz8bZqS6Bg" width="95%" height="95%"></iframe>
		</div>
		<div id="c3" class="content">
			<iframe src="https://www.google.com/calendar/embed?mode=AGENDA&amp;height=600&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=8an182jha3vlof4ut150se9pnk%40group.calendar.google.com&amp;color=%238C500B&amp;ctz=America%2FChicago" style=" border-width:0 " width="800" height="600" frameborder="0" scrolling="no"></iframe>
		</div>

		<div id="quote">
			<p>'<span style="font-weight: bold;">The longest journey of anyone is the journey inward.</span>'
			- Dag Hammarskj�ld </p>

		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/tpl/foot.php';?>
