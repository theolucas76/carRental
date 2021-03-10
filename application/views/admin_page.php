<button type="button" onclick="showClient()">Client</button>
<button type="button" onclick="showCar()">Voiture</button>
<button type="button" onclick="showResa()">Réservation</button>

<div class="text-white admin" id="client">

    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>email</th>
            <th>adresse</th>
            <th>ville</th>
            <th>code postal</th>
            <th>creer</th>
            <th>modifier</th>
            <th>supprimer</th>
        </tr>
        <?php 
            foreach($clicli as $client){
                $id = $client->id;
                ?>
                <tr>
                    <td><?=$client->lastname?></td>
                    <td><?=$client->firstname?></td>
                    <td><?=$client->mail?></td>
                    <td><?=$client->address?></td>
                    <td><?=$client->city?></td>
                    <td><?=$client->zipCode?></td>
                    <td><a href="<?=base_url().'createCli'?>">creer</a></td>
                    <td><a href="<?=base_url().'updateCli'?>">modifier</a></td>
                    <td><a href="<?=base_url().'deleteCli'?>">supprimer</a></td>
                </tr>
                <?php
            }
        ?>
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