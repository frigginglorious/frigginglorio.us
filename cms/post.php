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
    <div class="row" style="margin:0px;">
        <div id="outBar" class="col-sm-3 blog-sidebar hidden-xs" style="padding:0px;">
            <div id="sideBar">
                <table class="table-striped">
                    <tr>
                        <th>
                            Edit Categories
                        </th>
                    </tr>
                    <?php include ($_SERVER['DOCUMENT_ROOT'] . '/topNav.php'); ?>

                </table>
                <table class="table-striped">
                    <tr>
                        <th>
                            Edit Posts
                        </th>
                    </tr>
                    <?php include ($_SERVER['DOCUMENT_ROOT'] . '/sideNav.php'); ?>

                </table>
            </div>
        </div>

        <div class="col-sm-9 blog-main">


	<?php
        ini_set('display_startup_errors', 1);
        ini_set('display_errors', 1);
        // error_reporting(-1);

        if ($_SESSION['loggedin'] === TRUE) {
            date_default_timezone_set('UTC');

            $author = $_SESSION['username'];
            $authorID = $_SESSION['id'];
            $date = date("F j, Y, g:i a");

            // Updating an existing post
            if(isset($_POST["id"]) && isset($_POST["cat"]) && isset($_POST["title"])){
                $cat = $_POST["cat"];
                $title = $_POST["title"];
                $content = $_POST["content"];
                $featured = (isset($_POST["featured"]) ?  1 : 0);
                $postID = $_POST["id"];
                $sql = "UPDATE post SET catID = ?, title = ?, content = ?, featured = ? WHERE id = ?";
                $stmt = $pdo->prepare($sql);

                if ($stmt->execute([$cat,$title,$content,$featured,$postID])) {
                    echo "Update Success";
                    echo "CatID: " . $cat . "<br>";
                    echo "Title: " . $title . "<br>";
                    echo "Featured: " . $featured . "<br>";
                    echo "Content: " . $content . "<br>";
                }else {
                    echo "Update Error";
                }
            // Creating a new post
            }elseif ((isset($_POST["cat"])) && isset($_POST["title"])) {

                $cat = $_POST["cat"];
                $title = $_POST["title"];
                $content = $_POST["content"];
                $featured = (isset($_POST["featured"]) ?  1 : 0);
                if (($authorID != null) && ($cat != null) && ($title != null) && ($content != null)) {

                    $sql = "INSERT INTO post(author, catID, title, content, featured) VALUES (?, ?, ?, ?,?)";
                    $stmt = $pdo->prepare($sql);

                    if ($stmt->execute([$authorID,$cat,$title,$content,$featured])) {
                        echo "Insert Success";
                        echo "Author: " . $author . "<br>";
                        echo "CatID: " . $cat . "<br>";
                        echo "Title: " . $title . "<br>";
                        echo "Featured: " . $featured . "<br>";
                        echo "Content: " . $content . "<br>";
                    }else {
                        echo "Insert Error";
                    }

                } else {
                    echo "Input info in all boxes <br/>";
                }

            }
            if(isset($_GET["postID"])){
                include("editPost.php");
            }elseif(isset($_GET["cat"])){
                include("editCat.php");
            }else{
                include("addCat.php");
                // include("addTag.php");
                include("addPost.php");
            }

            ?>

	<?php
        } else {
            echo "incorrect login";
            $_SESSION['loggedin'] = FALSE;
            session_destroy();
        }

    ?>
</div>
</div>
	</body>
</html>
