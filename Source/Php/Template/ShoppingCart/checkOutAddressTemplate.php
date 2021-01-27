<h1>Indirizzo di Consegna</h1>

<section class="address">
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
	<div class="errors"><ul></ul></div>
	<div class="modifyaddress">
		<button class="modify">Modifica Indirizzo</button>
   	</div>
	 <div class="backnforward">
		<button class="back">Annulla</button>
		<button class="forward">Continua</button>
	</div>
	<?php endif;?>
	<?php if(empty($address)): ?>
		<?php header("Location: modifyCheckOutAddress.php"); ?>
	<?php endif;?>
</section>

