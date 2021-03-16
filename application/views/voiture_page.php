<div class="row text-center fontText" style="color: white">
    <h3 class="title">Voitures</h3>
    <button type="button" class="btnGradient my-5" onclick="searchCar2()">Rechercher</button>

    <div id="manu" class="manu text-center">
        <table class="table fontText text-white mx-auto">
            <tr>
                <th>Marque</th>
                <th>Modele</th>
                <th>Couleur</th>
                <th>Carburant</th>
                <th>kms</th>
                <th>Réserver</th>
            </tr>
            <?php

            foreach ($available as $avai) {
            ?>
                <tr>
                    <td><?= $avai->brand ?></td>
                    <td><?= $avai->model ?></td>
                    <td><?= $avai->color ?></td>
                    <td><?= $avai->fuel ?></td>
                    <td><?= $avai->kms ?></td>
                    <td>
                        <button type="button" <?php if(!isset($this->session->mail)){ echo 'disabled onclick="alert()"';}else{echo '';}?> class="btnGradient" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $avai->matriculation ?>">Réserver</button>
                    </td>
                </tr>
                <div class="modal fade" id="staticBackdrop<?= $avai->matriculation ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content ">
                            <div class="modal-header foot">
                                <h5 class="modal-title" id="staticBackdropLabel"><?= $avai->brand ?>, <?= $avai->model ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body backG text-white text-start">
                                <p>Marque : <?= $avai->brand ?></p>
                                <p>Modèle : <?= $avai->model ?></p>
                                <p>Couleur : <?= $avai->color ?></p>
                                <p>Carburant : <?= $avai->fuel ?></p>
                                <p>Kilomètres : <?= $avai->kms ?></p>
                                <p>Prix/Jour : <?= $avai->dayprice ?></p>
                                <form action="createResa" method="post">
                                    <label for="start">Date début</label>
                                    <input class="btnGradient" type="date" name="date_debut" id="start"><br>
                                    <label for="end">Date fin</label>
                                    <input type="date" class="btnGradient" name="date_fin" id="end"><br>
                                    <select class="btnGradient" name="id_service">
                                        <option selected disabled>Choisir un service</option>
                                        <?php
                                        foreach ($services as $serv) {
                                        ?>
                                            <option value="<?= $serv->id ?>"><?= $serv->type ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <?php
                                    foreach ($cars as $car) {

                                        if ($avai->matriculation == $car->matriculation) {
                                    ?>

                                            <input type="hidden" name="id_voiture" value="<?= $car->id ?>">
                                    <?php
                                        }
                                    }
                                    ?>
                                    <input type="hidden" name="id_client" value="<?= $this->session->id ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btnGradient" data-bs-dismiss="modal">Non</button>

                                <input type="submit" class="btnGradient" name="newResa" value="Valider">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </table>
    </div>
    <div id="searchCar2" class="admin">
        <form action="createResa" method="post">
            <select name="matriculation" class="btnGradient">
                <option value="null" selected>Choisir matriculation</option>
                <?php
                foreach ($carss as $car) {
                ?>
                    <option value="<?= $car->matriculation ?>"><?= $car->matriculation ?></option>
                <?php
                }
                ?>
            </select>
            <select name="transmission" class="btnGradient">
                <option value="null" selected>Choisir transmission</option>
                <option value="auto">automatique</option>
                <option value="manuelle">manuelle</option>
            </select>
            <select name="id_couleur" class="btnGradient">
                <option value="null" selected>Choisir couleur</option>
                <?php
                foreach ($colors as $color) {
                ?>
                    <option value="<?= $color->id ?>"><?= $color->color ?></option>
                <?php
                }
                ?>
            </select>
            <select name="id_marque" class="btnGradient">
                <option value="null" selected>Choisir marque</option>
                <?php
                foreach ($brands as $brand) {
                ?>
                    <option value="<?= $brand->id ?>"><?= $brand->brand ?></option>
                <?php
                }
                ?>
            </select>
            <select name="id_modele" class="btnGradient">
                <option value="null" selected>Choisir modele</option>
                <?php
                foreach ($models as $model) {
                ?>
                    <option value="<?= $model->id ?>"><?= $model->model ?></option>
                <?php
                }
                ?>
            </select>
            <select name="id_carburant" class="btnGradient">
                <option value="null" selected>Choisir carburant</option>
                <?php
                foreach ($fuels as $fuel) {
                ?>
                    <option value="<?= $fuel->id ?>"><?= $fuel->fuel ?></option>
                <?php
                }
                ?>
            </select>
            <input type="submit" class="btnGradient" name="searchCar">

        </form>
        <?php
        if (!empty($searchCars)) {
        ?>
            <table class="mx-auto mt-5">
                <tr>
                    <th>Matriculation</th>
                    <th>Kms</th>
                    <th>Transmission</th>
                    <th>Prix/Jour</th>
                    <th>Couleur</th>
                    <th>Marque</th>
                    <th>Modele</th>
                    <th>Carburant</th>
                    <th>Réserver</th>
                </tr>

                <?php
                foreach ($searchCars as $car) {
                ?>
                    <tr>
                        <td><?= $car->matriculation ?></td>
                        <td><?= $car->kms ?></td>
                        <td><?= $car->transmission ?></td>
                        <td><?= $car->dayprice ?></td>
                        <td>
                            <?php
                            foreach ($colors as $color) {
                                if ($color->id == $car->id_couleur) {
                                    echo $color->color;
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            foreach ($brands as $brand) {
                                if ($brand->id == $car->id_marque) {
                                    echo $brand->brand;
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            foreach ($models as $model) {
                                if ($model->id == $car->id_modele) {
                                    echo $model->model;
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            foreach ($fuels as $fuel) {
                                if ($fuel->id == $car->id_carburant) {
                                    echo $fuel->fuel;
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <button type="button" class="btnGradient" data-bs-toggle="modal" data-bs-target="#staticBackdro<?= $avai->matriculation ?>">Réserver</button>
                        </td>
                    </tr>
                    <div class="modal fade" id="staticBackdro<?= $avai->matriculation ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content ">
                                <div class="modal-header foot">
                                    <h5 class="modal-title" id="staticBackdropLabel"><?= $avai->brand ?>, <?= $avai->model ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body backG text-white text-start">
                                    <p>Marque : <?= $avai->brand ?></p>
                                    <p>Modèle : <?= $avai->model ?></p>
                                    <p>Couleur : <?= $avai->color ?></p>
                                    <p>Carburant : <?= $avai->fuel ?></p>
                                    <p>Kilomètres : <?= $avai->kms ?></p>
                                    <p>Prix/Jour : <?= $avai->dayprice ?></p>
                                    <form action="createResa" method="post">
                                        <label for="start">Date début</label>
                                        <input class="btnGradient" type="date" name="date_debut" id="start"><br>
                                        <label for="end">Date fin</label>
                                        <input type="date" class="btnGradient" name="date_fin" id="end"><br>
                                        <select class="btnGradient" name="id_service">
                                            <option selected disabled>Choisir un service</option>
                                            <?php
                                            foreach ($services as $serv) {
                                            ?>
                                                <option value="<?= $serv->id ?>"><?= $serv->type ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <?php
                                        foreach ($cars as $car) {

                                            if ($avai->matriculation == $car->matriculation) {
                                        ?>

                                                <input type="hidden" name="id_voiture" value="<?= $car->id ?>">
                                        <?php
                                            }
                                        }
                                        ?>
                                        <input type="hidden" name="id_client" value="<?= $this->session->id ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btnGradient" data-bs-dismiss="modal">Non</button>

                                    <input type="submit" class="btnGradient" name="newResa" value="Valider">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </table>
        <?php
        }
        ?>
    </div>
</div>