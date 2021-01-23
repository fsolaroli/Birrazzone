<?php
	require("sellerProfileTemplate.php");
?>
<section>
	<h2>Aggiungi dati birra</h2>
	<form onsubmit="return false;">
		<input type="hidden" name="productId" value="<?php echo $_GET["productId"] ?>">
		<ul>
			<li class="label"><label for="name">Nome</label></li>
			<li class="input"><input type="text" name="name" required="true" autocomplete="off"/></li>
	
			<li class="label"><label for="type">Tipologia</label></li>
			<li class="input"><input type="text" name="type" required="true" autocomplete="off"/></li>
	
			<li class="label"><label for="image">Foto</label></li>
			<li class="photoInput">
				<img src="" alt="" width="300px"/>
				<input type="file" name="image" accept=".jpeg, .jpg, .png" multiple="false"/>
			</li>
			<li><div class="imageErrors" hidden></div></li>
	
			<li class="label"><label for="price">Prezzo</label></li>
			<li class="input"><input type="number" name="price" required="true" autocomplete="off"/></li>
	
			<li class="label"><label for="format">Formato</label></li>
			<li class="input"><input type="number" name="format" required="true" step="0.1" autocomplete="off"/></li>
	
			<li class="label"><label for="alcholic">Grado alcolico</label></li>
			<li class="input"><input type="number" name="alcholic" required="true" step="0.1" autocomplete="off"/></li>
	
			<li class="label"><label for="color">Colore</label></li>
			<li class="input"><input type="text" name="color" required="true" autocomplete="off"/></li>
	
			<li class="label"><label for="description">Descrizione</label></li>
			<li class="input"><input type="text" name="description" required="true" autocomplete="off"/></li>
	
			<li class="submit">
				<input type="submit" name="update" value="Crea"/>
				<input type="submit" name="cancel" value="Annulla"/>
			</li>
		</ul>	
	</form>
</section>
<div class="errors"></div>
