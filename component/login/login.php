<link rel="stylesheet" href="./../../component/login/login.scss">
<div class="login">
    <div class="espace"></div>
    <form methode="post" action="./../../traitement/connection.php">
        <h1>Se connecter</h1>
        <br/>
        <label for="mail">E-mail</label>
        <br/>
        <input type="mail" name="mail" id="mail" class="mail" required/>
        <br/>
        <label for="password">Mot de passe</label>
        <br/>
        <input type="password" name="password" id="password" class="password" required/>
        <br/>
        <a href="/page/singup/singup.php">Pas encore de compte?</a>
        <br/>
        <button type="submit">Se connecter</button>
    </form>
    <div class="espace"></div>
</div>