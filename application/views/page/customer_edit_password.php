<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
        echo $style;
        echo $script;
    ?>
	<title>Edit Password - FutBolShop</title>
</head>

<body>
	<?php echo $navbar; ?>
	<div class="container">
		<div class="card">
			<div class="card-body">
				<form class="form" action="<?php //echo base_url("user/update_email"); ?>" method="POST">
					<div class="form-group">
						<h3 class="text-primary">Edit Password</h3>
					</div>
					<div class="form-group">
						<div class="row mb-3">
							<div class="col-6">
								<label for="oldPassword">Old Password</label>
								<input name="oldPassword" type="password" class="form-control" required>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label for="newPassword">New Password</label>
								<input name="newPassword" type="password" class="form-control" required>
							</div>
							<div class="col">
								<label for="newPassConf">Confirm New Password</label>
								<input name="newPassConf" type="password" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="form-group" align="right">
						<button class="btn btn-primary" type="submit">Save</button>
					</div>
				</form>
				<div>
					<a href="<?php echo base_url("user");?>"><button class="btn">Back to Profile</button></a>
				</div>
				<div class="mt-4 text-danger">
					<?php echo validation_errors(); ?>
				</div>
			</div>

		</div>

	</div>

	<?php
        echo $footer;
    ?>
</body>

</html>
