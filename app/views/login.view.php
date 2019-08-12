<?php require 'partials/partial-head.php'?>
<?php require 'partials/partial-log-head.php' ?>

<div style="padding:30px; ">

		<h1>Login</h1>

		<div class='form-box'>
			<?php require 'partials/partial-error-para.php' ?>
		
			<form method="POST" action="/login">

				<label for="loginName">Username , Email or Phone#</label>
				<input class='form-input' type="text" id="loginName" name="loginName" placeholder="Username , Email or Phone#" >

				<label for="password">Password</label>
				<input class='form-input' type="password" name="password" placeholder="Password" >

				<label class="forgetPass"><a  href="/forgetPass"> Forgot Password </a></label>
				<input class='form-input' type="submit" value="Submit">

			</form>
		</div>
	</div>

	<?php unset($_SESSION['error']); ?>

<?php require 'partials/partial-foot.php'?>



