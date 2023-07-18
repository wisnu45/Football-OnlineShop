<?php 
defined('BASEPATH') OR exit('No direct script access allowed !'); ?>

<nav class="navbar navbar-expand-sm navbar-light bg-white">
	<a class="navbar-brand mr-0 mr-md-2" href="<?php echo base_url(); ?>">
		<img class="w-50 h-auto" src="<?php echo base_url("assets/logo.png");?>" alt="">
	</a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
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
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url("login"); ?>"> Sign In
					<span class="sr-only">(current)</span>
				</a>
			</li>
		</ul>
	</div>

</nav>
