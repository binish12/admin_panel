<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-recipe_purchase.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Recipe_purchase</a>

				<h1>Recipe_purchase</h1>
				<p>This table includes <?php echo counting("recipe_purchase", "id");?> recipe_purchase.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Recipe id</th>
			<th>User id</th>
			<th>Payment id</th>
			<th>Created at</th>
			<th>Updated at</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$recipe_purchase = getAll("recipe_purchase");
				if($recipe_purchase) foreach ($recipe_purchase as $recipe_purchases):
					?>
					<tr>
		<td><?php echo $recipe_purchases['id']?></td>
		<td><?php echo $recipe_purchases['recipe_id']?></td>
		<td><?php echo $recipe_purchases['user_id']?></td>
		<td><?php echo $recipe_purchases['payment_id']?></td>
		<td><?php echo $recipe_purchases['created_at']?></td>
		<td><?php echo $recipe_purchases['updated_at']?></td>


						<td><a href="edit-recipe_purchase.php?act=edit&id=<?php echo $recipe_purchases['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $recipe_purchases['id']?>&cat=recipe_purchase" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				