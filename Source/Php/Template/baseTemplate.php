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
		<h1><a href="home.php">Birrazzone</a></h1>
		<?php if($templateParams["HeaderType"] == "Profile"): ?>
			<a href="home.php"><img src="<?php echo $imagePath?>Icone/Home.png" alt = "Home"/></a>
			<img src="<?php echo $imagePath?>Icone/Menu.png" alt = "Menu"/>
			<?php if(hasNotification()): ?>
				<img src="<?php echo $imagePath?>Icone/Notification.png" alt="Notification"/>
			<?php endif; ?>
		<?php endif; ?>

		<?php if($templateParams["HeaderType"] == "Login"): ?>
			<a href="home.php"><img src="<?php echo $imagePath?>Icone/Home.png" alt="Home"/></a>
		<?php endif; ?>

		<?php if($templateParams["HeaderType"] == "Global"): ?>
			<a href="
					<?php
					if(isUserLoggedIn()) {
						echo "userProfile.php";
					} else if(isSellerLoggedIn()) {
						echo "sellerProfile.php";
					} else {
						echo "login.php";
					}
					?>
			"><img src="<?php echo $imagePath?>Icone/User.png" alt="Home"/></a>
			<?php if(hasNotification()): ?>
				<img src="<?php echo $imagePath?>Icone/Notification.png" alt="Notification"/>
			<?php endif; ?>
			<?php if(isSellerLoggedIn()): ?>
				<a href="shoppingCart.php"><img src="<?php echo $imagePath?>Icone/ShoppingCart.png" alt="Shopping Cart"></a>
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
	<aside></aside>
	<footer>
		<p>Progetto Tecnologie Web - A.A. 2020/21</p>
		<p>Riccardo Rambaldi - Matteo Romagnoli - Fabio Solaroli</p>
	</footer>
</body>
</html>