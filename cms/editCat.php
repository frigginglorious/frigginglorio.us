<h2>Edit Category</h2>

<?php
$cat = $_GET["cat"];
$sql = "SELECT * FROM cat WHERE cat = ?";
$stmt = $pdo->prepare($sql);

if ($stmt->execute([$cat])) {
    $row = $stmt->fetchAll();

?>
<form method="POST" action="/cms/">
    <input name="catName" placeholder="Category Name" value="<?= $row[0]["name"] ?>">
    <input name="catURL" size="10" placeholder="Category URL name"  value="<?= $row[0]["cat"] ?>">
    <input name="catIcon" class="icp icp-auto" value="<?= $row[0]["icon"] ?>" type="text" />
    <input name="catID" type="hidden" value="<?= $row[0]["id"] ?>" />
    <label for="catDelete">Delete?</label>
    <input name="catDelete" type="checkbox" />
    <input type="submit" value="Edit">

</form>
<script>
$(function() {
    $('.icp-auto').iconpicker();
});
</script>
<?php } ?>
