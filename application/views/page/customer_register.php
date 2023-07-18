<!DOCTYPE html>
<html lang="en">

<head>
	<?php
        echo $script;
        echo $style;
    ?>
	<title>Register</title>
</head>

<body>
	<?php echo $navbar;?>
	<div class="container col-10 col-sm-8 col-md-6 col-lg-6 col-xl-4 mt-3">
		<div class="card">
			<div class="card-body">
				<form method="post" action="<?php //echo site_url('register/process_register'); ?>">
					<div class="card-title">
						<nav class="navbar">
							<div class="navbar-header">
								<h1 class="text-primary">Register</h1>
								<h4>Welcome new Customer!</h4>
							</div>
						</nav>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col">
								<label for="firstname">First Name</label>
								<input name="firstname" type="text" class="form-control" required>
							</div>
							<div class="col">
								<label for="lastname">Last Name</label>
								<input name="lastname" type="text" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="gender">Gender</label> <br>
						<input name="gender" type="radio" value="Male"> Male
						<input name="gender" type="radio" value="Female"> Female
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label for="email">E-Mail</label>
								<input name="email" id="email" type="text" class="form-control" required>
							</div>
							<div class="col">
								<label for="emailConf">Confirm E-Mail Address</label>
								<input name="emailConf" id="emailConf" type="text" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label for="pass">Password</label>
								<input name="pass" id="pass" type="password" class="form-control" required>
							</div>
							<div class="col">
								<label for="passConf">Confirm Password</label>
								<input name="passConf" id="passConf" type="password" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<input name="sign_up" type="submit" class="btn btn-primary" value="Sign Up">
					</div>
				</form>
			</div>
			<?php echo validation_errors(); ?>
			<br>
		</div>
		<div class="mt-3" align="center">
			<p>Already have account?</p>
			<a href="<?php echo base_url('login'); ?>" class="btn btn-info">Sign In</a>
		</div>
	</div>
	<?php
		echo $footer;
	?>
</body>

</html>
