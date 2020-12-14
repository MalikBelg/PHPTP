<?php

class Tache {

    protected $id_tache;
    protected $description;
    protected $datelimite;
    protected $id_utilisateur;


    function __construct(string $id_tache, string $description, int $datelimite, int $id_utilisateur){
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


}

?>