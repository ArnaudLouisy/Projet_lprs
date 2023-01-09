<?php

class Utilisateur{
    private $id_utilisateur;
    private $nom;
    private $prenom;
    private $email;
    private $logo;
    private $motdepasse;
    private $post;
    private $verif;
    private $adresse;
    private $cp;
    private $ville;
    private $valider;
    private $domaine_etude;
    private $niveau_etude;
    private $role;
    private $ref_admin;

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

        $req = $base->getBdd()->prepare('SELECT * FROM utilisateur WHERE email = :email');

        $req->execute(array(
            'email' => $this->email,
        ));

        $res = $req->fetch();

        $verif = password_verify($this->motdepasse,$res['motdepasse']);

        if ($verif == true){
            if ($res['valider'] == 0 && isset($res['id_utilisateur'])) {
                header('Location: ../../Erreur/dist/validation.html');
            }
            elseif ($res['valider'] == 1) {
                $_SESSION['id_utilisateur'] = $res['id_utilisateur'];
                $_SESSION['role'] = $res['role'];
                $_SESSION['nom'] = $res['nom'];
                $_SESSION['photo'] = $res['logo'];
                if ($res['role'] == "Entreprise"){
                    $_SESSION['post'] = $res['poste'];
                    header('Location: ../../index.php');
                }elseif($res['role'] == "Eleve"){
                    $_SESSION['prenom'] = $res['prenom'];
                    header('Location: ../../index.php');
                }elseif ($res['role'] == "Admin"){
                    $_SESSION['prenom'] = $res['prenom'];
                    header('Location: ../../admin/admin.php');
                }

            }
        }else{
            header('Location: ../../form/dist/login');
            $_SESSION['erreurconnexion'] = "Information incorecte ou compte inhesistant .";
        }

        return $res ;
    }

    public function UtilisateurInscription(Bdd $base){

            $req = $base->getBdd()->prepare('SELECT * FROM utilisateur WHERE email = :email');

            $req->execute(array(
                'email' => $this->email,
            ));

            $res = $req->fetch();

            if ($res) {
                $_SESSION['erreurinscription'] = "Cette adresse e-mail est déja inscrit .";
                header('Location: ../../form/dist/inscription.php');
            }
            else {
                $req = $base->getBdd()->prepare('INSERT INTO utilisateur (role,nom,prenom,email,motdepasse,adresse,cp,ville,domaine_etude,niveau_etude,logo,poste) values (:role,:nom,:prenom,:email,:motdepasse,:adresse,:cp,:ville,:domaine_etude,:niveau_etude,:logo,:poste)');
                $req->execute(array(
                    'role' => $this->role,
                    'nom'=> $this->nom,
                    'prenom' => $this->prenom,
                    'email' => $this->email,
                    'motdepasse' => $this->motdepasse,
                    'adresse' => $this->adresse,
                    'cp' => $this->cp,
                    'ville' => $this->ville,
                    'domaine_etude' => $this->domaine_etude,
                    'niveau_etude' => $this->niveau_etude,
                    'logo' => $this->logo,
                    'poste' => $this->post
                ));
                header('Location: ../../index.php');
            }
    }

    public function modifiProfile(Bdd $base): void
    {
        $req = $base->getBdd()->prepare('UPDATE utilisateur SET nom = :nom, cp = :cp, ville = :ville, logo = :logo,adresse = :adresse, poste = :post, prenom = :prenom, email = :email WHERE id_utilisateur = :id');

        $req ->execute(array(
            'id'=>$this->id_utilisateur,
            'nom'=>$this->nom,
            'cp'=>$this->cp,
            'ville'=>$this->ville,
            'adresse'=>$this->adresse,
            'post'=>$this->post,
            'prenom'=>$this->prenom,
            'email'=>$this->email,
            'logo'=>$this->logo
        ));
    }

    public function profile(Bdd $base){
        $req = $base->getBdd()->prepare('SELECT * FROM utilisateur WHERE id_utilisateur = :id');

        $req ->execute(array(
            'id'=>$this->id_utilisateur
        ));

        return $req->fetch();
    }

    public function ComptNonValide(Bdd $base){

        $req = $base->getBdd()->prepare('SELECT * FROM utilisateur WHERE valider != 1 or valider is null AND role != :role');

        $req->execute(array(
            'role' => "Admin"
        ));
        return $req->fetchAll();
    }

    public function valider(Bdd $base){
        $req = $base->getBdd()->prepare('Update utilisateur set valider =1 WHERE id_utilisateur = :id');

        $req ->execute(array(
            'id'=>$this->id_utilisateur
        ));

    }

    public function supprimer(Bdd $base){
        $req = $base->getBdd()->prepare('DELETE FROM utilisateur WHERE id_utilisateur = :id');
        $req ->execute(array(
            'id'=>$this->id_utilisateur
        ));

    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
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
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param mixed $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

    /**
     * @return mixed
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getIdUtilisateur()
    {
        return $this->id_utilisateur;
    }

    /**
     * @param mixed $id_utilisateur
     */
    public function setIdUtilisateur($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;
    }

    /**
     * @param mixed $ref_admin
     */
    public function setRefAdmin($ref_admin)
    {
        $this->ref_admin = $ref_admin;
    }

    /**
     * @param $res
     * @return void
     */



}