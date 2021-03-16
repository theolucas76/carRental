<button type="button" onclick="showClient()">Client</button>
<button type="button" onclick="showCar()">Voiture</button>
<button type="button" onclick="showResa()">Réservation</button>
<form action="<?=base_url()?>logOut" method="post">
    <input type="submit" name="logOutAdmin" value="Déconnexion">
</form>
<!-- CLIENT -->
<div class="fontText">
<div class="text-white admin" id="client">
    <form action="inscription" method="post">
        <input type="submit" value="Créer nouveau client" name="newClient">
    </form>
    <button type="button" onclick="allClient()">Afficher tout les clients</button>
    <button type="button" onclick="searchClient()">Rechercher</button>

    <div class="admin" id="allClient">
    
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>email</th>
                    <th>adresse</th>
                    <th>ville</th>
                    <th>code postal</th>
                    <th>modifier</th>
                    <th>supprimer</th>
                </tr>
            </thead>
            <tbody>

            <?php 
                foreach($clicli as $client){
                    $id = $client->id;
                    ?>
                    
                    <tr>
                        <td scope="row"><?=$client->lastname?></td>
                        <td><?=$client->firstname?></td>
                        <td><?=$client->mail?></td>
                        <td><?=$client->address?></td>
                        <td><?=$client->city?></td>
                        <td><?=$client->zipCode?></td>
                        <td><button type="button" onclick="updateCli(<?=$id?>)">Modifier</button></td>
                        <td>
                            <form action="deleteClient" method="post">
                                <input type="submit" name="deleteClient" value ="Supprimer">
                                <input type="hidden" name="hid_idClient" value="<?=$id?>">
                            </form>
                        </td>
                    </tr>

                    <tr id="updateCli<?=$id?>" class="update">
                        <form action="updateAdmin" method="post">
                            <td scope="row"><input type="text" name="lastname" id="lastname" value="<?=$client->lastname?>"></td>
                            <td><input type="text" name="firstname" id="firstname" value="<?=$client->firstname?>"></td>
                            <td><input type="email" name="mail" id="mail" value="<?=$client->mail?>"></td>
                            <input type="hidden" name="password" id="password" value="<?=$client->password?>">
                            <td><input type="text" name="address" id="address" value="<?=$client->address?>"></td>
                            <td><input type="text" name="city" id="city" value="<?=$client->city?>"></td>
                            <td><input type="number" name="zipCode" id="zipCode" value="<?=$client->zipCode?>"></td>
                            <td><input type="submit" name="updateClient"></td>
                            <td><button type="button" onclick="hideUpdate(<?=$id?>)">Annuler</button></td>
                            <input type="hidden" name="hidden_id" value="<?=$id?>">  
                        </form>

                    </tr>
                    <?php
                }
            ?>
            
            </tbody>
        </table>
    </div>

    <div class="admin" id="searchClient">
    
        <form action="updateAdmin" method="post"> 
            <select name="mail">
                <option value="null">Choisir un mail</option>
                <?php 
                foreach($clicli as $client){
                    ?>
                    <option value="<?=$client->mail?>"><?=$client->mail?></option>
                    <?php 
                }
                ?>
            </select>
            <select name="city">
                <option value="null">Choisir une ville</option>
                <?php 
                foreach($cliGroup as $client){
                    ?>
                    <option value="<?=$client->city?>"><?=$client->city?></option>
                    <?php 
                }
                ?>
            </select>
            <select name="zipCode">
                <option value="null">Choisir code postal</option>
                <?php 
                foreach($cliGroup as $client){
                    ?>
                    <option value="<?=$client->zipCode?>"><?=$client->zipCode?></option>
                    <?php 
                }
                ?>
            </select>
            <input type="submit" name="searchClient">
        </form>
        <?php 
        if(!empty($searchClients)){
        ?>
            
            <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Code postal</th>
            </tr>

            <?php 

                foreach($searchClients as $cli){
                    ?>
                        <tr>
                            <td><?=$cli->lastname?></td>
                            <td><?=$cli->firstname?></td>
                            <td><?=$cli->mail?></td>
                            <td><?=$cli->address?></td>
                            <td><?=$cli->city?></td>
                            <td><?=$cli->zipCode?></td>
                        </tr>
                    <?php 
                }
            ?>
        </table>
        <?php 
        }     
        ?>
    
    </div>
    

