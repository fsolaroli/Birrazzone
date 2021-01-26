<h1>Pagamento</h1>

<section>
	<form onsubmit="return false;">
			<ul>
				<li class="label"><Label for="payment">Nome titolare carta</Label></li>
				<li class="input"><input type="text" name="Nome" required="true"/></li>

				<li class="label"><Label for="payment">Numero carta</Label></li>
				<li class="input"><input type="text" name="Numero" required="true"/></li>

				<li class="label"><Label for="payment">Data di scadenza</Label></li>
				<li class="combobox">
					<select name="mese" >
						<?php for($i = 1; $i <= 12; $i++): ?>
						<option value="<?php echo $i ?>"><?php echo $i ?></option>
						<?php endfor; ?>
					</select>
					<select name="anno" >
						<?php for($i = 2021; $i <= 2050; $i++): ?>
						<option value="<?php echo $i ?>"><?php echo $i ?></option>
						<?php endfor; ?>
					</select>
				</li>
				<li class="label"><Label for="payment">CVV</Label></li>
				<li class="input"><input type="text" name="CVV" required="true"/></li>

				<li class="submit">
					<input type="submit" name="forward" value="Continua" />
					<input type="submit" name="undo" value="Annulla" />
				</li>			
			</ul>
	</form>
	
	<div class="errors"></div>
</section>