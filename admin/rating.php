<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-rating.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Rating</a>

				<h1>Rating</h1>
				<p>This table includes <?php echo counting("rating", "id");?> rating.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Recipe id</th>
			<th>User id</th>
			<th>Rating</th>
			<th>Review</th>
			<th>Created at</th>
			<th>Updated at</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$rating = getAll("rating");
				if($rating) foreach ($rating as $ratings):
					?>
					<tr>
		<td><?php echo $ratings['id']?></td>
		<td><?php echo $ratings['recipe_id']?></td>
		<td><?php echo $ratings['user_id']?></td>
		<td><?php echo $ratings['rating']?></td>
		<td><?php echo $ratings['review']?></td>
		<td><?php echo $ratings['created_at']?></td>
		<td><?php echo $ratings['updated_at']?></td>


						<td><a href="edit-rating.php?act=edit&id=<?php echo $ratings['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $ratings['id']?>&cat=rating" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				