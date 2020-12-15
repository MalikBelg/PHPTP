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


                  // GETTER & SETTER //
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



              // FONCTIONS //


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

        // Je vais chercher le contenu de mon fichier .json, puis on le décode
        $contenu = (file_exists("json/taches.json"))? file_get_contents("json/taches.json") : ""; 
        $taches = json_decode($contenu);

        // Je transforme ces données en tableau
        $taches = (is_array($taches))? $taches : [];

        // Je crée un tableau avec mon objet
        $tache = get_object_vars($this);

        // J'ajoute la tâche à mon tableau
        array_push($taches, $tache);

        // J'ouvre mon fichier .json et je le paramètre pour pouvoir écrire des données à l'intérieur de ce fichier
        $handle = fopen("json/taches.json", "w");
        
        // Je réencode en .json
        $json = json_encode($taches);

        // J'écris dans mon fichier .json
        fwrite($handle, $json);

        // Je ferme mon fichier .json
        fclose($handle);
    }

}

?>