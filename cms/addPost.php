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
    Blog Post Title: <input id="title" name="title"></input> Featured? <input id="featured" name="featured" type="checkbox"></input><br/>
    Blog Post Text: <textarea id="content" name="content"></textarea><br/>
    <input type="submit" value="Submit">
</form>
