<?php
require_once("inc/top.php");
require_once("inc/functions.php");

if (isset ( $_POST ["takaisin"] )) {
header('Location: listaa.php');
}

include("inc/connection.php");
$id = ($_GET["id"]);

$kysely = $yhteys->prepare("SELECT * FROM car where id = $id");
$kysely->execute();
$tulos = $kysely->fetch();
?>

      <div class="row">
	  <div class="col-md-12">
        <h1>Auton tiedot:</h1>

<?php
 print("<p><strong>Auton merkki: </strong>" . $tulos['merkki']);
 print("<br><strong>Rekisterinumero: </strong>" . $tulos['rekisterinumero'] );
 print("<br><strong>Moottorin tilavuus: </strong>" . $tulos['moottorintilavuus'] );
 print("<br><strong>Valmistusvuosi: </strong>" . $tulos['valmistusvuosi'] );
 print("<br><strong>Lisätiedot: </strong>" . $tulos['lisatietoja']);
?>


<?php /*
try {
require_once "autotPDO.php";
$kantakasittely = new autotPDO ();
$tulos = $kantakasittely->haeAuto();

foreach ($tulos as $auto){
echo "<tr>";
echo "<td>" .	 $auto->getMerkki() . "</td>";
echo "<td>" .	 $auto->getRekisterinumero() . "</td>";
echo "<td>" .	 $auto->getTilavuus() .  "</td>";
echo "<td>" .	$auto->getValmistusvuosi() . "</td>";
echo "<td>" . $auto->getLisatietoja() . "</td>";
echo "</tr>";
}
} catch ( Exception $error ) {
print($error->getMessage());
//header ( "location: virhe.php?sivu=Listaus&virhe=" . $error->getMessage () );
//exit ();
} */
?>



 <form method="post" class="inline">
	  <button type="" class="btn btn-info" name="takaisin">Takaisin</button>
</form>
        </div>

      </div>



<?php require_once("inc/footer.php"); ?>
