<?php
include_once 'connection.php';
include_once 'header.php';
include_once 'footer.php';

$reqt="SELECT id_order,numero_courrier,date_order,classification_courrier,pr.nom_prenom,courries FROM `order_courrier` ar INNER JOIN personne pr WHERE ar.`id_personne` = pr.`id_personne`";
$stmt=$conx->prepare($reqt);
$stmt->execute();

if(isset($_POST['btn-save'])){

  $answer = $_POST['flexRadioDefault'];  
  if ($answer == "arrivee") {          
    $numero_courrier=$_POST['select_reg_arv'];  
    $courries="regester arrive";    
  }
  else {
    $numero_courrier=$_POST['select_reg_dpr']; 
    $courries="regester depart"; 
  } 
  $date_classement=$_POST['date_classement'];
  $classification_courrier=$_POST['classification_courrier'];
  $id_personne=$_POST['id_personne'];
  $sucss=array();
  $error=array(); 
 if(!empty($id_personne) && $numero_courrier !="" && $date_classement !="" && $classification_courrier !=""){
      $courrier->CreateOrderCourrier($numero_courrier,$date_classement,$classification_courrier,$id_personne,$courries);
     $sucss[]="Cet Opération Ajouté Avec Succès.";
 }
 else{
     $error[]="Tout les Champ Obligatiore..!";
 }
}

if(isset($_GET['delete_order_courrier'])){   
  $id=$_GET['delete_order_courrier'];      
  $courrier->Delete_order_courrier($id);
  
 }

?>

<main class="page-content">
    <div class="container-fluid">
      <h2>Classement Courrier</h2>
      
       <!-- Modale ajouter personne -->
        
          <!-- Button trigger modal -->
