<?php include "header.php";
include "connexionPdo.php";
/// liste des nationalité
$libelle="";
$continentSel="tous";
//construction de la requete
$texteReq="select n.num, n.libelle as 'libNation',c.libelle as 'libContinent' from nationalite n, continent c  where n.numContinent=c.num";
if(!empty($_GET)){
    $libelle=$_GET['libelle'];
    $continentSel=$_GET['continent'];
    if($libelle!=""){ $texteReq.= " and n.libelle like '%" .$libelle."%'";}
    if($continentSel!="tous"){ $texteReq.= " and c.num =" .$continentSel;}
}
$texteReq.=" order by n.libelle ";
$req=$monPdo->prepare($texteReq);
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationalite=$req->fetchAll();

 ///liste des continent
 $reqContinent=$monPdo->prepare("select * from continent");
 $reqContinent->setFetchMode(PDO::FETCH_OBJ);
 $reqContinent->execute();
 $lesContinents=$reqContinent->fetchAll();

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


</div>
<div>
    <main role="main">
        <div class="container mt-5">
            <div class="row pt-3">
                <div class="col-9">
                    <h2> liste des nationalités</h2>
                </div>
            
                  <div class="col-3"> <a href="formNationalite.php?action=Ajouter" class="btn btn-success"><i class="fas fa-plus-circle"></i> créer une nationalité </a></div>
                </div>

                
                    <form action="" method="get" class=" border border-primary rounded p-3 mt-3 mb-3">
                        <div class="row">
                            <div class="col">
                                <input type="text" class='form-control' id='libelle' placeholder='saisir le libellé'name="libelle"value="<?php echo $libelle; ?>">
                            </div>
                            <div class="col">
                                <select name="continent" class="form-control">
                                    <?php
                                    echo"<option value='tous' >tous les continents</option>";
                                  foreach($lesContinents as $continent){        
                                  $selection=$continent->num == $continentSel ? 'selected':'';
                                  echo"<option value='$continent->num'$selection >$continent->libelle</option>";
                                }
                                  ?>
                                </select>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-sucess btn-block btn-primary">rechercher</button>
                            </div>
                      
                    </form>



                   
                </div>
                <table class="table table-hover table-striped ">
                    <thead>
                        <tr class="table-primary d-flex">
                            <th scope="col" class="col-md-2">numéros</th>
                            <th scope="col" class="col-md-5">libellé</th>
                            <th scope="col" class="col-md-3">continent</th>
                            <th scope="col" class="col-md-2">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
  foreach($lesNationalite as $nationalite){
   echo" <tr  class='d-flex'>";
   echo" <td  class='col-md-2'>$nationalite->num</td>";
   echo" <td class='col-md-5'>$nationalite->libNation</td>";
   echo" <td class='col-md-3'>$nationalite->libContinent</td>";
   echo" <td class='col-md-2'>
    <a  href='formNationalite.php?action=Modifier&num=$nationalite->num'class='btn btn-primary'><i class='fas fa-pen'></i> </a>
    <a  href='#modal_sup'data-toggle='modal'data-mes='voulez vous vraiment supprimer nationalité?' data-sup='supprimerNationalite.php?num=$nationalite->num'class='btn btn-danger'><i class='far fa-trash-alt'></i>  </a>
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