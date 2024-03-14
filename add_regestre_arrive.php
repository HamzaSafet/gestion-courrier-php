<?php
include_once 'header.php';
include_once 'footer.php';
include_once 'connection.php';


if (isset($_POST['btn_save'])) {

    $date_arrivee=$_POST['date_arrivee'];
    $num_ordere_arv=$_POST['num_ordere_arv'];
    $date_courrier_arriver=$_POST['date_courrier_arriver'];
    $num_lettre_arrivee=$_POST['num_lettre_arrivee'];
    $id_dest=$_POST['id_dest'];
    $objet_arriver=$_POST['objet_arriver'];
    $date_observation=$_POST['date_observation'];
    $id_type_courrier=$_POST['id_type_courrier'];
    $id_personne=$_POST['id_personne'];
    $error=array();
    $valaid=array();
    if(!empty($id_personne)){
      $courrier->CreateRgtr_arv($date_arrivee,$num_ordere_arv,$date_courrier_arriver,$num_lettre_arrivee
                                 ,$objet_arriver,$date_observation,$id_personne,$id_type_courrier,$id_dest);
      $valaid[]="votre operation ajout avec succes.";
          
    }else{
      $error[]="choisi une personne.";
    }  
}
?>

<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
      <h2>Ajouter un Regestre Arrive</h2>
         
      <?php
         if(isset($error)){
           foreach ($error as $er) {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>ERROR !  </strong> <?php echo $er?>
            </div>
            <?php
           }
         }

         if(isset($valaid)){
          foreach ($valaid as $vl) {
           ?>
           <div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Success : </strong> <?php echo $vl?>
           </div>
           <?php
          }
        }

      ?>
     
      <hr>

      <footer class="text-center">
        <!-- form ajouter regestre -->
          
<?php

$reqt="SELECT MAX(`num_ordere_arv`) as max_numOrd FROM `regestre_arrivee` ORDER BY `id_regestre_arv` DESC";
$stmt = $conx->prepare("$reqt"); 
$stmt->execute();
$invNum = $stmt -> fetch(PDO::FETCH_ASSOC);
$max_numOrd = $invNum['max_numOrd'];

$reqt1="SELECT DISTINCT(YEAR(`date_arrivee`)) as date_arrive  FROM `regestre_arrivee` WHERE `id_regestre_arv`=(SELECT max(`id_regestre_arv`) FROM regestre_arrivee)";
$stmt1 = $conx->prepare("$reqt1"); 
$stmt1->execute();
$dateNow = $stmt1 -> fetch(PDO::FETCH_ASSOC);
$max_date_now = $dateNow['date_arrive'];
$dateSystem=date('Y');
if($max_date_now==$dateSystem){
   $max_numOrd=$max_numOrd+1;
}else{
   $max_numOrd=1;
}

?>

        <form class="row g-3" method="POST">
            <table>
                <tr>
                    <td style="padding-top: 3%;">
                      <div class="col">
                      <input type="input" class="form-control" value="<?php echo $max_numOrd; ?>" name="num_ordere_arv">
                     </div>
                    </td>
                    <td style="padding-top: 3%;">
                      <div class="col">
                      <input type="input" class="form-control" placeholder="N° Référence" name="num_lettre_arrivee">
                      </div>
                    </td>
                    <td style="padding-top: 3%;">
                     <div class="col-12">
                      <label for="">Date Aujourd'hui</label>
                     </div>
                    </td>
                    <td style="padding-top: 3%;">
                      <div class="col">
                      <input type="date" class="form-control" placeholder="" name="date_arrivee">
                      </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 5%;">
                     <div class="col">
                      <label for="">Date Courrier </label>
                     </div>
                    </td>
                    <td style="padding-top: 5%; margin-right: 10%;">
                      <div class="col">
                        <input type="date" class="form-control" placeholder="" name="date_courrier_arriver">
                      </div>
                    </td>
                    <td style="padding-top: 5%;">
                      <div class="col">
                      <?php 
                              include_once 'connection.php';
                              $reqt="SELECT `id_dest`,`destinataire` FROM `destinataires`";
                              $stmt=$conx->prepare($reqt);
                              $stmt->execute();
                            ?>
                               <select id="inputState" class="form-select" name="id_dest">
                           <?php 
                                while ($row = $stmt->fetch(PDO :: FETCH_ASSOC)) {   
                               ?> 
                                 <option selected value="<?php echo $row['id_dest'];?>"><?php echo $row['destinataire']; ?></option>
                               <?php   
                              }
                          ?>
                          <option selected value="0">désignation du déstinataire</option>
                        </select>
                      </div>
                    </td>
                    <td style="padding-top: 5%;">
                     <div class="col">
                      <?php 
                              include_once 'connection.php';
                              $reqt="SELECT `id_type_courrier`, `type_courrier` FROM `type_courriers`";
                              $stmt=$conx->prepare($reqt);
                              $stmt->execute();
                            ?>
                               <select id="inputState" class="form-select" name="id_type_courrier">
                           <?php 
                                while ($row = $stmt->fetch(PDO :: FETCH_ASSOC)) {   
                               ?> 
                                 <option selected value="<?php echo $row['id_type_courrier'];?>"><?php echo $row['type_courrier']; ?></option>
                               <?php   
                              }
                          ?>
                          <option selected value="0">type courrier</option>
                        </select>
                     </div>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="4" style="padding-top: 5%;">
                     <div class="col">
                      <label for="inputAddress" class="form-label">Objet</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="objet_arriver"></textarea>
                     </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 5%;">
                     <div class="col-12">
                      <label for="">Date Obsérvation</label>
                     </div>
                    </td>
                    <td style="padding-top: 5%;">
                      <div class="col">
                      <input type="date" class="form-control" placeholder="" name="date_observation">
                      </div>
                    </td>
                    <td style="padding-top: 5%;">
                     <div class="col-12">
                      <label for="">Chiosez une perssone</label>
                     </div>
                    </td>
                    <td style="padding-top: 5%;">
                      <div class="col">
                          <?php 
                              include_once 'connection.php';
                              $reqt="SELECT `id_personne`,`nom_prenom` FROM `personne`";
                              $stmt=$conx->prepare($reqt);
                              $stmt->execute();
                            ?>
                               <select id="inputState" class="form-select" name="id_personne">
                           <?php 
                                while ($row = $stmt->fetch(PDO :: FETCH_ASSOC)) {   
                               ?> 
                                 <option selected value="<?php echo $row['id_personne'];?>"><?php echo $row['nom_prenom']; ?></option>
                               <?php   
                              }
                          ?>
                          <option selected value="0">choisir une personne</option>
                        </select>
                       </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="padding-top: 5%;">
                      <div class="col">
                        <button type="button" class="btn btn-primary" onclick="location.href='regestre_arrive.php'">return</button>
                      </div>
                    </td>
                    <td style="padding-top: 5%;">
                      <div class="col">
                        <button type="submit" class="btn btn-primary" name="btn_save">Save </button>
                      </div>
                    </td>
                </tr>
            </table>
    </div>
  
</form>

        <!-- fin form ajouter regestre -->
      </footer>
    </div>
  </main>
  <!-- page-content" -->
</div>
