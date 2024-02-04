<?php

class Materiele{

    private $id;
    private $nom;
    private $numerot;
    private $description;
    private $refEvente;

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

    public function creerMateriele(Bdd $base){
        $req = $base->getBdd()->prepare('INSERT INTO materiele (nom,numerot,description) values (:nom,:numerot,:description)');
        $req->execute(array(
            'nom' => $this->nom,
            'numerot' => $this->numerot,
            'description' => $this->description,
        ));
        echo 'Materiele ajoutez !' . '<br>';
    }

    public function voirMateriele(Bdd $base){
        $req = $base->getBdd()->prepare('SELECT * FROM materiele');
        $req ->execute(array());
        $list = $req ->fetchAll();
        return $list;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $numerot
     */
    public function setNumerot($numerot): void
    {
        $this->numerot = $numerot;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @param mixed $refEvente
     */
    public function setRefEvente($refEvente): void
    {
        $this->refEvente = $refEvente;
    }



}
