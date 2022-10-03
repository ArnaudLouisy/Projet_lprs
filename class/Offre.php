<?php

class Offre
{

    private $id_offre;
    private $titre_offre;
    private $description;
    private $date_publication;
    private $type_contrat;
    private $duree_contrat;
    private $pourvue;

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
            'offre' => $this->offre,
        ));

        $res = $req->fetch();

    }


    private function ajouteroffre(Bdd $base)
    {
        $req = $base->getBdd()->prepare('INSERT INTO ajouteroffre (id_offre,titre_offre,description,date_publication,type_contrat,dure_contrat,pourvue,ref_representant) values (:id_offre, :titre_offre,:description,:date_publication,:type_contrat,:dure_contrat,:pourvue,:ref_representant)');

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
        echo 'l`offre a bien été ajouté !' . '<br>';


    }
    private function modifieroffre(Bdd $base){
        $req = $base->getBdd()->prepare("UPDATE offre SET id_offre='id_offre',titre_offre='titre_offre',description='description',date_publication='date_publication',type_contrat='type_contrat',dure_contrat='dure_contrat',pourvue='pourvue',ref_representant='ref_representant'  WHERE offre=?");

        if (offre->query(sql) === TRUE) {
            echo "modification reussie";
        } else {
            echo "Erreur: " . offre->error;
        }
        offre->close();


    }

    private function supprimeroffre(Bdd $base){
        $req = $base->getBdd()->prepare("DELETE FROM offre ");

        if (offre->query(sql) === TRUE) {
            echo "supprimé !";
        } else {
            echo "Erreur: " . offre->error;
        }

        offre->close();


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
    public function getDureeContrat()
    {
        return $this->duree_contrat;
    }

    /**
     * @param mixed $duree_contrat
     */
    public function setDureeContrat($duree_contrat)
    {
        $this->duree_contrat = $duree_contrat;
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

}
