<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<!-- Html 5 -->
<!-- Visar webbläsaren att innehållet är på Svenska -->
<html lang="sv">
  <head>
  <!-- Teckenkodning med åäö-->
    <meta charset="utf-8">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript" />
    <meta name="author" content="Joakim Andersson" />
    <title>KaloriNix</title>
    <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  
    <!-- Eget css -->
    <link href="<?php echo base_url();?>css/main.css" rel="stylesheet">
    
    <!-- Eget javascript -->
    <script type="text/javascript" src="<?php echo base_url();?>js/main.js" ></script> 
  </head>
<body>
    
<!-- Navigation header -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
          
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <div>
          <div id="wrapper"><a href="<?php echo site_url('welcome'); ?>"><p>KaloriNix</p></a></div>
        </div>
        <br />
        <li<?php echo $header_nav_link1; ?>><a href="<?php echo site_url('welcome/about'); ?>">Om</a></li>
        <li<?php echo $header_nav_link2; ?>><a href="<?php echo site_url('welcome'); ?>">Kalori räknare</a></li>
        <li<?php echo $header_nav_link3; ?>><a href="<?php echo site_url('welcome/mail'); ?>">Kontakt</a></li>
        <?php
        
           //Hämta session
           $session = $this->session->all_userdata();
           
           //Om inloggad
           //Annars utloggad
           if ( isset($session['session']) ){
            require_once( APPPATH.'views/templates/online.php');
           }else{
            require_once( APPPATH.'views/templates/offline.php');
           } 
        ?>
      </ul>
    </div>
  </div>
</nav>
    
<div id="container">
    
    
<!-- End of file header.php -->
<!-- Location: ./application/views/templates/header.php -->