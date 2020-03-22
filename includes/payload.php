<?php
$lel = null;
$numbofpay = $GLOBALS['DB']->Count("payload", ["payload_owner" => Account::GetUsername($lel)]);
?>
<div id="payload" class="tab-pane fade">
    <div class="row">
        <?php if($user == true) {
          if($numbofpay < 9) { ?>
            <div class="col-md-12" style="margin-bottom: 10px;">
              <button data-toggle="modal" data-target="#createpayload-modal" type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Ajouter un payload</button>
            </div>
            <?php } else { echo "Exceeded Payload Limits"; } ?>
          <?php } else { ?>
            <div class="col-md-12" style="margin-bottom: 10px;">
              <button data-toggle="modal" data-target="#createpayload-modal" type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Ajouter un payload</button>
            </div>
          <?php } ?>
        <div class="col-md-12">
          <div class="panel panel-default"><div class="panel-heading"><i class="fa fa-list-alt"></i>&nbsp;Payload</div>
            <table id="payload_list" cellspacing="0" width="100%" class="table table-striped table-bordered">
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
<div class="modal fade" id="createpayload-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Créer un Payload</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label>Nom du payload</label>
            <input type="text" class="form-control" id="payload-name" placeholder="Nom du payload">
          </div>
          <div class="form-group">
            <label>Commentaire</label>
            <input type="text" class="form-control" id="payload-comment" placeholder="Commentaire">
          </div>
          <div class="form-group">
            <label>Payload</label>
            <textarea class="form-control" rows="5" id="payload-text" placeholder="Votre code ne doit contenir que des guillements comme ceci ',les autres causerront une erreure"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <button type="button" onclick="createPayload()" class="btn btn-primary">Créer le Payload</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal apercu d'un paympad -->
<div class="modal fade" id="viewpayload-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edition du payload</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label>Nom du payload</label>
            <input type="text" class="form-control" id="edit-payload-name" placeholder="Nom du payload">
          </div>
          <div class="form-group">
            <label>Commentaire</label>
            <input type="text" class="form-control" id="edit-payload-comment" placeholder="Commentaire">
          </div>
          <div class="form-group">
            <label>Payload</label>
            <textarea class="form-control" rows="5" id="edit-payload-text" placeholder="Votre code ne doit contenir que des guillements comme ceci ',les autres causerront une erreure"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="editPayload()" class="btn btn-warning" data-dismiss="modal">Edité</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div> 
</div>