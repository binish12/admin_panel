<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-purchased_plans.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Purchased_plans</a>

				<h1>Purchased_plans</h1>
				<p>This table includes <?php echo counting("purchased_plans", "id");?> purchased_plans.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Plan id</th>
			<th>User id</th>
			<th>Created at</th>
			<th>Updated at</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$purchased_plans = getAll("purchased_plans");
				if($purchased_plans) foreach ($purchased_plans as $purchased_planss):
					?>
					<tr>
		<td><?php echo $purchased_planss['id']?></td>
		<td><?php echo $purchased_planss['plan_id']?></td>
		<td><?php echo $purchased_planss['user_id']?></td>
		<td><?php echo $purchased_planss['created_at']?></td>
		<td><?php echo $purchased_planss['updated_at']?></td>


						<td><a href="edit-purchased_plans.php?act=edit&id=<?php echo $purchased_planss['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $purchased_planss['id']?>&cat=purchased_plans" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				