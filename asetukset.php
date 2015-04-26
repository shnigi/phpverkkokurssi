<?php 
require_once("inc/top.php"); 

	if (isset ( $_POST ["nimi"] )) {
		$nimi = $_POST ["nimikentta"];
		setcookie("keksi" , $nimi);
	}
?>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Asetukset</h1>
   
   <h3>Nimi: </h3>
      <form role="form" method="post">
          <input class="form-control" name="nimikentta" value="">
		  <br>
		    <button type="submit" class="btn btn-success" name="nimi">Muuta nimeä</button>
      </form>
   
   
   
      </div>

 

<?php require_once("inc/footer.php"); ?>
