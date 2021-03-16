<div class="text-center">
    <h2 class="text-white m-5">Inscription</h2>
    <div class="text-center">
        <form action="validation" method="post">

            <input type="text" name="lastname" id="lastname" class="inputCo mb-2" value="<?=set_value("lastname")?>" placeholder="Dupont"><br>
            <span class="text-danger"><?php echo form_error("lastname"); ?></span>

            <input type="text" name="firstname" id="firstname" class="inputCo mb-2" value="<?=set_value("firstname")?>" placeholder="Jean"><br>
            <span class="text-danger"><?php echo form_error("firstname"); ?></span>

            <input type="email" name="mail" id="mail" class="inputCo mb-2" value="<?=set_value("mail")?>" placeholder="exemple@exemple.com"><br>
            <span class="text-danger"><?php echo form_error("mail"); ?></span>

            <input type="password" name="password" id="password" class="inputCo mb-2" placeholder="password"><br>
            <span class="text-danger"><?php echo form_error("password"); ?></span>

            <input type="text" name="address" id="address" class="inputCo mb-2" value="<?=set_value("address")?>" placeholder="10 place Léon Meyer"><br>
            <span class="text-danger"><?php echo form_error("address"); ?></span>

            <input type="text" name="city" id="city" class="inputCo mb-2" value="<?=set_value("city")?>" placeholder="Le Havre"><br>
            <span class="text-danger"><?php echo form_error("city"); ?></span>

            <input type="number" name="zipCode" class="inputCo mb-2" value="<?=set_value("zipCode")?>" id="zipCode" placeholder="76600"><br>
            <span class="text-danger"><?php echo form_error("zipCode"); ?></span>

            <input type="submit" class="btnGradient  mb-2" name="submit" value="Valider">

        </form>
    </div>
</div>