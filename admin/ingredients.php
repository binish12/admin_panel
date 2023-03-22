<?php
include "includes/header.php";
?>

<a class="btn customButton" href="edit-ingredients.php?act=add"> Add New
	Ingredients</a>

<h1>Ingredients</h1>
<p>This table includes
	<?php echo counting("ingredients", "id"); ?> ingredients.
</p>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Quantity</th>
			<th>Unit</th>
			<th>Recipe id</th>
			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$sql = "SELECT i.*,r.name as recipe_name from ingredients i LEFT JOIN recipe r on i.recipe_id = r.id";
	$ingredients = query($sql);

	if ($ingredients)
		foreach ($ingredients as $ingredientss):
			?>
			<tr>
				<td>
					<?php echo $ingredientss['id'] ?>
				</td>
				<td>
					<?php echo $ingredientss['name'] ?>
				</td>
				<td>
					<?php echo $ingredientss['quantity'] ?>
				</td>
				<td>
					<?php echo $ingredientss['unit'] ?>
				</td>
				<td>
					<?php echo $ingredientss['recipe_name'] ?>
				</td>

				<td><a href="edit-ingredients.php?act=edit&id=<?php echo $ingredientss['id'] ?>"><i
							class="glyphicon glyphicon-edit"></i></a></td>
				<td><a href="save.php?act=delete&id=<?php echo $ingredientss['id'] ?>&cat=ingredients"
						onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>