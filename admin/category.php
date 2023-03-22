<?php
include "includes/header.php";
?>






<a class="btn btn-primary customButton" href="edit-category.php?act=add">
	Add New Category</a>

<h1>Category</h1>
<p>This table includes
	<?php echo counting("categories", "category_id"); ?> category.
</p>


<?php
if (isset($_GET['Success'])) {
	?>
	<a href="category.php">
		<div class="alert alert-success" style="display: flex; justify-content: start;align-items: start;flex-flow:row; ">
			<span style="display:block;"><strong>Success!</strong> Action completed</span>
			<span style="margin-left:auto">Close</span>
		</div>
	</a>
	<?php
} else if (isset($_GET['Failure'])) {
	?>
		<a href="category.php">
			<div class="alert alert-danger" style="display: flex; justify-content: start;align-items: start;flex-flow:row; ">
				<span style="display:block;"><strong>Failure!</strong> Action failed</span>
				<span style="margin-left:auto">Close</span>
			</div>
		</a>
	<?php

}
?>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Icon</th>
			<th>Color</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$category = getAll("category");
	if ($category)
		foreach ($category as $categorys):
			?>
			<tr>
				<td>
					<?php echo $categorys['id'] ?>
				</td>
				<td>
					<?php echo $categorys['name'] ?>
				</td>
				<td>
					<img src="../media/<?php echo $categorys['icon'] ?>" height="120" alt="Icon">
				</td>
				<td>
					<div style="height:100px;width:100px;background:<?php echo $categorys['color'] ?>"></div>
				</td>
				<td><a href="edit-category.php?act=edit&id=<?php echo $categorys['id'] ?>"><i
							class="glyphicon glyphicon-edit"></i></a></td>
				<td><a href="save.php?act=delete&id=<?php echo $categorys['id'] ?>&cat=category"
						onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>