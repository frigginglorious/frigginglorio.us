<?php
session_start();
if ($_SESSION['login']==true){
        date_default_timezone_set('UTC');
        mysqli_close($con);
          $config = include('../../config.php');
          $con = mysqli_connect($config["host"], $config["username"], $config["password"]) or
          die("Could not connect: " . mysql_error());
          mysqli_select_db($link, $config["database"]);
          // Check connection
        if (mysqli_connect_errno())
                        {echo "Failed to connect to MySQL: " . mysqli_connect_error();}
          else {echo "MySQL Connect Success!<br/>";}

          $author = $_SESSION['username'];
          $country = $_POST["country"];
          $title = $_POST["title"];

		  // This is where I should decode the special chars, after encoding them first, probably.
          //$content = htmlspecialchars($_POST["content"]);
		  $content = $_POST["content"];
          $date = date("F j, Y, g:i a");
        if (($author != null) && ($country != null) && ($title != null) && ($content != null))
          {
                echo "Author: " . $author . "<br>";
                echo "Country: " . $country . "<br>";
                echo "Title: " . $title . "<br>";
                echo "Content: " . $content . "<br>";

                $config = include('../../config.php');
                mysqli_connect($config["host"], $config["username"], $config["password"]) or
                die("Could not connect: " . mysql_error());
                mysqli_select_db($link, $config["database"]);

                $result = mysql_query("SELECT id FROM author WHERE name ='" . $author . "'");
                $credential = mysql_fetch_array($result, MYSQL_ASSOC);
        $authorID = $credential['id'];
         echo "Author ID: " . $authorID . "<br>";
          mysqli_query($con,"INSERT INTO post    (author, country, title, content)
        VALUES ('" . $authorID . "', '" . $country . "', '". $title . "', '". $content . "')");
                  }

        else
          {
          echo "Input info in all boxes <br/>";
          }
}
else{
echo "You Must Log In.";
}
?>
<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <title></title>
  </head>
  <body></body>
</html>
