<?php
if ($_SESSION['loggedin'] === TRUE) {
    if ((isset($_POST["catName"])) && isset($_POST["catURL"])) {
        $catName = $_POST["catName"];
        $catURL = $_POST["catURL"];
        if (($catName != null) && ($catURL != null)) {
            $sql = "INSERT INTO cat(cat, name) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);

            if ($stmt->execute([$catURL,$catName])) {
                echo "Good Category Insert";
            }else {
                echo "Insert Category Error";
            }
        } else {

            echo "Input info in all boxes <br/>";

        }

    }

?>
<h2>Add Category</h2>
<form method="POST">
    <input name="catName" placeholder="Category Name">
    <input name="catURL" size="10" placeholder="Category URL name">
    <input type="submit" value="Submit">
</form>
<?php
}
?>
