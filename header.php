<?php
	session_start();

	require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head> 
		<link rel="stylesheet" href="css\style.css">
		<link rel="shortcut icon" href="images\hypower.png">
	</head>
	<body>
		<header>
			<div class="container">
				<a href="index.php">
					<img src="images\hypower2.png" alt="logo" class="logo" height=50px>
				</a>
				<nav>
					<ul>
						<li><a href="index.php"> Home </a></li>
						<li><a href="about.php"> About </a></li>

						<?php
							if (isset($_SESSION["username"])) {
						?>
						<li><a href="profile.php"> Profile </a>
						<li><a href="includes/logout.inc.php"> Log out </a></li>
						<?php
						}
						else {
						?>
						<li><a href='signup.php'> Sign Up </a></li>
						<li><a href='login.php'> Log In </a></li>
						<?php
						}
						?>
					</ul>
				</nav>
			</div>
	</header>
