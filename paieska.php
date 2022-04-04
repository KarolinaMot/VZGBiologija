<div class="wrap" data-aos="fade-up"  data-aos-easing="ease-in-out">
    <h2>Rezultatas</h2>
    <div class="skyriusBoard">
        <?php
        include_once "Coding/PostasCode.php";
        if (isset($_POST['search'])){
            if($_POST['searchBar']!=null){
                FillKonspektusBySearch($conn, SearchByName($conn, $_POST['searchBar']));
            }
            else{
                echo "<p style='font-family: 'Nunito', sans-serif; font-size:25px;'>Nieko nerasta</p>";
            }
        }
        ?>
    </div>

</div>