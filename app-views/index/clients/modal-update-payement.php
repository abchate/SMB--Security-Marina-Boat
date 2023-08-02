<div class="modal fade text-left" id="inlineForm" 
    tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">payement <?php echo $_activeUser->u_nom ?></h4>
                    <button type="button" class="close"
                            data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
            </div>
                <form action="#" id="update-payement" method="post">
                    <div class="modal-body">
                      
                        <div class="form-group col-6">
                                <label>id</label>
                            <input type="text" name="pid" placeholder="identifiant du client(id)" class="form-control" id="_pid" autocomplete="off">
                            </div>
                        
                        <div class="form-group">
                        <label>status</label>
                            <select name="etat" id="etat" class="form-control">
                                <option value="Payé">Payé</option>
                                <option value="Non-payé">Non-payé</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                             <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Annuler</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" id="updated">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Terminer</span>
                        </button>
                    </div>
                </form>
            </div>
    </div>
</div>