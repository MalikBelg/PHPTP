<?php 


session_start();


var_dump($_POST);
var_dump($_SESSION);

// session_destroy();

$route = (isset($_GET["route"]))? $_GET["route"] : "connexion";

    switch($route){

        case "connexion" : $template = showFormConnexion();
        break;
        case "inscription" : $template = showFormInscription();
        break;
        case "insert_user" : insert_user();
        break;
        case "connect_user" : connect_user();
        break;
        case "moncompte" : $template = showMoncompte();
        break;
        case "tache" : insert_tache();
        break;
        default : $template = showFormConnexion();

    }



    function showFormConnexion(){
       
        require_once "objets/Utilisateur.php";

        $users = Utilisateur::getUsers();
        
        return ["templates" => "formulaire_connexion.php", "json" => $users];


    }


    function connect_user(): array {
        
        require_once "objets/Utilisateur.php";

        $user = new Utilisateur(rand(100000, 999999), $_POST["pseudo"], $_POST["mdp"]);
        $user->verify_user();
 

        header("Location:index.php?route=moncompte");
        exit;
    }





    function showFormInscription(): array {   

        require_once "objets/Utilisateur.php";

        $users = Utilisateur::getUsers();

        return ["templates" => "formulaire_inscription.php", "json" => $users];

    }

 

    function insert_user(){

        require_once "objets/Utilisateur.php";

        $user = new Utilisateur(rand(100000, 999999), $_POST["pseudo"], $_POST["mdp"]);
        // $hashed_mdp = password_hash($_POST["mdp"], PASSWORD_BCRYPT, [CRYPT_SALT_LENGTH]);
        $user->save_user();        
        
        header("Location:index.php?route=connexion");
        exit;
    }




    function showMoncompte(){
        return ["templates" => "moncompte.php"];
    }





    function insert_tache(){

        require_once "objets/Tache.php";

        $tache = new Tache($_POST["id_tache"], "", $_POST["datelimite"], rand(100000, 999999));
        $tache->save_tache();

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