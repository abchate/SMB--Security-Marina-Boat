<form id="regiter-user" method="post">
<div class="auth-wrapper">
	<div class="centralize-form">
		<div class="side-left">
			<div class="logo-erea">
				<div class="avatar">
					<img src="<?php echo IMG::pack('images/logo/logo.jpg'); ?>" alt="">
				</div>
				<h2 class="logo-title">Security Marina Admin</h2>
			</div>
			<h2 class="head-title">Inscrivez-vous !</h2>
			<p><b class="divider">Important</b><br>Les informations saisies dans ce formulaire doivent être exactement les mêmes que celles renseignées dans votre pièce d'identité ! </p>
			<p>Vous avez déjà un compte ?</p>
			<a href="<?php echo __webroot ?>login/" class="btn btn-primary">Connectez-vous !</a>
		</div>
			
		<div class="side-right">
			<div class="box-input">
				<input type="text" name="nom" id="nom" autocomplete="off" required>
				<label for="nom">Nom</label>
				<span></span>
				<i class="fa fa-user"></i>
			</div>

			<div class="box-input">
				<input type="text" name="prenom" id="prenom" autocomplete="off" required>
				<label for="prenom">Prénom</label>
				<span></span>
				<i class="fa fa-user"></i>
			</div>

			<div class="box-input">
				<input type="text" name="nin" id="nin" autocomplete="off" required>
				<label for="nin">Numéro d'identité nationale (NIN)</label>
				<span></span>
				<i class="fa fa-calendar"></i>
			</div>
			<div class="box-input">
				<input type="text" name="phone" id="phone" autocomplete="off" required>
				<label for="phone">Téléphone</label>
				<span></span>
				<i class="fa fa-phone"></i>
			</div>

			<div class="box-input">
				<input type="text" name="password" id="password" autocomplete="off" required>
				<label for="password">Créer un mot de passe</label>
				<span></span>
				<i class="fa fa-lock"></i>
			</div>

			<div class="box-input">
				<input type="text" name="confirm" id="confirm" autocomplete="off" required>
				<label for="confirm">Confirmer le mot de passe</label>
				<span></span>
				<i class="fa fa-lock"></i>
			</div>

			<button type="submit" class="ui-btn bc-gradient-blue rad expand" id="send-btn">Terminer</button>
		</div>
	</div>
</div>

</form>