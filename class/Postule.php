<?php

class Postule{

    private $ref_offre;
    private $ref_utilisateur;

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

    public function Postulez(Bdd $base){
        $req = $base -> getBdd() ->prepare('INSERT INTO postule (ref_offre,ref_utilisateur) values (:ref_offre,:ref_utilisateur)');
        $req->execute(array(
            'ref_offre' => $this->_offre,
            'ref_utilisateur' => $this->ref_utilisateur,
        ));
    }

    /**
     * @param mixed $ref_offre
     */
    public function setRefOffre($ref_offre)
    {
        $this->ref_offre = $ref_offre;
    }

    /**
     * @param mixed $ref_utilisateur
     */
    public function setRefUtilisateur($ref_utilisateur)
    {
        $this->ref_utilisateur = $ref_utilisateur;
    }



}