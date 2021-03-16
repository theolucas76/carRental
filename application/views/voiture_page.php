<div class="row text-center fontText" style="color: white">
    <h3 class="title">Voitures</h3>
   
    <div class="manu text-center">
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
            
                foreach($available as $avai){  
                    ?>
                        <tr>
                            <td><?=$avai->brand?></td>
                            <td><?=$avai->model?></td>
                            <td><?=$avai->color?></td>
                            <td><?=$avai->fuel?></td>
                            <td><?=$avai->kms?></td>
                            <td>
                                <button type="button" class="btnGradient" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$avai->matriculation?>">Réserver</button>
                            </td>
                        </tr>
                        <div class="modal fade" id="staticBackdrop<?=$avai->matriculation?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content ">
                                    <div class="modal-header foot">
                                        <h5 class="modal-title" id="staticBackdropLabel"><?=$avai->brand?>, <?=$avai->model?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body backG text-white text-start">
                                        <p>Marque : <?=$avai->brand?></p>
                                        <p>Modèle : <?=$avai->model?></p>
                                        <p>Couleur : <?=$avai->color?></p>
                                        <p>Carburant : <?=$avai->fuel?></p>
                                        <p>Kilomètres : <?=$avai->kms?></p>
                                        <p>Prix/Jour : <?=$avai->dayprice?></p>
                                        <form action="createResa" method="post">
                                            <label for="start">Date début</label>
                                            <input class="btnGradient" type="date" name="date_debut" id="start"><br>
                                            <label for="end">Date fin</label>
                                            <input type="date" class="btnGradient" name="date_fin" id="end"><br>
                                            <select class="btnGradient" name="id_service">
                                                <option selected disabled >Choisir un service</option>
                                                <?php 
                                                    foreach($services as $serv){
                                                        ?>
                                                            <option value="<?=$serv->id?>"><?=$serv->type?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                            <?php 
                                                foreach($cars as $car){
                                                    
                                                    if($avai->matriculation == $car->matriculation){
                                                        ?>
                                                        
                                                        <input type="hidden" name="id_voiture" value="<?=$car->id?>">
                                                        <?php
                                                    }
                                                }
                                            ?>
                                            <input type="hidden" name="id_client" value="<?=$this->session->id?>">
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
</div>