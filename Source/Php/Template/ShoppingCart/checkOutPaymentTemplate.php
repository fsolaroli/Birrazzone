<h1>Pagamento</h1>

<section>
	<form onsubmit="return false;">
			<ul>
				<li class="label"><Label for="Nome">Nome titolare carta</Label></li>
				<li class="input"><input type="text" name="Nome" id="Nome" required/></li>

				<li class="label"><Label for="Numero">Numero carta</Label></li>
				<li class="input"><input type="text" name="Numero" id="Numero" required/></li>

				<li class="label"><Label for="ScadenzaMese">Data di scadenza</Label></li>
				<li class="label hidden"><Label for="ScadenzaAnno">Data di scadenza</Label></li>
				<li class="combobox">
					<select name="mese" id="ScadenzaMese">
						<?php for($i = 1; $i <= 12; $i++): ?>
						<option value="<?php echo $i ?>"><?php echo $i ?></option>
						<?php endfor; ?>
					</select>
					<select name="anno" id="ScadenzaAnno">
						<?php for($i = 2021; $i <= 2050; $i++): ?>
						<option value="<?php echo $i ?>"><?php echo $i ?></option>
						<?php endfor; ?>
					</select>
				</li>
				<li class="label"><Label for="CVV">CVV</Label></li>
				<li class="input"><input type="text" name="CVV" id="CVV" required/></li>

				<li class="submit">
					<input type="submit" name="forward" value="Continua" />
					<input type="submit" name="undo" value="Annulla" />
				</li>			
			</ul>
	</form>
	
	<div class="errors"><ul></ul></div>
</section>