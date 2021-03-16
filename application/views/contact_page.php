<div class="row justify-content-center text-center text-white">

    <h3 class="m-5">Contactez-nous !</h3>

    <form action="insertContact" method="post">

        <label for="email">Email : </label><br>
        <input type="text" class="btnGradient" name="email_client" id="email" value="<?=$this->session->mail?>"><br>
        <label for="sujet">Sujet : </label><br>
        <input type="text" class="btnGradient" name="sujet" id="sujet"><br>
        <label for="msg">Votre message :</label><br>
        <textarea class="btnGradient" name="msg" id="msg"></textarea><br>

        <input type="submit" class="btnGradient" name="insertMessage" value="Envoyer">

       
    </form>
</div>