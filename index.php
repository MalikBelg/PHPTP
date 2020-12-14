<?php 


session_start();

var_dump($_SESSION);
var_dump($_POST);


$route = (isset($_GET["route"]))? $_GET["route"] : "connexion";

    switch($route){

        case "connexion" : $template = connect_user();
        break;
        case "inscription" : $template = insert_user();
        break;
        case "ajout_user" : ajout_user();
        break;
        case "moncompte" : ["templates" => "moncompte.php"];
        default : $template = connect_user();

    }



    function connect_user(){
        
        require_once "objets/Utilisateur.php";

        $users = Utilisateur::verify_user();
        
        return ["templates" => "formulaire_connexion.php", "json" => $users];

        header("Location:index.php?route=moncompte");
        exit;
    }



    function insert_user(): array {   
        
        require_once "objets/Utilisateur.php";

        $users = Utilisateur::getUsers();
        
        return ["templates" => "formulaire_inscription.php", "json" => $users];


    }



    function ajout_user(){

        require_once "objets/Utilisateur.php";

        $user = new Utilisateur(rand(100000, 999999), $_POST["pseudo"], $_POST["mdp"]);
        // $hashed_mdp = password_hash($_POST["mdp"], PASSWORD_BCRYPT, [CRYPT_SALT_LENGTH]);
        $user->save_user();        
        
        header("Location:index.php?route=connexion");
        exit;
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