	<style>
		#filterBtn:hover{
		background-color: whitesmoke !important;
		color: black !important;
		}
	</style>
	
	<script>
		//document.location.reload(true);
		function Filter(){
			let filterBoard = document.getElementById("filterBoard");
			filterBoard.classList.toggle("active");
		}
	</script>
	
	<?php include_once "Coding/SkyriusCode.php";
		  include_once "Coding/PostasCode.php";
		  if(!$_SESSION['prisijunges'] || !isset($_SESSION['prisijunges'] )){
			echo "<script type='text/javascript'>alert('Esate neprisijungę');  location='../../index.php';</script>";
		  }
	?>
	
	<div class="wrap adminWrap">
		<h3>Paskyros administravimas:</h3><br>
		<div class="adminBoard">
			<div class="adminBoard2"> 
				<form action="Coding/POST/atsijungtiPost.php" method="post">
					<button id="logout" type="submit" name="atsijungtiBtn" style="width: 100%;">Atsijungti</button>
				</form>
			</div>
			<div class="adminBoard2">
				<h4 style="font-size: 25px; text-align: left; margin-top:-65px; margin-left:-20px; font-family: 'Nunito', sans-serif;" > Keisti slaptažodį:</h4>
				<p><b>Jūsų slapyvardis:</b><?php echo " ".$_SESSION['slapyvardis']?></p>

					<form action="Coding/POST/keistiSlaptazodiPost.php" method="post" class="accountForm">
						<p>Naujas slaptažodis: </p>
						<input type="password" class="form-control" id="slaptazodis" name="slaptazodis" placeholder="Įveskite naują slaptažodį">
						<p>Pakartokite slaptažodį:</p>
						<input type="password" class="form-control" id="kartotiSlaptazodi" name="kartotiSlaptazodi" placeholder="Įveskite naują slaptažodį">
						<br>
						<button id="keisti" type="submit" name="keistiSlaptazodi" style="width: 100%;">Keisti slaptažodį</button>
					</form>
			</div>
		</div>
	</div>
	<br><br>
	<div class="wrap adminWrap">
		<h3 >Konspektų administravimas:</h3><br>
		<div class="adminBoard konspektaiAdmin">
			<div class="adminBoard2 konspektaiAdmin2 kurtiPosta">
				<h4 style="font-size: 25px; text-align: left; margin-top:-65px; margin-left:-20px; font-family: 'Nunito', sans-serif;">Kurtį postą:</h4>
				<form action="Coding/POST/addArticlePost.php" method="post" enctype="multipart/form-data" class="kurtiForm">
					<p for="postPavadinimas">Pavadinimas</p>
					<input type="text" class="form-control" id="postPavadinimas" name="postPavadinimas" placeholder="Įveskite pavadinimą">
					<div class="selects">
						<div class="select" style="margin-left: -4px;" >
							<p for="postPavadinimas">Skyrius</p>
							<select style="margin-top: -7px;" name="skyrius" id="skyriusDrop"> 
								<?php FillOptions($conn, "skyriai");?>
							</select>
						</div>
						<div class="select">
							<p for="postPavadinimas">Klasė</p>
							<select style="margin-top: -7px;" name="klase" id="klaseDrop">
								<?php FillOptions($conn, "klases");?>
							</select>
						</div>
					</div>
					<p for="postPavadinimas" style="width: 100%; margin-top: 20px;">Pdf Failas</p>
					<input type="file" id="uploadedFile" name="uploadedFile" >
					<br>
					<button id="kurti" type="submit" name="postas" style="width: 100%; margin-top: 20px;">Kurti</button>
				</form>
			</div>
			<div class="adminBoard2 konspektaiAdmin2">
				<h4 style="font-size: 25px; text-align: left; margin-top:-65px; margin-left:-20px; font-family: 'Nunito', sans-serif;">Visi postai:</h4>
				<form action="index.php?puslapis=admin" method="post" class="searchForm">
					<div class="searchBar" style="margin-left: 145px;">
						<input type="text" placeholder="Ieškoti..." name="searchBar">
						<button type="submit" name="search"><i class="icon-search"></i></button>
					</div>
				</form>
				<div id="filterBoard">
						<button id="filter" onclick="Filter()"><i class="icon-filter"></i><span>Filtruoti</span></button>
						<form action="index.php?puslapis=admin" method="post" class="filterForm">
							<div class="select" style="margin-left: -0.5px;" >
								<p for="postPavadinimas">Skyrius</p>
								<select name="skyrius"> 
									<option value="---">---</option>
									<?php FillOptions($conn, "skyriai");?>
								</select>
							</div>
							<div class="select" style="margin-left: -5px;">
								<p for="postPavadinimas">Klasė</p>
								<select name="klase">
									<option value="---">---</option>
									<?php FillOptions($conn, "klases");?>
								</select>
							</div>
							<button type="submit" name="filter" id="filterBtn" style="border-radius: 25px; background-color: #202124; border: 1px whitesmoke solid; color: whitesmoke; padding-left: 8px; padding-right: 8px; padding-top: 6px; padding-bottom: 5px; margin-top: 2px; transition: all 0.3s ease;"><i class="icon-filter"></i><span style="margin-left: 5px">Filtruoti</span></button>

						</form>
				</div>
				
				<hr>
				<table class="postaiTable">
					<?php 
						if (isset($_POST['search']))	{
							FillTable($conn, SearchByName($conn, $_POST['searchBar']));
							unset($_POST['filter']);
						}
						else if (isset($_POST['filter'])){
							FillTable($conn, SearchByFilter($conn, $_POST['skyrius'], $_POST['klase']));
							unset($_POST['search']);
						}
						else
							FillTable($conn, SearchAll($conn));			
					?>
				</table>
			</div>
		</div>
	</div>

