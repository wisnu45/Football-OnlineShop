<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$ci = new CI_Controller();
$ci =& get_instance();
$ci->load->helper('url');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        echo $style;
        echo $script; 
    ?>
    <title>Error 404</title>
</head>
<body>
    <?php $navbar;?>
    <?php $heading;?>
    <?php $message;?>
    <?php $footer;?>
</body>
</html>