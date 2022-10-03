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

    public function EntrepriseConnexion (Bdd $base){

        $req = $base->getBdd()->prepare('SELECT * FROM utilisateur_entreprise WHERE email = :email  AND motdepasse = :motdepasse AND valider = 1 ');

        $req->execute(array(
            'email' => $this->email,
            'motdepasse' => $this->motdepasse
        ));

        $res = $req->fetch();

        if ($res) {
            header('Location: ../index.php');
        }
        if ($res['valide'] != 1) {
            header('Location: ../Erreur/dist/validation.html');
        }
        else{
            echo ('mot de passe ou email incorrecte');
        }

        return $res;

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