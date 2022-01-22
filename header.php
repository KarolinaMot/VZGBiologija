<?php
	function FillHeader($conn){
		$result = SkyriuArray($conn);

		if(count($result)<=4){
			for($i=0; $i<count($result); $i++){
				echo '<div class="col" style=" margin-left:2%;"><a style="color: white;" href="skyriai.php?skyrius='.$result[$i].'">'.$result[$i].'</a></div>';
			}
		}
		else{
			for($i=0; $i<4; $i++){
				echo '<div class="col" style=" margin-left:2%;"><a style="color: white;" href="skyriai.php?skyrius='.$result[$i].'">'.$result[$i].'</a></div>';
			}
			echo '
				<div class="dropdown">
				  <a class="btn btn-dark headerBtn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #262626; font-size: 20px; padding:0px; border: 0px;">
					Kiti
				  </a>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: #41414f; color:white;">';
						
				  for($i=4; $i<count($result); $i++){
					echo '<a class="dropdown-item text-white bg-dark" href="skyriai.php?skyrius='.$result[$i].'">'.$result[$i].'</a>';
				  }
			echo '</div>
				</div>';
		}

		if(!isset($_SESSION['prisijunges']) || !$_SESSION['prisijunges']){
			echo '<div class="col" style=" margin-left:2%;"><a style="color: white;" href="prisijungti.php">Prisijungti</a></div>';
		}

		else if($_SESSION['prisijunges']){
			echo '<div class="col" style=" margin-left:2%;"><a style="color: white;" href="admin.php">Admin</a></div>';
		}
	}
?>


<html lang="lt">
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="Style.css">
		<link rel="icon" href="Images/icon.png">
		<meta charset="UTF-8">
		<title>Biologija</title>
	</head>

	<div class="header">
		<div class="container">
			<div class="row" style="margin-top:-15.8%; padding-top: 0.5%;" >
				<div class="col-1">
					<a href="pradzia.php">
						<img src="Images/icon.png" class="icon">
					</a>
				</div>
				<?php
					FillHeader($conn);
				?>
			</div>
		</div>
	</div>

	<div class="row head">
		<h1 class="nameStyle">VŽG BIOLOGIJA</h1>
	</div>
</html>
