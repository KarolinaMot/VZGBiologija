<?php
	include_once "Coding/PostasCode.php";
	$pavadinimas = $_GET['article'];
?>
<link rel="stylesheet" href="style.css">

<html lang="lt">
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">

		<?php include "style.php" ?>
		<link rel="icon" href="Images/icon.png">
		<meta charset="UTF-8">
		<title>Biologija</title>
	</head>
	<body>
		<?php include "nav.php" ?>
		<header>
			<div class="row headerRow">
			<h1>VŽG BIOLOGIJA</h1>
			</div>
		<header>
		<div>
			
				<div class="container-fluid blackBckgrnd" height="5000px" width="100%">
					<div class="container" >
						<div class="row">
							<div class="col-12">	
									<h2 style="text-align: center; margin-top: -2%"><?php echo $pavadinimas;?></h2><br><br>
									<iframe id="pdf-js-viewer" src="PdfViewer/web/viewer.html?file=Uploads/<?php echo $pavadinimas;?>.pdf" title="webviewer" frameborder="0" width="100%" height="800px"></iframe>
							</div>
						</div>
					</div>
				</div>
		</div>
		<footer>
			<div class="container-fluid darkGrayBckgrnd">
				<br><br>
				<p>Karolina Motužyte 2022</p>
			</div>
		</footer>
	</body>
</html>
