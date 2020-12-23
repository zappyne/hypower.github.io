<title> Hypower | Create an Account </title>
<?php
	include_once 'header.php';
?>

	
<section>
	<h1>Create an Account</h1>
	<form action="includes\signup.inc.php" method="post">
		<div>
			<input name="name" type="text" placeholder="Username *">
		</div>
		<div>
			<input name="password" type="password" placeholder="Password *">
		</div>
		<div>
			<input name="passwordrepeat" type="password" placeholder="Repeat Password *">
		</div>
		<div>
			<input name="gamertag" type="text" placeholder="Xbox Gamertag (optional)">
		</div>
		<div>
			<button class="submit" type="submit">Sign Up</button>
		</div>

		<?php
	if (isset($_GET["error"])) {
		if ($_GET["error"] == "emptyinputs") {
			echo "<p> Please Fill all Fields </p>";
		}
		else if ($_GET["error"] == "invalidusername") {
			echo "<p> Invalid Username, use characters a-z and 0-9 </p>";
		}
		else if ($_GET["error"] == "passwordsdontmatch") {
			echo "<p> Passwords Don't Match </p>";
		}
		else if ($_GET["error"] == "usernametaken") {
			echo "<p> Username Taken </p>";
		}
		else if ($_GET["error"] == "gamertagtaken") {
			echo "<p> Gamertag Taken </p>";
		}
		else if ($_GET["error"] == "usercreated") {
			echo "<p> User Created </p>";
		}
		else if ($_GET["error"] == "none") {
			echo "<p> User Created </p>";
		}
	}
?>
</section>


<?php
	include_once 'footer.php'
?>