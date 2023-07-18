<?php 
defined('BASEPATH') OR exit('No direct script access allowed !'); ?>

<?php $uri = $this->uri->segment(2); ?>

<div class="col-md-2 sidebar">
    <div class="row">
        <!-- uncomment code for absolute positioning tweek see top comment in css -->
        <div class="absolute-wrapper"> 
        </div>
        <!-- Menu -->
        <div class="side-menu">
            <nav class="navbar navbar-default" role="navigation">
            <!-- Main Menu -->
                <?php if($this->session->userdata('access') == 'Super Admin'): ?>
                <div class="side-menu-container">
                    <ul class="nav navbar-nav">
                        <li class="<?php if($uri == 'products'){?> active <?php } ?>">
                            <a href="<?php echo base_url('Admin/products') ?>">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Products
                            </a>
                        </li>
                        <li class="<?php if($uri == 'categories'){?> active <?php } ?>">
                            <a href="<?php echo base_url('Admin/categories') ?>">
                                <span class="glyphicon glyphicon-th-list"></span> Categories
                            </a>
                        </li>
                        <li class="<?php if($uri == 'suppliers'){?> active <?php } ?>">
                            <a href="<?php echo base_url('Admin/suppliers') ?>">
                                <span class="glyphicon glyphicon-th"></span> Suppliers
                            </a>
                        </li>
                        <li class="<?php if($uri == 'users'){?> active <?php } ?>">
                            <a href="<?php echo base_url('Admin/users') ?>">
                                <span class="glyphicon glyphicon-user"></span> Users
                            </a>
                        </li>
                        <li class="<?php if($uri == 'orders'){?> active <?php } ?>">
                            <a href="<?php echo base_url('Admin/orders') ?>">
                                <span class="glyphicon glyphicon-book"></span> Orders
                            </a>
                        </li>
                        <li class="<?php if($uri == 'admins'){?> active <?php } ?>">
                            <a href="<?php echo base_url('Admin/admins') ?>">
                                <span class="glyphicon glyphicon-user"></span> Admins
                            </a>
                        </li>

                    </ul>
                </div>
                <?php else: ?>
                <div class="side-menu-container">
                    <ul class="nav navbar-nav">
                        <li class="<?php if($uri == 'products'){?> active <?php } ?>">
                            <a href="<?php echo base_url('Admin/products') ?>">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Products
                            </a>
                        </li>
                        <li class="<?php if($uri == 'categories'){?> active <?php } ?>">
                            <a href="<?php echo base_url('Admin/categories') ?>">
                                <span class="glyphicon glyphicon-th-list"></span> Categories
                            </a>
                        </li>
                        <li class="<?php if($uri == 'suppliers'){?> active <?php } ?>">
                            <a href="<?php echo base_url('Admin/suppliers') ?>">
                                <span class="glyphicon glyphicon-th"></span> Suppliers
                            </a>
                        </li>
                        <li class="<?php if($uri == 'users'){?> active <?php } ?>">
                            <a href="<?php echo base_url('Admin/users') ?>">
                                <span class="glyphicon glyphicon-user"></span> Users
                            </a>
                        </li>
                        <li class="<?php if($uri == 'orders'){?> active <?php } ?>">
                            <a href="<?php echo base_url('Admin/orders') ?>">
                                <span class="glyphicon glyphicon-book"></span> Orders
                            </a>
                        </li>

                    </ul>
                </div>
                <?php endif; ?><!-- /.navbar-collapse -->
            </nav>
        </div>
    </div>  		
</div>