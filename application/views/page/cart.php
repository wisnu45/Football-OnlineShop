<!DOCTYPE html>
<html>

<head>
	<?php echo $style; 
        echo $script;
    ?>
	<title>My Cart - FutBolShop</title>
</head>

<body>
	<?php echo $navbar; ?>


	<div class="containter">
		<h2 align="center">Your Shopping Cart</h2>
		<div class="col-12 col-lg-10 mx-auto">
			<form action="<?php echo base_url('cart/update_cart'); ?>" method="POST">
				<?php if($cart = $this->cart->contents()){ ?>
				<table id="dataTable" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th width="2%">No.</th>
							<th width="10%">Product Picture</th>
							<th width="33%">Item</th>
							<th width="17%">Price</th>
							<th width="8%">Qty</th>
							<th width="20%">Total</th>
							<th width="10%">Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
                $grand_total = 0;
                $i=1;

                foreach($cart as $item):
                    $grand_total += $item['subtotal'];
                ?>
						<!-- <input type="hidden" name="cart[<?php //echo $item['id'];?>][id]"
							value="<?php //echo $item['id'];?>" />
						<input type="hidden" name="cart[<?php //echo $item['id'];?>][name]"
							value="<?php //echo $item['name'];?>" />
						<input type="hidden" name="cart[<?php //echo $item['id'];?>][price]"
							value="<?php //echo $item['price'];?>" />
						<input type="hidden" name="cart[<?php //echo $item['id'];?>][image]"
							value="<?php //echo $item['image'];?>" />
						<input type="hidden" name="cart[<?php //echo $item['id'];?>][qty]"
							value="<?php //echo $item['qty'];?>" /> -->
						<tr>
							<td> <?php echo $i++; ?></td>
							<td><img class="img-fluid" src="<?php echo base_url("assets/images/" . $item['image']);?>" alt=""></td>
							<td><?php echo $item['name']; ?></td>
							<td><?php echo number_format($item['price'], 0, ",", "."); ?></td>
							<td>
								<input type="text" class="form-control input-sm"
									name="cart[<?php echo $item['id']; ?>][qty]" value="<?php echo $item['qty'];?>" />

								<!-- <?php //echo $item['qty'];?> -->
							</td>
							<td><?php echo number_format($item['subtotal'], 0, ",", "."); ?></td>
							<td><a href="<?php echo base_url("cart/delete/" . $item['rowid']); ?>"
									class="btn btn-lg btn-danger"><i class="fas fa-trash-alt"></i></a></td>
							<?php endforeach; ?>
						</tr>
						<tr>
							<td colspan="3"><b>Order Total : Rp
									<?php echo number_format($grand_total, 0, ",", "."); ?></b>
							</td>
							<td colspan="4" align="right">
								<a data-toggle="modal" data-target="#myModal" class='btn btn-sm btn-danger text-white'
									rel="noopener noreferrer">Empty the Cart</a>
								<button class='btn btn-sm btn-success' type="submit">Update Cart</button>
								<a href="<?php echo base_url("cart/check_out");?>" class='btn btn-sm btn-primary'>Check
									Out</a>
							</td>
						</tr>
					</tbody>
				</table>

				<?php
            }else{?>
				<h3 align="center">Shopping Cart is still Empty!</h3>
				<?php }
        ?>
			</form>

			<div>
				<a href="<?php echo base_url(); ?>"><button class="btn btn-primary"><i class="fas fa-backward"></i> Continue Shopping</button></a>
			</div>
		</div>


	</div>




	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-md">
			<!-- Modal content-->
			<div class="modal-content">
				<form method="post" action="<?php echo base_url("cart/delete/all")?>">
					<div class="modal-header">
						<h4 class="modal-title">Confirmation</h4>
						<button type="button" class="close" data-dismiss="modal"><i
								class="fas fa-times-circle"></i></button>
					</div>
					<div class="modal-body">
						Are you sure to Empty the Shopping Cart?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
						<button type="submit" class="btn btn-sm btn-default">Yes</button>
					</div>

				</form>
			</div>

		</div>
	</div>
	<!--End Modal-->

	<?php
		echo $footer;
	?>

	<script>
		$(document).ready(function () {
			$('#dataTable').DataTable();
		});

	</script>

</body>

</html>
