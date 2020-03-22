<?php
include 'core/class/include.php';

if (!Account::isAuthentified())
{
    header('Location: login.php');
}

// ID des admin

$id_aut = $_SESSION['id'];

if (empty($id_aut))
{
    header('Location: login.php');
}

$pplink = Account::GetPP();

$uname = Account::GetUsername();

$banstatus = Account::IsBanned();
if($banstatus == true){
  $ban = 1;
}
elseif($banstatus == false){
  $ban = 0;
}
elseif($banstatus == "invalid") {
  $ban = 0;
  die("invalid ban number");
}

$role = Account::GetRole();
if($role == "admin") {
  $admin = true;
  $user = false;
}
elseif($role == "premium") {
  $kpp = true;
  $user = false;
}
elseif($role == "user") {
  $user = true;
}
elseif($role == "invalid") {
  die("You get an invalid rank number from the db");
}

if (empty($pplink)) {
  $pplink = "https://kpanel.cz/img/kalysianewpart.png";
}

$masterkey = Account::GetMasterkey();

if(empty($masterkey)) {
  die("Vous avez été déconnecté: Votre <strong>Masterkey</strong> est invalide/inexistante. Merci de rapporté cela à un admin");
  session_unset();
  session_destroy();
}


// Redirect the user if he does not authenticate

