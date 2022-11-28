<?php

class Postule{

    private $ref_offre;
    private $ref_eleve;

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
        $req = $base -> getBdd() ->prepare('INSERT INTO postule (ref_offre,ref_eleve) values (:ref_offre,:ref_eleve)');
        $req->execute(array(
            'ref_offre' => $this->_offre,
            'ref_eleve' => $this->description,
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
     * @param mixed $ref_eleve
     */
    public function setRefEleve($ref_eleve)
    {
        $this->ref_eleve = $ref_eleve;
    }

}