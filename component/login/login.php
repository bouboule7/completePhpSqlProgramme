<?php
include("./../../component/sing/sing.html");
?>
<link rel="stylesheet" href="./../../component/login/login.scss"/>
<div class="login">
    <form methode="post" action="./../../traitement/mail.php">
        <h1 class="start">Start with Joov'Teck</h1>
        <br/>
        <label class="labemail" for="mail">E-mail</label>
        <br/>
        <input type="mail" name="mail" id="mail" class="mail" required/>
        <br/>
        <button class"next" type="submit">Next</button>
    </form>
</div>