if($ban == 0) {
?>
<style>
.card-body {
    flex: 1 1 auto;
    padding: 1.25rem;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: var(--card);
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
.white-box, .box-content {
  background: var(--white-box)!important;
}
.panel-default, .panel-heading, th, td, .dataTables_length, .dataTables_filter, .dataTables_info, .dataTables_paginate, .dataTables_wrapper{
  background-color: var(--panel-heading-color)!important; 
  color: var(--panel-heading-text)!important;
  border-color: var(--panel-heading-borders)!important;
}
.box-title {
  color: var(--panel-heading-text)!important;
}
label, i {
  color: var(--label-color)!important;
}
.panel-body {
  background-color: var(--panel-body)!important;
}
p {
  color: var(--p)!important;
}
.text-info {
  color: var(--pinfo)!important;
}
.text-warning {
  color: var(--pwarn)!important;
}
.text-success {
  color: var(--pyes)!important;
}
.text-danger {
  color: var(--pdan)!important;
}
.text-primary {
  color: var(--pprim)!important;
}
.top-left-part {
  background-color: var(--top-left-part-color)!important;
}
.metismenu, .p-20, .sidebar-nav, .footer {
  background-color: var(--li-color)!important;
}
.dropdown-menu {
  background-color: var(--dd)!important;
}
body {
  background-color: var(--pagewrapper)!important;
}
.fix-header {
  background-color: var(--fixh)!important;
}
.bg-title {
  background-color: var(--bgtitle-color)!important;
}
a {
  color: var(--a-color)!important;
}
#page-wrapper {
  background-color: var(--fontrgb)!important;
}
h1, h2, h3, h4, h5, h6 {
  color: var(--panel-heading-text)!important;
}

.paginate_button>a, .pagination>li>a {
  color: var(--a-color)!important;
  background-color: var(--top-left-part-color)!important;
  border-color: var(--top-left-part-color)!important;
}

.dropdown-menu>li:hover, .dropdown-menu>li>a:hover, .dropdown-menu>li>.active, .dropdown-menu>li>a>.active, .dropdown-menu>.active>a, .dropdown-menu>.active>li, .dropdown-menu>.active>li>a {
  background-color: transparent!important;
}

.paginate_button>a>.active, .pagination>li>a>.active, .pagination>.active>a, .pagination>.active>li>a {
  color: var(--a-color-active)!important;
  background-color: var(--top-left-part-color)!important;
  border-color: var(--top-left-part-color)!important;
}

:root {
  --top-left-part-color: #fff;
  --li-color: transparent;
  --a-color: #54667A;
  --a-color-active: #54667A;
  --bgtitle-color: #fff;
  --label-color: rgb(38, 50, 56);
  --white-box: #fff;
  --panel-heading-text: #263238;
  --panel-heading-borders: #d6d6d6;
  --panel-heading-color: #fff;
  --fixh: #EDF1F5;
  --panel-body: #fff;
  --td-td: #fff;
  --inputs: #ffffff;
  --textin: #565656;
  --dd: #fff;
  --card: #ffffff;
  --pagewrapper: #EDF1F5;
  --pmuted: #8d9ea7;
  --p: #313131;
  --pyes: #7ace4c;
  --pwarn: #fb4;
  --pprim: #7460ee;
  --pdan: #f33155;
  --pinfo: #41b3f9;
  --lbtn: #000;
  --lbtnclr: #fff;
  --fontrgb: rgb(237, 241, 245);
}
[data-theme="dark"] {
  --top-left-part-color: #2f323e;
  --li-color: #2f323e;
  --dd: #2f323e;
  --a-color-active: #0062f5;
  --a-color: #fff;
  --label-color: rgb(108, 145, 163);
  --bgtitle-color: #3d3d3d;
  --white-box: #3d3d3d;
  --panel-heading-text: #6c91a3;
  --panel-heading-borders: #303030;
  --panel-heading-color: #3d3d3d;
  --panel-body: #3d3d3d;
  --td-td: #3d3d3d;
  --inputs: #3d3d3d;
  --textin: #969696;
  --card: #3d3d3d;
  --pagewrapper: #202021;
  --fixh: #000;
  --pmuted: #d1dee6;
  --p: #fff;
  --pyes: #7ace4c;
  --pwarn: #fb4;
  --pprim: #7460ee;
  --pdan: #f33155;
  --pinfo: #41b3f9;
  --lbtn: #fff;
  --lbtnclr: #000;
  --fontrgb: rgb(0, 0, 0);
}

/*Simple css to style it like a toggle switch*/
.theme-switch-wrapper {
  display: flex;
  align-items: center;
  margin-top: 20%!important;

  em {
    margin-left: 10px;
    font-size: 1rem;
  }
}
.theme-switch {
  display: inline-block;
  height: 34px;
  position: relative;
  width: 60px;
}

.theme-switch input {
  display:none;
}

.slider {
  background-color: #ccc;
  bottom: 0;
  cursor: pointer;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  transition: .4s;
}

.slider:before {
  background-color: #fff;
  bottom: 4px;
  content: "";
  height: 26px;
  left: 4px;
  position: absolute;
  transition: .4s;
  width: 26px;
}

input:checked + .slider {
  background-color: #66bb6a;
}

input:checked + .slider:before {
  transform: translateX(26px);
}

.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
                      .invisibleselect::selection {
                        background-color: transparent!important;
                        color: transparent!important;
                      }
                      .invisibleselect::hover {
                        background-color: transparent!important;
                        color: transparent!important;
                      }
                      .invisibleselect::focus {
                        background-color: transparent!important;
                        color: transparent!important;
                      }
                      .invisibleactive {
                        background-color: transparent!important;
                      }
                      .nav .open>a {
                        background-color: #fff!important;
                        background: transparent!important;
                      }
/* Change this breakpoint if you change the breakpoint of the navbar */

@media (min-width: 992px) {
  .animate {
    animation-duration: 0.3s;
    -webkit-animation-duration: 0.3s;
    animation-fill-mode: both;
    -webkit-animation-fill-mode: both;
  }
}

@keyframes slideIn {
  0% {
    transform: translateY(1rem);
    opacity: 0;
  }
  100% {
    transform:translateY(0rem);
    opacity: 1;
  }
  0% {
    transform: translateY(1rem);
    opacity: 0;
  }
}

@-webkit-keyframes slideIn {
  0% {
    -webkit-transform: transform;
    -webkit-opacity: 0;
  }
  100% {
    -webkit-transform: translateY(0);
    -webkit-opacity: 1;
  }
  0% {
    -webkit-transform: translateY(1rem);
    -webkit-opacity: 0;
  }
}

.fa-caret-down, .fa-caret-up {
  float: right;
  padding-right: 8px;
}

.slideIn {
  -webkit-animation-name: slideIn;
  animation-name: slideIn;
}

</style>
<script language="JavaScript">
  window.onload = function() {
    document.addEventListener("contextmenu", function(e){
      e.preventDefault();
    }, false);
    document.addEventListener("keydown", function(e) {
    //document.onkeydown = function(e) {
      // "I" key
      if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
        disabledEvent(e);
      }
      // "J" key
      if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
        disabledEvent(e);
      }
      // "S" key + macOS
      if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
        disabledEvent(e);
      }
      // "U" key
      if (e.ctrlKey && e.keyCode == 85) {
        disabledEvent(e);
      }
      // "F12" key
      if (event.keyCode == 123) {
        disabledEvent(e);
      }
    }, false);
    function disabledEvent(e){
      if (e.stopPropagation){
        e.stopPropagation();
      } else if (window.event){
        window.event.cancelBubble = true;
      }
      e.preventDefault();
      return false;
    }
  };
