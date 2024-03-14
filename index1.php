<?php
include_once 'connection.php';
include_once 'header.php';
include_once 'footer.php';

$reqt="SELECT COUNT(*) FROM `personne` WHERE 1";
$stmt = $conx->prepare("$reqt"); 
$stmt->execute();
$number_personne = $stmt->fetchColumn();


$reqt="SELECT COUNT(*) FROM `regestre_depart` WHERE 1";
$stmt = $conx->prepare("$reqt"); 
$stmt->execute();
$number_dpr = $stmt->fetchColumn();


$reqt="SELECT COUNT(*) FROM `regestre_arrivee` WHERE 1";
$stmt = $conx->prepare("$reqt"); 
$stmt->execute();
$number_arv = $stmt->fetchColumn();


$reqt="SELECT COUNT(*) FROM `order_courrier` WHERE 1";
$stmt = $conx->prepare("$reqt"); 
$stmt->execute();
$number_clas = $stmt->fetchColumn();

?>
  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
      <h2>Dashboard</h2>

      <hr>
  
      <footer class="text-center">
        
          <!-- Page Content -->
  <!-- Icon Cards-->
  <div class="row">

<!-- Personne -->

  <div class="col-xl-4 col-sm-6 mb-3">
    <div class="card text-white bg-success o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-user"></i>
        </div>
        <div class="mr-5"><h3>( <?php echo $number_personne ?> ) Personne </h3></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="personne.php">
        <span class="float-left"><h6>Voir Details</h6></span>
        <span class="float-right">
          <h6><i class="fas fa-angle-right"></i></h6>
        </span>
      </a>
    </div>
  </div>


<!-- Depart -->

  <div class="col-xl-4 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-anchor"></i>
        </div>
        <div class="mr-5"><h3>( <?php echo $number_dpr; ?> ) Courrier Depart</h3></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="register_dpar.php">
        <span class="float-left"><h6>Voir Details</h6></span>
        <span class="float-right">
          <h6><i class="fas fa-angle-right"></i></h6>
        </span>
      </a>
    </div>
  </div>

  

  <!-- Arrive -->
   <div class="col-xl-4 col-sm-6 mb-3">
    <div class="card text-white bg-info o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-shapes"></i>
        </div>
        <div class="mr-5"><h3>( <?php echo $number_arv; ?> ) Courrier Arrive</h3></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="regestre_arrive.php">
        <span class="float-left"><h6>Voir Details</h6></span>
        <span class="float-right">
          <h6><i class="fas fa-angle-right"></i></h6>
        </span>
      </a>
    </div>
  </div>
<!-- Classemment -->

  <div class="col-xl-4 col-sm-6 mb-3">
    <div class="card text-white bg-secondary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-heartbeat"></i>
        </div>
        <div class="mr-5"><h3>( <?php echo $number_clas; ?> ) Classemment</h3></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="order_courrier.php">
        <span class="float-left"><h6>Voir Details</h6></span>
        <span class="float-right">
          <h6><i class="fas fa-angle-right"></i></h6>
        </span>
      </a>
    </div>
  </div>
</div>

</div>


      </footer>
    </div>
  </main>
  <!-- page-content" -->
</div>


  