<?php include "header.php";
include "connexionPdo.php";
$action=$_GET['action'];
$num=$_POST['num'];//recuperation du libellé
$libelle=$_POST['libelle'];//recuperation du libellé
//requete  sql modification 
if($action =="Modifier"){
   $req=$monPdo->prepare("update genre set libelle=:libelle  where num =:num");
   $req->bindparam(':num',$num);
   $req->bindparam(':libelle',$libelle);
  
   
}else{
  //requete sql ajout 
  $req=$monPdo->prepare("insert into genre(libelle) value(:libelle)");
  $req->bindparam(':libelle',$libelle);

}
$test=$req->execute();

//message resultat de l'action  
$message=$action  == "Modifier"? "modifiée" :"ajoutée";
echo "<div class='container mt-5'>";
echo "<div class='row'>
  <div class='col mt-3'>";
if($test==1){
 echo " 
 <div class='alert alert-success' role='alert'>
  le genre a  bien été $message.mission complited!
 </div>";
}else{
    echo " 
    <div class='alert alert-danger' role='alert'>
     le genre n/'a  pas été '.$message .'
     abort mission!
    </div>";
}
?>
</div>
</div>
<a href='listeGenres.php' class='btn btn-dark'> revenir a la liste des genres</a>
</div>




<?php include "footer.php";

?>