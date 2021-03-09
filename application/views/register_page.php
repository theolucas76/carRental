<h2 class="text-white">Inscription</h2>
<div class="text-center">
    <form action="validation" method="post">

        <input type="text" name="lastname" id="lastname" value="<?=set_value("lastname")?>" placeholder="Dupont">
        <span class="text-danger"><?php echo form_error("lastname"); ?></span>

        <input type="text" name="firstname" id="firstname" value="<?=set_value("firstname")?>" placeholder="Jean">
        <span class="text-danger"><?php echo form_error("firstname"); ?></span>

        <input type="email" name="mail" id="mail" value="<?=set_value("mail")?>" placeholder="exemple@exemple.com">
        <span class="text-danger"><?php echo form_error("mail"); ?></span>

        <input type="password" name="password" id="password" placeholder="password">
        <span class="text-danger"><?php echo form_error("password"); ?></span>

        <input type="text" name="address" id="address" value="<?=set_value("address")?>" placeholder="10 place Léon Meyer">
        <span class="text-danger"><?php echo form_error("address"); ?></span>

        <input type="text" name="city" id="city" value="<?=set_value("city")?>" placeholder="Le Havre">
        <span class="text-danger"><?php echo form_error("city"); ?></span>

        <input type="number" name="zipCode" value="<?=set_value("zipCode")?>" id="zipCode" placeholder="76600">
        <span class="text-danger"><?php echo form_error("zipCode"); ?></span>

        <input type="submit" name="submit" value="Valider">

    </form>


</div>