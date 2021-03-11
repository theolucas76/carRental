<button type="button" onclick="showClient()">Client</button>
<button type="button" onclick="showCar()">Voiture</button>
<button type="button" onclick="showResa()">Réservation</button>
<form action="<?=base_url()?>logOut" method="post">
    <input type="submit" name="logOutAdmin" value="Déconnexion">
</form>

<div class="text-white admin" id="client">

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


<div class="text-white admin" id="voiture">

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

<div class="text-white admin" id="resa">

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
                    <td><a href="<?=base_url().'deleteCar'?>">supprimer</a></td>
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