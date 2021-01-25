<h1>Login</h1>

<section>
	<form onsubmit="return false;">
		<ul>
			<li class="label"><label for="email">Email</label></li>
			<li class="input"><input type="email" name="email" autocomplete="username" required="true" /></li>

			<li class="label"><label for="pw">Password</label></li>
			<li class="input"><input type="password" name="pw" autocomplete="current-password" required="true" /></li>

			<li class="submit"><input type="submit" value="Accedi" /></li>
		</ul>
	</form>
	
	<div class="errors"></div>
	
	<div class="registration">
		<p>Non sei ancora registrato?</p>
		<a href="../UserProfile/userRegistration.php">Registrati</a>
	</div>
	
	<div class="registration">
		<p>Vuoi registrare il tuo birrificio?</p>
		<a href="../SellerProfile/sellerRegistration.php">Invia la richiesta</a>
	</div>

</section>

