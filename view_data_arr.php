<?php
include_once 'connection.php';

 $table_results=$courrier->DataViewRgtr_arv();
 $results=$table_results['results'];
 $recordTotale=$table_results['counts'];
 $recordFilterds=$recordTotale;
 $data=array();
 $error="Failde :(";
 if(count($results)>0){
   foreach($results as $rs){
       $sub_array=array();
       $sub_array[]=$rs['date_arrivee'];
       $sub_array[]=$rs['num_ordere_arv'];
       $sub_array[]=$rs['date_courrier_arriver'];
       $sub_array[]=$rs['num_lettre_arrivee'];
       $sub_array[]=$rs['designation_destinataire'];
       $sub_array[]=$rs['objet_arriver'];
       $sub_array[]=$rs['date_observation'];
       $sub_array[]=$rs['type_arrivee'];
       $sub_array[]=$rs['nom_prenom'];
    
       $btn_update='<a href="update_rgt_arv.php?edit_rgt_arv='.$rs['id_regestre_arv'].'"><i class="far fa-edit fa-2x"></i></a>';
       $btn_delete='<a href="regestre_arrive.php?delete_rgt_arv='.$rs['id_regestre_arv'].'" onclick="return confirm('.'voulez-vous vraiment supprimer ce mail ?'.')" > <i class="fas fa-trash-alt fa-2x"></i></a>';
       $sub_array[]=$btn_update.$btn_delete;
       $data[]=$sub_array;
   }
 }
 $output=array(
     'draw'=>(isset($_POST['draw']))?intval($_POST['draw']):0,
     'recordTotale'=>$recordTotale,
     'recordFilterds'=>$recordFilterds,
     'data'=>$data,
 );
 echo json_encode($output);

?>