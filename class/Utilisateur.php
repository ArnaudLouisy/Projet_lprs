<?php

class Utilisateur{
    private $nom;
    private $prenom;
    private $email;
    private $motdepasse;
    private $adresse;
    private $valider;
    private $domaine_etude;
    private $niveau_etude;
    private $erreur;

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

    public function UtilisateurConnexion (Bdd $base){

        $req = $base->getBdd()->prepare('SELECT * FROM utilisateur_entreprise WHERE email = :email  AND motdepasse = :motdepasse');

        $req->execute(array(
            'email' => $this->email,
            'motdepasse' => $this->motdepasse
        ));

        $res = $req->fetch();

        if ($res['valider'] == 0 && isset($res['id_representant'])) {
            header('Location: ../Erreur/dist/validation.html');
        }

        elseif ($res) {

            $_SESSION['id_representant'] = $res['id_representant'];
            $_SESSION['nom_entreprise'] = $res['nom_entreprise'];
            $_SESSION['role_representant'] = $res['role_representant'];
            header('Location: ../index.php');

        }

        if (!($res)){

            $req = $base->getBdd()->prepare('SELECT * FROM utilisateur_eleves WHERE email = :email  AND motdepasse = :motdepasse');

            $req->execute(array(
                'email' => $this->email,
                'motdepasse' => $this->motdepasse
            ));

            $res = $req->fetch();

            if ($res['valider'] == 0 && isset($res['id_eleves'])) {
                header('Location: ../Erreur/dist/validation.html');
            }

            elseif ($res) {

                $_SESSION['id_eleves'] = $res['id_eleves'];
                $_SESSION['nom'] = $res['nom'];
                $_SESSION['prenom'] = $res['prenom'];
                header('Location: ../index.php');

            }
        }

        if (!($res)) {

            $req = $base->getBdd()->prepare('SELECT * FROM admin WHERE email = :email  AND motdepasse = :motdepasse');

            $req->execute(array(
                'email' => $this->email,
                'motdepasse' => $this->motdepasse
            ));

            $res = $req->fetch();

            if ($res) {
                $_SESSION['id_admin'] = $res['id_admin'];
                $_SESSION['nom'] = $res['nom'];
                $_SESSION['prenom'] = $res['prenom'];
                header('Location: ../index.php');
            }
            else{
                header('Location: ../form/dist/login.php/#a-container');
                $_SESSION['erreurconnexion'] = "mot de passe ou adresse email incorrecte";
            };
        }
        //var_dump($res);
        //$req->debugDumpParams();
        return $res;
    }

    public function UtilisateurInscription(Bdd $base){
        $req = $base->getBdd()->prepare('SELECT * FROM utilisateur_eleves WHERE email = :email');

        $req->execute(array(
            'email' => $this->email,
        ));

        $res = $req->fetch();

        if ($res) {
            header('Location: ../form/dist/login.php');
            $_SESSION['erreurinscription'] = "Cette adresse e-mail est déja inscrit .";
        }
        else {
            $req = $base->getBdd()->prepare('INSERT INTO utilisateur_eleves (nom,prenom,email,motdepasse,adresse,domaine_etudes,niveau_etudes) values (:nom,:prenom,:email,:motdepasse,:adresse,:domaine_etude,:niveau_etude)');

            $req->execute(array(
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'email' => $this->email,
                'motdepasse' => $this->motdepasse,
                'adresse' => $this->adresse,
                'domaine_etude' => $this->domaine_etude,
                'niveau_etude' => $this->niveau_etude,
            ));


            echo 'La personne a bien été inscrit !' . '<br>';
        }
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
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

    /**
     * @return mixed
     */
    public function getDomaineEtude()
    {
        return $this->domaine_etude;
    }

    /**
     * @param mixed $domaine_etude
     */
    public function setDomaineEtude($domaine_etude)
    {
        $this->domaine_etude = $domaine_etude;
    }

    /**
     * @return mixed
     */
    public function getNiveauEtude()
    {
        return $this->niveau_etude;
    }

    /**
     * @param mixed $niveau_etude
     */
    public function setNiveauEtude($niveau_etude)
    {
        $this->niveau_etude = $niveau_etude;
    }

    /**
     * @param $res
     * @return void
     */
    public function extracted($res)
    {

    }
}