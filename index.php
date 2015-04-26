<?php require_once("inc/top.php"); ?>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Autorekisteri!</h1>
        <p class="lead">Tällä sovelluksella voit näppärästi ylläpitää tietoja autoista.</p>
        <p><a class="btn btn-lg btn-success" href="lisaa.php" role="button">Kokeile</a></p>
		
		<?php
			//Tutkitaan onko koneella keksiä = cookies
			if(isset($_COOKIE["keksi"])){
			$nimi = $_COOKIE["keksi"];
			
				print("<p style=''>Nimesi on: <b>" . $nimi . "</b>, nimi on tallennettu keksiin.</p>");
			}else {
			print("<p style=''>Keksiä ei ole asetettu, ole hyvä ja aseta se asetukset sivulta.</p>");
			}
			?>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-4">
          <h2>Autojen lisääminen</h2>
          <p>Autojen lisääminen onnistuu helposti, sillä virheiden varalta olen ohjelmoinut sovelluksen tarkistamaan käyttäjän syötteen.</p>
       
        </div>
        <div class="col-lg-4">
          <h2>Listaaminen</h2>
          <p>Autot listataan suoraan tietokannasta, jolloin tietoja ei menetetä, vaikka ohjelma suljettaisiin.</p>
     
       </div>
        <div class="col-lg-4">
          <h2>PHP kurssin työ</h2>
          <p>Tämä on PHP verkkokurssin työ. Sovellus on toteutettu PHP, Bootstrap yhdistelmällä. Sivusto on täysin responsiivinen.</p>
     
        </div>
      </div>

<?php require_once("inc/footer.php"); ?>
