<?php
include "includes/header.php";
?>


<a class="btn btn-primary" href="edit-exercises.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
	Exercise</a>

<h1>Exercises</h1>
<p>This table includes
	<?php echo counting("exercises", "exercise_id"); ?> exercises.
</p>

<?php
if (isset($_GET['Success'])) {
	?>
	<a href="exercises.php">
		<div class="alert alert-success" style="display: flex; justify-content: start;align-items: start;flex-flow:row; ">
			<span style="display:block;"><strong>Success!</strong> Action completed</span>
			<span style="margin-left:auto">Close</span>
		</div>
	</a>
	<?php
} else if (isset($_GET['Failure'])) {
	?>
		<a href="exercises.php">
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
			<th>Exercise ID</th>
			<th>Exercise name</th>
			<th>Sets</th>			
			<th>Reps</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$profile = getAll("exercises");
	if ($profile)
		foreach ($profile as $profiles):
			?>
			<tr>
				<td>
					<?php echo $profiles['exercise_id'] ?>
				</td>
				<td>
					<?php echo $profiles['exercise_name'] ?>
				</td>
				<td>
					<?php echo $profiles['sets'] ?>
				</td>
				<td>
					<?php echo $profiles['reps'] ?>
				</td>
			

				<td><a href="edit-exercises.php?act=edit&id=<?php echo $profiles['exercise_id'] ?>"><i
							class="glyphicon glyphicon-edit"></i></a></td>
				<td><a href="save.php?act=delete&id=<?php echo $profiles['exercise_id'] ?>&cat=exercises"
						onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>