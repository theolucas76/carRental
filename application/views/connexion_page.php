<?php
    if(isset($this->session->mail)){

        echo 'Bienvenue';
        var_dump($this->session);
    }else{
        ?>
        <div class="text-center">
            <form action="profilCheck" method="post">
                <input type="email" name="mail" id="mail" value="<?=set_value("mail")?>" placeholder="exemple@exemple.com">
                <span class="text-danger"><?php echo form_error("mail"); ?></span>

                <input type="password" name="password" id="password" placeholder="password">
                <span class="text-danger"><?php echo form_error("password"); ?></span>

                <input type="submit" name="submit" value="Valider">
            </form>
            <a href="<?=base_url()?>inscription"><button type="button" class="btn btnGradient text-left">Inscription</button></a>
        </div>
        <?php
    }
?>