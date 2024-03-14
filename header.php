<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<link href="static/cdn/bootstrapcdn/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="static/cdn/fontawesome/css/all.css" rel="stylesheet">

<link href="static/cdn/bootstrapcdn/bootstrap.min.css">

<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Sidebar template</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="static/cdn/bootstrapcdn/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"> -->
    
    <link href="static/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="static/cdn/fontawesome/all.css" rel="stylesheet">
    
    
    
    <link rel="stylesheet" type="text/css" href="static/js/datatable/DataTables-1.10.23/css/dataTables.bootstrap4.min.css"/>

    <link href="static/bootstrap_fontawesome/css/bootstrap.min.css" rel="stylesheet" />
    <link href="static/css/mystyle.css" rel="stylesheet" />
 
    <style>
      
          .closeBtn {
           padding-left: 10%;
           padding-top: 10%;
          } 
    </style>

</head>

<body>
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">Gestion Courrier</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="static/img/Admin.png"
            alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name">secretariat
            <strong>DPSIC</strong>
          </span>
          <span class="user-role">Administrator</span>
          <span class="user-status">
            <i style="color: green;" class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
      <div class="sidebar-search">
        <div>
          <div class="input-group">
            <input type="text" class="form-control search-menu" placeholder="Search...">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <li>
            <a href="index1.php">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
              <span class="badge badge-pill badge-info">New</span>
            </a> 
          </li>
          <li>
            <a href="personne.php">
            <i class="far fa-user"></i>
              <span>Personne</span>
            </a> 
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
            <i class="fa fa-book"></i>
              <span>Courrier</span>
              <span class="badge badge-pill badge-warning">2</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="register_dpar.php">registre départ</a>
                </li>
                <li>
                  <a href="regestre_arrive.php">registre arrivée</a>
                </li> 
              </ul>
            </div>
          </li>

          <li>
            <a href="order_courrier.php">
            <i class="fa fa-book"></i>
              <span>Classement Courrier</span>
            </a> 
          </li>

          <li class="header-menu">
            <span>Extra</span>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="far fa-user"></i>
              <span>Users</span>
              <span class="badge badge-pill badge-primary">Beta</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="user.php">Utilisateurs</a>
                </li>
              </ul>
            </div>
          </li>
          
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
       <a href="#">
        <!-- <i class="fa fa-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span> -->
      </a>
      <a href="#">
        <!-- <i class="fa fa-envelope"></i>
        <span class="badge badge-pill badge-success notification">7</span> -->
      </a>
      <a href="#">
        <!-- <i class="fa fa-cog"></i>
        <span class="badge-sonar"></span> -->
      </a>  
       <a href="index.php" data-toggle="tooltip" data-placement="bottom" title="Déconnecter">
        <i class="fa fa-power-off "></i>
      </a>
    </div>
  </nav>


  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="static/cdn/bootstrapcdn/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="static/cdn/bootstrapcdn/bootstrap.min.js"></script>
<script src="static/fontawesome/js/all.min.js"></script>

  
