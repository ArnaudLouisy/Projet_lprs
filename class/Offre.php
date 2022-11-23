<?php

class Offre{

    private $id_offre;
    private $titre_offre;
    private $description;
    private $date_publication;
    private $type_contrat;
    private $dure_contrat;
    private $pourvue;
    private $ref_representant;

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

    public function ajouteroffre(Bdd $base)
    {
        $req = $base->getBdd()->prepare('INSERT INTO offre (titre_offre,description,date_publication,type_contrat,dure_contrat,ref_representant) values (:titre_offre,:description,CURRENT_DATE,:type_contrat,:dure_contrat,:ref_representant)');

        $req->execute(array(
            'titre_offre' => $this->titre_offre,
            'description' => $this->description,
            'type_contrat' => $this->type_contrat,
            'dure_contrat' => $this->dure_contrat,
            'ref_representant' => $this->ref_representant
        ));
        var_dump($this,$req);
        echo 'l`offre a bien été ajouté !' . '<br>';

    }

    private function modifieroffre(Bdd $base)
    {
        $req = $base->getBdd()->prepare('UPDATE ajouteroffre (id_offre,titre_offre,description,date_publication,type_contrat,dure_contrat,pourvue,ref_representant) values (:id_offre, :titre_offre,:description,:date_publication,:type_contrat,:dure_contrat,:pourvue,:ref_representant)');

        $req->execute(array(
            'id_offre' => $this->id_offre,
            'titre_offre' => $this->titre_offre,
            'description' => $this->description,
            'date_publication' => $this->date_publication,
            'type_contrat' => $this->type_contrat,
            'dure_contrat' => $this->dure_contrat,
            'pourvue' => $this->pourvue,
            'ref_representant' => $this->ref_representant,
        ));
        echo 'l`offre a bien été modifié !' . '<br>';




    }

    private function supprimeroffre(Bdd $base)
    {
        $req = $base->getBdd()->prepare("DELETE FROM offre ");

        $req->execute(array(
            'id_offre' => $this->id_offre,
            'titre_offre' => $this->titre_offre,
            'description' => $this->description,
            'date_publication' => $this->date_publication,
            'type_contrat' => $this->type_contrat,
            'dure_contrat' => $this->dure_contrat,
            'pourvue' => $this->pourvue,
            'ref_representant' => $this->ref_representant,
        ));
        echo 'l`offre a bien été supprimé !' . '<br>';

    }

    public function OffreNonValide(Bdd $base){

        $req = $base->getBdd()->prepare('SELECT * FROM offre WHERE valider != 1 or valider is null');

        $req->execute(array());

        return $req->fetchAll();
    }

    public function GetOffre(Bdd $base){

        $req = $base->getBdd()->prepare('SELECT * FROM offre WHERE valider = 0 ');

        $req->execute(array());

        return $req->fetchAll();
    }

    public function offredetaile(Bdd $base){
        $req = $base->getBdd()->prepare('SELECT * FROM offre WHERE id_offre = :id');

        $req->execute(array(
            'id'=>$this->id_offre
        ));
        return $req->fetch();
    }

    public function valider(Bdd $base){
        $req = $base->getBdd()->prepare('Update offre set valider =1 WHERE id_offre = :id');

        $req ->execute(array(
            'id'=>$this->id_offre
        ));
    }

    /**
     * @return mixed
     */
    public function getIdOffre()
    {
        return $this->id_offre;
    }

    /**
     * @param mixed $id_offre
     */
    public function setIdOffre($id_offre)
    {
        $this->id_offre = $id_offre;
    }

    /**
     * @return mixed
     */
    public function getTitreOffre()
    {
        return $this->titre_offre;
    }

    /**
     * @param mixed $titre_offre
     */
    public function setTitreOffre($titre_offre)
    {
        $this->titre_offre = $titre_offre;
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
    public function getDatePublication()
    {
        return $this->date_publication;
    }

    /**
     * @param mixed $date_publication
     */
    public function setDatePublication($date_publication)
    {
        $this->date_publication = $date_publication;
    }

    /**
     * @return mixed
     */
    public function getTypeContrat()
    {
        return $this->type_contrat;
    }

    /**
     * @param mixed $type_contrat
     */
    public function setTypeContrat($type_contrat)
    {
        $this->type_contrat = $type_contrat;
    }

    /**
     * @return mixed
     */
    public function getDureContrat()
    {
        return $this->dure_contrat;
    }

    /**
     * @param mixed $dure_contrat
     */
    public function setDureContrat($dure_contrat)
    {
        $this->dure_contrat = $dure_contrat;
    }

    /**
     * @return mixed
     */
    public function getPourvue()
    {
        return $this->pourvue;
    }

    /**
     * @param mixed $pourvue
     */
    public function setPourvue($pourvue)
    {
        $this->pourvue = $pourvue;
    }

    /**
     * @return mixed
     */
    public function getRefRepresentant()
    {
        return $this->ref_representant;
    }

    /**
     * @param mixed $ref_representant
     */
    public function setRefRepresentant($ref_representant)
    {
        $this->ref_representant = $ref_representant;
    }



}
