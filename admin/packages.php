<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-packages.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
	Package</a>

<h1>Packages</h1>
<p>This table includes
	<?php echo counting("packages", "id"); ?> packages.
</p>

<?php
if (isset($_GET['Success'])) {
	?>
	<a href="packages.php">
		<div class="alert alert-success" style="display: flex; justify-content: start;align-items: start;flex-flow:row; ">
			<span style="display:block;"><strong>Success!</strong> Action completed</span>
			<span style="margin-left:auto">Close</span>
		</div>
	</a>
	<?php
} else if (isset($_GET['Failure'])) {
	?>
		<a href="packages.php">
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
			<th>Package ID</th>
			<th>Package name</th>
			<th>Description</th>
			<th>Amount</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$profile = getAll("packages");
	if ($profile)
		foreach ($profile as $profiles):
			?>
			<tr>
				<td>
					<?php echo $profiles['id'] ?>
				</td>
				<td>
					<?php echo $profiles['package_name'] ?>
				</td>
				<td>
					<?php echo $profiles['description'] ?>
				</td>
				<td>
					<?php echo $profiles['amount'] ?>
				</td>
			

				<td><a href="edit-packages.php?act=edit&id=<?php echo $profiles['id'] ?>"><i
							class="glyphicon glyphicon-edit"></i></a></td>
				<td><a href="save.php?act=delete&id=<?php echo $profiles['id'] ?>&cat=packages"
						onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>