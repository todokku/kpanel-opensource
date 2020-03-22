<?php
$chatname = Account::GetUsername();
?>
<div id="chat" class="tab-pane fade">
    <div class="row">
        <div class="col-md-12">
        	<div class="panel panel-default">
			  <div class="panel-heading"><i class="fa fa-list-alt"></i>&nbsp;Chat
                <?php if($admin == true) { ?>   
                          <button class="clear-button" onclick="ClearChat()" >Clear</button>
                     <?php } ?>
			  </div>

        <div class="panel-body" id="chat-body"></div>

        <div class="panel-footer" style="border-top: 1px solid;"><center>
        <h2>Message :</h2>  
        <input type="text" id="message" required /><br /><br />
        ⚠<span class="text-muted">La touche "Entrée" ne fontionne pas</span>⚠<br></center>
  </p></center>
    
    <center><button type="button" class="btn btn-warning" onclick="AddMessage()"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>&nbsp;Submit</button></center>
        </div>
       	</div>
    </div>
</div>
</div>
<script>
$('.noEnterSubmit').keypress(function(e){
    if ( e.which == 13 ) e.preventDefault(); e.AddMessage();
});
</script>
<style>
 .clear-button{
     border-radius: 15px;
     font-size: 21px;
     margin-left: 90%;
     background-color: var(--lbtn);
     color: var(--lbtnclr);
 } 
.panel-footer{
    border-color: var(--panel-heading-borders)!important;
    background-color: var(--panel-heading-color)!important;
}
#heya{
    color: var(--a-color);
}
</style>
