<?php

class Inscription{
    private $ref_utilisateur;
    private $ref_event;

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

    public function inscrire(Bdd $base){
        $req = $base -> getBdd() ->prepare('INSERT INTO inscription (ref_event,ref_utilisateur) values (:ref_event,:ref_utilisateur)');
        $req->execute(array(
            'ref_event' => $this->ref_event,
            'ref_utilisateur' => $this->ref_utilisateur,
        ));
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

}