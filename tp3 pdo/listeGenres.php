<?php include "header.php";
include "connexionPdo.php";
//liste des genres
$libelle="";
//construction de la requete
$texteReq="select g.num, g.libelle as 'libGenres' from  genre g";
if(!empty($_GET)){
    $libelle=$_GET['libelle'];
    
    if($libelle!=""){ $texteReq.= " where g.libelle like '%" .$libelle."%'";}
    
}
$texteReq.=" order by g.libelle ";
$req=$monPdo->prepare($texteReq);
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesGenres=$req->fetchAll();

 

if(!empty($_SESSION['message']))
{
    $MesMessages=$_SESSION['message'];
    foreach($MesMessages as $key=>$message)
    {
     echo '<div class="container  pt-5">
     
     <div class="alert alert-'.$key.' alert-dismissible fade show"role="alert">'.$message.'
         
         <button type="button" class="close" data-dismiss="alert" aria-label=close">
         <span aria-hidden="true">&times;</span>
         </button>
         </div>
         </div>';
    }
    $_SESSION["message"]=[];
}

?>



<div>
    <main role="main">
        <div class="container mt-5">
            <div class="row pt-3">
                <div class="col-9">
                    <h2> liste des genres</h2>
                </div>
            
                  <div class="col-3"> <a href="formGenre.php?action=Ajouter" class="btn btn-success"><i class="fas fa-plus-circle"></i> créer un genre </a></div>
                </div>

                
                    <form action="" method="get" class=" border border-primary rounded p-3 mt-3 mb-3">
                        <div class="row">
                            <div class="col">
                                <input type="text" class='form-control' id='libelle' placeholder='saisir le libellé'name="libelle"value="<?php echo $libelle; ?>">
                            </div>
                            
                            <div class="col">
                                <button type="submit" class="btn btn-sucess btn-block btn-primary">rechercher</button>
                            </div>
                      
                    </form>



                   
                </div>
                <table class="table table-hover table-striped ">
                    <thead>
                        <tr class="table-primary d-flex">
                            <th scope="col" class="col-md-5">numéros</th>
                            <th scope="col" class="col-md-5">libellé</th>
                            <th scope="col" class="col-md-2">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
  foreach($lesGenres as $genre){
   echo" <tr  class='d-flex'>";
   echo" <td  class='col-md-5'>$genre->num</td>";
   echo" <td class='col-md-5'>$genre->libGenres</td>";

   echo" <td class='col-md-2'>
    <a  href='formGenre.php?action=Modifier&num=$genre->num'class='btn btn-primary'><i class='fas fa-pen'></i> </a>
    <a  href='#modal_sup'data-toggle='modal'data-mes='voulez vous vraiment supprimer le genre ?' data-sup='supprimerGenres.php?num=$genre->num'class='btn btn-danger'><i class='far fa-trash-alt'></i>  </a>
   </td>";

  echo "</tr>";
  }
  
  ?>


                        </tr>
                    </tbody>
                </table>



    </main>
</div>


<?php include "footer.php";

?>