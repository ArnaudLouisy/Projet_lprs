<?php

class File{
    private $nameFile;
    private $sizeFile;
    private $chemin;
    private $typeFile;
    private $erreurFile;
    private $tmpFile;

    private $valideExt = ['png', 'jpeg', 'gif', 'jpg'];
    private $valideType = ['image/png', 'image/jpeg', 'image/gif' ,'image/jpg'];

    /**
     * @param $nameFile
     * @param $sizeFile
     * @param $typeFile
     * @param $erreurFile
     * @param $tmpFile
     */
    public function __construct($nameFile, $sizeFile, $typeFile, $erreurFile, $tmpFile)  // initiation des valeur
    {
        $this->nameFile = $nameFile;
        $this->sizeFile = $sizeFile;
        $this->typeFile = $typeFile;
        $this->erreurFile = $erreurFile;
        $this->tmpFile = $tmpFile;
    }
    public function fileChequ(){
        //verification du bon chargement du fichier
        if ($this->erreurFile == 0){
            //recuperation des extention
            $extention = explode('.',$this->nameFile);
            //verification du type
            if (in_array($this->typeFile,$this->valideType)){
                //verifivation contr la double extention
                if(count($extention) <= 2 && in_array(strtolower(end($extention)),$this->valideExt)){
                    $uniquename = md5(uniqid(rand(),true));
                    $name = "../../photo/" . $uniquename . ".". strtolower(end($extention));
                    move_uploaded_file($this->tmpFile,$name);
                    $this->chemin = "photo/" . $uniquename . ".". strtolower(end($extention));
                }else{
                    $_SESSION['erreurinscription'] = "Merci de metre une image";
                }
            }else{
                $_SESSION['erreurinscription'] = "Le fichier n'est pas une image";
            }

        }else{
            $_SESSION['erreurinscription'] = "Une erreur est survenue lors du chargement";
        }
        return $this->chemin;
    }

}