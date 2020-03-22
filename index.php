<!DOCTYPE html>
<html class="no-js fixed" lang="en">

<!-- Mirrored from kpanel.cz/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Nov 2019 19:29:04 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<title><?php echo $_SERVER['HTTP_HOST']; ?> | Suspendu</title>
<link rel='stylesheet' href='assets/css/bootstrap.min.css?v=<?php echo time();?>'>
<link rel='stylesheet' href='assets/css/style.css?v=<?php echo time();?>'>
<link rel='stylesheet' href='assets/css/color.css?v=<?php echo time();?>'>
<link rel='stylesheet' href='assets/css/title-size.css?v=<?php echo time();?>'>
<link rel='stylesheet' href='assets/css/custom.css?v=<?php echo time();?>'>
<link rel="icon" href="assets/img/favicon.ico?v=<?php echo time();?>">
</head>
<body>

  <div id="site-loader">
    <div class="loader"></div>
  </div>
  <div id="site-wrap">
    <div id="bg">
      <div id="img"></div>
      <div id="video"></div>
      <div id="overlay"></div>
      <div id="effect">
        <img src="assets/img/bg/cloud-01.png?v=<?php echo time();?>" alt="" id="cloud1">
        <img src="assets/img/bg/cloud-02.png?v=<?php echo time();?>" alt="" id="cloud2">
        <img src="assets/img/bg/cloud-03.png?v=<?php echo time();?>" alt="" id="cloud3">
        <img src="assets/img/bg/cloud-04.png?v=<?php echo time();?>" alt="" id="cloud4">
      </div>
      <canvas id="js-canvas"></canvas>
    </div>
    <header id="site-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="header-brand">
            </div>
            <div class="header-toggle">
              <div id="menu-toggle" class="toggle">
                <i class="ion-information-circled"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div id="form">
      <div id="subscribe">
        <div class="tb-cell">
          <p class="animation section-subtitle">Que devient Zendoor ?</p>
          <h2 class="section-title">Il est la :3</h2>
        </div>
      </div>
    </div>
    <main id="site-main">
      <section id="home">
        <div class="section-wrap">
          <div class="section-cell">
            <div class="container">
              <div class="section-header row text-center">
                <div class="col-xs-12">
                  <p class="animation section-subtitle"><?php echo $_SERVER['HTTP_HOST']; ?> est fermé temporairement.</p>
                  <h1 class="section-title">
                    <span class="section-title-span">kPanel</span>
                  </h1>
                  <div class="animation section-divider"></div>
                </div>
              </div>
              <div class="section-main row">
                <div class="col-xs-12">
                  <div id="countdown" class="animation-04">
				   <p class="animation section-subtitle">Fermé :</p>
                    <div class="row">
                      <div class="col-xs-3 col-countdown">
					 
                        <div class="countdown-section">
                          <div class="countdown-amount days" id="d">0</div>
                          <div class="countdown-period days_ref" id="p1">JOURS</div>
                        </div>
                      </div>
                      <div class="col-xs-3 col-countdown">
                        <div class="countdown-section">
                          <div class="countdown-amount hours" id="h">0</div>
                          <div class="countdown-period hours_ref" id="p2">HEURES</div>
                        </div>
                      </div>
                      <div class="col-xs-3 col-countdown">
                        <div class="countdown-section">
                          <div class="countdown-amount minutes" id="m">0</div>
                          <div class="countdown-period minutes_ref" id="p3">MINUTES</div>
                        </div>
                      </div>
                      <div class="col-xs-3 col-countdown">
                        <div class="countdown-section">
                          <div class="countdown-amount seconds" id="s">0</div>
                          <div class="countdown-period seconds_ref" id="p4">SECONDS</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </main>
    <footer id="site-footer">
      <a href="#" id="volume">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </a>
    </footer>
    <audio  controls autoplay  id="audio-player" style="display:none">
      <source src="https://kpanel.cz/swing.mp3" type="audio/mpeg">
    </audio>
  </div>
  <script src='assets/js/vendor/jquery-2.1.4.min.js?v=<?php echo time();?>'></script>
  <script src='assets/js/vendor/html5shiv.min.js?v=<?php echo time();?>'></script>
  <script src='assets/js/vendor/bootstrap.min.js?v=<?php echo time();?>'></script>
  <script src='assets/js/vendor/vendor.js?v=<?php echo time();?>'></script>
  <script src='assets/js/variable.js?v=<?php echo time();?>'></script>
  <script src='assets/js/main.js?v=<?php echo time();?>'></script>

</body>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Mar 8, 2020 15:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("d").innerHTML = days;
  document.getElementById("h").innerHTML = hours;
  document.getElementById("m").innerHTML = minutes;
  document.getElementById("s").innerHTML = seconds;
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("d").innerHTML = "0";
  	document.getElementById("h").innerHTML = "0";
  	document.getElementById("m").innerHTML = "0";
  	document.getElementById("s").innerHTML = "0";
    document.getElementById("p1").innerHTML = "PLEASE";
    document.getElementById("p2").innerHTML = "RELOAD";
    document.getElementById("p3").innerHTML = "THE";
    document.getElementById("p4").innerHTML = "PAGE";
  }
}, 1000);
</script>


<!-- Mirrored from kpanel.cz/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Nov 2019 19:29:07 GMT -->
</html>