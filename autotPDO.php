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
		$sql = "SELECT id, merkki, rekisterinumero, moottorintilavuus, valmistusvuosi, lisatietoja
		        FROM car";
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
		//	$auto->setId ( $row->id );

			// Laitetaan olio tulos taulukkoon (olio-taulukkoon)
			$tulos [] = $auto;
		}
		$this->lkm = $stmt->rowCount ();
		return $tulos;
	}
	public function haeIlmoitus($tyyppi) {
		$sql = "SELECT id, tyyppi, otsikko, kuvaus, hinta, nimi, email, puhnro, paikkakunta
		        FROM ilmoitus
				WHERE tyyppi = :tyyppi";
		// Valmistellaan lause, prepare on PDO-luokan metodeja
		if (! $stmt = $this->db->prepare ( $sql )) {
			$virhe = $this->db->errorInfo ();
			throw new PDOException ( $virhe [2], $virhe [1] );
		}
		// Sidotaan parametrit
		$stmt->bindValue ( ":tyyppi", $tyyppi, PDO::PARAM_INT );
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
			$ilmoitus = new Ilmoitus ();
			$ilmoitus->setId ( $row->id );
			$ilmoitus->setTyyppi ( utf8_encode ( $row->tyyppi ) );
			$ilmoitus->setOtsikko ( utf8_encode ( $row->otsikko ) );
			$ilmoitus->setKuvaus ( utf8_encode ( $row->kuvaus ) );
			$ilmoitus->setHinta ( $row->hinta );
			$ilmoitus->setNimi ( utf8_encode ( $row->nimi ) );
			$ilmoitus->setEmail ( utf8_encode ( $row->email ) );
			$ilmoitus->setPuhnro ( utf8_encode ( $row->puhnro ) );
			$ilmoitus->setPaikkakunta ( utf8_encode ( $row->paikkakunta ) );
			// Laitetaan olio tulos taulukkoon (olio-taulukkoon)
			$tulos [] = $ilmoitus;
		}
		$this->lkm = $stmt->rowCount ();
		return $tulos;
	}
	function lisaaIlmoitus($ilmoitus) {
		$sql = "insert into ilmoitus (otsikko, tyyppi, kuvaus, hinta, email, puhnro, paikkakunta, nimi)
		        values (:otsikko, :tyyppi, :kuvaus, :hinta, :email, :puhnro, :paikkakunta, :nimi)";
		// Valmistellaan SQL-lause
		if (! $stmt = $this->db->prepare ( $sql )) {
			$virhe = $this->db->errorInfo ();
			throw new PDOException ( $virhe [2], $virhe [1] );
		}
		// Parametrien sidonta
		$stmt->bindValue ( ":otsikko", utf8_decode ( $ilmoitus->getOtsikko () ), PDO::PARAM_STR );
		$stmt->bindValue ( ":tyyppi", utf8_decode ( $ilmoitus->getTyyppi () ), PDO::PARAM_STR );
		$stmt->bindValue ( ":kuvaus", utf8_decode ( $ilmoitus->getKuvaus () ), PDO::PARAM_INT );
		$stmt->bindValue ( ":hinta", $ilmoitus->getHinta (), PDO::PARAM_STR );
		$stmt->bindValue ( ":email", utf8_decode ( $ilmoitus->getEmail () ), PDO::PARAM_STR );
		$stmt->bindValue ( ":puhnro", utf8_decode ( $ilmoitus->getPuhnro () ), PDO::PARAM_STR );
		$stmt->bindValue ( ":paikkakunta", utf8_decode ( $ilmoitus->getPaikkakunta () ), PDO::PARAM_STR );
		$stmt->bindValue ( ":nimi", utf8_decode ( $ilmoitus->getNimi () ), PDO::PARAM_STR );
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