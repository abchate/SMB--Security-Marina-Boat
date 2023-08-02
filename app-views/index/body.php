<!--[if lt IE 8]>
	<p class="browserupgrade">Vous utilisé un vieux<strong>outdated</strong> navigateur. S'il vous plaît <a href="http://browsehappy.com/">Mettre à jour votre navigateur</a> pour plus d'expérience.</p>
<![endif]-->

<?php if ($page != 'login' && $page != 'register'): ?>
	

<!-- Current page starter -->
<div id="app">

	<!-- menu starter -->
	<?php require View::bind("components/menu"); ?>
	<!-- menu end -->

	<!-- main container starter -->
	<div id="main">

		<!-- appbar starter -->
		<?php require View::bind("components/appbar"); ?>
		<!-- appbar end -->

		<!-- Wrapper all current page content starter -->
		<div class="page-content">
			<?php require View::add($page); ?>
		</div>
		<!-- Wrapper all current page content starter -->


		<!-- main fotter starter -->
		<?php require View::bind("components/footer"); ?>
		<!-- main fotter starter -->

	</div>
	<!-- main container end -->

</div>
<!-- Current page end -->
<?php else: ?>
	<?php require View::add($page); ?>
<?php endif ?>

	


 