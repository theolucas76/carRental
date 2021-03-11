<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link href="../../assets/css/style.css?rnb=132" rel="stylesheet">
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
                                <a class="nav-link active navi" aria-current="page" href="home">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navi" href="<?=base_url()?>voiture">Voitures</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navi" href="#">Services</a>
                            </li>
                            <li class="nav-item">
                                <?php 
                                    if(!isset($this->session->mail)){
                                        ?>
                                        <a class="nav-link navi" href="<?= base_url()?>profilUser">Connexion</a>
                                        <?php
                                    }else{
                                        ?>
                                        <a class="nav-link navi" href="
                                        <?php if($this->session->userType == null){echo base_url().'profilUser';}else{echo base_url().'admin';}?>
                                        ">Profil</a>
                                        <?php
                                    }
                                ?>
                                <!--<button type="button" class="btn navi" data-bs-toggle="modal" data-bs-target="#connexion">Connexion</button>-->
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- MODAL CONNEXION 
            <div class="modal fade" id="connexion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="0" 
            aria-labelledby="connexionLabel" aria-hidden="false">
                <div class="modal-dialog">
                    <div class="modal-content connexion">
                        <div class="modal-header">
                            <h5 class="modal-title title" id="connexionLabel">Connexion</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body modelBody">
                            <form action="<?=base_url()?>userValidation" method="post">
                                <label for="mail">Adresse email</label><br>
                                <input type="email" id="mail" name="mail" class="inputCo" value="<?=set_value("mail")?>"><br>
                                <span class="text-danger"><?php echo form_error("mail")?></span>
                                <label for="password">Mot de passe</label><br>
                                <input type="password" name="password" id="password" class="inputCo" value="<?=set_value("password")?>">
                                <span class="text-danger"><?php echo form_error("password")?></span>
                        </div>
                        <div class="modal-footer">
                            <a href="<?=base_url()?>inscription"><button type="button" class="btn btnGradient text-left">Inscription</button></a>
                            <button type="submit" class="btn btnGradient" onclick="">Valider</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            -->
            