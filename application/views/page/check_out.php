<!DOCTYPE html>
<html>

<head>
	<?php echo $style; 
        echo $script;
    ?>
	<title>Check Out - FutBolShop</title>
</head>

<body>
	<?php echo $navbar; ?>
	<div class="container">

		<div class="col-12 col-lg-10 mx-auto">
			
				<?php if($cart = $this->cart->contents()){ ?>
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

                foreach($cart as $item):
                    $grand_total += $item['subtotal'];
                ?>
	
						<tr>
							<td> <?php echo $i++; ?></td>
							<td><img class="img-fluid" src="<?php echo base_url("assets/images/".$item['image']);?>" alt=""></td>
							<td><?php echo $item['name']; ?></td>
							<td><?php echo number_format($item['price'], 0, ",", "."); ?></td>
							<td>
								<?php echo $item['qty'];?>
							</td>
							<td><?php echo number_format($item['subtotal'], 0, ",", "."); ?></td>
							<?php endforeach; ?>
						</tr>
						<tr>
							<td colspan="6" class="text-right"><b>Order Total : Rp
									<?php echo number_format($grand_total, 0, ",", "."); ?></b>
							</td>
						</tr>
					</tbody>
				</table>

				<?php
            }else{?>
				<h3>Shopping Cart is still Empty!</h3>
				<?php }
        ?>
			
		</div>

		<?php
    $grand_total = 0;
    if ($cart = $this->cart->contents())
        {
            foreach ($cart as $item)
                {
                    $grand_total = $grand_total + $item['subtotal'];
                }
    ?>
		<table class="table table-striped">
			<tr>
				<td>Total Shopping Value : </td>
				<td><h2><b><?php echo "Rp ". number_format($grand_total,0,",","."); ?></b></h2></td>
			</tr>
			<tr>
				<td>Email : </td>
				<td><?php echo $this->session->userdata('name'); ?></td>
			</tr>
			<tr>
				<td>Name : </td>
				<td><?php echo $customername;?></td>
			</tr>
			<tr>
				<td>Address : </td>
				<td><?php echo $address;?></td>
			</tr>
			<tr>
				<td>Phone Number :</td>
				<td><?php echo $phonenumber;?></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="<?php echo base_url("user"); ?>"><button class="btn">My Profile</button></a></td>
			</tr>
		</table>

		<div class="container card mb-4 pt-2">
			<form action="<?php echo base_url("cart/proceed_order"); ?>" method="POST">
				<div class="form-group">
					<label for="peymentMethod">
						<h3>Choose Payment Method</h3>
					</label> <br>
					<div class="row">
						<div class="col-6 input-group">
							<input name="paymentMethod" type="radio" value="Bank Transfer" required>
							<img class="img-fluid w-25 h-25" src="<?php echo base_url("assets/bank.svg"); ?>" alt="" />
							<h4>Bank Transfer</h4>
							<div class="container col-12">
								<p class="">
									via BCA 882 254 6644 <br>
									(FutBolShop Setia Jaya)
								</p>
							</div>

						</div>
						<?php 
							// if($grand_total <= 1000000){
						?>
						<div class="col-6 input-group">
							<input name="paymentMethod" type="radio" value="Cash on Delivery" required>
							<img class="img-fluid w-25 h-25"
								src="<?php echo base_url("assets/cash-on-delivery.svg"); ?>" alt="" />
							<h4>Cash On Delivery</h4>
						</div>
						<?php
							// }
						?>
					</div>
				</div>

				<!-- <div>
					<p class="text-primary">Pilihan Pembayaran Cash on Delivery hanya berlaku apabila nilai total belanja tidak melebihi Rp 1.000.000</p>
				</div> -->

				<div class="mb-4">
					<button type="submit" class="btn btn-primary ">Process
						Order</button>
				</div>
			</form>
		</div>
		<a class="" href="<?php echo base_url('cart');?>"><button class="btn btn-default">Back to Cart</button></a>
		<?php
    }
    else
        {
            echo "<h5>Your shopping cart is still Empty!</h5>";
        }
    ?>
	</div>
	<?php
		echo $footer;
	?>
</body>

</html>
