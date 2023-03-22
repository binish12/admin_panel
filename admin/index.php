<?php
error_reporting(0);
session_start();
if ($_COOKIE['auth'] == "admin_in") {
	header("location:" . "home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="@housamz">

	<meta name="description" content="Mass Admin Panel">
	<title>Admin Panel</title>

	<!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->

	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-h21C2fcDk/eFsW9sC9h0dhokq5pDinLNklTKoxIZRUn3+hvmgQSffLLQ4G4l2eEr" crossorigin="anonymous">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
		body {
			background: rgb(25, 122, 210);
			background: linear-gradient(90deg, rgba(25, 122, 210, 1) 0%, rgba(17, 180, 191, 1) 52%, rgba(0, 212, 255, 1) 100%);
		}
	</style>
</head>

<body style="background-color:#44E8F3">
	<div class="container" style="margin-top:30px">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4" style="background:white">

				<?php
				if (isset($_GET['nopermission'])) {
					?>
					<a href="index.php">
						<div class="alert alert-danger"
							style="display: flex; justify-content: start;align-items: start;flex-flow:row; margin-top: 10px; ">
							<span style="display:block;"><strong>Warning!</strong> You dont have permission</span>
							<span style="margin-left:auto">Close</span>
						</div>
					</a>
					<?php
				} ?>

				<?php
				if (isset($_GET['notfound'])) {
					?>
					<a href="index.php">
						<div class="alert alert-warning"
							style="display: flex; justify-content: start;align-items: start;flex-flow:row; margin-top: 10px; ">
							<span style="display:block;"><strong>Alert!</strong> Email or password didn't match</span>
							<span style="margin-left:auto">Close</span>
						</div>
					</a>
					<?php
				} ?>

				<h1 class="text-center text-bold" style="font-weight: 700">Gymshala Admin Panel</h1>
				<h2 class="text-center">SIGNIN</h2>
				<h2 class="text-center"><img src="assets/gymshalawhite.png" alt="Logo" width="200" height="200"></h2>

				<div>
					<form action="login.php" method="post" name="login">
						<input type="text" class="form-control" placeholder="Email" name="username" required autofocus><br>
						<input type="password" class="form-control" placeholder="Password" name="password" required><br>
						<button class="btn btn-lg btn-primary btn-block" style="background-color:#44E8F3;border:none;"
							type="submit">
							Sign in
						</button>
						<div style="height:20px;"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>