<?php 
require_once("inc/top.php"); 
require_once("inc/functions.php");
session_start (); 


if (isset ( $_POST ["lisaa"] )) {
	
	$auto = new Auto ( $_POST ["merkki"], $_POST ["rekisterinumero"], $_POST ["tilavuus"], $_POST ["valmistusvuosi"], $_POST ["lisatietoja"]);
	
	$_SESSION ["kaara"] = $auto;
	
	$merkkiVirhe = $auto->checkMerkki ();
	$rekisterinumeroVirhe = $auto->checkRekisterinumero ();
	$tilavuusVirhe = $auto->checkTilavuus ();
	$valmistusvuosiVirhe = $auto->checkValmistusvuosi ();

	if ($merkkiVirhe == 0 && $rekisterinumeroVirhe == 0 && $tilavuusVirhe == 0 && $valmistusvuosiVirhe == 0) {
		
		session_write_close ();
		header("location: naytaAuto.php");
		exit ();
	}
}
	
elseif (isset ( $_POST ["cancel"] )) {
	unset ( $_SESSION ["kaara"] );
	header ( "location: index.php" );
	exit ();
} 

else {
	
	if (isset ( $_SESSION ["kaara"] )) {
		$auto = $_SESSION ["kaara"];
		
	$merkkiVirhe = $auto->checkMerkki ();
	$rekisterinumeroVirhe = $auto->checkRekisterinumero ();
	$tilavuusVirhe = $auto->checkTilavuus ();
	$valmistusvuosiVirhe = $auto->checkValmistusvuosi ();
		
	} else {
	$auto = new Auto();
		
	$merkkiVirhe = 0;
	$rekisterinumeroVirhe = 0;
	$tilavuusVirhe = 0;
	$valmistusvuosiVirhe = 0;
	}
	
	if (isset ( $_GET ["korjaus"] )) {
	
	
	
	}
	
}
?>

 <h3>Lisää uusi auto</h3>
      <form role="form" method="post">
        <div class="form-group">
          <label>Merkki:</label>
<?php print ("<span class='pun'>*" . $auto->getError ( $merkkiVirhe ) . "</span>") ;?>
          <input class="form-control" name="merkki" value="<?php print(htmlentities($auto->getMerkki(), ENT_QUOTES, "UTF-8"));?>">
		
        </div>
		  <div class="form-group">
          <label>Rekisterinumero</label>
<?php print ("<span class='pun'>*" . $auto->getError ( $rekisterinumeroVirhe ) . "</span>") ;?>
          <input class="form-control" value="<?php print(htmlentities($auto->getRekisterinumero(), ENT_QUOTES, "UTF-8"));?>" name="rekisterinumero">
        </div>
		  <div class="form-group">
          <label>Moottorin tilavuus:</label>
	<?php print ("<span class='pun'>*" . $auto->getError ( $tilavuusVirhe ) . "</span>") ;?>
          <input class="form-control" value="<?php print(htmlentities($auto->getTilavuus(), ENT_QUOTES, "UTF-8"));?>" name="tilavuus">
        </div>
		
		
			  <div class="form-group">
          <label>Valmistusvuosi:</label>
		  	<?php print ("<span class='pun'>*" . $auto->getError ( $valmistusvuosiVirhe ) . "</span>") ;?>
          <input class="form-control" value="<?php print(htmlentities($auto->getValmistusvuosi(), ENT_QUOTES, "UTF-8"));?>" name="valmistusvuosi">
        </div>
		
		
		     <label>Lisätietoja:</label>
		  <div class="form-group">
         <textarea class="form-control" rows="10" cols="40" name="lisatietoja"><?php print(htmlentities($auto->getLisatietoja(), ENT_QUOTES, "UTF-8"));?></textarea>
        </div>
 
        <button type="submit" class="btn btn-success" name="lisaa">Lisää auton tiedot</button>
		<button class="btn btn-danger" type="submit" name="cancel" >Peruuta</button>
      </form>
	  
	<?php require_once("inc/footer.php"); ?>
