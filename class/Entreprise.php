<?php

class Entreprise{

    private $id_representant ;
    private $nom_entreprise ;
    private $adresse;
    private $email;
    private $motdepasse;
    private $role_representant;
    private $valider;


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

    public function ComptNonValide(Bdd $base){

        $req = $base->getBdd()->prepare('SELECT * FROM utilisateur_entreprise WHERE valider != 1 or valider is null');

        $req->execute(array());

        return $req->fetchAll();
    }

    public function profile(Bdd $base){
        $req = $base->getBdd()->prepare('SELECT * FROM utilisateur_entreprise WHERE id_representant = :id');

        $req ->execute(array(
            'id'=>$this->id_representant
        ));

        return $req->fetch();
    }

    public function valider(Bdd $base){
        $req = $base->getBdd()->prepare('Update utilisateur_entreprise set valider =1 WHERE id_representant = :id');

        $req ->execute(array(
            'id'=>$this->id_representant
        ));

    }

    /**
     * @return mixed
     */
    public function getNomEntreprise()
    {
        return $this->nom_entreprise;
    }

    /**
     * @param mixed $nom_entreprise
     */
    public function setNomEntreprise($nom_entreprise)
    {
        $this->nom_entreprise = $nom_entreprise;
    }

    /**
     * @param mixed $id_representant
     */
    public function setIdRepresentant($id_representant)
    {
        $this->id_representant = $id_representant;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMotdepasse()
    {
        return $this->motdepasse;
    }

    /**
     * @param mixed $motdepasse
     */
    public function setMotdepasse($motdepasse)
    {
        $this->motdepasse = $motdepasse;
    }

    /**
     * @return mixed
     */
    public function getRoleRepresentant()
    {
        return $this->role_representant;
    }

    /**
     * @param mixed $role_representant
     */
    public function setRoleRepresentant($role_representant)
    {
        $this->role_representant = $role_representant;
    }

    /**
     * @return mixed
     */
    public function getValider()
    {
        return $this->valider;
    }

    /**
     * @param mixed $valider
     */
    public function setValider($valider)
    {
        $this->valider = $valider;
    }



}