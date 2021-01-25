<?php
	require("sellerProfileTemplate.php");
?>
<section>
	<h2>Aggiungi dati birra</h2>
	<form onsubmit="return false;">
		<input type="hidden" name="productId" value="<?php echo $_GET["productId"] ?>">
		<ul>
			<li class="label"><label for="name">Nome</label></li>
			<li class="input"><input type="text" name="name" maxlength="30" required="true" autocomplete="off"/></li>
	
			<li class="label"><label for="type">Tipologia</label></li>
			<li class="input"><input type="text" name="type" maxlength="30" required="true" autocomplete="off"/></li>
	
			<li class="label"><label for="image">Foto</label></li>
			<li class="photoInput">
				<img src="" alt="" width="300px"/>
				<input type="file" name="image" accept=".jpeg, .jpg, .png" multiple="false"/>
			</li>
			<li><div class="imageErrors" hidden></div></li>
	
			<li class="label"><label for="price">Prezzo</label></li>
			<li class="input"><input type="number" name="price" max="9999.99" min="0.01" step="0.50" required="true" autocomplete="off"/></li>
	
			<li class="label"><label for="format">Formato</label></li>
			<li class="input"><input type="number" name="format" max="16777215" min="1" required="true" step="1" autocomplete="off"/></li>
	
			<li class="label"><label for="alcholic">Grado alcolico</label></li>
			<li class="input"><input type="number" name="alcholic" required="true" max="99.9" min="0.1" step="0.1" autocomplete="off"/></li>
	
			<li class="label"><label for="color">Colore</label></li>
			<li class="input"><input type="text" name="color" maxlength="30" required="true" autocomplete="off"/></li>
	
			<li class="label"><label for="description">Descrizione</label></li>
			<li class="input"><textarea name="description" maxlength="300"></textarea></li>

			<li class="submit">
				<input type="submit" name="update" value="Crea"/>
				<input type="submit" name="cancel" value="Annulla"/>
			</li>
		</ul>	
	</form>
	
	<div class="errors"></div>
</section>
