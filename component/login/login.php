<?php
include("./../../component/sing/sing.html");
?>
<link rel="stylesheet" href="./../../component/login/login.css"/>
<div class="login">
    <form method="post" action="./../../traitement/mail.php">
        <h1 class="start">Start with Joov'Teck</h1>
        <br/>
        <label class="labemail" for="mail">E-mail</label>
        <br/>
        <input type="email" name="mail" id="mail" class="mail" required/>
        <br/>
        <button class"next" type="submit">Next</button>
    </form>
    <p class="devener">
        Joov'Teck, la société des nul fait par des nuls...
        <span class="curseur">|</span>
    </p>
</div>