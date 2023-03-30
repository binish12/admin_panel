<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-notices.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
	Notice</a>

<h1>Notices</h1>
<p>This table includes
	<?php echo counting("notices", "id"); ?> notices.
</p>

<?php
if (isset($_GET['Success'])) {
	?>
	<a href="notices.php">
		<div class="alert alert-success" style="display: flex; justify-content: start;align-items: start;flex-flow:row; ">
			<span style="display:block;"><strong>Success!</strong> Action completed</span>
			<span style="margin-left:auto">Close</span>
		</div>
	</a>
	<?php
} else if (isset($_GET['Failure'])) {
	?>
		<a href="notices.php">
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
			<th>Title</th>
			<th>Desciption</th>			
			<th>Created at</th>
			<th>Updated at</th>
			<th>Expiry Date</th>			

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$profile = getAll("notices");
	if ($profile)
		foreach ($profile as $profiles):
			?>
			<tr>
				<td>
					<?php echo $profiles['id'] ?>
				</td>
				<td>
					<?php echo $profiles['title'] ?>
				</td>
				<td>
					<?php echo $profiles['description'] ?>
				</td>
				<td>
					<?php echo $profiles['created_at'] ?>
				</td>
				<td>
					<?php echo $profiles['updated_at'] ?>
				</td>
				<td>
					<?php echo $profiles['expiry_date'] ?>
				</td>


				<td><a href="edit-notices.php?act=edit&id=<?php echo $profiles['id'] ?>"><i
							class="glyphicon glyphicon-edit"></i></a></td>
				<td><a href="save.php?act=delete&id=<?php echo $profiles['id'] ?>&cat=notices"
						onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>