<div class="modal fade text-left" id="inlineForm" 
    tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Ajout d'une destination par <?php echo $_activeUser->u_nom ?></h4>
                    <button type="button" class="close"
                            data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
            </div>
                <form action="#" id="add-destination" method="post">
                    <div class="modal-body">
                        <div class="d-flex row">
                            <div class="form-group col-6">
                                <label>Nom du bateau</label>
                            <input type="text" name="nom" placeholder="Nom du bateau" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group col-6">
                                <label>N° du bateau</label>
                                <input type="text" name="numero" placeholder="Numéro du bateau" class="form-control" autocomplete="off">
                            </div>
                        </div>

                        <div class="d-flex row">
                            <div class="form-group col-6">
                                <label>île du départ</label>
                                <select name="ile_dep" id="ile_dep" class="form-control">
                                    <option value="Ngazidja">Ngazidja</option>
                                    <option value="Anjouan">Anjouan</option>
                                    <option value="Mohéli">Mohéli</option>
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label>île d'arrivé</label>
                                <select name="ile_arrive" id="ile_arrive" class="form-control">
                                    <option value="Ngazidja">Ngazidja</option>
                                    <option value="Anjouan">Anjouan</option>
                                    <option value="Mohéli">Mohéli</option>
                                </select>
                            </div>
                            
                        </div>

                        <div class="d-flex row">
                            <div class="form-group col-6">
                                <label>Port du départ</label>
                                <input type="text" name="port_dep" placeholder="Port du départ" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group col-6">
                                <label>Port d'arrivé</label>
                                <input type="text" name="port_arrive" placeholder="Port d'arrivé" class="form-control" autocomplete="off">
                            </div>
                        </div>

                        

                        <div class="d-flex row">
                        
                            <div class="form-group col-6">
                                <label for="">Date du départ</label>
                                <input type="datetime-local" name="date_depart" placeholder="Date du départ" class="form-control"
                                        value="<?php echo date("Y-m-d") ?>T<?php echo date('H:i')  ?>"
                                        min="<?php echo date("Y-m-d") ?>T<?php echo date('H:i')  ?>"
                                        max="2035-06-14T00:00" autocomplete="off">
                            </div>
                            <div class="form-group col-6">
                                <label for="">Date d'arrivé</label>
                                <input type="datetime-local" name="date_arrive" placeholder="Date d'arrivé" class="form-control"
                                        value="<?php echo date("Y-m-d") ?>T<?php echo date('H:i')  ?>"
                                        min="<?php echo date("Y-m-d") ?>T<?php echo date('H:i')  ?>"
                                        max="2035-06-14T00:00" autocomplete="off">
                            </div>
                        </div>

              
                        <div class="form-group">
                            <label>Nombre des passagers</label>
                            <input type="text" name="passagers" placeholder="Nombre des passagers" class="form-control" autocomplete="off">
                        </div>

                        <input type="hidden" name="addby" value="<?php echo $_activeUser->u_pid; ?>">
                        <input type="hidden" name="phone" value="<?php echo $_activeUser->u_phone; ?>">


                    
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