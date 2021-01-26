<?php 

if(isset($_GET["id"])){
	$idbirra = $_GET["id"];
} else {
	header("Location: ../Home/home.php"); //404
}

if(isset($_GET["quantity"])) {
	$defaultQuantity = $_GET["quantity"];
} else {
	$defaultQuantity = 1;
}

$birra = $dbh->getBeer($idbirra)[0];

$birrificio = $dbh->getSeller($birra["IdBirrificio"])[0];
$quantitaBirra = $dbh->getBeerQuantity($birra["IdBirra"]);
?>
<h1><?php echo $birra["NomeBirra"];?></h1>
<section>
	<ul>
		<li id="productId" hidden><?php echo $birra["IdBirra"]; ?></li>
		<li><?php echo $birra["Tipologia"];?></li>
		<li><img class="beerPhoto" src="<?php echo UPLOAD_DIR."Birre/".$birra["FotoBirra"] ?>" alt="FotoBirra"/></li>
	</ul>
</section>
<section>
	<section>
		<ul>
			<li><a href="../SellerPage/sellerPage.php?sellerId=<?php echo $birrificio["IdBirrificio"]?>"><?php echo $birrificio["NomeBirrificio"] ?></a></li>
			<li><?php echo $birra["Prezzo"];?>€ cad.</li>
			<li><span>Formato: </span><span><?php echo $birra["Formato"];?></span></li>
			<li><span>Grado Alcolico: </span><span><?php echo $birra["GradoAlcolico"];?></span></li>
			<li><span>Colore: </span><span><?php echo $birra["Colore"];?></span></li>
			<li><span>Descrizione: </span><span><?php echo $birra["DescrizioneBirra"];?></span></li>
		</ul>
	</section>
	<section class="addToCart">
		<?php if(!isSellerLoggedIn()) :?>
			<?php if($quantitaBirra == 0): ?>
				<p><strong>Non Disponibile<strong></p>
			<?php endif; ?>
			<?php if($quantitaBirra > 0): ?>
				<form onsubmit="return false;">
					<label for="quantity" class="hidden">Quantità</label>
					<input name="quantity" type="number" min="0" max="<?php echo $quantitaBirra;?>" value="<?php echo $defaultQuantity;?>"></input>
					<?php if(isUserLoggedIn()) : ?>
						<input type="submit" name="add" value="Aggiungi al carrello"/>
					<?php endif; ?>
					<?php if(!isUserLoggedIn()) : ?>
						<input type="submit" name="toLogin" value="Aggiungi al carrello"/>
					<?php endif; ?>			
				</form>
				<div class = "errors"></div>
			<?php endif; ?>
		<?php endif; ?>
	</section>
</section>
