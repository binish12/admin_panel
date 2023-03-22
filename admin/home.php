<?php
include "includes/header.php";
?>

<?php
if (isAdmin()) {

	?>
	<h1>Admin</h1>
	<?php
} else {
	?>
	<h1>Not admin</h1>
	<?php
}
?>
<style>
	.grid-container {
		display: grid;
		grid-template-columns: auto auto auto auto;
		padding: 10px;

	}

	.grid-item {
		background-color: rgba(255, 255, 255, 0.8);
		background: rgb(21, 135, 238);
		height: 200px;
		margin: 5px;
		font-size: 30px;
		border-radius: 8px;
		display: flex;
		justify-content: center;
		flex-flow: column;
		text-align: center;
	}
</style>


<div class="grid-container">
	<div class="grid-item">
		<h3 style="color:white;">Users</h3>
		<h1 style="color:white;">
			<strong>
				<?= counting("users", "user_id") ?>
			</strong>
		</h1>
	</div>
	
</div>


<?php include "includes/footer.php"; ?>