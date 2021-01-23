<h1>Login</h1>
	<form action="#" method="POST">
		<section>
		<?php if(isset($templateParams["errorelogin"])): ?>
		<p><?php echo $templateParams["errorelogin"];?></p>
		<?php endif; ?>
		<ul>
			<li><label for="username">Username</label> </li>
			<li><input type="text" name="username" required="true" /> </li>
			<li><label for="pw">Password</label></li>
			<li><input type="password" name="pw" required="true" /> </li>
			<li>
				<input type="submit" value="Accedi" />
			</li>
		</ul>
	</section>
</form>