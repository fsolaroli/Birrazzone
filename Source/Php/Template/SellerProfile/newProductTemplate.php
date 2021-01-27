<?php
	require("sellerProfileTemplate.php");
?>
<section>
	<h2>Aggiungi dati birra</h2>
	<form onsubmit="return false;">
		<ul>
			<li class="label"><label for="name">Nome</label></li>
			<li class="input"><input type="text" id="name" name="name" maxlength="30" required autocomplete="off"/></li>
	
			<li class="label"><label for="type">Tipologia</label></li>
			<li class="input"><input type="text" id="type" name="type" maxlength="30" required autocomplete="off"/></li>
	
			<li class="label"><label for="image">Foto</label></li>
			<li class="photoInput">
				<img src="../../../../Immagini/Icone/Collapse.png" alt="" hidden/>
				<input type="file" id="image" name="image" accept=".jpeg, .jpg, .png"/>
			</li>
			<li><div class="imageErrors" hidden></div></li>
	
			<li class="label"><label for="price">Prezzo</label></li>
			<li class="input"><input type="number" id="price" name="price" max="9999.99" min="0.01" step="0.01" required autocomplete="off"/></li>
	
			<li class="label"><label for="format">Formato</label></li>
			<li class="input"><input type="number" id="format" name="format" max="16777215" min="1" required step="1" autocomplete="off"/></li>
	
			<li class="label"><label for="alcholic">Grado alcolico</label></li>
			<li class="input"><input type="number" id="alcholic" name="alcholic" required max="99.9" min="0.1" step="0.1" autocomplete="off"/></li>
	
			<li class="label"><label for="color">Colore</label></li>
			<li class="input"><input type="text" id="color" name="color" maxlength="30" required autocomplete="off"/></li>
	
			<li class="label"><label for="description">Descrizione</label></li>
			<li class="input"><textarea id="description" name="description" maxlength="300"></textarea></li>

			<li class="submit">
				<input type="submit" name="update" value="Crea"/>
				<input type="submit" name="cancel" value="Annulla"/>
			</li>
		</ul>	
	</form>
	
	<div class="errors"></div>
</section>
