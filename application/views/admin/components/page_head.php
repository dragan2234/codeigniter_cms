<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $meta_title; ?></title>

	 <link href="<?php echo site_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo site_url('js/bootstrap.min.js'); ?>"></script>
    <?php if (isset($sortable) && $sortable === TRUE) : ?>
    <script src="<?php echo site_url('js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo site_url('js/jquery.mjs.nestedSortable.js'); ?>"></script>

<?php endif; ?>
</head>
<body>