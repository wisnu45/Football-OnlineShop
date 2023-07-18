<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
        echo $style;
        echo $script;
    ?>
	<title>My Profile - FutBolShop</title>
</head>

<body>
	<?php echo $navbar; ?>
	<div class="container">
		<div class="card">
			<div class="card-body">
				<div class="card-title">
					<h4><?php echo $customername; ?></h4>
				</div>
				<div class="card-text">
					<table class="table">
						<tr>
							<td>Email</td>
							<td><?php echo $email; ?>
								<br>
								<a href="<?php echo base_url("user/edit_email"); ?>"><button class="btn">Change
										E-Mail</button></a>
								<a href="<?php echo base_url("user/edit_password") ?>"><button class="btn">Change
										Password</button></a>
							</td>
						</tr>
						<tr>
							<td>Address</td>
							<td><?php echo $address; ?></td>
						</tr>
						<tr>
							<td>Phone Number</td>
							<td><?php echo $phonenumber; ?></td>
						</tr>
						<tr>
							<td>Birthdate</td>
							<td><?php echo $birthdate; ?></td>
						</tr>
					</table>
					<a href="<?php echo base_url("user/edit_profile") ?>"><button class="btn">Edit My
							Profile</button></a>
					<a href="<?php echo base_url("user/transactions") ?>"><button class="btn btn-primary">My
							Transactions</button></a>
				</div>
				<?php 
                    if($address == NULL || $phonenumber == NULL || $birthdate == NULL){?>
                    <div class="mt-4">
                        <p class="text-danger">Please Register a valid address, phone number, and birthdate before you can
                            purchase our products.</p>
                    </div>
				<?php
                    }
                ?>

			</div>
		</div>
	</div>
	<?php
		echo $footer;
	?>
</body>

</html>
