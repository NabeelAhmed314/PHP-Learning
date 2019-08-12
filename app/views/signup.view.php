<?php require 'partials/partial-head.php'?>
<?php require 'partials/partial-log-head.php' ?>
<div style="padding:20px; ">
		<h1>Sign Up</h1>

		<div class='form-box'>
			<?php require 'partials/partial-error-para.php' ?>		

			<form method="POST" action="/signup">

				<label for="name">Name</label>
				<input class='form-input' type="text" id="name" name="name" placeholder="Name"  >

				<label for="username">Username</label>
				<input class='form-input' type="text" id="username" name="username" placeholder="Username"  >
										
				<label for="email">Email</label>
				<input class='form-input' type="text" id="email" name="email" placeholder="Email Address"  >

				<label for="phone">Phone</label>
				<input class='form-input' type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{7}" placeholder="Phone No."  >

				<label for="password">Password</label>
				<input class='form-input' type="password" name="password" placeholder="Password"  >
				<input class='form-input' type="password" name="retypepassword" placeholder="Re-type Password"  >

				<input class='form-input' type="submit" value="Submit">

			</form>

		</div>
</div>
	<?php  unset($_SESSION['error']);	?>


<?php require 'partials/partial-foot.php'?>