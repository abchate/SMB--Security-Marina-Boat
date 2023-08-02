<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Bateaux disponibles</h4>
            <div class="ui-btn bc-gradient-blue pd8 rad" data-bs-toggle="modal" data-bs-target="#inlineForm">Ajouter</div>
        </div>
        <hr>
        <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th><small>Nom du bateau</small></th>
                    <th><small>N° du bateau</small></th>
                    <th><small>Île du dép.</small></th>
                    <th><small>Port du dép.</small></th>
                    <th><small>Date du dép.</small></th>
                    <th><small>Île d'arrivé</small></th>
                    <th><small>Port d'arrivé</small></th>
                    <th><small>Date d'arrivé</small></th>
                    <th><small>N° Passagers</small></th>
                    <th><small>Statut</small></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)): ?>
                <?php foreach ($data as $d): ?>
                                 
                <tr>
                    <td><small><?php echo  $d->nom; ?></small></td>
                    <td><small><?php echo  $d->numero; ?></small></td>
                    <td><small><?php echo  $d->ile_depart; ?></small></td>
                    <td><small><?php echo  $d->port_depart; ?></small></td>
                    <td><small>Dans<?php echo  AddDate::send($d->date_depart) ;?></small></td>
                    <td><small><?php echo  $d->ile_arrive; ?></small></td>
                    <td><small><?php echo  $d->port_arrive; ?></small></td>
                    <td>Dans <small><?php echo  AddDate::send($d->date_arrive); ?></small></td>
                    <td><small><?php echo  $d->passagers; ?></small></td>

                </tr>
                <?php endforeach ?> 
                <?php else: ?>
                    <tr>
                    <p>Aucun voyage n'est planifié</p>
                        
                    </tr>
                <?php endif ?>
            </tbody>
         </table>
        </div>
    </div>
</section>




<?php require View::bind('boat/modal-add-boat'); ?>