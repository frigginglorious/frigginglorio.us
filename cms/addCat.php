<?php
if ($_SESSION['loggedin'] === TRUE) {
    if (isset($_POST["catName"]) && isset($_POST["catURL"]) && isset($_POST["catID"])) {
        $catName = $_POST["catName"];
        $catURL = $_POST["catURL"];
        $catIcon = $_POST["catIcon"];
        $catID = $_POST["catID"];
        if (($catName != null) && ($catURL != null) && ($catIcon != null) && ($catID != null)) {
            $sql = "UPDATE cat SET cat = ?, name = ?, icon = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);

            if ($stmt->execute([$catURL, $catName, $catIcon, $catID])) {
                echo "Good Category Update";
            }else {
                echo "Update Category Error";
            }
        } else {

            echo "Input info in all boxes <br/>";

        }
    }elseif (isset($_POST["catName"]) && isset($_POST["catURL"])) {
        $catName = $_POST["catName"];
        $catURL = $_POST["catURL"];
        $catIcon = $_POST["catIcon"];
        if (($catName != null) && ($catURL != null) && ($catIcon != null)) {
            $sql = "INSERT INTO cat(cat, name, icon) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);

            if ($stmt->execute([$catURL, $catName, $catIcon])) {
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
    <input name="catIcon" class="icp icp-auto" value="fa-anchor" type="text" />
    <input type="submit" value="Submit">
</form>
<script>
$(function() {
    $('.icp-auto').iconpicker();
});
</script>
<?php
}
?>
