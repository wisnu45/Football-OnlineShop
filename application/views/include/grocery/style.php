<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css');?>">

<?php foreach($crud['css_files'] as $file) : ?>
	<link rel="stylesheet" href="<?php echo $file; ?>">
<?php endforeach; ?>