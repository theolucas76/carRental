
<div class="container">
    <div class="row">
        <h2 class="title text-center m-5">Bienvenue chez Thé'Auto</h2>
        <h4 class="title text-center mb-5">Votre site de réservation de voiture en tout genre</h4>
        <div class="col-6">
            <img src="../../assets/img/accueil.jpg" alt="photo d'accueil" class="d-block img-fluid">
        </div>
        <div class="col-6 fontText">
            <h5>Location de voiture</h5>
            <p>Nous vous proposons des locations de voiture de différentes marques et modèles</p>
            <?php 
                foreach($cars as $car){
                    ?>
                        <p class="text-center"><?=$car->brand?></p>
                    <?php 
                }
            ?>
        </div>
    </div>
    <div class="row">

    </div>
</div>