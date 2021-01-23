<h1><?php echo $dbh->getUser($_SESSION["userId"])[0]["NomeUtente"]; ?></h1>

<section>
	<h2>Dati personali</h2>

	<ul>
		<li class="label"><Label for="name">Nome</Label></li>
		<li><?php echo $dbh->getUser($_SESSION["userId"])[0]["NomeUtente"]; ?></li>

		<li class="label"><Label for="email">Email</Label></li>
		<li><?php echo $dbh->getUser($_SESSION["userId"])[0]["EmailUtente"]; ?></li>
	</ul>

	<a href="modifyUserProfileData.php"><button class="modify">Modifica</button></a>
</section>

<section>
	<button id="deleteAccount" class="delete">Elimina account</button>
	<button id="deleteAccountConfermation" class="delete" hidden>Conferma eliminazione account</button>
</section>