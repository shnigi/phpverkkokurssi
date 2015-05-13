<?php
require_once("inc/top.php");
require_once("inc/functions.php");

if (isset ( $_POST ["takaisin"] )) {
header('Location: listaa.php');
}
?>

      <div class="row">
	  <div class="col-md-12">
        <h1>Auton tiedot:</h1>

<?php
 print("<p><strong>Auton merkki:</strong> " );
 print("<br><strong>Rekisterinumero: </strong>" );
 print("<br><strong>Moottorin tilavuus: </strong>" );
 print("<br><strong>Valmistusvuosi:</strong> " );
 print("<br><strong>Lisätiedot: </strong>" );
?>

 <form method="post" class="inline">
	  <button type="" class="btn btn-info" name="takaisin">Takaisin</button>
</form>
        </div>

      </div>



<?php require_once("inc/footer.php"); ?>
