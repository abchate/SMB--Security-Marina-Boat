<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Réservations</h4>
            
        </div>
        <hr>
        <div class="card-body">
        <table class="table table-striped" id="table1">
            <tdead>
                <tr class="bc-gradient-blue cw"> 
                    <td>Nom complet</td>
                    <td>Téléphone</td>
                    <td>matricule</td>
                  
                    <td>Actions</td>
                    

                </tr>
            </tdead>
            <tbody>
                <?php if (!empty($data)): ?>
                <?php foreach ($data as $d): ?>
                     
                
                <tr>
                    
                    <td><?php echo $d->nom . ' '. $d->prenom ?></td>
                    <td><?php echo $d->phone; ?></td>
                    <td><?php echo $d->matricule; ?></td>
        
                    
                    <td>
                    
                    <span class="bc-gradient-blue pd8 cw rad setdata" dataset="<?php echo $d->pid; ?>">Plus des détails</span>
                    </td>
                </tr>
                <?php endforeach ?> 
                <?php else: ?>
                    <p>Aucune réservation n'est encore éffectué</p>
                <?php endif ?>
            </tbody>
         </table>
        </div>
    </div>
</section>




<?php require View::bind('clients/modal-update-payement'); ?>
<?php require View::bind('clients/modal-user'); ?>



<form id="fakeData" method="post">
    <input type="hidden" name="pid" id="userpid">
</form>





    