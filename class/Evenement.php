<?php
// include_once "./Bdd.php"; abd plus JAMAIS ça plus JAMAIS JAMAIS JAMAIS
class Evenement{

    private $id_event;
    private $nom_event;
    private $description;
    private $date;
    private $heure;
    private $duree;
    private $nombre_inscrit;
    private $autorise;

    public function __construct(array $donnees)
    {
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
    public function creeunevenement(Bdd $base){
            $req = $base->getBdd()->prepare('INSERT INTO evenement (nom_event,description,date,heure,duree,nombre_inscrit,salle) values (:nom_event,:description,:date,:heure,:duree,:nombre_inscrit,:salle)');
            $req->execute(array(
                'nom_event' => $this->nom,
                'description' => $this->description,
                'date' => $this->date,
                'heure' => $this->heure,
                'duree' => $this->duree,
                'nombre_inscrit' => $this->nombre_inscrit,
                'salle' => $this->salle,
            ));


            echo 'levenement a bien été crée !' . '<br>';
        }

    public function inscriptionevenement(Bdd $base){

        $req = $base->getBdd()->prepare('INSERT INTO evenement (nom_event,description,date,heure,duree,nombre_inscrit,salle) values (:nom_event,:description,:date,:heure,:duree,:nombre_inscrit,:salle)');

        $req->execute(array(
            'nom_event' => $this->nom_event,
            'description' => $this->description,
            'date' => $this->date,
            'heure' => $this->heure,
            'duree' => $this->duree,
            'nombre_inscrit' => $this->nombre_inscrit,
            'salle' => $this->salle,
        ));


        echo 'levenement a bien ete inscrit !' . '<br>';
    }

    public function EvenementNonValide(Bdd $base){

        $req = $base->getBdd()->prepare('SELECT * FROM evenement WHERE valider != 1 or valider is null');

        $req->execute(array());

        return $req->fetchAll();
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
    public function getIdEvent()
    {
        return $this->id_event;
    }

    /**
     * @param mixed $id_event
     */
    public function setIdEvent($id_event)
    {
        $this->id_event = $id_event;
    }

    /**
     * @return mixed
     */
    public function getNomEvent()
    {
        return $this->nom_event;
    }

    /**
     * @param mixed $nom_event
     */
    public function setNomEvent($nom_event)
    {
        $this->nom_event = $nom_event;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * @param mixed $heure
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getNombreInscrit()
    {
        return $this->nombre_inscrit;
    }

    /**
     * @param mixed $nombre_inscrit
     */
    public function setNombreInscrit($nombre_inscrit)
    {
        $this->nombre_inscrit = $nombre_inscrit;
    }

    /**
     * @return mixed
     */
    public function getAutorise()
    {
        return $this->autorise;
    }

    /**
     * @param mixed $autorise
     */
    public function setAutorise($autorise)
    {
        $this->autorise = $autorise;
    }




}