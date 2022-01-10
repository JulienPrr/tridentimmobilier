<?

class Info
{
    private $_id;
    private $_taille_img;
    private $_nom_img;
    private $_description;

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
    public function getTailleImg()
    {
        return $this->_taille_img;
    }
    public function getNomImg()
    {
        return $this->_nom_img;
    }
    public function getDescription()
    {
        return $this->_description;
    }
 

    //SETTERS
    public function setId($id){
        $id = (int) $id ;
        $this->_id = $id;
    }

    public function setTaille_img($taille){
        $taille = (int) $taille ;
        $this->_taille_img = $taille;
    }
  
    public function setNom_img($nom){
        if(is_string($nom))
        $this->_nom_img = $nom;
    }
    public function setPrenom($description){
        if(is_string($description))
        $this->_description = $description;
    }
  

    public function enregistrer(){
        global $bdd;
        
        $req = $bdd->prepare("INSERT INTO infos VALUES (null, :taille, :nom, :description)");
        $data = [
            ':taille' => $this->getTailleImg(),
            ':nom' => $this->getNomImg(),
            ':description' => $this->getDescription(),
        ];
        
        $insertIsOk =  $req->execute($data);
        
        $sql="SELECT id as LastID from infos where id_annonce = @@Identity;"; // @@Identity permet de recuperer la dernière valeur entrée
        $stmt=$bdd->query($sql);
        
        while ($idInfo = $stmt->fetch(PDO::FETCH_OBJ)){
            $this->setId($idInfo->LastID);
        }    
    }
}
