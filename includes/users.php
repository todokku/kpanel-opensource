<div id="users" class="tab-pane fade">
    <div class="row">
        <div class="col-md-12" style="margin-bottom: 10px;">
            <button data-toggle="modal" data-target="#createusers-modal" type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Ajouter un utilisateur</button>
        </div>

        <div class="col-md-12">
          <div class="panel panel-default"><div class="panel-heading"><i class="fa fa-list-alt"></i>&nbsp;Utilisateurs</div>
            <table id="users_list" cellspacing="0" width="100%" class="table table-striped table-bordered">
                <thead> 
                    <tr>
                        <th>Nom d'utilisateur</th>
                        <th>Role</th>
                        <th>Fuck Key</th>
                        <th style="min-width: 70px!important">Action</th>
                    </tr>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-12">
          <div class="panel panel-default"><div class="panel-heading"><i class="fa fa-list-alt"></i>&nbsp;Utilisateurs en attente</div>
            <table id="users_waiting_list" cellspacing="0" width="100%" class="table table-striped table-bordered">
                <thead> 
                    <tr>
                        <th>Nom d'utilisateur</th>
                        <th style="min-width: 70px!important">Action</th>
                    </tr>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal création d'un utilisateurs -->
<div class="modal fade" id="createusers-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Créer un utilisateur</h4>
      </div>
      <div class="modal-body" id="createusers-body">
          <div class="form-group">
            <label>Nom d'utilisateur</label>
            <input type="text" class="form-control" id="users-username" placeholder="Nom d'utilisateur">
          </div>
          <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" class="form-control" id="users-password" placeholder="Mot de passe">
          </div>
          <div class="form-group">
            <label>Confirmé le mot de passe</label>
            <input type="password" class="form-control" id="users-cpassword" placeholder="Mot de passe">
          </div>
          <div class="form-group">
            <label>Mail</label>
            <input type="password" class="form-control" id="users-mail" placeholder="Mail">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <button type="button" onclick="createUser()" class="btn btn-primary">Créer l'utilisateur</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="setrole-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Créer un utilisateur</h4>
      </div>
      <div class="modal-body" id="setrole-body">
          <div class="form-group">
            <label>Role</label>
            <select class="form-control" id="user-role">
              <option value="0">User</option>
              <option value="1">K++</option>
              <option value="2">Admin</option>
            </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
        <button type="button" onclick="setrole()" class="btn btn-primary">Définir le role</button>
      </div>
    </div>
  </div>
</div>
</div>
</div> 