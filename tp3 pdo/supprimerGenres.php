<?php include "header.php";
include "connexionPdo.php";
var_dump("coucou");
$num=$_GET['num'];
  //requete sql suppression d'un genre
   $req=$monPdo->prepare("delete from  genre  where num =:num");
   $req->bindparam(':num',$num); 
   $nb=$req->execute();

//alerts  action reussi  et action raté
if($nb==1){
  $_SESSION['message']=["success"=>"le genre a  bien été supprimée .mission complited!"];
}else{
  $_SESSION['message']=["danger"=>"le genre a  pas été supprimée .mission  abort!"];
}
header('location: listeGenres.php');
exit();
?>
  
 