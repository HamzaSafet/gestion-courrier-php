<?php
include_once 'header.php';
include_once 'footer.php';
include_once 'connection.php';

if(isset($_POST['btn_update'])){
  $id_regestre_dpr=$_GET['edit_rgt_dp'];
  $date_courrier_dpr=$_POST['date_courrier_dpr'];
  $num_ordere_dpr=$_POST['num_ordere_dpr'];
  $id_dest=$_POST['id_dest'];
  $objet_depart=$_POST['objet_depart'];
  $segnature=$_POST['segnature'];
  $signier_par=$_POST['signier_par'];
  $id_type_courrier=$_POST['id_type_courrier'];
  $adress=$_POST['adress'];
  $id_personne=$_POST['id_personne'];
  $error=array();
  $valaid=array();
  if(!empty($id_personne)){
    $courrierdp-> ModiffierRgtr_dpr($id_regestre_dpr,$date_courrier_dpr,$num_ordere_dpr,$id_dest,$objet_depart,$segnature,$signier_par,$id_type_courrier,$adress,$id_personne);
    $valaid[]="votre operation ajout avec succes.";
        
  }else{
    $error[]="choisi une personne.";
  }  
}

if (isset($_GET['edit_rgt_dp'])) {   
    extract($courrierdp->getRgtr_dpr($_GET['edit_rgt_dp']));
  }

?>

  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
      <h2>Modiffier un Regestre Depart</h2>
      
     
      <hr>

      <?php
         if(isset($error)){
           foreach ($error as $er) {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>ERROR !  </strong> <?php echo $er?>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
            </div>
            <?php
           }
         }
         if(isset($valaid)){
          foreach ($valaid as $vl) {
           ?>
             <div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong>Success : </strong> <?php echo $vl?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
             </div>
           <?php
          }
        }

      ?>

      <footer class="text-center">
        <!-- form ajouter regestre -->
          
        <form class="row g-3" method="POST">
            <table>
                <tr>
                    <td style="padding-top: 3%;">
                      <div class="col">
                      <input type="input" class="form-control" value="<?php echo"$num_ordere_dpr"?>" placeholder="N° classement" name="num_ordere_dpr">
                     </div>
                    </td>
                    <td style="padding-top: 3%;">
                     <div class="col-12">
                      <label for="">Date Courrier</label>
                     </div>
                    </td>
                    <td style="padding-top: 3%;">
                      <div class="col">
                      <input type="date" class="form-control" value="<?php echo"$date_courrier_dpr";?>" placeholder="" name="date_courrier_dpr">
                      </div>
                    </td>
                    <td style="padding-top: 3%;">
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
                </tr>
                <tr>
                    <td colspan="4" style="padding-top: 5%;">
                     <div class="col">
                      <label for="inputAddress" class="form-label">Objet</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1"  rows="3" name="objet_depart"><?php echo"$objet_depart";?></textarea>
                     </div>
                    </td>
                </tr>
                <tr>
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
                    <td colspan="3" style="padding-top: 5%;">
                     <div class="col">
                      <input type="input" class="form-control" value="<?php echo"$adress";?>" placeholder="Adresse" name="adress">
                     </div>
                    </td>
                </tr>
                <tr>

                <td style="padding-top: 5%;">                    
                      <div class="col">
                      <?php 
                        if(isset($_POST['segnature'])=="signee"){
                           $varSignatur="selected";
                           $varSignatur1="";
                        }else{
                          $varSignatur1="selected";
                          $varSignatur="";
                        }
                      ?>
                        <select id="inputStateSig" name="segnature" class="form-select">
                           <option <?php echo $varSignatur ?> value="signee">signée</option>
                          <option <?php echo $varSignatur1 ?> value="signee_pas">Non signée</option> 
                        </select>
                      </div>
                    </td>
                    <td colspan="1" style="padding-top: 5%;">
                       <div class="colsignee" style="display:none;">
                          <input type="input" class="form-control" placeholder="signée par" name="signier_par">
                       </div>
                    
                    <td style="padding-top: 5%;">
                     <div class="col-12">
                      <label for="">Chiosez un perssone</label>
                     </div>
                    </td>
                    <td style="padding-top: 5%;">
                      <div class="col">
                      <?php  
                          $reqt="SELECT `id_personne`,`nom_prenom` FROM `personne`";
                          $stmt=$conx->prepare($reqt);
                          $stmt->execute();
                        ?>
                    <select id="inputState" class="form-select" name="id_personne">
                       <?php while ($row = $stmt->fetch(PDO :: FETCH_ASSOC)) { ?> 
                                <option selected value="<?php echo $row['id_personne'];?>"><?php echo $row['nom_prenom']; ?></option>
                       <?php } ?>
                           <option selected value="0">choisir une personne</option>
                    </select>
                       </div>
                    </td>                   
                </tr>
                <tr>
                    <td colspan="4" style="padding-top: 3%;">
                      <div class="col">
                        <button type="button" class="btn btn-primary" onclick="location.href='register_dpar.php'">return</button>
                      </div>
                    </td>
                    <td style="padding-top: 3%;">
                      <div class="col">
                        <button type="submit" name="btn_update" class="btn btn-primary">Save </button>
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
<!-- page-wrapper -->
<script type="text/javascript">

   $('select[name="segnature"]').change(function(){
    var selectBox = document.getElementById("inputStateSig");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    var id = "signee" + $(this).val();

     if(selectedValue=="signee"){
      $('div.colsignee').show();
     }else{
       $('div.colsignee').hide();
     }
  
});

</script>
