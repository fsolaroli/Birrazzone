<h1>Login</h1>

<?php if(isset($_GET["loginFromCart"])): ?>
	<p id="loginFromCart" hidden></p>
<?php endif; ?>
<?php if(isset($_GET["productId"]) && isset($_GET["quantity"])): ?>
	<p id="loginFromProductPage" hidden><?php echo $_GET["productId"];?> <?php echo $_GET["quantity"];?></p>
<?php endif; ?>


<section>
	<form onsubmit="return false;">
		<ul>
			<li class="label"><label for="email">Email</label></li>
			<li class="input"><input type="email" name="email" id="email" autocomplete="username" required /></li>

			<li class="label"><label for="pw">Password</label></li>
			<li class="input"><input type="password" name="pw" id="pw" autocomplete="current-password" required /></li>

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

