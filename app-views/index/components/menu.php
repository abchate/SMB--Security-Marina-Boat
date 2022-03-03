<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">

        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?php echo __webroot ?>">
                        <img src="<?php echo IMG::pack('images/logo/logo.jpg') ?>" alt="Logo" style="width:80px; height: 80px;border-radius: 10px;" >
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block">
                        <i class="bi bi-x bi-middle"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item <?php echo $page =='home' ? 'active' : '' ?> anim-1">
                    <a href="<?php echo __webroot ?>" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Les Réservations</span>
                    </a>
                </li>

                <!-- <li class="sidebar-item <?php echo $page =='profil' ? 'active' : '' ?> anim-1">
                    <a href="<?php echo __webroot ?>profil/" class='sidebar-link'>
                        <i class="fa fa-users"></i>
                        <span>Mon profil</span>
                    </a>
                </li> -->

                <li class="sidebar-item <?php echo $page =='boat' ? 'active' : '' ?> anim-2"> 
                    <a href="<?php echo __webroot ?>boat/" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Mes déstinations</span>
                    </a>
                </li>

                <!-- <li class="sidebar-item anim-3">
                    <a href="<?php echo __webroot ?>/clients" class='sidebar-link'>
                        <i class="fa fa-users"></i>
                        <span>Clients</span>
                    </a>
                </li> -->

                <li class="sidebar-item anim-4">
                    <a href="<?php echo __webroot ?>logout/" class='sidebar-link'>
                        <i class="fa fa-close"></i>
                        <span>Déconnexion</span>
                    </a>
                </li>    
            </ul>
        </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>