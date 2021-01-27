<?php $userInfo=$dbh->getUser($_SESSION["userId"]); ?>
<h1><?php echo $userInfo[0]["NomeUtente"]; ?></h1>

<section>
	<h2>Modifica dati personali</h2>

	<form onsubmit="return false;">
		<ul>
			<li class="label"><Label for="name">Nome</Label></li>
			<li class="input"><input type="text" name="name" id="name" value="<?php echo $userInfo[0]["NomeUtente"]; ?>" required /></li>

			<li class="label"><Label for="email">Email</Label></li>
			<li class="input"><input type="email" name="email" id="email" value="<?php echo $userInfo[0]["EmailUtente"]; ?>" autocomplete="username" required /></li>

			<li class="submit">
				<input type="submit" name="updateData" value="Aggiorna" />
				<input type="submit" name="undo" value="Annulla" />
			</li>
		</ul>
	</form>
	
	<div class="errors"><ul></ul></div>
</section>

<section>
	<h2>Modifica password</h2>
	<form onsubmit="return false;">
		<ul>
			<li class="label"><label for="pw">Password:</label></li>
			<li class="input"><input type="password" id="pw" name="pw" autocomplete="new-password" required/></li>
	
			<li class="label"><label for="confirmpw">Conferma Password:</label></li>
			<li class="input"><input type="password" id="confirmpw" name="confirmpw" autocomplete="new-password" reduired/></li>

			<li class="submit">	
				<input type="submit" name="updatePassword" value="Aggiorna"/>
			</li>	
		</ul>
	</form>

	<div class="errors"><ul></ul></div>
</section>