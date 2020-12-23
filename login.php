<title> Hypower | Log In </title>
<?php
	include_once 'header.php';
?>

	
<section>
	<h1>Log In</h1>
	<form action="includes/login.inc.php" method="post">
		<div>
			<input name="name" type="text" placeholder="Username *">
		</div>
		<div>
			<input name="password" type="password" placeholder="Password *">
		</div>
		<div>
			<button class="submit" type="submit">Log In</button>
		</div>

		<?php
	if (isset($_GET["error"])) {
		if ($_GET["error"] == "emptyinputs") {
			echo "<p> Please Fill all Fields </p>";
		}
		else if ($_GET["error"] == "wrongusername") {
			echo "<p> Incorrect Username </p>";
		}
		else if ($_GET["error"] == "wrongpassword") {
			echo "<p> Incorrect Password </p>";
		}
	}
?>
</section>


<?php
	include_once 'footer.php'
?>