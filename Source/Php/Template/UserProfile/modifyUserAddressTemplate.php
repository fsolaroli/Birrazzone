<h1><?php echo $dbh->getUser($_SESSION["userId"])[0]["NomeUtente"]; ?></h1>
<?php $userAddress = $dbh->getAddress($dbh->getUser($_SESSION["userId"])[0]["IdIndirizzo"]); ?>

<section>
	<h2>Modifica indirizzo di fatturazione</h2>

	<form onsubmit="return false;">
		<?php if($userAddress == null): ?>
			<ul>
				<li class="label"><Label for="Via">Via:</Label></li>
				<li class="input"><input type="text" name="Via" id="Via" required /></li>

				<li class="label"><Label for="Citta">Città:</Label></li>
				<li class="input"><input type="text" name="Citta" id="Citta" required /></li>

				<li class="label"><Label for="Provincia">Provincia:</Label></li>
				<li class="input"><input type="text" name="Provincia" id="Provincia" required /></li>

				<li class="label"><Label for="CAP">CAP:</Label></li>
				<li class="input"><input type="text" name="CAP" id="CAP" required /></li>
			
				<li class="submit">
					<input type="submit" name="update" value="Aggiorna" />
					<input type="submit" name="undo" value="Annulla" />
				</li>			
			</ul>
			
		<?php endif; ?>


		<?php if($userAddress != null): ?>
			<ul>
				<li class="label"><Label for="Via">Via:</Label></li>
				<li class="input"><input type="text" name="Via" id="Via" value="<?php echo $userAddress[0]["Via"]; ?>" required /></li>

				<li class="label"><Label for="Citta">Città:</Label></li>
				<li class="input"><input type="text" name="Citta" id="Citta" value="<?php echo $userAddress[0]["Citta"]; ?>" required /></li>

				<li class="label"><Label for="Provincia">Provincia:</Label></li>
				<li class="input"><input type="text" name="Provincia" id="Provincia" value="<?php echo $userAddress[0]["Provincia"]; ?>" required /></li>

				<li class="label"><Label for="CAP">CAP:</Label></li>
				<li class="input"><input type="text" name="CAP" id="CAP" value="<?php echo $userAddress[0]["CAP"]; ?>" required /></li>
			
				<li class="submit">
					<input type="submit" name="update" value="Aggiorna" />
					<input type="submit" name="undo" value="Annulla" />
				</li>
			</ul>
			
		<?php endif; ?>
	</form>
	
	<div class="errors"><ul></ul></div>
</section>