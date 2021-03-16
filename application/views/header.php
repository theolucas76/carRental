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
    
        <div class="container-fluid min-vh-100">
            <!-- NAVBAR -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand navi" href="#">Thé'Auto</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon bg-white"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav ">
                            <li class="nav-item">
                                <a class="nav-link navi" aria-current="page" href="home">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navi" href="<?=base_url()?>voiture">Voitures</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link navi" href="<?=base_url()?>contact">Contact</a>
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
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            