<!-- Button trigger modal -->
 
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
         if(isset($sucss)){
          foreach ($sucss as $vl) {
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
   
      <hr>
       
      <div class="main">

      

     <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <button type="button" class="btn btn-outline-primary" onclick="location.href='#'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-plus"></i>  New classement </button>

     </div>
     <hr>
      <footer class="text-center">
        <!-- table -->
        <!-- begin style data table css -->
         <style>
           div.dataTables_wrapper div.dataTables_length select {
            width: 55px;
            display: inline-block;
          }
          .dataTables_length{
            margin-right: 600px;
          }
          .dataTables_info{
            margin-right: 0%;
            margin-left: 0%; 
          }   
          /* .colorDelete{
            color: #ff00009e;
          } */
          table.dataTable>thead>tr>th:not(.sorting_disabled), table.dataTable>thead>tr>td:not(.sorting_disabled) {
           padding-right: 0px;
           }
           
         </style>
         <!-- fin style data table css -->

        <div class="card bg-wieth mb-3">
          <div class="card-header" style="color: black; margin-bottom:20px;"><h5>ORDER</h5> </div>
            <div class="card-body">
            <!-- <h5 class="card-title" style="color: black;">Success card title</h5> -->
            <table id="id_datatable_pr" style="width: 100%;" class="table table-hover" >
          <thead>
             <tr>
                <th>N° Courrier</th>
                <th>Date classement</th>
                <th>Classement Courrier</th> 
                <th>personne</th> 
                <th>Courier</th>
                <th>Action</th> 
             </tr>
          </thead>
          <tbody>
           <?php 
             if ($stmt->rowCount()>=0) {
              while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                 ?>
                 <tr>
                  <td><?php echo $row['numero_courrier']; ?></td>
                  <td><?php echo $row['date_order']; ?></td>  
                  <td><?php echo $row['classification_courrier']; ?></td>
                  <td><?php echo $row['nom_prenom']; ?></td>
                  <?php 
                  if($row['courries']=="regester depart"){
                    ?>
                      <td> <span class="badge badge-pill badge-primary">depart</span></td>
                    <?php
                  }else{
                    ?>
                       <td><span class="badge badge-pill badge-info">arrive</span></td>
                    <?php
                  }
                  
                  ?>
                  <td>
                    <a href="updateOrderCourrier.php?edit_order_courrier=<?php echo $row['id_order'];?>">
                         <i class="far fa-edit fa-2x"></i></a>
                    <a href="order_courrier.php?delete_order_courrier=<?php echo $row['id_order'];?>" onclick="return confirm('voulez vous vraiment supprimer cet operation ?')">
                       <i class="fas fa-trash-alt fa-2x colorDelete"></i></a>
                  </td> 
                 </tr>
                 <?php
              }
           }
           ?>
          </tbody>        
        </table>
          </div>
        </div>
        <!-- table -->
      </footer>

    </div>
  </main>


  <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="margin-left: 30px;">
            
            <!-- form -->
        <form method="POST">
            <table id="id_datatable_ord">
                <tr>
                    <td style="padding-top: 5%;" >
                    <div class="col">
                      <div class="form-check">
                       <input class="form-check-input" type="radio" name="flexRadioDefault" value="arrivee" id="flexRadioDefault1" onclick="display()" checked>
                       <label class="form-check-label" for="flexRadioDefault1">Courrier Arrivée</label>
                      </div>
                    </div>
                    </td>
                    <td style="padding-top: 5%;" >
                    <div class="col">
                      <div class="form-check">
                       <input class="form-check-input" type="radio" name="flexRadioDefault" value="depart" id="flexRadioDefault2" onclick="display()">
                       <label class="form-check-label" for="flexRadioDefault2">Courrier Départ</label>
                      </div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 5%;" colspan="2">
                    
                       <div class="col colsignee_arv" id="id_select_rgst_arv" >
                          <?php 

                              $reqt="SELECT `id_regestre_arv`, `num_lettre_arrivee` FROM `regestre_arrivee` WHERE 1";
                              $stmt=$conx->prepare($reqt);
                              $stmt->execute();
      
                            ?>
                               <select id="inputState" class="form-select" name="select_reg_arv">
                            <?php 
                                while ($row = $stmt->fetch(PDO :: FETCH_ASSOC)) {  
                               ?>  
                                 <option selected value="<?php echo $row['num_lettre_arrivee'];?>"><?php echo $row['num_lettre_arrivee']; ?></option>
                               <?php  
                              }
                          ?>
                          <option selected value="0">choisir une courrier arrivee</option>
                        </select>
                       </div>

                       <div class="col colsignee_dpr" id="id_select_rgst_dpr" style="display:none;">
                          <?php 
                              $reqt="SELECT `id_regestre_dpr`, `num_ordere_dpr` FROM `regestre_depart` WHERE 1";
                              $stmt=$conx->prepare($reqt);
                              $stmt->execute();
                            ?>
                               <select id="inputState" class="form-select" name="select_reg_dpr">
                            <?php 
                                while ($row = $stmt->fetch(PDO :: FETCH_ASSOC)) {  
                               ?>  
                                 <option selected value="<?php echo $row['num_ordere_dpr'];?>"><?php echo $row['num_ordere_dpr']; ?></option>
                               <?php  
                              }
                          ?>
                          <option selected value="0">choisir une courrier depart</option>
                        </select>
                       </div>

                    </td>
                    <td style="padding-top: 5%;">
                      <label for=""></label>
                    </td>
                </tr>
                <tr>
                   <td style="padding-top: 5%;">
                     <div class="col-12">
                      <label for="">Date Classement</label>
                     </div>
                    </td>
                    <td style="padding-top: 5%;">
                      <div class="col">
                        <input type="date" class="form-control" name="date_classement">
                      </div>
                    </td>

                </tr>
                <tr>
                   <td style="padding-top: 5%;" colspan="2">
                      <div class="col">
                        <input type="input" class="form-control" placeholder="Classement Courrier" name="classification_courrier">
                      </div>
                    </td>
                </tr>
                <tr>
                   <td style="padding-top: 5%;" colspan="2">
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
        </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="btn-save">Save</button>
      </div>
       </form>
        <!-- fin form -->

      </div>
      
    </div>
  </div>
</div>

      <!-- fin modale -->
<script type="text/javascript">


$(document).ready(function() {

  $('#id_datatable_pr').DataTable();
});

function display() {  
            if(document.getElementById('flexRadioDefault1').checked) { 
                $('div.colsignee_arv').show();
                $('div.colsignee_dpr').hide();
            } 
            else { 
              $('div.colsignee_dpr').show();
              $('div.colsignee_arv').hide();
            } 
        } 

</script>

     

