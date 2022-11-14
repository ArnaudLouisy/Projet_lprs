<?php

class Offre
{

    private $id_offre;
    private $titreoffre;
    private $description;
    private $datepublication;
    private $typecontrat;
    private $dureecontrat;
    private $pourvue;
    private $refrepresentant;

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

    private function recupereroffre(Bdd $base)
    {


        $req = $base->getBdd()->prepare('SELECT * FROM offre ');
        $req->execute(array(
            'offre' => $this->titre_offre,
        ));

        $res = $req->fetch();

    }


    public function creeoffre(Bdd $base)
    {
        $req = $base->getBdd()->prepare('INSERT INTO offre (titre_offre,description,date_publication,type_contrat,dure_contrat,pourvue,ref_representant) values (:titreoffre,:description,:datepublication,:typecontrat,:durecontrat,:pourvue,:refrepresentant)');

        $req->execute(array(
            'titreoffre' => $this->titreoffre,
            'description' => $this->description,
            'datepublication' => $this->datepublication,
            'typecontrat' => $this->typecontrat,
            'durecontrat' => $this->dureecontrat,
            'pourvue' => null,
            'refrepresentant' => $this->refrepresentant
        ));
        var_dump($this);
        echo 'l`offre a bien été ajouté !' . '<br>';


    }

    private function modifieroffre(Bdd $base)
    {
        $req = $base->getBdd()->prepare('UPDATE offre (id_offre,titre_offre,description,date_publication,type_contrat,dure_contrat,pourvue,ref_representant) values (:id_offre, :titre_offre,:description,:date_publication,:type_contrat,:dure_contrat,:pourvue,:ref_representant)');

        $req->execute(array(
            'id_offre' => $this->id_offre,
            'titre_offre' => $this->titre_offre,
            'description' => $this->description,
            'date_publication' => $this->date_publication,
            'type_contrat' => $this->type_contrat,
            'dure_contrat' => $this->duree_contrat,
            'pourvue' => $this->pourvue,
            'ref_representant' => $this->ref_representant,
        ));
        echo 'l`offre a bien été modifié !' . '<br>';



    }

    private function supprimeroffre(Bdd $base)
    {
        $req = $base->getBdd()->prepare('DELETE offre (id_offre,titre_offre,description,date_publication,type_contrat,dure_contrat,pourvue,ref_representant) values (:id_offre, :titre_offre,:description,:date_publication,:type_contrat,:dure_contrat,:pourvue,:ref_representant)');

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
        echo 'l`offre a bien été Supprimé !' . '<br>';
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
        return $this->titreoffre;
    }

    /**
     * @param mixed $titre_offre
     */
    public function setTitreOffre($titreoffre)
    {
        $this->titreoffre = $titreoffre;
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
        return $this->datepublication;
    }

    /**
     * @param mixed $date_publication
     */
    public function setDatePublication($datepublication)
    {
        $this->datepublication = $datepublication;
    }

    /**
     * @return mixed
     */
    public function getTypeContrat()
    {
        return $this->typecontrat;
    }

    /**
     * @param mixed $type_contrat
     */
    public function setTypeContrat($typecontrat)
    {
        $this->typecontrat = $typecontrat;
    }

    /**
     * @return mixed
     */
    public function getDureeContrat()
    {
        return $this->dureecontrat;
    }

    /**
     * @param mixed $duree_contrat
     */
    public function setDureeContrat($dureecontrat)
    {
        $this->dureecontrat = $dureecontrat;
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
        return $this->refrepresentant;
    }

    /**
     * @param mixed $ref_representant
     */
    public function setRefRepresentant($refrepresentant)
    {
        $this->refrepresentant = $refrepresentant;
    }



}
