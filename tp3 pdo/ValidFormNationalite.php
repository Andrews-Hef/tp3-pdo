<?php include "header.php";
include "connexionPdo.php";
$action=$_GET['action'];
$num=$_POST['num'];//recuperation du libellé
$libelle=$_POST['libelle'];//recuperation du libellé
$continent=$_POST['continent'];//recuperation du continent
//requete  sql modification 
if($action =="Modifier"){
   $req=$monPdo->prepare("update nationalite set libelle=:libelle numContinent=:continent where num =:num");
   $req->bindparam(':num',$num);
   $req->bindparam(':libelle',$libelle);
   $req->bindparam(':continent',$continent);
   
}else{
  //requete sql ajout 
  $req=$monPdo->prepare("insert into nationalite(libelle, numContinent) value(:libelle, :continent)");
  $req->bindparam(':libelle',$libelle);
  $req->bindparam(':continent',$continent);
}
$nb=$req->execute();

//message resultat de l'action  
$message=$action  == "Modifier"? "modifiée" :"ajoutée";
echo "<div class='container mt-5'>";
echo "<div class='row'>
  <div class='col mt-3'>";
if($nb==1){
 echo " 
 <div class='alert alert-success' role='alert'>
  la nationalité a  bien été $message.mission complited!
 </div>";
}else{
    echo " 
    <div class='alert alert-danger' role='alert'>
     la nationalité n/'a  pas été '.$message .'
     abort mission!
    </div>";
}
?>
</div>
</div>
<a href='listeNationalite.php' class='btn btn-dark'> revenir a la liste des nationalité</a>
</div>




<?php include "footer.php";

?>