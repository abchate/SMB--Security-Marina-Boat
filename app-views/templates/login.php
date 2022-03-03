<form id="login-form" method="post">
<div class="auth-wrapper">
    <div class="auth-content">

        <div class="auth-bg">
            <span class="r"></span>
            <span class="r s"></span>
            <span class="r s"></span>
            <span class="r"></span>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="fa fa-unlock auth-icon"></i>
                    </div>
                    <h3 class="mb-4">Connectez-vous!</h3>
                    <div class="box-input">
                        <input type="text" name="login" id="login" autocomplete="off" required="required">
                        <label for="login">Identifiant</label>
                        <span></span>
                        <i class="fa fa-user auth-icon"></i>
                    </div>
                    
                    <div class="box-input">
                        <input type="password" name="password" id="password" autocomplete="off" required="required">
                        <label for="password">Mot de passe</label>
                        <span></span>
                        <i class="fa fa-lock auth-icon"></i>
                    </div>
                    
                    <div class="form-group text-left">
                        <div class="d-flex align-items-center">
                            <input type="checkbox" name="savesession" class="form-switch" id="savesession" checked="">
                            <label for="savesession" class="cr"> Restez connecté</label>
                        </div>
                    </div>
                    <button class="ui-btn bc-gradient-blue  rad mb-4" id="send-btn">Connexion</button>
                    <p class="mb-2 text-muted d-flex justify-content-between">
                        <small>Mot de passe oublié ?</small> <a href="#">  Récupérer</a>
                    </p>
                    <p class="mb-0 text-muted d-flex justify-content-between">
                        <small>Vous n'avez pas de compte ?</small> 
                        <a href="<?php echo __webroot ?>register">Inscrivez-vous!</a>
                    </p>
                </div>
        </div>
    </div>
</div>


</form>