<h1>Registrazione birrificio</h1>

<form action="" method="POST">

<?php if(!isset($templateParams["complete"])): ?>
	<ul>
		<li><label>Ragione sociale:<input type="text" name="ragioneSociale" required="true"/></label></li>
		<li><label>Email:<input type="text" name="email" required="true"/></label></li>
		<li><label>Partita IVA:<input type="text" name="IVA" required="true"/></label></li>
		<li><input type="submit" value="Invia la richiesta"/></li>
	</ul>
	<?php if(isset($templateParams["errors"])): foreach ($templateParams["errors"] as $error): ?>
		<p><strong class="error"><?php echo $error ?></strong></p>
	<?php endforeach; endif; ?>
<?php endif; ?>

<?php if(isset($templateParams["complete"])): ?>
	<h2>Registrazione Completata</h2>
	<input type="submit" value="OK" formaction="home.php"/>
<?php endif; ?>

</form>