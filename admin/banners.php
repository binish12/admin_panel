<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-banners.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
	Banner</a>

<h1>Banners</h1>
<p>This table includes
	<?php echo counting("banners", "id"); ?> Banners.
</p>

<?php
if (isset($_GET['Success'])) {
	?>
	<a href="workout.php">
		<div class="alert alert-success" style="display: flex; justify-content: start;align-items: start;flex-flow:row; ">
			<span style="display:block;"><strong>Success!</strong> Action completed</span>
			<span style="margin-left:auto">Close</span>
		</div>
	</a>
	<?php
} else if (isset($_GET['Failure'])) {
	?>
		<a href="workout.php">
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
			<th>ID</th>			
			<th>Image</th>						
			<th>Created_at</th>
			<th>Updated_at</th>
			
			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$profile = getAll("banners");
	if ($profile)
		foreach ($profile as $profiles):
			?>
			<tr>
				<td>
					<?php echo $profiles['id'] ?>
				</td>
				
				<td>
					<?php echo $profiles['image'] ?>
				</td>
				
				<td>
					<?php echo $profiles['created_at'] ?>
				</td>

				<td>
					<?php echo $profiles['updated_at'] ?>
				</td>

				
				</td>
			


				<td><a href="edit-banners.php?act=edit&id=<?php echo $profiles['id'] ?>"><i
							class="glyphicon glyphicon-edit"></i></a></td>
				<td><a href="save.php?act=delete&id=<?php echo $profiles['id'] ?> &cat=banners"
						onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>