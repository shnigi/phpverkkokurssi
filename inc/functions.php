<?php 
class Kaveri {

	private static $virheet = array (
			- 1 => "Virheellinen tieto",
			0 => "",
			11 => "Nimi on pakollinen",
			12 => "Nimi on liian lyhyt",
			13 => "Nimi on liian pitkä",
			21 => "Puhelinnumero on pakollinen",
			31 => "Osoite on pakollinen",
			51 => "Kuvaus on pakollinen",
	);
	
	// Attribuutit
	private $nimi;
	private $puhelinnumero;
	private $osoite;
	private $lisatietoja;
	private $id; 

 function __construct($nimi="", $puhelinnumero="", $osoite="", $lisatietoja="", $id=0) {
 $this->nimi = trim($nimi);
 $this->puhelinnummero = trim($puhelinnumero);
 $this->osoite = trim($osoite);
 $this->lisatietoja = trim($lisatietoja);
 $this->id = $id;
 }
  
´
  
  
 }
 ?>