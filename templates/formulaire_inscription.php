<?php

$users = $template["json"];

?>





<h2>Inscrivez-vous</h2>    

    <form action="index.php?route=insert_user" method="POST">

        <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo">
        <input type="password" id="mdp" name="mdp" placeholder="Entrez votre mot de passe">

        <button type="submit">Inscription</button>

    </form>

    <a href="index.php?route=connexion">J'ai déjà un compte</a>

