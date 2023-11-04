<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Cookify | Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <link rel="stylesheet" href="./style.css">
  <link href="../assets/images/favicon.png" rel="icon">

</head>
<body>
<!-- partial:index.partial.html -->
<h1>Cookify</h1><br>

<?php
    if (isset($_GET["signup_success"])) {
        echo "<h2 style='color: green;'>Signup success! You may login now.</h3>";
    }
	if (isset($_GET["signup_error"])) {
        echo "<h2 style='color: red;'>Something went wrong, please try again!</h3>";
    }
	if (isset($_GET["login_error"])) {
        echo "<h2 style='color: red;'>Invalid username or password!</h3>";
    }
    ?>

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="register_process.php" method="post" enctype="multipart/form-data">
			<h1>Create Account</h1>
<br>
			<input type="text" name="username" placeholder="Username" required />
			<input type="password" name="password" placeholder="New Password" required />
			<input type="password" name="confirm_password" placeholder="Confirm Password"  required />
			<input type="file" name="profile_image" accept="image/*" required>
			<button type="submit">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="login_process.php" method="post">
			<h1>Sign in</h1>
<br>
			<input type="text" name="username" placeholder="Username" required />
			<input type="password" name="password" placeholder="Password" required />
			<a href="#">Forgot your password?</a>
			<button type="submit">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Outlander?</h1>
				<p>Enter your personal details and start cooking with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<h1><a href="../">← Back to Home</a></h1>

<footer>
	<p>
		Copyright Cookify, Inc. All Rights Reserved.
	</p>
</footer>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
