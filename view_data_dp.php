<?php
//data view tables registre depart
include_once 'connection.php';
 $table_results=$courrier->DataViewRgtr_dp();
 $results=$table_results['results'];
 $recordTotale=$table_results['counts'];
 $recordFilterds=$recordTotale;
 $data=array();
 if(count($results)>0){
   foreach($results as $rs){
       $sub_array=array();
       $sub_array[]=$rs['num_ordere_dpr'];
       $sub_array[]=$rs['date_courrier_dpr'];
       $sub_array[]=$rs['destinataire'];
       $sub_array[]=$rs['type_courrier'];
       $sub_array[]=$rs['objet_depart'];
       $sub_array[]=$rs['signature'];
       $sub_array[]=$rs['signer_par'];
       $sub_array[]=$rs['adress'];
       $sub_array[]=$rs['nom_prenom'];
   
       $btn_update='<a href="update_rgt_dp.php?edit_rgt_dp='.$rs['id_regestre_dpr'].'"><i class="far fa-edit fa-2x"></i></a>';
       $btn_delete='<a href="register_dpar.php?delete_rgt_dp='.$rs['id_regestre_dpr'].'" onclick="return confirm(voulez-vous vraiment supprimer ce mail ?)"><i class="fas fa-trash-alt fa-2x"></i></a>';
       $sub_array[]=$btn_update.$btn_delete;
       $data[]=$sub_array;
   }
 }
 $output1=array(
     'draw'=>(isset($_POST['draw']))?intval($_POST['draw']):0,
     'recordTotale'=>$recordTotale,
     'recordFilterds'=>$recordFilterds,
     'data'=>$data,
 );
 echo json_encode($output1);


// $reqt="SELECT `id_regestre_dpr`, `date_courrier_dpr`, `num_ordere_dpr`, `destinataire`, `objet_depart`, `signature`, `signer_par`, `type_courrier`, `adress`, pr.nom_prenom FROM regestre_depart ar INNER JOIN personne pr WHERE ar.`id_personne` = pr.`id_personne`";
// $stmt = $conx->prepare($reqt); 
// $stmt->execute();

// $rows=array();
// $data=array();
// while($row=$stmt->fetch(PDO::FETCH_ASSOC))
// {
//    $rows[] = $row['num_ordere_dpr'];
//    $rows[] = $row['date_courrier_dpr'];
//    $rows[] = $row['destinataire'];
//    $rows[] = $row['type_courrier'];
//    $rows[] = $row['objet_depart'];
//    $rows[] = $row['signature'];
//    $rows[] = $row['signer_par'];
//    $rows[] = $row['adress'];
//    $rows[] = $row['nom_prenom'];

//    $btn_update='<a href="update_rgt_dp.php?edit_rgt_dp='.$row['id_regestre_dpr'].'"><i class="far fa-edit fa-2x"></i></a>';
//    $btn_delete='<a href="register_dpar.php?delete_rgt_dp='.$row['id_regestre_dpr'].'" onclick="return confirm(voulez-vous vraiment supprimer ce mail ?)"><i class="fas fa-trash-alt fa-2x"></i></a>';
//    $rows[]=$btn_update.$btn_delete;
//    $data[]=$rows;

// }

//  $output1=array(
//     'draw'=>(isset($_POST['draw']))?intval($_POST['draw']):0,
//     'data'=>$data
// );

// echo json_encode($output1);


?>