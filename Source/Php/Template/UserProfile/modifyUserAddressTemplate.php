<h1><?php echo $dbh->getUser($_SESSION["userId"])[0]["NomeUtente"]; ?></h1>
<?php $userAddress = $dbh->getAddress($dbh->getUser($_SESSION["userId"])[0]["IdIndirizzo"]); ?>

<section>
	<h2>Modifica indirizzo di fatturazione</h2>

	<form onsubmit="return false;">
		<?php if($userAddress == null): ?>
			<ul>
				<li class="label"><Label for="address">Via:</Label></li>
				<li class="input"><input type="text" name="Via" required="true" /></li>

				<li class="label"><Label for="address">Città:</Label></li>
				<li class="input"><input type="text" name="Citta" required="true" /></li>

				<li class="label"><Label for="address">Provincia:</Label></li>
				<li class="input"><input type="text" name="Provincia" required="true" /></li>

				<li class="label"><Label for="address">CAP:</Label></li>
				<li class="input"><input type="text" name="CAP" required="true" /></li>
			
				<li class="submit"><input type="submit" name="undo" value="Annulla" /></li>
				<li class="submit"><input type="submit" name="update" value="Aggiungi" /></li>			
			</ul>
			
		<?php endif; ?>


		<?php if($userAddress != null): ?>
			<ul>
				<li class="label"><Label for="address">Via:</Label></li>
				<li class="input"><input type="text" name="Via" value="<?php echo $userAddress[0]["Via"]; ?>" required="true" /></li>

				<li class="label"><Label for="address">Città:</Label></li>
				<li class="input"><input type="text" name="Citta" value="<?php echo $userAddress[0]["Citta"]; ?>" required="true" /></li>

				<li class="label"><Label for="address">Provincia:</Label></li>
				<li class="input"><input type="text" name="Provincia" value="<?php echo $userAddress[0]["Provincia"]; ?>" required="true" /></li>

				<li class="label"><Label for="address">CAP:</Label></li>
				<li class="input"><input type="text" name="CAP" value="<?php echo $userAddress[0]["CAP"]; ?>" required="true" /></li>
			
				<li class="submit"><input type="submit" name="undo" value="Annulla" /></li>
				<li class="submit"><input type="submit" name="update" value="Aggiorna" /></li>
			</ul>
			
		<?php endif; ?>
	</form>
</section>
<div class="errors"></div>