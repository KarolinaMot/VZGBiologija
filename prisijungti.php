<?php 
	include_once "header.php";
?>
 <link rel="stylesheet" href="style.css">

<div class="container">
	<h3 class="centerFont">Prisijungti</h3>
	<div class="row center" >
		<form action="Coding/POST/prisijungimasPost.php" method="post">
			<div class="roundedCorners darkGrayBckgrnd">
				<div class="form-group">
					<label for="userName">Pavadinimas</label>
					<input type="text" class="form-control" id="userName" name="userName" placeholder="Įveskite slapyvardį">
					<label for="slaptazodis" style="margin-top: 5%">Slaptažodis</label>
					<input type="password" class="form-control" id="slaptazodis" name="slaptazodis" placeholder="Įveskite slapyvardį">
					<button class="btn btn-primary margintop" type="submit" name="prisijungti" style="width: 100%; margin-top: 10%;">Prisijungti</button>
				</div>
			</div>
		</form>
	</div>
</div>

<?php 
	include_once "footer.php";
?>