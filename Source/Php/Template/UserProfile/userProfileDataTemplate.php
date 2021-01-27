<h1><?php echo $dbh->getUser($_SESSION["userId"])[0]["NomeUtente"]; ?></h1>

<section>
	<h2>Dati personali</h2>

	<ul>
		<li>
			<p>Nome:</p>
			<p><?php echo $dbh->getUser($_SESSION["userId"])[0]["NomeUtente"]; ?></p>
		</li>

		<li>
			<p>Email:</p>
			<p><?php echo $dbh->getUser($_SESSION["userId"])[0]["EmailUtente"]; ?></p>
		</li>
	</ul>

	<button class="modify">Modifica</button>
</section>

<section class="delete">
	<button id="deleteAccountConfermation" class="delete" hidden>Conferma eliminazione account</button>
	<button id="deleteAccount" class="delete">Elimina account</button>
</section>