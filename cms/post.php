<?php

              ini_set('display_startup_errors',1);
              ini_set('display_errors',1);
              error_reporting(-1);
session_start();


if ((isset($_SESSION['username'])) && ($_SESSION['login']==true)){
        date_default_timezone_set('UTC');

        if (mysqli_connect_errno())
                        {echo "Failed to connect to MySQL: " . mysqli_connect_error();}
          else {echo "MySQL Connect Success!<br/>";}

          $author = $_SESSION['username'];
          $cat = $_POST["cat"];
          $title = $_POST["title"];

		  // This is where I should decode the special chars, after encoding them first, probably.
          //$content = htmlspecialchars($_POST["content"]);
		  $content = $_POST["content"];
          $date = date("F j, Y, g:i a");
        if (($author != null) && ($cat != null) && ($title != null) && ($content != null)){
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
        }
        else{
          echo "Input info in all boxes <br/>";
        }
        // session_destroy();
}
else{
  session_destroy();

  echo "You Must Log In.";


?>

      <div id="login">
        Log in to create post:
        <form action="login.php" method = "post">
          <label for="username">Username:</label> <input type="username" id="username" name="username"><br />
          <label for="password">Password:</label> <input type="password" id="password" name="password"><br />
          <button type = "submit">Login</button>
        </form>
      </div>
      <?php
}
?>
