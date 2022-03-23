<?php include_once "Coding/SkyriusCode.php"; ?>
<style>

</style>
<div class="wrap loginWrap">
	<h3>Prisijunkite</h3>
	<div class="loginBoard">
		<form action="Coding/POST/prisijungimasPost.php" method="post" class="loginForm">
			<p>Slapyvardis:</p>
			<input type="text" name="userName" id="userName" class="loginInput">
			<p>Slaptazodis:</p>
			<input type="password" name="slaptazodis" id="slaptazodis" class="loginInput">
			<br><br>
			<button type="submit" id="login2" name="prisijungti">Prisijungti</button>
			<br><br>
			<a href="#">Neturite paskyros?</a>
		</form>
	</div>
</div>
