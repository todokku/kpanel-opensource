<div id="shared" class="tab-pane fade">
    <div class="row">
            <div class="col-md-12" style="margin-bottom: 10px;">
              <button data-toggle="modal" data-target="#sharepayload-modal" type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Partager un payload</button>
            </div>
        <div class="col-md-12">
          <div class="panel panel-default"><div class="panel-heading"><i class="fa fa-list-alt"></i>&nbsp;Shared</div>
            <table id="shared_list" cellspacing="0" width="100%" class="table table-striped table-bordered">
                <thead> 
                    <tr>
                        <th>Nom du Payload</th>
                        <th>Commentaire</th>
                        <th style="min-width: 140px!important">Action</th>
                    </tr>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal création d'un payload -->
<div class="modal fade" id="sharepayload-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Créer un Payload</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label>Nom du payload</label>
            <input type="text" class="form-control" id="shared-name" placeholder="Nom du payload" required>
          </div>
          <div class="form-group">
            <label>Commentaire</label>
            <input type="text" class="form-control" id="shared-comment" placeholder="Commentaire" required>
          </div>
          <div class="form-group">
            <label>Payload</label>
            <textarea class="form-control" rows="5" id="shared-text" required placeholder="Votre code ne doit contenir que des guillements comme ceci ',les autres causerront une erreure"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <button type="button" onclick="sharePayload()" class="btn btn-primary">Partager le Payload</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal apercu d'un paympad -->
<div class="modal fade" id="viewsharedpayload-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edition du payload</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label>Nom du payload</label>
            <input type="text" class="form-control" id="edit-shared-name" readonly="" placeholder="Nom du payload">
          </div>
          <div class="form-group">
            <label>Commentaire</label>
            <input type="text" class="form-control" id="edit-shared-comment" readonly="" placeholder="Commentaire">
          </div>
          <div class="form-group">
            <label>Payload</label>
            <textarea class="form-control" rows="5" id="edit-shared-text" readonly="" placeholder="Votre code ne doit contenir que des guillements comme ceci ',les autres causerront une erreure"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div> 
</div>