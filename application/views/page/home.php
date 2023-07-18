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

		.img_dummy {
			width: 100%;
			height: 420px;
			background-color: grey;
		}

		.carousel {
			background-color: #ffa500;
		}

	</style>
	<title>FutBolShop</title>
</head>

<body>
	<?php echo $navbar; ?>

	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100 h-auto img_dummy img-fluid" src="<?php echo base_url("assets/images/". "banner1.jpg"); ?>"
					alt="First slide">
			</div>
			<div class="carousel-item ">
				<img class="d-block w-100 h-auto img_dummy img-fluid" src="<?php echo base_url("assets/images/". "banner2.jpg"); ?>"
					alt="Second slide">
			</div>
			<div class="carousel-item ">
				<img class="d-block w-100 h-auto img_dummy img-fluid" src="<?php echo base_url("assets/images/". "banner3.jpg"); ?>"
					alt="Third slide">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>


	<div class="container">


		<div class="mt-5">
		<h4><a href="<?php echo base_url("items") ?>">
				View All Products
			</a></h4>
		</div>
		<div class="row ">
			
			<?php 
				$counter=0;
			foreach($products as $row) { ?>
			<div class="col-4 mt-3">
				<div class="card">
					<form action="<?php echo base_url("cart/add"); ?>" method="POST">
						<img class="img-fluid card-img"
							src="<?php echo base_url('assets/images/' . $row['ProductImage']); ?>">
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
			<?php 
				$counter++;
			if($counter==3) break; } ?>
		</div>

	</div>

	<?php echo $script; ?>
	<?php
		echo $footer;
	?>
</body>

</html>
