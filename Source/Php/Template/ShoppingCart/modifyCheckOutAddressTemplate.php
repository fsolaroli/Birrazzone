<h1>Indirizzo di consegna</h1>

<section>
	<form onsubmit="return false;">
			<ul>
				<li class="label"><Label for="address">Via:</Label></li>
				<li class="input"><input type="text" name="Via" required="true"/></li>

				<li class="label"><Label for="address">Città:</Label></li>
				<li class="input"><input type="text" name="Citta" required="true"/></li>

				<li class="label"><Label for="address">Provincia:</Label></li>
				<li class="input"><input type="text" name="Provincia" required="true"/></li>

				<li class="label"><Label for="address">CAP:</Label></li>
				<li class="input"><input type="text" name="CAP" required="true"/></li>

				<li class="label checkbox"><Label for="address">Salva l'indirizzo per i prossimi acquisti</Label><input type="checkbox" name="checkbox" value="save" /></li>

				<li class="submit">
					<input type="submit" name="forward" value="Continua" />
					<input type="submit" name="undo" value="Annulla" />
				</li>			
			</ul>
	</form>
	
	<div class="errors"></div>
</section>