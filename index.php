<?php 


session_start();


var_dump($_SESSION);

// session_destroy();

$route = (isset($_GET["route"]))? $_GET["route"] : "connexion";

// Routeur
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


// Fonction qui affiche le template formulaire de connexion
    function showFormConnexion(){
       
        require_once "objets/Utilisateur.php";

        $users = Utilisateur::getUsers();
        
        return ["templates" => "formulaire_connexion.php", "json" => $users];


    }

// Fonction qui permet de se connecter à la page "mon compte" via un formulaire
    function connect_user(): array {
        
        require_once "objets/Utilisateur.php";
        

        $user = new Utilisateur(rand(100000, 999999), $_POST["pseudo"], $_POST["mdp"]); 
        $user->verify_user();
 

        header("Location:index.php?route=moncompte");
        exit;
    }




// Fonction qui affiche le template formulaire d'inscription
    function showFormInscription(): array {   

        require_once "objets/Utilisateur.php";

        $users = Utilisateur::getUsers();

        return ["templates" => "formulaire_inscription.php", "json" => $users];

    }

 
// Fonction qui permet de s'inscrire via un formulaire, redirige vers la page de connexion
// Password_hash permet de crypter le mot de passe
    function insert_user(){

        require_once "objets/Utilisateur.php";


        $user = new Utilisateur(rand(100000, 999999), $_POST["pseudo"], password_hash($_POST["mdp"], PASSWORD_BCRYPT)); 
    
        $user->save_user();        

        header("Location:index.php?route=connexion");
        exit;
    }



// Fonction qui affiche le template mon compte
    function showMoncompte(){

        require_once "objets/Tache.php";

        $taches = Tache::getTaches();

        return ["templates" => "moncompte.php", "json" => $taches];
    }




// Fonction qui permet de créer une nouvelle tâche
    function insert_tache(){

        require_once "objets/Tache.php";

        $tache = new Tache($_POST["id_tache"], "", $_POST["datelimite"], rand(100000, 999999));
        $tache->save_tache();

        header("Location:index.php?route=moncompte");
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
        
        <!-- Require pour afficher mes templates -->
        <?php require "templates/" . $template["templates"]; ?>     
        
        
        

    </body>
    </html>