<!DOCTYPE html>
<html>

<head>
	<?php echo $style; 
	echo $script;
	?>
	<title>Payment - Tokoinator</title>
</head>

<body>
	<?php echo $navbar; ?>
	<div class="container" align="center">
		<h2>Order Processed Successfully</h2>
		<h4><?php echo "Rp ". number_format($lastOrderValue,0,",","."); ?></h4>
		<p>Screenshot Layar Ini jika Anda merasa perlu sebagai Bukti.</p>
		<p>Admin akan segera menghubungi Anda untuk detail pembayaran.</p>

		<a href="<?php echo base_url("user/transactions");?>"><button class="btn btn-success">My Transactions</button></a>
	</div>
	
	<?php
		echo $footer;
	?>
</body>

</html>
