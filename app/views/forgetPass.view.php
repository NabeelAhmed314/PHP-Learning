<?php require 'partials/partial-head.php'?>
<?php require 'partials/partial-log-head.php' ?>

<div style="padding:30px; ">

		<h1>Forget Password</h1>

		<div class='form-box'>
			<?php require 'partials/partial-error-para.php' ?>
		
			<form method="POST" action="/forgetPass">

				<label for="email">Email</label>
				<input class='form-input' type="text" id="email" name="email" placeholder="Email" >

				<input class='form-input' type="submit" value="Submit">

			</form>
		</div>
	</div>

	<?php unset($_SESSION['error']); ?>

<?php require 'partials/partial-foot.php'?>



