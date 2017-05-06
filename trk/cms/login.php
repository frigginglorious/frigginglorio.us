<!DOCTYPE html>
<html>
<head><!-- CDN hosted by Cachefly -->
<script src="tinymce/tinymce.min.js"></script>
<script>
        tinymce.init({
  selector: "textarea",

  // ===========================================
  // INCLUDE THE PLUGIN
  // ===========================================

  plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table contextmenu paste jbimages"
  ],

  // ===========================================
  // PUT PLUGIN'S BUTTON on the toolbar
  // ===========================================

  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",

  // ===========================================
  // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
  // ===========================================

  relative_urls: false

});
</script>
</head>
<body>

	<?php
		$username = strtoupper($_POST["username"]);
		$password = $_POST["password"];

        $config = include('config.php');
        $link = mysqli_connect($config["host"], $config["username"], $config["password"]) or
        die("Could not connect: " . mysql_error());
        mysqli_select_db($link, $config["database"]);

		$result = mysql_query("SELECT password FROM author WHERE name ='" . $username . "'");
		$credential = mysql_fetch_array($result, MYSQL_ASSOC);

		mysql_free_result($result);

		session_start();
		if ($password==$credential['password']) {
		echo "Logged In as " . $username;
			$_SESSION['login'] = true;
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
	?>
			<form name="input" action="post.php" method="post">

				About/From Country: <input id="country" name="country"></input><br/>
				Blog Post Title: <input id="title" name="title"></input><br/>
				Blog Post Text: <textarea id="content" name="content"></textarea><br/>
				<input type="submit" value="Submit">
			</form>
	<?php
		}
		else {
		echo "incorrect login";
		$_SESSION['login'] = false;
		}

	?>

	</body>
</html>
