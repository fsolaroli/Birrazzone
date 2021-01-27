<?php
	$imagePath = "../../../../Immagini/";
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $templateParams["Titolo"]; ?></title>
	<link rel="stylesheet" type="text/css" href="../../../CSS/style.css" />
	<script src="../../../Javascript/jquery-3.4.1.min.js"></script>
	<script src="../../../Javascript/baseScript.js"></script>
	<script src="../../../Javascript/utilsScript.js"></script>
	<?php
	if(isset($templateParams["Javascript"])):
		foreach ($templateParams["Javascript"] as $script):
	?>
		<script src= "../../../Javascript/<?php echo $script; ?>"></script>
	<?php
		endforeach;
	endif;
	?>
</head>
<body>
	<header>
		<div class="icons">
			<h1><a href="../Home/home.php">Birrazzone</a></h1>
			<?php if($templateParams["HeaderType"] == "Profile"): ?>
				<a class="home" href="../Home/home.php"><img src="<?php echo $imagePath?>Icone/Home.png" alt = "Home"/></a>
				<a class="menu" href="javascript:void(0);"><img src="<?php echo $imagePath?>Icone/Menu.png" alt = "Menu"/></a>
				<?php if(hasNotification()): ?>
					<img id="<?php echo $templateParams["HeaderType"]; ?>" src="<?php echo $imagePath?>Icone/Notification.png" alt="Notification"/>
				<?php endif; ?>
			<?php endif; ?>
			
			<?php if($templateParams["HeaderType"] == "Admin"): ?>
				<a class="home" href="../Home/home.php"><img src="<?php echo $imagePath?>Icone/Home.png" alt = "Home"/></a>
				<a class="menu" href="javascript:void(0);"><img src="<?php echo $imagePath?>Icone/Menu.png" alt = "Menu"/></a>
				<?php if(hasRequest()): ?>
					<img id="<?php echo $templateParams["HeaderType"]; ?>" src="<?php echo $imagePath?>Icone/Notification.png" alt="Notification"/>
				<?php endif; ?>
			<?php endif; ?>

			<?php if($templateParams["HeaderType"] == "Login"): ?>
				<a class="home" href="../Home/home.php"><img src="<?php echo $imagePath?>Icone/Home.png" alt="Home"/></a>
				<a class="menu hidden"><img src="<?php echo $imagePath?>Icone/Menu.png" alt = "Menu"/></a>
			<?php endif; ?>

			<?php if($templateParams["HeaderType"] == "Global"): ?>
				<a class="profile" href="
					<?php
						if(isUserLoggedIn()) {
							echo "../UserProfile/userNotifications.php";
						} else if(isSellerLoggedIn()) {
							echo "../SellerProfile/sellerNotifications.php";
						} else {
							echo "../Login/login.php";
						}
					?>
				"><img src="<?php echo $imagePath?>Icone/User.png" alt="Home"/></a>
				<a class="shoppingCart<?php if(isSellerLoggedIn()){ echo " hidden";} ?>" href="../ShoppingCart/userShoppingCart.php"><img src="<?php echo $imagePath?>Icone/ShoppingCart.png" alt="Shopping Cart"></a>
				<?php if(hasNotification()): ?>
					<img id="<?php echo $templateParams["HeaderType"]; ?>" src="<?php echo $imagePath?>Icone/Notification.png" alt="Notification"/>
				<?php endif; ?>
			<?php endif; ?>	
		</div>
		<?php if($templateParams["HeaderType"] == "Global"): ?>
			<div class="search">
				<form action="../Search/search.php" method="POST">
					<label for="search" class="hidden">Search:</label>
					<input type="search" placeholder="Ricerca" name="search" id="search"/>
					<label for="image" class="hidden">Search</label>
					<input type="image" src="<?php echo $imagePath?>Icone/Search.png" id="image" alt="Search" />		
				</form>
			</div>
		<?php endif; ?>
	</header>
	<aside hidden></aside>
	<div class="scroll">
		<main>
			<?php
			if(isset($templateParams["Template"])) {
				require($templateParams["Template"]);
			}
			?>
		</main>
	</div>
	<footer>
		<p>Progetto Tecnologie Web - A.A. 2020/21</p><p> -- </p>
		<p>Riccardo Rambaldi - Matteo Romagnoli - Fabio Solaroli</p>
	</footer>
</body>
</html>