<?php
include_once 'connection.php';
include_once 'header.php';
include_once 'footer.php';


if (isset($_POST['btn-update'])) {
    
    $id_order=$_GET['edit_order_courrier'];
    $id_personne=$_POST['id_personne'];
    $classification_courrier=$_POST['classification_courrier'];
    $date_order=$_POST['date_order'];

    $error=array();
    $sucsses=array();
    if (!empty($id_personne)) {
      $courrier->ModiffieOrder($id_personne,$classification_courrier,$date_order,$id_order);
      // header('location:regestre_arrive.php');
      $sucsses[]="Les données ont été modifiés avec succès.";
    }else{
      $error[]="les chompte obligatiore.";
    }
      
}

if(isset($_GET['edit_order_courrier'])){
    $id=$_GET['edit_order_courrier'];
    extract($courrier->getOrder($id));
  }

?>

<!-- sidebar-wrapper  -->
<main class="page-content">
    <div class="container-fluid">
      <h2>Modiffier un classemment d'un courrier</h2>
      
      
      <hr>

      <footer class="text-center">
        <!-- form ajouter regestre -->
          
        <div class="card">
           <h5 class="card-header">information de classemment de cet courrier</h5>
           <div class="card-body">
             <h5 class="card-title"></h5>
              

        <?php
          if(isset($error)){
           foreach ($error as $er) {
            ?>
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>ERRORE :</strong> <?php echo $er?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
               </button>
               </div>
            <?php
           }
         }
         if(isset($sucsses)){
          foreach ($sucsses as $er) {
           ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>SUCSSES :</strong> <?php echo $er?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
               </button>
               </div>
           <?php
              }
            }
        ?>

              <!-- form -->
        <form method="POST">
            
            <table>
                <tr>
                  <td style="padding-top: 8%;">
                    <div class="col-12">
                      <label for="">Date Aujourd'hui</label>
                    </div>
                  </td>
                  <td style="padding-top: 6%;">
                  <div class="col" style="padding-top: 3%;">
                     <input type="date" class="form-control" value="<?php echo $date_order ?>" placeholder="" name="date_order">
                    </div>
                  </td>
                </tr>
                <tr>
                   <td colspan="2" style="padding-top: 3%;">
                    <div class="col" style="padding-top: 3%;">
                      <input type="input" class="form-control" value="<?php echo $classification_courrier ?>" placeholder="classification de cet courrier" name="classification_courrier">
                    </div>
                    </td>
                </tr>
                <tr>
                  <td style="padding-top: 6%;">
                   <div class="col-12">
                      <label for="">Chiosez une perssone</label>
                    </div>
                  </td>
                 <td style="padding-top: 6%;">
                 <div class="col">
                          <?php 
                          
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
                     
              </table>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="location.href='order_courrier.php'">return</button>
        <button type="submit" class="btn btn-primary" name="btn-update">Save</button>
      </div>
       </form>
        <!-- fin form --> 

           </div>
        </div>

 

        <!-- fin form ajouter regestre -->
      </footer>
    </div>
  </main>
  <!-- page-content" -->
</div>