
<div id="modal_sup" class="modal fade " role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">confirmation de suppression</h5>
      </div>
      <div class="modal-body">
        <p> voulez vous vraiment supprimer nationalité?</p>
      </div>
      <div class="modal-footer">
        <a href="" type="button" class="btn btn-primary" id="btn_sup">Supprimer</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ne pas supprimer</button>
      </div>
    </div>
  </div>
</div>

<footer class="container">
    <p>&copy; Agricole 2020-2021</p>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<script type="text/javascript">

$("a[data-sup]").click(function(){

   var lien= $(this).attr("data-sup");//on recupere le lien du bouton 
   var message= $(this).attr("data-mes");//on recupere le lien du bouton
   $("#btn_sup").attr("href",lien);//on ecrit ce lien sur le bouton "supprimer"
   $(".modal-body").text(message);// 


});
</script>
</body>

</html>