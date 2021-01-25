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

	<a href="modifyUserProfileData.php"><button class="modify">Modifica</button></a>
</section>

<section class="delete">
	<button id="deleteAccount" class="delete">Elimina account</button>
	<button id="deleteAccountConfermation" class="delete" hidden>Conferma eliminazione account</button>
</section>