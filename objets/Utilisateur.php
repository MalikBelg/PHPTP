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

    function save_user() {

       
        $contenu = (file_exists("json/utilisateurs.json"))? file_get_contents("json/utilisateurs.json") : ""; 
        
       
        $users = json_decode($contenu);
        $users = (is_array($users))? $users : [];

        $user = get_object_vars($this);

        array_push($users, $user);

        $handle = fopen("json/utilisateurs.json", "w");
        $json = json_encode($users);

        fwrite($handle, $json);
        fclose($handle);
    }


    static function getUsers(): array {

        $contenu = (file_exists("json/utilisateurs.json"))? file_get_contents("json/utilisateurs.json") : "";
        $users = json_decode($contenu);

        $users = (is_array($users))? $users : [];

        return $users;
    }


    static function verify_user() {

        $contenu = (file_exists("json/utilisateurs.json"))? file_get_contents("json/utilisateurs.json") : "";
        $users = json_decode($contenu);

      

        if(isset($_POST["pseudo"]) && isset($_POST["motdepasse"])){
            $_SESSION["user"] = $_POST["pseudo"];
            $_SESSION["mdp"] = $_POST["motdepasse"]; 
        }

        if(isset($_SESSION["user"])){
            return "moncompte.php";
        } else {
            return "formulaire_connexion.php";
        }
       
       
        $users = (is_array($users))? $users : [];
        
        return $users;

    }


    







}

?>