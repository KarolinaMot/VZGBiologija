<?php include_once "Coding/SkyriusCode.php"; ?>
<style>

</style>
<div class="wrap loginWrap" data-aos="fade-up"  data-aos-easing="ease-in-out"  data-aos-duration="500" data-aos-offset="10">
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
		</form>
	</div>
</div>
