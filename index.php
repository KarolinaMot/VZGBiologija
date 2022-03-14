<html lang="lt">
	<head>
	<link rel="stylesheet" href="style.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
		<link rel="icon" href="Images/icon.png">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Biologija</title>

		<script>
			alert(menuButton.id);
			let menuButton = document.getElementById("btn");
			let sideBar = document.getElementById("sidebar");
	
			function MenuButton(){
				sidebar.classList.toggle("active");
			}
		</script>
	
</head>

	<body>

		<div id="sidebar">
			<div class="logoContent">
				<div class="logo">
					<i class="icon icon-logo"></i>
					<div class="logoName">SKYRIAI</div>
				</div>
				<button id="btn" onclick="MenuButton()"><img src="Images/Nav/menu.png"></button>
			</div>

			<ul class="navList list-unstyled">
				<li class="link">
					<a href="index.php?psl=lastele"><i class="icon-cell"></i><span class="linkName">Ląstelė</span></a>
					<!--<span class="tooltip">Dashboard</span>-->
				</li>
				<li class="link">
					<a href="index.php?psl=paveldejimas"><i class="icon-dna"></i><span class="linkName">Paveldėjimas</span></a>
					<!--<span class="tooltip">Dashboard</span>-->
				</li>
				<li class="link">
					<a href="index.php?psl=apykaita"><i class="icon-metabolism"></i><span class="linkName">Medžiagų apykaita</span></a>
					<!--<span class="tooltip">Dashboard</span>-->
				</li>
				<li class="link">
					<a href="index.php?psl=sveikata"><i class="icon-health"></i><span class="linkName">Sveikata</span></a>
					<!--<span class="tooltip">Dashboard</span>-->
				</li>
				<li class="link">
					<a href="index.php?psl=homeostaze"><i class="icon-homeostasis"></i><span class="linkName">Homeostazė</span></a>
					<!--<span class="tooltip">Dashboard</span>-->
				</li>
				<li class="link">
					<a href="index.php?psl=evoliucija"><i class="icon-evolution"></i><span class="linkName">Evoliucija</span></a>
					<!--<span class="tooltip">Dashboard</span>-->
				</li>
				<li class="link">
					<a href="index.php?psl=ekologija"><i class="icon-ecology"></i><span class="linkName">Ekologija</span></a>
					<!--<span class="tooltip">Dashboard</span>-->
				</li>
			</ul>
			<div class="profileContent">
				<?php ?>
				<button id="login"><span class="buttonName">Prisijungti</span></button>
				<i class="icon-user"></i>
			</div>
		</div>

		<article>
	
		</article>
	</body>
</html>
