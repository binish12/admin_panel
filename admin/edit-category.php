<?php
include "includes/header.php";
$data = [];

$act = $_GET['act'];
if ($act == "edit") {
	$id = $_GET['id'];
	$category = getById("category", $id);
}
?>

<form method="post" action="save.php" enctype='multipart/form-data'>
	<fieldset>
		<legend class="hidden-first">Add New Category</legend>
		<input name="cat" type="hidden" value="category">
		<input name="id" type="hidden" value="<?= $id ?>">
		<input name="act" type="hidden" value="<?= $act ?>">

		<label>Name</label>
		<input class="form-control" type="text" name="name" value="<?= $category['name'] ?>" /><br>

		<label>Icon</label>
		<input class="form-control" type="file" name="icon" /><br>

		<label>Color</label>
		<input class="form-control" type="color" name="color" value="<?= $category['color'] ?>" /><br>

		<br>
		<input type="submit" value=" Save" class="btn customButton">
</form>
<?php include "includes/footer.php"; ?>