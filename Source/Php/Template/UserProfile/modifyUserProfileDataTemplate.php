<?php $userInfo=$dbh->getUser($_SESSION["userId"]); ?>
<h1><?php echo $userInfo[0]["NomeUtente"]; ?></h1>

<section>
	<h2>Modifica dati personali</h2>

	<form onsubmit="return false;">
		<ul>
			<li class="label"><Label for="name">Nome</Label></li>
			<li class="input"><input type="text" name="name" value="<?php echo $userInfo[0]["NomeUtente"]; ?>" required="true" /></li>

			<li class="label"><Label for="email">Email</Label></li>
			<li class="input"><input type="email" name="email" value="<?php echo $userInfo[0]["EmailUtente"]; ?>" autocomplete="new-username" required="true" /></li>

			<li class="label"><Label for="pw">Password</Label></li>
			<li class="input"><input type="password" name="pw" value="<?php echo $userInfo[0]["PasswordUtente"]; ?>" autocomplete="new-password" required="true" /></li>

			<li class="label"><Label for="confirmpw">Conferma password</Label></li>
			<li class="input"><input type="password" name="confirmpw" value="<?php echo $userInfo[0]["PasswordUtente"]; ?>" autocomplete="new-password-confirmation" required="true" /></li>

			<li class="submit">
				<input type="submit" name="update" value="Aggiorna" />
				<input type="submit" name="undo" value="Annulla" />
			</li>
		</ul>
	</form>
</section>
<div class="errors"></div>