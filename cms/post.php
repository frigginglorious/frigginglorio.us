<!DOCTYPE html>
<html>
<head>
<script src="/cms/js/tinymce/tinymce.min.js"></script>
<script>

tinymce.init({
  selector: 'textarea',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code jbimages'
  ],
  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css']
});

</script>
</head>
<body>

	<?php
        ini_set('display_startup_errors', 1);
        ini_set('display_errors', 1);
        // error_reporting(-1);

        if ($_SESSION['loggedin'] === TRUE) {

            if ((isset($_POST["cat"])) && isset($_POST["title"])) {

                date_default_timezone_set('UTC');

                $author = $_SESSION['username'];
                $authorID = $_SESSION['id'];
                $cat = $_POST["cat"];
                $title = $_POST["title"];

                $content = $_POST["content"];
                $date = date("F j, Y, g:i a");

                if (($authorID != null) && ($cat != null) && ($title != null) && ($content != null)) {

                    $sql = "INSERT INTO post(author, catID, title, content) VALUES (?, ?, ?, ?)";
                    $stmt = $pdo->prepare($sql);

                    if ($stmt->execute([$authorID,$cat,$title,$content])) {
                        echo "Insert Success";
                        echo "Author: " . $author . "<br>";
                        echo "CatID: " . $cat . "<br>";
                        echo "Title: " . $title . "<br>";
                        echo "Content: " . $content . "<br>";
                    }else {
                        echo "Insert Error";
                    }

                } else {
                    echo "Input info in all boxes <br/>";
                }

            }
            include("addCat.php");

            ?>
            <h2>Add Post</h2>
			<form name="input" action="/cms/index.php" method="post">

				<label for="cat">Category:</label>
				<select id="cat" name='cat'>
				<?php

                    $sql = "SELECT * FROM cat";
                    $stmt = $pdo->query($sql);

                    foreach ($stmt as $row){
                            echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                    }

            ?>
				</select><br/>
				Blog Post Title: <input id="title" name="title"></input><br/>
				Blog Post Text: <textarea id="content" name="content"></textarea><br/>
				<input type="submit" value="Submit">
			</form>
	<?php
        } else {
            echo "incorrect login";
            $_SESSION['loggedin'] = FALSE;
            session_destroy();
        }

    ?>

	</body>
</html>
