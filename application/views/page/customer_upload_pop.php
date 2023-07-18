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
			<div class="card-body" align="center">
				<form class="form" action="<?php //echo base_url("user/update_pop"); ?>" method="POST">
					<div class="form-group">
						<h3 class="text-primary">Upload Proof of Payment (Bank Transfer)</h3>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label for="oldemail">Transaction Value</label>
								<!-- <input name="oldemail" type="hidden" class="form-control" value="<?php //echo $email;?>"> -->
								<p><b><?php echo "Rp " .number_format($transaction->transactionValue, 0, ",", ".");?></b></p>
							</div>
						</div>
						<div align="center">
							<input type="file">
						</div>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Upload</button>
					</div>
				</form>
				<div>
					<a href="<?php echo base_url("user/transactions");?>"><button class="btn">Back to My Transactions</button></a>
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