</script>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="//kpanel.cz/img/kalysia50.png">
    <title>kPanel | DashBoard</title>
    <!-- Bootstrap Core CSS -->
    <link href="./dashboard_files/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="./dashboard_files/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="./dashboard_files/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="./dashboard_files/morris.css" rel="stylesheet">
    <!-- gBackDoor CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <!-- chartist CSS -->
    <link href="./dashboard_files/chartist.min.css" rel="stylesheet">
    <link href="./dashboard_files/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="./dashboard_files/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="./dashboard_files/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="./dashboard_files/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">.jqstooltip {position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style><meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.194"><script data-avast-pam="y" type="text/javascript" name="AVAST_PAM_submitInjector">(function _submitInjector() {
        var f = document.querySelectorAll("form")[0]; // eslint-disable-line no-undef
        if (!f._avast_submit) {
          f._avast_submit = f.submit;
        }
        try {
          Object.defineProperty(f, "submit", {
            get: function get() {
              return function (prev_submit) {
                prev_submit.call(this);

                if (this._avast_inside_submit) {
                  return;
                }
                this._avast_inside_submit = true;

                var evt = document.createEvent("CustomEvent");
                evt.initEvent("scriptsubmit", true, true); // bubbling & cancelable
                this.dispatchEvent(evt);

                delete this._avast_inside_submit;
              }.bind(this, this._avast_submit);
            },
            set: function set(submitFunc) {
              this._avast_submit = submitFunc;
            }
          });
        } catch (ex) {
          // ignored
        }
      })();</script></head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader" style="display: none;">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="#">
                        <!-- Logo icon image, you can use font-icon also -->
                        <b>
                            <!--This is dark logo icon-->
                            <img src="//kpanel.cz/img/kalysianewpart.png" alt="home" class="dark-logo" width="50">
                        </b>
                        <!-- Logo text image you can use text also -->
                        <span class="hidden-xs">                            <!--This is light logo text-->
                            <img src="//kpanel.cz/imgs/kalysianewpart.png" alt="home" class="light-logo" width="50">

                        </span> 
                    </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                    </li>
                    <li>
                      <div class="theme-switch-wrapper">
    <label class="theme-switch" for="checkbox">
        <input type="checkbox" id="checkbox" />
        <div class="slider round"></div></label></div>
                    </li>
                    <style>

                    </style>
                    <li class="invisibleselect">
                        <div class="dropdown invisibleselect" style="margin-top: 4px;">
                        <a class="profile-pic invisibleselect" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"> <img src="<?php

                         if (empty($pplink)){
                              $pplink = "https://kpanel.cz/img/kalysianewpart.png";
                         }

                         echo $pplink; ?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo Account::GetUsername(); ?></b></a>
                       
                       <ul class="dropdown-menu">
      <li class="invisibleactive" style="padding: 5px 0 0;"><a data-toggle="tab" href="#profile"><i class="fa fa-wrench"></i>&nbsp;Mon Profile</a></li>
      <li class="divider"></li>
      <li class="invisibleactive" style="padding: 5px 0 0;"><a href="logout.php"><i class="fa fa-undo"></i>&nbsp;Déconnection.</a></li>
    </ul></div>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="sidebar-nav slimscrollsidebar" style="overflow: hidden; width: auto; height: 100%;">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav in nav nav-pills nav-stacked nav metismenu" id="side-menu">
                  <li class="active" style="padding: 70px 0 0;"><a data-toggle="tab" href="#dashboard"><i class="fa fa-terminal"></i>&nbsp;Dashboard</a></li>
                  <li style="padding: 5px 0 0;"><a data-toggle="tab" href="#logs"><i class="fa fa-list-alt"></i>&nbsp;Logs</a></li>
                  <li style="padding: 5px 0 0;"><a data-toggle="tab" href="#server"><i class="fa fa-server"></i>&nbsp;Serveur</a></li>
                  <?php if($admin == true) { ?>
                  <li style="padding: 5px 0 0;"><a data-toggle="tab" href="#allserver"><i class="fa fa-server"></i>&nbsp;Tous les serveurs</a></li>
                  <li style="padding: 5px 0 0;"><a data-toggle="tab" href="#users"><i class="fa fa-user"></i>&nbsp;Utilisateur</a></li>
                   <?php } ?>
                  <li style="padding: 5px 0 0;"><a data-toggle="tab" href="#payload"><i class="fa fa-file-code-o"></i>&nbsp;Payload</a></li>
                  <li style="padding: 5px 0 0;"><a data-toggle="tab" href="#chat"><i class="fa fa-comments"></i>&nbsp;Chat</a></li>
                  <?php if($admin == true) { ?>
                  <li style="padding: 5px 0 0;"><a data-toggle="tab" href="#params"><i class="fa fa-wrench"></i>&nbsp;Paramétre</a></li>
                  <?php } ?>
                 
                  <?php if($admin == true OR $kpp == true) { ?>
                  <li class="dropdown-btn" style="padding: 5px 0 0;"><a><i class="fa fa-cogs"></i>&nbsp;Obfuscations&nbsp;<i class="fa fa-caret-down" id="carret-down" aria-hidden="true"></i><i class="fa fa-caret-up" id="carret-up" aria-hidden="true"></i></a></li>
                  <div class="dropdown-container nav in nav nav-pills nav-stacked nav metismenu" style="display: none">
                    <li id="r2" style="padding: 5px 0 0!important;" onclick="refreshactives2()"><a data-toggle="tab" href="#obfuscationxor"><i class="fa fa-cogs"></i>&nbsp;Obfuscation XOR</a></li>
                    <li id="r1" style="padding: 5px 0 0!important;" onclick="refreshactives1()"><a data-toggle="tab" href="#obfuscationxor2"><i class="fa fa-cogs"></i>&nbsp;Obfuscation XORv2</a></li>
                    <li id="r4" style="padding: 5px 0 0!important;" onclick="refreshactives4()"><a data-toggle="tab" href="#gvac"><i class="fa fa-cogs"></i>&nbsp;Obfuscation GVAC</a></li>
                    <li id="r3" style="padding: 5px 0 0!important;" onclick="refreshactives3()"><a data-toggle="tab" href="#deobfuscationxor"><i class="fa fa-cogs"></i>&nbsp;DeObfuscation XOR</a></li>

                  </div>
                  <li style="padding: 5px 0 0;"><a data-toggle="tab" href="#tutoriels"><i class="fa fa-television"></i>&nbsp;Tutoriels</a></li>
                  <?php } ?>
                  <li style="padding: 5px 0 0;"><a data-toggle="tab" href="#backdoor"><i class="fa fa-file-text-o"></i>&nbsp;Backdoor Checker</a></li>
                  <li style="padding: 5px 0 0;"><a data-toggle="tab" href="#rules"><i class="fa fa-file-text-o"></i>&nbsp;Règles</a></li>
                  

                </ul>
                <div class="center p-20">
                    <?php if($user == true) { ?>
                     <a data-toggle="tab" href="#upgrade" class="btn btn-danger btn-block waves-effect waves-light">Upgrade to Pro</a>
                     <?php } else { ?>
                     <a data-toggle="tab" href="#upgrade" class="btn btn-danger btn-block waves-effect waves-light">Get More</a>
                     <?php } ?>
                 </div>
             
            </div><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.3); width: 6px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 904px;"></div><div class="slimScrollRail" style="width: 6px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
            
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper" style="min-height: 794px;">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <?php if($user == true) { ?><a data-toggle="tab" href="#upgrade" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro</a><?php } ?>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                <div class="row">
                    <div class="tab-content">
             <?php 
             include('includes/dashboard.php');
             include('includes/logs.php');
                   include('includes/server.php');
                   include('includes/allserver.php');
                   include('includes/users.php');
                   include('includes/payload.php');
                  include('includes/chat.php');
                   include('includes/obfuscation.php');
                   include('includes/gvac.php');
                   include('includes/obfuscationxor.php');
                   include('includes/obfuscationxor2.php');
                   include('includes/profile.php');
                   include('includes/params.php'); 
                   include('includes/tutoriels.php');
                   include('includes/backdoor.php');
                   include('includes/upgrade.php'); 
                   include('includes/rules.php'); 
                   include('includes/deobfucationxor.php');
                   ?>
                   </div>
                <!--<div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Visit</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">0</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Page Views</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">0</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Unique Visitor</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">0</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                /.row -->
