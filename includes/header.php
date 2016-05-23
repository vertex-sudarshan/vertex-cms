<?php 
@include("admin/conn.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ambience Care</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lightslider.min.css" rel="stylesheet">
    <link href="assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="top-header">
      <div class="container">
        <div class="row">
          <div class="col-md-5 pull-right">
            <span class="phone"><i class="fa fa-phone"></i> +123-456-7890</span>
            <ul class="pull-right social-media">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>        
      </div>
    </div>
    <header class="site-header">
      <nav class="navbar navbar-default">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png"></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <button id="show_search" class="pull-right"><i class="fa fa-search"></i></button>
            <ul class="nav navbar-nav site-main-nav navbar-right">
              <li class="current-menu-item"><a href="#">Home</a></li>
              <li><a href="#">Client Services</a></li>
              <li class="menu-item-has-children">
                <a href="#">Company</a>
                <ul class="sub-menu">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Client Services</a></li>
                  <li><a href="#">Candidates</a></li>
                </ul>
              </li>
              <li><a href="#">Candidates</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Jobs</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->            
        </div><!-- /.container-fluid -->
        <div id="keyword_search" style="display: none;">
        <h3>Keyword Search</h3>
          <form action="search.php" method="get">
            <input type="text" name="keyword" placeholder="Keyword.......">
            <input type="submit" value="Submit">
          </form>
        </div>
      </nav>
    </header>