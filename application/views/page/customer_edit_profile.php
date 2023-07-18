<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
        echo $style;
        echo $script;
    ?>
	<title>Edit Profile - FutBolShop</title>
</head>

<body>
	<?php echo $navbar; ?>
	<div class="container">
		<div class="card">
			<div class="card-body">
				<form class="form" action="<?php echo base_url("user/update_data"); ?>" method="POST">
                    <div class="form-group">
                        <h3 class="text-primary">Edit Customer Info</h3>
                    </div>
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label for="firstname">First Name</label>
								<input name="firstname" type="text" class="form-control" value="<?php echo $firstname; ?>" required>
							</div>
							<div class="col">
								<label for="lastname">Last Name</label>
								<input name="lastname" type="text" class="form-control" value="<?php echo $lastname; ?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label for="bday">Birth Date</label>
								<input name="bday" type="date" class="form-control" value="<?php echo $birthdate;?>" required>
							</div>
							<div class="col">
								<label for="phoneNumber">Phone Number</label>
								<input name="phoneNumber" type="text" class="form-control" value="<?php echo $phonenumber;?>" required>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label for="address">Address</label>
								<input name="address" type="text" class="form-control" value="<?php echo $address; ?>" required>
							</div>
						</div>
					</div>
                    <div class="form-group" align="right">
                        <button class="btn btn-primary" type="submit" >Save</button>
                    </div>
				</form>
				<div>
					<a href="<?php echo base_url("user");?>"><button class="btn">Back to Profile</button></a>
				</div>
			</div>
		</div>

	</div>

	<?php
        echo $footer;
    ?>
</body>

</html>
