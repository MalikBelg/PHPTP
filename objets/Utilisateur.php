<?php

class Utilisateur {

    protected $id_utilisateur;
    protected $pseudo;
    protected $mdp;
    
    


    function __construct($id_utilisateur, $pseudo, $mdp){
        $this->id_utilisateur = $id_utilisateur;
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
    }


               // GETTER & SETTER //
//=================================================//
    
    function setUser($id_utilisateur){
        $this->id_utilisateur = $id_utilisateur;
    }

    function getUser(){
        return $this->id_utilisateur;
    }

//==================================================//

    function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }

    function getPseudo(){
        return $this->pseudo;
    }

//==================================================//

    function setMdp($mdp){
        $this->mdp = $mdp;
    }

    function getMdp(){
        return $this->mdp;
    }

//==================================================//

    



              // FONCTIONS //

    function save_user() {

        // Je vais chercher le contenu de mon fichier .json, puis on le décode
        $contenu = (file_exists("json/utilisateurs.json"))? file_get_contents("json/utilisateurs.json") : ""; 
        $users = json_decode($contenu);
        
        // Je transforme ces données en tableau
        $users = (is_array($users))? $users : [];

        // Je crée un tableau avec mon objet
        $user = get_object_vars($this);

        // J'ajoute l'utilisateur à mon tableau
        array_push($users, $user);

        // J'ouvre mon fichier .json et je le paramètre pour pouvoir écrire des données à l'intérieur de ce fichier
        $handle = fopen("json/utilisateurs.json", "w");
       
        // Je réencode en .json
        $json = json_encode($users);

        // J'écris dans mon fichier .json
        fwrite($handle, $json);

        // Je ferme mon fichier .json
        fclose($handle);
    }


    static function getUsers(): array {

        // Je vais chercher le contenu de mon fichier .json, puis on le décode
        $contenu = (file_exists("json/utilisateurs.json"))? file_get_contents("json/utilisateurs.json") : "";
        $users = json_decode($contenu);

        // Je transforme ces données en tableau
        $users = (is_array($users))? $users : [];

        // Je renvoi ce tableau
        return $users;
    }


    static function verify_user(): array {

        if(isset($_POST["pseudo"]) && isset($_POST["motdepasse"])){
            $_SESSION["user"] = $_POST["pseudo"];
            $_SESSION["mdp"] = $_POST["motdepasse"]; 
        }

        if(isset($_SESSION["user"])){
            return ["templates" => "moncompte.php"];
        } else {
            return ["templates" => "formulaire_connexion.php"];
        }

    }


    







}

?>