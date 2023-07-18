<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
        echo $style;
        echo $script;
    ?>
	<title>Login Page</title>
</head>

<body>
	<?php echo $navbar; ?>

	<div class="container col-10 col-sm-8 col-md-6 col-lg-6 col-xl-4 mt-3">
		<div class="card">
			<div class="card-body">
				<form action="<?php echo base_url('login/auth'); ?>" method="post">
					<div class="form-group">
						<label for="email_input">E-Mail</label>
						<input name="email" type="email" class="form-control" id="username_input"
							placeholder="Enter your E-Mail">
					</div>
					<div class="form-group">
						<label for="password_input">Password</label>
						<input name="password" type="password" class="form-control" id="password_input"
							placeholder="Your Password Here">
					</div>
					<input type="submit" value="Login" class="btn btn-primary btn-block"></button>
				</form>
			</div>

		</div>
		<div align="center" class="mt-3">
			<p>Don't have an account?</p>
			<a href="<?php echo base_url('register');?>" class="btn btn-info">Sign Up</a>
		</div>
	</div>

	<?php
		echo $footer;
	?>
</body>

</html>
