<div class="row " style="color: white">
    <p>Voiture</p>
    <?php var_dump($available); ?>
    <div class="manu col-6">
        <table>
            <tr>
                <th>Marque</th>
                <th>Modele</th>
                <th>Couleur</th>
                <th>Carburant</th>
                <th>kms</th>
            </tr>
            <?php 
                foreach($cars as $car){

                    if($car->transmission == 'manuelle'){

                        ?>
                            <tr>
                                <td><?=$car->brand?></td>
                                <td><?=$car->model?></td>
                                <td><?=$car->color?></td>
                                <td><?=$car->fuel?></td>
                                <td><?=$car->kms?></td>
                            </tr>
                        <?php
                    }
                }
            ?>
        </table>
    </div>
    <div class="auto col-6">
        <table>
            <tr>
                <th>Marque</th>
                <th>Modele</th>
                <th>Couleur</th>
                <th>Carburant</th>
                <th>kms</th>
            </tr>
            <?php 
                foreach($cars as $car){

                    if($car->transmission == 'auto'){
                        ?>
                            <tr>
                                <td><?=$car->brand?></td>
                                <td><?=$car->model?></td>
                                <td><?=$car->color?></td>
                                <td><?=$car->fuel?></td>
                                <td><?=$car->kms?></td>
                            </tr>
                        <?php
                    }
                }
            ?>
        </table>
    </div>
</div>