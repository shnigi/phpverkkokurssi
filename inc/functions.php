<?php
class Auto  {
//Attributes
	private $merkki;
	private $rekisterinumero;
	private $tilavuus;
	private $lisatietoja;
	private $valmistusvuosi;
	private $id; 
//Constructor	
	function __construct($merkki = "", $rekisterinumero = "", $tilavuus = "", $valmistusvuosi = "", $lisatietoja = "", $id = 0) {
		$this->merkki = trim ( $merkki );
		$this->rekisterinumero = trim ( $rekisterinumero );
		$this->tilavuus = trim ( $tilavuus );
		$this->valmistusvuosi = trim ( $valmistusvuosi );
		$this->lisatietoja = trim ( $lisatietoja );
		$this->id = $id;
	}

//Methods
	public function setMerkki($merkki) {
		$this->merkki = trim ( $merkki );
	}
	public function getMerkki() {
		return $this->merkki;
	}

	public function setRekisterinumero($rekisterinumero) {
		$this->rekisterinumero = trim ( $rekisterinumero );
	}
	public function getRekisterinumero() {
		return $this->rekisterinumero;
	}
	
	public function setTilavuus($tilavuus) {
		$this->tilavuus = trim ( $tilavuus );
	}
	public function getTilavuus() {
		return $this->tilavuus;
	}
	
	public function setValmistusvuosi($valmistusvuosi) {
		$this->valmistusvuosi = trim ( $valmistusvuosi );
	}
	public function getValmistusvuosi() {
		return $this->valmistusvuosi;
	}
	
	public function setLisatietoja($lisatietoja) {
		$this->lisatietoja = trim ( $lisatietoja);
	}
	public function getLisatietoja() {
		return $this->lisatietoja;
	}
	
//Error handling
	//Merkki
	public function checkMerkki() {
				
		if (strlen ( $this->merkki ) == 0) {
			return 11;
		}	
		
		if (strlen ( $this->merkki ) > 50) {
			return 17;
		}	
		
		if(preg_match("/[^a-zA-Z\s]/i", $this->merkki)){
		return 14;
		}
		
		return 0;
	}
	//Rekisterinumero
	public function checkRekisterinumero() {
				
		if (strlen ( $this->rekisterinumero ) == 0) {
			return 12;
		}	
		
		if(!preg_match("/^[A-Z]{3}\-[0-9]{3}$/", $this->rekisterinumero)){
		return 15;
		}
		
		return 0;
	}
	//Moottorin tilavuus
	public function checkTilavuus() {
				
		if (strlen ( $this->tilavuus ) == 0) {
			return 13;
		}	
		
		if(!preg_match("/^[0-9]{1,2}\.[0-9]{1}$/", $this->tilavuus)){
			return 16;
		}	
		
		return 0;
	}
	
		//Valmistusvuosi
	public function checkValmistusvuosi() {
				
		if (strlen ( $this->valmistusvuosi ) == 0) {
			return 11;
		}	
				
		if(!preg_match("/^[0-9]{4}$/", $this->valmistusvuosi)){
			return 18;
		}	
		
		else {
			if ($this->valmistusvuosi < 1980){
			return 19;
			}
			if ($this->valmistusvuosi > 2015){
				return 20;
			}
	}

		
		return 0;
	}
	
	// Virhekoodit
	public static function getError($virhekoodi) {
		if (isset ( self::$virhelista [$virhekoodi] ))
			return self::$virhelista [$virhekoodi];
		
		return self::$virhelista [- 1];
	}
	
		private static $virhelista = array (
			- 1 => "Virheellinen tieto",
			0 => "",
			11 => "Tieto on pakollinen",
			12 => "Rekisterinumero on pakollinen",
			13 => "Tilavuus on pakollinen",
			14 => "Merkki saa sisältää vain isoja ja pieniä kirjaimia",
			15 => "Rekisterinumeron tulee olla muotoa: ABC-123",
			16 => "Ilmoita tilavuus pisteellä ja muodossa: 1.8 tai 12.5",
			17 => "Auton merkki on liian pitkä",
			18 => "Ilmoita vuosi muodossa: 2015",
			19 => "Auton tulee olla uudempi kuin 1980",
			20 => "Auto ei voi olla uudempi kuin 2015",
	);
	
} //Class ends
?>