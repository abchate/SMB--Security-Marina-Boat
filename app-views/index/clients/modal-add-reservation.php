<div class="modal fade text-left" id="inlineForm" 
    tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Ajout d'une réservation par <?php echo $_activeUser->u_nom ?></h4>
                    <button type="button" class="close"
                            data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
            </div>
                <form action="#" id="add-reservation" method="post">
                    <div class="modal-body">
                        <div class="d-flex row">
                            <div class="form-group col-6">
                                <label>Nom</label>
                            <input type="text" name="nom" placeholder="Nom du client" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group col-6">
                                <label>Prénom</label>
                                <input type="text" name="prenom" placeholder="Prénom du client" class="form-control" autocomplete="off">
                            </div>
                        </div>

                        <div class="d-flex row">
                            <div class="form-group col-6">
                                <label>Téléphone</label>
                            <input type="number" name="phone" placeholder="Téléphone du client" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group col-6">
                                <label>matricule</label>
                                <input type="text" name="matricule" placeholder="matricule" class="form-control" autocomplete="off">
                            </div>
                        </div>

                        <div class="d-flex row">
                            <div class="form-group col-6">
                                 <label>Nom du bateau</label>
                            <input type="text" name="nombateau" placeholder="Nom du bateau" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Départ</label>
                                <input type="datetime-local" name="depart" placeholder="Départ" class="form-control"
                                        value="<?php echo date("Y-m-d") ?>T<?php echo date('H:i')  ?>"
                                        min="<?php echo date("Y-m-d") ?>T<?php echo date('H:i')  ?>"
                                        max="2035-06-14T00:00" autocomplete="off">
                            </div>
                        </div>
                        

                        <div class="d-flex row">
                            <div class="form-group col-6">
                                 <label>Nombre d'enfant</label>
                            <input type="text" name="nbrenfant" placeholder="Nombre d'enfant" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Arrivé</label>
                                <input type="datetime-local" name="arrive" placeholder="Arrivé" class="form-control"
                                        value="<?php echo date("Y-m-d") ?>T<?php echo date('H:i')  ?>"
                                        min="<?php echo date("Y-m-d") ?>T<?php echo date('H:i')  ?>"
                                        max="2035-06-14T00:00" autocomplete="off">
                            </div>
                        </div>

                        
                        <div class="form-group">
                        <label for="Statut">Statut</label>
                            <select name="Status" id="etat" class="form-control">
                                <option value="Payé">Payé</option>
                                <option value="Non-payé">Non-payé</option>
                            </select>
                        </div>

                        <input type="hidden" name="addby" value="<?php echo $_activeUser->u_pid; ?>">

                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                             <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Annuler</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" id="latedismiss">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Enregistrer</span>
                        </button>
                    </div>
                </form>
            </div>
    </div>
</div>