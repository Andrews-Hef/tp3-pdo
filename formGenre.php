<?php include "header.php";
$action=$_GET['action'];//soit Ajouter ou Modifier
include "connexionPdo.php";
if($action == "Modifier"){
 
 $num=$_GET['num'];
 $req=$monPdo->prepare("select * from genre g where num= :num");
 $req -> setFetchMode(PDO::FETCH_OBJ);
 $req->bindparam('num',$num);
 $req->execute();
 $lesGenres=$req->fetch();
}

 

?>

<main role="main">
    <div class="container mt-5">
        <h2 class="pt-3 text-center"><?php echo "$action";?> un genre </h2> <!-- affiche ajouter ou modifier  un genres -->
        <form action="validFormGenres.php?action=<?php echo $action;?>" method="post"
            class="col-md-6 offset-md-3 border border-dark p-3 rounded  ">
            <div class="form-group">
                <label for='libelle'> libellé </label>
                <input type="text" class='form-control' id='libelle' placeholder='saisir le libellé' name="libelle"
                    value="<?php  if($action == "Modifier") {echo $lesGenres->libelle;}?>">
            </div>
             <!--bouton annuler et bouton ajouter -->
            <input type="hidden" id="num" name="num" value="<?php   { echo $lesGenres->num;}?>">
            <div class="row">
                <div class="col"> <a href="listeGenres.php" class="btn  btn-info btn-block ">revenir a la liste</a>
                </div>
                <div class="col"> <button type='submit' class='btn btn-success btn-block'> <?php echo "$action";?>
                    </button></div>
            </div>
        </form>

    </div>
</main>

<?php include "footer.php";

?>