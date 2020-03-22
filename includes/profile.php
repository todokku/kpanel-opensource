<?php



?>

<div id="profile" class="tab-pane fade">

<div class="card card-body">

										<div class="profile-card text-center">

											<div class="thumb-xl member-thumb m-b-10 center-block">

													<div class="user"><img src="<?php echo $pplink;?>" class="img-circle img-thumbnail" alt="profile-image" height="75" width="75"></div>

											</div>

											<div class="">

												<h5 class="m-b-5"></h5>

												<p class="text-muted"><?php echo Account::GetUsername(); echo " ( ID : ".$id_aut." )"; ?></p>
																							<?php  if($admin == true) {echo "<span class=\"badge badge-danger\">";} elseif($kpp == true) {echo "<span class=\"badge badge-warning\">";} else {echo "<span class=\"badge badge-info\">";} ?><?php  if($admin == true) {echo "Administrateur";} elseif($kpp == true) {echo "KZ++";} else {echo "Utilisateur";}?></span><br><br><br><br>


												<p class="text-muted">Email : <br> <?php echo Account::GetUser()['mail']; ?></p>

												<p class="text-muted">Masterkey : <br> <input style="color: black;" readonly="" class="text-center form-control" size="50" value="<?php echo Account::GetUser()['validationtoken']; ?>"> </p>




											</div>

										</div>

										<form action="includes/upload.php" method="post" enctype="multipart/form-data">

    <center><p class="text-muted">Changez son image de profile:

    <br>

    <input type="text" class="text-center form-control" name="fileToUpload" placeholder="https://kpanel.cz/imgs/kalysianewpart.png" id="fileToUpload" size="50" required=""></p>

    <br>

    <input type="submit" value="Set Image" class="btn btn-success" name="submit"></center>

</form>

	
									</div>

								</div>

