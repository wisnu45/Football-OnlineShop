<!DOCTYPE html>
<html>

<head>
	<?php echo $style; ?>
	<style>
		.card-img-top {
			width: 100%;
			height: 15vw;
			object-fit: cover;
		}

	</style>
	<title>Tokoinator</title>
</head>

<body>
	<?php echo $navbar; ?>
	<br />
	<br />
	<br />
	<br />
	<br />

	<div class="container">
		<div class="row">
			<?php foreach($products as $row) { ?>
			<div class="col-4 mt-2">
				<div class="card">
					<form action="<?php echo base_url("cart/add"); ?>" method="POST">
						<img class="img-fluid card-img" src="<?php echo base_url("assets/images/".$row['ProductImage']); ?>">
						<div class="card-body bg-light">
							<h4 class="card-title"><?php echo $row['ProductName']; ?></h4>
							<p class="card-text card-expand">
								<?php echo $row['ProductDescription']; ?>
							</p>
							<p class="card-text"><small
									class="text-muted"><?php echo "Rp " . number_format($row['ProductPrice'], 0, ",", "."); ?></small>
							</p>

							<input type="hidden" name="productId" value="<?php echo $row['ProductID']; ?>" />
							<input type="hidden" name="productName" value="<?php echo $row['ProductName']; ?>" />
							<input type="hidden" name="productPrice" value="<?php echo $row['ProductPrice']; ?>" />
							<input type="hidden" name="productImage" value="<?php echo $row['ProductImage']; ?>" />
							<input type="hidden" name="productQty" value="1" />
							
							<button type="submit" class="btn btn-primary">Add to Cart</button>
						</div>
					</form>
				</div>
			</div>

			<?php } ?>
		</div>
	</div>

	<?php echo $script;
		echo $footer;
	?>
</body>

</html>
