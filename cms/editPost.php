<h2>Edit Post</h2>
<form name="input" action="/cms/index.php" method="post">

    <label for="cat">Category:</label>
    <select id="cat" name='cat'>
    <?php

        $sql = "SELECT * FROM cat";
        $stmt = $pdo->query($sql);
        $cats = $stmt->fetchAll();


        $sql = "SELECT * FROM post where id = ?";
        $postID = $_GET["postID"];
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([$postID])) {
            $row = $stmt->fetchAll();
            // print_r();
            foreach ($cats as $cat){
                if($row[0]["catID"] == $cat["id"]){
                    echo "<option selected='selected' value='" . $cat["id"] . "'>" . $cat["name"] . "</option>";
                }else{
                    echo "<option value='" . $cat["id"] . "'>" . $cat["name"] . "</option>";

                }
            }
?>
</select><br/>
<input type="hidden" id="id" name="id" value="<?= $row[0]["id"] ?>"></input>
    Blog Post Title: <input id="title" name="title" value="<?= $row[0]["title"] ?>"></input><br/>
    Blog Post Text: <textarea id="content" name="content"><?= $row[0]["content"] ?></textarea><br/>
    <input type="submit" value="Edit">
</form>
    <?php } ?>
