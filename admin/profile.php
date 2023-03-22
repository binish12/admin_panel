<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-profile.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
	Profile</a>

<h1>Profile</h1>
<p>This table includes
	<?php echo counting("members", "member_id"); ?> profile.
</p>

<?php
if (isset($_GET['Success'])) {
	?>
	<a href="profile.php">
		<div class="alert alert-success" style="display: flex; justify-content: start;align-items: start;flex-flow:row; ">
			<span style="display:block;"><strong>Success!</strong> Action completed</span>
			<span style="margin-left:auto">Close</span>
		</div>
	</a>
	<?php
} else if (isset($_GET['Failure'])) {
	?>
		<a href="profile.php">
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
			<th>Member ID</th>
			<th>Full name</th>
			<th>Email</th>
			<th>Password</th>
			<th>Phone number</th>
			<th>Is active</th>
			<th>Created at</th>
			<th>Updated at</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$profile = getAll("members");
	if ($profile)
		foreach ($profile as $profiles):
			?>
			<tr>
				<td>
					<?php echo $profiles['member_id'] ?>
				</td>
				<td>
					<?php echo $profiles['full_name'] ?>
				</td>
				<td>
					<?php echo $profiles['email'] ?>
				</td>
				<td>
					<?php echo $profiles['password'] ?>
				</td>
				<td>
					<?php echo $profiles['phone_number'] ?>
				</td>
				<td>
					<?php echo $profiles['is_active'] ?>
				</td>
				<td>
					<?php echo $profiles['created_at'] ?>
				</td>
				<td>
					<?php echo $profiles['updated_at'] ?>
				</td>


				<td><a href="edit-profile.php?act=edit&id=<?php echo $profiles['member_id'] ?>"><i
							class="glyphicon glyphicon-edit"></i></a></td>
				<td><a href="save.php?act=delete&id=<?php echo $profiles['member_id'] ?>&cat=members"
						onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>