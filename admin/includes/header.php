<?php
error_reporting(0);
session_start();
if ($_COOKIE["auth"] != "admin_in") {
	header("location:" . "./");
}
include("includes/connect.php");
include("includes/data.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="@housamz">

	<meta name="description" content="Mass Admin Panel">
	<title> Admin Panel</title>



	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<!-- Custom CSS -->
	<link rel="stylesheet" href="includes/style.css">
	<link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
	<!--[if lt IE 9]>
					<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
					<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
				<![endif]-->

</head>

<body>

	<div class="wrapper">
		<!-- Sidebar Holder -->
		<nav id="sidebar" class="bg-white">
			<div class="sidebar-header">
				<img src="assets/gymshala.png" style="height:215px;width:215px;" alt="Logo">
				</h3>
				<strong>
					<img src="assets/gymshala.png" style="height:50px;width:50px;" alt="Logo"><br>
				</strong>
			</div><!-- /sidebar-header -->

			<!-- start sidebar -->
			<ul class="list-unstyled components">
				<li class="list-group-item list-group-item-action">
					<a href="home.php" style="color:black;text-decoration:none;">
						<img src="assets/admin.png" class="pull-left" height="20px" width="20px">
						&nbsp;&nbsp;&nbsp; Dashboard</span>
					</a>
				</li>
			
			
				<li class="list-group-item list-group-item-action">
					<a href="profile.php" style="color:black;text-decoration:none;">
						<img src="assets/profile.png" class="pull-left" height="20px" width="20px">
						&nbsp;&nbsp;&nbsp; Members</span>
						<span class="badge bg-primary rounded-pill pull-right">
							<?= counting("members", "member_id") ?>
						</span>
					</a>
				</li>

				<li class="list-group-item list-group-item-action">
					<a href="packages.php" style="color:black;text-decoration:none;">
						<img src="assets/category.png" class="pull-left" height="20px" width="20px">
						&nbsp;&nbsp;&nbsp; Packages</span>
						<span class="badge bg-primary rounded-pill pull-right">
							<?= counting("packages", "id") ?>
						</span>
					</a>
				</li>
				


				<li class="list-group-item list-group-item-action">
					<a href="foods.php" style="color:black;text-decoration:none;">
						<img src="assets/ingredients.png" class="pull-left" height="20px" width="20px">
						&nbsp;&nbsp;&nbsp; Foods</span>
						<span class="badge bg-primary rounded-pill pull-right">
							<?= counting("foods", "food_id") ?>
						</span>
					</a>
				</li>
				
				<li class="list-group-item list-group-item-action">
					<a href="workout.php" style="color:black;text-decoration:none;">
						<img src="assets/profile.png" class="pull-left" height="20px" width="20px">
						&nbsp;&nbsp;&nbsp; Workout</span>
						<span class="badge bg-primary rounded-pill pull-right">
							<?= counting("workout", "id") ?>
						</span>
					</a>
				</li>

				
				<li class="list-group-item list-group-item-action">
					<a href="logout.php" style="color:black;text-decoration:none;">
						<img src="assets/logout.png" class="pull-left" height="20px" width="20px">
						&nbsp;&nbsp;&nbsp; Logout</span>

					</a>
				</li>

			</ul>
		</nav><!-- /end sidebar -->

		<!-- Page Content Holder -->
		<div id="content">