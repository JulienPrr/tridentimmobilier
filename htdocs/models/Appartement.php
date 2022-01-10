<?php

class Appartement
{
    private $_id;
    private $_prix;
    private $_superficie;
    private $_titre;
    private $_description;
    private $_adresse;
    private $_ville;
    private $_code_postal;
    private $_numero_etage;
    private $_nombre_pieces;
    private $_a_vendre;
    private $_meuble;
    private $_ascensseur;
    private $_terasse;
    private $_balcon;
    private $_date_publication;
    private $_une;
    private $_main_image;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    // HYDRATATION
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // GETTERS
    public function getId()
    {
        return $this->_id;
    }
    public function getPrix()
    {
        return $this->_prix;
    }
    public function getSuperficie()
    {
        return $this->_superficie;
    }
    public function getTitre()
    {
        return $this->_titre;
    }
    public function getDescription()
    {
        return $this->_description;
    }
    public function getAdresse()
    {
        return $this->_adresse;
    }
    public function getVille()
    {
        return $this->_ville;
    }
    public function getCodePostal()
    {
        return $this->_code_postal;
    }
    public function getNumeroEtage()
    {
        return $this->_numero_etage;
    }
    public function getNombrePieces()
    {
        return $this->_nombre_pieces;
    }
    public function getAvendre()
    {
        return $this->_a_vendre;
    }
    public function getMeuble()
    {
        return $this->_meuble;
    }
    public function getAscensseur()
    {
        return $this->_ascensseur;
    }
    public function getTerrasse()
    {
        return $this->_terasse;
    }
    public function getBalcon()
    {
        return $this->_balcon;
    }
    public function getDate()
    {
        $date = new DateTime($this->_date_publication);
        return $date;
    }

    public function getUne()
    {
        return $this->_une;
    }

    public function getMainImage()
    {
        return $this->_main_image;
    }


    // SETTERS
    public function setId($id)
    {
        $id = (int) $id;
        $this->_id = $id;
    }
    public function setPrix($prix)
    {
        $prix = (int) $prix;
        $this->_prix = $prix;
    }
    public function setSuperficie($superficie)
    {
        $superficie = (float) $superficie;
        $this->_superficie = $superficie;
    }
    public function setTitre($titre)
    {
        if (is_string($titre))
            $this->_titre = $titre;
    }
    public function setDescription($desc)
    {
        if (is_string($desc))
            $this->_description = $desc;
    }
    public function setAdresse($adresse)
    {
        if (is_string($adresse))
            $this->_adresse = $adresse;
    }
    public function setVille($ville)
    {
        if(is_string($ville))
            $this->_ville = $ville;
    }
    public function setCode_postal($zip)
    {
        $zip = (int) $zip;
        $this->_code_postal = $zip;
    }
    public function setNumero_etage($numeroEtage)
    {
        $numeroEtage = (int) $numeroEtage;
        $this->_numero_etage = $numeroEtage;
    }
    public function setNombre_pieces($nombrePieces)
    {
        $nombrePieces = (int) $nombrePieces;
        $this->_nombre_pieces = $nombrePieces;
    }
    public function setA_vendre($aVendre)
    {
        if ($aVendre == 0 || $aVendre == 1)
            $this->_a_vendre = $aVendre;
    }
    public function setMeuble($meuble)
    {
        if ($meuble == 0 || $meuble == 1)
            $this->_meuble = $meuble;
    }
    public function setAscensseur($ascensseur)
    {
        if ($ascensseur == 0 || $ascensseur == 1)
            $this->_ascensseur = $ascensseur;
    }
    public function setTerasse($terrasse)
    {
        if ($terrasse == 0 || $terrasse == 1)
            $this->_terasse = $terrasse;
    }
    public function setBalcon($balcon)
    {
        if ($balcon == 0 || $balcon == 1)
            $this->_balcon = $balcon;
    }
    public function setDate($date)
    {
        $this->_date_publication = $date;
    }

    public function setUne($une)
    {
        if ($une == 0 || $une == 1)
            $this->_une = $une;
    }

    public function setMain_image($img)
    {
        if (is_string($img))
            $this->_main_image = $img;
    }  
}
