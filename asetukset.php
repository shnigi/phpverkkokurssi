<?php 
require_once("inc/top.php"); 

	if (isset ( $_POST ["nimi"] )) {
		$nimi = $_POST ["nimikentta"];
		setcookie("keksi" , $nimi, time()+60*60*24*7);
		header ( "location: index.php" );
	}
?>

      <div class="jumbotron">
        <h1>Asetukset</h1>
   
   <h3>Aseta nimi: </h3>
      <form role="form" method="post">
          <input class="form-control" name="nimikentta" value="<?php 
			if(isset($_COOKIE["keksi"])){
			$nimi = $_COOKIE["keksi"];
				print($nimi);
			}		  
		  ?>">
		  <br>
		    <button type="submit" class="btn btn-success" name="nimi">Muuta nimeä</button>
      </form>

   <h3>Tarkista nimesi sovelluksen etusivulta.</h3>
   
      </div>

 

<?php require_once("inc/footer.php"); ?>
