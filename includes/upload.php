<?php

include '../core/class/include.php';

$id_aut = $_SESSION['id'];

$newpp = $_POST['fileToUpload'];

if (strpos($newpp, 'php') == false) {
$db = mysqli_connect("localhost", "eradium_ripeuped", "PaNOGD9EPaNOGD9E", "eradium_ripeuped");

$setpp = "UPDATE `users` SET `pp` = '".$newpp."' WHERE `users`.`id` = ".$id_aut.";";

$result = mysqli_query($db,$setpp); // here $dbc is your mysqli $link

if (!$result) {

    echo ' Database Error Occured, Please contact an admin';

}

else{

    header("Location: ../dashboard.php");

}

} else { 
	echo $newpp." contain \"php\" (an invalid value) <br>"
?>
<script type="text/javascript">
  var count = 5; // Timer
  var redirect = "../dashboard.php"; // Target URL

  function countDown() {
    var timer = document.getElementById("timer"); // Timer ID
    if (count > 0) {
      count--;
      timer.innerHTML = "This page will redirect in " + count + " seconds."; // Timer Message
      setTimeout("countDown()", 1000);
    } else {
      window.location.href = redirect;
    }
  }
</script>
<p id="timer">
        <script type="text/javascript">
          countDown();
        </script>
      </p>
<?php } ?>