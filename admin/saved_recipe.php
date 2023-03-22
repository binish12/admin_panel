<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-saved_recipe.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Saved_recipe</a>

				<h1>Saved_recipe</h1>
				<p>This table includes <?php echo counting("saved_recipe", "id");?> saved_recipe.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Recipe id</th>
			<th>User id</th>
			<th>Created at</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$saved_recipe = getAll("saved_recipe");
				if($saved_recipe) foreach ($saved_recipe as $saved_recipes):
					?>
					<tr>
		<td><?php echo $saved_recipes['id']?></td>
		<td><?php echo $saved_recipes['recipe_id']?></td>
		<td><?php echo $saved_recipes['user_id']?></td>
		<td><?php echo $saved_recipes['created_at']?></td>


						<td><a href="edit-saved_recipe.php?act=edit&id=<?php echo $saved_recipes['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $saved_recipes['id']?>&cat=saved_recipe" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				