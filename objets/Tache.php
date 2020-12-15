<?php

class Tache {

    protected $id_tache;
    protected $description;
    protected $datelimite;
    protected $id_utilisateur;


    function __construct($id_tache, $description, $datelimite, $id_utilisateur){
        $this->id_tache = $id_tache;
        $this->description = $description;
        $this->datelimite = $datelimite;
        $this->id_utilisateur = $id_utilisateur;
    }

    //=================================================//
    
    function setTache(string $id_tache){
        $this->id_tache = $id_tache;
     }

    function getTache(): string {
        return $this->id_tache;
    }
    
    //=================================================//
    
    function setDescription(string $description){
        $this->description = $description;
    }
    
    function getDescription(): string {
        return $this->description;
    }
    
    //=================================================//
    
    function setDatelimite(int $datelimite){
        $this->datelimite = $datelimite;
    }
    
    function getDatelimite(): int {
        return $this->datelimite;
    }

    //=================================================//
        
    function setUser(int $id_utilisateur){
        $this->id_utilisateur = $id_utilisateur;
    }

    function getUser(): int{
        return $this->id_utilisateur;
    }

    //==================================================//

    static function getTaches(): array {

        // Je vais chercher le contenu de mon fichier .json, puis on le décode
        $contenu = (file_exists("json/taches.json"))? file_get_contents("json/taches.json") : "";
        $taches = json_decode($contenu);

        // Je transforme ces données en tableau
        $taches = (is_array($taches))? $taches : [];

        // Je renvoi ce tableau
        return $taches;
     }




    function save_tache() {

       
        $contenu = (file_exists("json/taches.json"))? file_get_contents("json/taches.json") : ""; 
        
       
        $taches = json_decode($contenu);
        $taches = (is_array($taches))? $taches : [];

        $tache = get_object_vars($this);

        array_push($taches, $tache);

        $handle = fopen("json/taches.json", "w");
        $json = json_encode($taches);

        fwrite($handle, $json);
        fclose($handle);
    }

}

?>