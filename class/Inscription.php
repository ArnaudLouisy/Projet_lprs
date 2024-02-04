<?php

class Inscription{
    private $ref_utilisateur;
    private $ref_event;
    private $nbplace;

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

    public function inscrire(Bdd $base): void{
        $req = $base -> getBdd() ->prepare('UPDATE evenement SET nombre_inscrit = :nbr where id_event = :id');
        $req->execute(array(
            'nbr' => $this->nbplace-1,
            'id' => $this->ref_event,
        ));

        $req = $base -> getBdd() ->prepare('INSERT INTO inscription (ref_event,ref_utilisateur) values (:ref_event,:ref_utilisateur)');
        $req->execute(array(
            'ref_event' => $this->ref_event,
            'ref_utilisateur' => $this->ref_utilisateur,
        ));
    }

    public function voirInscrit(Bdd $base){
        $req = $base->getBdd()->prepare('SELECT nom,prenom,niveau_etude FROM utilisateur INNER JOIN evenement ON evenement.id_event = :event and utilisateur.id_utilisateur = evenement.ref_utilisateur');
        $req->execute(array(
            'event'=>$this->ref_event
        ));
        return $req->fetchAll();
    }

    /**
     * @param mixed $ref_utilisateur
     */
    public function setRefUtilisateur($ref_utilisateur): void
    {
        $this->ref_utilisateur = $ref_utilisateur;
    }

    /**
     * @param mixed $ref_event
     */
    public function setRefEvent($ref_event): void
    {
        $this->ref_event = $ref_event;
    }

    /**
     * @param mixed $nbplace
     */
    public function setNbplace($nbplace): void
    {
        $this->nbplace = $nbplace;
    }

}