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
			<li>
				<p>Via:</p>
				<p><?php echo $userAddress[0]["Via"]; ?></p>
			</li>

			<li>
				<p>Città:</p>
				<p><?php echo $userAddress[0]["Citta"]; ?></p>
			</li>

			<li>
				<p>Provincia:</p>
				<p><?php echo $userAddress[0]["Provincia"]; ?></p>
			</li>

			<li>
				<p>CAP:</p>
				<p><?php echo $userAddress[0]["CAP"]; ?></p>
			</li>
		</ul>

		<a href="modifyUserAddress.php"><button class="modify">Modifica</button></a>
		
	<?php endif; ?>
</section>

<?php if($userAddress != null): ?>
	<section class="delete">
		<button id="deleteAddressConfermation" class="delete" hidden>Conferma eliminazione indirizzo</button>
		<button id="deleteAddress" class="delete">Elimina indirizzo</button>
	</section>
<?php endif; ?>