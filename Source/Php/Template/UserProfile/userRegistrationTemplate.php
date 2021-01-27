<h1>Registrazione utente</h1>

<section>
	<form onsubmit="return false;">
		<ul>
			<li class="label"><Label for="name">Nome</Label></li>
			<li class="input"><input type="text" name="name" id="name" required /></li>

			<li class="label"><Label for="email">Email</Label></li>
			<li class="input"><input type="email" name="email" id="email" autocomplete="username" required /></li>

			<li class="label"><Label for="pw">Password</Label></li>
			<li class="input"><input type="password" name="pw" id="pw" autocomplete="new-password" required /></li>

			<li class="label"><Label for="confirmpw">Conferma password</Label></li>
			<li class="input"><input type="password" name="confirmpw" id="confirmpw" autocomplete="new-password" required /></li>

			<li class="label checkbox"><Label for="adultconfirmation">Confermo di essere maggiorenne</Label><input type="checkbox" name="adultconfirmation" id="adultconfirmation" value="confirm-adult-age" /></li>

			<li class="submit"><input type="submit" value="Registrati" /></li>
		</ul>
	</form>
	
	<div class="errors"><ul></ul></div>
</section>
