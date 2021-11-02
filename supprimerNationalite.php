<?php include "header.php";
include "connexionPdo.php";
$num=$_GET['num'];
  //requete sql suppression d'une nationalité 
   $req=$monPdo->prepare("delete  from  nationalite  where num =:num");
   $req->bindparam(':num',$num); 
   $nb=$req->execute();

//alerts  action reussi  et action raté
if($nb==1){
  $_SESSION['message']=["success"=>"la nationalité a  bien été supprimée .mission complited!"];
}else{
  $_SESSION['message']=["danger"=>"la nationalité a  bien été supprimée .mission  abort!"];
}
header('location: listeNationalite.php');
exit();
?>
  
 