<?php
//Tämä on tietokantaluokka ja functions.php on sovelluksen luokka
require_once "inc/functions.php";
class autotPDO {
	private $db;
	private $lkm;

	function __construct($dsn = "mysql:host=localhost;dbname=a1100331", $user = "jorma", $password = "salainen") {
		$this->db = new PDO ( $dsn, $user, $password );
		// Virheiden jäljitys kehitysaikana, tuotannossa PIILOON!
		$this->db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

		$this->db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );

		$this->lkm = 0;
	}

	function getLkm() {
		return $this->lkm;
	}

	public function kaikkiAutot() {
		$sql = "SELECT * FROM car";
		if (! $stmt = $this->db->prepare ( $sql )) {
			$virhe = $this->db->errorInfo ();
			throw new PDOException ( $virhe [2], $virhe [1] );
		}
		if (! $stmt->execute ()) {
			$virhe = $stmt->errorInfo ();
			throw new PDOException ( $virhe [2], $virhe [1] );
		}
		$tulos = array ();

		while ( $row = $stmt->fetchObject () ) {
			// Tehdään tietokannasta haetusta rivistä leffa-luokan olio
			$auto = new Auto ();
			$auto->setMerkki ( $row->merkki );
			$auto->setRekisterinumero ( utf8_encode ( $row->rekisterinumero ) );
			$auto->setTilavuus ( utf8_encode ( $row->moottorintilavuus ) );
			$auto->setValmistusvuosi ( $row->valmistusvuosi );
			$auto->setLisatietoja ( utf8_encode ( $row->lisatietoja ) );
			$auto->setId ( $row->id );

			// Laitetaan olio tulos taulukkoon (olio-taulukkoon)
			$tulos [] = $auto;
		}
		$this->lkm = $stmt->rowCount ();
		return $tulos;
	}


	public function haeAuto($auto) {
		$sql = "SELECT * FROM car
				WHERE id = :id";
		// Valmistellaan lause, prepare on PDO-luokan metodeja
		if (! $stmt = $this->db->prepare ( $sql )) {
			$virhe = $this->db->errorInfo ();
			throw new PDOException ( $virhe [2], $virhe [1] );
		}
		// Sidotaan parametrit
		$stmt->bindValue ( ":id", $id, PDO::PARAM_INT );
		// Ajetaan lauseke
		if (! $stmt->execute ()) {
			$virhe = $stmt->errorInfo ();
			if ($virhe [0] == "HY093") {
				$virhe [2] = "Invalid parameter";
			}
			throw new PDOException ( $virhe [2], $virhe [1] );
		}
		// Käsittellään hakulausekkeen tulos
		$tulos = array ();
		while ( $row = $stmt->fetchObject () ) {
			// Tehdään tietokannasta haetusta rivistä leffa-luokan olio
			$auto = new Auto ();
			$auto->setId ( $row->id );
			$auto->setMerkki ( utf8_encode ( $row->merkki ) );
			$auto->setRekisterinumero ( utf8_encode ( $row->rekisterinumero ) );
			$auto->setTilavuus ( utf8_encode ( $row->tilavuus ) );
			$auto->setValmistusvuosi ( $row->valmistusvuosi );
			$auto->setLisatietoja ( utf8_encode ( $row->lisatietoja ) );

			// Laitetaan olio tulos taulukkoon (olio-taulukkoon)
			$tulos [] = $auto;
		}
		$this->lkm = $stmt->rowCount ();
		return $tulos;
	}


	//Lisää auto
	function lisaaAuto($auto) {
		$sql = "insert into car (merkki, rekisterinumero, moottorintilavuus, valmistusvuosi, lisatietoja)
		        values (:merkki, :rekisterinumero, :moottorintilavuus, :valmistusvuosi, :lisatietoja)";
		// Valmistellaan SQL-lause
		if (! $stmt = $this->db->prepare ( $sql )) {
			$virhe = $this->db->errorInfo ();
			throw new PDOException ( $virhe [2], $virhe [1] );
		}
		// Parametrien sidonta
		$stmt->bindValue ( ":merkki", utf8_decode ( $auto->getMerkki () ), PDO::PARAM_STR );
		$stmt->bindValue ( ":rekisterinumero", utf8_decode ( $auto->getRekisterinumero () ), PDO::PARAM_STR );
		$stmt->bindValue ( ":moottorintilavuus", utf8_decode ( $auto->getTilavuus () ), PDO::PARAM_INT );
		$stmt->bindValue ( ":valmistusvuosi", $auto->getValmistusvuosi (), PDO::PARAM_STR );
		$stmt->bindValue ( ":lisatietoja", utf8_decode ( $auto->getLisatietoja () ), PDO::PARAM_STR );
		// Suoritetaan SQL-lause (insert)
		if (! $stmt->execute ()) {
			$virhe = $stmt->errorInfo ();
			if ($virhe [0] == "HY093") {
				$virhe [2] = "Invalid parameter";
			}
			throw new PDOException ( $virhe [2], $virhe [1] );
		}
		$this->lkm = 1;
		// Palautetaan lisätyn ilmoituksen id
		return $this->db->lastInsertId ();
	}


}
?>
