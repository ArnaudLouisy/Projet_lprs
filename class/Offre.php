<?php

class Offre{

    private $id_offre;
    private $titre_offre;
    private $description;
    private $date_publication;
    private $type_contrat;
    private $dure_contrat;
    private $pourvue;
    private $ref_utilisateur;

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
        $req = $base -> getBdd() ->prepare('INSERT INTO offre (titre_offre,description,type_contrat,dure_contrat,ref_utilisateur) values (:titre_offre,:description,:type_contrat,:dure_contrat,:ref_utilisateur)');
        $req->execute(array(
            'titre_offre' => $this->titre_offre,
            'description' => $this->description,
            'type_contrat' => $this->type_contrat,
            'dure_contrat' => $this->dure_contrat,
            'ref_utilisateur' => $this->ref_utilisateur
        ));
        var_dump($this);
        echo 'l`offre a bien été ajouté !' . '<br>';

    }

    private function modifieroffre(Bdd $base)
    {
        $req = $base->getBdd()->prepare('UPDATE offre SET titre_offre = :titre_offre,description = :description,type_contrat = :type_contrat,dure_contrat = :dure_contrat WHERE id_offre = :id_offre');

        $req->execute(array(
            'id_offre' => $this->id_offre,
            'titre_offre' => $this->titre_offre,
            'description' => $this->description,
            'type_contrat' => $this->type_contrat,
            'dure_contrat' => $this->dure_contrat
        ));
        echo 'l`offre a bien été modifié !' . '<br>';
    }

    public function supprimeroffre(Bdd $base){
        $req = $base->getBdd()->prepare('DELETE FROM offre WHERE id_offre = :id_offre and ref_representant = :ref_representant ');
        $req->execute(array(
            'id_offre' => $this->id_offre,
            'ref_representant' => $this->ref_representant,
        ));
        echo 'l`offre a bien été supprimé !' . '<br>';
    }

    public function nombreOffre(Bdd $base){
        $req = $base->getBdd()->prepare('SELECT COUNT(*) FROM offre WHERE valider = 1 ');

        $req->execute(array());

        return $req->fetch();
    }


    public function OffreNonValide(Bdd $base){

        $req = $base->getBdd()->prepare('SELECT * FROM offre WHERE valider != 1 or valider is null');

        $req->execute(array());

        return $req->fetchAll();
    }

    public function GetOffre(Bdd $base){

        $req = $base->getBdd()->prepare('SELECT * FROM offre WHERE valider = 1 ');

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
     * @param mixed $id_offre
     */
    public function setIdOffre($id_offre)
    {
        $this->id_offre = $id_offre;
    }

    /**
     * @param mixed $titre_offre
     */
    public function setTitreOffre($titre_offre)
    {
        $this->titre_offre = $titre_offre;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $date_publication
     */
    public function setDatePublication($date_publication)
    {
        $this->date_publication = $date_publication;
    }

    /**
     * @param mixed $type_contrat
     */
    public function setTypeContrat($type_contrat)
    {
        $this->type_contrat = $type_contrat;
    }

    /**
     * @param mixed $dure_contrat
     */
    public function setDureContrat($dure_contrat)
    {
        $this->dure_contrat = $dure_contrat;
    }

    /**
     * @param mixed $pourvue
     */
    public function setPourvue($pourvue)
    {
        $this->pourvue = $pourvue;
    }

    /**
     * @param mixed $ref_utilisateur
     */
    public function setRefUtilisateur($ref_utilisateur)
    {
        $this->ref_utilisateur = $ref_utilisateur;
    }

}
