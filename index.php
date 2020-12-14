<?php 


session_start();


$route = (isset($_GET["route"]))? $_GET["route"] : "connexion";

    switch($route){

        case "connexion" : $template = connect_user();
        break;
        case "inscription" : $template = insert_user();
        break;
        case "ajout_user" : ajout_user();
        break;
        default : $template = connect_user();

    }



    function connect_user(): array {
        return ["templates" => "formulaire_connexion.php"];
    }



    function insert_user(): array {   
        
        require_once "objets/Utilisateur.php";

        $users = Utilisateur::getUsers();

        
        
        return ["templates" => "formulaire_inscription.php", "json" => $users];

        header("Location:index.php?route=connexion");
        exit;
    }



    function ajout_user(){

        require_once "objets/Utilisateur.php";

        $user = new Utilisateur(01234556, $_POST["pseudo"], $_POST["mdp"]);
        // $hashed_mdp = password_hash($mdp, PASSWORD_BCRYPT, [CRYPT_SALT_LENGTH]);
        $user->save_user();
    }




    ?>


    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion</title>
    </head>
    <body>
        
        <?php require "templates/" . $template["templates"]; ?>
        
        
        

    </body>
    </html>