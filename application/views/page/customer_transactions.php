<!DOCTYPE html>
<html>

<head>
	<?php echo $style; 
        echo $script;
    ?>
	<title>My Transactions - FutBolShop</title>
</head>

<body>
	<?php echo $navbar; ?>
	<div class="container col-12 col-lg-10 mx-auto">
		<h2 class="" align="center">My Transactions</h2>
		<table class="table">

			<?php
                if($transactions != NULL){
                    $i=1;?>
			<thead>
				<th>No.</th>
				<th>Transaction Date</th>
				<th>Transaction Value</th>
				<th>Payment Method</th>
				<th>Transaction Status</th>
				<th>Upload Proof of Payment</th>
				<th></th>
			</thead>
			<tbody>
				<?php
                    foreach($transactions as $transaction): ?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $transaction['transactionDate']; ?></td>
					<td><?php echo "Rp " .number_format($transaction['transactionValue'], 0, ",", "."); ?></td>
					<td><?php echo $transaction['paymentMethod']; ?></td>
					<td><?php echo $transaction['transactionStatus']; ?></td>
					<td>
						<?php if($transaction['paymentMethod'] == "Bank Transfer" && $transaction['transactionStatus'] == "PENDING"){?>
							<form action="<?php echo base_url("user/upload_pop");?>" method="POST">
								<input type="hidden" name="transactionID"
									value="<?php echo $transaction['TransactionID'];?>">
								<button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i></button>
							</form>
						<?php
						} ?>

					</td>
					<td>

						<form action="<?php echo base_url("user/transaction_details");?>" method="POST">
							<input type="hidden" name="transactionID"
								value="<?php echo $transaction['TransactionID'];?>">
							<button type="submit" class="btn btn-success">Details</button>
						</form>
					</td>

				</tr>
				<?php endforeach; 
                }
                else{?>
				<div class="container col-10 col-sm-8 col-md-6 col-lg-6 col-xl-4 mt-3">
					<h3 align="center">You Have Never Made a Transactions!</h3>
					<a href="<?php echo base_url();?>"><button class="btn btn-primary btn-block">Shop Now</button></a>
				</div>
				<?php }
                ?>

			</tbody>
		</table>

		<div class="col-6 mx-auto text-dark card p-4" align="center">
			<h4>Payment Info</h4>
			<h6>Bank Transfer</h6>
			<p class="">
				via BCA 882 254 6644 (FutBolShop Setia Jaya)
			</p>


		</div>
	</div>

	<?php
        echo $footer;
    ?>
</body>

</html>
