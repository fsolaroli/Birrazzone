<header>
	<h1>Amministratore</h1>
</header>
<section>
	<h2>Dati Account</h2>
	<ul>
		<li>
			Ragione Sociale: <?php $templateParams["birrificio"]["nomebirrificio"] ?>
		</li>
		<li>
			Email: <?php $templateParams["birrificio"]["emailbirrificio"]?>
		</li>
		<li>
			P.IVA: <?php $templateParams["birrificio"]["partitaiva"]?>
		</li>
	</ul>
</section>
<section>
	<h2>Dati Account</h2>
	<ul>
		<li>
			Località: <?php $templateParams["birrificio"]["localita"]?>
		</li>
		<li>
			<?php $templateParams["birrificio"]["fotobirrificio"]?>
		</li>
		<li>
			<?php $templateParams["birrificio"]["descrizionebirrificio"]?>
		</li>
	</ul>
</section>
<section>
	<h2>Prodotti</h2>
	<ul class="scroll">
	</ul>
</section>
<section>
	<button>
		<a href="">Elimina Birrificio</a>
	</button>
</section>