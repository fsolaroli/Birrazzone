<h1>Indirizzo di consegna</h1>

<section class="modifyaddress">
	<p id="get" hidden><?php if(isset($_GET["id"])){ echo $_GET["id"];}?></p>
	<form onsubmit="return false;">
			<ul>
				<li class="label"><Label for="Via">Via:</Label></li>
				<li class="input"><input type="text" name="Via" id="Via" required/></li>
				
				<li class="label"><Label for="Citta">Città:</Label></li>
				<li class="input"><input type="text" name="Citta" id="Citta" required/></li>

				<li class="label"><Label for="Provincia">Provincia:</Label></li>
				<li class="input"><input type="text" name="Provincia" id="Provincia" required/></li>
				
				<li class="label"><Label for="CAP">CAP:</Label></li>
				<li class="input"><input type="text" name="CAP" id="CAP" required/></li>

				<li class="checkbox"><Label for="Salva">Salva l'indirizzo per i prossimi acquisti</Label><input type="checkbox" name="checkbox" id="Salva" value="save" /></li>

				<li class="submit">
					<input type="submit" name="forward" value="Continua" />
					<input type="submit" name="undo" value="Annulla" />
				</li>			
			</ul>
	</form>
	
	<div class="errors"></div>
</section>