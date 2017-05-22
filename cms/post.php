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
        ini_set('display_startup_errors', 1);
        ini_set('display_errors', 1);
        // error_reporting(-1);

        $link = include('dbConnect.php');
        // $link = mysqli_connect($config["host"], $config["username"], $config["password"]) or
        // die("Could not connect: " . mysql_error());
        // mysqli_select_db($link, $config["database"]);

        // $result = mysqli_query($link, "SELECT password FROM author WHERE name ='" . $username . "'");
        // $credential = mysqli_fetch_assoc($result);


        mysqli_free_result($result);

        // if ($password == $credential['password'] && !(is_null($password))) {
        if ($_SESSION['loggedin'] == true) {
            echo "Logged In as " . $name;
            // $_SESSION['login'] = true;
            // $_SESSION['username'] = $username;
            // $_SESSION['password'] = $password;


            // if ((isset($_SESSION['username'])) && ($_SESSION['login']==true)){
            if ((isset($_POST["cat"])) && isset($_POST["title"])) {
                date_default_timezone_set('UTC');

                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                } else {
                    echo "MySQL Connect Success!<br/>";
                }

                $author = $_SESSION['username'];
                $cat = $_POST["cat"];
                $title = $_POST["title"];

                  // This is where I should decode the special chars, after encoding them first, probably.
                  //$content = htmlspecialchars($_POST["content"]);
                  $content = $_POST["content"];
                $date = date("F j, Y, g:i a");
                if (($author != null) && ($cat != null) && ($title != null) && ($content != null)) {
                    echo "Author: " . $author . "<br>";
                    echo "CatID: " . $cat . "<br>";




                    $config = include('../config.php');
                    $link = mysqli_connect($config["host"], $config["username"], $config["password"]) or
                    die("Could not connect: " . mysql_error());
                    mysqli_select_db($link, $config["database"]);

                    $content = mysqli_real_escape_string($link, $content);
                    $title = mysqli_real_escape_string($link, $title);

                    echo "Title: " . $title . "<br>";
                    echo "Content: " . $content . "<br>";


                    $result = mysqli_query($link, "SELECT id FROM author WHERE name ='" . $author . "'");
                    $credential = mysqli_fetch_assoc($result);
                    $authorID = $credential['id'];
                    echo "Author ID: " . $authorID . "<br>";
                    mysqli_free_result($result);
                    mysqli_query($link, "INSERT INTO post(author, catID, title, content) VALUES ('" . $authorID . "', '" . $cat . "', '". $title . "', '". $content . "')");
                    if ($link->errno) {
                        throw new Exception($link->error, $link->errno);
                    }
                } else {
                    echo "Input info in all boxes <br/>";
                }
                    // session_destroy();
            }?>
			<form name="input" action="post.php" method="post">

				<label for="cat">Category:</label>
				<select id="cat" name='cat'>
				<?php

                    // $query = mysqli_query($link, "SELECT * FROM cat");
                    $sql = "SELECT * FROM cat";
                    if ($result = $link->query($sql)) {
                        /* fetch object array */
                        print_r($result);
                        while ($obj = $result->fetch_object()) {
                            echo "<option value='" . $obj['id'] . "'>" . $obj['name'] . "</option>";

                        }
                    }
                    $result->close();


            // while ($row = mysqli_fetch_assoc($query)) {
            //     echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            // }
            // mysqli_free_result($query);
            ?>
				</select><br/>
				Blog Post Title: <input id="title" name="title"></input><br/>
				Blog Post Text: <textarea id="content" name="content"></textarea><br/>
				<input type="submit" value="Submit">
			</form>
	<?php

        } else {
            echo "incorrect login";
            $_SESSION['loggedin'] = false;
        }

    ?>

	</body>
</html>
