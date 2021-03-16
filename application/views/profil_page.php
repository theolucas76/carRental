<h4 class="title text-center">Profil</h4>
<form class="text-end" action="<?=base_url()?>logOut" method="post">
    <input type="submit" class="btnGradient" name="logOut" value="Déconnexion">
</form>
<div class="row fontText">
    <div id="profil" class="col-6">
        <?php 
            foreach($clients as $cli){

                if($cli->id == $this->session->id){
                    ?>

                    <p>Votre nom : <?=$cli->lastname?></p> 
                    <p>Votre prenom : <?=$cli->firstname?></p> 
                    <p>Votre email : <?=$cli->mail?></p> 
                    <p>Votre mot de passe : <?=$cli->password?></p> 
                    <p>Votre adresse : <?=$cli->address?></p> 
                    <p>Votre ville : <?=$cli->city?></p> 
                    <p>Votre code postal : <?=$cli->zipCode?></p> 
                    
                    <button type="button" class="btnGradient" onclick="updateProfil()">Modifier</button>
                    <?php
                }   
            }
        ?>
    </div>
    <div id="modifProfil" class="admin m-5">
        <form action="profilCheck" method="post">
            <input type="text" class="btnGradient" name="lastname" value="<?=$this->session->lastname?>">
            <input type="text" class="btnGradient" name="firstname" value="<?=$this->session->firstname?>">
            <input type="text"  class="btnGradient"name="mail" value="<?=$this->session->mail?>">
            <input type="password" class="btnGradient" name="password" value="<?=$this->session->password?>">
            <input type="text" class="btnGradient" name="address" value="<?=$this->session->address?>">
            <input type="text" class="btnGradient" name="city" value="<?=$this->session->city?>">
            <input type="text" class="btnGradient" name="zipCode" value="<?=$this->session->zipCode?>">
            <input type="submit" class="btnGradient" name="modifProfil" value="Modifier">
            <input type="hidden"  name="hid_idCli" value="<?=$this->session->id?>">
        </form>
        </div>

    <div id="historique" class="col-6">
        
        <h5>Historique de vos réservation</h5>
        
        <?php
            foreach($resa as $res){
            
                if($res->id_client == $this->session->id){
                    $start = new DateTime($res->date_debut);
                    $end = new DateTime($res->date_fin);
                    $interval = $start->diff($end);
                    $inter = $interval->format('%a');
                    $price = $inter*$res->dayprice;

                    if($res->date_fin < date('Y-m-d')){
                        ?>
                        <p>Réservation terminée</p>
                        <?php 
                    }else{
                        ?>
                        <p>Réservation en cours</p>
                        <?php 
                    }
                    ?>

                    <p>matriculation : <?=$res->matriculation?></p>
                    <p>date debut : <?=$res->date_debut?></p>
                    <p>date fin : <?=$res->date_fin?></p>
                    <p>prix/jour : <?=$res->dayprice?></p>
                    <p>prix de la réservation : <?=$price?>€</p>
                    <form action="deleteResaClient" method="post">
                        <input type="submit" class="btnGradient" name="deleteResa" value ="Supprimer">
                        <input type="hidden" name="delete_idResa" value="<?=$res->id?>"> 
                    </form>
                    <?php 
                }
            }
        ?>
    </div>
</div>