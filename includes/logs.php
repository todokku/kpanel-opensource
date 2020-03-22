<div id="logs" class="tab-pane fade">
    <div class="row">
        <div class="col-md-12">
        	<div class="panel panel-default">
			  <div class="panel-heading"><i class="fa fa-list-alt"></i>&nbsp;Logs
			      <?php if($admin == true) { ?> 	
              			  <button class="clear-button" onclick="ClearLog()" >Clear</button>
                     <?php } ?>
			  </div>
			  <div class="panel-body" id="logs-body"></div>
			</div>
       	</div>
    </div>
</div>

<style>
 .clear-button{
     border-radius: 15px;
     font-size: 21px;
     margin-left: 90%;
     background-color: var(--lbtn);
     color: var(--lbtnclr);
 }	
</style>