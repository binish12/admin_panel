<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-recipe.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
	Recipe</a>

<h1>Recipe</h1>
<p>This table includes
	<?php echo counting("recipe", "id"); ?> recipe.
</p>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Description</th>
			<th>Steps</th>
			<th>Time</th>
			<th>Image</th>
			<th>Video</th>
			<th>Category id</th>
			<th>User id</th>
			<th>Is premium</th>
			<th>Price</th>
			<th>Calories</th>
			<th>Protein</th>
			<th>Fat</th>
			<th>Carbs</th>
			<th>Created at</th>
			<th>Updated at</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$recipe = getAll("recipe");
	if ($recipe)
		foreach ($recipe as $recipes):
			?>
			<tr>
				<td>
					<?php echo $recipes['id'] ?>
				</td>
				<td>
					<?php echo $recipes['name'] ?>
				</td>
				<td>
					<div style="height: 40px;text-overflow:ellipsis;overflow: hidden;">
						<?php echo $recipes['description'] ?>
					</div>
				</td>
				<td>
					<div style="height: 40px;text-overflow:ellipsis;overflow: hidden;">
						<?php echo $recipes['steps'] ?>
					</div>
				</td>
				<td>
					<?php echo $recipes['time'] ?>
				</td>
				<td>
					<?php echo $recipes['image'] ?>
				</td>
				<td>
					<?php echo $recipes['video'] ?>
				</td>
				<td>
					<?php echo $recipes['category_id'] ?>
				</td>
				<td>
					<?php echo $recipes['user_id'] ?>
				</td>
				<td>
					<?php echo $recipes['is_premium'] ?>
				</td>
				<td>
					<?php echo $recipes['price'] ?>
				</td>
				<td>
					<?php echo $recipes['calories'] ?>
				</td>
				<td>
					<?php echo $recipes['protein'] ?>
				</td>
				<td>
					<?php echo $recipes['fat'] ?>
				</td>
				<td>
					<?php echo $recipes['carbs'] ?>
				</td>
				<td>
					<?php echo $recipes['created_at'] ?>
				</td>
				<td>
					<?php echo $recipes['updated_at'] ?>
				</td>


				<td><a href="edit-recipe.php?act=edit&id=<?php echo $recipes['id'] ?>"><i
							class="glyphicon glyphicon-edit"></i></a></td>
				<td><a href="save.php?act=delete&id=<?php echo $recipes['id'] ?>&cat=recipe"
						onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>