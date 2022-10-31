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

    public function creerendezvous(Bdd $base){
        $req = $base->getBdd()->prepare('INSERT INTO rendezvous (date,heure,ref_offre) values (:date,:heure,:ref_offre)');

        $req->execute(array(
            'date' => $this->date,
            'heure' => $this->heure,
            'ref_offre' => $this->ref_offre,

        ));


        echo 'Le Rendre-vous a bien ete Cree !' . '<br>';
    }





}