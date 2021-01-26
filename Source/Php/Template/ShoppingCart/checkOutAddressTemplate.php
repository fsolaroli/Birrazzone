<h1>Indirizzo di Consegna</h1>

<section>
	<?php if(!empty($address)): ?>
	<form onsubmit="return false;">
		<ul>
			<li>Via: <?php echo $address["Via"];?></li>
			<li>Città: <?php echo $address["Citta"];?></li>
			<li>Provincia: <?php echo $address["Provincia"];?></li>
			<li>CAP: <?php echo $address["CAP"];?></li>
		</ul>
	</form>
	<p>Italia</p>
	<div class="errors"></div>
	<div>
		<button class="modify">Modifica Indirizzo</button>
   	</div>
	 <div>
		<div>
			<button class="back">Annulla</button>
		</div>
		<div>
			<button class="forward">Continua</button>
		</div>
	</div>
	<?php endif;?>
	<?php if(empty($address)): ?>
		<?php header("Location: ../../../Site/ShoppingCart/modifyCheckOutAddress.php"); ?>
	<?php endif;?>
</section>

