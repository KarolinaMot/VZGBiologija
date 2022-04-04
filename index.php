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
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
		<title >Biologija</title>
    </head>
    <body>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <nav id="sidebar">
            <div class="logo">
            <a href="index.php"><i class="icon-logo"></i></a><span class="logoTitle">Skyriai</span>
            </div>            
           <button id="btn" onclick="MenuButton()"><img src="Images/Nav/menu.png"></button>
           <ul class="navlist">
               <li id="searchLi"><form action="index.php?puslapis=paieska" method="post" class="searchForm" ><button type="submit" name="search" id="sidebarSearchBtn"><i class="icon-search" id="searchIcon"></i></button><span class="listElement"><input type="text" name="searchBar" id="searchSidebar"></span></form></li><br>
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
        <script>
			alert(menuButton.id);
			let menuButton = document.getElementById("btn");
			let sideBar = document.getElementById("sidebar");
            let searchButton = document.getElementById("sidebarSearchBtn");
            
			function MenuButton(){
				sidebar.classList.toggle("active");
			}
		</script>
        <article>
            <header>
				<h1 data-aos="fade-up"  data-aos-easing="ease-in-out"  data-aos-duration="500" data-aos-offset="10">VŽG<br> BIOLOGIJA</h1>
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
                            case 'article':
                                include "article.php";
                                break;
                            case 'paieska':
                                include "paieska.php";
                                break;                            default:
                            include "pradzia.php";
                            break;
                        }
                    }
                    else{
                        include "pradzia.php";
                    }
                ?>
			</div>
            <footer> 
                <small><b>Kontaktai:</b></small><br>
                <small>Email: karolina.motuzyte02@gmail.com</small><br><br><br><br>
                <small>&copy; Copyright 2022, Karolina Motužytė. All Rights Reserved.</small> 
            </footer> 

        </article>

    </body>
</html>