<?php require_once("inc/top.php"); ?>
<?php require_once("inc/functions.php"); ?>

<?php 
if (isset ( $_POST ["lisaa"] )) {
	$kaveri = new Kaveri ( $_POST ["nimi"], $_POST ["puhelinnumero"], $_POST ["osoite"], $_POST ["lisatietoja"]);
}
?>

 <h3>Lisää uusi kaveri</h3>
      <form role="form" method="post">
        <div class="form-group">
          <label>Nimi:</label>
	
          <input class="form-control" placeholder="Anna kaverin nimi" name="nimi">
        </div>
		  <div class="form-group">
          <label>Puhelinnumero:</label>

          <input class="form-control" placeholder="Anna kaverin puhelinnumero" name="puhelinnumero">
        </div>
		  <div class="form-group">
          <label>Osoite:</label>
	
          <input class="form-control" placeholder="Anna kaverin osoite" name="osoite">
        </div>
		     <label>Lisätietoja:</label>
		  <div class="form-group">
         <textarea class="form-control" rows="10" cols="40" placeholder="Lisätiedot" name="lisatietoja"></textarea>
        </div>
 
        <button type="submit" class="btn btn-success" name="lisaa">Lisää kaverin tiedot</button>
		<button class="btn btn-danger" type="reset">Tyhjennä</button>
      </form>

<?php require_once("inc/footer.php"); ?>
