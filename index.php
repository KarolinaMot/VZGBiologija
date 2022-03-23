<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<html>
    <head>
		<link rel="stylesheet" href="style2.css">
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
        <nav id="sidebar">
            <div class="logo">
            <a href="index.php"><i class="icon-logo"></i></a><span class="logoTitle">Skyriai</span>
            </div>            
           <button id="btn" onclick="MenuButton()"><img src="Images/Nav/menu.png"></button>
           <ul class="navlist">
               <li><a href="index.php?skyrius=lastele&puslapis=skyrius"><i class="icon-cell"></i><span class="listElement">Ląstelė</span></a></li>
               <li><a href="index.php?skyrius=paveldejimas&puslapis=skyrius"><i class="icon-dna"></i><span class="listElement">Paveldėjimas</span></a></li>
               <li><a href="index.php?skyrius=apykaita&puslapis=skyrius"><i class="icon-metabolism"></i><span class="listElement">Medžiagų apykaita</span></a></li>
               <li><a href="index.php?skyrius=sveikata&puslapis=skyrius"><i class="icon-health"></i><span class="listElement">Sveikata</span></a></li>
               <li><a href="index.php?skyrius=homeostaze&puslapis=skyrius"><i class="icon-homeostasis"></i><span class="listElement">Homeostazė</span></a></li>
               <li><a href="index.php?skyrius=evoliucija&puslapis=skyrius"><i class="icon-evolution"></i><span class="listElement">Evoliucija</span></a></li>
               <li><a href="index.php?skyrius=ekologija&puslapis=skyrius"><i class="icon-ecology"></i><span class="listElement">Ekologija</span></a></li>
            </ul>
            <div class="account">
                <?php 
                if(!isset($_SESSION['prisijunges']) || $_SESSION['prisijunges']==false){
                    echo '<a href="index.php?puslapis=prisijungti"><button id="login"><i class="icon-user"></i><span>Prisijungti</span></button></a>';
                }
                else{
                   echo '<a href="index.php?puslapis=admin"><button id="admin"><i class="icon-user"></i><span>Administravimas</span></button></a>';
                }
                ?>
            </div>

        </nav>
        <article>
            <header>
				<h1>VŽG<br> BIOLOGIJA</h1>
			</header>
			<div class="headerFade"></div>
                <div class="mainBackground">	
                <?php  
                    if(isset($_GET['puslapis'])){
                        switch($_GET['puslapis']){
                            case "skyrius":
                                include "skyriai.php";
                                break;
                            case 'klases':
                                include "klases.php";
                                break;
                            case 'prisijungti':
                                include "prisijungti.php";
                                break;
                            case 'admin':
                                include "admin.php";
                                break;
                            default:
                            include "pradzia.php";
                            break;
                        }
                    }
                    else{
                        include "pradzia.php";
                    }
                ?>
                </div>
			</div>
            
        </article>
    </body>
</html>