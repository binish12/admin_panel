<?php
include "includes/header.php";
$data = [];

$act = $_GET['act'];
if ($act == "edit") {
	$id = $_GET['id'];
	$ingredients = getById("ingredients", $id);
}
$recipes = getAll('recipe');
?>

<form method="post" action="save.php" enctype='multipart/form-data'>
	<fieldset>
		<legend class="hidden-first">Add New Ingredients</legend>
		<input name="cat" type="hidden" value="ingredients">
		<input name="id" type="hidden" value="<?= $id ?>">
		<input name="act" type="hidden" value="<?= $act ?>">

		<label>Name</label>
		<input class="form-control" type="text" name="name" value="<?= $ingredients['name'] ?>" /><br>

		<label>Quantity</label>
		<input class="form-control" type="number" name="quantity" value="<?= $ingredients['quantity'] ?>" /><br>

		<label>Unit</label>
		<input class="form-control" type="text" name="unit" value="<?= $ingredients['unit'] ?>" /><br>

		<label>Recipe</label>
		<select name="recipe_id" class="form-control" type="text">
			<?php
			foreach ($recipes as $rec) {
				?>
				<option value="<?php echo $rec["id"]; ?>" <?php if ($rec['id'] == $ingredients['recipe_id']) {
					   echo "Selected";
				   } ?>>
					<?php echo $rec["name"]; ?>
				</option>
				<?php
			}
			?>
		</select>
		<br>
		<input type="submit" value=" Save " class="btn customButton">
</form>
<?php include "includes/footer.php"; ?>