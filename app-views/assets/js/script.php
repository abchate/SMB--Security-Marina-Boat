<script src="<?php echo __pack.'js/unify.js' ?>"></script>


<?php // all global js files?>

<?php if ($page != 'login'  && $page != 'register'): ?>
	

	<script src="<?php echo __pack ?>vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo __pack ?>js/bootstrap.min.js"></script>

    <script src="<?php echo __pack ?>vendors/apexcharts/apexcharts.min.js"></script> 

    <script src="<?php echo __pack ?>js/main.js"></script>

<?php endif ?>
<?php 

	/**
	 * @requires ['inclusion automatique du fichier js concerné']
	 */

 ?>

<?php if ($page == "home" ||$page == "boat"): ?>
	<script src="<?php echo __pack ?>vendors/simple-datatables/simple-datatables.js"></script>
<?php endif ?>
<?php if (file_exists(__assets.'js/'.$page.'.js')): ?>
	<script src="<?php echo __wessets.'js/'.$page.'.js'; ?>"></script>
<?php endif ?>