<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
        echo $style;
        echo $script;
    ?>
	<title>Edit Email - FutBolShop</title>
</head>

<body>
	<?php echo $navbar; ?>
	<div class="container">
		<div class="card">
			<div class="card-body">
				<form class="form" action="<?php //echo base_url("user/update_email"); ?>" method="POST">
					<div class="form-group">
						<h3 class="text-primary">Edit E-Mail</h3>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label for="oldemail">Old Email</label>
								<!-- <input name="oldemail" type="hidden" class="form-control" value="<?php //echo $email;?>"> -->
								<p><b><?php echo $email;?></b></p>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label for="newEmail">New E-Mail</label>
								<input name="newEmail" type="email" class="form-control" required>
							</div>
							<div class="col">
								<label for="newEmailConf">Confirm New E-Mail</label>
								<input name="newEmailConf" type="email" class="form-control" required>
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
