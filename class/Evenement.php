<?php

class Evenement
{

    private $id_event;
    private $nom_event;
    private $description;
    private $date;
    private $heure;
    private $duree;
    private $nombre_inscrit;
    private $ref_utilisateur;
    private $autorise;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    private function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function creeunevenement(Bdd $base)
    {
        $req = $base->getBdd()->prepare('INSERT INTO evenement (nom_event,description,date,heure,duree,ref_utilisateur) values (:nom_event,:description,:date,:heure,:duree,:ref_utilisateur)');
        $req->execute(array(
            'nom_event' => $this->nom_event,
            'description' => $this->description,
            'date' => $this->date,
            'heure' => $this->heure,
            'duree' => $this->duree,
            'ref_utilisateur' => $this->ref_utilisateur
        ));
        echo 'levenement a bien été crée !' . '<br>';
    }

    public function modifierevenement(Bdd $base)
    {
        $req = $base->getBdd()->prepare('UPDATE evenement SET  nom_event = :nom_event, description = :description, date = :date, heure = :heure; duree = :duree, nombre_inscrit = :nombre_inscrit WHERE id_event = :id');

        $req->execute(array(
            'nom_event' => $this->nom_event,
            'description' => $this->description,
            'date' => $this->date,
            'heure' => $this->heure,
            'duree' => $this->duree,
            'nombre_inscrit' => $this->nombre_inscrit,


        ));
        echo 'l`evenement a bien été modifié !' . '<br>';
    }

    public function supprimerevenemnt(Bdd $base){
        $req = $base->getBdd()->prepare("DELETE FROM evenement WHERE id_event = :id");
        $req->execute(array(
            'id' => $this->id_event
        ));
        echo "Evenement supprimé";

    }


    public function EvenementNonValide(Bdd $base)
    {

        $req = $base->getBdd()->prepare('SELECT * FROM evenement WHERE autorise != 1 or autorise is null');

        $req->execute(array());

        return $req->fetchAll();
    }

    public function valider(Bdd $base)
    {
        $req = $base->getBdd()->prepare('Update evenement set autorise =1 WHERE id_event = :id');

        $req->execute(array(
            'id' => $this->id_event
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

    /**
     * @param mixed $ref_utilisateur
     */
    public function setRefUtilisateur($ref_utilisateur): void
    {
        $this->ref_utilisateur = $ref_utilisateur;
    }


}