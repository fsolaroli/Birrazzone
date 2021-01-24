<h1><?php echo $dbh->getUser($_SESSION["userId"])[0]["NomeUtente"]; ?></h1>
<?php $userAddress = $dbh->getAddress($dbh->getUser($_SESSION["userId"])[0]["IdIndirizzo"]); ?>

<section>
	<h2>Indirizzo di fatturazione</h2>

	<?php if($userAddress == null): ?>
		<p>Non hai ancora inserito un indirizzo.</p>
		<a href="modifyUserAddress.php"><button class="modify">Aggiungi un indirizzo</button></a>
	<?php endif; ?>

	<?php if($userAddress != null): ?>
		<ul>
			<li class="label"><Label for="address">Via:</Label></li>
			<li><?php echo $userAddress[0]["Via"]; ?></li>

			<li class="label"><Label for="address">Città:</Label></li>
			<li><?php echo $userAddress[0]["Citta"]; ?></li>

			<li class="label"><Label for="address">Provincia:</Label></li>
			<li><?php echo $userAddress[0]["Provincia"]; ?></li>

			<li class="label"><Label for="address">CAP:</Label></li>
			<li><?php echo $userAddress[0]["CAP"]; ?></li>
		</ul>

		<a href="modifyUserAddress.php"><button class="modify">Modifica</button></a>
		
	<?php endif; ?>
</section>

<?php if($userAddress != null): ?>
	<section>
		<button id="deleteAddress" class="delete">Elimina indirizzo</button>
		<button id="deleteAddressConfermation" class="delete" hidden>Conferma eliminazione indirizzo</button>
	</section>
<?php endif; ?>