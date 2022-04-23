<?php
include("./../../component/sing/sing.html");
?>
<link rel="stylesheet" href="./../../component/login/login.scss"/>
<div class="login">
    <form methode="post" action="./../../traitement/mail.php">
        <h1>Start with Joov'Teck</h1>
        <br/>
        <label for="mail">E-mail</label>
        <br/>
        <input type="mail" name="mail" id="mail" class="mail" required/>
        <br/>
        <button type="submit">Next</button>
    </form>
    <div class="espace"></div>
</div>