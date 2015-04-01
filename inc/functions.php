<?php 

if (isset($_POST["lisaa"])){
  $kaveri = new Kaveri($_POST["nimi"],
			$_POST["puhelinnumero"],
			$_POST["osoite"],
			$_POST["lisatietoja"]);

}

else {
   // Alustukset
    $kaveri = new Kaveri();
}


class Kaveri {
 function __construct($nimi="", $puhelinnumero="", $osoite="", $lisatietoja="", $id=0) {
 $this->nimi = trim($nimi);
 $this->puhelinnummero = trim($puhelinnumero);
 $this->osoite = trim($osoite);
 $this->lisatietoja = trim($lisatietoja);
 $this->id = $id;
 }
 
public function setNimi($nimi) {
		$this->nimi = trim ( $nimi );
	}
	
public function getNimi() {
		return $this->nimi;
	}
	

 
 }
 

?>