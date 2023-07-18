<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $style ?>
    <title>Admin Panel</title>
</head>
<body>
    <?php echo $navbarAdmin ?>
    
    <div class="container-fluid main-container">
        <?php echo $sidebarAdmin ?>
            
        <div class="col-md-10 content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Users
                </div>
                <div class="row">
                    <div class="col-md-12"><?php echo $crud['output']; ?></div>
                </div>
            </div>
        </div>

    </div>

    <?php echo $script ?>
</body>
</html>