<?php
require_once("inc/top.php");
require_once("inc/functions.php");
session_start ();

if (isset($_SESSION["kaara"])) {
 $auto = $_SESSION["kaara"];

} else {
$auto = new Auto();
}

	if (isset ( $_POST ["korjaa"] )) {
		header("location: lisaa.php?korjaus=kylla");
exit;
	}

	if (isset ( $_POST ["tallenna"] )) {

	try {
		require_once "autotPDO.php";
		$autotPDO = new autotPDO ();
		$id = $autotPDO->lisaaAuto($auto);
	//	$auto->setID($id);
	} catch ( Exception $error ) {
		print($error->getMessage());
	}

		unset ( $_SESSION ["kaara"] );
		header("location: tallennettu.php");
		exit ();
	}

	if (isset ( $_POST ["peruuta"] )) {
	unset ( $_SESSION ["kaara"] );
	header ( "location: index.php" );
	exit ();;
	}
?>


      <div class="row">
	  <div class="col-md-12">
        <h1>Tarkista antamasi auton tiedot:</h1>

<?php
 print("<p><strong>Auton merkki:</strong> " . $auto->getMerkki());
 print("<br><strong>Rekisterinumero: </strong>" . $auto->getRekisterinumero());
 print("<br><strong>Moottorin tilavuus: </strong>" . $auto->getTilavuus());
 print("<br><strong>Valmistusvuosi:</strong> " . $auto->getValmistusvuosi());
 print("<br><strong>Lisätiedot: </strong>" . $auto->getLisatietoja() . "</p>");
?>
<form method="post" class="inline">
  <button type="submit" class="btn btn-info" name="korjaa">Korjaa</button>
</form>

 <form method="post" class="inline">
    <button type="submit" class="btn btn-success" name="tallenna">Tallenna</button>
</form>

 <form method="post" class="inline">
	  <button type="" class="btn btn-danger" name="peruuta">Peruuta</button>
</form>
        </div>

      </div>



<?php require_once("inc/footer.php"); ?>
