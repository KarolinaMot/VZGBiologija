<?php
include_once "Coding/SkyriusCode.php";
include_once "header.php";
?>
 <link rel="stylesheet" href="style.css">
	<div class="container">
		<h3>Paskyros administravimas:</h3><br>
		<div class="roundedCorners adminBackground">
			<div class="row">

				<div class="col-4 "> 
					<div class="roundedCorners darkGrayBckgrnd" style="margin-top: 40%;">
						<form action="Coding/POST/atsijungtiPost.php" method="post">
							<button class="btn btn-primary" type="submit" name="atsijungtiBtn" style="width: 100%;">Atsijungti</button>
						</form>
					</div>
				</div>

				<div class="col-1">
					<div class="vl"></div>
				</div>

				<div class="col-7">
					<h4>Keisti slaptažodį:</h4><br>
					<div class="roundedCorners darkGrayBckgrnd">
						<form action="Coding/POST/keistiSlaptazodiPost.php" method="post">
							<p><b>Jūsų slapyvardis:</b><?php echo " ".$_SESSION['slapyvardis']?></p>
							<label for="slaptazodis">Naujas slaptažodis: </label>
							<input type="password" class="form-control" id="slaptazodis" name="slaptazodis" placeholder="Įveskite naują slaptažodį">
							<label for="kartotiSlaptazodi">Pakartokite slaptažodį: </label>
							<input type="password" class="form-control" id="kartotiSlaptazodi" name="kartotiSlaptazodi" placeholder="Įveskite naują slaptažodį">
							<button class="btn btn-primary margintop" type="submit" name="keistiSlaptazodi" style="width: 100%;">Keisti slaptažodį</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<br><br>
		<h3>Konspektų administravimas:</h3><br>
		<div class="roundedCorners adminBackground">
			<div class="row">
				<div class="col-4 "> 
						<h4>Kurti naują skyrelį: </h4>
						<div class="roundedCorners darkGrayBckgrnd">
							<form action="Coding/POST/addSkyriusPost.php" method="post">
								<label for="addSkyriausPavad">Pavadinimas</label>
								<input type="text" class="form-control" id="addSkyriausPavad" name="addSkyriausPavad" placeholder="Įveskite pavadinimą">
								<button class="btn btn-primary margintop" type="submit" name="skyrius" style="width: 100%;">Kurti</button>
							</form>
						</div>
						<br>
						<h4>Trinti skyrelį: </h4>
						<div class="roundedCorners darkGrayBckgrnd">
							<form action="Coding/POST/deleteSkyriusPost.php" method="post">
								<label for="removeSkyriusName">Pavadinimas</label><br>
								<select name="removeSkyriusName" id="removeSkyriusName" style="font-size: 18px;">
									<?php
										FillOptions($conn);
									?>
								</select>
								<button class="btn btn-primary margintop" type="submit" name="deleteSkyrius" style="width: 100%;">Trinti</button>
							</form>
						</div>
				</div>

				<div class="col-1">
					<div class="vl"></div>
				</div>

				<div class="col-7">
					<h4>Kurtį postą:</h4>
					<div class="roundedCorners darkGrayBckgrnd">
						<form action="Coding/POST/addArticlePost.php" method="post" enctype="multipart/form-data">
							<label for="postPavadinimas">Pavadinimas</label>
							<input type="text" class="form-control" id="postPavadinimas" name="postPavadinimas" placeholder="Įveskite pavadinimą">
							<div class="row">
								<div class="col-6">
									<label for="skyrius" class="margintop">Pasirinkite skyrių</label><br>
									<select name="skyrius" id="skyrius" style="font-size: 18px;">
										<?php
										FillOptions($conn);
										?>
									</select>
								</div>
								<div class="col-6">
									<label for="klase" class="margintop">Pasirinkite klasę</label><br>
									<select name="klase" id="klase" style="font-size: 18px;">
										<option value="Pirmokams">Pirmokams</option>
										<option value="Antrokams">Antrokams</option>
										<option value="Trečiokams">Trečiokams</option>
										<option value="Ketvirtokams">Ketvirtokams</option>
									</select>
								</div>
							</div>
							<label for="uploadedFile" class="form-label margintop">Įkelkite .pdf failą</label>
							<input type="file" id="uploadedFile" name="uploadedFile" class=" background-color: ##262626;">
							<button class="btn btn-primary margintop" type="submit" name="postas" style="width: 100%;">Kurti</button>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include_once "footer.php"; ?>