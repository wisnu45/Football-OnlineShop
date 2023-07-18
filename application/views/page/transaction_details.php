<!DOCTYPE html>
<html>

<head>
	<?php echo $style; 
        echo $script;
    ?>
	<title>Transaction Details - FutBolShop</title>
</head>

<body>
	<?php echo $navbar;?>
	<div class="col-12 col-lg-10 mx-auto">
		<h2 align="center">Transaction Details</h2>
		<table class="table mt-4">
			<tr>
				<td>Transaction Date :</td>
				<td><?php echo $transaction->transactionDate;?></td>
			</tr>
			<tr>
				<td>Payment Method :</td>
				<td><?php echo $transaction->paymentMethod;?></td>
			</tr>
			<tr>
				<td>Status :</td>
				<td><?php echo $transaction->transactionStatus;?></td>
			</tr>
		</table>


		<table id="dataTable" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th width="2%">No.</th>
					<th width="15%">Product Picture</th>
					<th width="33%">Item</th>
					<th width="17%">Price</th>
					<th width="13%">Qty</th>
					<th width="20%">Total</th>
				</tr>
			</thead>
			<tbody>
				<?php
                $grand_total = 0;
                $i=1;

                foreach($orders as $item):
                    $subtotal = $item['price'] * $item['qty'];
                    $grand_total += $subtotal;
                ?>

				<tr>
					<td> <?php echo $i++; ?></td>
					<td><img class="img-fluid" src="<?php echo base_url("assets/images/".$item['image']);?>" alt=""></td>
					<td><?php echo $item['name']; ?></td>
					<td><?php echo number_format($item['price'], 0, ",", "."); ?></td>
					<td>
						<?php echo $item['qty'];?>
					</td>
					<td><?php echo number_format($subtotal, 0, ",", "."); ?></td>
					<?php endforeach; ?>
				</tr>
				<tr>
					<td colspan="6" class="text-right"><b>Order Total : Rp
							<?php echo number_format($grand_total, 0, ",", "."); ?></b>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="container mt-4">
			<a href="<?php echo base_url("user/transactions"); ?>"><button class="btn btn-block btn-primary">Back to My
					Transactions</button></a>
		</div>

	</div>

	<?php echo $footer; ?>
</body>

</html>
