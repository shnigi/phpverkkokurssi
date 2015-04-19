<?php require_once("inc/top.php"); ?>
<?php require_once("inc/functions.php"); ?>

<?php /*
if (isset ( $_POST ["lisaa"] )) {
	$kaveri = new Kaveri ( $_POST ["nimi"], $_POST ["puhelinnumero"], $_POST ["osoite"], $_POST ["lisatietoja"]);
}*/
?>

 <h3>Lisää uusi auto</h3>
      <form role="form" method="post">
        <div class="form-group">
          <label>Merkki:</label>
	
          <input class="form-control" placeholder="Anna auton merkki" name="merkki">
        </div>
		  <div class="form-group">
          <label>Rekisterinumero</label>

          <input class="form-control" placeholder="Anna auton rekisterinumero" name="rekisterinumero">
        </div>
		  <div class="form-group">
          <label>Moottorin tilavuus:</label>
	
          <input class="form-control" placeholder="Anna moottorin tilavuus" name="tilavuus">
        </div>
		     <label>Lisätietoja:</label>
		  <div class="form-group">
         <textarea class="form-control" rows="10" cols="40" placeholder="Lisätiedot" name="lisatietoja"></textarea>
        </div>
 
        <button type="submit" class="btn btn-success" name="lisaa">Lisää auton tiedot</button>
		<button class="btn btn-danger" type="reset">Tyhjennä</button>
      </form>

<?php require_once("inc/footer.php"); ?>
