<?php 
defined('BASEPATH') OR exit('No direct script access allowed !'); ?>

<nav class="navbar navbar-expand-sm navbar-light bg-white">
	<a class="navbar-brand mr-0 mr-md-2" href="<?php echo base_url(); ?>">
		<img class="img-fluid w-50 h-auto" src="<?php echo base_url("assets/logo.png");?>" alt="">
	</a>

	<button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>"> Home
					<span class="sr-only">(current)</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url("cart"); ?>"> Cart
					<span class="sr-only">(current)</span>
				</a>
			</li>
			<li class="nav-item dropdown active">
				<a class="nav-link dropdown-togggle" id="navbarDropdown" href="#" role="button" data-toggle="dropdown"
					aria-haspopup="true">
					Welcome, <?php 
						$check = $this->customers->customer_details();
						$customername = $check->first_name . " " . $check->last_name;
						echo $customername;
					?>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?php echo base_url("user") ; ?>" >My Profile</a>
					<a href="<?php echo base_url("user/transactions"); ?>" class="dropdown-item">My Transactions</a>
					<a class="dropdown-item text-danger" href="<?php echo base_url("login/logout"); ?>">Log Out</a>
				</div>
			</li>
		</ul>
	</div>

</nav>
