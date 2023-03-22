<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-foods.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
	Food</a>

<h1>Foods</h1>
<p>This table includes
	<?php echo counting("foods", "food_id"); ?> foods.
</p>

<?php
if (isset($_GET['Success'])) {
	?>
	<a href="foods.php">
		<div class="alert alert-success" style="display: flex; justify-content: start;align-items: start;flex-flow:row; ">
			<span style="display:block;"><strong>Success!</strong> Action completed</span>
			<span style="margin-left:auto">Close</span>
		</div>
	</a>
	<?php
} else if (isset($_GET['Failure'])) {
	?>
		<a href="foods.php">
			<div class="alert alert-danger" style="display: flex; justify-content: start;align-items: start;flex-flow:row; ">
				<span style="display:block;"><strong>Success!</strong> Action completed</span>
				<span style="margin-left:auto">Close</span>
			</div>
		</a>
	<?php

}
?>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Food ID</th>
			<th>Food name</th>
			<th>Quantity</th>			
			<th>Total Calories</th>
			<th>Carbohydrates</th>
			<th>Fats</th>
			<th>Protein</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$profile = getAll("foods");
	if ($profile)
		foreach ($profile as $profiles):
			?>
			<tr>
				<td>
					<?php echo $profiles['food_id'] ?>
				</td>
				<td>
					<?php echo $profiles['food_name'] ?>
				</td>
				<td>
					<?php echo $profiles['quantity'] ?>
				</td>
				<td>
					<?php echo $profiles['total_calories'] ?>
				</td>
				<td>
					<?php echo $profiles['carbohydrates'] ?>
				</td>
				<td>
					<?php echo $profiles['fats'] ?>
				</td>
				<td>
					<?php echo $profiles['protein'] ?>
				</td>
				


				<td><a href="edit-foods.php?act=edit&id=<?php echo $profiles['food_id'] ?>"><i
							class="glyphicon glyphicon-edit"></i></a></td>
				<td><a href="save.php?act=delete&id=<?php echo $profiles['food_id'] ?>&cat=foods"
						onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>