<?php include_once "Coding/SkyriusCode.php"; ?>
<html>
	<header>
		<body>
			<div class="parallax">
				<?php include_once "header.php";?>
				<div class="container-fluid blackBckgrnd" height="100%" width="100%" style="padding-bottom:15%;">
					<div class="container">
						<h3 class="centerFont">Prisijungti</h3>
						<div class="row" style=" margin-left: 39%;" >
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
				</div>
			</div>
		</body>
	</header>
</html>