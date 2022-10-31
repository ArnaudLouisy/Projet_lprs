<?php

class RendezVous{

    private $id_rdv;
    private $date;
    private $heure;




    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    private function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function validerrendezvous(Bdd $base){
        $req = $base->getBdd()->prepare('INSERT INTO rendezvous (nom_event,description,date,heure,duree,nombre_inscrit,salle) values (:nom_event,:description,:date,:heure,:duree,:nombre_inscrit,:salle)');

        $req->execute(array(
            'nom_event' => $this->nom_event,
            'description' => $this->description,
            'date' => $this->date,
            'heure' => $this->heure,
            'duree' => $this->duree,
            'nombre_inscrit' => $this->nombre_inscrit,
            'salle' => $this->salle,
        ));


        echo 'levenement a bien ete inscrit !' . '<br>';
    }
    }
}