<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
        echo $style;
        echo $script;
    ?>
	<title>Hello</title>
</head>

<body>
    <?php echo $navbar;
    ?>
    <div class="container mx-auto" align="center">
        <div><?php echo $message;?></div>
        <a href="<?php echo base_url("login"); ?>"><button class="btn btn-primary">Back to Login</button></a>
    </div>
        
    <?php    
    echo $footer;
    ?>
    
</body>
</html>