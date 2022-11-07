<?php

class RendezVous{

    private $id_rdv;
    private $date;
    private $heure;
    private $ref_offre;


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

    public function creerendezvous($bdd){
        $req = $bdd->getBdd()->prepare('INSERT INTO rendez_vous (date,heure,ref_offre) values (:date,:heure,:ref_offre)');
        $req->execute(array(
            'date' => $this->getDate(),
            'heure' => $this->getHeure().':00',
            'ref_offre' => $this->getRefOffre()
        ));

        echo 'Le Rendez-vous a bien été crée !' . '<br>';
    }

    /**
     * @return mixed
     */
    public function getIdRdv()
    {
        return $this->id_rdv;
    }

    /**
     * @param mixed $id_rdv
     */
    public function setIdRdv($id_rdv)
    {
        $this->id_rdv = $id_rdv;
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
    public function getRefOffre()
    {
        return $this->ref_offre;
    }

    /**
     * @param mixed $ref_offre
     */
    public function setRefOffre($ref_offre)
    {
        $this->ref_offre = $ref_offre;
    }













}