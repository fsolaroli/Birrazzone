<?php
	require("sellerProfileTemplate.php");
?>

<h2>Aggiungi dati birra</h2>
<form onsubmit="return false;">
	<input type="hidden" name="productId" value="<?php echo $_GET["productId"] ?>">
	<ul>
		<li><label for="name">Nome</label></li>
		<li><input type="text" name="name" required="true" autocomplete="off"/></li>

		<li><label for="type">Tipologia</label></li>
		<li><input type="text" name="type" required="true" autocomplete="off"/></li>

		<li><label for="image">Foto</label></li>
		<li>
			<img src="" alt="" width="300px"/>
			<input type="file" name="image" accept=".jpeg, .jpg, .png" multiple="false"/>
		</li>
		<li><div class="imageErrors"></div></li>

		<li><label for="price">Prezzo</label></li>
		<li><input type="number" name="price" required="true" autocomplete="off"/></li>

		<li><label for="format">Formato</label></li>
		<li><input type="number" name="format" required="true" step="0.1" autocomplete="off"/></li>

		<li><label for="alcholic">Grado alcolico</label></li>
		<li><input type="number" name="alcholic" required="true" step="0.1" autocomplete="off"/></li>

		<li><label for="color">Colore</label></li>
		<li><input type="text" name="color" required="true" autocomplete="off"/></li>

		<li><label for="description">Descrizione</label></li>
		<li><input type="text" name="description" required="true" autocomplete="off"/></li>

		<li><input type="submit" name="update" value="Crea"/></li>
	</ul>	
</form>
<a href="sellerProducts.php"><button>Annulla</button></a>
<div class="errori"></div>
