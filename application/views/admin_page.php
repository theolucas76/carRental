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
                    <td><button type="button" onclick="updateCli(<?=$id?>)">modifier</button></td>
                    <td><a href="">supprimer</a></td>
                </tr>

                <tr id="updateCli<?=$id?>" class="update">
                    <form action="" method="post">
                        <td scope="row"><input type="text" name="lastname" id="lastname" value="<?=$client->lastname?>"></td>
                        <td><input type="text" name="firstname" id="firstname" value="<?=$client->firstname?>"></td>
                        <td><input type="email" name="mail" id="mail" value="<?=$client->mail?>"></td>
                        <td><input type="password" name="password" id="password" value="<?=$client->password?>"></td>
                        <td><input type="text" name="address" id="address" value="<?=$client->address?>"></td>
                        <td><input type="text" name="city" id="city" value="<?=$client->city?>"></td>
                        <td><input type="number" name="zipCode" id="zipCode" value="<?=$client->zipCode?>"></td>
                        <td><input type="submit" name="updateClient"><button type="button" onclick="hideUpdate(<?=$id?>)">Annuler</button></td>
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
            <th>creer</th>
            <th>modifier</th>
            <th>supprimer</th>
        </tr>
        <?php 
            foreach($cars as $car){
                $id = $car->id;
                ?>
                <tr>
                    <td><?=$car->matriculation?></td>
                    <td><?=$car->kms?></td>
                    <td><?=$car->transmission?></td>
                    <td><?=$car->dayprice?></td>
                    <td><a href="<?=base_url().'createCar'?>">creer</a></td>
                    <td><a href="<?=base_url().'updateCar'?>">modifier</a></td>
                    <td><a href="<?=base_url().'deleteCar'?>">supprimer</a></td>
                </tr>

                <?php
            }
        ?>
    </table>

</div>

<div class="text-white admin" id="resa">

    <table>
        <tr>
            <th>nom</th>
            <th>prenom</th>
            <th>matriculation</th>
            <th>dayprice</th>
            <th>date debut</th>
            <th>date fin</th>
            <th>creer</th>
            <th>modifier</th>
            <th>supprimer</th>
        </tr>
        <?php 
                foreach($resa as $res){
                ?>
                <tr>
                    <td><?=$res->lastname?></td>
                    <td><?=$res->firstname?></td>
                    <td><?=$res->matriculation?></td>
                    <td><?=$res->dayprice?></td>
                    <td><?=$res->date_debut?></td>
                    <td><?=$res->date_fin?></td>
                    <td><a href="<?=base_url().'createCar'?>">creer</a></td>
                    <td><a href="<?=base_url().'updateCar'?>">modifier</a></td>
                    <td><a href="<?=base_url().'deleteCar'?>">supprimer</a></td>
                </tr>
                <?php
            }
        ?>
    </table>


</div>