</div>
</div>
</div>
</div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 © kzPanel by !! Eradium </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="./dashboard_files/jquery.min.js.téléchargement"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="./dashboard_files/bootstrap.min.js.téléchargement"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="./dashboard_files/sidebar-nav.min.js.téléchargement"></script>
    <!--slimscroll JavaScript -->
    <script src="./dashboard_files/jquery.slimscroll.js.téléchargement"></script>
    <!--Wave Effects -->
    <script src="./dashboard_files/waves.js.téléchargement"></script>
    <!--Counter js -->
    <script src="./dashboard_files/jquery.waypoints.js.téléchargement"></script>
    <script src="./dashboard_files/jquery.counterup.min.js.téléchargement"></script>
    <!-- chartist chart -->
    <script src="./dashboard_files/chartist.min.js.téléchargement"></script>
    <script src="./dashboard_files/chartist-plugin-tooltip.min.js.téléchargement"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="./dashboard_files/jquery.sparkline.min.js.téléchargement"></script>
    <!-- Custom Theme JavaScript -->
    <script src="./dashboard_files/custom.min.js.téléchargement"></script>
    <script src="./dashboard_files/dashboard1.js.téléchargement"></script>
    <script src="./dashboard_files/jquery.toast.js.téléchargement"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://shoppy.gg/api/embed.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/datatables.bootstrap.min.js"></script>
    <script src="js/obfu.js?t=<?=time()?>"></script>
    <script>
