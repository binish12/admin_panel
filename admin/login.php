<?php
include("includes/connect.php");

$admin_email = mysqli_real_escape_string($link, $_POST['username']);
$admin_pass = ($_POST['password']);
$auth = 'admin_in';

$query = mysqli_query($link, "SELECT * FROM users WHERE username = '$admin_email'");
$row = mysqli_fetch_array($query);


if (password_verify($admin_pass, $row['password'])) {
	if (mysqli_affected_rows($link) == 0) {
		header("location:" . "index.php?notfound");
	} else {
		// $row = mysqli_fetch_array($query);
		if ($row['role'] != "admin") {
			header("location:" . "index.php?nopermission");
		} else {
			setcookie("admin_id", $row["user_id"]);
			setcookie("admin_name", $row['username']);
			setcookie("admin_pass", $admin_pass);
			setcookie("auth", $auth);
			
			header("location:" . "home.php");
		}
	}
} else {
	header("location:" . "index.php?notfound");

}