</div>

<!-- VOITURE -->
<div class="text-white admin" id="voiture">
    <button type="button" onclick="newCar()">Ajouter voiture</button>
    <button type="button" onclick="allCar()">Afficher toutes les voitures</button>
    <button type="button" onclick="searchCar()">Rechercher</button>

    <div class="admin text-white" id="newCar">
        <form action="updateAdmin" method="post">
            <input type="text" name="matriculation" id="matriculation" placeholder="Matriculation">
            <input type="text" name="kms" id="kms" placeholder="kms">
            <input type="text" name="transmission" id="transmission" placeholder="transmission">
            <input type="text" name="dayprice" id="dayprice" placeholder="dayprice">
            <select name="id_couleur">
                <?php
                    foreach($colors as $color){
                        ?>
                            <option value="<?=$color->id?>"><?=$color->color?></option>
                        <?php 
                    }
                ?>
            </select>
            <select name="id_marque">
                <?php
                    foreach($brands as $brand){
                        ?>
                            <option value="<?=$brand->id?>"><?=$brand->brand?></option>
                        <?php 
                    }
                ?>
            </select>
            <select name="id_modele">
                <?php
                    foreach($models as $model){
                        ?>
                            <option value="<?=$model->id?>"><?=$model->model?></option>
                        <?php 
                    }
                ?>
            </select>
            <select name="id_carburant">
                <?php
                    foreach($fuels as $fuel){
                        ?>
                            <option value="<?=$fuel->id?>"><?=$fuel->fuel?></option>
                        <?php 
                    }
                ?>
            </select>
            <input type="submit" name="newCar" value="Ajouter">

        </form>
    </div>
    <div id="allCar" class="admin">
        <table>
            <tr>
                <th>Matriculation</th>
                <th>kms</th>
                <th>transmission</th>
                <th>dayprice</th>
                <th>Couleur</th>
                <th>modifier</th>
                <th>supprimer</th>
            </tr>
            <?php 
                foreach($carss as $car){
                    $idCar = $car->id;
                    ?>
                    <tr>
                        <td><?=$car->matriculation?></td>
                        <td><?=$car->kms?></td>
                        <td><?=$car->transmission?></td>
                        <td><?=$car->dayprice?></td>
                        <td>
                            <?php
                                foreach($colors as $color){

                                    if($color->id == $car->id_couleur){
                                        echo $color->color;
                                    }
                                }
                            ?>
                        </td>
                        <td><button type="button" onclick="updateCar(<?=$car->id?>)">Modifier</button></td>
                        <td>
                            <form action="deleteCar" method="post">
                                <input type="submit" name="deleteCar" value ="Supprimer">
                                <input type="hidden" name="hidden_idCar" value="<?=$idCar?>">
                            </form>
                        </td>
                    </tr>

                    <tr id="updateCar<?=$car->id?>" class="update">
                        <form action="updateAdmin" method="post">
                            <td><input type="text" name="matriculation" id="matriculation" value="<?=$car->matriculation?>"></td>
                            <td><input type="text" name="kms" id="kms" value="<?=$car->kms?>"></td>
                            <td><input type="text" name="transmission" id="transmission" value="<?=$car->transmission?>"></td>
                            <td><input type="text" name="dayprice" id="dayprice" value="<?=$car->dayprice?>"></td>
                            <td>
                                <select name="id_couleur">
                                    <?php 
                                        foreach($colors as $color){
                                            ?>
                                                <option value="<?=$color->id?>" <?php if($car->id_couleur == $color->id){echo 'selected';}else{echo '';}?>><?=$color->color?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </td>
                            <td><input type="submit" name="updateCar"></td>
                            <td><button type="button" onclick="hideUpdateCar(<?=$car->id?>)">Annuler</button></td>
                            <input type="hidden" name="hid_idCar" value="<?=$idCar?>">  
                        </form>
                    </tr>

                    <?php
                }
            ?>
        </table>
    </div>
    <div id="searchCar" class="admin">
        <form action="updateAdmin" method="post">
            <select name="matriculation">
                <option value="null" selected>Choisir matriculation</option>
                <?php 
                    foreach($carss as $car){
                        ?>
                        <option value="<?=$car->matriculation?>"><?=$car->matriculation?></option>
                        <?php
                    }
                ?>
            </select>
            <select name="transmission">
                <option value="null" selected>Choisir transmission</option>
                <option value="auto">automatique</option>
                <option value="manuelle">manuelle</option>
            </select>
            <select name="id_couleur">
                <option value="null" selected>Choisir couleur</option>
                <?php 
                    foreach($colors as $color){
                        ?>
                        <option value="<?=$color->id?>"><?=$color->color?></option>
                        <?php 
                    }
                ?>
            </select>
            <select name="id_marque">
            <option value="null" selected>Choisir marque</option>
                <?php
                    foreach($brands as $brand){
                        ?>
                        <option value="<?=$brand->id?>"><?=$brand->brand?></option>
                        <?php
                    } 
                ?>
            </select>
            <select name="id_modele">
                <option value="null" selected>Choisir modele</option>
                <?php
                    foreach($models as $model){
                        ?>
                        <option value="<?=$model->id?>"><?=$model->model?></option>
                        <?php 
                    }
                ?>
            </select>
            <select name="id_carburant">
                <option value="null" selected>Choisir carburant</option>
                <?php 
                    foreach($fuels as $fuel){
                        ?>
                        <option value="<?=$fuel->id?>"><?=$fuel->fuel?></option>
                        <?php 
                    }
                ?>
            </select>
            <input type="submit" name="searchCar">
        
        </form>
        <?php 
            if(!empty($searchCars)){
                ?>
                <table>
                    <tr>
                        <th>Matriculation</th>
                        <th>Kms</th>
                        <th>Transmission</th>
                        <th>Prix/Jour</th>
                        <th>Couleur</th>
                        <th>Marque</th>
                        <th>Modele</th>
                        <th>Carburant</th>
                    </tr>

                    <?php 
                        foreach($searchCars as $car){
                            ?>
                            <tr>
                            <td><?=$car->matriculation?></td>
                            <td><?=$car->kms?></td>
                            <td><?=$car->transmission?></td>
                            <td><?=$car->dayprice?></td>
                            <td>
                                <?php
                                foreach($colors as $color){
                                    if($color->id == $car->id_couleur){
                                        echo $color->color;
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php 
                                foreach($brands as $brand){
                                    if($brand->id == $car->id_marque){
                                        echo $brand->brand;
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php 
                                foreach($models as $model){
                                    if($model->id == $car->id_modele){
                                        echo $model->model;
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php 
                                foreach($fuels as $fuel){
                                    if($fuel->id == $car->id_carburant){
                                        echo $fuel->fuel;
                                    }
                                }
                                ?>
                            </td>
                            </tr>
                            <?php 
                        }       
                    ?>
                </table>
            <?php 
            }
            ?>
    </div>
</div>

<!-- RESERVATION -->
<div class="text-white admin" id="resa">
    
    <button type="button" onclick="newResa()">Ajouter réservation</button>
    <button type="button" onclick="allResa()">Toutes les réservations</button>
    <button type="button" onclick="searchResa()">Rechercher</button>

    <div class="admin" id="newResa">
    
        <form action="updateAdmin" method="post">
        
            <input type="date" name="date_debut" id="date_debut">
            <input type="date" name="date_fin" id="date_fin">
            <select name="id_service">
                <?php 

                    foreach($services as $service){
                        ?>
                        <option value="<?=$service->id?>"><?=$service->type?></option>
                        <?php 
                    }
                ?>
            </select>
            <select name="id_voiture">
                <?php 
                    foreach($available as $car){
                        ?>
                        <option value="<?=$car->id?>"><?=$car->matriculation?></option>
                        <?php 
                    }
                ?>
            </select>
            <select name="id_client">
                <?php 
                    foreach($clicli as $client){
                        ?>
                        <option value="<?=$client->id?>"><?=$client->mail?></option>
                        <?php
                    }
                ?>
            </select>
            <input type="submit" name="newResa" value="Ajouter">
        
        </form>
    </div>

    <div class="admin" id="allResa">
    
        <table>
            <tr>
                <th>mail</th>
                <th>matriculation</th>
                <th>date debut</th>
                <th>date fin</th>   
                <th>modifier</th>
                <th>supprimer</th>
            </tr>
            <?php 
                    foreach($resa as $res){
                    
                    ?>
                    <tr>
                        
                        <td><?=$res->mail?></td>
                        <td><?=$res->matriculation?></td>
                        <td><?=$res->date_debut?></td>
                        <td><?=$res->date_fin?></td>
                        <td><button type="button" onclick="updateResa(<?=$res->id?>)">Modifier</button></td>
                        <td> <form action="deleteResa" method="post">
                                <input type="submit" name="deleteResa" value ="Supprimer">
                                <input type="hidden" name="delete_idResa" value="<?=$res->id?>">
                            </form></td>
                    </tr>

                    <tr id="updateResa<?=$res->id?>" class="update">
                        <form action="updateAdmin" method="post">
                            <td>
                                <select name="id_client">
                                    <?php 
                                    foreach($clicli as $client){
                                    ?>
                                        <option value="<?=$client->id?>">
                                        <?=$client->mail?>
                                        </option>
                                    <?php
                                    }
                                ?>
                                </select>
                            </td>
                            <td>
                                <select name="id_voiture">
                                    <?php
                                    foreach($carss as $car){
                                    ?>
                                        <option value="<?=$car->id?>"><?=$car->matriculation?></option>
                                    <?php 
                                    }
                                    ?>
                                </select>
                            </td>
                            <td><input type="text" value="<?=$res->date_debut?>" name="date_debut"></td>
                            <td><input type="text" value="<?=$res->date_fin?>" name="date_fin"></td>
                            <td><input type="submit" name="updateResa"></td>
                            <td><button type="button" onclick="hideUpdateResa(<?=$res->id?>)">Annuler</button></td>
                            <input type="hidden" name="hid_idResa" value="<?=$res->id?>">  
                        </form>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>

    <div class="admin" id="searchResa">
        <form action="updateAdmin" method="post">
                
            <select name="id_client">
                <option value="null" selected>Choisir un client</option>
                <?php 
                foreach($clicli as $client){
                ?>
                    <option value="<?=$client->id?>">
                    <?=$client->mail?>
                    </option>
                <?php
                }
            ?>
            </select>
            <select name="id_voiture">
                <option value="null" selected>Choisir une matriculation</option>
                <?php 
                foreach($carss as $car){
                ?>
                    <option value="<?=$car->id?>">
                    <?=$car->matriculation?>
                    </option>
                <?php
                }
            ?>
            </select>
            <select name="id_service">
                <option value="null" selected>Choisir service</option>
                <?php 

                    foreach($services as $service){
                        ?>
                        <option value="<?=$service->id?>"><?=$service->type?></option>
                        <?php 
                    }
                ?>
            </select>

            <select name="date_fin">
                <option value="null" selected>Disponibilité</option>
                <option value="dispo">Dispo</option>
                <option value="nonDispo">Non-dispo</option>
            </select>

            <input type="submit" class="inputCo" name="searchResa">
        </form>
        <?php 
           
            if(!empty($searchResas)){
               
                ?>
                <table>
                    <tr>
                        <th>Email</th>
                        <th>Matriculation</th>
                        <th>date debut</th>
                        <th>date fin</th>
                    </tr>
                    <?php 
                        foreach($searchResas as $search){
                            ?>
                            <tr>
                                <td>
                                    <?php 
                                    foreach($clicli as $client){
                                        if($search->id_client == $client->id){
                                            echo $client->mail;
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    foreach($carss as $car){
                                        if($search->id_voiture == $car->id){
                                            echo $car->matriculation;
                                        }
                                    }
                                    ?>
                                </td>
                                <td><?=$search->date_debut?></td>
                                <td><?=$search->date_fin?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </table>
                <?php 
            }
        ?>
    </div>
    
</div>
</div>