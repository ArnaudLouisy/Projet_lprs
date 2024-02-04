<?php

class Prospect{
    private $offre;


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

    public function voirProspect(Bdd $base){
        $req = $base->getBdd()->prepare('SELECT nom,prenom,domaine_etude,niveau_etude FROM utilisateur INNER JOIN postule ON postule.ref_offre = :offre and utilisateur.id_utilisateur = postule.ref_utilisateur');
        $req->execute(array(
            'offre'=>$this->offre
        ));
        return $req->fetchAll();
    }


    /**
     * @param mixed $offre
     */
    public function setOffre($offre): void
    {
        $this->offre = $offre;
    }



}