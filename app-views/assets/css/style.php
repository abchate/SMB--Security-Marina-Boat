<link rel="stylesheet" href="<?php echo __pack.'reset.css'; ?>">
<link rel="stylesheet" href="<?php echo __pack.'icones/font-awesome/css/font-awesome.css'; ?>">
<link rel="stylesheet" href="<?php echo __pack ?>css/uix.css">
<link rel="stylesheet" href="<?php echo __pack ?>css/app.css">
<?php // Add global css  ?>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    
    <link rel="stylesheet" href="<?php echo __pack ?>vendors/iconly/bold.css">

    <link rel="stylesheet" href="<?php echo __pack ?>vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo __pack ?>vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="shortcut icon" href="<?php echo IMG::pack('images/favicon.svg') ?>" type="image/x-icon">

<?php 

	/**
	 * @requires ['inclusion automatique du fichier css de la page currante']
	 */

 ?>
<?php if (file_exists(__assets.'css/'.$page.'.css')): ?>
	<link rel="stylesheet" href="<?php echo __wessets.'css/'.$page.'.css'; ?>">
<?php endif ?>