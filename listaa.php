<?php require_once("inc/top.php"); 

if (isset ( $_POST ["poista"] )  and is_numeric($_POST['poista'])) {
	

/*	try {
	require_once "autotPDO.php";
	$kantakasittely = new autotPDO ();
	
	$id = $_POST['deleteItem'];

}*/
header('Location: listaa.php');
}

?>
     <div class="container top-margin">

<h1 class="text-center">Autot tietokannasta.</h1>
<br>
<table class='table table-striped'>
<thead>
<tr>
<th>Merkki:</th>
<th>Rekisterinumero:</th>
<th>Moottorin tilavuus:</th>
<th>Valmistusvuosi:</th>
<th>Lisatietoja:</th>
<th>Toiminnot</th>
</tr>
</thead>
<tbody>


	 <?php
try {
	require_once "autotPDO.php";
	$kantakasittely = new autotPDO ();
	$tulos = $kantakasittely->kaikkiAutot();

	foreach ($tulos as $auto){
	echo "<tr>";
	//echo "<td>" .	 $auto->getId()  . "</td>";
	echo "<td>" .	 $auto->getMerkki() . "</td>";
	echo "<td>" .	 $auto->getRekisterinumero() . "</td>";
	echo "<td>" .	 $auto->getTilavuus() .  "</td>";
	echo "<td>" .	$auto->getValmistusvuosi() . "</td>";
	echo "<td>" . $auto->getLisatietoja() . "</td>";
  echo "<td> <form action='' method='post'>
  <input type='hidden' name='id' value='" . $auto->getId() . "'>
  <input type='submit' name='nayta' value='Näytä' class='btn btn-info'>
  <input type='submit' name='poista' value='Poista' class='btn btn-danger'>
</form> </td>";
	echo "</tr>";
	}
} catch ( Exception $error ) {
	print($error->getMessage());
	//header ( "location: virhe.php?sivu=Listaus&virhe=" . $error->getMessage () );
	//exit ();
}
?>

				 </tbody></table>
       </div>

<?php require_once("inc/footer.php"); ?>
