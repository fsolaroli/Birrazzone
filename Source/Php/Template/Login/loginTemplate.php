<h1>Login</h1>

<section>
	<form onsubmit="return false;">
		<ul>
			<li class="label"><label for="email">Email:</label></li>
			<li class="input"><input type="email" name="email" required="true" /></li>

			<li class="label"><label for="pw">Password:</label></li>
			<li class="input"><input type="password" name="pw" required="true" /></li>

			<li class="submit"><input type="submit" value="Accedi" /></li>
		</ul>
	</form>
</section>

<section>
	<ul>
		<li>Non sei ancora registrato?</li>
		<li><a href="../UserProfile/userRegistration.php">Registrati</a></li>

		<li>Vuoi registrare il tuo birrificio?</li>
		<li><a href="../SellerProfile/sellerRegistration.php">Invia la richiesta</a></li>
	</ul>
</section>
<div class="error"></div>