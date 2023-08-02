<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<section class="row">
    <div class="col-12 col-lg-9">
        <div class="row">
            <div class="col-6 col-lg-4 col-md-6 anim-1">
                <div class="card">
                    <div class="card-body px-3 py-4-5 zoom">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon purple">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Bateaux embarqués</h6>
                                <h6 class="font-extrabold mb-0">112.000</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-6 col-lg-4 col-md-6 anim-2">
                <div class="card">
                    <div class="card-body px-3 py-4-5 anim-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon blue">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Reservations annulées</h6>
                                <h6 class="font-extrabold mb-0">183.000</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-4 col-md-6 anim-3">
                <div class="card">
                    <div class="card-body px-3 py-4-5 anim-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon green">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Nombre de reservation</h6>
                                <h6 class="font-extrabold mb-0">80.000</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                  
    </div>

    <div class="col-12 col-lg-3 anim-1">
        <div class="card">
            <div class="card-body py-4 px-4 swa">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl">
                        <img src="<?php echo IMG::pack('images/faces/'.$image); ?>" alt="Face 1">
                    </div>
                    <div class="ms-2 name">
                        <h5 class="font-bold"><?php echo $_activeUser->u_nom .' '. $_activeUser->u_prenom; ?></h5>
                    </div>
                </div>
            </div>
        </div>                 
    </div>
</section>