<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link href="../assets/css/style.css" rel="stylesheet">
        <meta charset="utf-8">
        <title>Thé'Auto</title>
    </head>
    <body>
        <div class="container-fluid">
            <!-- NAVBAR -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand navi" href="#">Thé'Auto</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav ">
                            <li class="nav-item">
                                <a class="nav-link active navi" aria-current="page" href="#">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navi" href="#">Voitures</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navi" href="#">Services</a>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="btn navi" data-bs-toggle="modal" data-bs-target="#connexion">Connexion</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- MODAL CONNEXION -->
            <div class="modal fade" id="connexion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="connexionLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content connexion">
                        <div class="modal-header">
                            <h5 class="modal-title title" id="connexionLabel">Connexion</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body modelBody">
                            <label for="email">Adresse email</label><br>
                            <input type="email" id="email" name="email" class="inputCo" required><br>
                            <label for="pwd">Mot de passe</label><br>
                            <input type="password" name="pwd" id="pwd" class="inputCo" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btnGradient text-left" data-bs-dismiss="modal">Inscription</button>
                            <button type="button" class="btn btnGradient">Valider</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</html>