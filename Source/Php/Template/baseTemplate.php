<?php
	$imagePath = "../../../Immagini/";
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $templateParams["Titolo"]; ?></title>
    <link rel="stylesheet" type="text/css" href="../../CSS/style.css" />
	<?php
	if(isset($templateParams["Javascript"])):
		foreach ($templateParams["Javascript"] as $script):
	?>
		<script src= "../../Javascript/<?php echo $script; ?>"></script>
	<?php
		endforeach;
	endif;
	?>
</head>
<body>
	<header>
		<a href="home.php">Birrazzone</a>

		<?php if($templateParams["HeaderType"] == "Profile"): ?>
			<img src="<?php echo $imagePath?>Icone/Home.png" alt = "Home"/>
			<img src="<?php echo $imagePath?>Icone/Menu.png" alt = "Menu"/>
		<?php endif; ?>

		<?php if($templateParams["HeaderType"] == "Login"): ?>
			<img src="<?php echo $imagePath?>Icone/Home.png" alt="Home"/>
		<?php endif; ?>

		<?php if($templateParams["HeaderType"] == "Global"): ?>
			<img src="<?php echo $imagePath?>Icone/User.png" alt="Home"/>
			<?php if(!isUserLoggedIn() || $_SESSION["UserType"] == "Buyer"): ?>
				<img src="<?php echo $imagePath?>Icone/ShoppingCart.png" alt="Shopping Cart"/>
			<?php endif; ?>
			<form action="search.php" method="POST">
				<label>Search:<input type="text" name="search" /></label>
				<input type="image" src="<?php echo $imagePath?>Icone/Search.png" alt="Search" />		
			</form>
		<?php endif; ?>	
	</header>
	<main>
	<?php
	if(isset($templateParams["Template"])) {
		require($templateParams["Template"]);
	}
	?>
	</main>
	<footer>
		<p> Progetto Tecnologie Web - A.A. 2020/21 Riccardo Rambaldi - Matteo Romagnoli - Fabio Solaroli </p>
	</footer>
</body>
</html>