const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        setdark();
    }
    else {
        document.documentElement.setAttribute('data-theme', 'light');
        setlight();
    }    
}
toggleSwitch.addEventListener('change', switchTheme, false);
function setdark()
{
  var theme = "dark";
  var id = <?php echo json_encode($uname); ?>;
  $.ajax({
      url: "core/ajax/set-theme.php?id=" + id + "&theme=" + theme
    });
}

function setlight()
{
  var theme = "light";
  var id = <?php echo json_encode($uname); ?>;
  $.ajax({
      url: "core/ajax/set-theme.php?id=" + id + "&theme=" + theme
    });
}
function precheck()
{
  $("#checkbox").prop('checked', true);
}

//<![CDATA[ 
window.onload=function(){
(function() {
    var visited = localStorage.getItem('visited');
    if (!visited) {
        $("#discord-modal").modal("show");
        localStorage.setItem('visited', true);
    }
})();
}//]]>  

</script>
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
document.getElementById("carret-up").style.display = "none";
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  document.getElementById("carret-up").style.display = "none";
  document.getElementById("carret-down").style.display = "block";
  } else {
  dropdownContent.style.display = "block";
  document.getElementById("carret-down").style.display = "none";
  document.getElementById("carret-up").style.display = "block";
  }
  });
}
function refreshactives1() {
  var r2 = document.getElementById("r2");
  var r3 = document.getElementById("r3");
  var r4 = document.getElementById("r4");
  r2.classList.remove("active");
  r3.classList.remove("active");
  r4.classList.remove("active");
}
function refreshactives2() {
  var r1 = document.getElementById("r1");
  var r3 = document.getElementById("r3");
  var r4 = document.getElementById("r4");
  r4.classList.remove("active");
  r1.classList.remove("active");
  r3.classList.remove("active");
}
function refreshactives3() {
  var r1 = document.getElementById("r1");
  var r2 = document.getElementById("r2");
  var r4 = document.getElementById("r4");
  r4.classList.remove("active");
  r1.classList.remove("active");
  r2.classList.remove("active");
}
function refreshactives4() {
  var r1 = document.getElementById("r1");
  var r2 = document.getElementById("r2");
  var r3 = document.getElementById("r3");
  r3.classList.remove("active");
  r1.classList.remove("active");
  r2.classList.remove("active");
}
</script>
<script>
  window.onload = function() {
    document.addEventListener("contextmenu", function(e){
      e.preventDefault();
    }, false);
    document.addEventListener("keydown", function(e) {
    //document.onkeydown = function(e) {
      // "I" key
      if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
        disabledEvent(e);
      }
      // "J" key
      if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
        disabledEvent(e);
      }
      // "S" key + macOS
      if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
        disabledEvent(e);
      }
      // "U" key
      if (e.ctrlKey && e.keyCode == 85) {
        disabledEvent(e);
      }
      // "F12" key
      if (event.keyCode == 123) {
        disabledEvent(e);
      }
    }, false);
    function disabledEvent(e){
      if (e.stopPropagation){
        e.stopPropagation();
      } else if (window.event){
        window.event.cancelBubble = true;
      }
      e.preventDefault();
      return false;
    }
  };
</script>
<script>
import CustomLogging from './CustomLogging';

const custom = new CustomLogging;
const error = new CustomLogging('error');
error.setBodyStyle({ color: 'red', size: '2rem' });

// the output
console.log('Regular log.');
custom.log('Hello there!');
error.log('Something bad happened!');
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5dcc15ed43be710e1d1d1da5/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<?php } else {?>
<html><head>
    <title>You Are Banned</title>
    <link rel="stylesheet" type="text/css" href="https://kpanel.cz/assets/css/error.css">
  <meta id="Reverso_extension___elForCheckedInstallExtension" name="Reverso extension" content="2.2.194"></head>
  <body>
    <div id="notfound">
      <div class="notfound">
        <div class="notfound-404">
          <h1>BANNED</h1>
          <h2>Banned From kPanel</h2>
        </div>
        <a href="https://discord.gg/5N4pYkc" target="_blank">DISCORD</a>
      </div>
    </div>
  
</body></html>
<?php } ?>
<?php
$mode = Account::IsDark();
if($mode == true) {
  echo "<script>precheck();";
  echo "document.documentElement.setAttribute('data-theme', 'dark');</script>";
}elseif($mode == "invalid") {
  die("Invalid theme");
}
?>