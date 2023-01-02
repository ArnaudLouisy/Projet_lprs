<?php

class Salle{

    private $id_salle;
    private $nom_salle;
    private $nombre_place;
    private $adresse;
    private $cp;
    private $ville;

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

    public function creeSalle(Bdd $base){
    $req = $base->getBdd()->prepare('INSERT INTO salle (nom_salle, nombre_place, adresse, cp, ville) values(:nom_salle, :nombre_place, :adresse, :cp, :ville)');
    $req ->execute(array(
        'nom_salle' => $this->nom_salle,
        'nombre_place' => $this->nombre_place,
        'adresse' => $this->adresse,
        'cp' => $this->cp,
        'ville' => $this->ville
    ));
    }

    public function voirSalle(Bdd $base){
        $req = $base->getBdd()->prepare('SELECT * FROM salle');
        $req ->execute(array());
        return $req;
    }

    public function voirLaSalle(Bdd $base){
        $req = $base->getBdd()->prepare('SELECT * FROM salle WHERE id_salle = :id');
        $req ->execute(array(
            'id' => $this->id_salle
        ));
        return $req->fetch();
    }

    public function modifierLaSalle(Bdd $base){
        $req = $base->getBdd()->prepare('UPDATE salle SET nom_salle = :nom_salle, nombre_place = :nombre_place, adresse = :adresse, cp = :cp, ville = :ville WHERE id_salle = :id' );
        $req->execute(array(
            'id'=> $this->id_salle,
            'nom_salle'=> $this->nom_salle,
            'nombre_place'=> $this->nombre_place,
            'adresse'=> $this->adresse,
            'ville'=> $this->ville,
            'cp'=> $this->cp,
        ));
    }

    public function supprimerLaSalle(Bdd $base){
        $req = $base->getBdd()->prepare('DELETE FROM salle WHERE id_salle = :id');
        $req ->execute(array(
            'id' => $this->id_salle
        ));
    }

    /**
     * @param mixed $id_salle
     */
    public function setIdSalle($id_salle): void
    {
        $this->id_salle = $id_salle;
    }

    /**
     * @param mixed $nom_salle
     */
    public function setNomSalle($nom_salle): void
    {
        $this->nom_salle = $nom_salle;
    }

    /**
     * @param mixed $nombre_place
     */
    public function setNombrePlace($nombre_place): void
    {
        $this->nombre_place = $nombre_place;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp): void
    {
        $this->cp = $cp;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville): void
    {
        $this->ville = $ville;
    }


}